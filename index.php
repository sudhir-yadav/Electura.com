<?php
require('elec_core/elec_general.php');
session_start();
$general = new elec_general();
$general->logged_in_protect();
?>
<?php  session_regenerate_id(false); if(isset($_SESSION['error'])){$error = $_SESSION['error'];}else{$error = NULL;} ?>
<?php require('elec_core/elec_registration_db.php'); $reg_db = new elec_registration_db();?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"/>
 <title>Electura.com</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <link rel="shortcut icon" type="image/x-icon" href="elec_favicon.ico"/>
 <link href='elec_css/icon.css' rel='stylesheet'>
 <!-- <link href='elec_css/co_component_icon.css' rel='stylesheet'>-->
 <link href="elec_css/electura_index.css" rel="stylesheet" type="text/css" media="screen, projection" />
 <script src='elec_js/jquery.js'></script>
 <style>



.footpad {overflow:auto;
	padding-bottom: 30px;}  /* must be same height as the footer */

.elec_footer {
	position: relative;
	margin-top: -70px; /* negative value of footer height */
	height: 60px;
	clear:both;
	/*background:#444;*/
	text-align:center;
	font-family:'colaborate-thinregular';
/*    -webkit-box-shadow: 0 0 12px #666;
	-moz-box-shadow: 0 0 12px #666;
	-o-box-shadow:0 0 12px #666;
    -ms-box-shadow:0 0 12px #666);
	 box-shadow: 0 0 12px #666;*/
	 line-height:10px;
	} 
h1{font-family:'colaborate-thinregular';}

.elec_footer_wrap
{
	margin:0px auto;
	width:1000px;
	padding:5px;
} 

.elec_index_text1 {
	
  font-family:Verdana, Geneva, sans-serif;  opacity:0.7;
  background:url('elec_images/content_areabg.png');
  color:white;
   font-size:12px;
   height: 50px;
  width:48%;
  left:-700px;
 
  border-radius:55px;padding:20px;margin:5px;margin-top:60px;position:absolute;
     -webkit-box-shadow: 0 0 30px #fff;
   -moz-box-shadow: 0 0 30px #fff;
   -o-box-shadow:0 0 30px #fff;
   -ms-box-shadow:0 0 30px #fff;
   box-shadow:inset 0 0 22px #000;
      -webkit-transition: all 0.4s linear;
    -moz-transition:all 0.4s linear;
    -o-transition: all 0.4s linear;
    -ms-transition: all 0.4s linear;
     transition: all 0.4s linear;
	 line-height:21px;
   
}

.elec_index_text2{
  font-family:Verdana, Geneva, sans-serif;
  background-color:#000;
  opacity:0.7;
  background:url('elec_images/content_areabg.png');
  color:white;
  height: 50px;
  top: 20%;
    left:-700px;
   font-size:12px;
   line-height:21px;
  width:48%;border-radius:55px;padding:20px;margin:5px;margin-top:80px;position:absolute;
     -webkit-box-shadow: 0 0 30px #fff;
   -moz-box-shadow: 0 0 30px #fff;
   -o-box-shadow:0 0 30px #fff;
   -ms-box-shadow:0 0 30px #fff;
	box-shadow:inset 0 0 22px #000;
      -webkit-transition: all 0.4s linear;
    -moz-transition:all 0.4s linear;
    -o-transition: all 0.4s linear;
    -ms-transition: all 0.4s linear;
     transition: all 0.4s linear;
    
}

.elec_index_text3 {
font-family: Verdana, Geneva, sans-serif;
    opacity:0.7;
  background:url('elec_images/content_areabg.png');
  height: 50px;
  color:white;
  top: 35%;
    left:-700px;
  width:48%;border-radius:55px;padding:20px;margin:5px;margin-top:100px;position:absolute;
  font-size:12px;
  line-height:21px;
   -webkit-box-shadow: 0 0 30px #fff;
   -moz-box-shadow: 0 0 30px #fff;
   -o-box-shadow:0 0 30px #fff;
   -ms-box-shadow:0 0 30px #fff;
    box-shadow:inset 0 0 22px #000;
      -webkit-transition: all 0.4s linear;
    -moz-transition:all 0.4s linear;
    -o-transition: all 0.4s linear;
    -ms-transition: all 0.4s linear;
     transition: all 0.4s linear;
  
}


 </style>
 <noscript>
