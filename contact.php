<?php $page = "Contact"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">

<h2>Contact us</h2>

<form id="contact" action="contact_email.php" method="post">
		<input id="name" name="name" type="text" placeholder="Name" required /><br />
		<input id="email" name="email" type="text" placeholder="Email Address" required /><br />
		<input id="subject" name="subject" type="text" placeholder="Subject" required /><br />
		<textarea type="text" name="text" placeholder="Comments/Questions/Concerns" required></textarea><br />
			
		<input class="button" type="submit" value="Submit" />
</form>

<h2 class="additional">Additional Information</h2>

<?php
		$query="SELECT * 
				FROM  `contact`";
			
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		$contact = mysql_fetch_array($result);
		
		echo "<p>" . nl2br($contact['text']) . "</p>";
		
?>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

