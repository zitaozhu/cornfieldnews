<?php
//include_once 'dbh_include.php';

$dbServername = "localhost";
$dbUsername = "cornfieldnews_News";
$dbPassword = "cornfieldnews_News";
$dbName = "cornfieldnews_News";
$conn = mysql_connect($dbServername, $dbUsername, $dbPassword);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysql_select_db('cornfieldnews_News');

echo    "connected";
$usertable="news";
$yourfield = "title";

$selected_title = $_GET["selected_title"];
$new_content = $_GET["new_content"];
echo "selected_title = $selected_title \n";
echo "new_content = $new_content \n";

$sql="SELECT nid FROM news";
$res = mysql_query($sql) ;
echo "FOUND !!! $res  ";

/*
if(($result = mysql_query($sql))
    {
	echo "FOUND !!! $result ";
}
*/

$rel = mysql_query("UPDATE $usertable SET content='$new_content' WHERE title='$selected_title'");


/*$sql = "UPDATE $usertable SET content='$new_content' WHERE title='$selected_title'";*/



if ($rel) {
    echo "Record updated successfully";
} else {
    echo "Error updating record:  $rel ";
}

$mysqli->close();
?> 