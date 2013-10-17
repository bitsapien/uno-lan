<?php 
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/ajax/game_sessions.php
	--------------------------------
	 * Extracts list of online game_sessions.
	 * Generate list of players in a current game_session.
	 * Checks whether session has started ,a displays a message accordingly.
	
*/

session_start();
require('../db/SQL.php');

// retreiving all hosted sessions that are alive and printing them out
 $out = '<br/><table >';
 $sql = "SELECT table_id,table_top_card FROM uno_tables";
 $data = mysql_query($sql) or die(mysql_error());
 $count = 1; // setting the session number
 while($res = mysql_fetch_array($data)){
	$id = $res['table_id'];
	
	$out .= '<tr><td>Game session '.$count.' </td>';
	if($res['table_top_card'] == 'z')
		$out .= '<td><small><em><a href="core/create/join.php?sessid='.$id.'" target="_blank"> Join Table </a></em></small></td></tr>';
	else
		$out .= '<td><small><em>Game has already commenced.</em></small></td></tr>';
	$out .= '<tr><td><font size="1" ><p>Players -> ';
	// generating the list of players in a session
	$sql = "SELECT player_name FROM uno_players WHERE table_id = '".$id."'";
 	$players = mysql_query($sql) or die(mysql_error());

	if(!mysql_num_rows($players))
		$out .= 'No players in this session yet.';
	else{

		while($players_list = mysql_fetch_array($players))
			$out .= ' '.$players_list['player_name'].' ';
			
	}
	echo ' </p></font></td><td></td></tr>';
	$count++;
	
 }
 $out .= '</table>';
 if(!(mysql_num_rows($data)))
	echo '<br/><em><small><font color="blue">No session started yet ,click the button below to start one.</font></small></em>';
	
echo $out;


 ?>
