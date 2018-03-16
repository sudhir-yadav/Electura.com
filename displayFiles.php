

<?php
require('elec_core/elec_general.php');
require('elec_core/elec_user.php');

session_start();
$general = new elec_general();
if ($general->logged_in() === true){$user_id = base64_decode($_SESSION['u_id']);}
ob_start();
$general->logged_out_protect() ;
$user = new elec_user($user_id);

	
$con=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	if(!$con) {
		echo "Unable to connect.";
	}
	
	else {
		echo "Connection Successful.";
	}
	
	$db=mysql_select_db(DB_NAME);
	if(!$db) {
		echo "Can't Select";
	}
	
	else {
		
echo "Selected.";
	}


?>

<html>
		<head>
		<style>
	table {
	border-collapse: collapse;
	border: 1px black solid;
	margin-left:auto; 
    margin-right:auto;

		
	}
	
	tr {
		border-bottom: 1px solid black;
		padding: 15px;
		
	}
	
	td:first-child {
		width: 800px;
				
		
	}
	
	td {
		padding: 15px;
	}
	
	img {
		padding: 1px;
		border: 4px solid white;
		box-shadow: 1px 1px 9px #888888;
	}
	
	a {
		font-family:Modern;
		color: black;
		font-size: 20;
		text-decoration:none;
	}
	
	#pad {
			padding-left: 15px;
	}
</style></head><body>
		<table><th padding:5px>Document</th><th>Views</th>
		<?php

		
	$query2="select * from electura_files_pdf";
	$result2=mysql_query($query2);
	if(!$result2) {
		echo mysql_error();
	}

	else {
		echo "qyery passed";
	}
	while($row=mysql_fetch_array($result2)) {
		$fileName=$row['topicName'];	
		$flink=$row['pageLink'];
		$filesize=$row['fileSize'];
//		$udate=$row['uDate'];
		$uploaded=$row['user_id'];
	//	$prof=$row['Professor'];
		$thum=$row['thumbLoc'];
		//randomID, views, pages
		echo "<tr><td><a href=".$flink."><img src=".$thum." align='top'></img></a><a id='pad' href=".$flink.">".$fileName."</a><br/>".
		"<small>File Size: ".$filesize." | Uploaded By: ".$uploaded."</small></td><td>12334</td></tr>";
		
		
	}
	?>
	
	</table></body></html>




