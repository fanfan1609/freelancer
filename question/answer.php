<?php
function answer_1($answer)
{
	if(trim($answer) == 'B2B (Business-to-Business)')
	{
		return "<b>An absolute must for B2B-sales</b><br>Since you're primarily working B2B, I think you already see that the Buying Process of your customers has changed into doing much more research, particularly on-line, before a contact is made with suitable suppliers.  This means that you need a thorough process to catch also this early interest. The lead capturing, nurturing and scoring capabilities of Marketing Automation will give you an edge in having a functioning process for acquiring more sales qualified leads via both inbound and outbound marketing. You have definitely come to the right place!";
	} else {
		return "<b>A perfect booster for B2C-sales</b><br>Since you're primarily working B2C, you should know that everything that is said about Marketing Automation is worthwhile for you also if you work B2C and if the worth of what you're selling is rather high (often >€1000). If the value of what you're selling is below, you can still use it, but then you should use it in combination with e-commerce. Contact us to know more!";
	}
}

function answer_2($answer)
{
	$output = '';
	
	switch (trim($answer)) {
		case 'Our time & knowledge':
			$output = "<b>Impossible to make consultants sell Proactively? Make them do it <i>Reactively</i></b><br>Whenever you primarily sell your time & knowledge, it's difficult to keep sales levels up at a constant high level, since those who will be best at selling are also those who will need to deliver. It's easy to end up in a situation where you will need to hunt for sales only when you've delivered fully. This often leads to a roller coaster ride of ups and downs in the influx of new customers. Marketing Automation is key to allow your organization to cultivate and harvest riper leads at a more constant pace through lead nurturing and scoring. Even if it may never be possible to make a consultant the most proactive sales person, Otto's abilities to let all users in an organization be the senders of communication to their respective contacts make them at least REACTIVE as sales representatives since they will also each get the replies and a direct report on 'These 17 of my 63 contacts are so interested in this topic that they fulfilled a simple action such as a click to know more'.";
			break;
		case 'Products that most of our clients generally know and understand well':
			$output = '<b>Scoring is everything</b><br>When you sell products that your customers will know well, you may not need the lead nurturing capabilities of Marketing Automation. In order to stay top of mind with your clients, you will however have good use of the possibility to see which customers are most ripe using the lead scoring mechanisms of Otto.';
			break;
		case 'Complex products – It takes time for our clients to understand the true value of our products':
			$output = '<b>The key to selling Complex Products</b><br>Whenever you sell Complex Products, the lead nurturing and scoring capabilities of Marketing Automation are keys to be able to convey to your customers your value add, and it will allow you to score leads so you know with whom to begin to strike while the iron is hot to quicken the process to sale and profits.';
			break;
		default:
			break;
	}
	return $output;
}


