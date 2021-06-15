<?php
session_start();

if (empty($_SESSION['id_user']) || !isset($_SESSION['id_user'])) {
	header("Location: signin.php");
}

require_once 'model/db.php';

$controller = 'dashboard';

if (!isset($_REQUEST['c'])) 
{	
	require_once "controller/$controller.controller.php";
	$controller = ucwords($controller).'Controller';
	$controller = new $controller;
	$controller->Index();	
}
else
{
	$controller = strtolower($_REQUEST['c']);
	$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
	require_once "controller/$controller.controller.php";
	$controller = ucwords($controller).'Controller';
	$controller = new $controller;

	call_user_func(array($controller, $accion));
}

?>