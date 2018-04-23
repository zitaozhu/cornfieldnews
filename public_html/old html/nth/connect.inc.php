<?php
$mysql_host='localhost';
$mysel_user='cornfieldnews_admin';
$mysql_pass='31415926535';

$mysql_db='cornfieldnews_admin';

if(!(mysql_connect($$mysql_host, $mysel_user, $mysql_pass))||mysql_select_db($mysql_db)){
    die(mysel_error())
}
?>