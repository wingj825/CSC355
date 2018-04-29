<html>
<head>
<title>Presidents</title>
</head>
<body>
<?php
	$DBConnect = mysql_connect("localhost", "wing", "");
	if (! $DBConnect)
	{
	  echo "<P>Database not available";
	}
	mysql_select_db("wing");
	$SQLstring = "SELECT * FROM PRESIDENTS;";
	$QueryResult = mysql_query($SQLstring)
     Or die("<P>Unable to execute the query</P>" .
          "<P>Error code " . mysql_errno($DBConnect) .
            " : " . mysql_error($DBConnect) . "</P>");
	echo "<TABLE BORDER='2'>";
	echo "<TR>";
	for ($i = 0; $i < mysql_num_fields($QueryResult); $i++)
	{
	  $field = mysql_fetch_field($QueryResult, $i);
	  echo "<TH> $field->name </TH>";
	}
	echo "</TR>";
	$Row = mysql_fetch_row($QueryResult);
	do
	{
  		echo "<TR>";
  		for ($i = 0; $i < mysql_num_fields($QueryResult); $i++)
  		{
    		echo "<TD>{$Row[$i]}</TD>";
  		}
  		echo "</TR>";
  		$Row = mysql_fetch_row($QueryResult);
	} while ($Row);
mysql_close($DBConnect);
?>
</TABLE>
</body>

</html>
