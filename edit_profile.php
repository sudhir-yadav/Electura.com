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
   <title>Edit profile</title>
   <meta name='viewport' content='width=device-width,initial-scale=1.0'/>
   <link rel="shortcut icon" type="image/x-icon" href="elec_favicon.ico"/>
   <link href="elec_css/elec_dashboard.css" rel="stylesheet" type="text/css" media="screen, projection" />
   <link href='elec_css/icon.css' rel='stylesheet'> 
  <script src="elec_js/jquery.js"></script>
<style> 
.menubar_topnav
{
 float:right;margin-right:100px;font-size:12px;font-family:Verdana, Geneva, sans-serif;
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
   -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.40);
  -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.40);
  -o-box-shadow:0 0 10px rgba(0, 0, 0, 0.40);
  -ms-box-shadow:0 0 10px rgba(0, 0, 0, 0.40);
   box-shadow:inset 0 0 10px #CCC; 
   -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  -ms-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;	
}

/*	 .electura_news
	 {
		 float:right;
		 overflow:hidden;
		 height:100%;
		 width:200px;
		 border:thin solid  #B5B5B5;
		 behavior: url(pie/PIE.htc);
		 		 background-color:#F4F4F4;
		
	 }*/
	 
	 

/* ul li:last-child a:after {
	display: none;
}*/
.menubar_topnav ul{display:inline;}
.menubar_topnav ul:hover{cursor:pointer;}
.menubar_topnav ul>li{display:inline;margin:0 8px 0 8px;padding:3px;height:40px;}
.menubar_topnav ul>li:hover{cursor:pointer;border-radius:2px;border:white solid 1px;}
.menubar_topnav ul>li:last-child{margin-left:16px;}
.menubar_topnav ul>li:last-child:hover{border:none;}

a{text-decoration:none;color:inherit;}

.notification_display:before{
   content:'';
   filter: alpha(opacity=80);
   border-left: 9px solid transparent;
   border-bottom: 9px solid #F3F3F3;
   border-right:9px solid transparent;
   margin-top:-14px;
   margin-left:120px;
   position:absolute;
	}
.notification_display
{
	display:none;
	background-color:#F3F3F3;
	padding:5px;
	top:1px;
	position:absolute;
	height:230px;
	opacity:0.9;
	left:830px;
	width:240px;
	border-radius:3px;
	z-index:100000;
  -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.40);
  -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.40);
  -o-box-shadow:0 0 10px rgba(0, 0, 0, 0.40);
  -ms-box-shadow:0 0 10px rgba(0, 0, 0, 0.40);
   box-shadow: 0 0 10px #CCC;
	
}

   .file-preview,.file-preview1 {
		//background:url(elec_profile_pic/male.png);
        border:1px solid #CCC;
		border-radius:3px;
        -moz-box-shadow:0 0 6px rgba(0, 0, 0, 0.5);
        -webkit-box-shadow:0 0 6px rgba(0, 0, 0, 0.5);
		box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
        display:inline-block;
        float:left;
        margin-right:1em;
        width:190px;
        height:190px;
		
        text-align:center;
		// -webkit-box-reflect: below 3px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(80%, transparent) , to(rgba(250, 250, 250, 0.3)));
    }
	
input[type~='file']
{
	background-color:#98C6EB;
	padding:8px;
	border-radius:3px;
	color:#13587D;
	font-family:Verdana, Geneva, sans-serif;
	font-size:13px;
	opacity:0;
	height:180px;
	width:180px;
	-moz-box-shadow:0 0 6px rgba(0, 0, 0, 0.3);
     -webkit-box-shadow:0 0 6px rgba(0, 0, 0, 0.3);
	box-shadow:inset 0 0 12px rgba(0, 0, 0, 0.3);
	//-webkit-box-reflect: below 3px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(80%, transparent) , to(rgba(250, 250, 250, 0.3)));
}

input[type~='file']:hover{cursor:pointer;}

select{
	min-width:20%;
   max-width:257px;
   height:32px;
   line-height:28px;
   padding:1px;
   border-radius:3px;
   border:thin solid #C5C5C5;
   font-size:12px; 
   margin-bottom:7px;
   color:#A6A6A6;
	}
	
	 label
 {
	 font-size:11px;
	 font-family:Verdana, Geneva, sans-serif;
 }
 
  input[type~=submit]
 {
	  width:99%;
	  margin-top:10px;
	 border:thin solid ;
	  border-color:transparent;
	  background-color:#33adff;
	  font-size:18px;
      color:#FFF;
	  border-radius:2px; 
	  padding:3px;
	  font-size:16px;
 }
 input[type~=submit]:hover
  {
	  cursor:pointer;
  }
  
  .edit_personal_details
  {
	  border:thin solid #EEE;
	  width:900px;
	  padding:15px;
	  border-radius:5px;
	  padding-top:20px;
	    -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.40);
  -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.40);
  -o-box-shadow:0 0 10px rgba(0, 0, 0, 0.40);
  -ms-box-shadow:0 0 10px rgba(0, 0, 0, 0.40);
   box-shadow: 0 0 10px #CCC;
  }
   .sys_frm_msg
 {
	font-size:10px;
	width:100%;
	font-family:Verdana, Geneva, sans-serif;
	margin:0px;	
	margin-top:-4px;
	margin-bottom:1px;
	margin-left:10px;
	float:left;
	overflow:hidden;
 }

