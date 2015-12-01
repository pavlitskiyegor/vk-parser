<?php

class User_Friends_Manager extends Core_Model_Manager
{

    use Core_Singleton;

    /**
     * @param integer $user1
     * @param integer $user2
     */
    public function add($user1, $user2)
    {
		$row = new User_Friends_Table();

		$row->user1 = $user1;
		$row->user2 = $user2;
		$row->save();
    }
}