function answer_4($answer)
{
	$output = '';
	// if( strpos($answer, 'Direct mail'))
	// {
	// 	$output .= "<i class='fa fa-paper-plane'></i>Since direct emailing is one of your ways to work with sales today Otto can help you with making this process much more efficient. Otto is an automated customer acquisition system that allows you to send mass e-mails that are personalized based on the registered information from your target. Another function is that the mass e-mails can automatically be sent from the personal e-mailadresses of your sellstaff without them having to lift a finger. <br>";
	// }
	// if( strpos($answer, 'Participating in trade shows / other events'))
	// {
	// 	$output .= "<i class='fa fa-paper-plane'></i>Only a few companies actually maximize the benefits from participating at a trade show or event. Otto makes it possible for you to actually make use of all the contacts you make during that kind of events by registering them into Otto, the automated customer acquisition system.<br>";
	// }
	// if( strpos($answer, 'E-mail marketing'))
	// {
	// 	$output .= "<i class='fa fa-paper-plane'></i>Make your work with e-mail marketing more efficient, with Otto your mass e-mails will not end up in a trashbox, the reciever will feel selected since the e-mails are personalized and you will be able to see what actions are caused by your promotions or information.<br>";
	// }
	// if( strpos($answer, 'Web / SEO – Search Engine Optimization via Blogs, Content Marketing, Active in Social Media (Facebook, Twitter, LinkedIn, etc.)'))
	// {
	// 	$output .= "<i class='fa fa-paper-plane'></i>You have obviously realized the benefit with traffic on your website but how about monitoring the traffic, capturing the visitors and convering them into real contacts that become customers? All this is possible with help from Otto who is a automated customer acquisiton system, he does all this automatically for you and your company. <br>";
	// }
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
	// $output = '';
	$output = array();
	if( strpos($answer, 'More direct (physical) mail') !== false )
	{
		$output[] = "<i class='fa fa-qrcode fablue' ></i> <b>Digital print marketing:</b> Since you'll use Direct Marketing, you'll benefit from the QR-codes and the short PURLs (Personal URLs) that Otto&reg; will give you on the form <b>be2.co/xyzabc</b> which will help you track contacts & their actions.<br>";

	}
	if( strpos($answer, 'More participation in trade shows / events') !== false)
	{
		$output[] = "<i class='fa fa-users fablue' ></i> <b>Event-followup:</b> Use Otto&reg; to register users for the seminars, webinars or other events you're throwing, and use it to follow-up from trade-shows. Make sure to register all your new potential customers in the system and Otto takes over from there making sure that each is followed-up and nurtured into sales qualified leads.<br>";
	}
	if( strpos($answer, 'More E-mail marketing') !== false)
	{
		$output[] = "<i class='fa fa-paper-plane fablue'></i> <b>E-mail marketing:</b> The unique architecture of Otto actually builds every e-mail one-by-one and includes both text and html-e-mails. This means your recipients are 3-5 times more likely to act since they can see exactly who is the sender (one or each of your representatives to his respective contacts) and using links that users dare to click on when they hover over them. Naturally, e-mails can still be personalized based on the information about the sender and receiver. You choose if it should look like a designed newsletter or as if you just sent it one and one from Outlook even if you actually sent it to 1000s.<br>";
	}
	if( strpos($answer, 'More Telemarketing / Meeting Booking') !== false )
	{
		$output[] = "<i class='fa fa-phone fagreen'></i> <b>Telemarketing:</b> To actually call potential clients are obviously among the best way to get real answers and customers. When you combine telemarketing with lead nurturing and scoring also using e-mail, print or sms, you will get 40-60% more of &quot;YES&quot; and you will know exactly which 15% it's worth to come back to.<br>";
	}
	if( strpos($answer, 'More PR / Content Marketing (Search Engine Optimization, Blogs, Facebook, Twitter etc.)') !== false)
	{
		$output[] = "<i class='fa fa-file-text-o fablue'></i> <b>Content Marketing:</b> When you spend time writing good content. You'll likely benefit greatly from it, but it can be tricky to monitor what its worth unless you measure the RoI also from the time you spend. You'll also want to be sure to use the content as news you send out, and by using Otto, you can also get double the effect as much material also can be re-used for long-term lead nurturing sequences.";
	}
	if( strpos($answer, 'More on-line advertizing (Google Adwords, Facebook, LinkedIn, Media houses)') !== false )
	{
		$output[] = "<i class='fa fa-google faorange'></i> <b>Web Marketing:</b> You have obviously realized the benefit with traffic to your website but how about monitoring the traffic, capturing the visitors and converting them into real contacts that become customers where you can measure the RoI? All this is possible with the help from Otto working as your automated customer acquisiton system.";
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

function answer_6($answer)
{
	$output = '';
	if( strpos($answer, 'I work alone') !== false )
	{
		$output = "<b>Otto &ndash; Your new companion</b><br>Since you are doing most of the marketing work yourself, Otto will be your perfect companion. It is easy to work with, you have access to support, and your can easily monitor your marketing work and follow the progress at the same time as you easily reach a broader market in a personalized way that makes the receivers feel selected and you'll ultimately get much more done.";
	}
	return $output;
}

function answer_7($answer)
{
	$output = '';
	switch (trim($answer)) {
		case 'Tend to do 100% of Marketing yourself':
			$output = "<b>Easy to use</b><br>Since you are doing most of the marketing work in-house, Otto is the perfect companion. It is easy to work with, has a built-in gamified tutorial and you have access to support if needed. You can then easily monitor your marketing effect and follow the progress at the same time as you easily reach a broader market while saving time for yourself.";
			break;
		case 'Tend to retain control internally but outsource certain marketing tasks.':
			$output = "<b>Do-it-Yourself or Rent-a-Marketer?</b><br>Otto is easy to work with and have a gamified tutorial and you can expect good phone and e-mail support when you decided to implement all campaigns yourself. If you prefer us to do it, our Rent-a-Marketer service can most often do at least 80% of a full-time employee when it comes to lead-generation, but during only 20% of the time, leading to a great effect at lowest possible cost.";
			break;
		case 'Tend to outsource as much as possible':
			$output = "<b>Get most out of it with Rent-a-Marketer</b><br>If you prefer to just have an automated sales and marketing function with no or as little work needed to be done internally, you might be interested in our Rent-a-Marketer service where you'll get the automatic help of the system Otto, and the manual campaigns you need implemented as well. Being specialized in lead-generation, our marketers can most often do at least 80% of a full-time employee, but during only 20% of the time, leading to a great effect at lowest possible cost.";
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
			$output = "<b>Dedicated to help you up-sell</b>You should work with Marketing Automation to nurture and informing the clients you already have to create a desire to consume more of your products or services. With the help from Otto you can also easily launch trial campaigns at a low cost to try to find customers outside todays market or to try out new products to your existing installed base. ";
			break;
		case 'Many will know us, but not all':
			$output = "<b>Up-sell or new sales primarily?</b><br>Is it more important for you to up-sell to existing clients, or to attract new leads? Otto help you do both: You should  work with Marketing Automation to nurture and informing the clients you already have to create a desire to consume more of your products or services. With the help from Otto you can also easily launch trial campaigns at a low cost to try to find customers outside todays installed base. ";
			break;
		case 'Only a few will know us at the start of our sales process':
			$output = "<b>Attracting and Converting new leads</b><br>When most of the market lies in front of you, and your potential clients may not know you yet, it's important to attract their attention and start to build a relationship with them. Otherwise, they'll certainly look elsewhere. Here, an automated Client Acquisition System like Otto will be imperative in order for you to attract, capture and convert your leads in the first phase, and then to nurture and score them up to becoming clients with an as minimal effort as possible from your side.";
			break;
		case 'Basically no one know of us':
			$output = "<b>Attracting and Converting new leads</b><br>When most of the market lies in front of you, and your potential clients may not know you yet, it's important to attract their attention and start to build a relationship with them. Otherwise, they'll certainly look elsewhere. Here, an automated Client Acquisition System like Otto will be imperative in order for you to attract, capture and convert your leads in the first phase, and then to nurture and score them up to becoming clients with an as minimal effort as possible from your side.";
			break;
		default:
			break;
	}
	return $output;
}

function answer_9($answer)
{
	$output = array();
	
	if( strpos($answer, 'Get more web-traffic') !== false)
	{
	$output[] = "<i class='fa fa-sort-amount-asc faorange'></i> <b>Getting more web traffic:</b> With the outbound marketing features of Otto, you can certainly drive significantly more traffic to your site. Now, of course, this is primarily to be able to score your leads and to move them further in your sales process. For completely new traffic, Otto will rather help you harness these, but still, the Rent-a-Marketer Managed Marketing Automation service of Sonician will certainly also help you to set up campaigns that will drive more traffic, too.
	";
	}
	if( strpos($answer, 'Get more new sales qualified leads') !== false)
	{
		$output[] = "<i class='fa fa-magnet fared' ></i> <b>Getting more sales qualified leads:</b> Otto will deliver qualified leads by capturing website visitors, following-up event participants and client discussions through communication a little at a time (also known as drip marketing or lead nurturing). This allows your leads to interact through answering and clicking what information is most interesting for them and thereby making them qualify themselves to a higher lead-score until you know it's worthwhile to interact on a more personal level to drive sales.<br>";
	}
	if( strpos($answer, 'Convert more websites visitors into leads') !== false)
	{
		$output[] = "<i class='fa fa-power-off fagreen'></i> <b>Converting web-visitors:</b><br>1) With most Marketing Automation systems, you can capture leads through call to actions to fill in forms. Naturally, you can do this in a simple way with Otto, too, and you can even do it in more advanced ways that most other systems can't handle, e.g. by showing the form at the end of a video in which you urge the visitor to leave his details. <br>2)However, Otto is even more unique in something very simple to set up that other systems can't do at all: Otto has the ability to capture the actual organization behind just a visitor's IP-address AND to find out the e-mail address of the job-function you want to reach when it comes to businesses so you can even follow-up automatically. The database extends across all of Europe so far with millions of up-to-date records. <br>";
	}
	if( strpos($answer, 'To better follow up existing leads and customers to make them buy more') !== false)
	{
		$output[] = "<i class='fa fa-exchange fablue' ></i> <b>Convert to sales:</b> If you want to follow up existing leads and customers to make them buy more, then you and Otto are going to be great friends! it's easy to set up long-term communication with our templates and suggestions, and then Otto will very efficiently help you build that long term relationship with your customers to transform them into frequent buyers and returning customers.<br>";
	}
	if( strpos($answer, 'Reduce  the time of prospecting for sales') !== false)
	{
		$output[] = "<i class='fa fa-clock-o faindigo'></i> <b>Save time:</b> The magazine <i>Sales Insights</i> claim that 10h/week of a sales-representative's time is spent prospecting, and only 16h actually talking to clients to close deals. In order to get more client-time, Otto will reduce the time of prospecting and follow-up. .<br>";
	}
	if( strpos($answer, "Get better track of the buying process of customers")!== false)
	{
		$output[] = "<i class='fa fa-heartbeat fared' ></i> <b>Finding out the buying-process</b> To track and monitor the customers' decision and buying process is easily made with Otto which enables you to get a complete overall view of how the customers react and interact after promotions and what they like on your website. It will even help you trigger new actions to e.g. ask them a very specific question only if they're interested in a particular piece of your content.<br>";
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
	// switch (trim($answer)) {
	// 	case "Do not know much, but would like to know more about it.":
	// 		$output = "Webinar, website, book a meeting";
	// 		break;
	// 	case 'Have heard about it, and would like to know more about how it could work for us.':
	// 		$output = "webinar- book a meeting- contact details";
	// 		break;
	// 	case "I understand the principle behind the process or systems, and have some ideas about how to use it, but have not started yet.":
	// 		$output = "Book a meeting or contact details";
	// 		break;
	// 	case "I use it, but would like to get more out of it.":
	// 		$output = "Webinar-book a meeting";
	// 		break;
	// 	case "I know it fairly well, and use it regularly.":
	// 		$output = "Contact details- webinar";
	// 		break;
	// 	default:
	// 		break;
	// }
	return $output;
}


function answer_11($answer)
{
	$output = '';
	switch (trim($answer)) {
		case "No, and since we mainly have consumers or small businesses, I do not think it is applicable for me.":
			$output = "";
			break;
		case 'No, but it might be useful for us to get more leads.':
			$output = "<i class='fa fa-play-circle-o fapurple'></i> <b>IP-tracking:</b> With Otto you can have web-site visitors from business organizations written directly into Otto, and you have three choices to start to communicate with the individuals behind your web-visits: <br>
				i) Call and find out yourself, <br>
				ii) Let Softtalk call and find out who to talk to, or<br>
				iii) Automatically read contact details with e-mail addresses to leading company officials from Bisnode so you can automatically start communicating with them.";
			break;
		case 'Yes, Vendemore':
			$output = "<i class='fa fa-play-circle-o fapurple'></i> <b>IP-tracking:</b> Since you already use Vendemore, you should know that there's a direct integration with Otto&reg; such that your web-site visitors can be written directly into Otto, and you have three choices to read in which individuals would be behind your web-visits: <br>
					i) call and find out yourself, <br>
					ii) Let Softtalk call and find out who to talk to, or<br>
					iii) Automatically read contact details with e-mail addresses to leading company officials from Bisnode so you can automatically start communicating with them.";
			break;
		case "Yes, Enecto ProspectFinder":
			$output = "<i class='fa fa-play-circle-o fapurple'></i> <b>IP-tracking:</b> Since you already use Enecto ProspectFinder, you should know that there's a direct integration with Otto&reg; such that your web-site visitors can be written directly into Otto, and you have three choices to read in which individuals would be behind your web-visits: <br>
					i) call and find out yourself, <br>
					ii) Let Softtalk call and find out who to talk to, or<br>
					iii) Automatically read contact details with e-mail addresses to leading company officials from Bisnode so you can automatically start communicating with them.";
			break;
		case "Yes, Apsis/ProspectEye":
			$output = "<i class='fa fa-play-circle-o fapurple' ></i> <b>IP-tracking:</b> Since you use ProspectEye now, you today have to follow up all web-site visitors yourself without knowing if it's really a sales qualified lead yet. If you would use Otto instead, you would also get the options to:<br>
					i) Let Softtalk call and find out who to talk to in order to sales qualify your leads, or<br>
					ii) Automatically read contact details with e-mail addresses to leading company officials from the Bisnode database so you can automatically start communicating with them.";
		default:
			$output = "<i class='fa fa-play-circle-o fapurple'></i> <b>IP-tracking:</b> Since you already use it, you know that you today have to follow up all web-site visitors yourself without knowing if it's really a sales qualified lead yet. If you would use Otto instead, you would also get the options to:<br>
					i) Let Softtalk call and find out who to talk to in order to sales qualify your leads, or<br>
					ii) Automatically read contact details with e-mail addresses to leading company officials from the Bisnode database so you can automatically start communicating with them.";
			break;
	}
	return $output;
}

