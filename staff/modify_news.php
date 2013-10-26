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
	
	$result_set = mysql_query("SELECT * FROM news WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_news.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<p>Title: 
		<input type="text" name="title" value="<?php echo $news_item['title']; ?>" id="title" />
	</p>
	<p>Caption: 
		<input type="text" name="cap1" value="<?php echo $news_item['cap1']; ?>" id="cap1" />
	</p>
	<p>Related Event:
		<select name="related_event_id">
			<?php 
				$query = "SELECT * 
						  FROM  `upcoming_event` 
						  ORDER BY  `upcoming_event`.`id` DESC ";
				$result_set = mysql_query($query);
				
				echo "<option value=\"0\"";
				if($news_item['related_event_id'] == 0){
					echo " selected=\"selected\"";
				}				
				echo ">None</option>";
				
				while($event = mysql_fetch_array($result_set)){
					echo "<option value=\"{$event['id']}\"";
					if($news_item['related_event_id'] == $event['id']){
						echo " selected=\"selected\"";
					}				
					echo ">{$event['event_title']}</option>";
				}
			?>			
		</select>		
	</p>
	<br />
	<p>
		<img src="../<?php echo $news_item['image_url']; ?>" />
	</p>
	<p>News Image:
		<input type="file" name="file" value="" />
	</p>
	<p>Text:<br />
	<textarea name="text" rows="20" cols="80"><?php echo $news_item['text']; ?></textarea>
	</p>
	<input type="submit" value="Modify News" />
	</form>
<br />
<a href="display_news.php">Cancel</a>
<br />
<br />
<a href="delete_news.php?id=<?php echo $id ?>">DELETE ARTICLE</a>

<?php require_once("includes/footer.php") ?>