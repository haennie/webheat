<?php
session_start();
require_once("include/init.php");

require('header.php');
if($_SESSION['name']) {
	
	require_once 'menu.php';
	
	if ($_REQUEST['action'] && $_REQUEST['action'] != 'index') {
		require($_REQUEST['action'].'.php');
	}
	else {
		require('home.php');

	}
}
else {
	require('login.php');
}

?>