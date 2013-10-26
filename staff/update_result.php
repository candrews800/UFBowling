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

$file_url = "";
$is_active = mysql_real_escape_string($_POST['active']);
$text = mysql_real_escape_string($_POST['text']);
$event_id = $_GET['event_id'];
if($_FILES["file"]["error"] == 0){
	$file_url = "files/" . mysql_real_escape_string($_FILES["file"]["name"]);
}

?>
<?php
	$query = "UPDATE event_result
			  SET is_active = '{$is_active}', text = '{$text}', file_url = '{$file_url}'
			  WHERE event_result.event_id={$event_id}";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();
	
	echo $event_id;
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../files/" . $_FILES["file"]["name"]);
	}
	
	redirect_to("display_results.php");
?>