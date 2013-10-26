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
	
	$result_set = mysql_query("SELECT * FROM photo_albums WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_photo_album.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<p>Title: 
		<input type="text" name="title" value="<?php echo $news_item['title']; ?>" />
	</p>
	<br />
	<input type="submit" value="Modify Photo Album" />
	</form>
<br />
<a href="display_photo_albums.php">Cancel</a>
<br />
<br />
<a href="delete_photo_album.php?id=<?php echo $id ?>">DELETE ALBUM</a>

<?php require_once("includes/footer.php") ?>