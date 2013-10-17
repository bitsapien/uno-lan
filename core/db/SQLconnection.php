<?php
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/db/SQLconnection.php
	-------------------------
	 * Connection to the SQl server is made here ,and any changes to the connection 
	   configuration has to be made here.
*/


$conn = mysql_connect('localhost','root','brainfart') or die(mysql_error());
$db = mysql_select_db('uno') or die(mysql_error());

?>

