<?php
require('elec_core/elec_general.php');
require('elec_core/elec_user.php');
session_start();
$general = new elec_general();
if ($general->logged_in() === true){$user_id = base64_decode($_SESSION['u_id']);}
ob_start();
$general->logged_out_protect() ;
$user = new elec_user($user_id);
$testTopic=$_POST['testTopic'];
$testSubject=$_POST['subjects'];

$con=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
  if(!$con) {
    echo "Unable to connect to the server.";
  }
  
  
  $db=mysql_select_db(DB_NAME);
  if(!$db) {
    echo "Can't select the database.";
  }

  $m0=uniqid('edit',true);
  $m1=microtime(true);
  $editLink=$m0.$m1;
  $editLink=str_replace('.','',$editLink);
  $editLink=mysql_real_escape_string($editLink);

  $m2=uniqid('test',true);
  $m3=microtime(true);
  $testID=$m2.$m3;
  $testID=str_replace('.','',$testID);
  $testID=mysql_real_escape_string($testID);

  date_default_timezone_set('Asia/Calcutta');
  $date = date('Y-m-d', time());
  $time = date('H:i:s' ,time());

  $specialArray=array("#",".","_","~","`","!","@","#","$","%","^","&","*","(",")","+","=","/","\\","<",">",":",";","[","]","{","}","\"","'","?",",",".","|");

  $onlyname=str_replace($specialArray,"",$testTopic);
  $onlyname=str_replace(" ","-",$onlyname);

  $fp = fopen("tests/".$onlyname."-".$editLink.".php","wb");
  $editNewPage="tests/".$onlyname."-".$editLink.".php";

  $fp2 = fopen("tests/".$onlyname."-".$testID.".php","wb");
  $testNewPage="tests/".$onlyname."-".$testID.".php";


  
$query="insert into electura_testsmain(testID, user_id, testTopic, testSubject, pageLink, editLink, testDate, testTime) values('$testID','$user_id','$testTopic','$testSubject','$testNewPage','$editNewPage','$date','$time')";
$res=mysql_query($query);
if(!$res) {
	echo "Can't execute Query";
	echo mysql_error();
  return false;
}

$editLayoutFirst=file_get_contents('editTestTemplate1.php', FILE_USE_INCLUDE_PATH);
$editLayoutSecond=file_get_contents('editTestTemplate2.php', FILE_USE_INCLUDE_PATH);

$content=$editLayoutFirst;
$content.="<script>";
$content.="var testID='".$testID."';";
$content.="var testTopic='".$testTopic."';";
$content.=$editLayoutSecond;

fwrite($fp,$content);
fclose($fp);	

$mainLayoutFirst=file_get_contents('mainTestTemplate1.php', FILE_USE_INCLUDE_PATH);
$mainLayoutSecond=file_get_contents('mainTestTemplate2.php', FILE_USE_INCLUDE_PATH);

$content2=$mainLayoutFirst;
$content2.="<script>";

$content2.="var testID='".$testID."';";
$content.="var testTopic='".$testTopic."';";
$content2.=$mainLayoutSecond;

fwrite($fp2,$content2);
fclose($fp2);	

header("location:congratsTest.php?a=".$testID);

?>