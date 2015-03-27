<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include "header.php";
?>
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/colorbox.css">
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

#cover {
    display:none; 
    /*background: grey; */
    position: absolute;
    height: 100%;
    width: 100%;
    top : 50%;
    left: 50%;
    z-index: 100;
    opacity : 0.5
}

#img-load { 
  position:absolute; 
}

#show_result {
    position:absolute; bottom:10;left:10;
    font-size: 12px
}
</style>
<div id="cover"><i id="img-load" class="fa fa-spinner fa-spin fa-5x"></i></div>
<div id="testbox">
    <h2>Fill in your e-mail address and we’ll send you your results</h2>
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
            $results = array_values($_SESSION['result']);
            foreach($results as $i => $result):?>
			<!-- Insert value to first Otto-custom field in which to store the answers here, remember to create them in Otto! -->
            <input type="hidden" name='custom_<?php echo $i+18 ?>' value='<?php echo $result['answer'] ?>' >
        <?php
            endforeach;
        endif;?>
		<!-- Insert value to Otto-custom field in which to store the link -->
        <input type="hidden" name="custome_34" id="url_sent" value="">
        <input  id='btnValidate'  type='submit' value='Send me result now'/>
    </form>
    <form id="form_show_result">
        <?php if(!empty($_SESSION['result'])) : ?>
        <input type="hidden" name='result' value='<?php echo serialize($_SESSION["result"]) ?>' >
        <input type="hidden" id='email_sent' name='email_sent' value='' ?>
        <?php endif;?>
        <input type='hidden' name='is_send_mail' value='1'>
        <a href="show_result.php" id="show_result">No, thanks. Just show me my results</a> 
        <!-- <button id="show_result">No, thanks. Just show me my results</button> -->
    </form>
    <!-- <div id="cover"><img src="images/loading.gif" id="img-load"></div> -->
</div>

<?php
// Should not include this on the FIRST iframe in order to not tell Otto and Google Analytics that this page is visited twice!
// include "$root/survey/test/footer.php";
include "footer.php";
?>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
$(function(){
    // $("#result").submit(function(){
    //     if( !$("input[name='email']").val() ){
    //         alert("Enter your email please");
    //         return false;
    //     }
    // });

    $("#btnValidate").click(function(event){
        event.preventDefault();
        if( !$("input[name='email']").val() ){
            alert("Enter your email please");
            return false;
        }
        $("#btnValidate").colorbox({
            iframe:true, 
            width:"80%", 
            height:"500px",
            href : "http://www.sonician.info/otto/handlers/form_handler.php",
            data : $("#result").serialize()
        });
    });

    $("#show_result").colorbox({
        iframe:true, 
        width:"80%", 
        height:"500px",
        href : "show_result.php"
    });
    // $("#show_result").click(function(e){
    //     e.preventDefault();
    //     email   = $("input[name='email']").val();
    //     url     = $(this).attr("href");
    //     $("#cover").fadeIn();
    //     if( email ){
    //         $("#email_sent").val(email);
    //         $.ajax({
    //             url : "sendmail.php",
    //             type: 'POST',
    //             data: $("#form_show_result").serialize(),
    //             dataType : 'json',
    //             success: function(data){
    //                 if(data.success === true ){
    //                     $("#url_sent").val( data.url );
    //                     console.log(data.url);
    //                     $.ajax({
    //                         url : $("#result").attr('action'),
    //                         type: 'POST',
    //                         data: $("#result").serialize,
    //                         // crossDomain: true,
    //                         // dataType: 'jsonp',
    //                         success: function(data){
    //                             loading(url);
    //                         }
    //                     });
    //                     // loading(url);
    //                 }
    //             }
    //         });
    //     } else {
    //         loading(url);
    //     }
    // });
});

function loading(url){
    setTimeout(function(){
        $("#cover").fadeOut();
        //window.location = url;
        var win = window.open(url, '_blank');
        win.focus();
    },2000);
}
</script>