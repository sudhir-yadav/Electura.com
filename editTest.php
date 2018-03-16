<?php
	session_start();

	$testTopic=$_POST['testTopic'];
	echo $testTopic;
	$_SESSION['testTopic']=$testTopic;
	$testSubject=$_POST['subjects'];

	echo $_SESSION['testTopic'];

	$con=mysql_connect('localhost','root','');
	if(!$con) {
		echo "Can't connect to server.";
	}

	$db=mysql_select_db('electura');
	if(!$db) {
		echo "Can't connect to the database";
	}

	$query="insert into testsmain(profID, testTopic, testSubject) values('1','$testTopic','$testSubject')";
$res=mysql_query($query);
if(!$res) {
	echo "Can't execute Query";
	echo mysql_error();
}

	$query2="select testID from testsmain where testTopic='$testTopic'";
	$results=mysql_query($query2);
	if(!$results) {
		echo mysql_error();
	}

	while($result = mysql_fetch_array($results)) {
		foreach($result as $row) {
		$testID=$row;

	}
	}


?>

<html>
<head>
	<title></title>
	<link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="testQuestionStyle.css">
	<script>

		window.onload = function() {
			setInterval(populateQuestions(),1000);
		}
		function callAgain() {

		}

		function init() {

			populateQuestions();
			
			
		}

		function populateQuestions() {

			var testID='<?php echo $testID; ?>'
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

  			xmlhttp.open("GET","populateQuestions.php?a="+testID,true);
			xmlhttp.send();

			
		}

		function deleteQuestion(questionID) {
			var xmlhttp;

			var qID=questionID;

			if (window.XMLHttpRequest) {
  				xmlhttp=new XMLHttpRequest();
  			}
			else {
  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}

  			xmlhttp.onreadystatechange=function() {
  				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    				populateQuestions();

    			}
  			}

  			xmlhttp.open("GET","deleteQuestion.php?a="+qID,true);
			xmlhttp.send();

			
		
		}

		function addQuestions() {

			var testTopic;
				testTopic='<?php echo $testTopic; ?>'; 

			var questionStatus='no';
			
			if(document.getElementById('squaredOne').checked) {
				questionStatus='yes';
			}

			var credits=document.getElementById('creditField').value;

			var xmlhttp;
			var question = document.getElementById('question').value;

			var choiceA = document.getElementById('choiceA').value;
			var choiceB = document.getElementById('choiceB').value;
			var choiceC = document.getElementById('choiceC').value;
			var choiceD = document.getElementById('choiceD').value;

			var correctAnswer = document.getElementById('correctAnswer').value;

			if (window.XMLHttpRequest) {
  				xmlhttp=new XMLHttpRequest();
  			}
			else {
  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}

  			xmlhttp.onreadystatechange=function() {
  				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    				document.getElementById("statusQuestion").innerHTML=xmlhttp.responseText;
    				populateQuestions();
    			}
  			}

  			xmlhttp.open("GET","addQuestion.php?que="+question+"&a="+choiceA+"&b="+choiceB+"&c="+choiceC+"&d="+choiceD+"&ca="+correctAnswer+"&testTop="+testTopic+"&comp="+questionStatus+"&cr="+credits,true);
			xmlhttp.send();
		}
	</script>
<link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
</head>
<body>
	<h2>Edit Test</h2>


<fieldset>
			<legend>
				Add Question
			</legend>

			
	<div id='addQuestion'>
	<table width="100%">

		
		
		<tr><td colspan='2'><input type='text' class='questions' id='question' placeholder='Enter Question' /></td></tr>

		<tr><td><input type='text' class='answers' id='choiceA' placeholder='Enter Answer Choice A' /></td>
		<td><input type='text' class='answers' id='choiceB' placeholder='Enter Answer Choice B' /></td></tr>
		<tr><td><input type='text' class='answers' id='choiceC' placeholder='Enter Answer Choice C' /></td>
		<td><input type='text' class='answers' id='choiceD' placeholder='Enter Answer Choice D' /></td></tr>
	
		<tr><td colspan='2'><input type='text' class='correctAnswer' id='correctAnswer' placeholder='Enter Correct Answer' /></td></tr>
		<tr><td>Compulsory Question:</td><td>
			<span class="squaredOne">
	<input type="checkbox" value="None" id="squaredOne" name="check" />
	<label for="squaredOne"></label>
</span>
		</td></tr>
		<tr><td>Credits: </td><td><input type='text' id='creditField' /> (points)</td></tr>

	
</table>

<input type='button' value='Add Question' class='addQuestionBtn' onclick='addQuestions()' />
<input type='reset' value='Reset' class='resetBtn' </form>

	</fieldset>
<span id='statusQuestion'></span>
	<div id='allQuestions'>
	</div>
	




</body>
	</html>