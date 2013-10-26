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

<form action="update_event_headlines.php" method="get">

<?php
	$query = "SELECT * 
			  FROM  `event_headlines` 
			  ORDER BY  `event_headlines`.`id` ASC ";
	
	$result = mysql_query($query, $connection); 
	confirm_query($result);
	
	$headline1 = mysql_fetch_array($result);
	$headline2 = mysql_fetch_array($result);
	$headline3 = mysql_fetch_array($result);
	$headline4 = mysql_fetch_array($result);	
?>

<p>Upcoming 1: 
	<select name="headline1">
	<?php 
		$query = "SELECT * 
				FROM  `upcoming_event` 
				ORDER BY  `upcoming_event`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline1['event_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline1['event_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['event_title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Upcoming 2: 
	<select name="headline2">
	<?php 
		$query = "SELECT * 
				FROM  `upcoming_event` 
				ORDER BY  `upcoming_event`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline2['event_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline2['event_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['event_title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Recent 1: 
	<select name="headline3">
	<?php 
		$query = "SELECT * 
				FROM  `upcoming_event` 
				ORDER BY  `upcoming_event`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline3['event_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline3['event_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['event_title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Recent 2: 
	<select name="headline4">
	<?php 
		$query = "SELECT * 
				FROM  `upcoming_event` 
				ORDER BY  `upcoming_event`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline4['event_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline4['event_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['event_title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<br />
<input type="submit" value="Save Changes">
</form>

<?php require_once("includes/footer.php") ?>