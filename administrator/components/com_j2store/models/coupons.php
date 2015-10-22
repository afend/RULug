<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
// No direct access to this file
defined('_JEXEC') or die;
class J2StoreModelCoupons extends F0FModel {

	public $code = '';
	public $coupon = false;

	protected function onBeforeSave(&$data, &$table) {

		if(isset($data['products']) && !empty($data['products'])){
			$data['products'] =implode(',' , $data['products']);
		}else{
			$data['products'] ='';
		}

		if(isset($data['product_category']) && !empty($data['product_category'])){
			$data['product_category'] =implode(',' , $data['product_category']);
		}else{
			$data['product_category']='';
		}

		if(isset($data['brand_ids']) && !empty($data['brand_ids'])){
			$data['brand_ids'] =implode(',' , $data['brand_ids']);
		}else{
			$data['brand_ids']='';
		}

		return true;
	}


	public function init() {

		// get the coupon from the session and assign it to the coupon variable
		$session = JFactory::getSession ();

		// sanity check
		$this->code = $session->get ( 'coupon', '', 'j2store' );
		if (empty ( $this->code ))
			return false;

		static $couponsets;
		if(!is_array($couponsets)) $couponsets = array();

		if (!isset($couponsets[$this->code])) {
			$db = JFactory::getDbo ();
			$query = $db->getQuery ( true )->select ( '*' )->from ( '#__j2store_coupons' )->where ( 'coupon_code = ' . $db->q ( $this->code ) );
			$db->setQuery ( $query );
			try {
				$row = $db->loadObject ();
			} catch ( Exception $e ) {
				// an error occured
				$row = F0FTable::getInstance ( 'Coupon', 'J2StoreTable' );
			}
			$couponsets[$this->code] = $row;
		}
		$this->coupon = $couponsets[$this->code];
		return true;
	}

	public function get_coupon_history($coupon_id, $user_id='') {

		static $history;
		if(!is_array($history)) $history= array();

		if(!isset($history[$coupon_id][$user_id])) {
			$db = JFactory::getDbo();
			$query = $db->getQuery ( true );
			$query->select ( 'COUNT(*) AS total' )->from ( '#__j2store_orderdiscounts' )->where ( 'discount_entity_id=' . $db->q ( $coupon_id) );
			$query->where('discount_type = '.$db->q('coupon'));
			if(!empty($user_id)) {
				$query->where('user_id = '.$db->q($user_id));
			}
			$db->setQuery ( $query );
			$history[$coupon_id][$user_id] = $db->loadResult ();
		}
		return $history[$coupon_id][$user_id];
	}


	public function is_valid($order) {
		try {
			$this->validate_enabled();
			$this->validate_exists();
			$this->validate_usage_limit();
			$this->validate_user_logged();
			$this->validate_quantity_limit();
			$this->validate_users();
			$this->validate_user_usage_limit();
			$this->validate_expiry_date();
			$this->validate_minimum_amount($order);
		//	$this->validate_maximum_amount();
			$this->validate_product_ids();
			$this->validate_product_categories();
			$this->validate_product_manufacturers();
			//allo plugins to run their own course.
			$results = J2Store::plugin()->event('CouponIsValid', array($this, $order));			
			if (in_array(false, $results, false)) {
				throw new Exception( JText::_('J2STORE_COUPON_NOT_APPLICABLE'));
				$this->remove_coupon();
				return false;
			}
		} catch ( Exception $e ) {
			$this->setError($e->getMessage());
			JFactory::getApplication()->enqueueMessage($e->getMessage());
			//clear the coupon code
			$this->remove_coupon();
			return false;
		}
		return true;
	}


