<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */
// No direct access to this file
defined('_JEXEC') or die;
class J2StoreModelMyProfiles extends F0FModel {

	/**
	 *  Method for building Query object
	 *  @retun Query object joomla's default query Object
	 */
	public function getAddress()
	{
		/** Get a DB Object */
		$db = JFactory::getDbo();

		/** get the current query Object **/
		$query = $db->getQuery(true);

		/** Add a single column, or array of columns to the SELECT clause of the query */
		$query->select('a.*')->from('#__j2store_addresses AS a');

		/**  Add a LEFT JOIN clause to the query */
		$query->leftJoin('#__j2store_countries AS c ON c.j2store_country_id = a.country_id');

		$query->select('c.country_name');
		$query->leftJoin('#__j2store_zones AS z ON z.j2store_zone_id=a.zone_id');
		$query->select('z.zone_name');
		$this->_buildWhere($query);
		$db->setQuery($query);
		return $db->loadObjectList();
	}

	public function _buildWhere(&$query){
		$db = JFactory::getDbo();
		$user = JFactory::getUser();

		$query->where('a.email='.$db->quote($user->email))
			  ->where('a.user_id='.$db->quote($user->id));
	}
}
