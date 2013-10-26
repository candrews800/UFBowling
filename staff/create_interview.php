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

$player_id = mysql_real_escape_string($_POST['player_id']);
$id = last_id("interviews");

?>
<?php
	$query = "INSERT INTO interviews (
				id, player_id
			) VALUES (
				{$id}, '{$player_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_interviews.php");
?>