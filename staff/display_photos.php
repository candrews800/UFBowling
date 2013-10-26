<?php require_once("../includes/connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php
	session_start();
	if(!isset($_SESSION['login'])){
		redirect_to("../admin.php");
	}
	if($_SESSION['login'] != 1){
		redirect_to("../admin.php");
	}
?>

<?php require_once("includes/header.php") ?>

<p><a href="index.php"> - Go Back to Staff Area</a></p>
<hr />

<p>Select an existing photo to modify or delete it.</p>

<?php 
	$query = "SELECT * 
	    	  FROM  `photos` 
			  ORDER BY  `photos`.`id` DESC ";	
				  
	$result = mysql_query($query, $connection);
	confirm_query($result);
	
	while($image = mysql_fetch_array($result)){
		echo "<a href=\"modify_photo.php?id={$image['id']}\" title=\"{$image['caption']}\">";
		echo "<img class=\"photo\" src=\"../photos/{$image['url']}\" />";
		echo "</a>";
	}
?>
<br />
<p><a href="new_photo.php">+ Add a Photo</a></p>

<?php require_once("includes/footer.php") ?>