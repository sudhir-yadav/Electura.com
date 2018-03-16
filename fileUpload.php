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
   <title>Electura.com(Dashboard)</title>
   <meta name='viewport' content='width=device-width,initial-scale=1.0'/>
   <link rel="shortcut icon" type="image/x-icon" href="images/elec50x50.png"/>
   <link href="elec_css/elec_dashboard.css" rel="stylesheet" type="text/css" media="screen, projection" />
   <link href='elec_css/icon.css' rel='stylesheet'> 
  <script src="js/jquery.js"></script>
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

/* ul li:last-child a:after {
	display: none;
}*/
.menubar_topnav ul{display:inline;}
.menubar_topnav ul:hover{cursor:pointer;}
.menubar_topnav ul>li{display:inline;margin:0 8px 0 8px;padding:3px;height:40px;}
.menubar_topnav ul>li:hover{cursor:pointer;}
.menubar_topnav ul>li:last-child{margin-left:16px;}
.menubar_topnav ul>li:last-child:hover{}


</style>

<script>
  function populateSubjects() {

      var xmlhttp;

      if (window.XMLHttpRequest) {
          xmlhttp=new XMLHttpRequest();
        }
      else {
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("subjectSelect").innerHTML+=xmlhttp.responseText;

          }
        }

        xmlhttp.open("GET","populateSubjects.php",true);
      xmlhttp.send();

      
    }

    function validateUpload() {
      if(document.getElementById('lectureTitle').value=='') {
        document.getElementById('errorBox').innerHTML="<li>Title field cannot be empty.</li>";
        return false;
      }
        if(document.getElementById('lectureTitle').value.length<5) {
          document.getElementById('errorBox').innerHTML="<li>Title field can't be less than 5 characters.</li>";
          return false;
        }

        if(document.getElementById('pdf').checked | document.getElementById('image').checked | document.getElementById('video').checked) {
          return true;
        }

        else {
          document.getElementById('errorBox').innerHTML="<li>Please select the file type.</li>";
          return false;
        }
        
    }
</script>
</head>
 
 <body onload='populateSubjects()'>
 
    <div class='electura_main_container'>
    
       <div class='electura_top1_navbar'>
         <div class='electura_top1_navbar_wrap'>
          DashBoard 
            <div class='menubar_topnav'>
              <ul>
                   <li> <i class=" icon-globe icon-white"></i> Notification</li>
                   <li> <i class=" icon-wrench icon-white"></i> Setting</li>
                   <li> <i class="  icon-user icon-white"></i> Profile</li>
                   <li> <a href='logout.php'><button class='logout'>Logout</button></a></li>
              </ul>
            </div>
         </div><!--electura_top1_navbar_wrap-->
       </div><!--electura_top1_navbar-->
       
       <div class='electura_top2_ebase'>
       <div class='elect_logo_top2'></div><!--elect_logo_top2-->
          <div class='electura_top2_ebase_wrap'>
          
              <div class='ebase_elec_sec'>
               
                    <form><input type='text' placeholder='Search your term' name='name' id='search_field'/></form>
              
              </div><!--ebase_elec_sec-->
              
              <div class='electura_usection'>
           
                      <?php echo $user->get_name();  ?>
                      <?php echo "(".$user->get_university().")";  ?>
                     <div class='usec_dp' style='background:url(<?php echo $user->get_propic();  ?>)center no-repeat;background-size:100%;'></div>
                
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
              
          </div><!--  elec_dash_menu-->
          
          
          <div class='elect_content_display'>
          
           <h2> <font color='#09F'>Univesity </font>Lectures</h2>
           <hr style='width:900px;float:left;margin-top:-7px;margin-bottom:-1px;'/>
           <form name='uploadFileForm' method='POST' id='uploadFileForm' onsubmit=' return validateUpload()' action='fileUpload_step2.php'>
             <input type='text' name='lectureTitle' id='lectureTitle' />
             <select name='subjectSelect' id='subjectSelect'><select>
             <input type='checkbox' name='lectureType' value='pdf' id='pdf' />PDF
             <input type='checkbox' name='lectureType' value='image' id='image' />Image
             <input type='checkbox' name='lectureType' value='video' id='video' />Video

             <input type='submit' value='Submit' />
             <input type='reset' value='Reset' />
          </form>

          <div id='errorBox'>
          </div>
          
          
          </div> <!--elect_content_display-->

      </div><!--electura_main_container_wrap-->

    </div><!--electura_main_container-->
    
       <div class='chatndnotify'>
         <iframe class='electura_news'>
         </iframe>
         <!--<iframe class='electura_chat'></iframe>-->
      </div> <!--chatndnotify-->
    
    
 </body>
 


</html>