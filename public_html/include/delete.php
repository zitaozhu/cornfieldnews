
<?php 

//include_once 'dbh_include.php';


$dbServername = "localhost";
		$dbUsername = "cornfieldnews_News";
		$dbPassword = "cornfieldnews_News";
		$dbName = "cornfieldnews_News";
		$conn = mysql_connect($dbServername, $dbUsername, $dbPassword);
		mysql_select_db('cornfieldnews_News');
        echo "connecting   ";
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}

$usertable="news";

$delete_title = $_GET['selected_title'];
$sql = "DELETE FROM $usertable WHERE title = '$delete_title'";
$rel = mysql_query($sql);

if ($rel) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: ";
}

$conn->close();
