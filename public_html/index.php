<!--created by yanxu on April 14th  -->
<!--from template fore-->
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
 

session_start();
//Setup our query
$sql = "SELECT * FROM $usertable WHERE nid < 4";
 
//Run the Query
$result = $mysqli->query($sql);

//If the query returned results, loop through
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
 
session_start();
$email = $_SESSION['username'];

$_SESSION['username'] = $email;
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="index.php">News</a>
  <a href="/index_manage.html">Search</a>
  <a href="/include/user_home.php"><?php echo $email; ?></a>
  <a href="logout.php">Logout</a>
</div>
        
        <title>Cornfield News</title>
        
        <!-- Meta -->
        <meta name="description" content="Fore is a free, responsive front end template from Papaya, made by Jordan Bowman.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Jordan Bowman">
        <meta name="keywords" content="awesome, hott, extremely attractive, sheer brilliance">
        
        <!-- Google Author link -->
        <link rel="author" href="Google+URL"/>

        <!-- Favicon.ico and apple-touch-icon.png (according to Apple docs). A good tool is http://iconifier.net/ -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png" />

        <!-- CSS, Normalize First, minify for production -->
        <link rel="stylesheet" type='text/css' href="less/master.css"/>
        
        <!-- Import web fonts using the link tag instead of CSS @import -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
        
        <!-- Icons from http://fontawesome.io/ -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
                
    </head>

    <body>
        
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chrome/">install Google Chrome</a> to experience this site.</p>
        <![endif]-->

        
        <!-- Header -->
        <header id="main-header">
            <div class="container">
                <h1>Cornfiled News</h1>
                <p>search and manage cornfield news</p>
            </div>
        </header>

        <!-- First call to action -->
        <section class="call-to-action">
            <div class="cta-container cf">
                <p>Want to manage Cornfield News?</p>
                <a class="btn" href="login.html">Get Started →</a>
            </div>
        </section>
        
        <!-- Macbook Section -->
        <section id="macbook">
            <div class="container">
                <h2>What can you get from Cornfield News?</h2>
                <p>You can search interesting news from our website! What's more, we provide sentimental analysis for you!</p>
            </div>
        </section>
        
        
        <!-- Slider Section -->
        <section class="slider-main">
            <div id="left-arrow">
                <a href="#" class="unslider-arrow prev">
                    <i class="fa fa-chevron-left fa-2x"></i>
                </a>
            </div>
            <div id="right-arrow">
                <a href="#" class="unslider-arrow next">
                    <i class="fa fa-chevron-right fa-2x"></i>
                </a>
            </div>
            <div class="slider">
                <ul>
                    <li class="slide" id="slide1">
                        <h2>Search Interesting News</h2>
                        <p> Our news comes from <a href="https://github.com/idiot/unslider" target="_blank">sources</a>, where you...</p>
                        <a class="btn" href="index_manage.html">Search</a>
                    </li>
                    <li class="slide" id="slide2">
                        <h2>Sentimental Analysis</h2>
                        <!--<p>Description of this part!</p>-->
                        <a class="btn" href="sentiment/sentiment_news.php">Analyze</a>
                    </li>
                    <li class="slide" id="slide3">
                        <h2>Contribute News</h2>
                        <p>Want to contribute news?</p>
                        <a class="btn" href="addnews.php">Contribute</a>
                    </li>
                    <!--<li class="slide" id="slide4">-->
                    <!--    <h2>Vestibulum auctor dapibus.</h2>-->
                    <!--    <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit.</p>-->
                    <!--    <a class="btn" href="#">Button</a>-->
                    <!--</li>-->
                </ul>
            </div>
        </section>
        
        <!-- Summary Section -->
        <!--<section id="summary">-->
        <!--    <div class="container">-->
        <!--        <h2>What makes Fore so great?</h2>-->
        <!--        <p>It's responsive, beautiful, built with the latest code, includes all front end files, and (best of all) it is and always will be free. Didn't even see that comin', didya?</p>-->
        <!--        <a class="btn" href="#">Button</a>-->
        <!--    </div>-->
        <!--</section>-->
        
        
        <!-- Three Images Section -->
        <section id="three-images">
            <div class="container">
                <header class="body-header">
                    <h2>Top rated news!</h2>
                    <p>You can read top rated interesting news here!</p>
                </header>
                <article class="cf">
    

                    <?php
            		while ($row = mysqli_fetch_array($result))
            		{
            			echo '<div class="img-circle-div">
            			
            					<h3>'.$row['title'].'</h3>
            					<p>'.$row['content'].'</p>
            					</div>
                                ';
            		}?>
                    <!--<div class="img-circle-div">-->
                    <!--    <img src="https://static01.nyt.com/images/2018/04/14/technology/14valley-1/14valley-1-facebookJumbo.jpg"/>-->
                    <!--    <h3>Facebook Takes the Punches While Rest of Silicon Valley Ducks</h3>-->
                    <!--    <p>Last year lawyers for Facebook, Twitter and Google appeared in Congress to answer questions about foreign meddling in the 2016 presidential election. But in the recent scandal over personal data, only Facebook�s Mark Zuckerberg ended up testifying.-->

                    <!--    </p>-->
                    <!--</div>-->
                    <!--<div class="img-circle-div">-->
                    <!--    <img src="https://static01.nyt.com/images/2018/04/14/us/politics/14dc-mccabe/14dc-mccabe-facebookJumbo.jpg"/>-->
                    <!--    <h3>Former F.B.I. Deputy Director Is Faulted in Scathing Inspector General Report</h3>-->
                    <!--    <p>The report accused the former official, Andrew G. McCabe, of repeatedly misleading investigators. Mr. McCabe was fired in March hours before he was eligible for a full pension.</p>-->
                    <!--</div>-->
                    <!--<div class="img-circle-div">-->
                    <!--    <img src="https://static01.nyt.com/images/2018/04/14/arts/14cosby-image1/14cosby-image1-facebookJumbo.jpg"/>-->
                    <!--    <h3>Andrea Constand to the Cosby Jury: ‘I Could Not Fight Him Off’</h3>-->
                    <!--    <p>Andrea Constand testified Friday that she had looked upon Bill Cosby as a mentor before, she said, he sexually assaulted her at his home near Philadelphia in 2004.</p>-->
                    <!--</div>-->
                </article>
            </div>
        </section>
        
        
        
        
        
        <!-- List Section -->
        <!--<section id="list">-->
        <!--    <div class="container">-->
        <!--        <header class="body-header">-->
        <!--            <h2>Aliquam erat volutpat.</h2>-->
        <!--            <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem.</p>-->
        <!--        </header>-->
        <!--        <article>-->
        <!--            <div class="list-row cf">-->
        <!--                <div class="list-item">-->
        <!--                    <i class="fa fa-bullhorn fa-2x"></i>-->
        <!--                    <h3>Aenean erat volutpat</h3>-->
        <!--                    <p>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</p>-->
        <!--                </div>-->
        <!--                <div class="list-item">-->
        <!--                    <i class="fa fa-code-fork fa-2x"></i>-->
        <!--                    <h3>Nam nulla quam</h3>-->
        <!--                    <p>Donec consectetuer ligula vulputate sem tristique cursus.</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="list-row cf">-->
        <!--                <div class="list-item">-->
        <!--                    <i class="fa fa-bolt fa-2x"></i>-->
        <!--                    <h3>Donec quam lectus</h3>-->
        <!--                    <p>Donec consectetuer ligula vulputate sem tristique cursus.</p>-->
        <!--                </div>-->
        <!--                <div class="list-item">-->
        <!--                    <i class="fa fa-folder-open fa-2x"></i>-->
        <!--                    <h3>Suspendisse commodo</h3>-->
        <!--                    <p>Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit.</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="list-row cf">-->
        <!--                <div class="list-item">-->
        <!--                    <i class="fa fa-users fa-2x"></i>-->
        <!--                    <h3>Quisque volutpat mattis</h3>-->
        <!--                    <p>Integer vitae libero ac risus egestas placerat, elementum vulputate.</p>-->
        <!--                </div>-->
        <!--                <div class="list-item" id="last-item">-->
        <!--                    <i class="fa fa-wrench fa-2x"></i>-->
        <!--                    <h3>Lorem ipsum dolor</h3>-->
        <!--                    <p>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </article>-->
        <!--    </div>-->
        <!--</section>-->
        
        
        <!-- Second call to action -->
        <!--<section class="call-to-action cta-2">-->
        <!--    <div class="cta-container cf">-->
        <!--        <p>Astounding call to action? Yeah, that's right.</p>-->
        <!--        <a class="btn" href="#">Get Started →</a>-->
        <!--    </div>-->
        <!--</section>-->
                
      
        
        <!-- Footer -->
        <!--<footer>-->
        <!--    <div class="container">-->
        <!--        <div class="social-boat">-->
        <!--            <div class="gplus">-->
                        <!-- Place this tag where you want the +1 button to render. -->
        <!--                <div class="g-plusone"></div>-->

                        <!-- Place this tag after the last +1 button tag. -->
        <!--                <script type="text/javascript">-->
        <!--                    (function() {-->
        <!--                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;-->
        <!--                        po.src = 'https://apis.google.com/js/plusone.js';-->
        <!--                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);-->
        <!--                    })();-->
        <!--                </script>-->
        <!--                </div>-->
        <!--            <div class="twitter">-->
        <!--                <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>-->
        <!--                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>-->
        <!--            </div>-->
        <!--            <div class="facebook">-->
        <!--                <div id="fb-root"></div>-->
        <!--                <script>(function(d, s, id) {-->
        <!--                    var js, fjs = d.getElementsByTagName(s)[0];-->
        <!--                    if (d.getElementById(id)) return;-->
        <!--                    js = d.createElement(s); js.id = id;-->
        <!--                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";-->
        <!--                    fjs.parentNode.insertBefore(js, fjs);-->
        <!--                }(document, 'script', 'facebook-jssdk'));</script>-->
        <!--                <div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div id="footer-text" class="small">-->
        <!--        <p>&copy; Untitled | Photos by <a href="http://www.jrdnbwmn.com" target="_blank">Jordan Bowman</a> | Design by <a href="http://www.eatapapaya.com" target="_blank">Papaya</a></p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</footer>-->


        <!-- Reference jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        
        <!-- Reference Javascript, minify for production -->
        <script type="text/javascript" src="js/jquery.event.move.js"></script>
        <script type="text/javascript" src="js/jquery.event.swipe.js"></script>
        <script type="text/javascript" src="js/unslider.js"></script>
        
        <!-- Unslider script -->
        <script>
            $(document).ready(function () {
                var unslider = $('.slider').unslider();
                $('.unslider-arrow').click(function(event) {
                    event.preventDefault();
                    if ($(this).hasClass('next')) {
                        unslider.data('unslider')['next']();  
                    } else {
                        unslider.data('unslider')['prev']();  
                    };
                });
                var unslider = $('.slider').unslider();

                unslider.on('movestart', function(e) {
                    if((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY &&   e.distX > -e.distY)) {
                        e.preventDefault();
                    }
                });
        });
        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
        
    </body>

</html>