	public function is_valid_for_product($product) {
		$db = JFactory::getDbo();
		$valid = true;

		$coupon_products_data = $this->get_selected_products();

		if ( count( $coupon_products_data) > 0 ) {
			if (!in_array( $product->product_id, $coupon_products_data)) {
				$valid = false;
			}
		}

		//check againse categories
		$coupon_categories_data = array ();
		$product_data = array();
		if ($this->coupon->product_category) {
			$coupon_categories_data = explode ( ',', $this->coupon->product_category);
		}
		if(count($coupon_categories_data) > 0 && $product->product_source == 'com_content') {
				foreach ( $coupon_categories_data as $category_id ) {
					$query = $db->getQuery ( true );
					$query->select ( 'COUNT(*) AS total' )->from ( '#__content' )->where ( 'id=' . $db->q ( $product->product_source_id ) )->where ( 'catid=' . $db->q ( $category_id ) );

					$db->setQuery ( $query );
					if ($db->loadResult ()) {
						$product_data [] = $product->product_id;
					}

				}
				if(empty($product_data)) {
					$valid = false;
				}
		}

		//allow plugins to modify the output
		J2Store::plugin()->event('IsCouponValidForProduct', array($valid, $product, $this));

		return $valid;
	}

	private function validate_enabled() {
		$params = J2Store::config();
		if($params->get('enable_coupon', 0) == 0) {
			throw new Exception( JText::_('J2STORE_COUPON_DOES_NOT_EXIST') );
		}
	}

	/**
	 * Ensure coupon exists or throw exception
	 */
	private function validate_exists() {
		if ( ! $this->coupon) {
			throw new Exception( JText::_('J2STORE_COUPON_DOES_NOT_EXIST') );
		}
	}

	/**
	 * Ensure coupon usage limit is valid or throw exception
	 */
	private function validate_usage_limit() {
		$total = $this->get_coupon_history($this->coupon->j2store_coupon_id);
		if ($this->coupon->max_uses > 0 && ($total >= $this->coupon->max_uses)) {
			throw new Exception( JText::_('J2STORE_COUPON_USAGE_LIMIT_HAS_REACHED') );
		}

	}

	/**
	 * Quantity limit
	 */
	private function validate_quantity_limit() {
		$qty = $this->get_total_cart_quantity();
		if ($this->coupon->max_quantity > 0 && ($qty > $this->coupon->max_quantity)) {
			throw new Exception( JText::_('J2STORE_COUPON_QUANTITY_LIMIT_HAS_REACHED') );
		}
	}


	private function validate_user_logged() {
		$user = JFactory::getUser();
		// is customer loged
		if ($this->coupon->logged && ! $user->id) {
			throw new Exception( JText::_('J2STORE_COUPON_APPLICABLE_ONLY_FOR_LOGGED_IN_CUSTOMERS') );
		}
	}

	private function validate_users() {
		$user = JFactory::getUser ();
		if ($this->coupon->users && $user->id) {
			$users = explode ( ',', $this->coupon->users );
			if (count ( $users ))
				if (! in_array ( $user->id, $users )) {
					throw new Exception ( JText::_ ( 'J2STORE_COUPON_NOT_APPLICABLE' ) );
				}
		}
	}

	/**
	 * Ensure coupon user usage limit is valid or throw exception
	 *
	 * Per user usage limit - check here if user is logged in (against user IDs)
	 * Checked again for emails later on in WC_Cart::check_customer_coupons()
	 */
	private function validate_user_usage_limit() {
		$user = JFactory::getUser();
		if ($user->id) {
			$customer_total = $this->get_coupon_history($this->coupon->j2store_coupon_id, $user->id);
			if ($this->coupon->max_customer_uses > 0 && ($customer_total >= $this->coupon->max_customer_uses)) {
				throw new Exception( JText::_('J2STORE_COUPON_INDIVIDUAL_USAGE_LIMIT_HAS_REACHED') );
			}
		}
	}

