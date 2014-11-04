<?php
include 'checkdomain.php';
if(isset($_POST['domain'])){
	$domains = explode("\n", $_POST['domain']);
	// $Domain = new DomainAvailability();
	if( count($domains) > 0){
		$domains = array_filter($domains,'domain_availability');
		$availables = array();
		foreach($domains as $domain){
			if( isDomainAvailable($domain) ) {
				$availables[] = $domain;
			}
		}
		// $domains = array_filter($domains,'domain_check');
		echo implode("\n", $availables);
	} else {
		echo "";
	}	
}


function domain_availability($domain){
	$ns=  @dns_get_record(trim($domain),DNS_NS);
    if(count($ns)){
    	return false;
    } else {
    	return true;
    }
	return false;
}

function domain_check($domain){
	return @checkdnsrr($domain,"ANY") == false;
}