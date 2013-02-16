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
			<h1>Write a New Post</h1>
			<form action="createPost.php<?php echo "?&postFileName=".$_REQUEST["postFileName"];?>"  method="post">
				<textarea id="text" name="textArea" name="post" style="width:100%;height:300px;"><?php echo textFromFile("posts/".$_REQUEST["postFileName"]);?></textarea><br/>
				<input type="submit" value="Publish" />
			</form>
			<hr />
			<a href="admin.php">Dashboard</a> | <a href="posts.php">All Posts</a>
	</div>
</body>
</html>
