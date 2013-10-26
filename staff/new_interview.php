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

<form action="create_interview.php" method="post">
	<p>Add Interview with: 
	<select name="player_id">
	<?php 
		$query = "SELECT * 
				FROM  `player` 
				ORDER BY  `player`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			echo ">{$row['first_name']} {$row['last_name']}";
			echo "</option>";
		}
	?>	
	</select>
	</p>
	<br />
	<input type="submit" value="Add Interview" />
	</form>
<br />
<a href="display_interviews.php">Cancel</a>

<?php require_once("includes/footer.php") ?>