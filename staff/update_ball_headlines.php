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
	
	$minor_headline1 = $_GET['minor_headline1'];
	$minor_headline2 = $_GET['minor_headline2'];
	$minor_headline3 = $_GET['minor_headline3'];
	$minor_headline4 = $_GET['minor_headline4'];
	
	
	$query = "UPDATE ball_headlines
			  SET ball_id = '{$headline1}' 
			  WHERE ball_headlines.id =1";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE ball_headlines 
			  SET ball_id = '{$headline2}' 
			  WHERE ball_headlines.id =2";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE ball_headlines 
			  SET ball_id = '{$headline3}' 
			  WHERE ball_headlines.id =3";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE ball_headlines
			  SET ball_id = '{$headline4}' 
			  WHERE ball_headlines.id =4";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE ball_headlines 
			  SET ball_id = '{$minor_headline1}' 
			  WHERE ball_headlines.id =5";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE ball_headlines
			  SET ball_id = '{$minor_headline2}' 
			  WHERE ball_headlines.id =6";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE ball_headlines 
			  SET ball_id = '{$minor_headline3}' 
			  WHERE ball_headlines.id =7";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE ball_headlines
			  SET ball_id = '{$minor_headline4}' 
			  WHERE ball_headlines.id =8";
			  
	$result = mysql_query($query, $connection);
	
	redirect_to("modify_ball_headlines.php");
?>
