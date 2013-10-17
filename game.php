<?php 
session_start();

?>
<!DOCTYPE html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width ,initial-scale=1">
<title>UnoLAN</title>
<script language="javascript" src="core/js/jquery-1.2.6.min.js"></script>
<script language="javascript" src="core/js/jquery.timers-1.0.0.js"></script>
<script language="javascript" src="core/js/get.js"></script>
<script type="text/javascript">



$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(1000,function(i){
			j.ajax({
			  url: "refresh.php",
			  cache: false,
			  success: function(html){
				j(".refresh").html(html);
			  }
			})
		})
		j(".players").everyTime(100,function(i){
			j.ajax({
			  url: "players.php",
			  cache: false,
			  success: function(html){
				j(".players").html(html);
			  }
			})
		})
		j(".sessions").everyTime(100,function(i){
			j.ajax({
			  url: "sessions.php",
			  cache: false,
			  success: function(html){
				j(".sessions").html(html);
			  }
			})
		})
		
	});
	
   j('.refresh').css();

});

</script>

</head>

<body bgcolor="#EEEEE" font-face="sans-serif" >
<div class="players" style="display:none"></div>
<div class="sessions" style="display:none"></div>
<center>
<div id="chat" style="text-align:left;max-width:600px;font-size:16px;width:100%;">
<h3><b>Player 1</b></h3>
<hr/>


<div class="refresh" style="max-height:300px;overflow:auto;">
<?php
include('refresh.php');

?>
</div>
</div>

<?php
$cards = array("0.g","1.g","2.g","3.g","4.g","5.g","6.g","7.g","8.g","9.g","d.g","r.g","s.g","0.r","1.r","2.r","3.r","4.r","5.r","6.r","7.r","8.r","9.r","d.r","r.r","s.r","0.b","1.b","2.b","3.b","4.b","5.b","6.b","7.b","8.b","9.b","d.b","r.b","s.b","0.y","1.y","2.y","3.y","4.y","5.y","6.y","7.y","8.y","9.y","d.y","r.y","s.y","d4","wc");
for($i=0;$i<54;$i++)
echo '<input type="button" id="myName" name="card" value="'.$cards[$i].'" onclick="process(\''.$cards[$i].'\')" />';


?>
</form>
<br>
<div id="divMessage"/>
<?php print_r($_SESSION);?>
<footer>

<p>UnoLAN By rahul - 2013</p><a href="index.php">end game</a>
</footer>
</center>
</body>
</html>
