<?php
	ob_start();
	if(!isset($_SESSION)){session_start();}
	if($_SESSION["id"]==1){echo "<a href='cpanel/'>dashboard</a>";}
	include("cpanel/functions.php");
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title><?php echo blogName();?></title>
	<link rel="stylesheet" href="css/main.css" />
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<h1 class="blog-title"><?php echo blogName(); ?></h1>
			<h2 class="blog-description"><?php echo blogDesc(); ?></h2>
		</div>
