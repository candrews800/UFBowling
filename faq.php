<?php $page = "About"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<ul id="sub-menu">
	<li><a href="about.php">About Us</a></li>
	<li><a href="faq.php" class="selected">FAQ</a></li>
	<li><a href="history.php">History</a></li>
	<li><a href="alumni.php">Alumni</a></li>
	<li><a href="officers.php">Officer List</a></li>
	<li><a href="resources.php">Resources</a></li>
</ul>
<div class="section_underline menu_underline"></div>

<?php 
	$query="SELECT * 
			FROM  `faq` 
			ORDER BY  `faq`.`order_id` ASC ";
		
	$result = mysql_query($query, $connection);
	confirm_query($result);
	
	while($faq = mysql_fetch_array($result)){
		echo "<h3 class=\"faq-question\">{$faq['question']}</h3>";
		echo "<p class=\"faq-answer\">{$faq['answer']}</p>";
	}
	
?>

<h3>How often/where/when do you practice?</h3>
<?php 
	$query = "SELECT * 
  	     	  FROM  `practice_schedule` 
			  ORDER BY  `practice_schedule`.`order_id` ASC ";	
				  
	$result = mysql_query($query, $connection);
	confirm_query($result);
	
	while($practice = mysql_fetch_array($result)){
		echo "<p>{$practice['day']}: {$practice['info']}</p>";
	}
		
?>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

