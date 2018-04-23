<?php
 
//Sample Database Connection Script 
 
//Setup connection variables, such as database username
//and password
$hostname="localhost";
$username="cornfieldnews_News";
$password="cornfieldnews_News";//"B[x)-p5}JOgO";
$dbname="cornfieldnews_News";   
$usertable="news";
$yourfield = "title";
 
//Connect to the database
$mysqli = new mysqli($hostname, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
 
//$keyword = $_GET['search'];
session_start();
$email = $_SESSION['username'];
// $nid = $_SESSION['nid'];
echo "awdjijij";
//echo $email;

//echo($nid);

//Setup our query
// $ = "SELECT * FROM $usertable WHERE title LIKE '%$keyword%'";
$sql = "SELECT title, nid FROM news
WHERE news.category = 
(SELECT DISTINCT(category) FROM news 
INNER JOIN likes ON likes.nid = news.nid
AND likes.email = $email) ORDER BY date LIMIT 5";
//Run the Query
$result = $mysqli->query($sql);

//If the query returned results, loop through
// each result
if($result)
{
  while($row = mysql_fetch_array($result))
  {
    $name = $row["$yourfield"];
    echo "Name: " . $name; 
    
  }
} 

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

?>

<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
	<h1>Search Result</h1>
	<table class="data-table">
		<caption class="title">Data</caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>NAME</th>
				<th>TEXT</th>
				<th>DATE</th>
				<th>SEARCH</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 0;
		while ($row = mysqli_fetch_array($result))
		{
		    $nid=$row['nid'];
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['title'].'</td>
					<td>'.$row['content'].'</td>
					<td>'. date('F d, Y', strtotime($row['date'])) . '</td>
                    <td><a href="search_detail.php?newsid='.$nid.'">'.$row['nid'].'</a> </td>
				</tr>';
			$no++;
		}?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">TOTAL</th>
				<th><?=number_format($no)?></th>
			</tr>
		</tfoot>
	</table>
</body>
</html>