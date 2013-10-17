<?php
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	table.php
	---------
	 * Updates mates about which mates are online(core/ajax/mates.php)
	 * Keeps the sessions and players alive (core/ajax/player.php),(core/ajax/game_sessions.php)
	 * Displays a waiting message if players less than 3 ,and when there are more than 3 ,a 
	   countdown of 30 seconds is shown ,after which it redirects to (core/create/start_game.php)
	   (core/ajax/mates.php)
	
*/

session_start();
?>
<!doctype html>
<head><title>UnoLAN Table : <?php echo $_SESSION['p_name'] ?></title>
<script language="javascript" src="core/js/jquery-1.2.6.min.js"></script>
<script language="javascript" src="core/js/jquery.timers-1.0.0.js"></script>

<script type="text/javascript">



$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".mates").everyTime(1000,function(i){
			j.ajax({
			  url: "core/ajax/mates.php",// updates mates
			  cache: false,
			  success: function(html){
				j(".mates").html(html);
			  }
			})
		})
		j(".players").everyTime(100,function(i){
			j.ajax({
			  url: "core/ajax/players.php",// updates players
			  cache: false,
			  success: function(html){
				j(".players").html(html);
			  }
			})
		})
		j(".sessions").everyTime(100,function(i){
			j.ajax({
			  url: "core/ajax/game_sessions.php",// updates game sessions/tables
			  cache: false,
			  success: function(html){
				j(".sessions").html(html);
			  }
			})
		})
		
	});
	
   j('.refresh').css();
	

});

</script>
</head>
<body>
<br/><br/>
<br/>
<br/>
<center>
<div class="heading" style="overflow:auto;position:fixed;top:0;text-align:middle;width:100%;height:300px;z-index:1;"><em><h4>UnoLAN Table</em></h4>
<a href="core/destroy/leave.php"> Leave Table </a>
</div>


<div class="mates" style="overflow:auto;border-top:1px dotted #000;border-bottom:1px dotted #000;width:100%;position:absolute;left:0;top:4em;bottom:30%;min-width:100px;" >
</div>
<div class="players" style="display:none"></div>
<div class="sessions" style="display:none"></div>

</center>
</body>

</html>
