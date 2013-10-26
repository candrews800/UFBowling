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
$company = mysql_real_escape_string($_POST['company']);
$ball = mysql_real_escape_string($_POST['ball']);
if($_FILES["file"]["error"] == 0){
	$img_url = "images/" . mysql_real_escape_string($_FILES["file"]["name"]);
	$image = ", image = '{$img_url}'";
}
$id = $_GET['id'];
?>
<?php
	$query = "UPDATE bowling_ball
			  SET company = '{$company}', ball = '{$ball}' {$image}
			  WHERE bowling_ball.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
	}
	
	redirect_to("display_bowling_balls.php");

?>