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

<p>Select an existing interview to modify or delete it.</p>

<?php 
		$query = "SELECT * 
				  FROM  `interviews` 
				  ORDER BY  `interviews`.`id` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			$query2 = "SELECT * 
				  FROM  `player` 
				  WHERE id = {$row['player_id']}";
			$result2 = mysql_query($query2, $connection);
			$player = mysql_fetch_array($result2);
			
			echo "<p><a href=\"modify_interview.php?id={$row['id']}\">";
			echo "{$row['id']}: {$player['first_name']} {$player['last_name']}";
			echo "</a></p>";
		}
?>
<br />
<p><a href="new_interview.php">+ Add an Interview</a></p>

<?php require_once("includes/footer.php") ?>