<?php
require('elec_core/elec_general.php');
require('elec_core/elec_user.php');
session_start();
$general = new elec_general();
if ($general->logged_in() === true){$user_id = base64_decode($_SESSION['u_id']);}
ob_start();
$general->logged_out_protect() ;
$user = new elec_user($user_id);

$con=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
  if(!$con) {
    echo "Unable to connect.";
  }
  
  else {
    echo "Connection Successful.";
  }
  
  $db=mysql_select_db(DB_NAME);
  if(!$db) {
    echo "Can't Select";
  }
  
  else {
    
echo "Selected.";
  }

?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8"/>
   <title>Electura.com(Dashboard)</title>
   <meta name='viewport' content='width=device-width,initial-scale=1.0'/>
   <link rel="shortcut icon" type="image/x-icon" href="images/elec50x50.png"/>
   <link href="elec_css/elec_dashboard.css" rel="stylesheet" type="text/css" media="screen, projection" />
   <link href='elec_css/icon.css' rel='stylesheet'> 
   <link rel="stylesheet" type="text/css" href="displayContent_pdf.css">
  <script src="elec_js/jquery.js"></script>
<style> 
.menubar_topnav
{
 float:right;margin-right:265px;font-size:12px;font-family:Verdana, Geneva, sans-serif;
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
	 
	 

/* ul li:last-child a:after {
	display: none;
}*/
.menubar_topnav ul{display:inline;}
.menubar_topnav ul:hover{cursor:pointer;}
.menubar_topnav ul>li{display:inline;margin:0 8px 0 8px;padding:3px;height:40px;}
.menubar_topnav ul>li:hover{cursor:pointer;}
.menubar_topnav ul>li:last-child{margin-left:16px;}

</style>
</head>
 
 <body>
 
    <div class='electura_main_container'> 
       <div class='electura_top1_navbar'>
         <div class='electura_top1_navbar_wrap'>
         <i class=" icon-tasks icon-white"></i> DashBoard 
            <div class='menubar_topnav'>
              <ul>
                   <li> <i class=" icon-globe icon-white"></i> Notification</li>
                   <li> <i class=" icon-wrench icon-white"></i> Edit Profile</li>
                   <li> <i class="  icon-user icon-white"></i> Profile</li>
                   <li> <a href='logout.php'><button class='logout'>Logout</button></a></li>
              </ul>
            </div>
         </div><!--electura_top1_navbar_wrap-->
       </div><!--electura_top1_navbar-->
       
       <div class='electura_top2_ebase'>

          <div class='electura_top2_ebase_wrap'>
             <div class='elect_logo_top2'></div><!--elect_logo_top2-->
              <div class='ebase_elec_sec'>
               
                    <form><input type='text' placeholder='Search your term' name='name' id='search_field'/></form>
              
              </div><!--ebase_elec_sec-->
              
              <div class='electura_usection' style='margin-right:275px;'>
                  <div>
                        <div class='usec_dp' style='background:url(<?php echo $user->get_propic();?>)center no-repeat #E0E0E0;background-size:100%;float:right;border-radius:2px;margin-left:10px;color:#62B0FF'></div>
                      <?php $email = base64_encode($user->get_emailid());
					  echo $user->get_name()."<br/>"; 
					  echo "(".$user->get_emailid().")";  ?>
                     
                 </div>
              </div><!--electura_usection-->
              
          </div> <!--electura_top2_ebase_wrap-->
       </div><!--electura_top2_ebase-->
       


      <div class='electura_main_container_wrap'>   
          

          <div class='elec_dash_menu'>
          
          
               
               <div class='main_menu_li'>
                  <div class="main_menu_title">  <i class='icon-upload'></i> Upload Lecture</div>
               </div><!--main_menu_li-->
              <div class='main_menu_li'>
                  <div class="main_menu_title"> <i class='icon-facetime-video'></i> Video Lecture</div>
               </div><!--main_menu_li-->
               <div class='main_menu_li'>
                  <div class="main_menu_title"> <i class='icon-headphones'></i> Audio Lecture</div>
               </div><!--main_menu_li-->
               <div class='main_menu_li-active'>
               
               <div class="main_menu_title"> <i class='icon-file icon-blue'></i>  University Lectures</div>
               
                      <div class='mmenu_sub_menu'>
                      <ul>
                      <li>Today's Lecture</li>
                      <li>Total Lectures</li>
                      <li>Extra Lectures</li>
                      </ul>
                      </div>
   
               
               </div><!-- main_menu_li-active-->
               <div class='main_menu_li'>
                  <div class="main_menu_title"> <i class='icon-lock'></i> Private Data</div>
               </div><!--main_menu_li-->
               <div class='main_menu_li'>
                  <div class="main_menu_title"> <i class='icon-upload'></i> Member Data</div>
               </div><!--main_menu_li-->
               
<?php $vr = $user->get_email_vrfs();
if($vr == 'no'){echo "<div class='eml_vrfy_note' style = 'color:white;background-color:#444;margin-top:10px;width:97%;border-radius:0 0 15px 0;padding-left:5px;font-family:verdana;font-size:13px;line-height:30px;'>Enter email verification code : <input type='text' id ='email_code' placeholder ='Enter your code' style='height:24px;width:95%;padding:0px;'/><button type='submit' id='email_code_submit' value='".$email."' style='background-color:#62B0FF;border:none;color:white;height:22px;border-radius:2px;margin-left:5px;'> Verify email address</button><div id='emerr'></div></div>";}

 ?>
              
          </div><!--  elec_dash_menu-->
          
          
          <div class='elect_content_display'>
          
           <h2> <font color='#09F'>Univesity </font>Lectures</h2>
           <hr style='width:900px;float:left;margin-top:-7px;margin-bottom:-1px;'/>



           <!--This is where we display all the uploaded files-->
          <div class="datagrid">
          <table><th colspan="2" style="padding:5px;">Document</th><th>Views</th>
    <?php


// pagination


  

    // pagination end





    
  $query2="select * from electura_files_pdf";
  $result2=mysql_query($query2);
  if(!$result2) {
    echo mysql_error();
  }

  
  while($row=mysql_fetch_array($result2)) {
    $fileName=$row['topicName'];  
    $flink=$row['pageLink'];
    $filesize=$row['fileSize'];
//    $udate=$row['uDate'];
    $uploaded=$row['user_id'];
  //  $prof=$row['Professor'];
    $thum=$row['thumbLoc'];
    //randomID, views, pages
    echo "<tr><td><a href=".$flink."><img src=".$thum." align='top'></img></a></td><td><a id='pad' href=".$flink.">".$fileName."</a><br/>".
    "<small>File Size: ".$filesize." | Uploaded By: ".$uploaded."</small></td><td>12334</td></tr>";
    
    
  }
  ?>
  
  </table>
</div>




          </div> <!--elect_content_display-->

      </div><!--electura_main_container_wrap-->

    </div><!--electura_main_container-->
    
       
 </body>
<script>
 $('#email_code_submit').click(function(){
	 var vcode = $('#email_code').val();
	 var email = $('#email_code_submit').val();
	// alert(uid);
	 $.ajax({
			  type:'POST',
			  url:'elec_functionalities/core_functionalities/verify_email.php',
			  data:'vcode='+vcode+'&email='+email,
			  success : function(data)
			  {
				if(data == 1)
				{$('.eml_vrfy_note').html('Email address verified <br/> Please refresh your browser.')}
				else
				{ 
				   if(vcode == '')
				   {$('#emerr').html("Please Enter the code first");}
				   else
				   {$('#emerr').html("Invalid verification code ");}
				//alert("error");
				}
			  } 
	        });
});
</script>
</html>