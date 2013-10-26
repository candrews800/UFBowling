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


<form action="create_news.php" method="post" enctype="multipart/form-data">
	<p>Title: 
		<input type="text" name="title" value="Title" id="title" />
	</p>
	<p>Caption: 
		<input type="text" name="cap1" value="Caption" id="cap1" />
	</p>
		<p>Related Event:
		<select name="related_event_id">
			<?php 
				$query = "SELECT * 
						  FROM  `upcoming_event` 
						  ORDER BY  `upcoming_event`.`id` DESC ";
				$result_set = mysql_query($query);
				
				echo "<option value=\"0\">None</option>";		
				
				while($event = mysql_fetch_array($result_set)){
					echo "<option value=\"{$event['id']}\">{$event['event_title']}</option>";			
				}
			?>			
		</select>		
	</p>
	<p>News Img:
		<input type="file" name="file" value="" />
	</p>
	<p>Text:<br />
	<textarea name="text" rows="20" cols="80">Enter text for news post.</textarea>
	</p>
	<input type="submit" value="Add News Post" />
	</form>
<br />
<a href="display_news.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>