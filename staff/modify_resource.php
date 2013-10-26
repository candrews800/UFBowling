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
	
	$result_set = mysql_query("SELECT * FROM resources WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_resource.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<p>Link: 
		<input type="text" name="link" value="<?php echo $news_item['link']; ?>" />
	</p>
	<p>Title: 
		<input type="text" name="title" value="<?php echo $news_item['title']; ?>" />
	</p>
	<input type="submit" value="Modify Resource" />
	</form>
<br />
<a href="display_resources.php">Cancel</a>
<br />
<br />
<a href="delete_resource.php?id=<?php echo $id ?>">DELETE RESOURCE</a>

<?php require_once("includes/footer.php") ?>