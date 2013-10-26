<?php $page = "Photos"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php page_count("photos"); ?>
<?php include_once('includes/header.php'); ?>

<div id="content_area" class="grid_8">
<?php
if(!isset($_GET['album_id'])){	
	$query = "SELECT * 
 		      FROM  `photo_albums` 
		  	  ORDER BY  `photo_albums`.`order_id` ASC";	
		  
	$result = mysql_query($query, $connection);
	confirm_query($result);
		
	while($album = mysql_fetch_array($result)){
	$query = "SELECT * 
	 	  FROM  `photos` 
	  	  WHERE album_id={$album['id']}
	  	  LIMIT 1";	
	  
	$result2 = mysql_query($query, $connection);
	confirm_query($result);
	$image = mysql_fetch_array($result2);
	
	echo "<div class=\"album\">";
	echo "<a href=\"photos.php?album_id={$album['id']}\">";
	echo "<img src=\"photos/{$image['url']}\" />";
	echo "<p>{$album['title']}</p>";
	echo "</div></a>";
	}
}

else{
	$album_id = $_GET['album_id'];
	$query = "SELECT * 
			  FROM  `photos` 
			  WHERE album_id = {$album_id}		
			  ORDER BY `photos`.`order_id` ASC ";	
			  
	$result = mysql_query($query, $connection);
	confirm_query($result);
	echo "<div id=\"photo-wrap\">";
	while($image = mysql_fetch_array($result)){
		echo "<div class=\"photo\">";
		echo "<a href=\"photos/{$image['url']}\" title=\"{$image['caption']}\" data-lightbox=\"photo-album\">";
		echo "<img src=\"photos/{$image['url']}\" />";
		echo "</a></div>";
	}
	echo "</div>";
}
	
?>
</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
<link href="_css/lightbox.css" rel="stylesheet" />