<?php $page = "Admin"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
	
<h3>Staff Login</h3>

<form action="validate_login.php" method="post">
	<input type="text" name="username" placeholder="Username" required /><br />
	<input type="password" name="password" placeholder="Password" required /><br /><br />
	<input type="submit" value="Submit">	
</form>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

