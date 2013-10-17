<?php
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/create/add_player.php
	--------------------------
	 * Removes any old players ,who last visited the project and have now drifted away.
	 * Checks for a player with same name exists ? And if yes,skips adding player ,sends a
	   feedback to (index.php)
	 * Adds player to table:uno_players
	 * Sets the SESSION['p_id'] and $_SESSION['p_name']
	 * Redirects to (lobby.php)
*/

?>

<?php
session_start();
require('../db/SQL.php');

// removing old players
mysql_query("DELETE FROM uno_players WHERE player_presence<SUBTIME(NOW(),'0 0:0:2')");

// checking whether user is not registering with same name that still lives
$sql = "SELECT * FROM uno_players WHERE player_name='".substr($_POST['player_name'],0,15)."';";

$test = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($test) != 1){
	$_SESSION['p_name'] = substr($_POST['player_name'],0,15); // sets the session player name
	$add = mysql_query("INSERT INTO uno_players(player_name,player_online,player_presence) VALUES('".$_SESSION['p_name']."','1',NOW())") or die(mysql_error()); // adding player to database
	$getid = mysql_query("SELECT player_id FROM uno_players WHERE player_name='".$_SESSION['p_name']."';") or die(mysql_error());
	$pid = mysql_fetch_array($getid) or die(mysql_error());
	$_SESSION['p_id'] = $pid['player_id']; // setting the session player id
	header('Location:../../lobby.php'); // redirecting player to (lobby.php)
	
}
else{
	header('Location:../../index.php?msg=1'); // sending th feedback to (index.php)
}





?>
