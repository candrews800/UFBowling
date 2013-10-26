<?php $page = "About"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
<ul id="sub-menu">
	<li><a href="about.php">About Us</a></li>
	<li><a href="faq.php">FAQ</a></li>
	<li><a href="history.php">History</a></li>
	<li><a href="alumni.php" class="selected">Alumni</a></li>
	<li><a href="officers.php">Officer List</a></li>
	<li><a href="resources.php">Resources</a></li>
</ul>
<div class="section_underline menu_underline"></div>

<?php
			$query="SELECT * 
					FROM  `alumni` 
					ORDER BY  `alumni`.`name` ASC ";
		    
		$result = mysql_query($query, $connection);
		confirm_query($result);	
		
		$i = 1;
		while($alumni = mysql_fetch_array($result)){
			if($i % 2 == 1){
				echo "<p class=\"odd\">";
			}
			else{
				echo "<p class=\"even\">";
			}
			echo $alumni['name'] . " ";
			if($alumni['bowled'] != NULL && $alumni['bowled'] != ""){
				echo " - " . $alumni['bowled'];
			}
			if($alumni['email'] != NULL && $alumni['email'] != ""){
				echo " - " . $alumni['email'];
			}
			
			$i++;
		}
		
		?>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

