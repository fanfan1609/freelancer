<?php
session_start();
ob_start();
/****************************************************
C O N F I G U R A B L E    S E T T I N G S
*****************************************************/
/****************************************************
Multi Entry Domains Enquiry Maximum at One Time

Set to -1 for unlimited. If you set to -1, uncomment set_time_limit below to allow the script more time
****************************************************/
define('MAX_DOMAINS_AT_ONE_TIME', -1);
/****************************************************
Allowed Domain TLDs = Set to NULL to allow any domain
Examples:
$allowedTLDs = null;  // to allow ALL domains
$allowedTLDs = array("com","net","org");  // to allow only com, net and org domains.
$allowedTLDs = array("com.sg");  // to allow only com.sg domain checking
****************************************************/
$allowedTLDs = null;
/****************************************************
Uncomment to make unlimited script execution time - not recommended for shared hosting
****************************************************/
set_time_limit(0);
/****************************************************
Email Options (via PHP's mail function)
- $emailResults = Set to 'true' to transform this script into a email only script. Set it up as a cron job to check
domain availability at every interval. The cron job for unix systems can be as follows:
lynx -source "http://example.com"
- $emailEmail 		= Specify your email address
- $emailSubject 	= Specify the subject of the email
- $emailFrom		= Specify the from field
- $emailFile 		= Specify the file to read from. One domain per line. File should be readable by PHP
****************************************************/
//$emailResults = false;
//$emailEmail = 'example.com';
//$emailSubject = 'Domains are available!';
//$emailFrom = 'me@mydomain.com';
//$emailFile = 'domains.txt';

/****************************************************
Recaptcha prevents automated queries that can crash your server
If true, shows Recaptcha Dialog Box. ALL settings below are REQUIRED
==> Register a free account at http://recaptcha.net/ if you don't have the required keys
****************************************************/
define('ENABLE_RECAPTCHA', false); //set to false to disable, true to enable
define('RECAPTCHA_PRIVATE_KEY', ''); //substitute with private key
define('RECAPTCHA_PUBLIC_KEY', ''); // substitute with pubic key
define('RECAPTCHA_TOTAL_HITS', 3); // how many checks are allowed per verified captcha. Set to -1 for unlimited

/****************************************************
Language - change as needed to your own language and the whole script will transform to your language
****************************************************/

$language = array(
    'invalid_domain' => 'Invalid Domain (Letters, numbers and hypens only)',
    'tld_not_allowed' => 'TLD not allowed', //appears when an invalid TLD is entered
    'fill_in_Captcha' => 'Please fill in the captcha field above ',
    'captcha_nomatch' => 'Captcha does not match. Please re-enter',
    'bulk_checker' => 'Bulk Domain Availability Checker',
    'max_domains' => ' Max Domains per submission: ',
    'save_as_text_file' => 'Save results as text file?',
    'only_available' => 'Available domains only',
    'check_availability' => 'Check Availability',
    'processing' => 'Processing...',
    'emailed' => ' Emailed available domains...',
    'done' => '<div class="alert alert-success" role="alert">Done</div>',
    'not_available' => '<span style="color:red;"> Registered</span>',
    'available' => '<span style="color:#00e600;"> Available</span>',
    'too_many' => 'Too many domains submitted',
    'going_to_check' => 'Going to check this number of domains: ',
    'done' => '<div class="alert alert-success" role="alert">Done</div>',
    'intro_text' => 'Enter a list of domains to check availability, one per line.',
    'enter_captcha' => 'Please enter the captcha below:',
    'wrong_captcha' => ' Wrong captcha. Please try again.',
    'current_status' => 'Now at domain (line): ',
    'completed' => '<div class="alert alert-success" role="alert"><strong>Done!</strong> The script has successfully finished checking the domains.</div>'
);

