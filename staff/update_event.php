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
$file = "";
$file_url = "";
$event_title = mysql_real_escape_string($_POST['event_title']);
$date = mysql_real_escape_string($_POST['date']);
$time = mysql_real_escape_string($_POST['time']);
$location = mysql_real_escape_string($_POST['location']);
$text = mysql_real_escape_string($_POST['text']);
if($_FILES["file"]["error"] == 0){
	$file_url = "files/" . mysql_real_escape_string($_FILES["file"]["name"]);
	$file = ", file_url = '{$file_url}'";
}
$type = mysql_real_escape_string($_POST['type']);
$id = $_GET['id'];

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
	$query = "UPDATE upcoming_event
			  SET event_title = '{$event_title}', date = '{$date}', time = '{$time}', location = '{$location}', text = '{$text}' $file,
			   type = '{$type}', travel_team = '{$travel_team}', local = '{$local}', ours = '{$ours}', club = '{$club}' 
			  WHERE upcoming_event.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../files/" . $_FILES["file"]["name"]);
	}
	
	redirect_to("display_events.php");
?>