<?php
//	error_reporting(E_ALL);
//	ini_set("display_errors", 1);
// var_dump($_GET);
	$root = $_SERVER['DOCUMENT_ROOT']."/";
	require_once $root.'backends/admin-backend.php';
	require_once $root.'/'.'views/back/Layout_View.php';
	$option 	= 'member-detail';
	
	$data 		= $backend->loadBackend($option);
	
	$view 		= new Layout_View($data, 'Members');
	
	echo $view->printHTMLPage('member-detail');