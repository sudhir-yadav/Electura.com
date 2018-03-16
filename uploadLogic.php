<?php 


require('elec_core/elec_general.php');
require('elec_core/elec_user.php');
//if(!$_POST) {
//	header("location:createContent.php");
//}
session_start();
$general = new elec_general();
if ($general->logged_in() === true){$user_id = base64_decode($_SESSION['u_id']);}
ob_start();
$general->logged_out_protect() ;
$user = new elec_user($user_id);

$dire=$user_id;
//$specialArray=array("\"","*","/",":","<",">","?","\\","|");
$specialArray=array(":");
$dire=str_replace($specialArray,'',$dire);
$lectureTitle = $_SESSION['lectureTitle'];
$lectureSubject = $_SESSION['lectureSubject'];
//$lectureTitle = str_replace('\'','',$lectureTitle);

?>


<?php
if( $_FILES['file']['name'] != "" )
{
	$fname=basename($_FILES['file']['name']);
	$tmp_file=$_FILES['file']['tmp_name'];
	$uploaddir="uploads\\".$dire;
	if (!is_dir($uploaddir)) {
    mkdir($uploaddir);         
}
	
	
	
	$fname = strtolower($fname);
	echo $fname;
    //make alphaunermic
 	
	$dbname=mysql_real_escape_string($fname);
	$dbname=basename($dbname,'.pdf');
	$special=array("-",".","_");
	$dbname=str_replace($special," ",$dbname);
	$dbname=ucwords($dbname);
    //Clean multiple dashes or whitespaces
    
    //Convert whitespaces and underscore to dash
    $fname= str_replace(" ", "-", $fname);
	
	echo $fname;
	$m0=uniqid('pdf',true);
  	$m1=microtime(true);
  	$fileID=$m0.$m1;
  	$fileID=str_replace('.','',$fileID);
$subFolder=$uploaddir."\\".$fileID;
  	mkdir($subFolder);

move_uploaded_file($tmp_file, $uploaddir."/".$fileID."/".$fname) or 
           die( "Could not copy file!");
	
	
	$path_parts = pathinfo('/www/semester1/'.$fname);
	$onlyname=$path_parts['filename'];
	
	
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
	
	$fname2=$_FILES['file']['name'];
	$fsize=$_FILES['file']['size'];
	$floc=$uploaddir."/".$fname;
	$floc2=mysql_real_escape_string($floc);

	$fname2=str_replace(' ','-',$fname2);
	
	$floc2 = strtolower($floc2);
    //make alphaunermic
	include 'test.php';
	$num2=doImages($uploaddir."\\".$fileID."\\".$fname,$onlyname);

  	$thumbvalue="fileTHumb/".$onlyname."-thumb.png";
  	

  	$userID=mysql_real_escape_string($user_id);
  	
  	$newpage="files/".$onlyname."-".$fileID.".php";
  	$pdfLoc="uploads/".$dire."/".$fileID."/".$fname2;
  	$pdfLoc=mysql_real_escape_string($pdfLoc);
  	$fp = fopen("files/".$onlyname."-".$fileID.".php","wb");
	$newpage="files/".$onlyname."-".$fileID.".php";
	$_SESSION['fileID']=$fileID;

	
	date_default_timezone_set('Asia/Calcutta');
    $date = date('Y-m-d', time());
    $time = date('H:i:s' ,time());

    $lectureTitle=mysql_real_escape_string($lectureTitle);



//	$floc3 = explode(".",$floc2)
	$query="insert into electura_files_pdf(fileID, user_id, topicName, topicSubject, fileSize, pageLink, pdfLoc, thumbLoc, uploadDate, uploadTime) values('$fileID','$userID','$lectureTitle','$lectureSubject', '$fsize','$newpage','$pdfLoc','$thumbvalue', '$date','$time')";

	$result=mysql_query($query);

	
	//$path_parts = pathinfo('/www/semester1/'.$fname);
	//$onlyname=$path_parts['filename'];
	//echo $onlyname;
	$_SESSION['fileID']=$fileID;
	$lectureTitle=str_replace('\\','',$lectureTitle);
	
	$content = "<html><head><title>".$fname2."</title>".
	
	"</head><body><div id='mydiv'></div></center>";
		$layoutFirst=file_get_contents('layoutTemplateFirst.php', FILE_USE_INCLUDE_PATH);

		$content.=$layoutFirst;
		$content.="<div id='pdfDIV' width='100%'>";
		$content.="<h2>".$lectureTitle."</h2>";
		$content.="<label id='thisFileID' style='visibility:hidden;'>".$fileID."</label>";
		$content.="<div id='pdfMain' width='80% height='auto'>";
		$content.="<embed src=../".$pdfLoc." width='100%' height='100%' zoom='10%'>";
		$content.="</div>";
		
		//$content.="</div>";

	//	$content.="</div>";
		$layoutEnd=file_get_contents('layoutTemplateSecond.php', FILE_USE_INCLUDE_PATH);

		$content.=$layoutEnd;
	
	


	fwrite($fp,$content);
	fclose($fp);
	
	//$newpage="files/".$onlyname."-".$dire.".html";
	$query3="update electura_files_pdf set pageLink='$newpage' where fileID='$fileID'";
	mysql_query($query3);
	
	echo $newpage;
	
	
	if(!$result) {
		echo "Can't upload file to db.".mysql_error();
		echo "go go go show me error".mysql_error();
		echo "num".mysql_errno();
	}
	
	else {
		
	//	header("location:displayContent_pdf.php");
		header("location:congratsFile.php?a=pdf");
	}

}
else
{
    die("No file specified!");
}
?>
