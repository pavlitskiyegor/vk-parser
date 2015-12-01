<?php

class User_Contact_Table extends Core_Db_Table_Abstract
{

	/**
	 * @var string
	 */
	protected $_tableName = 'user_contact';

	/**
	 * @var integer
	 */
	public $user_id;
	/**
	 * @var User_Contact_Enum
	 */
	public $type;

	/**
	 * @var string
	 */
	public $value;

}
