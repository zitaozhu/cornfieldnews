


<?php 
		$dbServername = "localhost";
		$dbUsername = "cornfieldnews_News";
		$dbPassword = "cornfieldnews_News";
		$dbName = "cornfieldnews_News";
		$conn = mysql_connect($dbServername, $dbUsername, $dbPassword);
		mysql_select_db('cornfieldnews_News');
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
        
        $GET_body = file_get_contents('php://input');
        // echo "  ___$GET_body____";
        
        $first =  $_GET["first"];
        $last =  $_GET["last"];
		$username =  $_GET["username"];
		$email =  $_GET["email"];
		$password =  $_GET["userpassword"];
		$interestCategories =  $_GET["interestCategories"];

        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

        if($first == NULL || $last == NULL || $username == NULL || $email == NULL || $password == NULL) {
            echo"can't be empty";
            exit;
        } else if (strlen($password) < 6){
            echo"password need at least 6 digits";
            exit;
        } else if (!preg_match($pattern, $email) === 1) {
            echo"not valide email";
            exit;
        }
		
		
		$rel = mysql_query("INSERT INTO users (`firstname`,`lastname`,`username`, `email`, `password`, `interestCategories`) VALUES ('$first','$last', '$username', '$email', '$password', '$interestCategories')");
		//echo "sending  ";
		if (!$rel) {
            die('Invalid query: ' . mysql_error());
        }
        else  {
                echo "$email sign up success";
        }
		
		#header("Location.../include/addnews.inc.php?insert=success")

