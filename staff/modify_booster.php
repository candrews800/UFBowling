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
	$result_set = mysql_query("SELECT * FROM boosterclub WHERE id=1");
	$item = mysql_fetch_array($result_set);
?>

<form action="update_booster.php" method="post" enctype="multipart/form-data">
	<p>
		<img src="../<?php echo $item['img']; ?>" />
	</p>
	<p>Booster Club Img:
		<input type="file" name="img" value="" />
	</p>
	<p><a href="../<?php echo $item['file']; ?>">Related Document</a></p>
	<p>
		Linked Document:
		<input type="file" name="file" />
	</p>

	<input type="submit" value="Modify Booster Club Information" />
	</form>
<br />
<a href="index.php">Cancel</a>


<?php require_once("includes/footer.php") ?>