<?php $page = "Ball Reviews"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
	
<?php 

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$result_set = mysql_query("SELECT * FROM bowling_ball WHERE id = {$id} ORDER BY  `bowling_ball`.`ball` ASC ");
		$ball = mysql_fetch_array($result_set);
		$result_set = mysql_query("SELECT * FROM ball_review WHERE ball_id = {$id} ORDER BY  `ball_review`.`reviewer` ASC");
		
		echo "<div class=\"ball-reviews\">";
		echo "<h1>Bowling Ball Reviews</h1>";
		echo "<img src=\"{$ball['image']}\" />";
		echo "<h2><span class=\"company\">" . $ball['company'] . " - </span><span class=\"ball\">" . $ball['ball'] . "</span></h2>";
		
		while($review = mysql_fetch_array($result_set))
		{
			echo "<div class=\"review\">";
			echo "<hr />";
			echo "<p class=\"reviewer\">Reviewer: " . $review['reviewer'] . "</p>";
			echo "<p>" . $review['review_text'] . "</p>";
			echo "</div>";
		}
		
		echo "</div>";
	}
	
	
	else{		
		echo "<div class=\"media-ball_reviews\">";
		echo "<a href=\"bowling_ball.php\"><h1>Bowling Ball Reviews - <span class=\"see-all\">See all our reviews &raquo;</span></h1></a>";
		
		$query = "SELECT * 
				  FROM  `bowling_ball` 
				  ORDER BY  `bowling_ball`.`ball` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
			
		while($bowling_ball = mysql_fetch_array($result))
		{
			echo "<a href=\"bowling_ball.php?id={$bowling_ball['id']}\">";
			echo "<div class=\"ball\">";
			echo "<img src=\"{$bowling_ball['image']}\" />";
			echo "<p>{$bowling_ball['company']}</p>";
			echo "<p>{$bowling_ball['ball']}</p>";
			echo "</div></a>";
		}
		
	}
		?>	
	
</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

