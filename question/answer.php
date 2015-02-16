<?php
function answer_1($answer)
{
	if(trim($answer) == 'B2B (Business-to-Business)')
	{
		return "Since you're primarily working <strong>B2B</strong>, I think you already know that you know that the Buying process has changed so much that you'll have to adopt Marketing Automation in order to have a functioning process for acquiring more sales qualified leads via both inbound and outbound marketing.	You have definitely come to the right place!
		";
	} else {
		return "Since you're primarily working <strong>B2C</strong>, you should know that everything that is said about Marketing Automation is worthwhile for you also if you work B2C and if the worth of what you're selling is rather high (often >€1000). If the value of what you're selling is below, you can still use it, but then you should use it combination with e-commerce. Contact us to know more!";
	}
}

function answer_2($answer)
{
	$output = '';
	
	switch (trim($answer)) {
		case 'Our time & knowledge':
			$output = "Whenever you primarily sell <strong>your time & knowledge</strong>, it's difficult to keep sales levels up at a constant high level, since those who will be best at selling are also those who will need to deliver, and it's easy to end up in a situation where you will need to hunt for sales only when you've delivered fully leading to a roller coaster ride of ups and downs in the influx of new customers. Marketing Automation is key to allow your organization to cultivate and harvest riper leads at a more constant pace through lead nurturing and scoring. Even if it may never be possible to make a consultant the most proactive sales person, Otto's abilities to let all users in an organization be the senders for communication to their respective contacts make them at least REACTIVE as sales representatives.";
			break;
		case 'Products that most of our clients generally know and understand well':
			$output = 'When you sell <strong>products that your customers will know well</strong>, you may not need the lead nurturing capabilities of Marketing Automation. In order to stay top of mind with your clients, you will however have good use of the possibility to see which customers are most ripe using the lead scoring mechanisms of Otto as well as the management of the contacts you have.';
			break;
		case 'Complex products – It takes time for our clients to understand the true value of our products':
			$output = 'Whenever you sell <strong>Complex Products</strong>, the lead nurturing and scoring capabilities of Marketing Automation are keys to be able to convey to your customers your value add, and it will allow you to score leads to know with whom to begin.';
			break;
		default:
			break;
	}
	return $output;
}


function answer_4($answer)
{
	$output = '';
	if( strpos($answer, 'Direct mail'))
	{
		$output .= "Since <strong>direct emailing</strong> is one of your ways to work with sales today Otto can help you with making this process much more efficient. Otto is an automated costumer acquisition system that allows you to send mass e-mails that are personalized based on the registered information from your target. Another function is that the mass e-mails can automatically be sent from the personal e-mailadresses of your sellstaff without them having to lift a finger. <br>";
	}
	if( strpos($answer, 'Participating in trade shows / other events'))
	{
		$output .= "Only a few companies actually maximize the benefits from <strong>participating at a trade show or event</strong>. Otto makes it possible for you to actually make use of all the contacts you make during that kind of events by registering them into Otto, the automated customer acquisition system. <br>";
	}
	if( strpos($answer, 'E-mail marketing'))
	{
		$output .= "Make your work with <strong>e-mail marketing</strong> more efficient, with Otto your mass e-mails will not end up in a trashbox, the reciever will feel selected since the e-mails are personalized and you will be able to see what actions are caused by your promotions or information. <br>";
	}
	if( strpos($answer, 'Web / SEO – Search Engine Optimization via Blogs, Content Marketing, Active in Social Media (Facebook, Twitter, LinkedIn, etc.)'))
	{
		$output .= "You have obviously realized the benefit with traffic on your website but how about monitoring the traffic, capturing the visitors and convering them into real contacts that become customers? All this is possible with help from Otto who is a automated customer acquisiton system, he does all this automatically for you and your company.";
	}
	// switch (trim($answer)) {
	// 	case 'Direct mail':
	// 		$output = "Since <strong>direct emailing</strong> is one of your ways to work with sales today Otto can help you with making this process much more efficient. Otto is an automated costumer acquisition system that allows you to send mass e-mails that are personalized based on the registered information from your target. Another function is that the mass e-mails can automatically be sent from the personal e-mailadresses of your sellstaff without them having to lift a finger. ";
	// 		break;
	// 	case 'Participating in trade shows / other events':
	// 		$output = 'Only a few companies actually maximize the benefits from <strong>participating at a trade show or event</strong>. Otto makes it possible for you to actually make use of all the contacts you make during that kind of events by registering them into Otto, the automated customer acquisition system.';
	// 		break;
	// 	case 'E-mail marketing':
	// 		$output = 'Make your work with <strong>e-mail marketing</strong> more efficient, with Otto your mass e-mails will not end up in a trashbox, the reciever will feel selected since the e-mails are personalized and you will be able to see what actions are caused by your promotions or information.';
	// 		break;
	// 	case 'Web / SEO – Search Engine Optimization via Blogs, Content Marketing, Active in Social Media (Facebook, Twitter, LinkedIn, etc.)':
	// 		$output = 'You have obviously realized the benefit with traffic on your website but how about monitoring the traffic, capturing the visitors and convering them into real contacts that become customers? All this is possible with help from Otto who is a automated customer acquisiton system, he does all this automatically for you and your company.';
	// 		break;		
	// 	default:
	// 		$output = 'NEED HELP WITH THIS ONE';
	// 		break;
	// }
	return $output;
}

