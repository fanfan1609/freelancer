<?php
include 'checkdomain.php';
if(isset($_POST['domain'])){
	$domains = explode("\n", $_POST['domain']);
	$Domain = new DomainAvailability();
	if( count($domains) > 0){
		$domains = array_filter($domains,'domain_availability');
		$availables = array();
		foreach($domains as $i => $domain){
			if( $Domain->is_available($domain) ) {
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
    	$rs[$domain]=0;
    } else {
    	$rs[$domain]=1;
    }
	return $rs[$domain]==1;
}

function domain_check($domain){
	return @checkdnsrr($domain,"ANY") == false;
}