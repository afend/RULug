<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
// No direct access to this file
defined('_JEXEC') or die;
require_once(JPATH_ADMINISTRATOR.'/components/com_j2store/controllers/productbase.php');

//print_r($_POST); exit;
class J2StoreControllerProducts extends J2StoreControllerProductsBase
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->cacheableTasks = array();
	}

	public function execute($task)
	{
		return parent::execute($task);
	}

	public function create() {
		$url = 'index.php?option=com_content&view=article&layout=edit';
		$this->setRedirect($url);
	}

	public function browse()
	{
		$app = JFactory::getApplication();
			$model = $this->getThisModel();
			$state = $this->getFilterStates();
			foreach($state as $key => $value){
				$model->setState($key,$value);
			}
			$product_types  = $model->getProductTypes();
			array_unshift($product_types, JText::_('J2STORE_SELECT_OPTION'));

			$products = $model->getProductList();

			$view = $this->getThisView();
			$view->setModel($model);
			$view->assign('products',$products);
			$view->assign('state', $model->getState());
			$view->assign('product_types',$product_types);
			return parent::browse();

	}



}
