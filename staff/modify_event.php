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
	
	$result_set = mysql_query("SELECT * FROM upcoming_event WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_event.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<p>Event Title: 
		<input type="text" name="event_title" value="<?php echo $news_item['event_title']; ?>" />
	</p>
	<p>Date (YYYY-MM-DD): 
		<input type="text" name="date" value="<?php echo $news_item['date']; ?>" />
	</p>
	<p>Time: 
		<input type="text" name="time" value="<?php echo $news_item['time']; ?>" />
	</p>
	<p>Location: 
		<input type="text" name="location" value="<?php echo $news_item['location']; ?>" />
	</p>
	<p>
		<a href="../<?php echo $news_item['file_url']; ?>">File Included</a>
	</p>
	<p>File_URL (PDF): 
		<input type="file" name="file" value="" />
	</p>	
	<p>Event Type: 
		<select name="type">
			<option value="travel" <?php if($news_item['type']=="travel"){echo "selected=\"selected\"";} ?>>Travel Team</option>
			<option value="local" <?php if($news_item['type']=="local"){echo "selected=\"selected\"";} ?>>Local</option>
			<option value="ours" <?php if($news_item['type']=="ours"){echo "selected=\"selected\"";} ?>>Ours</option>
			<option value="club" <?php if($news_item['type']=="club"){echo "selected=\"selected\"";} ?>>Club</option>
		</select>
	</p>
	<p>Text:<br />
	<textarea name="text" rows="10" cols="80"><?php echo $news_item['text']; ?></textarea>
	</p>	
	
	<br />
	<input type="submit" value="Modify Event" />
	</form>
<br />
<a href="display_events.php">Cancel</a>
<br />
<br />
<a href="delete_event.php?id=<?php echo $id ?>">DELETE EVENT</a>

<?php require_once("includes/footer.php") ?>