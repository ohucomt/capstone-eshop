<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	require("config.php");


	require("classes/bootstrap.php");
	require("classes/Controller.php");
	require('classes/ModelUn.php');

	require('Controllers/Home.php');
	require('controllers/Product.php');
	require('controllers/User.php');


	require("models/Home.php");
	require("models/Product.php");
	require("models/User.php");

	$bootstrap = new Bootstrap($_GET);

	$controller = $bootstrap->createController();
	if($controller){
		$controller->execAction();
	}
?>