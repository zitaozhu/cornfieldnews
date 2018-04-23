



<?php

echo "inside sen_test";

if (PHP_SAPI != 'cli') {
	echo "<pre>";
	
}
echo "// begin string";
$strings = array(
	1 => 'Weather today is rubbish',
	2 => 'This cake looks amazing',
	3 => 'His skills are mediocre',
	4 => 'He is very talented',
	5 => 'She is seemingly very agressive',
	6 => 'Marie was enthusiastic about the upcoming trip. Her brother was also passionate about her leaving - he would finally have the house for himself.',
	7 => 'To be or not to be?',
);
require_once __DIR__ . '/autoload.php';

echo "// required //";



$sent_result = array();
//array_push($sent_result, "apple");
//array_push($sent_result,"raspberry");
//print_r($sent_result);
 
$sentiment = new \PHPInsight\Sentiment();
//$stringid = 0

$count_pos = 0;
$count_nue = 0;
$count_neg = 0;


foreach ($strings as $string) {
	// calculations:
	$scores = $sentiment->score($string);
	$class = $sentiment->categorise($string);
	// output:
	
	echo "String: $string\n";
	echo "Dominant: $class, scores: ";
	$equal = ($class=='pos');
	echo "$equal";
	if ($class == 'pos') {
        $count_pos ++;
    }
    elseif ($class == 'neu') {
        $count_neu ++;
    }
    else {
        $count_neg ++;
    }
    
	$finalscore  =  $scores['pos'] - $scores['neg'];

	
	//$stringid = $stringid + 1;
	array_push($sent_result, $finalscore);
	print_r($sent_result);
	echo "\n";
}


$perc_pos = $count_pos/($count_pos + $count_neu + $count_neg)*100;
$perc_neu = $count_neu/($count_pos + $count_neu + $count_neg)*100;
$perc_neg = $count_neg/($count_pos + $count_neu + $count_neg)*100;
print_r($perc_pos);
print_r($perc_neu);
print_r($perc_neg);
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div class="w3-container">

<h2>Progress Bar Labels</h2>
<p>Add text inside a w3-container element to add a label to the progress bar.</p>
<p>Use the w3-center class to center the label. If omitted, it will be left aligned.</p>

<div class="w3-light-grey">
  <div class="w3-container w3-light-green w3-center" style="width:<?=$perc_pos?>%">POSITIVE <?=$perc_pos?> %</div>
</div><br>

<div class="w3-light-grey">
  <div class="w3-container w3-amber w3-center" style="width:<?=$perc_neu?>%">NEUTRAL <?=$perc_neu?> %</div>
</div><br>

<div class="w3-light-grey">
  <div class="w3-container w3-deep-orange w3-center" style="width:<?=$perc_neg?>%">NEGATIVE <?=$perc_neg?>%</div>
</div><br>

</div>
</body>
</html>