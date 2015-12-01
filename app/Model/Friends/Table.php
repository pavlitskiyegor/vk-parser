<?php

class Friends_Table extends Core_Db_Table_Abstract
{

	/**
	 * @var string
	 */
	protected $_tableName = 'friends';

	/**
	 * @var integer
	 */
	private $user1;

	/**
	 * @var string
	 */
	private $user2;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setUser1($id)
    {
        $this->user1 = $id;

        return $this;
    }
    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setUser2($id)
    {
        $this->user2 = $id;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getUser1()
    {
        return $this->user1;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getUser2()
    {
        return $this->user2;
    }

}
