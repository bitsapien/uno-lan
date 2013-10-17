<?php 
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/create/start_game.php
	--------------------------------
	 * Adds a random card as the top_card
	 * Generate list of players in a current game_session.
	 * Checks whether session has started ,a displays a message accordingly.
	
*/
session_start();
require('../db/SQL.php');
//require('../dealer.php');

// tasks : order the mates  , assign cards to each mate ,redirect to game.php


// 1: Order the mates

 //retrieve the list of mates
 
 $sql = "SELECT player_id FROM uno_players WHERE table_id='".$_SESSION['table_id']."'";
 $res = mysql_query($sql);
 $mates_list=array();
 while($mates = mysql_fetch_array($res))
	array_push($mates_list,$mates['player_id']);

 shuffle($mates_list);

 $mates_list_s = serialize($mates_list);

 mysql_query("UPDATE uno_tables SET table_mates='".$mates_list_s."' WHERE table_id='".$_SESSION['table_id']."'"); // mates ordered


?>
