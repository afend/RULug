<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
// No direct access to this file
defined('_JEXEC') or die;
class J2StoreControllerCpanels extends F0FController
{
	 public function execute($task) {
		if(!in_array($task, array('browse' ,'getEupdates'))) {
			$task = 'browse';
		}
		parent::execute($task);
	}

	protected function onBeforeBrowse() {
		$db = JFactory::getDbo();

		$config = J2Store::config();
		$installation_complete = $config->get('installation_complete', 0);
		if(!$installation_complete) {
			//installation not completed
			JFactory::getApplication()->redirect('index.php?option=com_j2store&view=postconfig');
		}

		//first check if the currency table has a default records at least.
		$rows = F0FModel::getTmpInstance('Currencies', 'J2StoreModel')->enabled(1)->getList();
		if(count($rows) < 1) {
			//no records found. Dumb default data
			F0FModel::getTmpInstance('Currencies', 'J2StoreModel')->create_currency_by_code('USD', 'USD');
		}
		//update schema
		$dbInstaller = new F0FDatabaseInstaller(array(
				'dbinstaller_directory'	=> JPATH_ADMINISTRATOR . '/components/com_j2store/sql/xml'
		));
		$dbInstaller->updateSchema();

		//update cart table
		$cols = $db->getTableColumns('#__j2store_carts');
		$cols_to_delete = array('product_id', 'vendor_id', 'variant_id', 'product_type', 'product_options', 'product_qty');
		foreach($cols_to_delete as $key) {
			if(array_key_exists($key, $cols)) {
				$db->setQuery('ALTER TABLE #__j2store_carts DROP COLUMN '.$key);
				try {
					$db->execute();
				}catch(Exception $e) {
					echo $e->getMessage();
				}
			}
		}
		$this->migrate_order_coupons();
		$this->migrate_order_vouchers();

		return parent::onBeforeBrowse();
	}

	public function migrate_order_coupons() {
		$db = JFactory::getDbo ();

		$tables = $db->getTableList ();
		// get prefix
		$prefix = $db->getPrefix ();

		// let us back up the table first
		if (! in_array ( $prefix . 'j2store_backup_ordercoupons', $tables ) && in_array ( $prefix . 'j2store_ordercoupons', $tables )) {
			$db->setQuery ( 'CREATE TABLE #__j2store_backup_ordercoupons LIKE #__j2store_ordercoupons' );
			$db->execute ();
			$db->setQuery ( 'INSERT #__j2store_backup_ordercoupons SELECT * FROM #__j2store_ordercoupons' );
			$db->execute ();
		}

		if (in_array ( $prefix . 'j2store_ordercoupons', $tables )) {

			$query = $db->getQuery ( true )->select ( '*' )->from ( '#__j2store_ordercoupons' );
			$db->setQuery ( $query );
			$ordercoupons = $db->loadObjectList ();

			$migrated_coupons = array ();
			if (count ( $ordercoupons ) > 0) {
				foreach ( $ordercoupons as $coupon ) {
					unset ( $table );
					$table = F0FTable::getInstance ( 'Orderdiscount', 'J2StoreTable' )->getClone ();
					$table->load ( array (
							'order_id' => $coupon->order_id,
							'discount_type' => 'coupon'
					) );
					$table->order_id = $coupon->order_id;
					$table->discount_type = 'coupon';
					$table->discount_code = $coupon->coupon_code;
					$table->discount_title = $coupon->coupon_code;
					$table->discount_value = $coupon->value;
					$table->discount_value_type = $coupon->value_type;
					$table->discount_entity_id = $coupon->coupon_id;
					$table->discount_customer_email = $coupon->customer_email;
					$table->user_id = $coupon->customer_id;
					$table->discount_amount = $coupon->amount;
					if ($table->store ()) {
						$migrated_coupons [] = $coupon->j2store_ordercoupon_id;
					}
				}

				if (count ( $migrated_coupons )) {
					// now delete the records of succesfully migrated order coupons
					$query = $db->getQuery ( true )->delete ( '#__j2store_ordercoupons' )->where ( 'j2store_ordercoupon_id IN (' . implode ( ',', $migrated_coupons ) . ')' );
					$db->setQuery ( $query );
					try {
						$db->execute ();
					} catch ( Exception $e ) {
						// was not able to delete. So remove one by one.
						$model = F0FModel::getTmpInstance ( 'Ordercoupons', 'J2StoreModel' );
						$model->setIds ( $migrated_coupons );
						$model->delete ();
					}
				}
			}
		}
	}

	public function migrate_order_vouchers() {
		$db = JFactory::getDbo ();

		$tables = $db->getTableList ();
		// get prefix
		$prefix = $db->getPrefix ();

		// let us back up the table first
		if (! in_array ( $prefix . 'j2store_backup_voucherhistories', $tables ) && in_array ( $prefix . 'j2store_voucherhistories', $tables )) {
			$db->setQuery ( 'CREATE TABLE #__j2store_backup_voucherhistories LIKE #__j2store_voucherhistories' );
			$db->execute ();
			$db->setQuery ( 'INSERT #__j2store_backup_voucherhistories SELECT * FROM #__j2store_voucherhistories' );
			$db->execute ();
		}

		if (in_array ( $prefix . 'j2store_voucherhistories', $tables )) {

			$query = $db->getQuery ( true )->select ( '*' )->from ( '#__j2store_voucherhistories' );
			$db->setQuery ( $query );
			$vouchers = $db->loadObjectList ();

			$migrated_vouchers = array ();
			if (count ( $vouchers ) > 0) {
				foreach ( $vouchers as $voucher ) {
					unset ( $table );
					$table = F0FTable::getInstance ( 'Orderdiscount', 'J2StoreTable' )->getClone ();
					$table->load ( array (
							'order_id' => $voucher->order_id,
							'discount_type' => 'voucher'
					) );
					$table->order_id = $voucher->order_id;
					$table->discount_type = 'voucher';
					$table->discount_code = $voucher->voucher_code;
					$table->discount_title = $voucher->voucher_code;
					$table->discount_entity_id = $voucher->voucher_id;
					$table->discount_customer_email = $voucher->voucher_to_email;
					$table->user_id = $voucher->created_by;
					$table->discount_amount = abs ( $voucher->amount );
					if ($table->store ()) {
						$migrated_vouchers [] = $voucher->j2store_voucherhistory_id;
					}
				}

				if (count ( $migrated_vouchers )) {
					// now delete the records of succesfully migrated order coupons
					$query = $db->getQuery ( true )->delete ( '#__j2store_voucherhistories' )->where ( 'j2store_voucherhistory_id IN (' . implode ( ',', $migrated_vouchers ) . ')' );
					$db->setQuery ( $query );
					try {
						$db->execute ();
					} catch ( Exception $e ) {
						// was not able to delete. So remove one by one.
						$model = F0FModel::getTmpInstance ( 'Voucherhistories', 'J2StoreModel' );
						$model->setIds ( $migrated_vouchers );
						$model->delete ();
					}
				}
			}
		}
	}


	public function getEupdates(){
		$app = JFactory::getApplication();
		$eupdate_model = F0FModel::getTmpInstance('Eupdates','J2StoreModel');
		$list = $eupdate_model->getUpdates();		
		$total = count($list);
		$json =array();		
		if($total > 0){
			$json['total'] = $total;
		}
		echo json_encode($json);
		$app->close();
	}

}