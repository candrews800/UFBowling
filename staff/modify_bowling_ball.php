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
	
	$result_set = mysql_query("SELECT * FROM bowling_ball WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_bowling_ball.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<p>Company: 
		<input type="text" name="company" value="<?php echo $news_item['company']; ?>" id="company" />
	</p>
	<p>Ball: 
		<input type="text" name="ball" value="<?php echo $news_item['ball']; ?>" id="ball" />
	</p>
	<br />
	<p>
		<img src="../<?php echo $news_item['image']; ?>" />
	</p>
	<p>Bowling Ball Image:
		<input type="file" name="file" value="" />
	</p>
	<br />
	<input type="submit" value="Modify Bowling Ball" />
	</form>
<br />
<a href="display_bowling_balls.php">Cancel</a>
<br />
<br />
<a href="delete_bowling_ball.php?id=<?php echo $id ?>">DELETE BOWLING BALL</a>

<?php require_once("includes/footer.php") ?>