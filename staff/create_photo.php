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
$caption = mysql_real_escape_string($_POST['caption']);
$album_id = mysql_real_escape_string($_POST['album_id']);
if($_FILES["file"]["error"] == 0){
	$img_url = mysql_real_escape_string($_FILES["file"]["name"]);
}
$id = last_id("photos");
$order_id = last_order_id("photos") + 1;

?>
<?php
	$query = "INSERT INTO photos (
				id, url, caption, order_id, album_id
			) VALUES (
				{$id}, '{$img_url}', '{$caption}', '{$order_id}', '{$album_id}'
			)";
	$result = mysql_query($query, $connection);
	
	echo mysql_error();
	
	if($_FILES["file"]["error"] == 0){
		echo move_uploaded_file($_FILES["file"]["tmp_name"], "../photos/" . $_FILES["file"]["name"]);
	}

	redirect_to("display_photos.php");
?>