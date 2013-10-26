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


<form action="create_practice_schedule.php" method="post" enctype="multipart/form-data">
	<p>Day: 
		<input type="text" name="day" value="Day" />
	</p>
	<p>Info: 
		<input type="text" name="info" value="Info" />
	</p>
	<input type="submit" value="Add Practice" />
	</form>
<br />
<a href="display_practice_schedule.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>