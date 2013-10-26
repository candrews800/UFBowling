<?php $page = "Interview"; ?>
<?php include_once('includes/functions.php'); ?>
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/header.php'); ?>
<div id="content_area" class="grid_8">

<?php 
	
	$interview_id = $_GET['interview_id'];

	$query = "SELECT * FROM interviews WHERE id={$interview_id}";
	$result = mysql_query($query);
	$interview = mysql_fetch_array($result);
	
	$query = "SELECT * FROM player WHERE id={$interview['player_id']}";
	$result2 = mysql_query($query);
	$player = mysql_fetch_array($result2);
	
	$query = "SELECT * FROM interview_qa WHERE interview_id={$interview_id}";
	$result3 = mysql_query($query);
	$interview_qa = array();
	
	while($row = mysql_fetch_array($result3)){
		$interview_qa[] = $row;
	}
	
?>

<h2><?php echo $player['first_name']. " " . $player['last_name']; ?> <span class="spotlight">Spotlight</span></h2>
<div class="section_underline"></div>
<img class="interview_img" src="<?php echo $player['face_pic']; ?>" />
<?php foreach($interview_qa as $qa){ ?>

<p class="question"><strong><?php echo $qa['question']; ?></strong></p>	
<p class="answer"><?php echo $qa['answer']; ?></p>
	
<?php } ?>

</div> <!-- end grid_8 -->
<?php include_once('includes/sidebar.php'); ?>
<?php include_once('includes/footer.php'); ?>

