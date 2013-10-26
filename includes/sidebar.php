<aside class="grid_4">
	<section id="sponsors">
		<h5>Sponsors</h5>
		<?php
			$query = "SELECT * 
				 	  FROM  `sponsor` 
				  	  ORDER BY  `sponsor`.`id` ASC";
				  
			$result = mysql_query($query, $connection);
			confirm_query($result);	
			
			while($sponsor = mysql_fetch_array($result)){
				echo "<a href=\"{$sponsor['link']}\">";
				echo "<img src=\"{$sponsor['img_url']}\" /></a>";
			}
		?>
	</section>
	<section id="headlines">
		<?php 
				$query = "SELECT * 
						  FROM  `headlines` 
						  ORDER BY  `headlines`.`id` ASC";
				$result_set = mysql_query($query, $connection);
				confirm_query($result_set);
				
				$i=0;
				while($row = mysql_fetch_array($result_set)){
					$id3[$i] = $row['news_id'];
					$i++;
				}
				$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[0]}");
				$headline_1 = mysql_fetch_array($result_set);
				$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[1]}");
				$headline_2 = mysql_fetch_array($result_set);
				$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[2]}");
				$headline_3 = mysql_fetch_array($result_set);
				if($id3[3] > 0){
					$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[3]}");
					$minor_1 = mysql_fetch_array($result_set);
				}
				if($id3[4] > 0){
					$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[4]}");
					$minor_2 = mysql_fetch_array($result_set);
				}
				if($id3[5] > 0){
					$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[5]}");
					$minor_3 = mysql_fetch_array($result_set);
				}
				if($id3[6] > 0){
					$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[6]}");
					$minor_4 = mysql_fetch_array($result_set);
				}
				if($id3[7] > 0){
					$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[7]}");
					$minor_5 = mysql_fetch_array($result_set);
				}
				if($id3[8] > 0){
					$result_set = mysql_query("SELECT * FROM news WHERE id = {$id3[8]}");
					$minor_6 = mysql_fetch_array($result_set);
				}
			?>
		
		<h2>Headlines</h2>
		<div class="section_underline"></div>
		<?php
			
			if(isset($minor_1)){
				echo "<h4><a href=\"article.php?id={$minor_1['id']}\">{$minor_1['title']}</a></h4>";
			}
			if(isset($minor_2)){
				echo "<h4><a href=\"article.php?id={$minor_2['id']}\">{$minor_2['title']}</a></h4>";
			}
			if(isset($minor_3)){
				echo "<h4><a href=\"article.php?id={$minor_3['id']}\">{$minor_3['title']}</a></h4>";
			}
			if(isset($minor_4)){
				echo "<h4><a href=\"article.php?id={$minor_4['id']}\">{$minor_4['title']}</a></h4>";
			}
			if(isset($minor_5)){
				echo "<h4><a href=\"article.php?id={$minor_5['id']}\">{$minor_5['title']}</a></h4>";
			}
			if(isset($minor_6)){
				echo "<h4><a href=\"article.php?id={$minor_6['id']}\">{$minor_6['title']}</a></h4>";
			}
			
		?>
	</section>
	<section id="tournaments">
		<h2>Tournaments</h2>
		<div class="section_underline"></div>
		<?php
				$query = "SELECT * 
						  FROM  `event_headlines` 
						  ORDER BY  `event_headlines`.`id` ASC";
				$result = mysql_query($query, $connection);
				confirm_query($result);
				
				$i=0;
				while($row = mysql_fetch_array($result)){
					$id[$i] = $row['event_id'];
					$i++;
				}
				
				$result_set = mysql_query("SELECT * FROM upcoming_event WHERE id = {$id[0]}");
				$event1 = mysql_fetch_array($result_set);
				$result_set = mysql_query("SELECT * FROM upcoming_event WHERE id = {$id[1]}");
				$event2 = mysql_fetch_array($result_set);
				$result_set = mysql_query("SELECT * FROM upcoming_event WHERE id = {$id[2]}");
				$event3 = mysql_fetch_array($result_set);
				$result_set = mysql_query("SELECT * FROM upcoming_event WHERE id = {$id[3]}");
				$event4 = mysql_fetch_array($result_set);
			?>
		<?php 
			echo "<h6>Upcoming</h6>";
			if($event1['id'] > 0){
				echo "<h4><a href=\"event.php?id={$event1['id']}\">" . $event1['event_title'] . "</a></h4>";
			}
			if($event2['id'] > 0){
				echo "<h4><a href=\"event.php?id={$event2['id']}\">" . $event2['event_title'] . "</a></h4>";
			}
			if($event3['id'] > 0 || $event4['id'] > 0){
				echo "<h6>Recent Results</h6>";
				if($event3['id'] > 0){
					echo "<h4><a href=\"event.php?id={$event3['id']}\">" . $event3['event_title'] . "</a></h4>";
				}
				if($event4['id'] > 0){
					echo "<h4><a href=\"event.php?id={$event4['id']}\">" . $event4['event_title'] . "</a></h4>";
				}
			}
		?>
	</section>
	<section id="newsletter">
		<h2>Newsletter</h2>
		<div class="section_underline"></div>
		<form action="subscribe.php" method="post">
			<input id="subscribe-input" type="text" name="email" placeholder="Enter your email address" required />
			<input class="button" type="submit" value="Subscribe" />
			<p>Join our mailing list to be informed of upcoming tournaments, local events, and all things UF Bowling.</p>
		</form>
			
	</section>
</aside>
<div class="clear"></div>