<?php

class ParserController extends Core_Controller_Abstract
{

    public function runAction()
    {
    	header("X-Progress-Max: 1000", true, 200);
		$this->ob_ignore(str_repeat(' ', 20));

    	$vk = new VK_VK('4931681', 'H0GOhx4hR8EQ8CQkDfMt');

    	$countMissingUser = 0;

    	$userId = 1;

    	$manager = User_Manager::getInstance();

    	while ($userId <= 1000)
    	{
    		$user = $vk->api(
    			'users.get',
    			array(
    				'uid' => $userId,
    				'fields' => 'photo_max_orig, contacts'
    			)
    		) ['response'][0];
//     		var_dump($user);
//     		die();

    		$uid 			= $user['uid'];
    		$firstName 		= $user['first_name'];
    		$lastName 		= $user['last_name'];
    		$mobilePhone 	= array_key_exists('home_phone', $user) ? $user['home_phone'] : null;
    		$photo 			= array_key_exists('photo_max_orig', $user) ? $user['photo_max_orig'] : null;

    		if (array_key_exists('deactivated', $user))
    		{
    			$status = User_Status_Enum::DEACTIVATED;
	    		$countMissingUser++;
    		}
    		else
    		{
    			$status = User_Status_Enum::NORMAL;
    			$countMissingUser = 0;
    		}

			$manager->add($uid, $firstName, $lastName, $photo, $mobilePhone, $status);

			$userId++;
			$this->ob_ignore(' ');
    	}
    }

    private function ob_ignore($data)
    {
    	$ob = array();
    	while (ob_get_level())
    	{
    		array_unshift($ob, ob_get_contents());
    		ob_end_clean();
    	}

    	echo $data;

    	flush();
    }

}