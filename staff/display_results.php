<?php require_once("../includes/connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php
	session_start();
	if(!isset($_SESSION['login'])){
		redirect_to("../admin.php");
	}
	if($_SESSION['login'] != 1){
		redirect_to("../admin.php");
	}
?>

<?php require_once("includes/header.php") ?>

<p><a href="index.php"> - Go Back to Staff Area</a></p>
<hr />

<p>Select an existing event result to modify or delete it.</p>

<?php 
		$query = "SELECT * 
				  FROM  `upcoming_event` 
				  ORDER BY  `upcoming_event`.`id` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<p><a href=\"modify_result.php?id={$row['id']}\">";
			echo "{$row['event_title']}";
			echo "</a></p>";
		}
?>
<br />
<p><a href="new_event.php">+ Add an Event</a></p>

<?php require_once("includes/footer.php") ?>