/****************************************************
Other Options
- $enableReferrerChecking 		= Set to 'true' to check referrers to be from your own domain. Prevents misuse. Set
to false to disable this check.	Default: true
- $enableFileSave				= Set to 'true' to allow a option to download the results as a text file
- $enableGetHostByNameChecking 	= Set to 'true' to allow very fast checking of domain availability by utilizing
the PHP gethostbyname function. Strongly recommended setting: true
- $enableCheckDnsRRChecking 	= Set to 'true' to allow very fast checking of domain availability by utilizing
the PHP checkdnsrr function. Strongly recommended setting: True.
- $enableWhoisDomainChecking 	= Set to 'false' to skip querying WHOIS servers to confirm domain is truly available.
Slows down checkups considerably. Recommended: True.
- $showUpdatesEvery 			= Set to -1 to disable. Setting this to X values causes it to print an output line every
X domain checkings. Useful to check how fast and where domain checking is
- $enableAutoDomainDetection 	= Set to 'false' to restrict checks to only those TLDs listed in dnserver. Otherwise it
will try to detect whois servers for those TLDs that dnservers.php does not have
****************************************************/

$enableReferrerChecking      = true;
$enableFileSave              = true;
$enableGetHostByNameChecking = false;
$enableCheckDnsRRChecking    = false;
$enableWhoisDomainChecking   = true;
$showUpdatesEvery            = -1;
$enableAutoDomainDetection   = true;