function answer_5($answer)
{
	$output = '';
	if( strpos($answer, 'More direct (physical) mail'))
	{
		$output .= "Since you'll use <strong>Direct Marketing</strong>, you'll benefit from the QR-codes and the short PURLs (Personal URLs) that Otto&reg; will give you on the form <b>be2.co/yxkhg3</b> which will help you track contacts & their actions.<br>";
	}
	if( strpos($answer, 'More participation in trade shows / events'))
	{
		$output .= "You are planning to focus <strong>more on participating at trade shows/events</strong>, your perfect companion while doing this is Otto. Make sure to register all your new potential customers in the system and Otto takes over from their transforming them in to sales qualified leads.<br>";
	}
	if( strpos($answer, 'More E-mail marketing'))
	{
		$output .= "If you want to focus <strong>more on E-mail marketing</strong>, Otto is the way to go. With Otto you can do e-mail marketing without your e-mails risking to end up in the trashbox. The e-mails are personalized based on the information about the receiver and you can choose to send them from personal e-mailadresses to memebers of your sales staff.<br>";
	}
	
	// switch (trim($answer)) {
	// 	case 'More direct (physical) mail':
	// 		$output = "Since you'll use <strong>Direct Marketing</strong>, you'll benefit from the QR-codes and the short PURLs (Personal URLs) that Otto&reg; will give you on the form <b>be2.co/yxkhg3</b> which will help you track contacts & their actions.";
	// 		break;
	// 	case 'More participation in trade shows / events':
	// 		$output = 'You are planning to focus <strong>more on participating at trade shows/events</strong>, your perfect companion while doing this is Otto. Make sure to register all your new potential customers in the system and Otto takes over from their transforming them in to sales qualified leads.';
	// 		break;
	// 	case 'More E-mail marketing':
	// 		$output = 'If you want to focus <strong>more on E-mail marketing</strong>, Otto is the way to go. With Otto you can do e-mail marketing without your e-mails risking to end up in the trashbox. The e-mails are personalized based on the information about the receiver and you can choose to send them from personal e-mailadresses to memebers of your sales staff.';
	// 		break;
	// 	default:
	// 		$output = 'NEED HELP WITH THIS ONE';
	// 		break;
	// }
	return $output;
}

function answer_7($answer)
{
	$output = '';
	switch (trim($answer)) {
		case 'Tend to do 100% of Marketing yourself':
			$output = "Otto is a company's best friend, since you are doing most of the marketing work Otto is the perfect companion. It is easy to work with, you have access to support, and your can easily monitor your marketing work and follow the progress at the same time as you easily reach a broader market in a personalized way that makes the receiver feel selected.";
			break;
		case 'Tend to retain control internally but outsource certain marketing tasks.':
			$output = "We offer marketing services, through us you can rent a marketer that applies our marketing concept on your company while giving you reports on weekly basis that enables you to follow your firms marketing progress.";
			break;
		case 'Tend to outsource as much as possible':
			$output = "We offer marketing services, through us you can rent a marketer that applies our marketing concept on your company while giving you reports on weekly basis that enables you to follow your firms marketing progress.";
			break;
		default:
			break;
	}
	return $output;
}