<?php
 echo"<div class='javdisabled'> <i class='icon-warning-sign icon-white'></i> &nbsp;&nbsp;  To create an Electura Account, you need JavaScript enabled in your browser. <a href='#'>   <i class=' icon-refresh icon-white'></i> Refresh this page after you have enabled JavaScript. </a> 
 </div>"; 
?>
 </noscript>
</head>
 <body>

    <div class='elec_index_navbar' >
       <div class='elec_index_navbar_wrap' style='color:white;line-height:39px;'>
       <img src='elec_images/elec39x200.png'/>


        <form class='elec_login' name='login_form' method='post' action='elec_middleware/login_middleware.php'>
          <input type='text' name='uname' placeholder='User Name' tabindex='1'/>
          <input type='password' name='password' placeholder='Password' tabindex='2'/>
          <input type='submit' value='Login' tabindex='3'/>
        </form>   
        
      </div><!--elec_index_navbar_wrap-->
   </div> <!--elec_index_navbar-->
  
  
     <div class='elec_index_mcontainer'>
         <div class='elec_index_mc_wrap'>
       
     <div class='elec_sign_up'>
     <div style='background:url(elec_images/beta.png);height:51px;width:62px;position:relative;margin-top:-20px;margin-left:217px;'></div>
        <h2 style='margin-top:-30px;'><img src='elec_images/elec50x50.png' align='absbottom' alt='elec_logo'/> Sign Up</h2>
      <?php // if(isset($_SESSION['error'])){ echo "<font color='#FF0000' size='-1' face='Verdana, Geneva, sans-serif'> Form Submission failed </font>";} ?>
        <hr/>
        
          <form class='elec_sign_upfr' name='signup_form' method='post' action="elec_middleware/elec_getregistration1.php" >
           
              <a rel="tooltip_el" data-placement="left" data="Name should be of atleast 6 alphabets and  can be of maximum 32 alphabets" > 
              <input type='text' id='fname' name='fname' tabindex='4' placeholder='First Name'/>
              </a>
              <a rel="tooltip_el" data-placement="top" data="Name should be of atleast 6 alphabets and  can be of maximum 32 alphabets" > 
              <input type='text' id='lname' name='lname' tabindex='5' placeholder='Last Name'/>
              </a>
              <div class='sys_frm_msg' id='fnameinvalid'><?php if(isset($_SESSION['error'])){ if(isset($error['fname'])) {echo "<font color='#FF0000'>".$error['fname']."</font>";}}?></div>
              <div class='sys_frm_msg' id='lnameinvalid'><?php if(isset($_SESSION['error'])){ if(isset($error['lname'])) {echo "<font color='#FF0000'>".$error['lname']."</font>";}} ?></div>
               <a rel="tooltip_el" data-placement="left" data="Name should be of atleast 6 alphabets and  can be of maximum 32 alphabets" > 
              <input type='text' name='email' id='email' tabindex='6' placeholder='E-mail'/>
              </a>
              <div class='sys_frm_msg' id='emailinvalid'><?php if(isset($_SESSION['error'])){if(isset($error['email'])) {echo "<font color='#FF0000'>".$error['email']."</font>";}}?></div>
               <a rel="tooltip_el" data-placement="left" data="Name should be of atleast 6 alphabets and  can be of maximum 32 alphabets" > 
              <!--<input type='text' name='subject' tabindex='7' id='degree' placeholder='Specified Subject  / Degree Name'/>-->
              <select tabindex='7' name='subject' id='subject'>
              <option value='none'>Select a subject</option>
              <?php  $subject = $reg_db ->get_subject(); foreach($subject as $key){echo "<option class='other' value='".$key."'>".$key."</option>";}?>
              </select>
              </a>
              <div class='sys_frm_msg' id='subject_case'><?php  if(isset($_SESSION['error'])){if(isset($error['subject'])) {echo "<font color='#FF0000'>".$error['subject']."</font>";}} ?></div>
               <a rel="tooltip_el" data-placement="left" data="Name should be of atleast 6 alphabets and  can be of maximum 32 alphabets" > 
              <input type='password' name='password' id='password' tabindex='8' placeholder='Password'/>
              </a>
              <div class='sys_frm_msg' id='pass_strength'><?php if(isset($_SESSION['error'])){if(isset($error['password'])) {echo "<font color='#FF0000'>".$error['password']."</font>";}} ?></div>
               <a rel="tooltip_el" data-placement="left" data="Name should be of atleast 6 alphabets and  can be of maximum 32 alphabets" > 
              <input type='password' name='repassword' id='repassword' tabindex='9' placeholder='Re-Type Password'/>
              </a>
              <div class='sys_frm_msg' id='match_pass'><?php if(isset($_SESSION['error'])){if(isset($error['matchpass'])) {echo "<font color='#FF0000'>".$error['matchpass']."</font>";}} ?></div>
              Birthday:
              <select  id='date' name='date' tabindex='12'>
              <option value='date'>Date</option>
               <?php for($i=1;$i <= 31;$i++){echo "<option value='".$i."'>".$i."</option>";}?>
              </select>
                <select  id='month' name='month' tabindex='13' >
              <option value='month'>Month</option>
              <?php
				echo "<option value='1'>Jan</option>"  ;
				echo "<option value='2'>Feb</option>"  ;
				echo "<option value='3'>Mar</option>"  ;
				echo "<option value='4'>Apr</option>"  ;
				echo "<option value='5'>May</option>"  ;
				echo "<option value='6'>Jun</option>"  ;
				echo "<option value='7'>Jul</option>"  ;
				echo "<option value='8'>Aug</option>"  ;
				echo "<option value='9'>Sep</option>"  ;
				echo "<option value='10'>Oct</option>"  ;
				echo "<option value='11'>Nov</option>"  ;
				echo "<option value='12'>Dec</option>"  ;
			  ?>
              </select>
               <select id='year' name='year' tabindex='14' >
                 <option value='year'>Year</option>
                  <?php for($i=2008;$i >= 1905;$i--){echo "<option value='".$i."'>".$i."</option>";}?>
              </select>
              <div class='sys_frm_msg' id='date_validate' style='margin-top:5px;'><?php if(isset($_SESSION['error'])){if(isset($error['dob'])) {echo "<font color='#FF0000'>".$error['dob']."</font>";}}if(isset($_SESSION)){session_destroy();}?></div>
            
            <div class='data_use_pol'>
             <hr/>
              <label>By clicking Sign Up, you agree to our Terms and that you have read our <a href='#' tabindex='15'> Data Use Policy</a>.</label>
            </div><!--data_use_pol-->
              <input type='submit' value='Sign up' tabindex='16'/> 
          </form>
            
       </div><!--elec_sign_up-->
       
      <div class='elec_index_content'>
     <!--   <h1 style='margin-bottom:-10px;'>Features </h1>-->
     
            <div class='elec_index_text1'>
       <img src='elec_images/bookIcon.png' align='absmiddle' style="float: left; padding: 8px;border-right:thin solid #666;margin-right:10px;"/>
       <p>Access lectures and class notes of students of thousands of universities and schools around the world.</p>
       </div>
       
        <div class='elec_index_text2'>
       <img src='elec_images/chatIcon.png' align='center' style="float: left; padding: 8px;border-right:thin solid #666;margin-right:10px;" />
       <p>Interact with like-minded students and professors of different universities/schools and broaden your educational perspectives.</p>
       </div>
        <div class='elec_index_text3'>
       <img src='elec_images/testIcon.png' align='center' style="float: left; padding: 8px;border-right:thin solid #666;margin-right:10px;" />
       <p>Appear for tests conducted by university professors, designed specially for the users of Electura.</p>
       </div>
     
     
       </div>
  <!--     
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1431116930445766";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>   
<div class="fb-facepile" data-app-id="1431116930445766" data-href="https://www.facebook.com/electura?ref=hl" data-height="200" data-width="280" data-max-rows="1" data-colorscheme="light" data-size="medium" data-show-count="true" style='background-color:#FFF;padding:3px;border-radius:3px;margin-top:537px;opacity:0.8;position:absolute;left:1031px;width:284px;'></div>-->
       
              <div class='footpad'></div>
         </div><!--elec_index_mc_wrap-->

   </div><!--elec_index_mcontainer-->  
  <div class='elec_footer'><div class='elec_footer_wrap' style='font-family:Verdana, Geneva, sans-serif;font-size:14px;'>
    Home &nbsp;&nbsp;&nbsp; About us &nbsp;&nbsp;&nbsp; Contact us &nbsp;&nbsp;&nbsp; Developers
  </div></div>
  
    <script>
    $(document).ready(function(){
		$(".elec_index_text1").animate({'left':'35px'},100);
		$(".elec_index_text2").delay(600).animate({'left':'35px'},100);
		$(".elec_index_text3").delay(1200).animate({'left':'35px'},100);
		});
	
    </script>
<script src='elec_js/elec_index/signup.js'></script>
<script src='elec_js/elec_index/electura_tooltip.js'></script>
 </body>

</html>
