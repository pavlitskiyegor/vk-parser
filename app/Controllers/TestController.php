<?php

class TestController extends Core_Controller_Abstract
{

    public function indexAction()
    {
			if (ob_get_level() == 0) ob_start();

for ($i = 0; $i<10; $i++){

        echo "<br> Line to show.";
        echo str_pad('',4096)."\n";

        ob_flush();
        flush();
        sleep(2);
}

echo "Done.";

ob_end_flush();
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