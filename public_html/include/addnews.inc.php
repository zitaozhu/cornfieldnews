


<?php 


        echo "/* include_once 'dbh_include.php'; */  ";
		/* include_once 'dbh_include.php'; */
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
        echo "connected   ";
        $GET_body = file_get_contents('php://input');
         echo "  ___$GET_body____";
        
		$title =  $_GET["title"];
		$author =  $_GET["author"];
		$category =  $_GET["category"];
		$content =  $_GET["content"];
		
		echo "username = $title    |||";
		echo "password = $author    |||";
	
		
		
		$rel = mysql_query("INSERT INTO news (`title`, `author`, `category`, `content`) VALUES ('$title', '$author', '$category', '$content')");
		echo "sending  ";
		if (!$rel) {
            die('Invalid query: ' . mysql_error());
        }
        else  {
                echo "success";
        }
		
		#header("Location.../include/addnews.inc.php?insert=success")

