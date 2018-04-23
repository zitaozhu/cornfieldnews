
<?php
    //echo("sen_search.php");
    $hostname="localhost";
    $username="cornfieldnews_News";
    $password="cornfieldnews_News";
    $dbname="cornfieldnews_News";
    $usertable="news";
    
    $mysqli = new mysqli($hostname, $username, $password, $dbname);
    
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
     
    $keyword = $_GET['search'];
    session_start();
    
    $sql = "SELECT * FROM $usertable WHERE title LIKE '%$keyword%' ORDER BY date";
    $result = $mysqli->query($sql);
     
    //If the query returned results, loop through
    // each result
    
    
    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
    
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
     
?>




<?php
    
    if (PHP_SAPI != 'cli') {
    	echo "<pre>";
    	
    }
    
    $cout 	= 0;
    $strings = array();
    while ($row = mysqli_fetch_array($result))
    {   
        $cout ++;
        array_push($strings,$row['title'],$row['content']);
    }
    //echo "\n";
    //echo "count";
    //echo $cout;
    //echo "\n";
    //echo "$strings";
    //print_r($strings);
    
    //$row = mysqli_fetch_array($result);
    //$url = $row['url'];
    
    
    function get_data($url) {
    	$ch = curl_init();
    	$timeout = 5;
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    	$data = curl_exec($ch);
    	curl_close($ch);
    	return $data;
    }
    
    header('Content-type: text/plain');
    $homepage = file_get_contents('https://www.cnn.com/2018/04/15/politics/trump-tweets-comey/index.html');
    $content =  strip_tags($homepage);
    
    
    require_once __DIR__ . '/autoload.php';
    
   
    
    
    
    $sent_result = array();
    //array_push($sent_result, "apple");
    //array_push($sent_result,"raspberry");
    //print_r($sent_result);
     
    $sentiment = new \PHPInsight\Sentiment();
    //$stringid = 0
    
    
    /*
    echo("----begin    ");
    
    $scores = $sentiment->score($row['content']);
    $class = $sentiment->categorise($row['content']);
    print_r($scores);
    echo($scores);
    echo('class' + $class);
    echo("----end    ");
    */
    
    $count_pos = 0;
    $count_nue = 0;
    $count_neg = 0;
    
    $pos_score = 0;
    $nue_score = 0;
    $neg_score = 0;
    
    $score_array = array();
    $title = 'in';
    $title_index = 0.6;
    $nontitle_index = 0.4;
    $title_array = array();
    $pos_array = array();
    $nue_array = array();
    $neg_array = array();
    
    $indicator = -1;
    $count = 0;
    
    foreach ($strings as $string) {
        // calculations:
    	$scores = $sentiment->score($string);
    	$class = $sentiment->categorise($string);
    	
    	$indicator = $indicator*-1;
    	// calculations:
    	if ($indicator == 1){
            //this is title
            //echo("title");
            $pos_score = $scores['pos']*$title_index;
        	$nue_score = $scores['neu']*$title_index;
        	$neg_score = $scores['neg']*$title_index;
        	$title = $string;
        	
            
    	}
    	elseif($indicator == -1){
    	    //echo('elseif($indicator == -1)');
    	    $pos_score += $scores['pos']*$nontitle_index;
        	$nue_score += $scores['neu']*$nontitle_index;
        	$neg_score += $scores['neg']*$nontitle_index;
        	
        	
        	
        	    $count++;
            	array_push($score_array, array($title, $pos_score, $nue_score, $neg_score));
            	
            	array_push($pos_array,  $pos_score);
            	array_push($nue_array,  $nue_score);
            	array_push($neg_array,  -1 * $neg_score);
            	$title = $title +'$count';
            	array_push($title_array, $title);
            	//print_r($title_array);
            	//print_r($pos_array);
            	//print_r($nue_array);
            	//print_r($neg_array);
        	
        	// output:
    	
        	$equal = ($class=='pos');
        	//echo "$equal";
        	if ($class == 'pos') {
                $count_pos ++;
            }
            elseif ($class == 'neu') {
                $count_neu ++;
            }
            else {
                $count_neg ++;
            }
        	
    	    
    	}
    	
        
    	array_push($sent_result, $finalscore);
    	
    	//echo "\n";
    }//end loop
    
    $perc_pos = $count_pos/($count_pos + $count_neu + $count_neg)*100;
    $perc_neu = $count_neu/($count_pos + $count_neu + $count_neg)*100;
    $perc_neg = $count_neg/($count_pos + $count_neu + $count_neg)*100;
    //print_r($perc_pos);
    //print_r($perc_neu);
    //print_r($perc_neg);
    //echo('$title_array');
    //print_r($title_array);

