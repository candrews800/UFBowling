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

$image = "";
$title = mysql_real_escape_string($_POST['title']);
$cap1 = mysql_real_escape_string($_POST['cap1']);
$cap2 = mysql_real_escape_string($_POST['cap2']);
$related_event_id = mysql_real_escape_string($_POST['related_event_id']);
if($_FILES["file"]["error"] == 0){
	$img_url = "images/" . mysql_real_escape_string($_FILES["file"]["name"]);
	$image = ", image_url = '{$img_url}'";
}
$text = mysql_real_escape_string($_POST['text']);
$id = $_GET['id'];
?>
<?php
	$query = "UPDATE news
			  SET title = '{$title}', cap1 = '{$cap1}', cap2 = '{$cap2}' {$image}, text = '{$text}', related_event_id = '{$related_event_id}'
			  WHERE news.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
	}
	
	redirect_to("display_news.php");

?>