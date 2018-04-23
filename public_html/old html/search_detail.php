<!--Created by Yan Xu at April 7th-->
<!--Page for displying searching news's detail-->
<?php

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

session_start();

$keyword = $_SESSION["news_id"];
echo $keyword;

//Setup our query
$sql = "SELECT * FROM $usertable WHERE nid = '%$keyword%'";
 
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
	<title>Displaying detail information the user clicked</title>
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

		<?php
		
        if($result){
            
            echo '
                <div class="container text-center">
            	    <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                      <h1 class="page-header">
                        '.$result['title'].'
                      </h1>
                      <p class="lead">
                        '.$result['author'].'
                      </p>
                      <p class="lead">
                        '.$result['category'].'
                      </p>
                      <p class="lead">
                        '.$result['date'].'
                      </p>
                      <div class="panel panel-default text-left">
                        <div class="panel-body">
                        <p>
                            '.$result['content'].'
                        </p>
                        </div>
                      </div>
                      
                    </div>
                  </div>
            	</div>
            ';
        }
    	
    	
         ?>
</body>
</html>