function answer_12($answer)
{
	$output = '';
	switch (trim($answer)) {
		case "No, but we may start to.":
			$output = "<i class='fa fa-envelope-o fablue'></i> <b>Newsletters:</b> From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 4 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		case 'Yes, we use Outlook to do it.':
			$output = "<i class='fa fa-envelope-o fablue'></i> <b>Newsletters:</b> From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 3 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		case "Yes, we use our CRM-system to do it.":
			$output = "<i class='fa fa-envelope-o fablue' ></i> <b>Newsletters:</b> From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 3 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script). You could then write the action activity to your CRM-system such that you keep all data in one place.";
			break;
		case 'Yes, we use Apsis to do it.':
			$output = "<i class='fa fa-envelope-o fablue'></i> <b>Newsletters:</b> From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 4 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		case 'Yes, we use Mailchimp to do it.':
			$output = "<i class='fa fa-envelope-o fablue'></i> <b>Newsletters:</b> From Otto&reg; you could send Newsletters as well, but more importantly, at least three clients have tried it against Mailchimp and found 4-5 times better action due to each mail being built and sent one-by-one from Otto with the real e-mail of one (or many) senders to the contacts of each as if it was sent directly from Outlook. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			break;
		default:
			if(strpos($answer, 'Yes, we use another system') !== false)
			{
				$output = "<i class='fa fa-envelope-o fablue'></i> <b>Newsletters:</b> From Otto&reg; you could send Newsletters as well, but more importantly, you'll be able to send e-mails from all users' personal e-mail addresses to all their contacts just as if each user would have sent it directly from Outlook themselves and still one person could write the e-mail instead of each of 4 users. Or instead of a 1000. Even the links are more inviting to click, since they'll go directly to your site (but will still be trackable with the Otto tracking script).";
			}
			break;
	}
	return $output;
}

