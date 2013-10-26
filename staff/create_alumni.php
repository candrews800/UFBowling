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

$name = mysql_real_escape_string($_POST['name']);
$bowled = mysql_real_escape_string($_POST['bowled']);
$email = mysql_real_escape_string($_POST['email']);
$id = last_id("alumni");
?>
<?php
	$query = "INSERT INTO alumni (
				id, name, bowled, email
			) VALUES (
				{$id}, '{$name}', '{$bowled}', '{$email}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_alumni.php");
?>