/****************************************************
N O N - C O N F I G U R A B L E    S E T T I N G S

You should not change the below unless you know what you are doing
*****************************************************/
//to prevent other domains from misusing the AJAX script
$referrerDomain = '';
if ($enableReferrerChecking) {
    if (session_id() == '')
        session_start();
    
    if (!isset($_REQUEST['aj']))
        $_SESSION['IS_FROM_SAME_DOMAIN'] = 1;
    if (isset($_SERVER['HTTP_REFERER'])) {
        //extract referrer domain
        $referrerDomain = $_SERVER['HTTP_REFERER'];
        $referrerDomain = substr($referrerDomain, strpos($referrerDomain, "http://") + 7);
        $referrerDomain = substr($referrerDomain, 0, strpos($referrerDomain, "/"));
    }
}
require_once('dnservers.php');
$error = '';
//telnet com.whois-servers.net 43 for whoising com server
//any updates here need to reflect in bulk_checker
function isDomainAvailable($R6629C5988EEFCD88EA6F77A2AE672B96, $R9DFAEDF5181E1A426FA8DBE71B349A26 = false)
{
    global $ext, $error, $allowedTLDs, $language, $buffer, $enableGetHostByNameChecking, $enableCheckDnsRRChecking, $enableWhoisDomainChecking, $enableAutoDomainDetection;
    if ($enableWhoisDomainChecking == false)
        $enableAutoDomainDetection = false;
    $R6629C5988EEFCD88EA6F77A2AE672B96 = trim($R6629C5988EEFCD88EA6F77A2AE672B96);
    if (preg_match('/^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)*[a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?$/i', $R6629C5988EEFCD88EA6F77A2AE672B96) != 1) {
        $error = $language['invalid_domain'] . ' (' . $R6629C5988EEFCD88EA6F77A2AE672B96 . ')';
        return false;
    }
    preg_match('@^(http://www\.|http://|www\.)?([^/]+)@i', $R6629C5988EEFCD88EA6F77A2AE672B96, $R2BC3A0F3554F7C295CD3CC4A57492121);
    $buffer                            = '';
    $R6629C5988EEFCD88EA6F77A2AE672B96 = $R2BC3A0F3554F7C295CD3CC4A57492121[2];
    $R37D331C368B44BDD85AF95D9FFFFD202 = explode('.', $R6629C5988EEFCD88EA6F77A2AE672B96);
    $R33D3EC748433467E20D0947C3032E305 = '';
    if (count($R37D331C368B44BDD85AF95D9FFFFD202) == 3) {
        $R33D3EC748433467E20D0947C3032E305 = strtolower($R37D331C368B44BDD85AF95D9FFFFD202[1] . '.' . $R37D331C368B44BDD85AF95D9FFFFD202[2]);
    } else if (count($R37D331C368B44BDD85AF95D9FFFFD202) == 2) {
        $R33D3EC748433467E20D0947C3032E305 = strtolower($R37D331C368B44BDD85AF95D9FFFFD202[1]);
    } else {
        $error = $language['invalid_domain'];
        return false;
    }
    if ($allowedTLDs != null) {
        $R630663E4CF314AFD500B9B8E1AA95DF0 = count($allowedTLDs);
        $RDBF866E6293BB59E654033E299EC8CFE = false;
        for ($RA16D2280393CE6A2A5428A4A8D09E354 = 0; $RA16D2280393CE6A2A5428A4A8D09E354 < $R630663E4CF314AFD500B9B8E1AA95DF0; $RA16D2280393CE6A2A5428A4A8D09E354++) {
            if ($allowedTLDs[$RA16D2280393CE6A2A5428A4A8D09E354] === $R33D3EC748433467E20D0947C3032E305) {
                $RDBF866E6293BB59E654033E299EC8CFE = true;
                break;
            }
        }
        if (!$RDBF866E6293BB59E654033E299EC8CFE) {
            $error = $R33D3EC748433467E20D0947C3032E305 . $language['tld_not_allowed'];
            return false;
        }
    }
    $R019FB4DA0E10A95A57615147DF79F334 = false;
    if (!array_key_exists('.' . $R33D3EC748433467E20D0947C3032E305, $ext)) {
        if ($enableAutoDomainDetection === false) {
            $error = $language['unknown_tld'] . $R33D3EC748433467E20D0947C3032E305;
            return false;
        }
        $R019FB4DA0E10A95A57615147DF79F334 = true;
    }
    if ($R9DFAEDF5181E1A426FA8DBE71B349A26 === false) {
        if ($enableCheckDnsRRChecking) {
            if (function_exists('checkdnsrr')) {
                if (checkdnsrr($R6629C5988EEFCD88EA6F77A2AE672B96) !== false)
                    return false;
                if (checkdnsrr($R6629C5988EEFCD88EA6F77A2AE672B96, 'A') !== false)
                    return false;
            }
        }
        if ($enableGetHostByNameChecking) {
            $RE22CBD8984E1727D0A587413D72A88CF = gethostbyname($R6629C5988EEFCD88EA6F77A2AE672B96);
            if (($RE22CBD8984E1727D0A587413D72A88CF != $R6629C5988EEFCD88EA6F77A2AE672B96) && ($RE22CBD8984E1727D0A587413D72A88CF != '208.67.219.132')) {
                return false;
            }
        }
        if (!$enableWhoisDomainChecking) {
            return array(
                'true',
                $R37D331C368B44BDD85AF95D9FFFFD202
            );
        }
    }
    $server = '';
    if (isset($_REQUEST['opendns'])) {
        echo '208.67.219.13';
        exit;
    }
    if ($R019FB4DA0E10A95A57615147DF79F334) {
        $RBD7EDCF7DA1CE9EA93A9B3BBD829FFBB = explode('.', $R33D3EC748433467E20D0947C3032E305);
        if (count($RBD7EDCF7DA1CE9EA93A9B3BBD829FFBB) > 1)
            $server = $RBD7EDCF7DA1CE9EA93A9B3BBD829FFBB[1] . '.whois-servers.net';
        else
            $server = $R33D3EC748433467E20D0947C3032E305 . '.whois-servers.net';
        $R7B8A9F2F48B874D40BD75BDD12F02557 = @gethostbyname($R33D3EC748433467E20D0947C3032E305 . '.whois-servers.net');
    } else {
        $server                            = $ext['.' . $R33D3EC748433467E20D0947C3032E305][0];
        $R7B8A9F2F48B874D40BD75BDD12F02557 = @gethostbyname($server);
    }
    if ($R33D3EC748433467E20D0947C3032E305 == 'es') {
        $error = 'Error: ES not supported. They don\'t have a public whois server :(';
        return false;
    }
    if ($R33D3EC748433467E20D0947C3032E305 == 'au') {
        $server                            = $ext['.com.au'][0];
        $R7B8A9F2F48B874D40BD75BDD12F02557 = @gethostbyname($server);
    }
    if ($R7B8A9F2F48B874D40BD75BDD12F02557 == $server) {
        $error = 'Error: Invalid extension - ' . $R33D3EC748433467E20D0947C3032E305 . '. Or server has outgoing connections blocked to ' . $server . '.  Domain does not have DNS entry, so chances are high it is available.';
        return false;
    }
    $RAD10634E7F72CAA071320F21AEE5930D = @fsockopen($server, 43, $R32D00070D4FFBCCE2FC669BBA812D4C2, $RE5840D3E86DCF8489051E4F70C757552, 10);
    if ($R32D00070D4FFBCCE2FC669BBA812D4C2 == '10060') {
        $error = 'Error: Invalid extension - ' . $R33D3EC748433467E20D0947C3032E305 . ' (or whois server is down). Domain does not have DNS entry, so chances are high it is available.';
        return false;
    }
    if (!$RAD10634E7F72CAA071320F21AEE5930D || ($RE5840D3E86DCF8489051E4F70C757552 != '')) {
        $error = 'Error: (' . $server . ') ' . $RE5840D3E86DCF8489051E4F70C757552 . ' (' . $R32D00070D4FFBCCE2FC669BBA812D4C2 . ')';
        return false;
    }
    fputs($RAD10634E7F72CAA071320F21AEE5930D, "$R6629C5988EEFCD88EA6F77A2AE672B96\r\n");
    while (!feof($RAD10634E7F72CAA071320F21AEE5930D)) {
        $buffer .= fgets($RAD10634E7F72CAA071320F21AEE5930D, 128);
    }
    fclose($RAD10634E7F72CAA071320F21AEE5930D);
    if ($R33D3EC748433467E20D0947C3032E305 == 'org')
        nl2br($buffer);
    if ($R019FB4DA0E10A95A57615147DF79F334) {
        if ((strpos($buffer, 'No match for') !== false) || (strpos($buffer, 'NOT Found') !== false) || (strpos($buffer, 'NOT FOUND') !== false) || (strpos($buffer, 'Not found: ') !== false) || (strpos($buffer, "No Found\n") !== false) || (strpos($buffer, 'NOMATCH') !== false) || (strpos($buffer, "AVAIL\n") !== false) || (strpos($buffer, 'No entries found') !== false) || (strpos($buffer, 'NO MATCH') !== false) || (strpos($buffer, 'No match') !== false) || (strpos($buffer, 'No such Domain') !== false) || (strpos($buffer, 'is free') !== false) || (strpos($buffer, 'FREE') !== false) || (strpos($buffer, 'No data Found') !== false) || (strpos($buffer, 'No Data Found') !== false) || ($buffer == "Available\n") || (strpos($buffer, 'No information about') !== false) || (strpos($buffer, 'no matching record') !== false) || (strpos($buffer, 'does not Exist in database') !== false) || (strpos($buffer, 'Status: AVAILABLE') !== false) || (strpos($buffer, 'not a registered domain') !== false)) {
            return array(
                'true',
                $R37D331C368B44BDD85AF95D9FFFFD202
            );
        }
        return false;
    } else {
        if ((strpos($R33D3EC748433467E20D0947C3032E305, '.au') > 0) && ($buffer == "Not Available\n")) {
            return false;
        }
        if (preg_match('/' . $ext['.' . $R33D3EC748433467E20D0947C3032E305][1] . '/i', $buffer)) {
            return array(
                'true',
                $R37D331C368B44BDD85AF95D9FFFFD202
            );
        } else {
            return false;
        }
    }
    return false;
}

