<?php
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/db/SQL.php
	---------------
	 * The file includes the SQL configuration for access by all parts of the project.
	 * Function -> add_activity(move,player_id) : Adds an activity to the project.
	 * Function -> get_activity($filter_param,$filter) : Gets activity according to filter 
	   ('player'/'table')
	 * Future updates will contain more project-specific SQL-modules
*/

require('SQLconnection.php');

function add_activity($move,$player){
	//contructing the sql statement
	$table.='notif';
	$sql = "INSERT INTO uno_activity(activity_move,player_id) VALUES('".$move."','".$player."')";
	mysql_query($sql) or die('add_activity() : '.mysql_error());
}

function get_activity($filter_param,$filter){
	//contructing the sql statement
	$sql = "SELECT * FROM uno_activity WHERE ".$filter."_id = '".$filter_param."'";
	$res = mysql_query($sql) or die('get_activity() : '.mysql_error());
	return mysql_fetch_array($res);
}
?>


