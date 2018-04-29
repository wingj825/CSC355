<?php
header("Cache-Control: post-check=1,pre-check=2");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/xml");
echo "<?xml version=\"1.0\"?>";
echo "<root>";  

$id = $_GET["i"];

$DBConnect = mysql_connect("localhost", "wing", "");
mysql_select_db("wing");

$query ="SELECT NAME, YEAR_ELECTED, PARTY " .
        "FROM PRESIDENTS " .
        "WHERE PRESIDENT_ID = ${id}";

$QueryResult = mysql_query($query);
$Row = mysql_fetch_row($QueryResult);

if($Row)
{
  echo "<President>";
  echo "<Name>" . $Row[0] . "</Name>";
  echo "<Year>" . $Row[1] . "</Year>";
  echo "<Party>" . $Row[2] . "</Party>";
  echo "</President>";
}
echo "</root>";

?>