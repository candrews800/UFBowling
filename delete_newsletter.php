<?php require_once("includes/connection.php") ?>
<?php require_once("includes/functions.php"); ?>
<?php

$email = $_POST['email'];
?>
<?php
	$query = "DELETE FROM newsletter
			  WHERE newsletter.email='{$email}'";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	redirect_to("index.php");

?>