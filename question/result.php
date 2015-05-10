<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include "header.php";
?>
<link rel="stylesheet" href="css/result.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/colorbox.css">
<style>

</style>
<div id="cover"><i id="img-load" class="fa fa-spinner fa-spin fa-5x"></i></div>
<div id="testbox">
<div id="inline-testbox">
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
        <input type="hidden" name="custom_38" id="url_sent" value="">
        <input  id='btnValidate'  type='button' value='Send me the result now'/>
    </form>
    <form id="form_show_result">
        <?php if(!empty($_SESSION['result'])) : ?>
        <input type="hidden" name='result' value='<?php echo base64_encode(serialize($_SESSION["result"])) ?>' >
        <input type="hidden" id='email_sent' name='email_sent' value='' ?>
        <?php endif;?>
        <input type='hidden' name='is_send_mail' value='1'>
        <a href="show_result.php" id="show_result">No, thanks. Just show me my results</a> 
        <!-- <button id="show_result">No, thanks. Just show me my results</button> -->
    </form>
    <!-- <div id="cover"><img src="images/loading.gif" id="img-load"></div> -->
</div>
</div>

<?php
// Should not include this on the FIRST iframe in order to not tell Otto and Google Analytics that this page is visited twice!
// include "$root/survey/test/footer.php";
include "footer.php";
?>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
var query = '';
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
        saveResultAndpostToOttoForm($("input[name='email']").val());
        // query += "?email=" + $("input[name='email']").val();
        // query += "&cellphone=" + $("input[name='cellphone']").val();
        // // query += "&seq=161&sender=1&a=sub&ref=2mintest-en"
        // $("#result").find("input[type='hidden']").each(function(){
        //     name = $(this).attr('name');
        //     query += "&" + name +"=" + $(this).val();
        // });
        // console.log(query);
        // $.colorbox({
        //     iframe:true, 
        //     width:"80%", 
        //     height:"500px",
        //     href : "http://www.sonician.info/otto/handlers/form_handler.php" + query,
        // });
    });

    $("#show_result").click(function(e){
        e.preventDefault();
        email   = $("input[name='email']").val();
        url     = $(this).attr("href");
        $("#cover").fadeIn();
        if( email ){
            saveResultAndpostToOttoForm(email);
        } else {
            $("#cover").fadeOut();
          
			//Redirect to page if low res, colorbox if not
			if (parent.innerWidth < 1024 ){
				document.location.href = "./show_result.php";
			}else{		
				$("#show_result").colorbox({
					iframe:true, 
					width:"80%", 
					height:"500px",
					href : "show_result.php"
				});
			}
	
        }
    });
});

function saveResultAndpostToOttoForm(email){
    $("#email_sent").val(email);
    $.ajax({
        url : "sendmail.php",
        type: 'POST',
        data: $("#form_show_result").serialize(),
        dataType : 'json',
        success: function(data){
   //          if(data.success === true ){
   //              $("#url_sent").val( data.url );
   //              var custom_query = '';
   //              custom_query += "?email=" + $("input[name='email']").val();
   //              custom_query += "&cellphone=" + $("input[name='cellphone']").val();
   //              $("#result").find("input[type='hidden']").each(function(){
   //                  name = $(this).attr('name');
   //                  custom_query += "&" + name +"=" + $(this).val();
   //              });
   //              console.log(custom_query);
   //              $("#cover").fadeOut();
  
			// //Redirect to page if low res, colorbox if not
   //  			if (parent.innerWidth < 1024 ){  
   //  				document.location.href = "http://www.sonician.info/otto/handlers/form_handler.php" + custom_query;
   //  			}else{
   //  				$.colorbox({
   //                      iframe:true, 
   //                      width:"80%", 
   //                      height:"500px",
   //                      href : "http://www.sonician.info/otto/handlers/form_handler.php" + custom_query,
   //                  });
   //  			}	
   //          } else {
   //              alert(data.message);
   //              $("#cover").fadeOut();
   //          }
        }
    });
}

function loading(url){
    setTimeout(function(){
        $("#cover").fadeOut();
        //window.location = url;
        var win = window.open(url, '_blank');
        win.focus();
    },2000);
}
</script>