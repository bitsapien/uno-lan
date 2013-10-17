<?php 
/*	Project name	: uno-lan
	Author		: crahul
	Date-of-origin	: 12th October,2013
	Version		: Original
	(Information on subsequent updates is supposed to be put here ,along with the author name)


	===========================================================================================

	core/dealer.php
	--------------------------------
	 * uno_shuffle() ,function to shuffle cards
	 * uno_deal(number_of_cards) , function to deal cards
	 * uno_reshuffle() ,function to shuffle cards when cards have been exhausted.
	
*/
session_start();
require('db/SQL.php');
$deck_n = array('0.r','1.r','2.r','3.r','4.r','5.r','6.r','7.r','8.r','9.r','d.r','r.r','s.r','1.r','2.r','3.r','4.r','5.r','6.r','7.r','8.r','9.r','d.r','r.r','s.r','0.g','1.g','2.g','3.g','4.g','5.g','6.g','7.g','8.g','9.g','d.g','r.g','s.g','1.g','2.g','3.g','4.g','5.g','6.g','7.g','8.g','9.g','d.g','r.g','s.g','0.y','1.y','2.y','3.y','4.y','5.y','6.y','7.y','8.y','9.y','d.y','r.y','s.y','1.y','2.y','3.y','4.y','5.y','6.y','7.y','8.y','9.y','d.y','r.y','s.y','0.b','1.b','2.b','3.b','4.b','5.b','6.b','7.b','8.b','9.b','d.b','r.b','s.b','1.b','2.b','3.b','4.b','5.b','6.b','7.b','8.b','9.b','d.b','r.b','s.b','d4','wc','d4','wc','d4','wc','d4','wc');

/*echo sizeof($cards);
echo "<br/><p>";
print_r(array_chunk($cards,2));
echo "<br/><p>";
print_r(array_merge($a1,$a2));
echo "<br/><p>";
$c = shuffle($cards);
print_r($cards);
echo "<br/><p>";
print_r(array_slice($cards,2));
echo "<br/><p>";
print_r(array_push($cards,'3.r')); // adds a new element to end of array and unshift to beginning of array and unshift removes from beginning
echo "<br/><p>";
print_r(array_pop($cards)); //deletes an element from the end of an array
echo "<br/><p>";
print_r($cards);
echo "<br/><p>";
print_r(array_rand($cards,7));

echo "<b> hi : "."";
print_r(unserialize(serialize($cards)));*/

// storing and retreiving array elements -> serialize and unserialize

$a=array("red","green","blue","yellow","brown");
echo array_slice($a,-1,1)[0];

function uno_shuffle(){
	// getting the deck of cards
	$deck_us = mysql_fetch_array(mysql_query("SELECT table_deck FROM uno_tables WHERE table_id='".$_SESSION['table_id']."'"));
	$deck = unserialize($deck_us); // got the deck,now time to shuffle
	$limit = rand(1,9); //setting the limit of shufflings
	echo $limit;
	for($i=0 ; $i<$limit ; $i++)	
		shuffle($deck); // shuffling the deck ,basic shuffle ,a more random algorithm is required
	$table_deck = serialize($deck); // preparing deck of cards
	$sql= "UPDATE uno_tables SET table_deck='".$table_deck."' WHERE table_id='".$_SESSION['table_id']."'";
	mysql_query($sql)or die (mysql_error()); // deck added
	return $deck;
}

function uno_deal($num){
	
	uno_shuffle(); // shuffling it once more before we deal it.
	// retrieve the deck of cards
	$deck_us = mysql_fetch_array(mysql_query("SELECT table_deck FROM uno_tables WHERE table_id='".$_SESSION['table_id']."'"));
	$deck = unserialize($deck_us); // got the deck,now time to deal
	
}


?>
