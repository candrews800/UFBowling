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

<form action="create_history.php" method="post">
	<select name="type">
		<option value="1">General</option>
		<option value="2">Men</option>
		<option value="3">Women</option>
	</select>
	<p>Text:<br />
	<textarea name="text" rows="20" cols="80"></textarea>
	</p>
	<input type="submit" value="New History" />
	</form>
<br />
<a href="display_history.php">Cancel</a>

<?php require_once("includes/footer.php") ?>