function answer_13($answer)
{
	$output = '';
	switch (trim($answer)) {
		case "We used to, but we do not use it any more.":
			$output = "<i class='fa fa-briefcase faorange'></i> <b>CRM:</b> Many CRM-systems are cumbersome for the sales representatives and can't be used for bulk-handling of contacts for marketing purposes at all. Otto will allow you to do <i>both</i> the bulk-handling, and it also allows for a very fast and effective one-by-one handling as a CRM-system if you would like to use it that way.";
			break;
		case "No, but we are thinking of using one.":
			$output = "<i class='fa fa-briefcase faorange'></i> <b>CRM:</b> Many CRM-systems are cumbersome for the sales representatives and can't be used for bulk-handling of contacts for marketing purposes at all. Since Otto will allow you to do <i>both</i> the bulk-handling <i>and</i> the one-by-one handling in a very fast and efficient way, we suggest you try it out as a CRM-system as well.";
			break;
		case "Yes, we use Salesforce.":
			$output = "<i class='fa fa-briefcase faorange'></i> <b>Salesforce CRM Integration:</b> You can easily integrate Salesforce directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Salesforce.";
			break;
		case 'Yes, we use Microsoft Dynamics.':
			$output = "<i class='fa fa-briefcase faorange'></i> <b>Microsoft Dynamics CRM Integration:</b> You can easily integrate Dynamics directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Dynamics.";
			break;
		case "Yes, we use SugarCRM.":
			$output = "<i class='fa fa-briefcase faorange'></i> <b>SugarCRM Integration:</b> You can easily integrate SugarCRM directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in SugarCRM.";
			break;
		case 'Yes, we use SuperOffice.':
			$output = "<i class='fa fa-briefcase faorange'></i> <b>Superoffice Integration:</b> You can easily integrate Superoffice directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Superoffice.";
			break;
		case 'Yes, we use Lundalogik.':
			$output = "<i class='fa fa-briefcase faorange'></i> <b>Lundalogik Integration:</b> You can easily integrate Lundalogik directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Lundalogik.";
			break;
		case 'Yes, we use Upsales':
			$output = '<i class="fa fa-briefcase faorange"></i> <b>Upsales Integration:</b> You can easily integrate Upsales directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in Upsales. ';
			break;
		default:
			if(strpos($answer, 'Yes, we use') !== false)
			{
				$output = "<i class='fa fa-briefcase faorange'></i> <b>CRM Integration:</b> You can easily integrate your CRM-system directly with Otto so you can do all bulk-handling in Otto for the Marketing while sales representatives continue to work in the CRM. Since Otto also has some one-by-one functionality, you may even want to try out how well just Otto does for you!";
			}
			break;
	}
	return $output;
}