function answer_8($answer)
{
	$output = '';
	switch (trim($answer)) {
		case 'Most are our clients already':
			$output = "With help from Otto you can easily launch campaigns at a low cost and try to find customers outside todays market. You can also work with nurturing and informing the clients you already  have creating a desire to consume more of your services or products than before.";
			break;
		case 'Many will know us, but not all':
			$output = "By using Otto you get the opportunity to educate and create desire at all the potential customers that don't know you yet in a cost-effective way. When it comes to the potentai customers that already know you, Otto will convince them that you are the right choice by working with the drip marketing concept.";
			break;
		case 'Only a few will know us at the start of our sales process':
			$output = "By using Otto you get the opportunity to educate and create desire at all the potential customers that don't know you yet in a cost-effective way.";
			break;
		case 'Basically no one know of us':
			$output = "By using Otto you get the opportunity to educate and create desire at all the potential customers that don't know you yet in a cost-effective way. Otto does all this and much more partially by working with automated drip marketing.";
			break;
		default:
			break;
	}
	return $output;
}

function answer_9($answer)
{
	$output = '';
	if( strpos($answer, 'Get more new sales qualified leads'))
	{
		$output .= "One of the things you want to do is to <strong>get more sales qualified leads</strong>, Otto is created to do that. You can look at Otto as a qualified lead generator that deliver qualified leads by capturing website visitors and working with other contacts that you get from events or other occasions, most of it gets done automatically and is based on the drip marketing concept. You can easily monitor all your leads and see in what stage they are on their way of becoming customers.<br>";
	}
	if( strpos($answer, 'Convert more websites visitors into leads'))
	{
		$output .= "<strong>To convert website visitors</strong> is one of the functions that Otto has, beside this he also allows you to monitor and track the activities of your visitor. But Otto does not stop after converting, since he is an automated customer acquiziton system he starts nurturing and educating the lead by personalized emails with the goal of delivering a new costumer.<br>";
	}
	if( strpos($answer, 'To better follow up existing leads and customers to make them buy more'))
	{
		$output .= "If you want to <strong>follow up existing leads and customers to make them buy more</strong>, then you and Otto are going to be great friends! Otto does this in a smooth and efficient way by focusing on building long term relationships with your costumers and transforming them to frequent buyers and returning costumers.<br>";
	}
	if( strpos($answer, 'Reduce  the time of prospecting for sales'))
	{
		$output .= "Otto <strong>reduces the time of prospecting</strong> and gives you a lot of free time that your sales staff actually can use for selling. Since Otto does most of the prospecting work you only have to pick the sales qualified leads and contact them if they have not already initiated the contact.<br>";
	}
	if( strpos($answer, "Get better track of customers' decision / buying process"))
	{
		$output .= "<strong>To track and monitors the costumers decision and buying process</strong> is easily made with Otto which enables you to get a complete overall view of how the costumers react after promotions or how what they do on your website and what actions that causes.<br>";
	}
	// switch (trim($answer)) {
	// 	case 'Get more new sales qualified leads':
	// 		$output = "One of the things you want to do is to <strong>get more sales qualified leads</strong>, Otto is created to do that. You can look at Otto as a qualified lead generator that deliver qualified leads by capturing website visitors and working with other contacts that you get from events or other occasions, most of it gets done automatically and is based on the drip marketing concept. You can easily monitor all your leads and see in what stage they are on their way of becoming customers.";
	// 		break;
	// 	case 'Convert more websites visitors into leads':
	// 		$output = "<strong>To convert website visitors</strong> is one of the functions that Otto has, beside this he also allows you to monitor and track the activities of your visitor. But Otto does not stop after converting, since he is an automated customer acquiziton system he starts nurturing and educating the lead by personalized emails with the goal of delivering a new costumer.";
	// 		break;
	// 	case 'To better follow up existing leads and customers to make them buy more':
	// 		$output = "If you want to <strong>follow up existing leads and customers to make them buy more</strong>, then you and Otto are going to be great friends! Otto does this in a smooth and efficient way by focusing on building long term relationships with your costumers and transforming them to frequent buyers and returning costumers.";
	// 		break;
	// 	case "Reduce  the time of prospecting for sales":
	// 		$output = "Otto <strong>reduces the time of prospecting</strong> and gives you a lot of free time that your sales staff actually can use for selling. Since Otto does most of the prospecting work you only have to pick the sales qualified leads and contact them if they have not already initiated the contact.";
	// 		break;
	// 	case "Get better track of customers' decision / buying process":
	// 		$output = "<strong>To track and monitors the costumers decision and buying process</strong> is easily made with Otto which enables you to get a complete overall view of how the costumers react after promotions or how what they do on your website and what actions that causes.";
	// 		break;
	// 	default:
	// 		break;
	// }
	return $output;
}

