<?php
header("Content-type: text/html; charset=utf-8");

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/survey/header.php";



?>

<style>
.table {
background: #bbbbbb;
width:300px;
}

.calcheading {
height:30px;
background: url(/images/navback.gif) repeat-x;
color: #ffffff;
font-size: 14px;
}

.calcrow {
height: 30px;
background: url(/images/even-odd-back.gif) repeat-x;
}

.calcrow2 {
height: 30px;
background: #ffffff;
}

.submit {
height: 30px;
background: #bababa;
}

.none { display:none; } 
.view { display:table-row; }

</style>


  <div style="width:650px;">
	
	
  
  <div style="float:right; width:48%; margin-left:2%;">
<?php
  
  if (isset($_POST['custom_3'])) $valueofclient = $_POST['custom_3'];
  if (isset($_POST['custom_4'])) $valuecac = $_POST['custom_4'];
  if (isset($_POST['unknowncac'])) $unknowncac = $_POST['unknowncac'];

  //default sekvens
$seq = 146;
$showemail = 'text';
$email = "Skriv in E-mail att skicka resultat till";
if (isset($_REQUEST['email'])) {
	$email = $_REQUEST['email'];
	$showemail = 'hidden';
	$seq = 146;
};
if (isset($_REQUEST['utm_source'])) {
	$email = $_REQUEST['utm_source'];
	$showemail = 'hidden';
	$seq = 146;
};


  echo <<<_END
  
<form method='post' action='http://www.sonician.info/otto/handlers/form_handler.php' accept-charset='utf-8'><!--
<form id="form1" name="form1" method="post" action="i01.php" accept-charset='utf-8'>-->
<table border='0' width='300px' cellpadding='3' cellspacing='1' class="table">
<tr class="calcheading"><td><strong>Värdeökningskalkylator</strong></td><td>(talvärden)</td></tr>
<tr class="calcrow"><td>Vad tjänar du på en ny kund i snitt över kundens tid som kund? (T ex "250 000") </td><td align="center"><input type='text' style="width:65px;" name='custom_3' value="$valueofclient"/></td></tr>

<script>
function doMath() {
var value_num_emp = parseInt(document.getElementById('value_num_emp').value);
var salary = parseInt(document.getElementById('salary').value);
var value_timeonnew = parseInt(document.getElementById('value_timeonnew').value);
var value_mktg_budg = parseInt(document.getElementById('value_mktg_budg').value);
var numof_new_clients = parseInt(document.getElementById('numof_new_clients').value);
var calccac = Math.round(((value_num_emp * salary * 1.5 * 12 * value_timeonnew / 100) + value_mktg_budg) / numof_new_clients);

document.getElementById('calccac').value = calccac;

if(jQuery('#toggle').is(':checked')){
jQuery('#custom_4').val(calccac);
}
else{
jQuery('#custom_4').val(valuecac.value);
}
}
</script>

<tr class="calcrow2"><td>Ungefär hur många nya kunder fick du föregående år (t ex "10")</td><td align="center"><div><input type='text' style="width:65px;" id="numof_new_clients" name='custom_9' value="$numof_new_clients" onBlur="doMath();"/></div></td></tr>

<tr class="calcrow"><td>Klicka här om du inte känner till din kundanskaffningskostnad:</td><td align="right"><input type="checkbox" id="toggle" name="unknowncac" value="$unknowncac"  onChange="doMath();"/></td></tr>

<tr class="calcrow2 view"><td>Kundanskaffningskostnad (T ex "50 000"):</td><td align="center"><input type='text' style="width:65px;" id="valuecac" name='valuecac' value="$valuecac" onBlur="doMath();"/></td></tr>



