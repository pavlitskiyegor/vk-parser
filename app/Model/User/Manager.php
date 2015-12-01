<?php

class User_Manager extends Core_Model_Manager
{

    use Core_Singleton;

    /**
     * @param string $firstName
     * @param string $middleName
     * @param string $lastName
     * @param string $description
     */
    public function add($uid, $firstName, $lastName, $photo, $status, $data)
    {

		$row = User_Table::findFirst($uid);

		$row = $row ? $row : (new User_Table());

		$row->data 			= $data;
		$row->id 			= $uid;
		$row->first_name 	= $firstName;
		$row->last_name 	= $lastName;
		$row->photo 		= $photo;
		$row->status 		= $status;
		$row->save();
    }
}