function answer_10($answer)
{
	$output = '';
	switch (trim($answer)) {
		case "Don’t know much, but would like to know more about it.":
			$output = "Webinar, website, book a meeting";
			break;
		case 'Have heard about it, and would like to know more about how it could work for us.':
			$output = "webinar- book a meeting- contact details";
			break;
		case "I understand the principle behind the process or systems, and have some ideas about how to use it, but haven’t started yet.":
			$output = "Book a meeting or contact details";
			break;
		case "I use it, but would like to get more out of it.":
			$output = "Webinar-book a meeting";
			break;
		case "I know it fairly well, and use it regularly.":
			$output = "Contact details- webinar";
			break;
		default:
			break;
	}
	return $output;
}


function answer_11($answer)
{
	$output = '';
	switch (trim($answer)) {
		case "No, and since we mainly have consumers or small businesses, I don’t think it’s applicable for me.":
			$output = "Don't do a mistake by thinking that the Otto concept doesn't work for you who work with small businesses or consumers, we have clients in the same situation that bases their entire sales process on Otto and it works great! ";
			break;
		case 'No, but it might be useful for us to get more leads.':
			$output = "You will get more leads if you make sure that you get involved, start by signing up on a webinar!";
			break;
		case "Yes, Enecto ProspectFinder":
			$output = "Since you already use Enecto ProspectFinder, you should know that there's a direct integration with Otto&reg; such that your web-site visitors can be written directly into Otto, and you have three choices to read in which individuals would be behind your web-visits: 
			<ul>
				<li>call and find out yourself,</li>
				<li>Let Softtalk call and chase them for €25/contact, or</li>
				<li>automatically read contact details to leading company officials from Bisnode at about €1 per contact.</li>
			</ul>";
			break;
		default:
			break;
	}
	return $output;
}

function answer_12($answer)
{
	$output = '';
	switch (trim($answer)) {
		case "No, but we may start to.":
			$output = "From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 4 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		case 'Yes, we use Outlook to do it.':
			$output = "From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 4 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		case "Yes, we use our CRM-system to do it.":
			$output = "From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 4 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		case 'Yes, we use Apsis to do it.':
			$output = "From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 4 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		case 'Yes, we use Mailchimp to do it.':
			$output = "From Otto&reg; you could send Newsletters as well, but more importantly, at least three clients have tried it against Mailchimp and found 4-5 times better action due to each mail being built and sent one-by-one from Otto with the real e-mail of one (or many) senders to the contacts of each as if it was sent directly from Outlook. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		default:
			if(strpos($answer, 'Yes, we use another system'))
			{
				$output = "From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 4 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			}
			break;
	}
	return $output;
}

function answer_13($answer)
{
	$output = '';
	switch (trim($answer)) {
		case "Yes, we use Salesforce.":
			$output = "<strong>Salesforce</strong> Integration: You can easily integrate Salesforce directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Salesforce.";
			break;
		case 'Yes, we use Microsoft Dynamics.':
			$output = "<strong>Microsoft Dynamics CRM</strong> Integration: You can easily integrate Dynamics directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Dynamics.";
			break;
		case "Yes, we use SugarCRM.":
			$output = "<strong>SugarCRM</strong> Integration: You can easily integrate SugarCRM directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in SugarCRM";
			break;
		case 'Yes, we use SuperOffice.':
			$output = "<strong>Superoffice</strong> Integration: You can easily integrate Superoffice directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Superoffice.";
			break;
		case 'Yes, we use Lundalogik.':
			$output = "<strong>Lundalogik</strong> Integration: You can easily integrate Lundalogik directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Lundalogik.";
			break;
		case 'Yes, we use Upsales':
			$output = '<strong>Upsales</strong> Integration: You can easily integrate Upsales directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Upsales. ';
			break;
		default:
			if(strpos($answer, 'Yes, we use'))
			{
				$output = "<strong>CRM</strong> Integration: You can easily integrate your CRM-system directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in the CRM.";
			}
			break;
	}
	return $output;
}
