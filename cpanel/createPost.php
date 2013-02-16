<?php
	ob_start();
	include("functions.php");
	include("checkLogin.php");

	$postContent = $_REQUEST["textArea"];
	
	if($_REQUEST["postFileName"]==""){
		$fileName = "posts/".getNewPostName();
	}else{
		$fileName = "posts/".$_REQUEST["postFileName"];	
	}
	
	$f = fopen($fileName,"w") or exit("cannot open file");

	//echo"file created: ".$fileName;
	fwrite($f, $postContent);	
	fclose($f);

	header('Location: admin.php');
?>