if ($language['tld_not_allowed'] === false) {
    echo '';
}

function processSubmit($isEmail = false)
{
    global $language, $error, $showUpdatesEvery;
    
    if (ENABLE_RECAPTCHA) {
        $response = recaptcha_check_answer(RECAPTCHA_PRIVATE_KEY, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);
        if ($response->is_valid === false) {
            echo '<p style="color:red">' . $language['wrong_captcha'] . '</p>';
            return;
        }
    }
    
    $domains         = explode("\n", $_POST['domains']);
    $numberOfDomains = count($domains);
    if (($numberOfDomains > MAX_DOMAINS_AT_ONE_TIME) && (MAX_DOMAINS_AT_ONE_TIME != -1)) {
        echo '<p>' . $language['too_many'] . '</p>';
    } else {
        if ($isEmail) //email
            {
            //do nothing
        } else if (isset($_POST['save'])) //text file
            {
            while (ob_get_level() !== 0)
                ob_end_clean();
            header('Content-type: text/plain');
            header('Content-Disposition: attachment; filename="domains.txt"');
        } else if (isset($_POST['csv'])) //csv export
            {
            while (ob_get_level() !== 0)
                ob_end_clean();
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename=domains.csv");
            echo 'Domain ,Status';
            echo "\r\n";
        } else //if downloading as HTML page
            {
            echo '<p>' . $language['going_to_check'] . count($domains) . '</p>';
            echo '<div class="row"><div class="cell fivecol"><span><b>Domain</b></span></div><div class="cell fivecol"><span><b>Status</b></span></div><div class="cell fivecol"><span><b>Information</b></span></div></div>';
            while (ob_get_level() !== 0)
                ob_end_flush();
        }
        flush();
        $counter = 0;
        foreach ($domains as $domain) {
            $counter++;
            if ((!isset($_POST['save'])) && (!isset($_POST['csv'])) && ($showUpdatesEvery != -1) && ($counter % $showUpdatesEvery == 0)) {
                echo '<b>' . $language['current_status'] . $domain . ' (' . $counter . ')</b><br>';
            }
            $domain        = strtolower(trim($domain));
            $error         = '';
            $domregistered = 'Registered';
            $success       = 'Available';
            $result        = isDomainAvailable($domain);
            
            if ($result === false) {
                if (!isset($_POST['onlyavailable'])) {
                    if (isset($_POST['save'])) {
                        echo htmlentities($domain) . ' ' . $domregistered . "\r\n";
                        
                    }
                    if (isset($_POST['csv'])) {
                        echo $domain . ',' . $domregistered;
                        echo "\r\n";
                    } elseif ($language['tld_not_allowed'] === true) {
                        echo '';
                    }
                    if ((!isset($_POST['save'])) && (!isset($_POST['csv']))) {
                        echo '<div class="row"><div class="cellout fivecol"><span>' . htmlentities($domain) . '</span></div><div class="cellout fivecol"><span>' . $language['not_available'] . '</span></div>
							<div class="cellout fivecol"><span><a href="http://whois.domaintools.com/' . $domain . '/"  target="_blank">Whois Details</a></span></div></div>';
                    }
                    flush();
                }
            } else {
                if (isset($_POST['save'])) {
                    echo htmlentities($domain) . ' ' . $success . "\r\n";
                }
                
                else if (isset($_POST['csv'])) {
                    echo $domain . ',' . $success;
                    echo "\r\n";
                } else {
                    echo '<div class="row"><div class="cellout fivecol"><span>' . htmlentities($domain) . '</span></div><div class="cellout fivecol">' . $language['available'] . '</span></div><div class="cellout fivecol"><a href="http://www.godaddy.com" target="_blank">Register this domain?</a></span></div></div>';
                }
            }
            flush();
        }
        if ((isset($_POST['save'])) || (isset($_POST['csv'])) && (!$isEmail))
            exit;
        else if (!$isEmail)
            echo '<br>' . $language['completed'] . '</p>';
    }
}
/*
if ($emailResults)
{
while (ob_get_level() !== 0)
ob_end_clean();
echo $language['processing'];
$_POST['save'] = 'yes';
$_POST['domains'] = file_get_contents($emailFile);
$_POST['onlyavailable'] = 'onlyavailable';
ob_start();
processSubmit(true);
$results = ob_get_clean();
if (trim($results) != '')
{
mail($emailEmail,$emailSubject,$results);
echo $language['emailed'];
}
echo $language['done'];
exit;
}
*/
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Bulk Domain Tools | Bulk Whois Domain Lookup | Bulk Pagerank Checker | Bulk Alexa Rank</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="keywords" content="Search, Domains, Tools, Bulk, Alexa, Rank, Checker, Pagerank Checker, Domain finder, Available, Whois, Lookup" />
	<meta name="description" content="Bulk Domain Tools offers this amazing script for just $10 on codecanyon! Bulk domain whois lookup, Bulk Alexa Rank Checker and Bulk Pagerank Checker all in one script!" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="styles/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="styles/css/style2.css" rel="stylesheet" type="text/css"/>
	<link href="styles/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="styles/css/tabs.css" rel="stylesheet" type="text/css"/>
	<link href="styles/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="styles/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52743638-1', 'auto');
  ga('send', 'pageview');

