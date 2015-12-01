<?php

class Friends_Manager extends Core_Model_Manager
{

    use Core_Singleton;

    /**
     * @param integer $user1
     * @param integer $user2
     */
    public function add($user1, $user2)
    {
		$row = new Friends_Table();

		$row
			->setUser1($user1)
			->setUser2($user2)
			->save()
		;
    }
}