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

$title = mysql_real_escape_string($_POST['title']);
$id = last_id("photo_albums");
$order_id = last_order_id("photo_albums") + 1;
?>
<?php
	$query = "INSERT INTO photo_albums (
				id, title, order_id
			) VALUES (
				{$id}, '{$title}', '{$order_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_photo_albums.php");
?>