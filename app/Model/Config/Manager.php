<?php

class Config_Manager extends Core_Model_Manager
{

    use Core_Singleton;

    private function _getAnyKey($key)
    {
    	$tblConfg = $this->getTable();
    	$rowTitle = $tblConfg::findFirst(
    		array(
		        "key = '$key'"
		    )
    	);

    	if (!$rowTitle)
    	{
    		throw new Core_Exception('Config. Key is "' . $key . '" is missing');
    	}
    	$value = $rowTitle->getValue();

    	return $value;
    }

    public function editKey($key, $value)
    {
    	$tblConfig 	= $this->getTable();
    	$rowKey		= $tblConfig::findFirst(
    		array(
		        "key = '$key'"
		    )
    	);

    	if (!$rowKey)
    	{
    		throw new Core_Exception('Config. Key is "' . $key . '" is missing');
    	}

    	$rowKey->value = $value;
    	$rowKey->save();
    }

}