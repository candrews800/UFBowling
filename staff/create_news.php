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
$title = mysql_real_escape_string($_POST['title']);
$cap1 = mysql_real_escape_string($_POST['cap1']);
$cap2 = mysql_real_escape_string($_POST['cap2']);
if($_FILES["file"]["error"] == 0){
	$img_url = "images/" . mysql_real_escape_string($_FILES["file"]["name"]);
}
$text = mysql_real_escape_string($_POST['text']);
$related_event_id = mysql_real_escape_string($_POST['related_event_id']);
$id = last_id("news");
$order_id = last_order_id("faq") + 1;
?>
<?php
	$query = "INSERT INTO news (
				id, title, cap1, cap2, image_url, text, related_event_id, order_id
			) VALUES (
				{$id}, '{$title}', '{$cap1}', '{$cap2}', '{$img_url}', '{$text}', '{$related_event_id}', '{$order_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
	}

	redirect_to("display_news.php");
?>