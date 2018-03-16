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

  			xmlhttp.open("GET","../populateQuestionsandOptions.php?a="+testID,true);
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
            alert(totalQuestions);
            
          }
        }

        xmlhttp.open("GET","../countQuestions.php?a="+testID,true);
      xmlhttp.send();

      
    }

    var compulsoryFlag=false;
    function checkQuestions() {

      for(var i=0;i<totalQuestions;i++) {
        var answerGroup = document.getElementsByName("answers"+i);
         for(var j=0;j<answerGroup.length;j++) {

            if(answerGroup[j].getAttribute('data-comp')=='yes') {
              if(answerGroup[j].checked==true) {
  
                var val=answerGroup[j].value;          
                selectedAnswers[z]=val;         
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
        
        
        return false;
      }
      

       

    }
    alert(selectedAnswers.length);
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

            document.getElementById('testStatus').innerHTML=xmlhttp.responseText;
            selectedAnswers="";
          }
        }

        xmlhttp.open("GET","../checkQuestions.php?a="+testID+"&b="+answersArray,true);
      xmlhttp.send();
  }

  </script>
  <body onload='populateQuestions(), countQuestions()'>
    <div id='allQuestions'></div>
    <input type='button' value='submit' onclick='return checkQuestions()' />
    <div id='testStatus'></div>
  </body>
  </html>