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

<form action="create_event.php" method="post" enctype="multipart/form-data">
	<p>Event Title: 
		<input type="text" name="event_title" value="" />
	</p>
	<p>Date (YYYY-MM-DD): 
		<input type="text" name="date" value="" />
	</p>
	<p>Time: 
		<input type="text" name="time" value="" />
	</p>
	<p>Location: 
		<input type="text" name="location" value="" />
	</p>
	<p>File_URL (PDF): 
		<input type="file" name="file" value="" />
	</p>	
	<p>Event Type: 
		<select name="type">
			<option value="travel">Travel Team</option>
			<option value="local">Local</option>
			<option value="ours">Ours</option>
			<option value="club">Club</option>
		</select>
	</p>
	<p>Text:<br />
	<textarea name="text" rows="10" cols="80"></textarea>
	</p>	
	
	<br />
	<input type="submit" value="Create Event" />
	</form>
<br />
<a href="display_events.php">Cancel</a>

<?php require_once("includes/footer.php") ?>