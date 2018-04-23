<!--Created by Yan Xu at April 7th-->
<!--April 13th fixed the issues with passing parameter and display values -Zitao Zhu-->
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

$keyword = $_GET["newsid"];
// if($keyword){
//     echo 'news id was';
//     echo $keyword;
// } else {
//     echo 'news not found';
// }


//Setup our query
$sql = "SELECT * FROM $usertable WHERE nid = '$keyword'";

$result = $mysqli->query($sql);


// if ($result)
// {
//     while($row = mysqli_fetch_array($result))
//     {
//         $name = $row['title'];
//         echo "Title: " . $name;
//     }
// }
$row = $result->fetch_row();

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

session_start();
$email = $_SESSION['username'];

$_SESSION['username'] = $email;
$_SESSION['nid'] = $row[0];
echo $email;

?>

<!DOCTYPE html>
<html>
<title>News Detail</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CSS, Normalize First, minify for production -->
<link rel="stylesheet" type='text/css' href="less/master.css"/>
        
        <!-- Import web fonts using the link tag instead of CSS @import -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}

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


</style>
<body>

<!-- Navbar -->
<!--<div class="w3-top">-->
<!--  <div class="w3-bar w3-black w3-card">-->
<!--    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>-->
<!--    <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>-->
<!--    <a href="#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">BAND</a>-->
<!--    <a href="#tour" class="w3-bar-item w3-button w3-padding-large w3-hide-small">TOUR</a>-->
<!--    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>-->
<!--    <div class="w3-dropdown-hover w3-hide-small">-->
<!--      <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>     -->
<!--      <div class="w3-dropdown-content w3-bar-block w3-card-4">-->
<!--        <a href="#" class="w3-bar-item w3-button">Merchandise</a>-->
<!--        <a href="#" class="w3-bar-item w3-button">Extras</a>-->
<!--        <a href="#" class="w3-bar-item w3-button">Media</a>-->
<!--      </div>-->
<!--    </div>-->
<!--    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>-->
<!--  </div>-->
<!--</div>-->

<!-- Navbar on small screens -->
<!--<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">-->
<!--  <a href="#band" class="w3-bar-item w3-button w3-padding-large">BAND</a>-->
<!--  <a href="#tour" class="w3-bar-item w3-button w3-padding-large">TOUR</a>-->
<!--  <a href="#contact" class="w3-bar-item w3-button w3-padding-large">CONTACT</a>-->
<!--  <a href="#" class="w3-bar-item w3-button w3-padding-large">MERCH</a>-->
<!--</div>-->