</style>
</head>
 
 <body>
 
    <div class='electura_main_container'> 
       <div class='electura_top1_navbar' style="z-index:2">
         <div class='electura_top1_navbar_wrap'>
         <i class=" icon-tasks icon-white"></i> Edit Profile
            <div class='menubar_topnav'>
              <ul>
                   <li> <i class=" icon-globe icon-white"></i> Notification</li>
                   
                   <li> <i class=" icon-wrench icon-white"></i> Edit Profile</li>
                   <li> <a href='profile.php'><i class=" icon-user icon-white"></i> Profile</a></li>
                   <li> <a href='logout.php'><button class='logout'>Logout</button></a></li>
              </ul>
            </div>
         </div><!--electura_top1_navbar_wrap-->
       </div><!--electura_top1_navbar-->
       
       <div class='electura_top2_ebase'>

          <div class='electura_top2_ebase_wrap' style='z-index:20;'>
             <div class='elect_logo_top2'></div><!--elect_logo_top2-->
              <div class='ebase_elec_sec'>
               
                 <h1 style='margin-top:-4px;'><font color='#09F'> Edit </font> Profile </h1>
              
              </div><!--ebase_elec_sec-->
              
              <div class='notification_display'></div>
              
              <div class='electura_usection' style='margin-right:110px;'>
                  <div>
                        <div class='usec_dp' style='background:url(<?php echo $user->get_propic();?>)center no-repeat #E0E0E0;background-size:100%;float:right;border-radius:2px;margin-left:10px;color:#62B0FF'></div>
                      <?php $email = base64_encode($user->get_emailid());
					  echo $user->get_name()."<br/>"; 
					  echo "(".$user->get_emailid().")";  ?>
                     
                 </div>
              </div><!--electura_usection-->
              
          </div> <!--electura_top2_ebase_wrap-->
       </div><!--electura_top2_ebase-->
       


      <div class='electura_main_container_wrap' >   
          
              <div class='elec_dash_menu'>
                </div><!--  elec_dash_menu-->
          
          <div class='elect_content_display' >
          
         <div class='edit_personal_details'>
         <div style='width:931px;height:40px;background-color:#35C0D9;margin:0px;margin-left:-16px;margin-top:-20px;margin-bottom:23px;border-radius:5px 5px 0px 0px;color:#FFF;line-height:40px;'>
           <h2 style='margin-left:8px;'>Edit Personal details</h2>
         </div>
          
            <form name='edit_profile' id='edit_profile' method='post' enctype='multipart/form-data'  action="elec_middleware/edit_perdetail.php">
     <table width='800'>
     <?php if(isset($_SESSION['error'])){$error = $_SESSION['error'];} ?>
       <tbody>
          <tr>
              <td rowspan="4">
                 
		  <div class='file-preview ' style='background:url(<?php echo $user->get_propic();?>);background-size:100%;'></div>
          <div id='pchngt' style='position:absolute;background-color:#333;width:186px;text-align:center;color:white;padding:3px;border-radius:3px 3px 0 0 ;margin-bottom:3px;visibility:hidden;'>Edit Profile Picture</div>
                <input type='file' name='pro_pic' id='pro_pic' style='margin-left:-210px;' alt='' tabindex='1'/>
                 <div class='sys_frm_msg'><?php if(isset($error['propic'])){echo "<font color='#FF0000'>".$error['propic']."</font>";} ?></div>
              </td>
           <td style='text-align:left;width:550px;'>
                <input id='fname' name='fname' type='text' placeholder='Change First name' style='width:35%;float:left' tabindex="2"/>
                <input id='lname' name='lname' type='text' placeholder='Change Last name' style='width:35%;float:left;margin-left:3px;z-index:-2;' tabindex="3"/>
                <div class='sys_frm_msg' id='fnameinvalid' style='float:left;'><?php if(isset($error['fname'])){echo "<font color='#FF0000'>".$error['fname']."</font>";} ?></div>
                <div class='sys_frm_msg' id='lnameinvalid' style='float:left;margin-left:210px;margin-top:-17px;'><?php if(isset($error['lname'])){echo "<font color='#FF0000'>".$error['lname']."</font>";} ?></div>
                  
           </td> 
          
          </tr>
          <tr>
            <td style='text-align:left;width:550px;'>
                <input name='email' id='email' type='text' placeholder='Change email address' style='float:left;width:73%;' tabindex="4"/>
                <div class='sys_frm_msg' id='emailinvalid'><?php if(isset($error['email'])){echo "<font color='#FF0000'>".$error['email']."</font>";} ?></div>
           </td>
          </tr>
          <tr>
            <td style='text-align:left;width:550px;'>
                
              Birthday:
              <select  id='date' name='date' tabindex='5'>
              <option value=''>Date</option>
               <?php for($i=1;$i <= 31;$i++){echo "<option value='".$i."'>".$i."</option>";}?>
              </select>
                <select  id='month' name='month' tabindex='6' >
              <option value=''>Month</option>
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
               <select id='' name='year' tabindex='7' >
                 <option value='year'>Year</option>
                  <?php for($i=2008;$i >= 1905;$i--){echo "<option value='".$i."'>".$i."</option>";}?>
              </select>
              
                <div class='sys_frm_msg' id='date_validate' style='margin-top:5px;'><?php if(isset($error['dob'])){echo "<font color='#FF0000'>".$error['dob']."</font>";} ?></div>
           </td>
          </tr>
          <tr>
          <td><label>Enter your current password to make changes:</label><input type='password' placeholder='Enter your password' style='float:left;width:73%;' tabindex="8" name='frm1pass'/>
           <div class='sys_frm_msg'><?php if(isset($error['paschk'])){echo "<font color='#FF0000'>".$error['paschk']."</font>";} ?></div>
          </td></tr>
          <tr><td colspan="2"><input type='submit' value='Save Changes' style='float:right;width:20%;margin-right:140px;' tabindex="9"/>
         
          </td></tr>
        </tbody>
      
     </table>
     </form>
     </div><!-- edit personal details -->
     
     
     
       <div class='edit_personal_details' style='margin-top:40px;margin-bottom:60px;'>
         <div style='width:931px;height:40px;background-color:#35C0D9;margin:0px;margin-left:-16px;margin-top:-20px;margin-bottom:23px;border-radius:5px 5px 0px 0px;color:#FFF;line-height:40px;'>
           <h2 style='margin-left:8px;'>Edit Password</h2>
         </div>
          
            <form name='change_password' method='post' action='elec_middleware/edit_perdetail2.php'>
     <table width='800'>
       <tbody>
          <tr>
              <td rowspan="4" width="240">
                 
		  <div class='file-preview1' style="background:url('elec_images/password_def.png')center no-repeat;background-size:100%;"></div>
                      
              </td>
          <td>
         <input type='password' placeholder='Enter your current password' style='float:left;width:73%;' name='frm2pass'/>
		 <div class='sys_frm_msg'><?php if(isset($error['paschk2'])){echo "<font color='#FF0000'>".$error['paschk2']."</font>";} ?></div>
         </td>
           </tr>
           <tr><td>
           <input type='password' id='password' placeholder='Enter your new password' style='float:left;width:35%;' name='pass_new'/>
           <input type='password'  id='repassword' placeholder='Retype your new password' style='float:left;width:35%;margin-left:4px;' name='pass_new_conf'/>  
            <div class='sys_frm_msg' id='pass_strength' style='width:35%;float:left'><?php if(isset($error['password'])){echo "<font color='#FF0000'>".$error['password']."</font>";} ?></div>
            <div class='sys_frm_msg' id='match_pass' style='width:35%;float:left;margin-left:3px;z-index:-2;'><?php if(isset($error['matchpass'])){echo "<font color='#FF0000'>".$error['matchpass']."</font>";} ?></div> </td></tr>
           <tr>
          <td colspan="2"><input type='submit' value='Change Password' style='float:right;width:30%;margin-right:140px;'/></td>
          <?php if(isset($_SESSION['changes_1'])){echo "<font color='#FF0000'>".$_SESSION['changes_1']."</font>";unset($_SESSION['changes_1']);} ?>
          </tr>
        </tbody>
     </table>
      <?php if(isset($_SESSION['error'])){unset($_SESSION['error']);} ?>
     </form>
     </div><!-- edit personal details -->
   
          </div> <!--elect_content_display-->

      </div><!--electura_main_container_wrap-->

    </div><!--electura_main_container-->
    
<!--       <div class='chatndnotify'>
         <iframe class='electura_news'>
         </iframe>
         <iframe class='electura_chat'></iframe>
      </div> chatndnotify-->

 </body>
<script>


$("#pro_pic").hover(function(){
	$("#pchngt").css('visibility','visible');
	
	});
	
$("#pro_pic").mouseout(function(){
	$("#pchngt").css('visibility','hidden');
	
	});



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
<script src='elec_js/elec_index/signup.js'></script>

</html>