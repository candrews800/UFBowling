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
	
	$result_set = mysql_query("SELECT * FROM alumni WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_alumni.php?id=<?php echo $id ?>" method="post">
	<p>Name: 
		<input type="text" name="name" value="<?php echo $news_item['name']; ?>" />
	</p>
	<p>Bowled: 
		<input type="text" name="bowled" value="<?php echo $news_item['bowled']; ?>" />
	</p>
	<p>Email: 
		<input type="text" name="email" value="<?php echo $news_item['email']; ?>" />
	</p>
	<input type="submit" value="Modify Alumni" />
	</form>
<br />
<a href="display_alumni.php">Cancel</a>
<br />
<br />
<a href="delete_alumni.php?id=<?php echo $id ?>">DELETE ALUMNI</a>

<?php require_once("includes/footer.php") ?>