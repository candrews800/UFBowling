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

$interview_id = mysql_real_escape_string($_GET['interview_id']);
$question = mysql_real_escape_string($_POST['question']);
$answer = mysql_real_escape_string($_POST['answer']);
$id = last_id("interview_qa");

echo $interview_id;

	$query = "INSERT INTO interview_qa (
				id, interview_id, question, answer
			) VALUES (
				{$id}, '{$interview_id}', '{$question}', '{$answer}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_interviews.php");
?>