<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
// No direct access to this file
defined('_JEXEC') or die;

class J2StoreControllerCarts extends F0FController
{

	public function addItem() {

		$app = JFactory::getApplication();		
		
		$model = $this->getModel('Carts', 'J2StoreModel');
		$result = $model->addCartItem();
		$registry = new JRegistry();
		if(is_object($result)) {
			$registry->loadObject($result);
			$json = $registry->toArray();
		} elseif(is_array($result)) {
			$json = $result;
		}else {
			$json = $result;
		}

		$config = J2Store::config();
		$cart_url = $model->getCartUrl();

		//if javascript submissions is not enabled
		$ajax = $app->input->getInt('ajax', 0);
		if($ajax) {
			if(isset($json['success'])) {
				if($config->get('addtocart_action', 3) == 3 ) {
					$json['redirect'] = $cart_url;
				}
			}
			$json['product_redirect'] = JRoute::_('index.php?option=com_j2store&view=product&id='.$this->input->getInt('product_id'));
			echo json_encode($json);
			$app->close();
		} else {
			$return = $app->input->getBase64('return');
			if(!is_null($return)) {
				$return_url = base64_decode($return);
			} else {
				$return_url = $cart_url;
			}

			if($json['success']) {
				$this->setRedirect($cart_url, JText::_('J2STORE_ITEM_ADDED_TO_CART'), 'success');
			} elseif($json['error']) {
				$error = J2Store::utilities()->errors_to_string($json['error']);
				$this->setRedirect($return_url , $error, 'error');
			}else {
				$this->setRedirect($return_url);
			}
		}
	}
	/**
	 * force shipping
	 *   */
	function forceshipping(){
		$json = array();
		$app = JFactory::getApplication();
		$json = J2Store::plugin()->eventWithArray('ValidateShipping');
		echo json_encode($json);
		$app->close();
	}
	function update() {

		//first clear cache
		J2Store::utilities()->clear_cache();
		J2Store::utilities()->nocache();
		
		$model = $this->getModel('Carts');
		$result = $model->update();
		if(isset($result['error'])) {
			$msg = $result['error'];
		} else {
			$msg = JText::_('J2STORE_CART_UPDATED_SUCCESSFULLY');
		}
		$url = $model->getCartUrl();
		$this->setRedirect($url, $msg, 'notice');
	}

	function remove() {
		J2Store::utilities()->clear_cache();
		J2Store::utilities()->nocache();		
		
		$model = $this->getModel('Carts' ,'J2StoreModel');
		if($model->deleteItem()) {
			$msg = JText::_('J2STORE_CART_UPDATED_SUCCESSFULLY');
		}else {
			$msg = $model->getError();
		}
		$url = $model->getCartUrl();
		$this->setRedirect($url, $msg, 'notice');
	}

	function ajaxmini() {
		J2Store::utilities()->nocache();
		//initialise system objects
		$app = JFactory::getApplication();
		$document	= JFactory::getDocument();

		$db = JFactory::getDbo();
		$language = JFactory::getLanguage()->getTag();
		$query = $db->getQuery(true);
		$query->select('*')->from('#__modules')->where('module='.$db->q('mod_j2store_cart'))->where('published=1')
		->where('language='.$db->q($language));
		$db->setQuery($query);
		$modules = $db->loadObjectList();
		if(count($modules) < 1) {
			$query = $db->getQuery(true);
			$query->select('*')->from('#__modules')->where('module='.$db->q('mod_j2store_cart'))->where('published=1')
			->where('language="*" OR language="en-GB"');
			$db->setQuery($query);
			$modules = $db->loadObjectList();
		}

		$renderer	= $document->loadRenderer('module');
		$json = array();
		if (count($modules) < 1)
		{
			$json['response'] = ' ';
		} else {
			foreach($modules as $module) {
				$app->setUserState( 'mod_j2store_mini_cart.isAjax', '1' );
				$json['response'][$module->id] = $renderer->render($module);
			}
			echo json_encode($json);
			$app->close();

		}
		$app->close();
	}

