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
	$event_id = $_GET['id'];
	
	$result_set = mysql_query("SELECT * FROM event_result WHERE event_id = {$event_id}");
	$result = mysql_fetch_array($result_set);
	
	$result_set = mysql_query("SELECT * FROM upcoming_event WHERE id = {$event_id}");
	$event = mysql_fetch_array($result_set);

?>

<?php echo $event['event_title'] . " Results: <br />"; ?>

<form action="update_result.php?event_id=<?php echo $event_id ?>" method="post" enctype="multipart/form-data">
	<p>
		<select name="active">
			<option value="1">Active</option>
			<option value="0" <?php if(!$result['is_active']){echo "selected=\"selected\"";} ?>>Inactive</option>
		</select>
	</p>
	<p>
		<a href="../<?php echo $result['file_url']; ?>">File Included</a>
	</p>
	<p>File_URL (PDF): 
		<input type="file" name="file" value="<?php echo $result['file_url']; ?>" />
	</p>
	<p>Text:<br />
	<textarea name="text" rows="10" cols="80"><?php echo $result['text']; ?></textarea>
	</p>
	
	<br />
	<input type="submit" value="Modify Event Result" />
	</form>
<br />
<a href="display_results.php">Cancel</a>

<?php require_once("includes/footer.php") ?>