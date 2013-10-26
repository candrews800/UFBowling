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


<form action="create_alumni.php" method="post">
	<p>Name: 
		<input type="text" name="name" value="name" />
	</p>
	<p>Bowled: 
		<input type="text" name="bowled" value="bowled" />
	</p>
	<p>Email: 
		<input type="text" name="email" value="email" />
	</p>
	<input type="submit" value="Add Alumni" />
	</form>
<br />
<a href="display_alumni.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>