	/**
	 * Ensure coupon date is valid or throw exception
	 */
	private function validate_expiry_date() {
		$db = JFactory::getDbo();
		$nullDate = $db->getNullDate();
		$tz = JFactory::getConfig()->get('offset');
		$now = JFactory::getDate('now', $tz)->format('Y-m-d');
		$valid_from = JFactory::getDate($this->coupon->valid_from, $tz)->format('Y-m-d');
		$valid_to = JFactory::getDate($this->coupon->valid_to, $tz)->format('Y-m-d');

		if(
		($this->coupon->valid_from == $nullDate || $valid_from < $now) &&
		 ($this->coupon->valid_to == $nullDate || $valid_to > $now)
		){
			return true;
		}else {
			throw new Exception( JText::_('J2STORE_COUPON_EXPIRED'));
		}
	}

	/**
	 * Ensure coupon amount is valid or throw exception
	 */
	private function validate_minimum_amount($order) {

		// is subtotal above min subtotal restriction.
		if (isset ( $this->coupon->min_subtotal ) && ( float ) $this->coupon->min_subtotal > 0) {
			$subtotal = $order->subtotal;
			//echo round($row->min_subtotal,0);
			if (!empty($this->coupon->min_subtotal) && (float) $this->coupon->min_subtotal  > (float) $subtotal) {
				throw new Exception( JText::sprintf('J2STORE_COUPON_MINIMUM_SPEND_LIMIT_NOT_REACHED', $this->coupon->min_subtotal));
			}
		}
	}

	/**
	 * Ensure coupon is valid for products in the cart is valid or throw exception
	 */
	private function validate_product_ids() {
		$coupon_products_data = $this->get_selected_products();

		if ( count( $coupon_products_data) > 0 ) {
			$valid_for_cart = false;
			$cartitems = F0FModel::getTmpInstance('Carts', 'J2StoreModel')->getItems();
			if ( count( $cartitems) > 0 ) {
				foreach( $cartitems as $cart_item ) {
					if ( in_array( $cart_item->product_id, $coupon_products_data)) {
						$valid_for_cart = true;
					}
				}
			}
			if ( ! $valid_for_cart ) {
				throw new Exception( JText::_('J2STORE_COUPON_NOT_APPLICABLE'));
			}
		}
	}

	/**
	 * Ensure coupon is valid for product categories in the cart is valid or throw exception
	 */
	private function validate_product_categories() {
		$db = JFactory::getDbo();
		$coupon_categories_data = array ();
		if ($this->coupon->product_category) {
			$coupon_categories_data = explode ( ',', $this->coupon->product_category);
		}
		$product_data = array();
		if ( count( $coupon_categories_data ) > 0 ) {
			$valid_for_cart = false;
			$cartitems = F0FModel::getTmpInstance('Carts', 'J2StoreModel')->getItems();
			if ( count( $cartitems ) > 0 ) {
				foreach( $cartitems as $cart_item ) {
					if ($cart_item->product_source == 'com_content') {
						foreach ( $coupon_categories_data as $category_id ) {
							$query = $db->getQuery ( true );
							$query->select ( 'COUNT(*) AS total' )
								  ->from ( '#__content' )
							      ->where ( 'id=' . $db->q ( $cart_item->product_source_id ) )
							      ->where ( 'catid=' . $db->q ( $category_id ) );

							$db->setQuery ( $query );
							if ($db->loadResult ()) {
								$product_data [] = $cart_item->product_id;
							}
							continue;
						}
					}

					if ( count($product_data) > 0 ) {
						$valid_for_cart = true;
					}
				}
			}
			if ( ! $valid_for_cart ) {
				throw new Exception( JText::_('J2STORE_COUPON_NOT_APPLICABLE'));
			}
		}
	}


