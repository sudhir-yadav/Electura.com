<?php
require('elec_core/elec_general.php');
require('elec_core/elec_user.php');
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
   <title><?php  echo $user->get_name(); ?></title>
   <meta name='viewport' content='width=device-width,initial-scale=1.0'/>
  <link rel="shortcut icon" type="image/x-icon" href="elec_favicon.ico"/>
  <!-- <link href="elec_css/elec_dashboard.css" rel="stylesheet" type="text/css" media="screen, projection" />-->
   <link href='elec_css/icon.css' rel='stylesheet'> 
  <script src="elec_js/jquery.js"></script>
<style> 

 @-ms-viewport {width: device-width;}
 @font-face 
 {
   font-family:'colaborate-thinregular';
   src: url('elec_fonts/ColabThi-webfont.eot');
   src: url('elec_fonts/ColabThi-webfont.eot?#iefix') format('embedded-opentype'),
   url('elec_fonts/ColabThi-webfont.woff') format('woff'),
   url('elec_fonts/ColabThi-webfont.ttf') format('truetype'),
   url('elec_fonts/ColabThi-webfont.svg#colaborate-thinregular') format('svg');
   font-weight: normal;
   font-style: normal;     
  }

 html,body
	 {
	margin:0px;
    overflow-x: hidden;
    overflow-y: auto;
	font-family:'colaborate-thinregular';
	 }
	 .electura_main_container
	 {
		width:100%;
		min-height:660px;
		height:auto;
		background-color:#FFF;
	 }
	 
	 .electura_main_container_wrap
	 {
		 width:1360px;
		 margin:0px auto; 
		 padding-top:130px;
	 }
	 
	 .electura_top1_navbar
	 {
		 background-color:#595959;
		 color:white;
		 padding-left:7px;
		 font-family:'colaborate-thinregular';
		 font-size:20px;
		 height:32px;
		 line-height:32px;
		 position:fixed;
		 width:100%;
		// -webkit-text-stroke-width:0.23px;
		 -webkit-box-shadow:inset 0 0 30px rgba(0, 0, 0, 0.25);
		 -moz-box-shadow:inset 0 0 30px rgba(0, 0, 0, 0.25);
		 -o-box-shadow:inset 0 0 30px rgba(0, 0, 0, 0.25);
		 -ms-box-shadow:inset 0 0 30px rgba(0, 0, 0, 0.25);
		  box-shadow:inset 0 0 30px rgba(0, 0, 0, 0.25);
		  z-index:10000;
	 }
	 .electura_top1_navbar_wrap
	 {
		 width:950px;
		 margin:0px auto;
	 }
	 
	 	 .electura_top2_ebase1
	 {
		 background-color:#eff0f0;
		 font-family:'colaborate-thinregular';
		 -webkit-text-stroke-width:0.13px;
		 padding-left:7px;
		 height:170px;
		 margin-right:256px;
		 width:950px;
		  margin:0px auto;

		 border:1px solid #DDD;
	 }
	 	 .electura_top2_ebase_wrap
	 {
		 width:900px;
		 margin:0px auto;
	 }
.menubar_topnav
{
 float:right;font-size:12px;font-family:Verdana, Geneva, sans-serif;
}
button[class~=logout]
{
	background-color:#000;
	color:#FFF;
	outline:thick;
	border-radius:2px;
	border:none;
	padding:4px;
	width:65px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}
button[class~=logout]:hover
{
  background-color:#FFF;
  color:#000;
  cursor:pointer;
   -webkit-box-shadow:inset 0 0 10px rgba(0, 0, 0, 0.40);
  -moz-box-shadow:inset 0 0 10px rgba(0, 0, 0, 0.40);
  -o-box-shadow:inset 0 0 10px rgba(0, 0, 0, 0.40);
  -ms-box-shadow:inset 0 0 10px rgba(0, 0, 0, 0.40);
   box-shadow:inset 0 0 10px #CCC; 
   -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  -ms-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;	
}

 .elect_content_display
	 {
		float:left;
		width:950px;
		margin-left:15px;
		font-family:'colaborate-thinregular';
	 }
	 .elect_content_display h2
	 {
		 margin-top:0px;
		 font-size:23px;
		 -webkit-text-stroke-width:0.05px;
		 behavior: url(pie/PIE.htc);
	 }
	 	 .electura_news
	 {
		 float:right;
		 overflow:hidden;
		 height:100%;
		 width:200px;
		 border:thin solid  #B5B5B5;
		 behavior: url(pie/PIE.htc);
		 		 background-color:#F4F4F4;
		
	 }
	 .chatndnotify
	 {
		 top:0px;
		 right:0px;
		 position:fixed;
		 width:225px;
		 min-height:50%;
		 height:100%;
		 margin-top:0px;
		 margin-right:-2px;
		 z-index:1000;
		 behavior: url(pie/PIE.htc);
	 } 
	 
	hr 
	{
        margin: 20px 0;
        border: 0;
        border-top: 1px solid #eeeeee;
        border-bottom: 1px solid #ffffff;
    }
	
	input[type~=text]
    {
  padding-left:4px;
  width:55%;
  height:20px;
  line-height:20px;
  margin-left:1px;
  margin-bottom:10px;
  border:thin solid #CACACA;
  font-family:'colaborate-thinregular';
  font-size:15px;
  border-radius:3px; 
  padding:5px;  
/*  border:none;
   border-bottom:thin solid #999;
 background-color:transparent;*/
   }
