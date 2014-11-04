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