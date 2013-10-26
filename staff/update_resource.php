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
$id = $_GET['id'];
?>
<?php
	$query = "UPDATE resources
			  SET title = '{$title}', link = '{$link}'
			  WHERE resources.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	redirect_to("display_resources.php");

?>