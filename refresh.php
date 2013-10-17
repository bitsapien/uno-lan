<?php

include('core/lib/config/sql_config.inc');

$con = mysql_connect(SQL_HOST,SQL_USER,SQL_PASS);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db(SQL_DB, $con);

$result = mysql_query("SELECT * FROM session_uno ORDER BY id DESC");


while($row = mysql_fetch_array($result))
  {
	$row["move"] = strip_tags($row["move"]);
	
  	echo '<span style="color:rgb(59, 89, 152);font-weight:bold;">'.'<span>'.$row['player'].'</span>'. '&nbsp;&nbsp;</span>  <span style="text-overflow:none;font-weight:italic;">' . $row['move'].' </span>'.'<span><div align="right"><font face="italliano" 		size="1" color="grey" >'.$row['ts'].'</font></div></span>';

  }


mysql_close($con);
?>
