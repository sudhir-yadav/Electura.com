<?php
require('elec_core/elec_general.php');
session_start();
$general = new elec_general();
$general->logged_in_protect();

 
if(isset($_SESSION['fname'],$_SESSION['lname'],$_SESSION['email'],$_SESSION['subject'], $_SESSION['password'], $_SESSION['dob']))
{
	 $_SESSION['fname'];
	 $_SESSION['lname'];
	 $_SESSION['email'];
	 $_SESSION['subject'];
	 $_SESSION['password'];
     $_SESSION['dob'];
}
else if(isset( $_SESSION['error']))
{
	$error = $_SESSION['error'];
}
else{$location = 'index.php';header("Location:".$location."");}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"/>
 <title>Electura.com (Sign up 2)</title>
 <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
 <link rel='shortcut icon' type='image/x-icon' href='elec_favicon.ico'/>
<link href='elec_css/icon.css' rel='stylesheet'>
<link rel='stylesheet' href='elec_css/autocomplete1.css' type='text/css'/>
<link rel='stylesheet' href='elec_css/elec_registration_stp2.css'  type='text/css' media='screen, projection' />
<script src='elec_js/jquery.js'></script>
<script src='elec_js/jquery-ui-1.9.2.custom.js'></script>
<style>
.idea
{
	background:url('elec_images/idea.png')no-repeat left;
	padding-left:25px;
	font-family:Calibri;
	color:#888;
	font-size:16px;
	margin:0px auto;
    margin-top:30px;
	width:505px;
}

 .sys_err_sec
 {
	 width:100%;margin:-15px;
	 background-color:#F00;
	 min-height:13px;
	 line-height:15px;
	 width:594px;
	 padding:5px;
	 margin-top:1px;
	 margin-bottom:-5px;
	 border-radius:0 0 5px 5px;
	 font-size:10px;
	 font-family:Verdana, Geneva, sans-serif;
	 overflow:hidden;
	  -webkit-box-shadow: 0 0 10px #666;
	  -moz-box-shadow: 0 0 10px #666;
	  -o-box-shadow:0 0 10px #666;
	  -ms-box-shadow:0 0 10px #666);
	  box-shadow: 0 0 10px #666;
 }
 
/*  .elec_sec_heading
 {
	 width:100%;
	 margin:-12px;
	 background-color:#333;
	 color:white;
	 height:16px;
	 width:588px;
	 padding:8px;
	 margin-top:13px;
	 margin-bottom:-5px;
	 font-size:14px;
	 font-family:Verdana, Geneva, sans-serif;
	 overflow:hidden;
	  -webkit-box-shadow: 0 0 10px #666;
	  -moz-box-shadow: 0 0 10px #666;
	  -o-box-shadow:0 0 10px #666;
	  -ms-box-shadow:0 0 10px #666);
	  box-shadow: 0 0 3px #666; 
 }*/
 
</style>
</head>
 <body>
<div class='elec_wrapper'>
 <div class='elec_logo'>Electura.com</div>
 <div class='elec_sign_up'>
   <div style='width:100%;'>
      <div id='crumbs'>
      <ul>
      <li><a>Step 1 <i class=" icon-ok icon-white"></i> <br/><label> User Registration </label></a></li>
      <li><a class='selected'> Step 2 <br/><label> University Network </label></a></li>
      <li><a>Step 3 <br/><label> Complete Profile </label></a></li> 
      </ul>
      </div>
   </div>
   <br/><br/><br/>
<hr/>
<h3> Connect to an University Network</h3>
  <div class='elec_form'>
<!-- elec_middleware/elec_getregistration2.php -->
  <table>
    <form name='resistration_part2' method='post' action="elec_middleware/elec_getregistration2.php">
    <tr><td>
    Use Electura as:
    </td>
    <td>
     <a rel="tooltip_el" data-placement="left" data="Select your profession (student/teacher)" >
    <select name='role' id='role'>
    <option value='student'>Student</option>
    <option value='teacher'>Teacher</option>
    </select>
    </a>
     of 
      <a rel="tooltip_el" data-placement="right" data="Connect to an university network  " >
   <input type='text' placeholder='University Name' id='university' name='university'/></a><div id='uni_note' style='float:right;width:3px;margin-left:3px;'></div><br/>
    </td></tr>
    <tr><td>

    Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 
    </td>
    <td>
    &nbsp;
    Male <input type='radio' name='gender' value='male'/> &nbsp;&nbsp;
    Female<input type='radio' name='gender' value='female'/>
    </td></tr>
    <tr>
    <td  id='upload_sec' style='height:0px;' colspan='2'></td>
    </tr>
    <tr>
    <td colspan='2'>
     <input type='submit' value='Save & Continue' style='width:140px;'/>   
	 <?php 
	  if(isset($_SESSION['error']))
	        { echo "<div class='sys_err_sec'>
	         <font color='white'>";
			
//			if(isset($error['university']))
//			{echo "<li>".$error['university']."</li>";}
//			
//			if(isset($error['gender']))
//			{echo "<li>".$error['gender']."</li>";}
        echo "Error in submission";

	   echo"</font></div>";} 

	  ?>
    </td></tr>
    </form>
    </table>
<!-- <i class='icon-warning-sign icon-red'></i> <font color='red' size='2px'> Error occured during submission</font>  --> 
    
  </div><!-- elec_form-->
 </div><!--elec_sign_up -->
 <div class='idea'> Connecting to an university network help's us to dilver better content to you .</div>

<div class="footpad"></div>

</div><!--elec_wrapper-->

<div class='elec_footer'>
 <div class='elec_footer_wrap'> 

  </div>
</div>

<!--<script src='elec_js/elec_index/electura_tooltip.js'></script>-->
<script src='elec_js/signup_2.js'></script>
 </body>

</html>
