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

$reviewer = mysql_real_escape_string($_POST['reviewer']);
$ball_id = mysql_real_escape_string($_POST['ball_id']);
$review_text = mysql_real_escape_string($_POST['review_text']);
$id = last_id("ball_review");

?>
<?php
	$query = "INSERT INTO ball_review (
				id, reviewer, ball_id, review_text
			) VALUES (
				{$id}, '{$reviewer}', '{$ball_id}', '{$review_text}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	redirect_to("display_ball_reviews.php");
?>