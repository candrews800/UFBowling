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
	
	$minor_headline1 = $_GET['minor_headline1'];
	$minor_headline2 = $_GET['minor_headline2'];
	$minor_headline3 = $_GET['minor_headline3'];
	$minor_headline4 = $_GET['minor_headline4'];
	$minor_headline5 = $_GET['minor_headline5'];
	$minor_headline6 = $_GET['minor_headline6'];
	
	
	$query = "UPDATE headlines
			  SET news_id = '{$headline1}' 
			  WHERE headlines.id =1";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE headlines 
			  SET news_id = '{$headline2}' 
			  WHERE headlines.id =2";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE headlines 
			  SET news_id = '{$headline3}' 
			  WHERE headlines.id =3";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE headlines 
			  SET news_id = '{$minor_headline1}' 
			  WHERE headlines.id =4";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE headlines
			  SET news_id = '{$minor_headline2}' 
			  WHERE headlines.id =5";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE headlines 
			  SET news_id = '{$minor_headline3}' 
			  WHERE headlines.id =6";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE headlines
			  SET news_id = '{$minor_headline4}' 
			  WHERE headlines.id =7";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE headlines 
			  SET news_id = '{$minor_headline5}' 
			  WHERE headlines.id =8";
			  
	$result = mysql_query($query, $connection);
	
	$query = "UPDATE headlines 
			  SET news_id = '{$minor_headline6}' 
			  WHERE headlines.id =9";
			  
	$result = mysql_query($query, $connection);
	
	redirect_to("modify_headlines.php");
?>
