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


<form action="create_faq.php" method="post">
	<p>Question:<br />
	<textarea name="question" rows="5" cols="80">Enter question.</textarea>
	</p>
	<p>Answer:<br />
	<textarea name="answer" rows="5" cols="80">Enter answer.</textarea>
	</p>
	<input type="submit" value="Add FAQ" />
	</form>
<br />
<a href="display_faq.php">Cancel</a>	


<?php require_once("includes/footer.php") ?>