var totalQuestions=0;
var selectedAnswers = new Array();
var z=0;

function populateQuestions() {

      
      var xmlhttp;

      if (window.XMLHttpRequest) {
          xmlhttp=new XMLHttpRequest();
        }
      else {
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("allQuestions").innerHTML=xmlhttp.responseText;
            

          }
        }

        xmlhttp.open("GET","../elec_functionalities/core_functionalities/populateQuestionsandOptions.php?a="+testID,true);
      xmlhttp.send();

      
    }

    function countQuestions() {

      
      var xmlhttp;

      if (window.XMLHttpRequest) {
          xmlhttp=new XMLHttpRequest();
        }
      else {
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            totalQuestions=xmlhttp.responseText;
           
            
          }
        }

        xmlhttp.open("GET","../elec_functionalities/core_functionalities/countQuestions.php?a="+testID,true);
      xmlhttp.send();

      
    }

    var compulsoryFlag=false;
    function checkQuestions() {
    selectedAnswers.length=0;
      for(var i=0;i<totalQuestions;i++) {
        var answerGroup = document.getElementsByName("answers"+i);
         for(var j=0;j<answerGroup.length;j++) {

            if(answerGroup[j].getAttribute('data-comp')=='yes') {
              if(answerGroup[j].checked==true) {
  
                var val=answerGroup[j].value;          
                selectedAnswers[i]=val;         
                z++;
                compulsoryFlag=true;
                break;
          }    
          else {
          
          compulsoryFlag=false;
        } 
        }
          
          if(answerGroup[j].getAttribute('data-comp')=='no') {
              if(answerGroup[j].checked==true) {
  
                var val=answerGroup[j].value;          
                selectedAnswers[i]=val;         
                z++;
                compulsoryFlag=true;
                continue;
          }
          else {

          compulsoryFlag=true;

        }

        
        
        }
        }
        if(compulsoryFlag==false) {
        alert("Please answer all the compulsory Questions.");
        
        selectedAnswers.length=0;
        return false;
      }
      

       

    }

    var answersArray=JSON.stringify(selectedAnswers);

    var xmlhttp;

      if (window.XMLHttpRequest) {
          xmlhttp=new XMLHttpRequest();
        }
      else {
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            var finalScore=xmlhttp.responseText;
            document.getElementById('testResult').style.display='block';
            document.getElementById('testResult').innerHTML="<h2>Congratulations, you have successfully completed the test.</h2><h3>Below is how you performed on the test:</h3>You scored: " + finalScore + "%";
          }
        }

        xmlhttp.open("GET","../elec_functionalities/core_functionalities/checkQuestions.php?a="+testID+"&b="+answersArray,true);
      xmlhttp.send();
  }
	</script>
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

#testResult {
  border: 1px #888888 dashed;
  padding: 15px;
  margin-left: 60px;
  font-family: Arial,Helvetica,sans-serif;
  font-size: 12px;

background-color: #fafafa;
}


.submitTest {
  -moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
  -webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
  box-shadow:inset 0px 1px 0px 0px #c1ed9c;
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
  background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9dce2c', endColorstr='#8cb82b');
  background-color:#9dce2c;
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
  text-indent:0;
  border:1px solid #83c41a;
  display:inline-block;
  color:#ffffff;
  font-family:Arial;
  font-size:14px;
  font-weight:bold;
  font-style:normal;
  height:36px;
  line-height:36px;
  width:95px;
  text-decoration:none;
  text-align:center;
  text-shadow:1px 1px 0px #689324;
}
.submitTest:hover {
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
  background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8cb82b', endColorstr='#9dce2c');
  background-color:#8cb82b;
}.submitTest:active {
  position:relative;
  top:1px;
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

</style>
</head>
 
 <body onload='populateQuestions(), countQuestions()'>
 
    <div class='electura_main_container'> 
       <div class='electura_top1_navbar'>
         <div class='electura_top1_navbar_wrap'>
         <i class=" icon-tasks icon-white"></i> DashBoard 
            <div class='menubar_topnav'>
              <ul>
                   <li> <i class=" icon-globe icon-white"></i> Notification</li>
                   <li> <a href='../edit_profile.php'><i class=" icon-wrench icon-white"></i> Edit Profile</a></li>
                   <li> <a href='../profile.php'><i class=" icon-user icon-white"></i> Profile</a></li>
                   <li> <a href='../logout.php'><button class='logout'>Logout</button></a></li>
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
                     <li><a href='../myFiles_pdf.php'>PDF</a></li>
                      <li><a href='../myFiles_image.php'>Image</a></li>
                      <li><a href='../myFiles_video.php'>Video<a/></li>
                      </ul>
                      </div>

               </div><!--main_menu_li-->
               <div class='main_menu_li-active' id='allnotes'>
                  <div class="main_menu_title"> <i class='icon-th'></i> All Notes</div>
                  <div class='mmenu_sub_menu' id='mmenu_sub_menu3'>
                      <ul>
                       <li><a href='../displayContent_pdf.php'>PDF</a></li>
                      <li><a href='../displayContent_image.php'>Image</a></li>
                      <li><a href='../displayContent_video.php'>Video</a></li>
                      </ul>
                      </div>
                  
            
               </div><!--main_menu_li-->
               <div class='main_menu_li-active' id='tests'>
                  <div class="main_menu_title"> <i class='icon-file icon-blue'></i>  Tests/Quizes</div>
                  <div class='mmenu_sub_menu' id='mmenu_sub_menu4'>
                      <ul>
                       <li><a href='../createTest.php'>Create Test/Quiz</a></li>
                      <li><a href='../myFiles_tests.php'>My Tests/Quizes</a></li>
                      <li><a href='../displayContent_tests.php'>All Tests/Quizes</a></li>
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
          
           <h2> <font color='#09F'>Test </font>& Quiz</h2>
           <hr style='width:900px;float:left;margin-top:-7px;margin-bottom:-1px;'/>
           <div id='allQuestions'></div>
      
    <div id='testStatus'></div>
	<input type='button' value='submit' class='submitTest' onclick='return checkQuestions()' />
  <br />
  <br />
  <div id='testResult' style="display: none;"></div>
          
          
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