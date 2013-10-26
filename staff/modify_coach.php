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
	
	$result_set = mysql_query("SELECT * FROM coach WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_coach.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<p>Name: 
		<input type="text" name="name" value="<?php echo $news_item['name']; ?>" />
	</p>
	<p>Title: 
		<input type="text" name="title" value="<?php echo $news_item['title']; ?>" />
	</p>
	<br />
	<p>
		<img src="../<?php echo $news_item['image_url']; ?>" />
	</p>
	<p>Coach Image:
		<input type="file" name="file" value="" />
	</p>
	<p>Text:<br />
	<textarea name="text" rows="20" cols="80"><?php echo $news_item['text']; ?></textarea>
	</p>
	<input type="submit" value="Modify Coach" />
	</form>
<br />
<a href="display_coaches.php">Cancel</a>
<br />
<br />
<a href="delete_coach.php?id=<?php echo $id ?>">DELETE ARTICLE</a>

<?php require_once("includes/footer.php") ?>