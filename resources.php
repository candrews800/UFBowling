<?php $page = "About"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php page_count("about"); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<ul id="sub-menu">
	<li><a href="about.php">About Us</a></li>
	<li><a href="faq.php">FAQ</a></li>
	<li><a href="history.php">History</a></li>
	<li><a href="alumni.php">Alumni</a></li>
	<li><a href="officers.php">Officer List</a></li>
	<li><a href="resources.php" class="selected">Resources</a></li>
</ul>
<div class="section_underline menu_underline"></div>

<?php 
	$query ="SELECT * 
			 FROM  `resources` 
			 ORDER BY  `resources`.`order_id` ASC ";
	$result = mysql_query($query, $connection);
	confirm_query($result);
	
	while($row = mysql_fetch_array($result)){
		echo "<a href=\"{row['link']}\"><p>".$row['title']."</p></a>";
	}
				 
?>	

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

