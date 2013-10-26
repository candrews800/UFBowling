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
if($_FILES["file"]["error"] == 0){
	$img_url = "images/" . mysql_real_escape_string($_FILES["file"]["name"]);
	$image = ", face_pic = '{$img_url}'";
}
$first_name = mysql_real_escape_string($_POST['first_name']);
$middle_name = mysql_real_escape_string($_POST['middle_name']);
$last_name = mysql_real_escape_string($_POST['last_name']);
$hometown = mysql_real_escape_string($_POST['hometown']);
$major = mysql_real_escape_string($_POST['major']);
$class = mysql_real_escape_string($_POST['class_status']);
$id = $_GET['id'];
$men = 1;
$women = 0;
if($_POST['men'] == 0){
	$men = 0;
	$women = 1;
}

?>
<?php
	$query = "UPDATE player
			  SET first_name = '{$first_name}', middle_name = '{$middle_name}', last_name = '{$last_name}', hometown = '{$hometown}', major = '{$major}', class_status = '{$class}', men = {$men}, women = {$women} {$image}
			  WHERE player.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
	}
	
	redirect_to("display_players.php");

?>