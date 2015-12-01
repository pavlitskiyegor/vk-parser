<?php

class User_Contact_Manager extends Core_Model_Manager
{

    use Core_Singleton;

    /**
     * @param string $type
     * @param User_Contact_Enum $value
     */
    public function add($userId, $type, $value)
    {
		$row = new User_Contact_Table();

		$row->user_id = $userId;
		$row->type = $type;
		$row->value = $value;
		$row->save();
    }
}