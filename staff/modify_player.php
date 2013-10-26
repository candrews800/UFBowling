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
	
	$result_set = mysql_query("SELECT * FROM player WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_player.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	<select name="men">
		<option value="1">Men</option>
		<option value="0<?php if($news_item['women'] == 1){echo " selected=\"selected\"";} ?>">Women</option>
	</select>
	<p>First Name:
		<input type="text" name="first_name" value="<?php echo $news_item['first_name']; ?>" id="first_name" />
	</p>
	<p>Middle Name:
		<input type="text" name="middle_name" value="<?php echo $news_item['middle_name']; ?>" id="middle_name" />
	</p>
	<p>Last Name:
		<input type="text" name="last_name" value="<?php echo $news_item['last_name']; ?>" id="last_name" />
	</p>
	<p>Hometown:
		<input type="text" name="hometown" value="<?php echo $news_item['hometown']; ?>" id="hometown" />
	</p>
	<p>Major:
		<input type="text" name="major" value="<?php echo $news_item['major']; ?>" id="major" />
	</p>
	<p>Class:
		<input type="text" name="class_status" value="<?php echo $news_item['class_status']; ?>" id="class_status" />
	</p>
	<br />
	<p>
		<img src="<?php echo "../" . $news_item['face_pic']; ?>" />
	</p>
	<p>Face Pic:
		<input type="file" name="file" value="" />
	</p>
	<input type="submit" value="Modify Player" />
	</form>
<br />
<a href="display_players.php">Cancel</a>
<br />
<br />
<a href="delete_player.php?id=<?php echo $id ?>">DELETE ARTICLE</a>

<?php require_once("includes/footer.php") ?>