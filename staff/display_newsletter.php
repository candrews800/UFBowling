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

<p>Newsletter Subscribers</p>
<a href="email_list.php"><p>See comma seperated subscriber list.</a></p>
<br />

<?php 
		$query = "SELECT * 
				  FROM  `newsletter` 
				  ORDER BY  `newsletter`.`id` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<p>{$row['email']} -- <a href=\"delete_newsletter.php?id={$row['id']}\">Delete</a></p>";
		}
?>

<?php require_once("includes/footer.php") ?>