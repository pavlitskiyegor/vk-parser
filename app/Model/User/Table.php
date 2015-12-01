<?php

class User_Table extends Core_Db_Table_Abstract
{

	/**
	 * @var string
	 */
	protected $_tableName = 'user';

	/**
	 * @var string
	 */
	private $first_name;

	/**
	 * @var string
	 */
	private $last_name;

	/**
	 * @var string
	 */
	private $photo;

	/**
	 * @var string
	 */
	private $mobile_phone;

	/**
	 * @var string
	 */
	private $status;

	public function beforeSave()
    {
        if ($this->getMobilePhone() == '')
        {
        	$this->setMobilePhone(NULL);
        }
    }

    public function afterSave()
    {
    	$friendsManager = Friends_Manager::getInstance();

    	$vk = VK_VK::getInstance();
    	$friends = $vk->api(
    		'friends.get',
    		array(
    			'user_id' => $this->getUid()
    		)
    	);

    	if (!array_key_exists('response', $friends))
    	{
    		return;
    	}

    	foreach ($friends['response'] as $friend)
    	{
			$friendsManager->add($this->getUid(), $friend);
    	}
    }

    /**
     * Method to set the value of field id
     *
     * @param string $name
     * @return $this
     */
    public function setFirstName($name)
    {
        $this->first_name = $name;

        return $this;
    }

    /**
     * Method to set the value of field id
     *
     * @param string $name
     * @return $this
     */
    public function setLastName($name)
    {
        $this->last_name = $name;

        return $this;
    }

    /**
     * Method to set the value of field id
     *
     * @param string $url
     * @return $this
     */
    public function setPhoto($url)
    {
        $this->photo = $url;

        return $this;
    }

    /**
     * Method to set the value of field id
     *
     * @param string $numbers
     * @return $this
     */
    public function setMobilePhone($nubmers)
    {
        $this->mobile_phone = $nubmers;

        return $this;
    }

    /**
     * Method to set the value of field id
     *
     * @param string $numbers
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Returns the value of field id
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Returns the value of field id
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Returns the value of field id
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobile_phone;
    }

    /**
     * Returns the value of field id
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

}
