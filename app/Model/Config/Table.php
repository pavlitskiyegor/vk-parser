<?php

class Config_Table extends Core_Db_Table_Abstract
{

	/**
	 * @var string
	 */
	protected $_tableName = 'config';

    /**
     *
     * @var string
     */
    private $key;

    /**
     *
     * @var string
     */
    private $value;

    /**
     * Method to set the value of field id
     *
     * @param string $key
     * @return $this
     */
    public function setKey($key)
    {
    	$this->key = $key;

    	return $this;
    }

    /**
     * Method to set the value of field id
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
    	$this->value = $value;

    	return $this;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getKey()
    {
    	return $this->key;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getValue()
    {
    	return $this->value;
    }

}
