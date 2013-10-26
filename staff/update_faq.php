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
$id = $_GET['id'];
?>
<?php
	$query = "UPDATE faq
			  SET question = '{$question}', answer = '{$answer}'
			  WHERE faq.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	redirect_to("display_faq.php");

?>