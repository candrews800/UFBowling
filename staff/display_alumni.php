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

<p>Select an existing alumni to modify or delete.</p>

<?php 
		$query = "SELECT * 
				  FROM  `alumni` 
				  ORDER BY  `alumni`.`id` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<p><a href=\"modify_alumni.php?id={$row['id']}\">";
			echo "{$row['id']}: {$row['name']}";
			echo "</a></p>";
		}
?>
<br />
<p><a href="new_alumni.php">+ Add an Alumni</a></p>

<?php require_once("includes/footer.php") ?>