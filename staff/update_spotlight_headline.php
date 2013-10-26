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

	$headline = $_GET['headline'];
	
	echo "Test";
	
	echo $headline;
	
	$query = "UPDATE spotlight_headline
			  SET interview_id = {$headline} 
			  WHERE id = 1";
			  
	$result = mysql_query($query, $connection);
	
	echo $result;
	
	redirect_to("modify_spotlight_headline.php");
?>
