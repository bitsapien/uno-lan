<?php
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	lobby.php
	---------
	 * Updates players about which players are online(core/ajax/player.php) ,and showing which 
	   game sessions that are available with the players who have joined it with a link to it.
	   (core/ajax/game_sessions.php)
	 * Link to create a session. (core/create/add_game_session.php)
	
*/

session_start();
?>
<!doctype html>
<head><title>UnoLAN Lobby : <?php echo $_SESSION['p_name'] ?></title>
<script language="javascript" src="core/js/jquery-1.2.6.min.js"></script>
<script language="javascript" src="core/js/jquery.timers-1.0.0.js"></script>

<script type="text/javascript">



$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
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
<div class="heading" style="overflow:auto;position:fixed;top:0;text-align:middle;width:100%;"><em><h4>UnoLAN Lobby</em></h4></div>

<div class="players" style="overflow:auto;color:green;border-left:1px dotted #000;border-bottom:1px dotted #000;width:20%;position:absolute;right:0;top:0;bottom:0px;text-align:left;"></div>

<div class="sessions" style="overflow:auto;border-top:1px dotted #000;border-bottom:1px dotted #000;width:80%;position:absolute;left:0;top:4em;bottom:30%;min-width:100px;" >
</div>

<div class="new_session" style="overflow:auto;position:fixed;text-align:middle;width:100%;bottom:15%;">
	or
	<a href="core/create/add_game_session.php">Start a new TABLE.</a>
</div>
</center>
</body>

</html>
