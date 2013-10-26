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

<?php require_once("../includes/connection.php") ?>
<?php require_once("includes/header.php") ?>

<p><a href="modify_headlines.php">
	Headlines
</a></p>
<p><a href="modify_event_headlines.php">
	Event Headlines
</a></p>
<p><a href="display_news.php">
	News
</a></p>

<br />
<p><a href="display_events.php">
	Upcoming Events
</a></p>
<p><a href="display_results.php">
	Event Results
</a></p>

<br />
<p><a href="display_players.php">
	Players
</a></p>
<p><a href="display_interviews.php">
	Spotlights/Interviews
</a></p>
<p><a href="modify_spotlight_headline.php">
	Spotlight Headline
</a></p>
<p><a href="display_coaches.php">
	Coaches
</a></p>
<br />
<p><a href="display_bowling_balls.php">
	Bowling Balls
</a></p>
<p><a href="display_ball_reviews.php">
	Ball Reviews
</a></p>
<p><a href="modify_ball_headlines.php">
	Ball Headlines
</a></p>
<br />

<p><a href="display_photo_albums.php">
	Photo Albums
</a></p>
<p><a href="display_photos.php">
	Photos
</a></p>

<br />
<p><a href="modify_about_us.php">
	About Us
</a></p>
<p><a href="display_officers.php">
	Officers
</a></p>
<p><a href="display_practice_schedule.php">
	Practice Schedule
</a></p>
<p><a href="display_resources.php">
	Resources - Links
</a></p>
<p><a href="display_history.php">
	History
</a></p>
<p><a href="display_faq.php">
	FAQ
</a></p>
<p><a href="display_alumni.php">
	Alumni
</a></p>
<p><a href="modify_contact.php">
	Contact
</a></p>

<br />
<p><a href="display_sponsors.php">
	Sponsors
</a></p>
<p><a href="modify_booster.php">
	Booster Club
</a></p>

<br />
<p><a href="modify_store.php">
	Store
</a></p>


<br />
<p><a href="display_newsletter.php">
	Newsletter
</a></p>

<br />
<p><a href="statistics.php">
	Statistics
</a></p>

<?php require_once("includes/footer.php") ?>