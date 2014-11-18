<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include "header.php";
if(isset($_POST['question'])){
    $_SESSION['result'][$question[2]] = $_POST['question'];
}

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


<form method='post' id="result" name="form_result" action='result.php' accept-charset='utf-8'>
<h1>Finished</h1>
<p>You can review your question or receive it via email</p>
<h3>Your option:</h3>
<input type='radio' name='opt' value='1' <?php echo isset($_POST['opt']) && $_POST['opt']==1 ? 'checked' : '' ?> /> Just show result in page<br /><br />
<input type='radio' name='opt' value='2' <?php echo isset($_POST['opt']) && $_POST['opt']==2 ? 'checked' : '' ?>/> Send result to email<br />
<input type="email" name='email' value='<?php echo isset($_POST['email'])  ? $_POST['email'] : '' ?>' placeholder='Enter your email here' >

<input  id='btnValidate'  type='submit' value='Nästa&raquo;'/>

  </form>
<?php if(isset($errors)):?>
    <p style="color: red"> <?php echo $errors?></p>
<?php endif?>

<?php if(isset($_POST['opt']) && $_POST['opt'] == 1 ):?>
<dl>
<?php foreach ($_SESSION['result'] as $k => $v):?>
<dt><?php echo $k?>:</dt>
<dl><?php echo $v?></dl>
<?php endforeach;?>
</dl>
<?php elseif (isset($_POST['opt']) && $_POST['opt'] == 2):?>
<?php 
    $email = $_POST['email'];
    $from = 'xxxx@abc.com'; // Change your email here
    $from_name = 'Admin'; // Set your name as you want
    $subject = "Your result";
    $body = "Your result is below. Thanks for your testing.\n\n";
    foreach ($_SESSION['result'] as $k => $v) {
        $body .= "$k : " . $v;
        $body .= "\n";
    }    
    smtpmailer($email, $from, $from_name, $subject, $body);
    if (!empty($error)) echo "<p>".$error."</p>";
?>
<?php endif?>
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
    if($("input[name='opt']:checked").val() == 2){
    	$("input[name='email']").show();
    } else {
    	$("input[name='email']").hide();
    }
    $("input[name='opt']").change(function(){
        if($(this).val() == '1'){
            $("input[name='email']").hide();
        } else {
        	$("input[name='email']").show();
        }
    });
	
    $("#result").submit(function(){
        if( !$("input[name='opt']:checked").val() ){
            alert("Please choose one option");
            return false;
        }
        opt = $("input[name='opt']:checked").val();
        
        if( opt == 2 ){
            if( !$("input[name='email']").val() ){
                alert("Enter your email please");
                return false;
            }
        }
        
    });
});
</script>

