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


<form action="create_player.php" method="post" enctype="multipart/form-data">
	<select name="men">
		<option value="1">Men</option>
		<option value="0">Women</option>
	</select>
	<p>First Name: 
		<input type="text" name="first_name" value="First Name" id="first_name" />
	</p>
	<p>Middle Name: 
		<input type="text" name="middle_name" value="Middle Name" id="middle_name" />
	</p>
	<p>Last Name: 
		<input type="text" name="last_name" value="Last Name" id="last_name" />
	</p>
	<p>Hometown: 
		<input type="text" name="hometown" value="Hometown" id="hometown" />
	</p>
	<p>Major: 
		<input type="text" name="major" value="Major" id="major" />
	</p>
	<p>Class: 
		<input type="text" name="class_status" value="Class" id="class_status" />
	</p>
	<p>Face Pic:
		<input type="file" name="file" value="" />
	</p>
	<input type="submit" value="Add Player" />
	</form>
<br />
<a href="display_players.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>