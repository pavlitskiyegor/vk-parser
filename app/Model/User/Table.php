<?php

class User_Table extends Core_Db_Table_Abstract
{

	/**
	 * Хранит в себе response полученный от VK API
	 * @var array
	 */
	public $data;

	/**
	 * @var string
	 */
	protected $_tableName = 'user';

	/**
	 * @var string
	 */
	public $first_name;

	/**
	 * @var string
	 */
	public $last_name;

	/**
	 * @var string
	 */
	public $photo;

	/**
	 * @var string
	 */
	public $status;

    public function afterSave()
    {
		$this->_addFriends();
		$this->_addContact();
    }

    private function _addContact()
    {
    	$arrContactEnum = User_Contact_Enum::getInstance()->getAll();

    	foreach ($arrContactEnum as $contactEnumKey => $contactEnumValue)
    	{
    		$type = strtolower($contactEnumKey);

	    	if (!array_key_exists($type, $this->data))
	    	{
				continue;
	    	}

	    	User_Contact_Manager::getInstance()->add($this->id, $contactEnumValue, $this->data[$type]);
    	}
    }

    /**
     * Добавляет друзей в таблицу "user_friends" по текущему пользователю
     */
    private function _addFriends()
    {
		$userId = $this->id;

    	$vk = VK_VK::getInstance();
    	$friends = $vk->api(
    		'friends.get',
    		array(
    			'user_id' => $userId
    		)
    	);

    	if (!array_key_exists('response', $friends))
    	{
    		return;
    	}

    	foreach ($friends['response'] as $friend)
    	{
    		User_Friends_Manager::getInstance()->add($userId, $friend);
    	}
    }

}
