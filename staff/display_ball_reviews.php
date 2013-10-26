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

<p>Select an existing review to modify or delete it.</p>

<?php 
		$query = "SELECT * 
				  FROM  `ball_review` 
				  ORDER BY  `ball_review`.`id` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			$query2 = "SELECT * 
				  FROM  `bowling_ball` 
				  WHERE id = {$row['ball_id']}";
			$result2 = mysql_query($query2, $connection);
			$bowling_ball = mysql_fetch_array($result2);
			
			echo "<p><a href=\"modify_ball_review.php?id={$row['id']}\">";
			echo "{$row['id']}: {$bowling_ball['company']} {$bowling_ball['ball']} - {$row['reviewer']}";
			echo "</a></p>";
		}
?>
<br />
<p><a href="new_ball_review.php">+ Add a Ball Review</a></p>

<?php require_once("includes/footer.php") ?>