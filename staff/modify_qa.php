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
	
	$result_set = mysql_query("SELECT * FROM interview_qa WHERE id = {$id}");
	
	
	$qa = mysql_fetch_array($result_set);
	
	$question = $qa['question'];
	$answer = $qa['answer'];
	
?>

<form method="post" action="update_qa.php?id=<?php echo $id; ?>">
	<p>Question:<br />
	<textarea name="question" rows="10" cols="80"><?php echo $qa['question']; ?></textarea>
	</p>
	<p>Answer:<br />
	<textarea name="answer" rows="10" cols="80"><?php echo $qa['answer']; ?></textarea>
	</p>
	
	<input type="submit" value="Modify Q&A" />
</form>

<br />
<br />
<a href="display_interviews.php">Cancel</a>
<br />
<br />
<a href="delete_qa.php?id=<?php echo $id ?>">DELETE Q&A</a>

<?php require_once("includes/footer.php") ?>