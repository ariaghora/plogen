<?php
	session_start();
	include("functions.php");
	if(! $_SESSION["id"]==1){
		header('Location: .');
	}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title></title>
		<link rel="stylesheet" href="cpanel.css" />
</head>
<body>
	<div class="box">
	<h1>Dashboard</h1>
	<h2></h2>
	<ul>
		<li><a href="../" target="blank">View blog (new tab)</a></li>
		<li><a href="compose.php?" >Write a new post</a></li>
        <li><a href="posts.php">Posts</a></li>
		<hr />
		
        <li><a href="logout.php">Logout</a></li>
	</ul>
	</div>
</body>
</html>
