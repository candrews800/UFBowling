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

<p>Select an existing history point to modify or delete it.</p>

<p>General Points:</p>
<?php
	$query = "SELECT * 
			  FROM  `history` 
			  WHERE general=1";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		$i=1;
		while($row = mysql_fetch_array($result)){
			echo "<p><a href=\"modify_history.php?id={$row['id']}\">";
			echo "General #{$i}";
			echo "</a></p>";
			$i++;
		}
?>
<p>Men Highlights:</p>
<?php
	$query = "SELECT * 
			  FROM  `history` 
			  WHERE men=1";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		$i=1;
		while($row = mysql_fetch_array($result)){
			echo "<p><a href=\"modify_history.php?id={$row['id']}\">";
			echo "Men #{$i}";
			echo "</a></p>";
			$i++;
		}
?>
<p>Women Highlights:</p>
<?php
	$query = "SELECT * 
			  FROM  `history` 
			  WHERE women=1";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		$i=1;
		while($row = mysql_fetch_array($result)){
			echo "<p><a href=\"modify_history.php?id={$row['id']}\">";
			echo "Women #{$i}";
			echo "</a></p>";
			$i++;
		}
?>
<br />
<p><a href="new_history.php">+ Add a History Article</a></p>

<?php require_once("includes/footer.php") ?>