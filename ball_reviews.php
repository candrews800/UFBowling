<?php $page = "Ball Reviews"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php page_count("ball_reviews"); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<div class="grid_2 alpha">
	<div id="ball_list">
	<?php 
	
	if(isset($_GET['id'])){
		$ball_id = $_GET['id'];
	}
	else{
		$ball_id = first_id("bowling_ball");
	}
	
	$query = "SELECT * 
			  FROM  `bowling_ball` 
			  ORDER BY  `bowling_ball`.`ball` ASC ";
	$result = mysql_query($query, $connection);
	confirm_query($result);
		
	echo "<ul>";
	$num=1;
	while($bowling_ball = mysql_fetch_array($result))
	{
		echo "<a href=\"ball_reviews.php?id={$bowling_ball['id']}\"><li class=\"";
		if($num % 2 == 1){
			echo "odd";
		}
		if($bowling_ball['id'] == $ball_id){
			echo " selected";
		}
		echo "\">";
		if($bowling_ball['company'] == "Storm"){
			echo "<img src=\"images/storm.png\" /><br />" . "{$bowling_ball['ball']}</li></a>";
		}
		else{
			echo "{$bowling_ball['company']} {$bowling_ball['ball']}</li></a>";
		}
		$num++;
	}
	echo "</ul>";
?>	
	</div>
</div>
<div class="grid_6 omega">
	<div id="review">
	<?php
		
		$result_set = mysql_query("SELECT * FROM bowling_ball WHERE id = {$ball_id} ORDER BY  `bowling_ball`.`ball` ASC ");
		$ball = mysql_fetch_array($result_set);
		$result_set = mysql_query("SELECT * FROM ball_review WHERE ball_id = {$ball_id} ORDER BY  `ball_review`.`reviewer` ASC");
		
		echo "<div class=\"ball-reviews\">";
		echo "<h1>" . $ball['company'] . "<span class=\"title\"> " . $ball['ball'] ."</span></h1>";
		echo "<img src=\"{$ball['image']}\" />";
		
		while($review = mysql_fetch_array($result_set))
		{
			echo "<p><em>\"" . $review['review_text'] . "\"</em> - <span class=\"reviewer\">{$review['reviewer']}</span></p>";
		}
		
		echo "</div>";
	?>
	</div>
</div>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

