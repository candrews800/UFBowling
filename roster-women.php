<?php $page = "Roster"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<ul id="sub-menu">
	<li><a href="roster.php">Men</a></li>
	<li><a href="roster-women.php" class="selected">Women</a></li>
	<li><a href="roster-coaches.php">Coaching Staff</a></li>
</ul>
<div class="section_underline menu_underline"></div>
<?php
		$query="SELECT *
		    FROM `player`
		    WHERE women = 1
		    ORDER BY  `player`.`last_name` ASC";
		    
		$result = mysql_query($query, $connection);
		confirm_query($result);	
		while($mens = mysql_fetch_array($result)){
			echo "<div class=\"player\">";
			echo "<img src=\"{$mens['face_pic']}\" />";
			echo "<h2 class=\"name\">" . $mens['first_name'] . " " . $mens['last_name'] . " <span class=\"class-status\">{$mens['class_status']}</span></h2>";
			echo "<p class=\"major\">" . $mens['major'] . "</p>";
			echo "<p class=\"hometown\">" . $mens['hometown'] . "</p>";
			$query="SELECT *
		    		FROM `interviews`
		    		WHERE player_id = {$mens['id']}";
		    
			$result2 = mysql_query($query, $connection);
			confirm_query($result2);
			
			$i=1;
			while($interview = mysql_fetch_array($result2)){
				if($interview['id'] != 0){
					echo "<p class=\"spotlight\"><a href=\"interview.php?interview_id={$interview['id']}\">Spotlight #{$i}</a></p>";
				}
				$i++;
			}
			echo "</div>";
		}
	?>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

