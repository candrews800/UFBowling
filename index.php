<?php $page = "Home"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php page_count("home"); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">
	<section id="main_news">
		<a href="<?php echo $headline_1['cap1']; ?>" id="banner_link"><img id="banner_image" src="<?php echo $headline_1['cap1']; ?>" alt="News Picture" />
		<h3 id="banner_title">Title</h3>
		<p id="banner_caption">Caption</p></a>
		<img id="select_1" onclick="news_1.set_news(1)" src="images/circle-open.png" />
		<img id="select_2" onclick="news_2.set_news(2)" src="images/circle-closed.png" />
		<img id="select_3" onclick="news_3.set_news(3)" src="images/circle-closed.png" />
	</section>
	<section id="travel_schedule" class="grid_4 alpha">
		<h2>Travel Schedule</h2>
		<div class="section_underline"></div>
		
		<div id="wrap">
		<table>
			<tr>
				<th>Event</th>
				<th>Date</th>
				<th>Location</th>
			</tr>
			<?php
	  		$query = "SELECT * 
					  FROM  `upcoming_event` 
					  WHERE travel_team = 1
					  ORDER BY  `upcoming_event`.`date` ASC";
					  
			$result = mysql_query($query, $connection);
			confirm_query($result);	
			
			$i = 1;
			
			while($event = mysql_fetch_array($result)){
				
				if($i % 2 == 1){
					echo "<tr class=\"odd data\">";
				}
				else if($i % 2 == 0){
					echo "<tr class=\"even data\">";
				}
				echo "<td>" . "<a href=\"event.php?id={$event['id']}\">" . $event['event_title'] . "</a></td>";
				echo "<td>" . "<a href=\"event.php?id={$event['id']}\">" . $event['date'] . "</a></td>";
				echo "<td>" . "<a href=\"event.php?id={$event['id']}\">" . $event['location'] . "</a></td>";
				echo "</tr>";
				$i++;
			}
	  		?>
		</table>
		</div>
	</section>
	<section id="spotlight" class="grid_4 omega">
		<h2>Spotlight</h2>
		<div class="section_underline"></div>
		<?php 
			
			$query = "SELECT * 
						FROM  `spotlight_headline` 
						ORDER BY  `spotlight_headline`.`id` ASC ";
			$result = mysql_query($query, $connection);
			$interview_headline = mysql_fetch_array($result);
			
			$query = "SELECT * 
						FROM  `interviews` 
						WHERE id={$interview_headline['interview_id']}";
			$result = mysql_query($query, $connection);
			confirm_query($result);
			
			$interview = mysql_fetch_array($result);
		?>
		
		<?php $query = "SELECT * 
						FROM  `player` 
						WHERE `player`.`id` = {$interview['player_id']}";
			$result = mysql_query($query, $connection);
			confirm_query($result);
			
			$spotlight = mysql_fetch_array($result);
		?>
		<a href="interview.php?interview_id=<?php echo $interview_headline['interview_id']; ?>">
		<img src="<?php echo $spotlight['face_pic'] ?>" alt="Spotlight" />
		<p><strong><?php echo $spotlight['first_name'] ?></strong></p>
		<p><strong><?php echo $spotlight['last_name']; ?></strong></p>
		<p><?php echo $spotlight['class_status']; ?></p>
		<p><?php echo $spotlight['major']; ?></p>
		</a>		
	</section>
	<section id="team_photos" class="grid_4 omega">
		<h2>Team Photos</h2>
		<div class="section_underline"></div>
		<a href="photos.php"><img src="photos/2012-2013 Team Picture.jpg" alt="Team Photos" /></a>
	</section>
	<section id="ball_reviews" class="grid_4 alpha">
		<h2>Ball Reviews</h2>
		<div class="section_underline"></div>
		<?php
			$query = "SELECT * 
					  FROM  `ball_headlines` 
					  ORDER BY  `ball_headlines`.`id` ASC";
				$result = mysql_query($query, $connection);
				confirm_query($result);
				
				$i=0;
				while($row = mysql_fetch_array($result)){
					$ball_headlines[$i] = $row['ball_id'];
					$i++;
				}
				
				$i=0;
			
				while($i<4)
				{
					$result_set = mysql_query("SELECT * FROM bowling_ball WHERE id = {$ball_headlines[$i]}");
					$bowling_ball = mysql_fetch_array($result_set);					
					echo "<a href=\"ball_reviews.php?id={$bowling_ball['id']}\">";
					echo "<div class=\"ball\">";
					echo "<img src=\"{$bowling_ball['image']}\" />";
					echo "</div></a>";
					$i++;					
				}
		
		?>
		
	</section>
	<section id="booster_club" class="grid_4 omega">
		<?php
		$result_set = mysql_query("SELECT * FROM boosterclub WHERE id=1");
		$booster = mysql_fetch_array($result_set);
		?>
		<a href="<?php echo $booster['file']; ?>"><img src="<?php echo $booster['img']; ?>" alt="Booster Club" /></a>
	</section>
