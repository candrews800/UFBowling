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
$link = $_POST['link'];
$id = last_id("resources");
$order_id = last_order_id("resources") + 1;
?>
<?php
	$query = "INSERT INTO resources (
				id, title, link, order_id
			) VALUES (
				{$id}, '{$title}', '{$link}', '{$order_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_resources.php");
?>