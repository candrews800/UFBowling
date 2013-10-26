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

<?php
	$id = $_GET['id'];
	
	$result_set = mysql_query("SELECT * FROM ball_review WHERE id = {$id}");
	$ball_review = mysql_fetch_array($result_set);

?>

<form action="update_ball_review.php?id=<?php echo $id ?>" method="post">
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
			if($ball_review['ball_id'] == $row['id']){
				echo " selected=\"selected\"";
			}
			echo ">{$row['company']} - {$row['ball']}";
			echo "</option>";
		}
	?>	
	</select>
	
	</p>
	<br />
	<p>Reviewer: 
		<input type="text" name="reviewer" value="<?php echo $ball_review['reviewer']; ?>" id="reviewer" />
	</p>
	<br />
	<p>Review Text:<br />
	<textarea name="review_text" rows="20" cols="80"><?php echo $ball_review['review_text']; ?></textarea>
	</p>
	<br />
	<input type="submit" value="Modify Ball Review" />
	</form>
<br />
<a href="display_ball_reviews.php">Cancel</a>
<br />
<br />
<a href="delete_ball_review.php?id=<?php echo $id ?>">DELETE BALL REVIEW</a>

<?php require_once("includes/footer.php") ?>