function answer_19($answer)
{
	return $answer;
}

// Question 10
function showWebinar($point,$answer)
{
	$answers = array(
		'48' =>'Do not know much, but would like to know more about it.',
		'49' =>'Have heard about it, and would like to know more about how it could work for us.',
		'50' =>'I understand the principle behind the process or systems, and have some ideas about how to use it, but have not started yet.',
		'51' =>'I already use your system Otto, but would like to know more to get more out of it.',
		'52' =>'I already use another Marketing Automation system',
	);
	$id = null;
	foreach($answers as $k => $a){
		if( $a == $answer ) $id = $k; break;
	}
	$html = "<div><ol class='webinar' type='A'>";
	if($point < 15 && $id < 51)
	{
		$html .= "<li><a href='http://be2.co/buy-now' class='btn btn-primary btn-lg'>Buy Now</a></li>";
		$html .= "<li><a href='http://be2.co/join-webinar' class='btn btn-primary btn-lg'>Join our webinar</a></li>";
		$html .= "</ol>";
		$html .= "<div style='clear:both;'></div><img style='float:right;width:195;height:142' src='http://www.sonician.com/images/Double-Guarantee-on-the-side_195x142.png' /><br><h3 class='text-primary'>Get started at no risk from 99€/month.</h3>
		<p class='price'>Try it risk free with our Total Satisfaction & Best Value <a href='http://www.sonician.com/support/knowledgebase/308/Double-Guarantee-Total-Satisfaction-plus-Best-Value.html'>Double Guarantee</a> (incl. 30 days Money Back). </p>
		<p class='price'>Pick a plan and sign up in 60 seconds. Upgrade, downgrade, cancel at any time. </p>";
	} else if($point >= 15 && $id < 52) {
		$html .= "<li><a href='http://be2.co/buy-now' class='btn btn-primary btn-lg'>Buy Now</a></li>";
		$html .= "<li><a href='http://be2.co/join-webinar' class='btn btn-primary btn-lg'>Join our webinar</a></li>";
		$html .= "<li><a href='http://be2.co/book-time-slot' class='btn btn-primary btn-lg'>Book personal demo</a></li>";
		$html .= "</ol>";
	} else if($point >= 15 && $id == 52){
		$html .= "<li><a href='http://be2.co/book-time-slot' class='btn btn-primary btn-lg'>Book personal demo</a></li>";
		$html .= "</ol>";
	}
	$html .= "</div>";
	echo $html;
}