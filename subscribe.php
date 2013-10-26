<?php require_once("includes/connection.php") ?>
<?php require_once("includes/functions.php"); ?>
<?php

$email = mysql_real_escape_string($_POST['email']);
$id = last_id("newsletter");
?>
<?php
	$query = "INSERT INTO newsletter (
				id, email
			) VALUES (
				{$id}, '{$email}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("index.php");
?>