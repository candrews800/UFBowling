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


<form action="create_coach.php" method="post" enctype="multipart/form-data">
	<p>Name: 
		<input type="text" name="name" value="Name" />
	</p>
	<p>Title: 
		<input type="text" name="title" value="Title" />
	</p>
	<p>Coach Img:
		<input type="file" name="file" value="" />
	</p>
	<p>Text:<br />
	<textarea name="text" rows="20" cols="80">Enter description</textarea>
	</p>
	<input type="submit" value="Add Coach" />
	</form>
<br />
<a href="display_coaches.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>