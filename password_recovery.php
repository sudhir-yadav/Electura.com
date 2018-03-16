<?php
require('elec_core/elec_general.php');
session_start();
$general = new elec_general();
$general->logged_in_protect();
?>
<?php 

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
 
 .elec_sign_up
 {
	  background:#F7F7F7; 
	  margin:12px;
	  margin:0px auto;
	  margin-top:90px;
	  padding:12px;
	  padding-top:2px;
	  padding-bottom:2px;
	  opacity:0.8;
	  filter:alpha(opacity=80);
	  color:#333;
	  border-radius:5px;
	  font-size:17px;
	  width:520px;
	  -webkit-box-shadow: 0 0 25px #666;
	   -moz-box-shadow: 0 0 25px #666;
	   -o-box-shadow:0 0 25px #666;
	   -ms-box-shadow:0 0 25px #666);
	   box-shadow: 0 0 25px #666;
	   font-family:'colaborate-thinregular';
	   -webkit-box-reflect: below 4px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(93%, transparent) , to(rgba(250, 250, 250, 0.18)));
 }
 
 .sign_up_button
 {
	font-family:Verdana, Geneva, sans-serif; 
	color:#0D98E3;
	float:right;
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

  <div class='elec_form'>
         <!--<div class='sign_up_button'><a href='index.php' tabindex='5'><i class='icon-user icon-blue'></i> Sign up</a></div>-->
         <center> <h1>Password Recovery</h1></center>
<center>
<form method='post' action='password_recovery.php'>
     <table>
       <tr>
       <td>Enter email id &nbsp;&nbsp;</td><td>: <input type='text' name='uname' placeholder='Enter your email address' tabindex='1'/></td>
       </tr>
       <tr>
       <td></td>
       <td style='line-height:13px;'>
       <center>
       <img src="elec_captcha/captcha.php" id="captcha" style='border:#D3D3D3 1px solid;border-radius:3px;'/><br/>
     <label>
     <a href="#" onclick="document.getElementById('captcha').src='elec_captcha/captcha.php?'+Math.random();document.getElementById('captcha-form').focus();" id="change-image">Not readable? Change text.</a>
    </label>
    </center> 
    </td>
    </tr>
    <tr>
    <td>Enter the code </td>
    <td>:
    <input type="text" name="captcha" id="captcha-form" autocomplete="off" placeholder='Enter the captcha code'/>
    </td>
       </tr>
       <tr><td colspan='2'><input type='submit' value='Submit' tabindex='3'/> </td></tr>
    </table>
 </form>
</center>

<?php
 if(!isset($_REQUEST['captcha'])){echo "";}
else if (empty($_REQUEST['captcha'])) {
echo "<div class='login_error'> <i class='icon-warning-sign icon-white'></i>&nbsp; Captcha code not entered</div>";       
}
else if ( trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
	 $request_captcha = htmlspecialchars($_REQUEST['captcha']);
        $captcha_message = "Invalid captcha";
		echo "<div class='login_error'> <i class='icon-warning-sign icon-white'></i>&nbsp; ".$captcha_message."</div>";
        unset($_SESSION['captcha']);
	}
else if($_POST['uname'] == ''){
	 echo "<div class='login_error'> <i class='icon-warning-sign icon-white'></i> Please enter email address </div>";
	 }
 else{
	   session_start();
	   $_SESSION['uname'] = $_POST['uname']; 
	   header("Location:elec_middleware/password_recover_middleware.php");
    }
?>
<?php if(isset($_SESSION['error'])){ if(isset($error['r_email'])) {echo "<div class='login_error'> <i class='icon-warning-sign icon-white'></i>&nbsp;".$error['r_email']."</div>";}unset($_SESSION['error']);}?>  
  </div><!-- elec_form-->

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
