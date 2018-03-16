<?php
require('elec_core/elec_general.php');
require('elec_core/elec_user.php');
include('elec_core/pagination.php');
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
  
  
  $db=mysql_select_db(DB_NAME);
  if(!$db) {
    echo "Can't Select";
  }

?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8"/>
   <title>Electura.com(Dashboard)</title>
   <meta name='viewport' content='width=device-width,initial-scale=1.0'/>
   <link rel="shortcut icon" type="image/x-icon" href="elec_favicon.ico"/>
   <link href="elec_css/elec_dashboard.css" rel="stylesheet" type="text/css" media="screen, projection" />
   <link href='elec_css/icon.css' rel='stylesheet'> 
    <link rel="stylesheet" type="text/css" href="elec_css/displayContent_pdf.css">
   <link rel="stylesheet" type="text/css" href="elec_css/pagination.css">
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




.editBtn {
  -moz-box-shadow:inset 0px 1px 0px 0px #f5978e;
  -webkit-box-shadow:inset 0px 1px 0px 0px #f5978e;
  box-shadow:inset 0px 1px 0px 0px #f5978e;
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f24537), color-stop(1, #c62d1f) );
  background:-moz-linear-gradient( center top, #f24537 5%, #c62d1f 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24537', endColorstr='#c62d1f');
  background-color:#f24537;
  -webkit-border-top-left-radius:6px;
  -moz-border-radius-topleft:6px;
  border-top-left-radius:6px;
  -webkit-border-top-right-radius:6px;
  -moz-border-radius-topright:6px;
  border-top-right-radius:6px;
  -webkit-border-bottom-right-radius:6px;
  -moz-border-radius-bottomright:6px;
  border-bottom-right-radius:6px;
  -webkit-border-bottom-left-radius:6px;
  -moz-border-radius-bottomleft:6px;
  border-bottom-left-radius:6px;
  text-indent:0px;
  display:inline-block;
  color:#ffffff;
  font-family:Arial;
  font-size:12px;
  font-weight:bold;
  font-style:normal;
  height:29px;
  line-height:20px;
  width:89px;
  text-decoration:none;
  text-align:center;
  text-shadow:1px 1px 0px #810e05;
}
.editBtn:hover {
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24537) );
  background:-moz-linear-gradient( center top, #c62d1f 5%, #f24537 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24537');
  background-color:#c62d1f;
}.editBtn:active {
  position:relative;
  top:1px;
}

