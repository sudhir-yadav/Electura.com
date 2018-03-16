  <br />
  <br />
<div id='commentsDB'></div>
  <div id='pdfComments'>
 		<br />
		<h2>Share Your Thoughts</h2>
		<textarea id='pdfCommentsText' cols='50' rows='5'></textarea>
		<br />
 			<input type="button" id='submitComment' value="Submit" onclick='storeComments()' />
 			<input type="button" id='likeFile' value='Like' />
 			<span id='commentStatus'></span>
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



 $('#likeFile').click(function(){
	 var fileID=document.getElementById('thisFileID').innerHTML;
	 var user_id='<?php echo $user_id ?>';
	// alert(uid);
	 $.ajax({
			  type:'POST',
			  url:'../elec_functionalities/core_functionalities/likeFile.php',
			  data:'fileID='+fileID+'&userID='+user_id,
			  success : function(data)
			  {
				if(data == 1)
				{$('#commentStatus').html('Thanks for appreciating this lecture.')}

				else if(data==0) {
					{$('#commentStatus').html('There was some problem. Please try again later')}
				}
				
			}
			  
	        });
});

/*
 	$('#submitComment').click(function(){
	 var comment = $('#pdfCommentsText').val();
	 var fileID=document.getElementById('thisFileID').innerHTML;
	 var user_id='<?php echo $user_id ?>';
	// alert(uid);
	 $.ajax({
			  type:'POST',
			  url:'../elec_functionalities/core_functionalities/storeComments.php',
			  data:'comment='+comment+'&fileID='+fileID+'&userID='+user_id,
			  success : function(data)
			  {
				if(data == 1)
				{$('#commentStatus').html('Comment successfully made.');}

				else if(data==0) {
					{$('#commentStatus').html('There was some problem in storing the comment.')}
				}
				else
				{ 
				   if(comment == '')
				   {$('#commentStatus').html("Please Enter a comment first");}
				  
				}
			}
			  
	        });
});
*/
 	
 $('#email_code_submit').click(function(){
	 var vcode = $('#email_code').val();
	 var email = $('#email_code_submit').val();
	// alert(uid);
	 $.ajax({
			  type:'POST',
			  url:'../elec_functionalities/core_functionalities/verify_email.php',
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
</script>
</html>