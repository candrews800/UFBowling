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

<p>Select an existing faq to modify or delete it.</p>

<?php 
		$table = "faq";

		$query = "SELECT * 
				  FROM  `faq` 
				  ORDER BY  `faq`.`order_id` ASC ";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		while($row = mysql_fetch_array($result)){
			echo "<p>";
			if($row['order_id'] > first_order_id($table)){
				echo "<a href=\"change_position.php?table={$table}&order_id={$row['order_id']}&move=1\"> Up </a>";
			}
			if($row['order_id'] < last_order_id($table)){
				echo "<a href=\"change_position.php?table={$table}&order_id={$row['order_id']}&move=0\"> Down </a>";
			}
			echo " | <a href=\"modify_faq.php?id={$row['id']}\">";
			echo "{$row['question']}";
			echo "</a></p>";
		}
?>
<br />
<p><a href="new_faq.php">+ Add a FAQ</a></p>

<?php require_once("includes/footer.php") ?>