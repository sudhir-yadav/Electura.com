<?php
include('elec_core/elec_config.php');
	$con=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	if(!$con) {
		echo "Can't connect to server.";
	}

	$db=mysql_select_db(DB_NAME);
	if(!$db) {
		echo "Can't connect to the database";
	}

	$queryFirst="select subject_name from electura_subject";
	$res2=mysql_query($queryFirst);
	if(!$res2) {
		echo "Unable to execute query.";
	}
	
	while($result = mysql_fetch_array($res2)) {
		echo "<option>".$result['subject_name']."</option>";

	}
?>