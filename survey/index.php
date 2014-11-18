<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include "header.php";

?>
<style>
#testbox{
background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.7) 100%), url(images/00.jpg) repeat 0 0, url(images/00.jpg) repeat 0 0;

background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.7) 100%), url(images/00.jpg) repeat 0 0;

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.7)), color-stop(100%,rgba(255,255,255,0.7))), url(images/00.jpg) repeat 0 0;

background: -webkit-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/00.jpg) repeat 0 0;

background: -o-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/00.jpg) repeat 0 0;

background: -ms-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/00.jpg) repeat 0 0;

background: linear-gradient(to bottom, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%), url(images/00.jpg) repeat 0 0;
}


</style>


<div id="testbox">


  
<form method='post' id="form00" name="form00" action='01.php' accept-charset='utf-8'>
<h1>Gör 2-minuterstestet</h1>
<p>...för att se om Marketing Automation är något för dig, och om du skulle tjäna på det.</p>
<h3>Vad är viktigast för dig:</h3>
<input type='radio' name='question' value='Vill att befintliga kunder köper mer' /> Vill att befintliga kunder köper mer<br /><br />
<input type='radio' name='question' value='Vill ha nya kunder' /> Vill ha nya kunder<br />


<input  id='btnValidate'  type='submit' value='Nästa&raquo;'/>


	
  </form>
 </div>
<script type="javascript">
function loadBG(){
     document.getElementById("testbox").style.backgroundImage="url(images/00.jpg)";
}
window.onload=loadBG();
</script>

<?php
// Should not include this on the FIRST iframe in order to not tell Otto and Google Analytics that this page is visited twice!
// include "$root/survey/test/footer.php";
include "footer.php";
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#form00").submit(function(){
        if( !$("input[name='question']:checked").val() ){
            alert("Please choose one option");
            return false;
        }
    });
});
</script>

