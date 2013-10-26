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
$caption = mysql_real_escape_string($_POST['caption']);
$album_id = mysql_real_escape_string($_POST['album_id']);
if($_FILES["file"]["error"] == 0){
	$img_url = mysql_real_escape_string($_FILES["file"]["name"]);
	$image = ", url = '{$img_url}'";
}
$id = $_GET['id'];
?>
<?php
	$query = "UPDATE photos
			  SET caption = '{$caption}', album_id = '{$album_id}' {$image}
			  WHERE photos.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../photos/" . $_FILES["file"]["name"]);
	}
	
	redirect_to("display_photos.php");

?>