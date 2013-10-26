<?php require_once("../includes/connection.php") ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	session_start();
	if(!isset($_SESSION['login'])){
		redirect_to("../admin.php");
	}
	if($_SESSION['login'] != 1){
		redirect_to("../admin.php");
	}
?>

<?php

$question = mysql_real_escape_string($_POST['question']);
$answer = mysql_real_escape_string($_POST['answer']);
$id = $_GET['id'];

echo $id;
echo $question;
echo $answer;
?>
<?php
	$query = "UPDATE interview_qa
			  SET question = '{$question}', answer = '{$answer}'
			  WHERE interview_qa.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	redirect_to("display_interviews.php");

?>