<?php require_once("includes/connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * 
			  FROM  `staff`
			  WHERE username='{$username}'";
	$result = mysql_query($query, $connection);
	confirm_query($result);
	$confirm = mysql_fetch_array($result);
	if($password == $confirm['password'] && $password != NULL && $password != '')
	{
		session_start();
		$_SESSION['login'] = 1;
		redirect_to("staff/");
	}
	else{
		redirect_to("admin.php");
	}
?>

