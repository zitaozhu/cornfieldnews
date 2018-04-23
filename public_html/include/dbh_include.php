<?php

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