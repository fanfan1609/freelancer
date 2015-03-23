<?php
header("Content-type: text/html; charset=utf-8");

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/survey/header.php";

$showemail = 'text';
$email = "Skriv in E-mail att skicka bonus till";
if (isset($_REQUEST['email'])) {
	$email = $_REQUEST['email'];
	$showemail = 'hidden';
};


?>
<!--<h1>Tack för dina svar! <img src="/images/smiley.gif" width="16" height="16" /></h1>-->


<?php


$date = date ("l, F jS, Y");
$time = date ("h:i A");

$msg = "Answered key-figures calculator after webinar

It was submitted on $date at $time.\n\n";

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    foreach ($_POST as $key => $value)
	{
        $msg .= ucfirst ($key) .":\n--------------\n". $value . "\n\n";
    }
}
else {
    foreach ($_GET as $key => $value)
	{
        $msg .= ucfirst ($key) .":\n--------------\n". $value . "\n\n";
    }
}

$header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
$subject = 'Key-figures-calculator-answers';
$header = '';

mail('stefan.wikstrom@sonician.com', '=?UTF-8?B?'.base64_encode($subject).'?=', $msg, $header_ . $header);
if ($forward == 1)
{
    header ("Location:$location");
}
else
{
	echo '<br />';
    echo "<b>Dina nyckeltal som kan automatberäknas ser du nedan, och övriga tas fram och skickas så snart det är framtaget!</b><br><br>";
}
?>
<p><img src="http://www.sonician.com/images/xls.gif" width="16" alt="xls" height="16" border="0"/> &ndash;<b>Bonusen</b>: Jämförelsebladet mellan Marketing Automation leverantörer är framtaget av en Sonician-praktikant från Chalmers IT-universitet och levereras "as-is". Eftersom såväl Sonician som andra kommer att uppdatera såväl priser som funktioner får du gärna komma med synpunkter på om det är något som ska ändras, tas bort, eller läggas till.</p>
<form action='http://www.sonician.info/otto/handlers/form_handler.php' method=POST accept-charset='utf-8'>
<input type='hidden' id='otto_form_seq' name='seq' value='158'/>
<input type='hidden' id='otto_form_sender' name='sender' value='1'/>
<input type='hidden' name='a' value='sub' >
<input type='hidden' name='ref' value='Answered-value-calculator' />
<input type="hidden" name="custom_6" value=<?php echo '"'.$_POST['Tekniken'].','.$_POST['Vad_tyckte_du'].','.$_POST['Intresset_mer-el-mindre'].','.$_POST['Most-important-take-away'].'"'; ?> />
<input type="hidden" name="email" value=<?php echo '"'.$_POST['email'].'"'; ?> />
<input type="hidden" name="firstname" value=<?php echo '"'.$_POST['firstname'].'"'; ?> />
<input type="hidden" name="lastname" value=<?php echo '"'.$_POST['lastname'].'"'; ?> />
<input type="hidden" name="organisation" value=<?php echo '"'.$_POST['organisation'].'"'; ?> />
<!--Here comes one line of PHP code to show (or not show if it's not needed) e-mail address-->
		<?php echo "<input type='".$showemail."' name='email'  id='email' size='40' maxlength='70' value='".$email."' />"; ?>
		
<input type='submit'  name='submit' value='Ladda ned xls-jämförelsen som bonus&raquo;' />
</form>
<!--From Kalkylator-->
<div style="clear:both;"></div>
<br />
<h1>Din potentiella värdeökning med Marketing Automation: </h1>

<?php
if (isset($_REQUEST['custom_3'])) $valueofclient = $_REQUEST['custom_3'];
if (isset($_REQUEST['custom_4'])) $valuecac = $_REQUEST['custom_4'];
if (isset($_REQUEST['custom_9'])) $numof_new_clients = $_REQUEST['custom_9'];

if ($valuecac > 9000){
$spent_on_new = $numof_new_clients * $valuecac;
$save_on_new = number_format(1000 * round(0.33 * $spent_on_new/1000),0,","," ");
$save_on_new2 = number_format(1000 * round(0.3725 * $spent_on_new/1000),0,","," ");
$morebudget = number_format(1000 * round($spent_on_new * 0.5/1000),0,","," ");
$savequick = number_format(1000 * round($spent_on_new * 0.2/1000),0,","," ");
$ordervalueincrease = number_format(1000 * round($valueofclient * $numof_new_clients * 0.47/1000),0,","," ");
}
else
{
$spent_on_new = $numof_new_clients * $valuecac;
$save_on_new = number_format(10 * round(0.33 * $spent_on_new/10),0,","," ");
$save_on_new2 = number_format(10 * round(0.3725 * $spent_on_new/10),0,","," ");
$morebudget = number_format(10 * round($spent_on_new * 0.5/10),0,","," ");
$savequick = number_format(10 * round($spent_on_new * 0.2/10),0,","," ");
$ordervalueincrease = number_format(10 * round($valueofclient * $numof_new_clients * 0.47/10),0,","," ");
};

/*echo "<div style='float:right;width:300px;'><div class='testi-title'>Testimonials</div>";
print views_embed_view('testimonials', 'block'); 
echo "<div class='memb-title'>Clients & Associations</div><style>#main-content .node ul li {background:none !important;}</style>";
print views_embed_view('membership', 'block'); 
print views_embed_view('membership', 'block_1'); 
echo "</div><div style='float:left;max-width:600px;'>";
*/
echo <<<_END
<h3>Enligt forskning</h3>
<p>Enligt Forrester Research så skulle din kundanskaffningskostnad minska med 33%, vilket skulle spara just er ca <b>$save_on_new</b> om ni använder er av Marketing Automation.</p>
<p>Det gör samtidigt att ni ökar er marknadsföringsbudget för att nå fler så att ni har <b>$morebudget mer</b> att röra er med.</p>
<p>Gartner Group och CSO Insights säger att det går att spara <b>$savequick redan inom 6-9 månader</b>.</p>
<p>Något som vi själva tror starkt på, men också tror är lite mer bransch/tjänsteberoende är att vi har sett att order-värden generellt har ökat när man använt Marketing Automation genom att köparen har kunnat få varje värde utbenat för sig. Ju mer komplex en affär är, ju högre ordervärden har vi sett. Annuitas group menar att det skulle leda till 47% högre ordervärde generellt, i ert fall innebär det att ni skulle tjäna <b>$ordervalueincrease mer på högre ordervärden</b> över ett år, utan att ta med ökad försäljning som MA också skulle leda till.
<img style="float: right;" alt="" src="/sites/default/files/otto_0.png" />
<h3>Sonicians egna resultat</h3>
<p>Om det viktigaste sättet att nå nya kunder på är via mötesbokning och/eller kalla samtal, så stämmer siffrorna som Forrester Research säger rätt väl in på de effekter vi har sett på kunder som använder våra tjänster och Marketing Automation-systemet Otto&reg;, även om vi nästan alltid sett en förbättring med ännu lite mer, i ert fall skulle det innebära ca <b>$save_on_new2</b> besparing om ni använder er av Marketing Automation.</p>
<h4>Riktigt bra effekt på webbsidors konvertering till lead</h4>
<p>Det finns inte lika mycket extern data på hur mycket mer leads man faktiskt kan få från webbsidor med hjälp av Marketing Automtion, men Aberdeen Group talar om 450% fler leads, Bull Solutions om 3ggr fler och själva har vi sett mellan 1,5 och 17ggr fler leads. För att ta fram data som gäller just för er behöver vi i så fall känna till mer om era antal besökare på webbsidan med mera.</p>


_END;
?>



 <h2>Intressant? </h2>
 <p>Om ni redan nu eller längre fram har intresse för att mer exakt se vad en Marketing Automation lösning kan ge er för vinster och fördelar, så går vi gärna genom dem tillsammans med dig om du tycker att vi kan jobba ihop.</p>
 
 <p>Kontakta mig gärna om du vill diskutera Marketing Automation och hur vi kan hjälpa er med ett förändringsarbete som hjälper er att nå ändå bättre resultat.</p>
<p>Stefan Wikström</p>


<table >
<tbody valign="top">
<tr valign="top">
<td width="200">
<p>Direkt: 031-3134375<br /><a href="mailto:stefan.wikstrom@sonician.com">stefan.wikstrom@sonician.com</a></p>
<p>Växel: 031-3134370<br />Mobil: 072-3364339<br />Fax: 031-3134371</p>
<p>Håll dig uppdaterad genom att:<br />
<a href="http://www.facebook.com/sonician"><img src="/images/fb_16x16.gif" border="0" /></a> FB: "Gilla" oss på <a href="http://www.facebook.com/sonician">facebook.com/sonician</a>, eller<br /><a href="http://www.twitter.com/myaide"><img src="/images/tw_16x16.gif" border="0" /></a> TW: Följ vår VDs "tweets" på <a href="http://www.twitter.com/myaide">twitter.com/myaide</a></p>

</td>
<td> </td>
<td valign="top" width="300"><img src="/images/Sonician-visitkort-stefan.gif" border="0" alt="Stefans Visitkort" width="300" height="174" /></td>
</tr>
</tbody>
</table>
<p> </p>



<!--Slut på kod från VÖK-->
<div style="clear:both;"></div>





<?php
include "$root/survey/footer.php";
?>
