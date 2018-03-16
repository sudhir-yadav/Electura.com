<?php
//If directory doesnot exists create it.
$output_dir = "uploads/";


if($_POST['store']=='yes') {
$filet=$_POST['fileT'];
$userID=$_POST['uID'];
$lectureSubject=$_POST['fileSub'];

$con=mysql_connect('localhost','electura_admin','sudhiryadav');
	if(!$con) {
		echo "Can't connect to server.";
	}

	$db=mysql_select_db('electura_electura');
	if(!$db) {
		echo "Can't connect to the database";
	}

	$queryFirst="insert into electura_uploadPDF(userID,fileName,fileSubject) values('$userID','$filet','$lectureSubject')";
	$res2=mysql_query($queryFirst);
	if(!$res2) {
		echo "Unable to execute query.";
	}
	}



if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
   {
    
    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
       	 	$fileName = $_FILES["myfile"]["name"];
       	 	move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $_FILES["myfile"]["name"]);
       	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];

	       	 	 $ret[$fileName]= $output_dir.$fileName;


    	}
    	else
    	{
    	    	$fileCount = count($_FILES["myfile"]['name']);
    		  for($i=0; $i < $fileCount; $i++)
    		  {
    		  	$fileName = $_FILES["myfile"]["name"][$i];
	       	 	 $ret[$fileName]= $output_dir.$fileName;
    		    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName );
    		  }
    	
    	}
    }

    echo json_encode($fileName);
 
}


?>