/* ul li:last-child a:after {
	display: none;
}*/
.menubar_topnav ul{display:inline;}
.menubar_topnav ul:hover{cursor:pointer;}
.menubar_topnav ul>li{display:inline;margin:0 8px 0 8px;padding:3px;height:40px;}
.menubar_topnav ul>li:hover{cursor:pointer;border-radius:2px;border:white solid 1px;}
.menubar_topnav ul>li:last-child{margin-left:16px;}
.menubar_topnav ul>li:last-child:hover{border:none;}

.usec_dp
{
height:170px;
width:170px;
position:absolute;
border-radius:50%;
margin-left:10px;
color:#62B0FF;
margin-top:55px;
border:1px solid #DDD;
-webkit-box-shadow:inset 0 0 20px rgba(0, 0, 0, 0.25);
-moz-box-shadow:inset 0 0 20px rgba(0, 0, 0, 0.25);
-o-box-shadow:inset 0 0 20px rgba(0, 0, 0, 0.25);
-ms-box-shadow:inset 0 0 20px rgba(0, 0, 0, 0.25);
 box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);	
}

a{text-decoration:none;color:inherit;}

</style>
</head>
 
 <body>
 
    <div class='electura_main_container'> 
       <div class='electura_top1_navbar'>
         <div class='electura_top1_navbar_wrap'>
        <i class="  icon-user icon-white"></i> <?php  echo $user->get_name(); ?>
            <div class='menubar_topnav'>
              <ul>
                   <li> <i class=" icon-globe icon-white"></i> Notification</li>
                   <li> <a href='edit_profile.php'><i class=" icon-wrench icon-white"></i> Edit Profile</a></li>
                   <li> <a href='dashboard.php'><i class=" icon-tasks icon-white"></i> DashBoard</a></li>
                   <li> <a href='logout.php'><button class='logout'>Logout</button></a></li>
              </ul>
            </div>
         </div><!--electura_top1_navbar_wrap-->
       </div><!--electura_top1_navbar-->
       
       <div class='electura_top2_ebase1'>
       
       <!--<div class='elect_logo_top2'></div>elect_logo_top2-->
          <div class='electura_top2_ebase_wrap'>
          
          <div class='usec_dp' style='background:url(<?php echo $user->get_propic();?>)center no-repeat #FFF;background-size:100%;'></div>
          <div style='position:absolute;margin-top:115px;margin-left:190px;'>
          <h1><?php echo $user->get_name();?></h1>
          </div>
          </div> <!--electura_top2_ebase_wrap-->
          
       </div><!--electura_top2_ebase-->
   <div style='background-color:#5EAEFF;padding:0px;width:60%;height:60px;width:959px; margin:0px auto;border-radius:0px 0px 5px 5px;'>
   <div style='position:absolute;color:white;margin-left:220px;font-family:Verdana, Geneva, sans-serif;font-size:14px;margin-top:8px;line-height:8px;'>
  <img src='<?php echo $a = $user->get_university_flag($user->get_university());?>' align='middle' style='border:solid thin #FFF;'/> 
   <?php echo "&nbsp;".$user->get_university()." (".$user->get_subject().")<br/>";?>
   <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Country :".$user->get_unicountry_nm($user->get_university());?>
   </div>
   </div>
   
  <div style='margin:0px auto;width:959px;background-color:#EBEBEB;margin-top:8px;border-radius:4px;height:50px;font-family:Verdana, Geneva, sans-serif;font-size:14px;'>
         Date of birth :<?php echo $user->get_dob(); ?> &nbsp;&nbsp;&nbsp; User type :<?php echo $user->get_usertype(); ?> &nbsp;&nbsp;&nbsp; 
		 Subject :<?php echo $user->get_subject(); ?>
  </div>
  
  
  <div style='margin:0px auto;width:400px;background-color:#EBEBEB;margin-top:8px;border-radius:4px;height:50px;font-family:Verdana, Geneva, sans-serif;font-size:14px;'>
  
  </div>
  
  <div style='margin:0px auto;width:400px;background-color:#EBEBEB;margin-top:8px;border-radius:4px;height:50px;font-family:Verdana, Geneva, sans-serif;font-size:14px;'>
  
  </div>

      <div class='electura_main_container_wrap'>   
          


          
          
          <div class='elect_content_display'>
          
          
          
          </div> <!--elect_content_display-->

      </div><!--electura_main_container_wrap-->

    </div><!--electura_main_container-->
    
     <!--  <div class='chatndnotify'>
         <iframe class='electura_news'>
         </iframe>
         <iframe class='electura_chat'></iframe>
      </div> chatndnotify-->

 </body>

</html>