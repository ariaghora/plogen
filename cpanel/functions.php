<?php
	error_reporting(E_ERROR);

/********************************************************
	Configuration and functions goes here
********************************************************/

//=========================================================
// Set your blog configs here
//=========================================================

	$blogName			= "Plogen Blog";
	$blogDesc			= "a little silly blog";
	$userName			= "plogen";
	$password			= "";
	$postDisplayNum		= 5; //number of posts displayed on index
	$summaryLength		= 200; //length of post summary
	
	
//==========================================================
// includes
//==========================================================

	include("markdown.php"); //markdown. why not?

//==========================================================
// functions goes here
//==========================================================

	//=== some of these might be useful for you later
	function blogName(){global $blogName; return $blogName;}
	function blogDesc(){global $blogDesc; return $blogDesc;}
	function userName(){global $userName; return $userName;}
	function password(){global $password; return $password;}
	//=====================================================
	
	// get content of post based on filename
	function textFromFile($fname){
		$fhandle = fopen($fname,"r");
		$content = fread($fhandle,filesize($fname));	
		fclose($fhandle);
		return $content;
	}
	
	//get filename for newly created post based on datetime 'YmdHis' format
	function getNewPostName(){
		$date = new DateTime();
		$result = $date->format('YmdHis');
		return $result.".md";
	}

	//get post title of a post file name
	function getPostTitle($post){
		$fh = fopen($post,"r");
		$tmp = fread($fh,filesize($post));
		$txt=explode("{",$tmp);
		$txt2=explode("}",$txt[1]);
		if($txt2[0]!=''){			
			return trim($txt2[0]);		
		}
		else{
			return "<span style='color:red;'><i>untitled</i></span>" ;
		}
	}
	
	//posts thingy
	$posts=array(); //array that holds posts
	class Post{
		var $title;
		var $summary;
		var $content;
		var $date;
		function setTitle($title){
			$this->title=$title;
		}
		function setContent($content){
			$this->content=$content;
			$end = strpos($this->content,"}")+1;
			$this->content=substr($content,$end);
		}
		function setSummary($summary){
			global $summaryLength;
			$sum = substr($this->content,0,$summaryLength);
			$this->summary=$sum;
			//echo substr($sum,0,10);
		}
	}
	//function to fill posts array
	function appendPosts($dir){
		$aposts = glob($dir . "*.md");
		global $posts;
		rsort($aposts);
		foreach($aposts as $apost){
			$post = new Post;
			$post->setTitle(getPostTitle($apost));
			$post->setContent(markdown(textFromFile($apost)));
			$post->setSummary(markdown($apost));
			array_push($posts,$post);
		}
	}
	//now... fill that shit
	appendPosts("cpanel/posts/");

	// list post entries on posts list page.
	// don't bother following things if you don't know 
	// what you're doing, or I have a bad news for you
	$GLOBALS['postNum']=0;
	function listPosts($dir){
		$posts = glob($dir . "*.md");
		rsort($posts);
		foreach($posts as $post){
			$GLOBALS['postNum']++;
			echo "<a href=''>".getPostTitle($post)."</a> | <a href=compose.php?newpost=no&postFileName=".basename($post).">Edit</a> | <a href=\"#\" onclick='confirmDelete(\"".basename($post)."\")'>Delete</a></br>";
		}
	}	

?>
