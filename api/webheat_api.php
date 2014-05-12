<?php
    require_once '../include/system/config.php';
	require_once 'api_class.php';
	
	foreach ($_POST as $key => $value) {
		
		if ($key == 'function') {
			$function = $value;
		} else {
			$params[$key] = $value;
		}
	}
	
	$response = new request_handler();
	echo $response->$function($params);
	
	/*
	HowTo:
	
	Send Array to API:
	
	array(
		'function' => $name,
		$param => $value
		...
	);
	
	Functions in api_class.php,s you will find!!
	
	*/
	
?>

