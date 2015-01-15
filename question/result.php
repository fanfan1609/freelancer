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
    <h1>Fill in your e-mail address and we’ll send you your results</h1>
    <form method='post' id="result" name="form_result" action='http://www.sonician.info/otto/handlers/form_handler.php' accept-charset='utf-8'>
        Email : <input type="email" name='email' value='' placeholder='Enter your email here' >
        <p>
            Do you want us to schedule a time to follow-up with you personally? Leave your phone number: 
        </p>
        <input type="text" name="cellphone" value="" > (optional)
        <input type='hidden' name='seq' value='161'/>
        <input type='hidden' name='sender' value='1'/>
        <input type='hidden' name='a' value='sub' >
        <input type='hidden' name='ref' value='2mintest-en' />
        <?php 
        if(!empty($_SESSION['result'])) :
            foreach($_SESSION['result'] as $i => $result):?>
            <input type="hidden" name='custom_<?php echo $i ?>' value='<?php echo $result['answer'] ?>' >
        <?php
            endforeach;
        endif;?>
        <input  id='btnValidate'  type='submit' value='Send me result now'/>
    </form>
    <a href="show_result.php">No,thanks.Just show me my results</a> 
</div>

<?php
// Should not include this on the FIRST iframe in order to not tell Otto and Google Analytics that this page is visited twice!
// include "$root/survey/test/footer.php";
include "footer.php";
?>
<script type="text/javascript">
$(function(){
    $("#result").submit(function(){
        if( !$("input[name='email']").val() ){
            alert("Enter your email please");
            return false;
        }
    });
});
</script>