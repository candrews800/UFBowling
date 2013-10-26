<?php $page = "Schedule"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php page_count("schedule"); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">

<div id="wrap">
		<table>
			<tr>
				<th>Event</th>
				<th>Date</th>
				<th>Location</th>
			</tr>
			<?php
	  		$query = "SELECT * 
					  FROM  `upcoming_event` 
					  ORDER BY  `upcoming_event`.`date` ASC";
					  
			$result = mysql_query($query, $connection);
			confirm_query($result);	
			
			$i = 1;
			
			while($event = mysql_fetch_array($result)){
				
				if($i % 2 == 1){
					echo "<tr class=\"odd data\">";
				}
				else if($i % 2 == 0){
					echo "<tr class=\"even data\">";
				}
				echo "<td>" . "<a href=\"event.php?id={$event['id']}\">" . $event['event_title'] . "</a></td>";
				echo "<td>" . "<a href=\"event.php?id={$event['id']}\">" . $event['date'] . "</a></td>";
				echo "<td>" . "<a href=\"event.php?id={$event['id']}\">" . $event['location'] . "</a></td>";
				echo "</tr>";
				$i++;
			}
	  		?>
		</table>
		</div>
	
</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

