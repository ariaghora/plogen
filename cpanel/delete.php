<?php
	ob_start();
	$fn = $_REQUEST["postFileName"]; //retrieve file name of a file we are deleting
	unlink("posts/".$fn);

	header("Location: posts.php");
?>
