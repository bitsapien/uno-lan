<?php 
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/destroy/leave.php
	--------------------------------
	 * Unbinds the player to the selected game_session
	 * Unsets the SESSION['table_id']
	 * Updates activity log -> ' has joined this table.'
	 * Redirects to (lobby.php)
	
*/

session_start();
require('../db/SQL.php');


// deleting the table binding in the selected session

mysql_query("UPDATE uno_players SET table_id='' WHERE player_id='".$_SESSION['p_id']."';") or die(mysql_error());

// adding the activity to log
add_activity(' has left the table > '.$_SESSION['table_id'],$_SESSION['p_id']);


// unsetting the session information about the current table

$_SESSION['table_id'] = '';

header('Location:../../lobby.php'); // redirecting to (lobby.php)

?>
