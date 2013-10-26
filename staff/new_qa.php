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

	$interview_id = $_GET['interview_id'];

?>

<form action="create_qa.php?interview_id=<?php echo $interview_id; ?>" method="post">
	<p>Question:<br />
	<textarea name="question" rows="10" cols="80"></textarea>
	</p>
	<p>Answer:<br />
	<textarea name="answer" rows="10" cols="80"></textarea>
	</p>
	<input type="submit" value="Add Q&A" />
	</form>
<br />
<a href="display_interviews.php">Cancel</a>

<?php require_once("includes/footer.php") ?>