</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

<script>
	var timeoutId = 0;
	var current_banner_id = 1;
	
	function startCountdown() {
	   timeoutId = setTimeout(function () {
	       bannerRotate();
	   }, 5000); 
	}
	
	function bannerRotate() {
    	if(current_banner_id == 1){
    		news_2.set_news(2);
    		current_banner_id = 2;
    	}
    	else if(current_banner_id == 2){
    		news_3.set_news(3);
    		current_banner_id = 3;
    	}
    	else if(current_banner_id == 3){
    		news_1.set_news(1);
    		current_banner_id = 1;
    	}    
    
	    startCountdown(); // Otherwise it will just run once
	}
	

	function News(title, caption, image, link){
		this.title = title;
		this.caption = caption;
		this.image = image;
		this.link = link;
	}
	
	News.prototype.set_news = function(news_selection){
		var image = document.getElementById("banner_image");
		image.src = this.image;
		
		var title = document.getElementById("banner_title");
		title.innerHTML = this.title;
		
		var caption = document.getElementById("banner_caption");
		caption.innerHTML = this.caption;
		
		var link = document.getElementById("banner_link");
		link.href = this.link;
		
		var select_1 = document.getElementById("select_1");
		select_1.src = "images/circle-closed.png";
		
		var select_2 = document.getElementById("select_2");
		select_2.src = "images/circle-closed.png";
		
		var select_3 = document.getElementById("select_3");
		select_3.src = "images/circle-closed.png";
		
		if(news_selection == 1){
			select_1.src = "images/circle-open.png";
			current_banner_id = 1;
		}
		else if(news_selection == 2){
			select_2.src = "images/circle-open.png";
			current_banner_id = 2;
		}
		else if(news_selection == 3){
			select_3.src = "images/circle-open.png";
			current_banner_id = 3;
		}
		
		// Clear the existing timeout then restart after 7 seconds
	    clearTimeout(timeoutId);
	
	    setTimeout(function () {
	        startCountdown();
	    }, 7000);
	}
	
	<?php 
		$query = "SELECT * 
				  FROM  `headlines` 
				  ORDER BY  `headlines`.`id` ASC";
		$result = mysql_query($query, $connection);
		confirm_query($result);
		
		$i=0;
		while($row = mysql_fetch_array($result)){
			$id[$i] = $row['news_id'];
			$i++;
		}
		
		$result_set = mysql_query("SELECT * FROM news WHERE id = {$id[0]}");
		$headline_1 = mysql_fetch_array($result_set);
		$result_set = mysql_query("SELECT * FROM news WHERE id = {$id[1]}");
		$headline_2 = mysql_fetch_array($result_set);
		$result_set = mysql_query("SELECT * FROM news WHERE id = {$id[2]}");
		$headline_3 = mysql_fetch_array($result_set);	
	?>
	
	var news_1 = new News("<?php echo $headline_1['title']; ?>", "<?php echo $headline_1['cap1']; ?>" , "<?php echo $headline_1['image_url']; ?>", "article.php?id=<?php echo $headline_1['id']; ?>");
	var news_2 = new News("<?php echo $headline_2['title']; ?>", "<?php echo $headline_2['cap1']; ?>" , "<?php echo $headline_2['image_url']; ?>", "article.php?id=<?php echo $headline_2['id']; ?>");
	var news_3 = new News("<?php echo $headline_3['title']; ?>", "<?php echo $headline_3['cap1']; ?>" , "<?php echo $headline_3['image_url']; ?>", "article.php?id=<?php echo $headline_3['id']; ?>");
	
	news_1.set_news(1);
</script>
