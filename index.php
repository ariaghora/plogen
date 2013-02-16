<?php include("header.php");?>

		<div id="content">

			<?php foreach($posts as $post){?>
			<div class="post-entry">
				<h1 class="post-entry-title"><?php echo $post->title; ?></h1> <!-- show the post's title-->
				<p><?php echo $post->summary;?> <span class="more"> ... <a href="#">read more &raquo;</a></span> </p> <!--post summary-->
			</div>
			<?php } ?>
		</div>

<?php include("footer.php");?>
