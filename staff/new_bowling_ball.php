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


<form action="create_bowling_ball.php" method="post" enctype="multipart/form-data">
	<p>Company: 
		<input type="text" name="company" value="Company" id="company" />
	</p>
	<p>Ball: 
		<input type="text" name="ball" value="Ball 1" id="ball" />
	</p>
	<p>Bowling Ball Img:
		<input type="file" name="file" value="" />
	</p>
	<input type="submit" value="Add Bowling Ball" />
	</form>
<br />
<a href="display_bowling_balls.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>