<?php
    //echo("inside of addlike.php");
    
    session_start();
    $email = $_SESSION['username'];
    $nid = $_SESSION['nid'];
    
    
    
    if ($email){
        $dbServername = "localhost";
        $dbUsername = "cornfieldnews_News";
        $dbPassword = "cornfieldnews_News";
        $dbName = "cornfieldnews_News";
        $conn = mysql_connect($dbServername, $dbUsername, $dbPassword);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysql_select_db('cornfieldnews_News');
        
        $sql= "SELECT * FROM likes WHERE nid = '$nid' AND email = '$email';";
        $res = mysql_query($sql);
        if (mysql_num_rows($res) > 0){
    		echo("YOU ALREADY LIKED THIS NEWS:)");
    	}
        
        else{
        $sql= "INSERT INTO likes (nid, email) VALUES ('$nid', '$email');";
        $res = mysql_query($sql);
        echo("success!");
        }
    }
    //echo($emial);
    //echo($nid);
    else{
        echo("please sign up to like this news");
    }
        
    $previous = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }

?>
<!DOCTYPE html>
<html>
<body>

<a href="<?= $previous ?>">Back</a>

</body>
</html>