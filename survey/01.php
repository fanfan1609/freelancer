<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include "header.php";
if(isset($_POST['question'])){
    $_SESSION['result'][$question[0]] = $_POST['question'];
}



?>
<style>
#testbox{
background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.7) 100%), url(images/01.jpg) repeat 0 0, url(images/01.jpg) repeat 0 0;

background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.7) 100%), url(images/01.jpg) repeat 0 0;

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.7)), color-stop(100%,rgba(255,255,255,0.7))), url(images/01.jpg) repeat 0 0;

background: -webkit-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/01.jpg) repeat 0 0;

background: -o-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/01.jpg) repeat 0 0;

background: -ms-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/01.jpg) repeat 0 0;

background: linear-gradient(to bottom, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/01.jpg) repeat 0 0;
}


</style>


<div id="testbox">



  
<form method='post' id="form01" name="form01" action='02.php' accept-charset='utf-8'>
<h1>Vad är viktigast</h1>

<input type='radio' name='question' value='Få ut mer leads av on-line aktiviteter' /> Få ut mer leads av on-line aktiviteter<br /><br />
<input type='radio' name='question' value='Kvalificera fler av befintliga leads/kontatker till sälj och säljkvalificerade leads' /> Kvalificera fler av befintliga leads/kontatker till sälj och säljkvalificerade leads?<br />

<br />
<input type='radio' name='question' value='Överhuvudtaget få struktur på kontakter, säljprocess, marknadsföring, nyhetsbrevsutskick mm' /> Överhuvudtaget få struktur på kontakter, säljprocess, marknadsföring, nyhetsbrevsutskick mm<br />
<br />
<input type='radio' name='question' value='Något annat'/> Något annat<br />
<br />





<input  id='btnValidate'  type='submit' value='Nästa&raquo;'/>


	
  </form>
  
<script type="javascript">
function loadBG(){
     document.getElementById("testbox").style.backgroundImage="url(images/01.jpg)";
}
window.onload=loadBG();
</script>

</div>
<?php
//include footer on following in order to get Analytics and Tracking data as a new page
//include "$root/survey/test/footer.php";
include "footer.php";
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#form01").submit(function(){
        if( !$("input[name='question']:checked").val() ){
            alert("Please choose one option");
            return false;
        }
    });
});
</script>
