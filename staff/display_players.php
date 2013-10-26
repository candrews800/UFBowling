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

<p>Select an existing player entry to modify or delete them.</p>

<?php 
		$query = "SELECT * 
				  FROM  `player` 
				  ORDER BY  `player`.`id` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<p><a href=\"modify_player.php?id={$row['id']}\">";
			echo "{$row['id']}: {$row['first_name']} {$row['last_name']}";
			echo "</a></p>";
		}
?>
<br />
<p><a href="new_player.php">+ Add a Player</a></p>

<?php require_once("includes/footer.php") ?>