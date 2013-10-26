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

$general = 0;
$men = 0;
$women = 0;
if($_POST['type'] == 1){
	$general = 1;
}
else if($_POST['type'] == 2){
	$men = 1;
}
else if($_POST['type'] == 3){
	$women = 1;
}

$text = mysql_real_escape_string($_POST['text']);
$id = $_GET['id'];
?>
<?php
	$query = "UPDATE history
			  SET general = {$general}, men = {$men}, women = {$women}, text = '{$text}'
			  WHERE history.id={$id}";
	$result = mysql_query($query, $connection);
	
	echo $query ."<br />";
	
	echo mysql_error();
	
	redirect_to("display_history.php");

?>