<tr class="calcrow2 none"><td>Ok, då försöker vi räkna ut det:<br>
Ungefär hur många jobbade med sälj & marknadsföring hos er förra året? (T ex "25")</td><td align="center"><div><input type='text' style="width:65px;" id="value_num_emp" name='custom_7' value="$value_num_emp" onBlur="doMath();"/></div></td></tr>
<tr class="calcrow none"><td>Ca snittlön brutto/mån (T ex "30000")</td><td align="center"><div><input type='text' style="width:65px;" id="salary" name='salary' value="$salary" onBlur="doMath();"/></div></td></tr>
<tr class="calcrow2 none"><td>Ungefär hur många procent av sin tid la dessa på att få in nya kunder (jämfört med befintliga)?  (T ex "75")</td><td align="center"><div><input type='text' style="width:65px;" id="value_timeonnew" name='value_timeonnew' value="$value_timeonnew" onBlur="doMath();"/></div></td></tr>
<tr class="calcrow none"><td>Hur mycket pengar spenderade ni på marknadsföring mot nya kunder förra året totalt? (T ex "150 000")</td><td align="center"><div><input type='text' style="width:65px;" id="value_mktg_budg" name='custom_8' value="$value_mktg_budg" onBlur="doMath();"/></div></td></tr>
<tr class="calcrow2 none"><td>Beräknad ungefärlig kundanskaffningskostnad: </td><td><div><input type="text" style="width:65px;" id="calccac" name="calccac" value="$calccac" readonly="true" /></div></td></tr>
<tr class="calcrow"><td colspan="2"><input type=$showemail name="email" value="$email" size="35" length="150" />
<input type="hidden" name="seq" value=$seq />
<input type="hidden" name="custom_4" id="custom_4" />
</td></tr>

<tr class="submit"><td colspan="2">

<input  id='btnValidate'  type='submit' value='Nästa&raquo;'/></td></tr>


_END;
?>
	
	<input type='hidden' name='sender' value='1'/>
	<input type='hidden' name='a' value='sub' >
	<input type='hidden' name='ref' value='nyckeltalskalkylatorn' />
	<input type='hidden' name='status' value='3' />
  </table>
  </form>

  </div>
  <div style="float:left;width:50%;">
 <p><b>Du får din <img src="http://www.sonician.com/images/xls.gif" width="16" alt="xls" height="16" border="0"/> <b>bonus, leverantörsjämförelsen med priser och funktioner</b>, direkt efter nyckeltalskalkylatorn:</p>
	<h3>Nyckeltalskalkylator för att se om och hur det finns förbättringspotential genom Marketing Automation</h3>
	<p>Svara på några frågor som kommer att ge dig både dina egna relevanta nyckeltal, respektive ett utslag om det är så att du har nytta av Marketing Automation eller inte, liksom något om i hur stor utsträckning det gäller.</p>
 
 <p>Resultatet du får är ett uppskattat värde baserat på data från:</p>
 <table style="width:300px;" cellspacing="5" align="center" valign="center">
<tbody>
<tr valign="center">
<td><img src="/images/forrester_90x30.png" border="0" alt="Forrester Research" width="90" height="30" /></td>
<td><img src="/images/aberdeen_90x18.png" border="0" alt="Aberdeen Group" width="90" height="18" /></td>
<td><img src="/images/gartner_90x26.png" border="0" alt="Gartner Group" width="90" height="26" /></td></tr>
<tr valign="center">
<td><img src="/images/cso_90x29.png" border="0" alt="CSO Insights" width="90" height="29" /></td>
<td><img src="/images/annuitas_90x44.png" border="0" alt="Annuitas" width="90" height="44" /></td>
<td><img src="/images/sonician-logo_90x38.png" border="0" alt="Sonician" width="90" height="38" /></td>
</tr>
</tbody>
</table>

</div>
</div>
<div style="clear:both;"></div>
  
  


	
	
	




    
		
		
  

  <script type="text/javascript">
jQuery(document).ready(function(){
jQuery("input[type=checkbox]").click(function(event) {
        jQuery('.view').toggle();
        jQuery('.none').toggle();
        });
});
</script>

<?php
include "$root/survey/footer.php";
?>

