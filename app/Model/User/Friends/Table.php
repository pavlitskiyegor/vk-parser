<?php

class User_Friends_Table extends Core_Db_Table_Abstract
{

	/**
	 * @var string
	 */
	protected $_tableName = 'user_friends';

	/**
	 * @var integer
	 */
	public $user1;

	/**
	 * @var string
	 */
	public $user2;

}
