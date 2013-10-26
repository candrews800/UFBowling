<?php $page = "Unsubscribe"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">

<h3>Unsubscribe from our newsletter</h3>
		<form action="delete_newsletter.php" method="post">
			<input type="text" name="email" />
			<input type="submit" value="Unsubscribe" />
		</form>
		<p>Sorry that you did not like our emaails.</p>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

