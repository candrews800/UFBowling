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

$img_url = "";
$name = mysql_real_escape_string($_POST['name']);
$title = mysql_real_escape_string($_POST['title']);
if($_FILES["file"]["error"] == 0){
	$img_url = "images/" . mysql_real_escape_string($_FILES["file"]["name"]);
}
$text = mysql_real_escape_string($_POST['text']);
$id = last_id("coach");
$order_id = last_order_id("coach") + 1;
?>
<?php
	$query = "INSERT INTO coach (
				id, title, name, image_url, text, order_id
			) VALUES (
				{$id}, '{$title}', '{$name}', '{$img_url}', '{$text}', '{$order_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
	}

	redirect_to("display_coaches.php");
?>