	function setcurrency() {

		//no cache
		J2Store::utilities()->clear_cache();
		J2Store::utilities()->nocache();
		
		$app = JFactory::getApplication();
		$currency = J2Store::currency();
		$post = $app->input->getArray($_POST);
		if(isset($post['currency_code'])) {
			$currency->set($post['currency_code']);
		}

		//get the redirect
		if(isset($post['redirect'])) {
			$url = base64_decode($post['redirect']);
		} else {
			$url = 'index.php';
		}

		$app->redirect($url);
	}

	function applyCoupon() {

		//first clear cache
		J2Store::utilities()->nocache();
		J2Store::utilities()->clear_cache();
		
		$session = JFactory::getSession();
		$model = F0FModel::getTmpInstance('Carts', 'J2StoreModel');
		//coupon
		$post_coupon = $this->input->getString('coupon', '');
		//first time applying? then set coupon to session
		if (isset($post_coupon) && !empty($post_coupon)) {
			$session->set('coupon', $post_coupon, 'j2store');
		}

		$url = $model->getCartUrl();
		$this->setRedirect($url);
	}

	function removeCoupon() {
		
		//first clear cache
		J2Store::utilities()->nocache();
		J2Store::utilities()->clear_cache();
		$model = $this->getModel('Carts' ,'J2StoreModel');
		//coupon
		$session = JFactory::getSession();
		if($session->has('coupon', 'j2store')) {
			$session->clear('coupon', 'j2store');
			$msg = JText::_('J2STORE_COUPON_REMOVED_SUCCESSFULLY');
			$msgType = 'success';
		}else {
			$msg = JText::_('J2STORE_PROBLEM_REMOVING_COUPON');
			$msgType = 'notice';
		}
		$url = $model->getCartUrl();
		$this->setRedirect($url, $msg, $msgType);
	}

	function applyVoucher() {

		//first clear cache
		J2Store::utilities()->nocache();
		J2Store::utilities()->clear_cache();
		
		$session = JFactory::getSession();
		$model = F0FModel::getTmpInstance('Carts', 'J2StoreModel');
		//coupon
		$voucher = $this->input->getString('voucher', '');
		//first time applying? then set coupon to session
		if (isset($voucher) && !empty($voucher)) {
				$session->set('voucher', $voucher, 'j2store');
		}

		$url = $model->getCartUrl();
		$this->setRedirect($url, $msg, $msgType);
	}

	function removeVoucher() {
		
		//first clear cache
		J2Store::utilities()->nocache();
		J2Store::utilities()->clear_cache();
		
		$model = $this->getModel('Carts' ,'J2StoreModel');
		//coupon
		$session = JFactory::getSession();
		if($session->has('voucher', 'j2store')) {
			$session->clear('voucher', 'j2store');
			$msg = JText::_('J2STORE_VOUCHER_REMOVED_SUCCESSFULLY');
			$msgType = 'success';
		}else {
			$msg = JText::_('J2STORE_PROBLEM_REMOVING_VOUCHER');
			$msgType = 'notice';
		}
		$url = $model->getCartUrl();
		$this->setRedirect($url, $msg, $msgType);
	}

