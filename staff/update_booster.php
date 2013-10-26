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
if($_FILES["img"]["error"] == 0){
	$img_url = "images/" . mysql_real_escape_string($_FILES["img"]["name"]);
	$image = "img = '{$img_url}'";
}

$file = "";
if($_FILES["file"]["error"] == 0){
	$img_url = "files/" . mysql_real_escape_string($_FILES["file"]["name"]);
	$file = "file = '{$img_url}'";
}

$comma = "";

if($image != "" && $file != ""){
	$comma = ", ";
}

?>
<?php
	$query = "UPDATE boosterclub SET ";
	$query.= $image . $comma . $file;
	$query.= " WHERE id=1";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../files/" . $_FILES["file"]["name"]);
	}
	if($_FILES["img"]["error"] == 0){
		echo move_uploaded_file($_FILES["img"]["tmp_name"], "../images/" . $_FILES["img"]["name"]);
	}
	
	redirect_to("modify_booster.php");

?>