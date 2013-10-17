<?php
session_start();
include('core/lib/SessionUNO.php');
$sess = new SessionUNO();

$_SESSION['game'] = serialize($sess);

$_SESSION['id'] = $sess->sessionID;
$_SESSION['top']="1.r";
print_r($_SESSION);

header('Location:game.php');
?>
