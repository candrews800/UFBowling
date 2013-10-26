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

$title = $_POST['title'];
$name = $_POST['name'];
$id = last_id("officers");
$order_id = last_order_id("officers") + 1;
?>
<?php
	$query = "INSERT INTO officers (
				id, title, name, order_id
			) VALUES (
				{$id}, '{$title}', '{$name}', '{$order_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_officers.php");
?>