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


<form action="create_photo.php" method="post" enctype="multipart/form-data">
	<p>
		Album:
		<select name="album_id">
			<?php 
				$query = "SELECT * 
						  FROM  `photo_albums` 
						  ORDER BY  `photo_albums`.`id` ASC "; 
				$result = mysql_query($query, $connection); 
				confirm_query($result);
		
				while($row = mysql_fetch_array($result)){
					echo "<option value=\"{$row['id']}\"";
					echo ">{$row['title']}";
					echo "</option>";
				}
	?>	
		</select>
	</p>
	<p>Caption: 
		<input type="text" name="caption" value="Caption" />
	</p>
	<p>Photo:
		<input type="file" name="file" value="" />
	</p>
	<input type="submit" value="Add Photo" />
	</form>
<br />
<a href="display_photos.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>