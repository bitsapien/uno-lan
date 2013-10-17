<?php
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	index.php
	---------
	 * The default page for the project. It takes input ,the name of the player ,and sends it to 
	   (core/create/add_player.php). 
	 * It displays a message ,if a player with the same name exists ,this it does after a GET 
	   request feedback is received from (core/create/add_player.php)
*/

?>


<!doctype html>
<head><title>Welcome to UnoLAN </title></head>
<body>
<br/><br/>
<br/>
<br/>
<center>
<h1><em>UnoLAN</em></h1>
<?php

session_start();
session_destroy();
session_start();

if(isset($_GET['msg'])){
	switch($_GET['msg']){
		case 1:
		echo '<i><small><font color="red">Player name already present ,choose another</font></small></i>';
		break;
	}
}
?>
<br/>
<br/>
<form action="core/create/add_player.php" method="POST">
<input type="text" name="player_name" />
<input type="submit" name="go" value="Join Game!"/>
</form>
</center>
</body>

</html>
