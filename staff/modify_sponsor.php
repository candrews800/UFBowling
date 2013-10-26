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
	$id = $_GET['id'];
	
	$result_set = mysql_query("SELECT * FROM sponsor WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_sponsor.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<p>Title:
		<input type="text" name="title" value="<?php echo $news_item['title']; ?>" />
	</p>
	<br />
	<p>
		<img src="../<?php echo $news_item['img_url']; ?>" />
	</p>
	<p>Img Url:
		<input type="file" name="file" value="" />
	</p>
	<p>Link to Page:
		<input type="text" name="link" value="<?php echo $news_item['link']; ?>" />
	</p>

	<input type="submit" value="Modify Sponsor" />
	</form>
<br />
<a href="display_sponsors.php">Cancel</a>


<?php require_once("includes/footer.php") ?>