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


<form action="create_resource.php" method="post" enctype="multipart/form-data">
	<p>Link: 
		<input type="text" name="link" value="Link" />
	</p>
	<p>Title: 
		<input type="text" name="title" value="Title" />
	</p>
	<input type="submit" value="Add Resource" />
	</form>
<br />
<a href="display_resources.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>