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
	
	$result_set = mysql_query("SELECT * FROM interview_qa WHERE interview_id = {$id} ORDER BY  `interview_qa`.`id` ASC");
	
	$qa_num = 1;
	while($qa = mysql_fetch_array($result_set))
	{
		echo "<a href=\"modify_qa.php?id={$qa['id']}\"><div class=\"qa\">";
		echo "QA #{$qa_num}:";
		echo "<br />";
		echo "<p class=\"q\">Question: " . $qa['question'] . "</p>";
		echo "<p class=\"a\">Answer: " . $qa['answer'] . "</p>";
		echo "</div></a>";
		echo "<br />";
		$qa_num++;
	}
	
?>

<br />
<a href="new_qa.php?interview_id=<?php echo $id; ?>"><p>Add Q&A</p></a>

<br />
<br />
<a href="display_interviews.php">Cancel</a>
<br />
<br />
<a href="delete_interview.php?id=<?php echo $id; ?>">DELETE INTERVIEW</a>

<?php require_once("includes/footer.php") ?>