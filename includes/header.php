<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	<title><?php echo $page; ?> - Florida Gators Bowling</title>

	<!--Site CSS -->
	<link rel="stylesheet" href="_css/reset.css" />
	<link rel="stylesheet" href="_css/960_12_col.css" />
	<link href="http://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="_css/main.css" />
	<!--Page Specific CSS --> 
	<link rel="stylesheet" href="_css/<?php echo strtolower($page); ?>.css" />
</head>
<body>
<div id="page_wrap" class="container_12">
<header>
	<div class="grid_6 prefix_3">
		<h1>Florida Gators Bowling</h1>
	</div>
	<div id="social" class="grid_3">
		<p>Follow Us:</p>
		<a href="https://twitter.com/UFBowling"><img id="twitter" src="images/twitter-icon.png" alt="Twitter" /></a>
		<a href="https://www.facebook.com/gatorsbowling?fref=ts"><img id="fb" src="images/fb-icon.png" alt="Facebook" /></a>		
	</div>
	<div class="clear"></div>
</header>
	
<nav>
	<a href="index.php"><img src="images/gator_logo.png" class="grid_2 prefix_1"/></a>
	<ul id="main-menu" class="grid_9 prefix_3">
		<a href="index.php" <?php if($page=="Home"){echo "class=\"selected\"";} ?>><li>Home</li></a>
		<a href="news.php" <?php if($page=="News"){echo "class=\"selected\"";} ?>><li>News</li></a>
		<a href="about.php" <?php if($page=="About"){echo "class=\"selected\"";} ?>><li>About</li></a>
		<a href="schedule.php" <?php if($page=="Schedule"){echo "class=\"selected\"";} ?>><li>Schedule</li></a>
		<a href="roster.php" <?php if($page=="Roster"){echo "class=\"selected\"";} ?>><li>Roster</li></a>
		<a href="photos.php" <?php if($page=="Photos"){echo "class=\"selected\"";} ?>><li>Photos</li></a>
		<a href="ball_reviews.php" <?php if($page=="Ball Reviews"){echo "class=\"selected\"";} ?>><li>Ball Reviews</li></a>
		<?php
			$query = "SELECT * FROM store WHERE id=1";
			$result = mysql_query($query, $connection);
			confirm_query($result);	
			
			$result_set = mysql_fetch_array($result);
			$store_url = $result_set['url'];
		?>
		<a href="<?php echo $store_url; ?>"><li>Store</li></a>
		<a href="contact.php" <?php if($page=="Contact"){echo "class=\"selected\"";} ?>><li>Contact</li></a>
	</ul>
	<div class="clear"></div>
</nav>
