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
	$table = $_GET['table'];
	$order_id = $_GET['order_id'];
	$move = $_GET['move'];
	
	//up
	if($move == 1){
		$replace_id = $order_id - 1;
	}
	
	//down
	else{
		$replace_id = $order_id + 1;
	}
	
	
	$query = "UPDATE {$table}
		  	  SET order_id = 1337
		  	  WHERE order_id = {$order_id}";
	
	$result_set = mysql_query($query);
	
	confirm_query($result_set);
	
	$query = "UPDATE {$table}
		 	  SET order_id = {$order_id}
		  	  WHERE order_id = {$replace_id}";			  
	
	$result_set = mysql_query($query);
	
	confirm_query($result_set);
	
	$query = "UPDATE {$table}
		  	  SET order_id = {$replace_id}
		  	  WHERE order_id = 1337";
	
	$result_set = mysql_query($query);
	
	confirm_query($result_set);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>