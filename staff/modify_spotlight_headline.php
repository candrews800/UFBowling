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

<form action="update_spotlight_headline.php" method="get">

<?php
	$query = "SELECT * 
			  FROM  `spotlight_headline` 
			  ORDER BY  `spotlight_headline`.`id` ASC ";
	
	$result = mysql_query($query, $connection); 
	confirm_query($result);
	
	$headline = mysql_fetch_array($result);

	
?>

<p>Spotlight Headline: 
	<select name="headline">
	<?php 
		$query = "SELECT * 
				FROM  `interviews` 
				ORDER BY  `interviews`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			$query2 = "SELECT * 
				  FROM  `player` 
				  WHERE id = {$row['player_id']}";
			$result2 = mysql_query($query2, $connection);
			$player = mysql_fetch_array($result2);
			echo "<option value=\"{$row['id']}\"";
			if($headline['interview_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$player['first_name']} {$player['last_name']}";
			echo "</option>";
		}
	?>	
	</select>
</p>

<br />
<input type="submit" value="Save Changes">
</form>

<?php require_once("includes/footer.php") ?>