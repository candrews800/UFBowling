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

	$query = "SELECT * FROM store WHERE id=1";
	$result = mysql_query($query);
	$result_set = mysql_fetch_array($result);
	$store_url = $result_set['url'];

?>

<form action="update_store.php" method="post" enctype="multipart/form-data">
	<p>
		<a href="<?php echo $store_url; ?>">Store Attachment</a>
	</p>
	<p>File:
		<input type="file" name="file" value="" />
	</p>


	<input type="submit" value="Modify Store Attachment" />
	</form>
<br />
<a href="index.php">Cancel</a>


<?php require_once("includes/footer.php") ?>