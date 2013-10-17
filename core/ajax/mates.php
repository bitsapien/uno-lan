<?php 
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/ajax/mates.php
	--------------------------------
	 * Updates the mates list of the table.
	 * Checks for 3 mates available ,if no ,sets column table_creation to ''
	 * If 3 or more mates are available ,sets the table_creation column to 30 seconds from then.
	 * Displays the countdown ,and when countdown gets over ,redirects to 
	  (core/create/start_game.php)
	
*/

session_start();
require('../db/SQL.php');



// retreiving all mates that are present in the table
$out = '<br/><br/><table>';
 $sql = "SELECT player_name FROM uno_players WHERE table_id = '".$_SESSION['table_id']."'";
 $data = mysql_query($sql) or die("SELECT 1".mysql_error());
 $c = 0;
 while($res = mysql_fetch_array($data)){
	$out.= '<tr><td>'.$res['player_name'].'</td><tr>';
	$c++;
 }
 if(!(mysql_num_rows($data)))
	$out.= '<tr><td><br/><em><small><font color="blue">This table is empty.</font></small></em><tr><td>';
 
$out.='</table>';

echo $out;
 
// checking if there are more than 3 mates
if($c >= 3){
// checking for existence of the table instance
$check = mysql_query("SELECT table_creation FROM uno_tables WHERE table_id='".$_SESSION['table_id']."'") or die("SELECT 2".mysql_error());
$crt = mysql_fetch_array($check);
if($crt['table_creation'] == '')
{
	// initialize table
	$time = time()+30;
	mysql_query("UPDATE uno_tables SET table_creation='".$time."' WHERE table_id='".$_SESSION['table_id']."'") or die("UPDATE 1".mysql_error());
}
else{
	$d = mysql_fetch_array(mysql_query("SELECT table_creation FROM uno_tables WHERE table_id='".$_SESSION['table_id']."'"));
	// print out countdown
	$timescript = '
<span id="countdown"></span><script type="text/javascript">

var target_date = new Date('.$d['table_creation'].'*1000).getTime();
 

var days, hours, minutes, seconds;
 
// get tag element
var countdown = document.getElementById("countdown");
 
// update the tag with id "countdown" every 1 second

 
    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;
 
    // do some time calculations
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
     
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
     
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
     
    // format countdown string + set tag value
    countdown.innerHTML = seconds;  
	// redirecting users to start_game.php
	if(seconds < 0){
		window.location = \'core/create/start_game.php\';
	}
</script>';
echo $timescript;
}
echo ' seconds for the game to start.';

}
else
{
mysql_query("UPDATE uno_tables SET table_creation='' WHERE table_id='".$_SESSION['table_id']."'") or die(mysql_error());
echo '<small>Table waiting... (atleast 3 mates required to start game)</small>';
}
 ?>

