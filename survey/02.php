<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include "header.php";
if(isset($_POST['question'])){
    $_SESSION['result'][$question[1]] = $_POST['question'];
}


?>
<style>
#testbox{
background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.7) 100%), url(images/02.jpg) repeat 0 0, url(images/02.jpg) repeat 0 0;

background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.7) 100%), url(images/02.jpg) repeat 0 0;

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.7)), color-stop(100%,rgba(255,255,255,0.7))), url(images/02.jpg) repeat 0 0;

background: -webkit-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/02.jpg) repeat 0 0;

background: -o-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/02.jpg) repeat 0 0;

background: -ms-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/02.jpg) repeat 0 0;

background: linear-gradient(to bottom, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/02.jpg) repeat 0 0;
}


</style>


<div id="testbox">



  
<form method='post' id="form02" name="form02" action='result.php' accept-charset='utf-8'>
<h3>Sortera vad som är viktigast för dig</h3>
<p>Plats: 
	<select name="question" id="question">
		<option value="">
			Välj...
		</option>
		<option value="Få reda på vilka av dina webbesökare som inte konverteras till leads/kunder direkt">
			A. Få reda på vilka av dina webbesökare som inte konverteras till leads/kunder direkt
		</option>
		<option value="Få bättre koll på kunders besluts/köpprocess ser ut så du kan mappa din säljprocess mot den">
			B. Få bättre koll på kunders besluts/köpprocess ser ut så du kan mappa din säljprocess mot den
		</option>
		<option value="Hur du får fler webbesökare till lägsta möjliga kostnad">
			C. Hur du får fler webbesökare till lägsta möjliga kostnad
		</option>
		<option value="Hur du kan ta fler leads-skapande marknadsinitiativ, trots ont om tid &amp; resurser">
			D. Hur du kan ta fler leads-skapande marknadsinitiativ, trots ont om tid &amp; resurser
		</option>	
	</select>	
</p>

<input  id='btnValidate'  type='submit' value='Nästa&raquo;'/>


	
  </form>
</div>
<script type="javascript">
function loadBG(){
     document.getElementById("testbox").style.backgroundImage="url(images/02.jpg)";
}
window.onload=loadBG();
</script>

<?php
//include footer on following in order to get Analytics and Tracking data as a new page
//include "$root/survey/test/footer.php";
include "footer.php";
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#form02").submit(function(){
	    if( $("#question").val() == "" ){
	        alert("Please choose one option");
	        return false;
		}
	});
});
</script>

