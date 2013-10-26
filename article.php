<?php $page = "News"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<?php 
	
	if(isset($_GET['id'])){
		$id1 = $_GET['id'];
		$result_set = mysql_query("SELECT * FROM news WHERE id = {$id1}");
		$news = mysql_fetch_array($result_set);
		
		echo "<div class=\"news_article single\">";
		echo "<h1 class=\"title\">" . $news['title'] . "</h1>";
		echo "<div class=\"section_underline\"></div>";
		echo "<a href=\"{$news['image_url']}\"><img class=\"big\" src=\"{$news['image_url']}\" /></a>";
		if($news['text']==""){
			if($news['related_event_id'] > 0){
				//Display Event Information
				
				$query = "SELECT * 
				  		  FROM  `upcoming_event` 
				 		  WHERE `upcoming_event`.`id` = {$news['related_event_id']}";
				$result2 = mysql_query($query, $connection);
				confirm_query($result2);
		
				$event = mysql_fetch_array($result2);
			
				$query = "SELECT * 
				  	 	  FROM  `event_result` 
				  		  WHERE `event_result`.`event_id` = {$news['related_event_id']}";
				$result2 = mysql_query($query, $connection);
				confirm_query($result2);
	
				$result = mysql_fetch_array($result2);
				
				echo "<p class=\"date-time\">{$event['date']} {$event['time']}</p>";
				echo "<p class=\"location\">{$event['location']}</p>";
				if($event['file_url']!= '' && $event['file_url']!= ' ' && $event['file_url']!= NULL){echo "<a href=\"{$event['file_url']}\"><p class=\"file\">More Information<p></a>";}
				echo "<p class=\"text\">";
				echo nl2br($event['text']);
				echo "</p>";
				
				if($result['is_active']){
					echo "<div class=\"results\">";
					echo "<h2 class=\"title\">Event Results</h2>";
					echo "<div class=\"section_underline\"></div>";
					if($result['file_url']!= '' && $result['file_url']!= ' ' && $result['file_url']!= NULL){
						echo "<a href=\"{$result['file_url']}\">Standings</a>";
					}
					echo "<p class=\"text\">";
					echo nl2br($result['text']);
					echo "</p>";
					echo "</div>";
				}
				echo "</div>";
			}
		}
		else{
			echo "<p>" . nl2br($news['text']) . "</p>";
		}
		
		echo "<div class=\"clear\"></div>";
		echo "<a href=\"news.php\" class=\"more\"><h3>Return to all news...</h3></a>";
		
	}
	
	//No Page Found
	else{

	}
?>
</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

