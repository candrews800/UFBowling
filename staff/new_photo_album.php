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

<form action="create_photo_album.php" method="post" enctype="multipart/form-data">
	<p>Title: 
		<input type="text" name="title" value="" />
	</p>
	
	<br />
	<input type="submit" value="Create Photo Album" />
	</form>
<br />
<a href="display_photo_albums.php">Cancel</a>

<?php require_once("includes/footer.php") ?>