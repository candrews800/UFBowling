<?php $page = "Event"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">

<?php

	$id1 = $_GET['id'];
	
	$query = "SELECT * 
			  FROM  `upcoming_event` 
			  WHERE `upcoming_event`.`id` = {$id1}";
	$result2 = mysql_query($query, $connection);
	confirm_query($result2);
	
	$event = mysql_fetch_array($result2);
		
	$query = "SELECT * 
			  FROM  `event_result` 
			  WHERE `event_result`.`event_id` = {$id1}";
	$result2 = mysql_query($query, $connection);
	confirm_query($result2);

	$result = mysql_fetch_array($result2);
?>

	
	<h1 class="title"><?php echo $event['event_title']; ?></h1>
	<div class="section_underline"></div>
	<p class="date-time"><?php echo $event['date'] . " " . $event['time']; ?></p>
	<p class="location"><?php echo $event['location']; ?></p>
	<p class="location">
	<?php if($event['file_url']!= '' && $event['file_url']!= ' ' && $event['file_url']!= NULL){echo "<a href=\"{$event['file_url']}\">More Information</a>";} ?>
	</p>
	<p class="text"><?php echo nl2br($event['text']); ?></p>
	
	<?php
		if($result['is_active']){
			echo "<div class=\"results\">";
			echo "<h2 class=\"title\">Event Results</h2>";
			echo "<div class=\"section_underline\"></div>";
			if($result['file_url']!= '' && $result['file_url']!= ' ' && $result['file_url']!= NULL){
				echo "<a class=\"file\"href=\"{$result['file_url']}\">Standings</a>";
			}
			echo "<p class=\"text\">";
			echo nl2br($result['text']);
			echo "</p></div>";
		}
	?>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

