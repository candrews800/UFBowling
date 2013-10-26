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
$company = mysql_real_escape_string($_POST['company']);
$ball = mysql_real_escape_string($_POST['ball']);
if($_FILES["file"]["error"] == 0){
	$img_url = "images/" . mysql_real_escape_string($_FILES["file"]["name"]);
}
$id = last_id("bowling_ball");

?>
<?php
	$query = "INSERT INTO bowling_ball (
				id, company, ball, image
			) VALUES (
				{$id}, '{$company}', '{$ball}', '{$img_url}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
	}

	redirect_to("display_bowling_balls.php");
?>