$(document).ready(function() {
  $("#domainTool").submit(function(e){
    // abort any pending request
    // if (request) {
    //     request.abort();
    // }
    // setup some local variables
    var $form = $(this);
    // let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    // serialize the data in the form
    var serializedData = $form.serialize();

    // let's disable the inputs for the duration of the ajax request
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // fire off the request to /form.php
    $("#createdDomainText").html("In progress.Please wait");
    request = $.ajax({
        url: "domain.php",
        type: "post",
        data: serializedData
    });

    // callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // log a message to the console
        $("#createdDomainText").html("Done");
        $("#result").val(response);
        callCheckAvaiable();
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // log the error to the console
        console.error(
            "The following error occured: "+
            textStatus, errorThrown
        );
    });

    // callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // reenable the inputs
        $inputs.prop("disabled", false);
    });

    // prevent default posting of form
    e.preventDefault();

  });
  // $("#checkAvaiable").on("click",function(){
  //     domains = $("#result").val().split("\n");

  //     while(domains.length > 0){
  //       batchs = domains.splice(0,5);
  //       $.post('dns.php',{domain: batchs.join("\n")},function(data){
  //         if(data.length > 0){
  //           $("#availableDomain").append(data+"\n");
  //         }
          
  //       });
  //     }
      
  //     // $.each(domains,function(index,domain){
  //     //     $.post('dns.php',{domain: domain},function(data){
  //     //       $("#availableDomain").append(data+"\n");
  //     //     });
  //     // })
      
  // });

  $("#resetValue").click(function(event){
    event.preventDefault();
    $("textarea").each(function(){
        $(this).val("");
    });
    $("#list_3").val(".com");

    return false;
  })

  var clip = new ZeroClipboard($("#d_clip_button"));

  clip.on("ready", function() {
    console.log("Flash movie loaded and ready.");

    this.on("aftercopy", function(event) {
      // alert("Copied text to clipboard: " + event.data["text/plain"]);
      alert("Copied text to clipboard done");
    });
  });

  clip.on("error", function(event) {
    // $(".demo-area").hide();
    // debugstr('error[name="' + event.name + '"]: ' + event.message);
    ZeroClipboard.destroy();
  });

});
function callCheckAvaiable(){
  $("#availableDomain").html("");
  $("#availableDomainText").html("In progress. Please wait some minutes.");
  var deferreds = getSomeDeferredStuff();

  $.when.apply(null,deferreds).done(function() {
      $("#availableDomainText").html("DONE");
  });
}


function getSomeDeferredStuff(){
  var deferreds = [];
  domains = $("#result").val().split("\n");

  while(domains.length > 0){
    batchs = domains.splice(0,5);
    deferreds.push(
      $.post('dns.php',{domain: batchs.join("\n")},function(data){
        if(data.length > 0){
          $("#availableDomain").val( $("#availableDomain").val() + data+"\n" );
        }
      })
    );
  }
  return deferreds;
}