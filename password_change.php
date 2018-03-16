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
	  width:460px;
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
  <div style='background:url(elec_images/mypass.png);height:110px;width:110px;background-size:100%;position:absolute;margin-top:-60px;'></div>
         <!--<div class='sign_up_button'><a href='index.php' tabindex='5'><i class='icon-user icon-blue'></i> Sign up</a></div>-->
         <center> <h1>Change password</h1></center>
<center>
<form method='post' action='elec_middleware/change_password_page.php' >
     <table>
       <tr>
          <td colspan='2'> <input type='text' name='email' placeholder='Enter your email address' tabindex='1'/></td>
       </tr>
       <tr>
          <td colspan='2'> <input type="text" name="token" placeholder='Enter the token' autocomplete='off'/></td>
       </tr>
       <tr>
          <td> <input type="password" name="password" placeholder='Enter the password' /></td>
       </tr>
       <tr><td colspan='2'><input type='submit' value='Submit' tabindex='3'/> </td></tr>
    </table>
 </form>
</center>

<?php $_SESSION['error'] = $error; ?>
<?php if(isset($_SESSION['error'])){ if(isset($error['c_pass'])) {echo "<div class='login_error'> <i class='icon-warning-sign icon-white'></i>&nbsp;".$error['c_pass']."</div>";}unset($_SESSION['error']);}?> 
<?php if(isset($_SESSION['msg'])){ echo "<div class='login_error' style='background-color:#1AE123;border:#35CE1A 1px solid;'> <i class='icon-ok icon-white'></i>&nbsp;".$_SESSION['msg']."</div>";unset($_SESSION['msg']);}?> 
  </div><!-- elec_form-->

 </div><!--elec_sign_up -->

<div class="footpad" ></div>

</div><!--elec_wrapper-->

<div class='elec_footer'>
 <div class='elec_footer_wrap'> 

  </div>
</div>

<!--<script src='elec_js/elec_index/electura_tooltip.js'></script>-->
<!--<script src='elec_js/signup_2.js'></script>-->
 </body>

</html>
