<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require "Config/Autoload.php";
	require "Config/Config.php";

	$opt = array(
		"http" => array(
		  "method" => "GET",
		  "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
		)
	);
	
	$ctx = stream_context_create($opt);
	
	$json = file_get_contents("https://utn-students-api.herokuapp.com/api/Career", false, $ctx);
	
	$nuevoArray = ($json) ? json_decode($json, true) : array();

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
		
	Autoload::start();

	session_start();

	require_once(VIEWS_PATH."header.php");

	Router::Route(new Request());

	require_once(VIEWS_PATH."footer.php");
?>