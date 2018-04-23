<!--home page for user to select news from his favorite list-->
<!--April 7th, add user favorite list and link go back to homepage-->
<?php
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

    //echo($email);

    $sql="SELECT * FROM users WHERE email = '$email' ";
    $res = mysql_query($sql);
    $row = mysql_fetch_row($res);
    //var_dump($row);

    //echo("number =  ");
    //echo(mysql_num_rows($res));
    //echo $row["firstname"];
	if (mysql_num_rows($res) < 1){
		echo("<h1>someting wrong happened</h1>");
		echo("<h1>try to login first</h1>");
	}

  $sql_like="SELECT * FROM likes WHERE email = '$email'";
  $like_list=mysql_query($sql_like);
  
  session_start();
  $_SESSION['username'] = $email;
  
//  $like_row=mysql_fetch_row($like_list);

?>



<!DOCTYPE html>
<html>
    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
  
  
  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #FFB6C1;
}

.button3:hover {
    background-color: #FFB6C1;
    color: white;
}


.button4 {
    background-color: white; 
    color: black; 
    border: 2px solid #0099ff;
}

.button4:hover {
    background-color: #0099ff;
    color: white;
}


}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="http://cornfieldnews.web.engr.illinois.edu/index.php">Home</a>
  <a href="http://cornfieldnews.web.engr.illinois.edu/index_manage.html">Search</a>
  <a href="/include/user_home.php"><?php echo $email; ?></a>
  <a href="logout.php">Logout</a>
</div>
<title>Homepage</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="user.svg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>PORTFOLIO</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PORTFOLIO</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="user.svg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b><?= $row[0],' ', $row[1]  ?> </b> </h1>
    
    <form class="search_link" action="/../search.php" style="margin:auto;max-width:300px">
          <input type="text" name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    
    <div class="w3-section w3-bottombar w3-padding-16">
      <button class="w3-button w3-black">Faviorate List</button>
      
          
    </div>
    </div>
  </header>

  <!--fav list-->
  <style>
    #list_fav {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    
    #list_fav td, #list_fav th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    
    #list_fav tr:nth-child(even){background-color: #f2f2f2;}
    
    #list_fav tr:hover {background-color: #ddd;}
    
    #list_fav th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    </style>
  <div class="w3-row-padding">
    <div class="">
        <table id="list_fav">
		<caption class="title">Favorite List</caption>
        <thead>
			<tr>
				<th>TITLE</th>
				<th>LINK</th>
			</tr>
		</thead>
		<tbody>
		    <?php
        if(mysql_num_rows($like_list) < 1) {
            echo '<img src="" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
                <p><b>No liked news yet</b></p>
            </div>';
        } else {
            //echo mysql_num_rows($like_list);
  		$no 	= 0;
  		while ($row = mysql_fetch_assoc($like_list))
  		{
        $nid=$row['nid'];
        //echo $nid;
        $sql="SELECT * FROM news WHERE nid = '$nid'";
        $news=mysql_query($sql);
        $news_row=mysql_fetch_assoc($news);

  			echo '<tr>
          <td><b>'.$news_row['title'].'</b></td>
          <td><a href="http://cornfieldnews.web.engr.illinois.edu/search_detail.php?newsid='.$nid.'" >LINK To NEWS</a> </td>
        </tr>';
  			$no++;
  		}
  		}?>
		</tbody>
		</table>
      
      <!-- <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div> -->
    </div>
  </div>


  <!-- Pagination -->
  <!--<div class="w3-center w3-padding-32">-->
  <!--  <div class="w3-bar">-->
  <!--    <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>-->
  <!--    <a href="#" class="w3-bar-item w3-black w3-button">1</a>-->
  <!--    <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>-->
  <!--    <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>-->
  <!--    <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>-->
  <!--    <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>-->
  <!--  </div>-->
  <!--</div>-->

  <!-- Images of Me -->

  <!-- Contact Section -->


  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>

    <div class="w3-third">
      <h3>Go back to homepage</h3>
      <img src="homepage.png" class="w3-left w3-margin-right" style="width:50px">
            <a href="http://cornfieldnews.web.engr.illinois.edu/"><h3>cornfieldnews</h3></a><br>
            <a href="http://cornfieldnews.web.engr.illinois.edu/include/recommend.php"><h3>Recommend</h3></a>
    </div>

    <div class="w3-third">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">London</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">DIY</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Family</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Shopping</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Games</span>
      </p>
    </div>

  </div>
  </footer>

  <!--<div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>-->

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
<style>
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