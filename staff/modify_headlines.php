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

<form action="update_headlines.php" method="get">

<?php
	$query = "SELECT * 
			  FROM  `headlines` 
			  ORDER BY  `headlines`.`id` ASC ";
	
	$result = mysql_query($query, $connection); 
	confirm_query($result);
	
	$headline1 = mysql_fetch_array($result);
	$headline2 = mysql_fetch_array($result);
	$headline3 = mysql_fetch_array($result);
	
	$minor_headline1 = mysql_fetch_array($result);
	$minor_headline2 = mysql_fetch_array($result);
	$minor_headline3 = mysql_fetch_array($result);
	$minor_headline4 = mysql_fetch_array($result);
	$minor_headline5 = mysql_fetch_array($result);
	$minor_headline6 = mysql_fetch_array($result);
	
?>

<p>Headline 1: 
	<select name="headline1">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline1['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Headline 2: 
	<select name="headline2">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline2['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Headline 3: 
	<select name="headline3">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($headline3['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<br />
<p>Minor Headline 1: 
	<select name="minor_headline1">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline1['news_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($minor_headline1['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Minor Headline 2: 
	<select name="minor_headline2">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline1['news_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($minor_headline2['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Minor Headline 3: 
	<select name="minor_headline3">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline1['news_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($minor_headline3['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Minor Headline 4: 
	<select name="minor_headline4">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline1['news_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($minor_headline4['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Minor Headline 5: 
	<select name="minor_headline5">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline1['news_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($minor_headline5['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<p>Minor Headline 6: 
	<select name="minor_headline6">
	<?php 
		$query = "SELECT * 
				FROM  `news` 
				ORDER BY  `news`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		echo "<option value=\"0\"";
		if($headline1['news_id'] == 0){
				echo " selected=\"selected\"";
			}
		echo ">None</option>";
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			if($minor_headline6['news_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['id']} : {$row['title']}";
			echo "</option>";
		}
	?>	
	</select>
</p>
<br />
<input type="submit" value="Save Changes">
</form>

<?php require_once("includes/footer.php") ?>