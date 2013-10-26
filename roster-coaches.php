<?php $page = "Roster"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<ul id="sub-menu">
	<li><a href="roster.php">Men</a></li>
	<li><a href="roster-women.php">Women</a></li>
	<li><a href="roster-coaches.php" class="selected">Coaching Staff</a></li>
</ul>
<div class="section_underline menu_underline"></div>

<?php
		$query="SELECT * 
				FROM  `coach` 
				ORDER BY  `coach`.`order_id` ASC ";
		    
		$result = mysql_query($query, $connection);
		confirm_query($result);	
		
		while($coach = mysql_fetch_array($result)){
			echo "<div class=\"coach\">";
			echo "<img src=\"{$coach['image_url']}\" >";
			echo "<h1>" . $coach['name'] . "<span class=\"title\"> " . $coach['title'] ."</span></h1>";
			echo "<p>" . $coach['text'] . "</p>";
			echo "</div>";
		}
	?>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

