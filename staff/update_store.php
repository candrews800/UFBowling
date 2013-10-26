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

	if($_FILES["file"]["error"] == 0){
		$store_url = "http://www.ufbowling.com/files/" . mysql_real_escape_string($_FILES["file"]["name"]);
	}

	$query = "UPDATE store
			  SET url = '{$store_url}'  
			  WHERE id=1";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../files/" . $_FILES["file"]["name"]);
	}
	
	redirect_to("modify_store.php");
?>