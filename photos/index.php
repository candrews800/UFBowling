<?php require_once("../includes/connection.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("../includes/header.php") ?>

<h1>Photos</h1>
<?php $query = "SELECT * 
		  		FROM  `photos` 
		  		ORDER BY  `photos`.`id` DESC ";	
		  
$result = mysql_query($query, $connection);
confirm_query($result);

while($image = mysql_fetch_array($result)){
	echo "<a class=\"photo-slideshow\" href=\"{$image['url']}\" title=\"{$image['caption']}\">";
	echo "<img src=\"{$image['url']}\" />";
	echo "</a>";
}

?>
<?php require_once("../includes/footer.php") ?>
<link rel="stylesheet" href="_css/colorbox.css" />
<script src="jquery.colorbox.js"></script>

<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".photo-slideshow").colorbox({rel:'photo-slideshow'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>