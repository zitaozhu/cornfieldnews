<!--Created by Zitao Zhu at March 22nd-->
<!--Page for displying searching data-->
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
 
$keyword = $_GET['search'];
//Setup our query
$sql = "SELECT * FROM $usertable WHERE title LIKE '%$keyword%'";
 
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


// session to start the search_detail page
    

?>

<!DOCTYPE html> 
<html>
<head>
    <title>BBC News Labs Bootstrap - A Bootstrap 3 Theme</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 0;
		session_start();
		while ($row = mysqli_fetch_array($result))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td><a href="/search_detail.php">'.$row['title'].'</a></td>
					<td>'.$row['content'].'</td>
					<td>'. date('F d, Y', strtotime($row['date'])) . '</td>
			
				</tr>';
			
            $_SESSION["news_id"][$no] = $row['title'];
            
			$no++;
		}?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="3">TOTAL</th>
				<th><?=number_format($no)?></th>
			</tr>
		</tfoot>
	</table>
</body>




</html>