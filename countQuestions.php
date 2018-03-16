<?php
	session_start();
	$i=0;
	
	$testID =  $_GET['a'];
	//echo $testID;

	$con=mysql_connect('localhost','root','');
	if(!$con) {
		echo "Can't connect to server.";
	}

	$db=mysql_select_db('electura');
	if(!$db) {
		echo "Can't connect to the database";
	}

	$queryFirst="select * from electura_testquestions where testID='$testID'";
	$res2=mysql_query($queryFirst);
	$count=mysql_num_rows($res2);

	echo $count;
?>