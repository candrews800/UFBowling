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

	$headline1 = $_GET['headline1'];
	$headline2 = $_GET['headline2'];
	$headline3 = $_GET['headline3'];
	$headline4 = $_GET['headline4'];	
	
	$query = "UPDATE event_headlines
			  SET event_id = '{$headline1}' 
			  WHERE event_headlines.id =1";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE event_headlines 
			  SET event_id = '{$headline2}' 
			  WHERE event_headlines.id =2";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE event_headlines 
			  SET event_id = '{$headline3}' 
			  WHERE event_headlines.id =3";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE event_headlines
			  SET event_id = '{$headline4}' 
			  WHERE event_headlines.id =4";
			  
	$result = mysql_query($query, $connection);
			  
	$result = mysql_query($query, $connection);
	
	redirect_to("modify_event_headlines.php");
?>
