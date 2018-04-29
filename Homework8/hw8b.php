<html>
<head>
<title>Updated Presidents Graph</title>
</head>
<body>
<?php
	$DBConnect = mysql_connect("localhost", "wing", "");
	mysql_select_db("wing");
	
	$SQLstring = "SELECT MAX(PRESIDENT_ID) FROM PRESIDENTS";
	$QueryResult = mysql_query($SQLstring);
	
	$Row = mysql_fetch_row($QueryResult);
	$myID = $Row[0] + 1;	
	
	$name = $_POST["name"];
	$state = $_POST["state"];
	$year = $_POST["year"];
	$party = $_POST["party"];
		
	$SQLstring = "INSERT INTO PRESIDENTS VALUES(" .
              $myID . ",'" . $name . "','" . $state .
              "'," . $year . ",'" . $party .
              "');";  
	
	$QueryResult = mysql_query($SQLstring);
    
    $SQLstring2 = "SELECT * FROM PRESIDENTS;";
	$QueryResult2 = mysql_query($SQLstring2);
    
    echo "<TABLE BORDER='2'>";
	echo "<TR>";
	for ($i = 0; $i < mysql_num_fields($QueryResult2); $i++)
	{
	  $field = mysql_fetch_field($QueryResult2, $i);
	  echo "<TH> $field->name </TH>";
	}
	echo "</TR>";
	$Row = mysql_fetch_row($QueryResult2);
	do
	{
  		echo "<TR>";
  		for ($i = 0; $i < mysql_num_fields($QueryResult2); $i++)
  		{
    		echo "<TD>{$Row[$i]}</TD>";
  		}
  		echo "</TR>";
  		$Row = mysql_fetch_row($QueryResult2);
	} while ($Row);
   	mysql_close($DBConnect);
	echo "</TABLE>";
?>

</body>
</html>
