<?php
    echo("inside of commentphp");
    
    $comment = $_GET['comment'];
    echo($comment);
    
    $dbServername = "localhost";
    $dbUsername = "cornfieldnews_News";
    $dbPassword = "cornfieldnews_News";
    $dbName = "cornfieldnews_News";
    $conn = mysql_connect($dbServername, $dbUsername, $dbPassword);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysql_select_db('cornfieldnews_News');
    
    
    session_start();
    $email = $_SESSION['username']; 
    $nid = $_SESSION['nid']; 
    echo("email  == $email");
    echo("nid = $nid");
    $timestamp = date('Y-m-d G:i:s');
    
    echo("time");
    echo($timestamp);
    
    $sql = "INSERT INTO comments (nid, email, content) VALUES ('$nid', '$email', '$comment' )";
    //$sql="SELECT * FROM users WHERE email = '$email' ";
    $res = mysql_query($sql);
    //$row = mysql_fetch_row($res);
    //var_dump($row);

    //echo("number =  ");
    //echo(mysql_num_rows($res));
    //echo $row["firstname"];
    /*if (mysql_num_rows($res) < 1){
		echo("<h1>sth wrong happened</h1>");
	}
	else{
	    echo("<h1>Hello, </h1>");
	    //echo($row[3]);
	    echo $row[0];
	}*/	


?>