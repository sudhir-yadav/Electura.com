<?php
require('../elec_core/elec_general.php');
require('../elec_core/elec_user.php');
session_start();
$general = new elec_general();
if ($general->logged_in() === true){$user_id = base64_decode($_SESSION['u_id']);}
ob_start();
$general->logged_out_protect() ;
$user = new elec_user($user_id);
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8"/>
   <title>Electura.com(Dashboard)</title>
   <meta name='viewport' content='width=device-width,initial-scale=1.0'/>
   <link rel="shortcut icon" type="image/x-icon" href="elec_favicon.ico"/>
   <link href="../elec_css/elec_dashboard.css" rel="stylesheet" type="text/css" media="screen, projection" />
   <link href='../elec_css/icon.css' rel='stylesheet'> 
   <link href='../elec_css/testQuestionStyle.css' rel='stylesheet'>
  <script src="../elec_js/jquery.js"></script>