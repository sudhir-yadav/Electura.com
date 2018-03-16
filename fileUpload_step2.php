<?php
require('elec_core/elec_general.php');
require('elec_core/elec_user.php');
session_start();
$general = new elec_general();
if ($general->logged_in() === true){$user_id = base64_decode($_SESSION['u_id']);}
ob_start();
$general->logged_out_protect() ;
$user = new elec_user($user_id);
$lectureType = $_POST['lectureType'];
$_SESSION['lectureType']=$lectureType;

$lectureTitle = $_POST['lectureTitle'];
$_SESSION['lectureTitle']=$lectureTitle;

$lectureSubject = $_POST['subjectSelect'];
$_SESSION['lectureSubject']=$lectureSubject;
echo $_SESSION['lectureSubject'];
?>
 

        <?php
if($lectureType=='pdf') {
  header("location:fileUpload_pdf.php");
}

if($lectureType=='image') {
  header("location:fileUpload_image.php");
}

if($lectureType=='video') {
  header("location:fileUpload_video.php");
}




?>