?>


<!DOCTYPE html>
<html>

    <head>
      <!-- Plotly.js -->
      <style>
          .center {
            margin: auto;
            text-align: center;
            width: 50%;
            padding: 10px;
            }
      </style>
      
      <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
      
      <script>
            var pos = "<?php echo $count_pos ?>";
            var nue = "<?php echo $count_neu ?>";
            var neg = "<?php echo $count_neg ?>";
            var count_n = "<?php echo $count ?>";
            window.onload = function () {
                
            var tit_sub_n = count_n.toString().concat(' Number of News Found for You');
            
            var chart = new CanvasJS.Chart("chartContainer", {
            	animationEnabled: true,
            	title:{
            		text: '',
            		horizontalAlign: "center"
            	},
            	data: [{
            		type: "doughnut",
            		startAngle: 60,
            		//innerRadius: 60,
            		indexLabelFontSize: 17,
            		indexLabel: "{label}",
            		toolTipContent: "<b>{label}:</b> count: {y} ",
            		dataPoints: [
            			{ y: pos, label: "POSITIVE" },
            			{ y: neg, label: "NEGATIVE" },
            			{ y: nue, label: "NEUTURAL" },
            		]
            	}]
            });
            chart.render();
            
            }
    </script>
    </head>
    
    <body>
        <h2 class = center> <?php echo $count;?>Number of News Found</h2>
        <h2 class = center>Over View</h2>
        <div id="chartContainer" style="height: 500px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>    
        <h2 class = center>Detailed Visuliaztion</h2>
      
        <div id="myDiv" style="margin: auto; width: 80%; height: 600px; border: 3px solid green; text-align: center;"><!-- Plotly chart will be drawn inside this DIV --></div>
          <script>
            <!-- JAVASCRIPT CODE GOES HERE -->
            var count = "<?php echo $count ?>";
            var obj_pos = <?php echo json_encode($pos_array); ?>;
            var obj_nue = <?php echo json_encode($nue_array); ?>;
            var obj_neg = <?php echo json_encode($neg_array); ?>;
            var i;
            var text = []
            for (i = 0; i < count; i++) { 
                text.push( (i+1).toString());
            }

            var trace1 = {
              x: text,  
              y: obj_pos, 
              name: 'Positive', 
              marker: {color: 'rgb(55, 83, 109)'}, 
              type: 'bar'
            };
            
            var trace2 = {
              x: text, 
              y: obj_nue, 
              name: 'Nuetral', 
              marker: {color: 'rgb(26, 118, 255)'}, 
              type: 'bar'
            };
            
            var trace3 = {
              x: text, 
              y: obj_neg, 
              name: 'Negative', 
              marker: {color: 'rgb(226, 118, 255)'}, 
              type: 'bar'
            };
            
            var data = [trace1, trace2, trace3];
            var tit_sub = count.toString().concat(' Number of News Detailed Analysis');
            
            var layout = {
              title: tit_sub ,
              xaxis: {tickfont: {
                  size: 14, 
                  color: 'rgb(107, 107, 107)'
                }}, 
              yaxis: {
                title: 'USD (millions)',
                titlefont: {
                  size: 16, 
                  color: 'rgb(107, 107, 107)'
                }, 
                tickfont: {
                  size: 14, 
                  color: "rgb(107, 107, 107)"
                }
              }, 
              legend: {
                x: 0, 
                y: 1.0, 
                bgcolor: 'rgba(255, 255, 255, 0)',
                bordercolor: 'rgba(255, 255, 255, 0)'
              }, 
              barmode: 'group', 
              bargap: 0.15, 
              bargroupgap: 0.1
            };
            
            Plotly.newPlot('myDiv', data, layout);

          </script>
    </body>


</html>