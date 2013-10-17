<?php
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/create/add_game_session.php
	--------------------------------
	 * Add table_id,table_top_card,table_deck to table:uno_tables
	 * Add activity log -> 'has started a game session(table). with ID'
	 * Redirect to (lobby.php)
	
*/

session_start();
require('../db/SQL.php');

// checking if the request came from a real player

if(isset($_SESSION['p_id'])){

	// create session
	
	$table_id = "tid_".time().$_SESSION['p_id']; // generating table_id

	$deck = array('0.r','1.r','2.r','3.r','4.r','5.r','6.r','7.r','8.r','9.r','d.r','r.r','s.r','1.r','2.r','3.r','4.r','5.r','6.r','7.r','8.r','9.r','d.r','r.r','s.r','0.g','1.g','2.g','3.g','4.g','5.g','6.g','7.g','8.g','9.g','d.g','r.g','s.g','1.g','2.g','3.g','4.g','5.g','6.g','7.g','8.g','9.g','d.g','r.g','s.g','0.y','1.y','2.y','3.y','4.y','5.y','6.y','7.y','8.y','9.y','d.y','r.y','s.y','1.y','2.y','3.y','4.y','5.y','6.y','7.y','8.y','9.y','d.y','r.y','s.y','0.b','1.b','2.b','3.b','4.b','5.b','6.b','7.b','8.b','9.b','d.b','r.b','s.b','1.b','2.b','3.b','4.b','5.b','6.b','7.b','8.b','9.b','d.b','r.b','s.b','d4','wc','d4','wc','d4','wc','d4','wc');
	$limit = rand(1,9); //setting the limit of shufflings
	echo $limit;
	for($i=0 ; $i<$limit ; $i++)	
		shuffle($deck); // shuffling the deck 
	$table_deck = serialize($deck); // preparing deck of cards
	$sql= "INSERT INTO uno_tables (table_id,table_top_card,table_deck) VALUES('".$table_id."','z','".$table_deck."')";
	mysql_query($sql)or die (mysql_error()); // table information added

	// adding the activity to log
	add_activity(' has started a game session(table) with ID='.$table_id,$_SESSION['p_id']);

}

header('Location:../../lobby.php'); // redirecting to (lobby.php)



?>

