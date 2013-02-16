<?php
	session_start();
	if($_SESSION["id"]==1){
		header('Location: admin.php');
	}
	include("functions.php");
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Plogen Login</title>
		<link rel="stylesheet" href="cpanel.css" />
</head>
<body>
	<div class="login-box">
	<center><b>Plogen Login</b></center>
	<form action="login.php" method="post">
		<input type="text" name="userName" placeholder="username" autocomplete="off"/><br />
		<input type="password" name="password" placholder="password" /><br />
		<input type="submit" />
	</form>
	</div>
</body>
</html>