/*   .electura_news
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
                   <li> <a href='edit_profile.php'><i class=" icon-wrench icon-white"></i> Edit Profile</a></li>
                   <li> <a href='profile.php'><i class=" icon-user icon-white"></i> Profile</a></li>
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
       


      <div class='electura_main_container_wrap'>   
          

          <div class='elec_dash_menu'>
          
          
               <input type="button" value="Create Content" onclick="location.href = 'createContent.php'" class='createContent' />
               <div class='main_menu_li'>

                  <div class="main_menu_title">  <i class='icon-book'></i> My Subject</div>
               </div><!--main_menu_li-->
            <div class='main_menu_li-active'>
                  <div class="main_menu_title" id='mynotes'> <i class='icon-th'></i> My Notes</div>
                     <div class='mmenu_sub_menu' id='mmenu_sub_menu2'>
                      <ul>
                      <li><a href='myFiles_pdf.php'>PDF</a></li>
                      <li><a href='myFiles_image.php'>Image</a></li>
                      <li><a href='myFiles_video.php'>Video<a/></li>
                      </ul>
                      </div>

               </div><!--main_menu_li-->
               <div class='main_menu_li-active' id='allnotes'>
                  <div class="main_menu_title"> <i class='icon-th'></i> All Notes</div>
                  <div class='mmenu_sub_menu' id='mmenu_sub_menu3'>
                      <ul>
                       <li><a href='displayContent_pdf.php'>PDF</a></li>
                      <li><a href='displayContent_image.php'>Image</a></li>
                      <li><a href='displayContent_video.php'>Video</a></li>
                      </ul>
                      </div>
                  
            
               </div><!--main_menu_li-->
               <div class='main_menu_li-active' id='tests'>
                  <div class="main_menu_title"> <i class='icon-file icon-blue'></i>  Tests/Quizes</div>
                  <div class='mmenu_sub_menu' id='mmenu_sub_menu4'>
                      <ul>
                       <li><a href='createTest.php'>Create Test/Quiz</a></li>
                      <li><a href='myFiles_tests.php'>My Tests/Quizes</a></li>
                      <li><a href='displayContent_tests.php'>All Tests/Quizes</a></li>
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
          
           <h2> <font color='#09F'>Tests </font>& Quiz</h2>
           <hr style='width:900px;float:left;margin-top:-7px;margin-bottom:-1px;'/>
            <div class="datagrid">
          <table><th colspan="2" style="padding:5px;">Document</th><th>Subject</th><th>Operations</th>
    <?php


// pagination


  

    // pagination end


$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$per_page =5;


$query = "select * from electura_testsmain WHERE user_id='$user_id'";
$result = mysql_query($query);
$totalCount = mysql_num_rows($result);

$pagination = new Pagination($page, $per_page, $totalCount);

$pagQuery="select * from electura_testsmain WHERE user_id='$user_id' ORDER BY testDate DESC, testTime DESC LIMIT {$per_page} OFFSET {$pagination->offset()} ";
$pagResult=mysql_query($pagQuery);

    
  $query2="select * from electura_files_pdf";
  $result2=mysql_query($query2);
  if(!$result2) {
    echo mysql_error();
  }

  
 while($row=mysql_fetch_array($pagResult)) {
    $fileName=$row['testTopic'];  
    $flink=$row['pageLink'];
    $testDate=$row['testDate'];
    $editLink=$row['editLink'];

    $topicSubject=$row['testSubject'];

    // To get number of likes

    
//    $udate=$row['uDate'];
    $uploaded=$row['user_id'];
    $nameQuery="select user_name from electura_user WHERE user_id='$uploaded'";
    $nameQueryExec=mysql_query($nameQuery);
    while($res=mysql_fetch_array($nameQueryExec)) {
      $uploaded=$res['user_name'];
    }

  //  $prof=$row['Professor'];
  
    //randomID, views, pages
    echo "<tr><td><a href=".$flink."></a></td><td><a id='pad' href=".$flink.">".$fileName."</a><br/>".
    "<small><b>Created By:</b> ".$uploaded."</small></td><td width='100px'>".$topicSubject."</td><td align='center'><input type='button' class='editBtn' onclick=\"window.open('".$editLink."','_self')\" value='Edit Test' class='viewFiles' /></td></tr>";
    
    
  }
  ?>
  
  
  </table>
  <br />
    <div id='pagBox'>
    <ul id="paginationBox">
    <?php
      if($pagination->total_pages()>1) {

        if($pagination->has_previous_page()) {
          echo "<li class='previous'><a href=\"myFiles_tests.php?page=";
          echo $pagination->previous_page();
          echo "\">&laquo; Previous</a></li>";
        }

        else {
          echo "<li class='previous-off'>";

          
          echo "&laquo; Previous ";

          echo "</li>";
        }

         for($i=1;$i<=$pagination->total_pages();$i++) {
          if($i==$page){
            echo "<li class='active'>{$i}</li>";
          }
          else {
          echo " <li><a href=\"myFiles_tests.php?page={$i}\">{$i}</a> </li>";
        }

        }

        if($pagination->has_next_page()) {
          echo "<li class='next'><a href=\"myFiles_tests.php?page=";
          echo $pagination->next_page();
          echo "\">Next &raquo;</a></li> ";
        }

        else {
         
          echo "<li class='next-off'>";

          
          echo "Next &raquo;";

          echo "</li>";
        
        }

       

        
      }
    ?>
  </ul>
  </div>
</div>

          
          
          </div> <!--elect_content_display-->

      </div><!--electura_main_container_wrap-->

    </div><!--electura_main_container-->
    


 </body>
<script>

$('#tests').click(function() {
  $('#mmenu_sub_menu4').toggle();
   $('#mmenu_sub_menu2').hide();
  $('#mmenu_sub_menu3').hide();
  
});

$(document).ready(function() {
  $('#mmenu_sub_menu2').hide();
  $('#mmenu_sub_menu3').hide();
  $('#mmenu_sub_menu4').hide();
});

$('#mynotes').click(function() {
  $('#mmenu_sub_menu2').toggle();
  $('#mmenu_sub_menu3').hide();
  $('#mmenu_sub_menu4').hide();
});

$('#allnotes').click(function() {
  
  $('#mmenu_sub_menu3').toggle();
  $('#mmenu_sub_menu2').hide();
  $('#mmenu_sub_menu4').hide();
});



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