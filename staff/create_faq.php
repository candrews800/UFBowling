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

$question = $_POST['question'];
$answer = $_POST['answer'];
$id = last_id("faq");
$order_id = last_order_id("faq") + 1;
?>
<?php
	$query = "INSERT INTO faq (
				id, question, answer, order_id
			) VALUES (
				{$id}, '{$question}', '{$answer}', '{$order_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_faq.php");
?>