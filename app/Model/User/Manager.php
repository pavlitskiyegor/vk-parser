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
    public function add($uid, $firstName, $lastName, $photo, $mobilePhone, $status)
    {

		$row = User_Table::findFirst(array(
	    			"conditions" => "uid = '$uid'"
	    		)
		);

		$row = $row ? $row : (new User_Table());

		$row
			->setUid($uid)
			->setFirstName($firstName)
			->setLastName($lastName)
			->setPhoto($photo)
			->setMobilePhone($mobilePhone)
			->setStatus($status)
			->save()
		;
    }
}