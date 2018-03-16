<?php 
require('elec_core/elec_general.php');
require('elec_core/elec_user.php');
if(!$_POST) {
	header("location:createContent.php");
}
session_start();
$general = new elec_general();
if ($general->logged_in() === true){$user_id = base64_decode($_SESSION['u_id']);}
ob_start();
$general->logged_out_protect() ;
$user = new elec_user($user_id);

$dire=$user_id;
$lectureTitle = $_SESSION['lectureTitle'];
$lectureSubject = $_SESSION['lectureSubject'];
$vidLink=$_POST['vidLink'];
$vidDesc=$_POST['vidDesc'];

$vidLink=str_replace("http://www.youtube.com/watch?v=","",$vidLink);
$embedVid="http://www.youtube.com/v/".$vidLink."?showinfo=0&iv_load_policy=3&controls=0". "frameborder='0' allowfullscreen";
//$lectureTitle = str_replace('\'','',$lectureTitle);
$m0=uniqid('vid',true);
$m1=microtime(true);
$vidID=$m0.$m1;
$vidID=str_replace('.','',$vidID);
$specialArray=array("#",".","_","~","`","!","@","#","$","%","^","&","*","(",")","+","=","/","\\","<",">",":",";","[","]","{","}","\"","'","?",",",".","|");

$onlyname=str_replace($specialArray,"",$lectureTitle);
$onlyname=str_replace(" ","-",$onlyname);
	$newpage="files/".$onlyname."-".$vidID.".php";
  	$fp = fopen("files/".$onlyname."-".$vidID.".php","wb");

  	date_default_timezone_set('Asia/Calcutta');
    $date = date('Y-m-d', time());
    $time = date('H:i:s' ,time());
    $thumbURL="http://img.youtube.com/vi/".$vidLink."/default.jpg";
    $thumbURL=mysql_real_escape_string($thumbURL);

$newpage=mysql_real_escape_string($newpage);


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

	$storeQuery="insert into electura_files_video(vidID,user_id,topicName,topicSubject,thumbLink,pageLink,topicDate,topicTime) values('$vidID','$dire','$lectureTitle','$lectureSubject','$thumbURL','$newpage','$date','$time')";
	$result=mysql_query($storeQuery);
	if(!$result) {
		echo "can't insert".mysql_error();
	}

	$content = "<html><head><title>".$lectureTitle."</title>".
	
	"</head><body><div id='mydiv'></div></center>";
		$layoutFirst=file_get_contents('layoutTemplateFirstVideo.php', FILE_USE_INCLUDE_PATH);

		$content.=$layoutFirst;
		$content.="<div id='pdfDIV' width='100%'>";
		$content.="<h2>".$lectureTitle."</h2>";
		$content.="<label id='thisVidID' style='visibility:hidden;'>".$vidID."</label>";
		$content.="<div id='pdfMain' width='80% height='auto'>";
		$content.="<iframe width='853' height='480' src='//www.youtube.com/embed/".$vidLink."??vq=hd1080&modestbranding=1&rel=0&showinfo=0&iv_load_policy=3&theme=light' frameborder='0' allowfullscreen></iframe>";
		$content.="</div>";
		
		//$content.="</div>";

	//	$content.="</div>";
		$layoutEnd=file_get_contents('layoutTemplateSecondVideo.php', FILE_USE_INCLUDE_PATH);

		$content.=$layoutEnd;
	
	


	fwrite($fp,$content);
	fclose($fp);
	


?>

