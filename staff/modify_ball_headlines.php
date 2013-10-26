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

<form action="update_ball_headlines.php" method="get">

<?php
	$query = "SELECT * 
			  FROM  `ball_headlines` 
			  ORDER BY  `ball_headlines`.`id` ASC ";
	
	$result = mysql_query($query, $connection); 
	confirm_query($result);
	
	$headline1 = mysql_fetch_array($result);
	$headline2 = mysql_fetch_array($result);
	$headline3 = mysql_fetch_array($result);
	$headline4 = mysql_fetch_array($result);
	
?>

<p>Ball Headline 1: 
	<select name="headline1">
	<?php 
		$query = "SELECT * 
				FROM  `bowling_ball` 
				ORDER BY  `bowling_ball`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline1['ball_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['company']} {$row['ball']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Ball Headline 2: 
	<select name="headline2">
	<?php 
		$query = "SELECT * 
				FROM  `bowling_ball` 
				ORDER BY  `bowling_ball`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline2['ball_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['company']} {$row['ball']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Ball Headline 3: 
	<select name="headline3">
	<?php 
		$query = "SELECT * 
				FROM  `bowling_ball` 
				ORDER BY  `bowling_ball`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline3['ball_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['company']} {$row['ball']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Ball Headline 4: 
	<select name="headline4">
	<?php 
		$query = "SELECT * 
				FROM  `bowling_ball` 
				ORDER BY  `bowling_ball`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline4['ball_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['company']} {$row['ball']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<br />
<input type="submit" value="Save Changes">
</form>

<?php require_once("includes/footer.php") ?>