<?php
	ob_start();
	if(!isset($_SESSION)){session_start();}
	include("functions.php");
	$pUserName = userName();
	$pPassword = password();
	$userName = $_REQUEST["userName"];
	$password = $_REQUEST["password"];


	if(($userName==$pUserName) && ($password==$pPassword)){
		$_SESSION["id"]=1;
		header('Location: admin.php');
	}else{
		header('Location: .');
	}
?>
