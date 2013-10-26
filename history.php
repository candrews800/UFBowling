<?php $page = "About"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<ul id="sub-menu">
	<li><a href="about.php">About Us</a></li>
	<li><a href="faq.php">FAQ</a></li>
	<li><a href="history.php" class="selected">History</a></li>
	<li><a href="alumni.php">Alumni</a></li>
	<li><a href="officers.php">Officer List</a></li>
	<li><a href="resources.php">Resources</a></li>
</ul>
<div class="section_underline menu_underline"></div>
<?php
	$query="SELECT *
		    FROM `history`
		    WHERE general = 1";
			
	$result = mysql_query($query, $connection);
	confirm_query($result);

?>

<?php
		while($history = mysql_fetch_array($result)){
			echo "<p>";
			echo $history['text'];
			echo "</p>";
		}
	?>
	<h3 class="highlights">Men's Team Highlights:</h3>
	<?php
		$query="SELECT *
		    FROM `history`
		    WHERE men = 1";
		    
		$result = mysql_query($query, $connection);
		confirm_query($result);	
		
		while($mens = mysql_fetch_array($result)){
			echo "<p>&#9830; " . $mens['text'] . "</p>";
		}
	?>

	<h3 class="highlights">Women's Team Highlights:</h3>
	<?php
		$query="SELECT *
		    FROM `history`
		    WHERE women = 1";
		    
		$result = mysql_query($query, $connection);
		confirm_query($result);	
		
		while($womens = mysql_fetch_array($result)){
			echo "<p>&#9830; " . $womens['text'] . "</p>";
		}
	?>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

