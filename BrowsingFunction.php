<?php 
	function recordBrowsing($url)
	{
		if (isset($_SESSION['Browse'])) 
		{
			date_default_timezone_set('Asia/Yangon');
			$count = count($_SESSION['Browse']);
			if($count == 0)
			{
				$_SESSION['Browse'][0]['PageName'] = $url;
				$_SESSION['Browse'][0]['DateTime'] = date('Y-m-d h:i:s');
			}
			else
			{
				$_SESSION['Browse'][$count]['PageName'] = $url;
				$_SESSION['Browse'][$count]['DateTime'] = date('Y-m-d h:i:s');
			}
		}
		else
		{
			$_SESSION['Browse'] = array();
		}
	}
 ?>