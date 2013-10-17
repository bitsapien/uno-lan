<?php 
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/create/join.php
	--------------------------------
	 * Gets the respective game_session ID
	 * Binds the player to the selected game_session
	 * Sets the SESSION['table_id']
	 * Updates activity log -> ' has joined this table.'
	 * Redirects to (table.php)
	
*/

session_start();
require('../db/SQL.php');

$tid = $_GET['sessid']; //getting the game_session ID


// adding the user in the selected game_session

mysql_query("UPDATE uno_players SET table_id='".$tid."' WHERE player_id='".$_SESSION['p_id']."';") or die(mysql_error());

// adding the activity to log
add_activity(' has joined the table > '.$tid,$_SESSION['p_id']);


// setting the session information about the current table

$_SESSION['table_id'] = $tid;

header('Location:../../table.php'); // redirects to table.php

?>
