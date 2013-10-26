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
echo mysql_real_escape_string($_FILES["file"]["name"]);

$file_url = "";
$event_title = mysql_real_escape_string($_POST['event_title']);
$date = mysql_real_escape_string($_POST['date']);
$time = mysql_real_escape_string($_POST['time']);
$location = mysql_real_escape_string($_POST['location']);
$text = mysql_real_escape_string($_POST['text']);
if($_FILES["file"]["error"] == 0){
	$file_url = "files/" . mysql_real_escape_string($_FILES["file"]["name"]);
}

$type = mysql_real_escape_string($_POST['type']);
$id = last_id("upcoming_event");

$travel_team = 0;
$local = 0;
$ours = 0;
$club = 0;

if($type =="travel"){
	$travel_team = 1;
}
elseif($type =="local"){
	$local = 1;
}
elseif($type =="ours"){
	$ours = 1;
}
elseif($type =="club"){
	$club = 1;
}
?>
<?php
	$query = "INSERT INTO upcoming_event (
				id, event_title, date, time, location, text, file_url, travel_team, local, ours, club, type
			) VALUES (
				{$id}, '{$event_title}', '{$date}', '{$time}', '{$location}',  '{$text}', '{$file_url}',  '{$travel_team}',  '{$local}',  '{$ours}',  '{$club}',  '{$type}' 
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();

	$last_result_id = last_id("event_result");
	
	$query = "INSERT INTO event_result (
				id, event_id, text
			) VALUES (
				{$last_result_id}, '{$id}', ''
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../files/" . $_FILES["file"]["name"]);
	}
	
	redirect_to("display_events.php");
?>