	private function validate_product_manufacturers() {

		//check brand id matches with the products brand id
		if(!empty($this->coupon->brand_ids)){
			$brand_ids = explode(',' ,$this->coupon->brand_ids);
			$manufacturer_data = array ();
			if(count($brand_ids)) {
				$cartitems = F0FModel::getTmpInstance('Carts', 'J2StoreModel')->getItems();
				foreach ( $cartitems as $item ) {
					if(isset($item->manufacturer_id) && !empty($item->manufacturer_id) && in_array($item->manufacturer_id , $brand_ids)){
						$manufacturer_data[] = $item->product_id;
						continue;
					}
				}
				if (! $manufacturer_data) {
					throw new Exception( JText::_('J2STORE_COUPON_NOT_APPLICABLE'));
				}
			}
		}

	}

	public function get_selected_products() {
		$products = array();
		if (!empty($this->coupon->products)) {
			$products = explode ( ',', $this->coupon->products);
		}
		return $products;
	}

	public function get_total_cart_quantity() {
		$qty = 0;
		$cartitems = F0FModel::getTmpInstance('Carts', 'J2StoreModel')->getItems();
		foreach ( $cartitems as $item ) {
			$qty += $item->product_qty;
		}
		return $qty;
	}

	public function remove_coupon() {
		JFactory::getSession()->clear('coupon', 'j2store');
	}

	public function getCouponByCode($code) {
		$db = JFactory::getDbo ();
		$query = $db->getQuery ( true );
		$query->select ( '*' )->from ( '#__j2store_coupons' )->where ( 'coupon_code=' . $db->q ( $code ) )->where ( 'enabled=1' );
		$db->setQuery ( $query );
		$row = $db->loadObject ();
		return $row;

	}

	public function get_discount_amount($discounting_amount, $cartitem, $order, $single=true) {
		$discount = 0;
		$app = JFactory::getApplication();
		$params = J2Store::config();
		$session = JFactory::getSession();

			$sub_total = $order->subtotal;
			if ($this->coupon->value_type == 'F') {
				$this->coupon->value = min($this->coupon->value, $sub_total);
			}

			if ($this->coupon->value_type == 'F') {
				//TODO: Not sure this is correct. We have to apply the right discount value.

				$discount_percent = 0;
				if ( $order->subtotal_ex_tax ) {
					$product_helper = J2Store::product();
					$actual_price = ($cartitem->orderitem_price + $cartitem->orderitem_option_price);
					$price_for_discount = $product_helper->get_price_excluding_tax( ($actual_price * $cartitem->orderitem_quantity), $cartitem->orderitem_taxprofile_id);

					$discount_percent = ( $price_for_discount) / $order->subtotal_ex_tax;
					$discount = min( ( $this->coupon->value * $discount_percent ) / $cartitem->orderitem_quantity, $discounting_amount);
				}

				//$discount = $this->coupon->value * ($discounting_amount / $sub_total);
			} elseif ($this->coupon->value_type == 'P') {
				$discount = $discounting_amount / 100 * $this->coupon->value;
			}
			//has free shipping
			if($this->coupon->free_shipping) {
				$order->allow_free_shipping();
			}

		//allow plugins to modify the amount
		J2Store::plugin()->event('GetCouponDiscountAmount', array($discount, $discounting_amount, $cartitem, $order, $this, $single));
		return $discount;
	}

	protected function onAfterGetItem(&$record)
	{
		$record->product_category = explode(',',$record->product_category);
		$record->brand_ids = explode(',',$record->brand_ids);
	}

	public function getCouponHistory() {
		$app = JFactory::getApplication();
		$id = $app->input->getInt('coupon_id', 0);
		if($id < 1) return array();
		$coupon_history_model = F0FModel::getTmpInstance('Orderdiscounts', 'J2StoreModel');
		$items = $coupon_history_model->discount_entity_id($id)->discount_type('coupon')->getList();
		if(count($items)) {
			foreach($items as &$item) {
				$order = F0FTable::getAnInstance('Order', 'J2StoreTable')->getClone();
				$order->load(array('order_id'=>$item->order_id));
				$item->order = $order;
			}
		}
		return $items;
	}
}