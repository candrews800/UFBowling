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
$id = $_GET['id'];
?>
<?php
	$query = "UPDATE practice_schedule
			  SET day = '{$day}', info = '{$info}'
			  WHERE practice_schedule.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	redirect_to("display_practice_schedule.php");

?>