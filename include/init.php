<?php
	
	//load include folder
    require_once 'include/system/config.php';
	foreach (glob("include/*/*.php") as $path) {
		require_once $path;
	}

	//Set Globals
	$GLOBALS['db'] = new db();
	

	//load language
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

	$lang_directorys = glob("language/".$lang."_*.php");

	if(!empty($lang_directorys)) {

		foreach ($lang_directorys as $path) {
			require_once $path;
		}	
	}
	else {

		$lang_directorys = glob("language/".LANG_DEFAULT."_*.php");

		foreach ($lang_directorys as $path) {
			require_once $path;
		}

	}
	
?>