	function estimate() {
		
		//first clear cache
		J2Store::utilities()->nocache();
		J2Store::utilities()->clear_cache();
		
		$model = $this->getModel('Carts' ,'J2StoreModel');
		$app = JFactory::getApplication();
		$session = JFactory::getSession();
		$country_id = $this->input->getInt('country_id', 0);
		$zone_id = $this->input->getInt('zone_id', 0);
		$postcode  = $this->input->getString('postcode', 0);
	
		
		$json = array();
		if(!$country_id) $json['error']['country_id'] = JText::_('J2STORE_ESTIMATE_COUNTRY_REQUIRED');
		if(!$zone_id) $json['error']['zone_id'] = JText::_('J2STORE_ESTIMATE_ZONE_REQUIRED');
		
		$params = J2Store::config();
		if($params->get('postalcode_required', 1) && empty($postcode)) {
			$json['error']['postcode'] = JText::_('J2STORE_ESTIMATE_POSTALCODE_REQUIRED');
		}
		
		if(!$json) {
		
			if($country_id || $zone_id) {
				if($country_id) {
					$session->set('billing_country_id', $country_id, 'j2store');
					$session->set('shipping_country_id', $country_id, 'j2store');
				}
	
				if($zone_id) {
					$session->set('billing_zone_id', $zone_id, 'j2store');
					$session->set('shipping_zone_id', $zone_id, 'j2store');
				}
	
				$session->set('force_calculate_shipping', 1, 'j2store');
			}
	
			if($postcode) {
				$session->set('shipping_postcode', $postcode, 'j2store');
				$session->set('billing_postcode', $postcode, 'j2store');
			}
			$url = $model->getCartUrl();
			$json['redirect'] = $url;
		}
		echo json_encode($json);
		$app->close();

	}

	function shippingUpdate() {
		
		//first clear cache
		J2Store::utilities()->nocache();
		J2Store::utilities()->clear_cache();
		
		$model = $this->getModel('Carts' ,'J2StoreModel');
		$app = JFactory::getApplication();
		$session = JFactory::getSession();
		$values = $this->input->getArray($_REQUEST);
		$shipping_values = array();
		$shipping_values['shipping_price']    = isset($values['shipping_price']) ? $values['shipping_price'] : 0;
		$shipping_values['shipping_extra']   = isset($values['shipping_extra']) ? $values['shipping_extra'] : 0;
		$shipping_values['shipping_code']     = isset($values['shipping_code']) ? $values['shipping_code'] : '';
		$shipping_values['shipping_name']     = isset($values['shipping_name']) ? $values['shipping_name'] : '';
		$shipping_values['shipping_tax']      = isset($values['shipping_tax']) ? $values['shipping_tax'] : 0;
		$shipping_values['shipping_plugin']     = isset($values['shipping_plugin']) ? $values['shipping_plugin'] : '';
		$session->set('shipping_values', $shipping_values, 'j2store');

		$redirect = $model->getCartUrl();
		echo json_encode(array('redirect'=>$redirect));
		$app->close();
	}

	public function getCountry() {

		$app = JFactory::getApplication();
		$country_id =$this->input->getInt('country_id');
		$country_info = F0FModel::getTmpInstance('Countries', 'J2StoreModel')->getItem($country_id);
		$json = array();
		if ($country_info) {
			$zones = F0FModel::getTmpInstance('Zones', 'J2StoreModel')
								->enabled(1)
								->country_id($country_id)
								->getList();
			if(isset($zones) && is_array($zones)) {
				$json = array(
					'country_id'        => $country_info->j2store_country_id,
					'name'              => $country_info->country_name,
					'iso_code_2'        => $country_info->country_isocode_2,
					'iso_code_3'        => $country_info->country_isocode_3,
					'zone'              => $zones
				);
			}
		}
		echo json_encode($json);
		$app->close();
	}

	/**
	 * Method to check file upload
	 *
	 */
	public function upload(){

		$files = $this->input->files->get('file');
		$json = array();
		if($files) {
			$model = $this->getModel('Carts');
			$json = $model->validate_files($files);
		}
		echo json_encode($json);
		JFactory::getApplication()->close();
	}
	
	public function addtowishlist() {
		
		$app = JFactory::getApplication();
		$model = $this->getModel('Carts', 'J2StoreModel');
		$model->setCartType('wishlist');
		$result = $model->addCartItem();
		$json = J2Store::plugin()->eventWithArray('AfterAddingToWishlist', array($result));
		echo json_encode($json);
		$app->close();
	}

}
