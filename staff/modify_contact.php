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
	$result_set = mysql_query("SELECT * 
							   FROM  `contact`");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_contact.php" method="post">
	<p>Text:<br />
	<textarea name="text" rows="20" cols="80"><?php echo $news_item['text']; ?></textarea>
	</p>
	<input type="submit" value="Modify Contact" />
	</form>
<br />
<a href="index.php">Cancel</a>

<?php require_once("includes/footer.php") ?>