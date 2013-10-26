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
	
	$result_set = mysql_query("SELECT * FROM history WHERE id = {$id}");
	$news_item = mysql_fetch_array($result_set);

?>

<form action="update_history.php?id=<?php echo $id ?>" method="post">
	<select name="type">
		<option value="1" <?php if($news_item['general'] == 1){echo " selected=\"selected\"";} ?>>General</option>
		<option value="2" <?php if($news_item['men'] == 1){echo " selected=\"selected\"";} ?>>Men</option>
		<option value="3" <?php if($news_item['women'] == 1){echo " selected=\"selected\"";} ?>>Women</option>
	</select>
	<p>Text:<br />
	<textarea name="text" rows="20" cols="80"><?php echo $news_item['text']; ?></textarea>
	</p>
	<input type="submit" value="Modify History" />
	</form>
<br />
<a href="display_history.php">Cancel</a>
<br />
<br />
<a href="delete_history.php?id=<?php echo $id ?>">DELETE ARTICLE</a>

<?php require_once("includes/footer.php") ?>