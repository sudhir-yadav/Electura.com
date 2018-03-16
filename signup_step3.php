<?php
require('elec_core/elec_general.php');
session_start();
$general = new elec_general();
$general->logged_in_protect();

if(!isset($_SESSION['uid']) && !isset($_SESSION['role']))
{$location = 'index.php';header("Location:".$location."");}
else
{
	$role = base64_decode( $_SESSION['role']);
	$uid = base64_decode( $_SESSION['uid']);
	$gender = base64_decode( $_SESSION['gender']);
	if(isset($_SESSION['error']))
	{
	$error = $_SESSION['error'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"/>
 <title>Electura.com (Sign up 3)</title>
 <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
 <link rel='shortcut icon' type='image/x-icon' href='elec_favicon.ico'/>
<link href='elec_css/icon.css' rel='stylesheet'>
<link rel='stylesheet' href='elec_css/elec_registration_stp2.css'  type='text/css' media='screen, projection' />
<script src='elec_js/jquery.js'></script>
<script src='elec_js/jquery-ui-1.9.2.custom.js'></script>
<style>
input[type~='file']
{
	background-color:#98C6EB;
	padding:8px;
	border-radius:3px;
	color:#13587D;
	font-family:Verdana, Geneva, sans-serif;
	font-size:13px;
	width:200px;
	-moz-box-shadow:0 0 6px rgba(0, 0, 0, 0.3);
     -webkit-box-shadow:0 0 6px rgba(0, 0, 0, 0.3);
	box-shadow:inset 0 0 12px rgba(0, 0, 0, 0.3);
	//-webkit-box-reflect: below 3px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(80%, transparent) , to(rgba(250, 250, 250, 0.3)));
}

   .file-preview {
		//background:url(elec_profile_pic/male.png);
        border:1px solid #CCC;
		border-radius:3px;
        -moz-box-shadow:0 0 6px rgba(0, 0, 0, 0.5);
        -webkit-box-shadow:0 0 6px rgba(0, 0, 0, 0.5);
		box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
        display:inline-block;
        float:left;
        margin-right:1em;
        width:150px;
        height:150px;
        text-align:center;
		// -webkit-box-reflect: below 3px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(80%, transparent) , to(rgba(250, 250, 250, 0.3)));
    }

 .sys_err_sec
 {
	 width:100%;margin:-12px;
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
      <li><a> Step 2 <i class=" icon-ok icon-white"></i> <br/><label> University Network </label></a></li>
      <li><a class='selected'>Step 3 <br/><label> Complete Profile </label></a></li> 
      </ul>
      </div>
   </div>
   <br/><br/><br/>
<hr/>
<h3> Complete your profile </h3>
  <div class='elec_form'>
      <form name='final_form' method='post' enctype='multipart/form-data' action='elec_middleware/elec_getregistration3.php'>
     <table width='550'>
       <tbody>
          <tr>
              <td rowspan="2">
                    <!-- profile pic display section -->
                  <!-- <div class='file-preview '></div>-->
                   <?php 
				     if($gender == 'male')
					 {
						 echo "<div class='file-preview ' style='background:url(elec_profile_pic/default/male.png);'></div>";
					 }
					 else
					 {
						 echo "<div class='file-preview' style='background:url(elec_profile_pic/default/female.png)'></div>";
					 }
				   
				    ?>
              </td>
              <td><label for='pro-pic'>Upload a profile pic : </label><input type='file' name='pro_pic' id='pro_pic'/></td>
          </tr>
          <tr>
             <td><?php if($role=='teacher'){echo"<label for='teacher_doc'>Upload a document : </label><input type='file' name='teacher_doc' id='teacher_doc'/></td>";} ?>
           </tr>
           <tr>
              <td colspan='2'><input type='submit' value='Save & Continue' style='float:right;width:140px;margin-left:8px;'/> <a href='login.php'><label style='float:right;'>Skip</label></a></td>

           </tr>
        </tbody>
     </table>
     </form>
    
      <?php 
	  if(isset($_SESSION['error']))
	        { echo "<div class='sys_err_sec'>
	         <font color='white'>";
			
			if(isset($error['teach_doc']))
			{echo "<li>".$error['teach_doc']."</li>";}
			
			if(isset($error['propic']))
			{echo "<li>".$error['propic']."</li>";}

	   echo"</font></div>";} 

	  ?>
    
  </div><!-- elec_form-->
 </div><!--elec_sign_up -->
 <div class="footpad"></div>
</div><!--elec_wrapper-->

<div class='elec_footer'>
 <div class='elec_footer_wrap'> 

  </div>
</div>

  <script type="text/javascript">
    $("#pro_pic").change(function(e) {
        if(typeof FileReader == "undefined") return true;
 
        var elem = $(this);
        var files = e.target.files;
 
        for (var i = 0, f; f = files[i]; i++) {
            if (f.type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                        var image = e.target.result;
                        previewDiv = $('.file-preview');
                        bg_width = previewDiv.width();
                        previewDiv.css({
                            "background-size":bg_width + "px, auto",
                            "background-position":"50%, 50%",
                            "background-image":"url("+image+")",
                        });
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }
    });
</script>
 </body>
</html>
