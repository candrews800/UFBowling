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

$day = $_POST['day'];
$info = $_POST['info'];
$id = last_id("practice_schedule");
$order_id = last_order_id("practice_schedule") + 1;
?>
<?php
	$query = "INSERT INTO practice_schedule (
				id, day, info, order_id
			) VALUES (
				{$id}, '{$day}', '{$info}', '{$order_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_practice_schedule.php");
?>