<!-- Page content -->
<!--<div class="w3-content" style="max-width:2000px;margin-top:46px">-->
   

  <!-- Automatic Slideshow Images -->
  <!--<div class="mySlides w3-display-container w3-center">-->

  <!--  <img src="https://www.w3schools.com/w3css/img_temp_architect.jpg" style="width:100%">-->
  <!--  <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">-->
  <!--    <h3>Los Angeles</h3>-->
  <!--    <p><b>We had the best time playing at Venice Beach!</b></p>   -->
  <!--  </div>-->
  <!--</div>-->


  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
      <?php
      if($result){
          if($row){
              echo '<h2 class="w3-wide">' .$row[3].'</h2>
              <p class="w3-opacity"><i>' .$row[2].'</i></p>
              <p class="w3-justify">' .$row[4] .'</p>
              <img src=' . $row[6] . ' style="width:100%">
              <section class="call-to-action">
                <div class="cta-container cf">
                    <a class="btn" href='.$row[5].'>Get Details →</a>
                </div>
              </section>
              ';
              
          }
      }
      
      ?>
      <!--old detail button-->
      <!--<a class="w3-button w3-black w3-margin-bottom" href='.$row[5].'>Details</a>-->
    <!--<h2 class="w3-wide">THE BANDgfgggggg</h2>-->
    <!--<p class="w3-opacity"><i>We love music</i></p>-->
    <!--<p class="w3-justify">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
    <!--  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur-->
    <!--  adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
    <!--<div class="w3-row w3-padding-32">-->
    <!--  <div class="w3-third">-->
    <!--    <p>Name</p>-->
    <!--    <img src="/w3images/bandmember.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">-->
    <!--  </div>-->
    <!--  <div class="w3-third">-->
    <!--    <p>Name</p>-->
    <!--    <img src="/w3images/bandmember.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">-->
    <!--  </div>-->
    <!--  <div class="w3-third">-->
    <!--    <p>Name</p>-->
    <!--    <img src="/w3images/bandmember.jpg" class="w3-round" alt="Random Name" style="width:60%">-->
    <!--  </div>-->
    <!--</div>-->
  <!--</div>-->

  <!-- The Tour Section -->
  <!--<div class="w3-black" id="tour">-->
  <!--  <div class="w3-container w3-content w3-padding-64" style="max-width:800px">-->
  <!--    <h2 class="w3-wide w3-center">TOUR DATES</h2>-->
  <!--    <p class="w3-opacity w3-center"><i>Remember to book your tickets!</i></p><br>-->

  <!--    <ul class="w3-ul w3-border w3-white w3-text-grey">-->
  <!--      <li class="w3-padding">September <span class="w3-tag w3-red w3-margin-left">Sold out</span></li>-->
  <!--      <li class="w3-padding">October <span class="w3-tag w3-red w3-margin-left">Sold out</span></li>-->
  <!--      <li class="w3-padding">November <span class="w3-badge w3-right w3-margin-right">3</span></li>-->
  <!--    </ul>-->

  <!--    <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">-->
  <!--      <div class="w3-third w3-margin-bottom">-->
  <!--        <img src="/w3images/newyork.jpg" alt="New York" style="width:100%" class="w3-hover-opacity">-->
  <!--        <div class="w3-container w3-white">-->
  <!--          <p><b>New York</b></p>-->
  <!--          <p class="w3-opacity">Fri 27 Nov 2016</p>-->
  <!--          <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>-->
  <!--          <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--      <div class="w3-third w3-margin-bottom">-->
  <!--        <img src="/w3images/paris.jpg" alt="Paris" style="width:100%" class="w3-hover-opacity">-->
  <!--        <div class="w3-container w3-white">-->
  <!--          <p><b>Paris</b></p>-->
  <!--          <p class="w3-opacity">Sat 28 Nov 2016</p>-->
  <!--          <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>-->
  <!--          <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--      <div class="w3-third w3-margin-bottom">-->
  <!--        <img src="/w3images/sanfran.jpg" alt="San Francisco" style="width:100%" class="w3-hover-opacity">-->
  <!--        <div class="w3-container w3-white">-->
  <!--          <p><b>San Francisco</b></p>-->
  <!--          <p class="w3-opacity">Sun 29 Nov 2016</p>-->
  <!--          <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>-->
  <!--          <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

  <!-- Ticket Modal -->
  <!--<div id="ticketModal" class="w3-modal">-->
  <!--  <div class="w3-modal-content w3-animate-top w3-card-4">-->
  <!--    <header class="w3-container w3-teal w3-center w3-padding-32"> -->
  <!--      <span onclick="document.getElementById('ticketModal').style.display='none'" -->
  <!--     class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>-->
  <!--      <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>-->
  <!--    </header>-->
  <!--    <div class="w3-container">-->
  <!--      <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>-->
  <!--      <input class="w3-input w3-border" type="text" placeholder="How many?">-->
  <!--      <p><label><i class="fa fa-user"></i> Send To</label></p>-->
  <!--      <input class="w3-input w3-border" type="text" placeholder="Enter email">-->
  <!--      <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>-->
  <!--      <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>-->
  <!--      <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
      
      <div>
            <form action="/addlike.php" method="post">
                
            <button class="button button3" type="submit">LIKE</button>
                
            </form>
      </div>
      
      
      
      
    <h2 class="w3-wide w3-center">Leave conment</h2>
    <p class="w3-opacity w3-center"><i>Drop a note!</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Urbana, US<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +00 151515<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
      </div>
      <div class="w3-col m6">
            <form action="/save_comment.php" method = "GET" >
                <textarea class="w3-input w3-border" rows="4" cols="50" name="comment" >
                Enter text here...</textarea>
                <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
            </form>
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>
<!-- Add Google Maps -->
<!--<div id="googleMap" style="height:400px;" class="w3-grayscale-max"></div>-->
<script>
function myMap() {
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
<style>
#list_com {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#list_com td, #list_com th {
    border: 1px solid #ddd;
    padding: 8px;
}

#list_com tr:nth-child(even){background-color: #f2f2f2;}

#list_com tr:hover {background-color: #ddd;}

#list_com th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<table id="list_com">
  <caption class="title">User Comments</caption>
		<thead>
			<tr>
				<th>User</th>
				<th>Comment</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sql = "SELECT * FROM comments WHERE nid = '$keyword'";
        $result = $mysqli->query($sql);
        
		$no 	= 0;
		while ($row = $result->fetch_row())
		{
			echo '<tr>
					<td>'.$row[2].'</td>
					<td>'.$row[3].'</td>
				</tr>';
			$no++;
		}?>
		</tbody>
</table>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <a href="../index.php"><img src="homepage.png" style="width:50px; height:50px" title="Homepage"></a>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>


