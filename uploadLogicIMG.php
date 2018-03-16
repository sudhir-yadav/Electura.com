<?php 


require('elec_core/elec_general.php');
require('elec_core/elec_user.php');
session_start();
$general = new elec_general();
if ($general->logged_in() === true){$user_id = base64_decode($_SESSION['u_id']);}
ob_start();
$general->logged_out_protect() ;
$user = new elec_user($user_id);

$dire=$user_id;
$specialArray=array("\"","*","/",":","<",">","?","\\","|");
$dire=str_replace($specialArray,'',$dire);
$lectureTitle = $_SESSION['lectureTitle'];
$lectureSubject = $_SESSION['lectureSubject'];
//$groupIMG=$_SESSION['groupIMG'];
$groupIMG=$_POST['groupIMG'];
echo $groupIMG;
$lectureTitle = str_replace('\'','',$lectureTitle);
$lectureTitle=mysql_real_escape_string($lectureTitle);
echo $user_id;

?>


<?php
if( $_FILES['file']['name'] != "" )
{
	$uploaddir="uploads\\".$dire;
	if (!is_dir($uploaddir)) {
    mkdir($uploaddir);      
    } 

    $uploaddir="uploads\\".$dire."\\".$groupIMG;
    if(!is_dir($uploaddir)) {
    	mkdir($uploaddir);
    }

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


	for($i=0;$i<count($_FILES['file']['name']);$i++) {
		$fname=basename($_FILES['file']['name'][$i]);
		$tmp_file=$_FILES['file']['tmp_name'][$i];
		echo $fname;


		$fname = strtolower($fname);
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
	$m0=uniqid('img',true);
  	$m1=microtime(true);
  	$fileID=$m0.$m1;
  	$fileID=str_replace('.','',$fileID);
	$subFolder=$uploaddir."\\".$fileID;
  	mkdir($subFolder);

move_uploaded_file($tmp_file, $uploaddir."/".$fileID."/".$fname) or 
           die( "Could not copy file!");

           $imgLoc=$uploaddir."/".$fileID."/".$fname;
           $imgLoc=mysql_real_escape_string($imgLoc);
           $fsize=$_FILES['file']['size'][$i];
           date_default_timezone_set('Asia/Calcutta');
    $date = date('Y-m-d', time());
    $time = date('H:i:s' ,time());


$query="insert into electura_files_image(fileID, user_id, groupID, topicName, topicSubject, fileSize, pdfLoc, uploadDate, uploadTime) values('$fileID','$user_id','$groupIMG','$lectureTitle','$lectureSubject','$fsize','$imgLoc','$date','$time')";

$result=mysql_query($query);



	}

$specialArray=array("#",".","_","~","`","!","@","#","$","%","^","&","*","(",")","+","=","/","\\","<",">",":",";","[","]","{","}","\"","'","?",",",".","|");

$onlyname=str_replace($specialArray,"",$lectureTitle);
$onlyname=str_replace(" ","-",$onlyname);
$fp = fopen("files/".$onlyname."-".$groupIMG.".php","wb");
$newpage="files/".$onlyname."-".$groupIMG.".php";
$newpage=mysql_real_escape_string($newpage);
$pageLinkQuery="update electura_files_image set pageLink='$newpage' where groupID='$groupIMG'";
$pageLinkReslt=mysql_query($pageLinkQuery);
$layoutFirst=file_get_contents('fetchImages1.php', FILE_USE_INCLUDE_PATH);
$layoutSecond=file_get_contents('fetchImages2.php', FILE_USE_INCLUDE_PATH);

$mainLayout1=file_get_contents('templateLayoutImage1.php', FILE_USE_INCLUDE_PATH);
$mainLayout2=file_get_contents('templateLayoutImage2.php', FILE_USE_INCLUDE_PATH);

$content=$mainLayout1;
$content.="<script>";
$content.="var groupID='".$groupIMG."';";
$content.="function mainImage() {";
$content.="var groupID='".$groupIMG."';";
$content.=$layoutFirst;
$content.="function allImages() {";
$content.="var groupID='".$groupIMG."';";
$content.=$layoutSecond;
$content.="</script>";
$content.="<div id='pageInfo'><h3>".$lectureTitle."</h3></div>";
$content.="<div id='groupIMG'>";
$content.="<label id='groupIDLabel' style='visibility:hidden;'>".$groupIMG."</label>";
$content.="<div id='otherIMG'></div>";
$content.="<div id='mainIMG'></div>";

//$content.="</div>";

$content.=$mainLayout2;

fwrite($fp,$content);
fclose($fp);

header("location:congratsFileImage.php");

}

else {
	echo "no file selected";
}
?>