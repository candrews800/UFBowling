<?php require_once("../includes/connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php
	session_start();
	if(!isset($_SESSION['login'])){
		redirect_to("../admin.php");
	}
	if($_SESSION['login'] != 1){
		redirect_to("../admin.php");
	}
?>

<?php require_once("includes/header.php") ?>

<p><a href="index.php"> - Go Back to Staff Area</a></p>
<hr />

<table>
	<tr>
	<th>Date</th>
	<th>Total Views</th>
	<th>Home</th>
	<th>About</th>
	<th>Schedule</th>
	<th>Roster</th>
	<th>Ball Reviews</th>
	<th>Photos</th>
	</tr>
<?php 
	$query = "SELECT * 
	    	  FROM  `site_statistics` 
			  ORDER BY  `site_statistics`.`date` DESC ";	
				  
	$result = mysql_query($query, $connection);
	confirm_query($result);
	
	while($stat = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>{$stat['date']}</td>";
		echo "<td>{$stat['page_views']}</td>";
		echo "<td>{$stat['home']}</td>";
		echo "<td>{$stat['about']}</td>";
		echo "<td>{$stat['schedule']}</td>";
		echo "<td>{$stat['roster']}</td>";
		echo "<td>{$stat['ball_reviews']}</td>";
		echo "<td>{$stat['photos']}</td>";
		echo "</tr>";
	}
?>

</table>
<br />


<?php require_once("includes/footer.php") ?>