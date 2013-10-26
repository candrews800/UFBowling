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



<p><a href="index.php"> - Go Back to Staff Area</a></p>
<hr />

<p>Newsletter Subscribers</p>


<?php 
		$query = "SELECT * 
				  FROM  `newsletter` 
				  ORDER BY  `newsletter`.`id` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo $row['email'] . ",";
		}
?>