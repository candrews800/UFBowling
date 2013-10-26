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

<form action="create_ball_review.php" method="post">
	<p>Bowling Ball:
	<select name="ball_id">
	<?php 
		$query = "SELECT * 
				FROM  `bowling_ball` 
				ORDER BY  `bowling_ball`.`id` DESC "; 
		$result = mysql_query($query, $connection); 
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<option value=\"{$row['id']}\"";
			echo ">{$row['company']} - {$row['ball']}";
			echo "</option>";
		}
	?>	
	</select>
	</p>
	<br />
	<p>Reviewer: 
		<input type="text" name="reviewer" value="" id="reviewer" />
	</p>
	<br />
	<p>Review Text:<br />
	<textarea name="review_text" rows="20" cols="80"></textarea>
	</p>
	<br />
	<input type="submit" value="Add Ball Review" />
	</form>
<br />
<a href="display_ball_reviews.php">Cancel</a>

<?php require_once("includes/footer.php") ?>