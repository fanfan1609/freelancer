<?php
//specify TLDs in lower case
$ext = array(
//	'.EXT' 		=> array('WHOIS SERVER NAME','Text To Match for Available Domain'),
	'.com' 		=> array('whois.crsnic.net','No match for'),
	'.net' 		=> array('whois.crsnic.net','No match for'),	  
	'.org' 		=> array('whois.publicinterestregistry.net','NOT FOUND'),	
	'.us' 		=> array('whois.nic.us','Not Found'),
	'.biz' 		=> array('whois.biz','Not found'),
	'.info' 	=> array('whois.afilias.net','NOT FOUND'),	
	'.mobi'		=> array('whois.dotmobiregistry.net', 'NOT FOUND'),
	'.tv' 		=> array('whois.nic.tv', 'No match for'),
	'.in' 		=> array('whois.inregistry.net', 'NOT FOUND'),
	'.co.uk' 	=> array('whois.nic.uk','No match'),		
	'.co.ug' 	=> array('wawa.eahd.or.ug','No entries found'),	
	'.or.ug' 	=> array('wawa.eahd.or.ug','No entries found'),
	'.sg' 		=> array('whois.nic.net.sg','Domain Not Found'),	
	'.com.sg' 	=> array('whois.nic.net.sg','Domain Not Found'),	
	'.per.sg' 	=> array('whois.nic.net.sg','Domain Not Found'),	
	'.org.sg' 	=> array('whois.nic.net.sg','Domain Not Found'),	
	'.com.my' 	=> array('whois.mynic.net.my','does not Exist in database'),	
	'.net.my' 	=> array('whois.mynic.net.my','does not Exist in database'),	
	'.org.my' 	=> array('whois.mynic.net.my','does not Exist in database'),	
	'.edu.my' 	=> array('whois.mynic.net.my','does not Exist in database'),	
	'.my' 		=> array('whois.mynic.net.my','does not Exist in database'),		
	'.nl' 		=> array('whois.domain-registry.nl','not a registered domain'),
	'.ro' 		=> array('whois.rotld.ro','No entries found for the selected'),
	'.com.au'	=> array('whois-check.ausregistry.net.au',"Available\n"),
	'.net.au'	=> array('whois-check.ausregistry.net.au',"Available\n"),
	'.ca' 		=> array('whois.cira.ca', 'AVAIL'),
	'.org.uk'	=> array('whois.nic.uk','No match'),
	'.name' 	=> array('whois.nic.name','No match'),
	'.ac.ug' 	=> array('wawa.eahd.or.ug','No entries found'),
	'.ne.ug' 	=> array('wawa.eahd.or.ug','No entries found'),
	'.sc.ug' 	=> array('wawa.eahd.or.ug','No entries found'),
	'.ws'		=> array('whois.website.ws','No Match'),
	'.be' 		=> array('whois.ripe.net','No entries'),
	'.com.cn' 	=> array('whois.cnnic.cn','no matching record'),
	'.net.cn' 	=> array('whois.cnnic.cn','no matching record'),
	'.org.cn' 	=> array('whois.cnnic.cn','no matching record'),
	'.no'		=> array('whois.norid.no','no matches'),
	'.se' 		=> array('whois.nic-se.se','No data found'),
	'.nu' 		=> array('whois.nic.nu','NO MATCH for'),
	'.com.tw' 	=> array('whois.twnic.net','No such Domain Name'),
	'.net.tw' 	=> array('whois.twnic.net','No such Domain Name'),
	'.org.tw' 	=> array('whois.twnic.net','No such Domain Name'),
	'.cc' 		=> array('whois.nic.cc','No match'),
	'.nl' 		=> array('whois.domain-registry.nl','is free'),
	'.pl' 		=> array('whois.dns.pl','No information about'),
	'.eu' 		=> array('whois.eu','Status:	AVAILABLE'),
	'.pt' 		=> array('whois.dns.pt','No match'),
	'.com.na' 		=> array('whois.na-nic.com.na','Not registered'),
	'.na' 		=> array('whois.na-nic.com.na','Not registered'),
	'.de' 		=> array('whois.denic.de','Status: free'),
	'.at' 		=> array('whois.nic.at','% nothing found'),	
	'.ch' 		=> array('whois.nic.ch','do not have an entry in our database matching'),	
	'.li' 		=> array('whois.nic.ch','do not have an entry in our database matching'),	
	'.se' 		=> array('whois.iis.se','not found') 
);
?>