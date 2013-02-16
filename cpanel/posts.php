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
        <title>Plogen - Edit Posts</title>
		<link rel="stylesheet" href="cpanel.css" />
</head>
<body>
	<div class="box">
	<h1>Edit Posts</h1>
	<?php 
		listPosts("posts/");
	?>
	<hr />
	
	<a href="admin.php">Dashboard</a>

	<script type="text/javascript">
		function confirmDelete(a){
			var deleteIt = confirm("Are you sure want to delete this post? This process cannot be undone.");
			if(deleteIt){
				location.href="delete.php?postFileName="+a;
			}
			return true;
		}
	</script>
	</div>

</body>
</html>
