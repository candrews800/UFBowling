<?php $page = "News"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<?php
	if(isset($_GET['page'])){
			$page = $_GET['page'];
			$next_page = $page + 10;
	}
	else{
		$page = 0;
		$next_page = 10;
	}
	
	$result_set = mysql_query("SELECT * FROM news ORDER BY  `news`.`order_id` ASC LIMIT {$page}, 10");
		
	while($news = mysql_fetch_array($result_set)){
		echo "<div class=\"news_article\">";
		echo "<a href=\"article.php?id={$news['id']}\"><h1>" . $news['title'] . "</h1></a>";
		if($news['text']==""){
			if($news['related_event_id'] > 0){
			//Display Event Information
			
			$query = "SELECT * 
			  		  FROM  `upcoming_event` 
			 		  WHERE `upcoming_event`.`id` = {$news['related_event_id']}";
			$result2 = mysql_query($query, $connection);
			confirm_query($result2);
			
			$event = mysql_fetch_array($result2);
			
			echo "<p>\"" . substr($event['text'],0,250) . "\" <a href=\"article.php?id={$news['id']}\"><em>See more...</em></a></p>";
			}
		}
		else{
			echo "<p>" . substr($news['text'],0,250) . "\" <a href=\"article.php?id={$news['id']}\"><em>See more...</em></a></p>";
		}
		echo "</div>";
	}
	$result = mysql_query("SELECT * FROM news");
	$num_rows = mysql_num_rows($result);
	
	if($next_page < $num_rows){
		echo "<div class=\"clear\"></div>";
		echo "<a href=\"news.php?page={$next_page}\" class=\"more\"><h3>See Previous News..</h3></a>";
	}
	
?>
</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

