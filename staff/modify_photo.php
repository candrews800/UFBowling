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

<?php
	$id = $_GET['id'];
	
	$result_set = mysql_query("SELECT * FROM photos WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_photo.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
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
					if($news_item['album_id'] == $row['id']){
						echo " selected=\"selected\"";
					}
					echo ">{$row['title']}";
					echo "</option>";
				}
			?>	
		</select>
	</p>
	<p>Caption: 
		<input type="text" name="caption" value="<?php echo $news_item['caption']; ?>" />
	</p>
	<br />
	<p>
		<img class="photo" src="../photos/<?php echo $news_item['url']; ?>" />
	</p>
	<p>Photo:
		<input type="file" name="file" value="" />
	</p>
	<br />
	<input type="submit" value="Modify Photo" />
	</form>
<br />
<a href="display_photos.php">Cancel</a>
<br />
<br />
<a href="delete_photo.php?id=<?php echo $id ?>">DELETE PHOTO</a>

<?php require_once("includes/footer.php") ?>