</script>

	<style>
	.table {width: 100%; height: 100%;}
	.row:first-child {  }
	.row {width: 95%; min-height: 1px; height: auto; margin: 0; padding:10px; border-top: 1px solid #ddd;}

	.cell {float: left; margin: 0; padding:0; padding-top:0px;}
	.fivecol {width: 20%;}	
	
	.cellout {float: left; margin: 0; padding:0; padding-top:0px;}
	.fivecol {width: 20%;}
	
	.nav-tabs > li, .nav-pills > li {
	float:none;
	display:inline-block;
	*display:inline; /* ie7 fix */
	zoom:1; /* hasLayout ie7 trigger */
	}
	.nav-tabs {
	text-align:center;
	}
	</style>
	<!-- END GLOBAL MANDATORY STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
	
</head>
<body>			
			
<div class="row-fluid">
<div class="span12">
<!-- BEGIN PORTLET-->  
 
<div class="portlet box blue">
<div class="portlet-title">
<div class="caption"><i class="icon-reorder"></i>Bulk Domain Tools</div>
</div>
</div>
<br/>
<div style="text-align: center"><a target='_blank' href="http://codecanyon.net/item/bulk-whois-domain-availability-checker-script/6446220"><img src="buynow.png"></a></div>
<br/>
<ul class="nav nav-tabs" role="tablist" id="myTab">
<li class="active"><a href="#home" role="tab" data-toggle="tab">Bulk Domain Check</a></li>
<li><a href="#whois" role="tab" data-toggle="tab">Whois Checker</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane fade in active" id="home"><!--TAB 1-->
<div class="portlet-body form">
<div class="organ">
<!-- Nav tabs -->
<br/>
<p class="firstp">This script built designed and developed by <a href="http://codecanyon.net/user/ceb123a?ref=ceb123a"target='_blank'>ceb123a on CodeCanyon.</a></p>
<p class="firstp">
Enter a list of domains to check availability, <b>one per line</b>. The best way to use this script is to tick both check boxes so that a txt file is downloaded with only available domains in it. Always open the txt file instead of saving it when downloading the domains into a txt file.</p>
<p class="firstp">
Export to csv to see all the page rank and alexa rank results or <b>leave all the checkboxes unchecked to display all the results in html!</b>
</p>
<p class="firstp">This script has been set to a maximum of 5 domains checkable for spamming reasons.</p>
<br/>
<p class="firstp">
<b>Maximum Domains Checkable : <?php
if (MAX_DOMAINS_AT_ONE_TIME == -1) {
    echo 'Unlimited';
} else {
    echo MAX_DOMAINS_AT_ONE_TIME;
}
?>
	</b>&nbsp;<em style="font-size:10px;">(*BUY THE SCRIPT TO SET THIS TO UNLIMITED!*)</em>
</p>
<br/>		

<!-- BEGIN FORM-->

<form action="#bulkdomain" id="form-username" method="post" style="width:100%; margin:0px auto; height:300px;" class="form-horizontal">

<div class="control-group">
<div class="controls" style="float:left; ">
<table border="0" style="margin: 0px auto;" bordercolor="#fff" style="background-color:#fff"  cellpadding="0" cellspacing="0">
<tr>
<td><textarea class="span6 m-wrap" rows="3"name="domains" style="height:150px; width:600px;"><?php
if (isset($_REQUEST['domains'])) {
    echo $_REQUEST['domains'];
} else {
?><?php
}
?></textarea></td>
<td><input type="submit" class="btn green" style="height:150px;"name="submit" value="<?php
echo $language['check_availability'];
?>"></td>
</tr>
</table>
</div>
</div>
								
<div class="checkboxfix">
<div class="control-group " style=" display: inline-block; float: none;  margin: auto;  text-align: center;">
<label for="onlyavailable" class="control-label"> <?php
echo $language['only_available'];
?></label>									
<br/>
<div class="controls">
<input type="checkbox" style="float:right;" name="onlyavailable" value="onlyavailable" id="onlyavailable" />&nbsp;
</div>
</div>

<div class="control-group " style=" display: inline-block;
    float: none;
    margin: auto;
    text-align: center;">
<label class="control-label" for="save" style=""><?php
echo $language['save_as_text_file'];
?></label>
<br/>
<div class="controls">
<input type="checkbox" style="float:right;" name="save" value="save" id="save" />&nbsp;
</div>
</div>

<div class="control-group " style=" display: inline-block;
    float: none;
    margin: auto;
    text-align: center;">
<label class="control-label" for="csv" style="" data-labelPosition="left">Save Results as a CSV</label>
<br/>
<div class="controls">
<input type="checkbox" style="float:right;" name="csv" value="csv" id="csv" />&nbsp;
</div>
</div>

</div>
<!-- END FORM--> </form>
</div>
</div>
<!-- END FORM--> </form>
<?php
if (isset($_POST['domains'])) {
?>
<div style="background:#F6F6F6; border: 1px solid #BFC7D9; border-radius:10px; padding:10px; width:800px; margin:auto; margin-bottom:60px;">
<div class="table">
<?php
    processSubmit();
?>
</div>
</div>	<?php
}
?>
</div><!--END OF TAB 1-->

<div class="tab-pane fade" id="whois"><!--TAB 2-->
<div class="portlet-body form">
<div class="organ">

<p class="firstp">
Type the domain you want to whois into the input field.</p>
<br/>

<form  id="form-username" method="POST" style="width:100%; margin:0px auto; height:100px;" class="form-horizontal">
<div class="control-group">
<div class="controls" style="float:left; ">
<table border="0" style="margin: 0px auto;" bordercolor="#fff" style="background-color:#fff"  cellpadding="0" cellspacing="0">
<tr>
<td><input type="text" class="form-control" class="span6 m-wrap" rows="3"name="whoisdom" style="height:40px; width:600px;"  placeholder="example.com">
</td>
<td><input type="submit" class="btn green" style="height:50px;"name="test"  value="Check"></td>
</tr>
</table>

</div>
</div>

</form>

<?php
require("whois.inc.php");

if (isset($_POST['whoisdom'])) {
    
    $whodom = $_POST['whoisdom'];
    $whois  = new Whois;
    echo '<pre>' . $whois->whoislookup($whodom) . '</pre>';
} else {
?>

<?php
    echo '<pre>Please enter a domain</pre>';
}


?>


</div>
</div>
</div><!-- END OF TAB 2-->

</div>
			
<script>
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
	

    // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');
</script>			

</div>
</div>
</body>
</html>