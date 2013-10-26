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
	
	$result_set = mysql_query("SELECT * FROM practice_schedule WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_practice_schedule.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<p>Name: 
		<input type="text" name="day" value="<?php echo $news_item['day']; ?>" />
	</p>
	<p>Title: 
		<input type="text" name="info" value="<?php echo $news_item['info']; ?>" />
	</p>
	<input type="submit" value="Modify Practice" />
	</form>
<br />
<a href="display_practice_schedule.php">Cancel</a>
<br />
<br />
<a href="delete_practice_schedulephp?id=<?php echo $id ?>">DELETE PRACTICE DAY</a>

<?php require_once("includes/footer.php") ?>