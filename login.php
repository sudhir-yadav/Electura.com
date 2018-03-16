<?php
require('elec_core/elec_general.php');
session_start();
$general = new elec_general();
$general->logged_in_protect();
?>
<?php 
 require('elec_core/elec_config.php');
if(isset( $_SESSION['error']))
{
  $error = $_SESSION['error'];
}
else{$error = NULL;}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"/>
 <title>Electura (Login)</title>
 <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
 <link rel='shortcut icon' type='image/x-icon' href='elec_favicon.ico'/>
<link href='elec_css/icon.css' rel='stylesheet'>
<link rel='stylesheet' href='elec_css/autocomplete1.css' type='text/css'/>
<link rel='stylesheet' href='elec_css/elec_registration_stp2.css'  type='text/css' media='screen, projection' />
<script src='elec_js/jquery.js'></script>
<script src='elec_js/jquery-ui-1.9.2.custom.js'></script>
<style>
.login_error
{
	padding:10px;
	font-family:Calibri;
	color:white;
	font-size:14px;
	//margin:0px auto;
	background-color:#FF3E3E;
	margin:5px;
	width:94%;
	border:1px #D50000 solid;
	border-radius:4px;
}
 
.propic{height:100px;
 width:100px;
 background-color:#FFF;
 margin-top:-50px;
 margin-left:10px;
 margin-bottom:-15px;
 border-radius:4px;
 border:2px solid;
 background:url(elec_profile_pic/default/male.png) center no-repeat #F5F5F5;
 background-size:100%;
 }
 .sign_up_button
 {
	font-family:Verdana, Geneva, sans-serif; 
	color:#0D98E3;
	float:right;
	margin-top:-40px;
 }
  a{text-decoration:none;}
  a:hover{text-decoration:none;cursor:pointer;}
  h1{font-family:'colaborate-thinregular';}
 
</style>
</head>
 <body>
<div class='elec_wrapper'>
 <div class='elec_logo'>Electura.com</div>
 <div class='elec_sign_up' style='padding-bottom:10px;'>

<div class='propic'></div>
  <div class='elec_form'>
         <div class='sign_up_button'><a href='index.php' tabindex='5'><i class='icon-user icon-blue'></i> Sign up</a></div>
         <center> <h1>User Login</h1></center>
<center>

<form method='post' action='elec_middleware/login_middleware.php'>
     <table>
       <tr>
       <td>User name &nbsp;&nbsp;</td><td><input type='text' name='uname' placeholder='User Name' tabindex='1'/></td>
       </tr>
       <tr>
       <td>Password  </td><td><input type="password" name='password' placeholder='Password' tabindex='2'/></td>
       </tr>
       <tr><td colspan='2'><input type='submit' value='Login' tabindex='3'/> <label><a href='password_recovery.php' tabindex='4'> forgot password .? </a></label></td></tr>
    </table>
 </form>
</center>
    
  </div><!-- elec_form-->
<?php  if(isset($_SESSION['error']))
{ 
          echo "<div class='login_error'> <i class='icon-warning-sign icon-white'></i>&nbsp; ".$error['login']."</div>";		  
} ?>
 </div><!--elec_sign_up -->

<div class="footpad"></div>

</div><!--elec_wrapper-->

<div class='elec_footer'>
 <div class='elec_footer_wrap'> 

  </div>
</div>

<!--<script src='elec_js/elec_index/electura_tooltip.js'></script>-->
<!--<script src='elec_js/signup_2.js'></script>-->
 </body>

</html>
