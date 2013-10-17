
<?php 
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/ajax/players.php
	--------------------------------
	 * Updates the player_presence column and player_online column to update online-status.
	 * Extracts list of online users.
	 * Sets player_online=0 if offline for more than 10s.
	 * Delets player from table:uno_players if inactive for more than 3 minutes.
	
*/

session_start();
require('../db/SQL.php');

//update online status

mysql_query("UPDATE uno_players SET player_online='1', player_presence=NOW() WHERE player_id='".$_SESSION['p_id']."'") or die(mysql_error());

// extracting list of users online
$out = '<strong><em>Online :</em></strong><hr/><ul>';
$res = mysql_query("SELECT player_name FROM uno_players WHERE player_online='1'") or die(mysql_error());
while($arr = mysql_fetch_array($res))
$out .= "<li>".$arr['player_name']."</li>"; 
$out .= "</ul>";

//setting the player offline if inactive for 10 seconds

mysql_query("UPDATE uno_players SET player_online='0' WHERE player_presence<SUBTIME(NOW(),'0 0:0:10')");

//deletes the player when away for more than 3 minutes

mysql_query("DELETE FROM uno_players WHERE player_presence<SUBTIME(NOW(),'0 0:03:0')");




echo $out;
 ?>
