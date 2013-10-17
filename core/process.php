<?php
session_start();
include('lib/SessionUNO.php');
$card = $_GET['card'];
$sess = unserialize($_SESSION['game']);

$tc = $_SESSION['top'];
$sessid = $sess->sessionID;
if($sess->storeMove($card,"pl 1",$tc,$sessid))
$_SESSION['top']=$card;
echo $tc;
/*
// we'll generate XML output
header('Content-Type: text/xml');
// generate XML header
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
// create the <response> element
echo '<response>';
// retrieve the user name

// generate output 
echo $card.$_SESSION['game'];

// close the <response> element
echo '</response>';*/
?>
