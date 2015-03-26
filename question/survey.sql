-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 06:43 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey`
--
CREATE DATABASE IF NOT EXISTS `survey` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `survey`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=112 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `content`, `point`, `is_deleted`) VALUES
(1, 1, 'B2B (Business-to-Business)', 5, 0),
(2, 1, 'B2C (Business-to-Consumer)', 0, 0),
(3, 2, 'Our time & knowledge\r\n', 5, 0),
(4, 2, 'Products that most of our clients generally know and understand well\r\n', -5, 0),
(5, 2, 'Complex products – It takes time for our clients to understand the true value of our products\n', 5, 0),
(6, 3, 'Sales staff with external meeting booking', 0, 0),
(7, 3, 'Sales staff book own meetings', 0, 0),
(8, 3, 'Telesales / telemarketing', 0, 0),
(9, 3, 'Retailers / Agents/ Affiliates\r\n', 0, 0),
(10, 3, 'Events / Trade Shows etc', 2, 0),
(11, 3, 'E-commerce / Direct marketing', 1, 0),
(12, 3, 'Retail / Department Stores / Showrooms', -3, 0),
(13, 4, 'Direct mail\r\n', 2, 0),
(14, 4, 'Participating in trade shows / other events\r\n', 2, 0),
(15, 4, 'E-mail marketing\r\n', 0, 0),
(16, 4, 'Telemarketing\r\n', 0, 0),
(17, 4, 'PR\r\n', 0, 0),
(18, 4, 'Web / SEO – Search Engine Optimization via Blogs, Content Marketing, Active in Social Media (Facebook, Twitter, LinkedIn, etc.)\n', 0, 0),
(19, 4, 'Web / SEM – Search Engine Marketing, eg: Paid advertising via Google, Facebook, LinkedIn etc.)\r\n', 2, 0),
(20, 4, 'Ads in trade magazines\r\n', 2, 0),
(21, 4, 'Ads in (daily) newspapers\r\n', -3, 0),
(22, 5, 'More direct (physical) mail\r\n', 2, 0),
(23, 5, 'More participation in trade shows / events\r\n', 2, 0),
(24, 5, 'More E-mail marketing\r\n', 2, 0),
(25, 5, 'More Telemarketing / Meeting Booking\r\n', 2, 0),
(26, 5, 'More PR / Content Marketing (Search Engine Optimization, Blogs, Facebook, Twitter, LinkedIn, etc.)\r\n', 0, 0),
(27, 5, 'More on-line advertizing (Google Adwords, Facebook, LinkedIn, Media houses)', 2, 0),
(28, 5, 'More ads in trade magazines\r\n', 2, 0),
(29, 5, 'More ads in (daily) newspapers\r\n', 0, 0),
(30, 5, 'Other (please specify)\r\n', 0, 1),
(31, 6, 'I work alone\r\n', -5, 0),
(32, 6, 'We are < 5 who work with sales and marketing', 5, 0),
(33, 6, 'We are more who work with sales and marketing\r\n', 5, 0),
(34, 6, 'We even have multiple sales and marketing teams/departments \r\n', 5, 0),
(35, 7, 'Tend to do 100% of Marketing yourself', -5, 0),
(36, 7, 'Tend to retain control internally but outsource certain marketing tasks.\r\n', 5, 0),
(37, 7, 'Tend to outsource as much as possible', 25, 0),
(38, 8, 'Most are our clients already\r\n', -5, 0),
(39, 8, 'Many will know us, but not all\r\n', 0, 0),
(40, 8, 'Only a few will know us at the start of our sales process', 5, 0),
(41, 8, 'Basically no one know of us', 10, 0),
(42, 9, 'Get more web-traffic', 0, 0),
(43, 9, 'Get more new sales qualified leads', 10, 0),
(44, 9, 'Convert more websites visitors into leads', 5, 0),
(45, 9, 'To better follow up existing leads and customers to make them buy more', 3, 0),
(46, 9, 'Reduce  the time of prospecting for sales', 5, 0),
(47, 9, 'Get better track of the buying process of customers', 10, 0),
(48, 10, 'Do not know much, but would like to know more about it.', 1, 0),
(49, 10, 'Have heard about it, and would like to know more about how it could work for us.', 3, 0),
(50, 10, 'I understand the principle behind the process or systems, and have some ideas about how to use it, but have not started yet.\n', 25, 0),
(51, 10, 'I already use your system Otto, but would like to know more to get more out of it.', 5, 0),
(52, 10, 'I already use another Marketing Automation system', 0, 0),
(53, 11, 'No, and since we mainly have consumers or small businesses, I do not think it is applicable for me.\n', -5, 0),
(54, 11, 'No, but it might be useful for us to get more leads.\r\n', 5, 0),
(55, 11, 'Yes, Vendemore', 0, 0),
(56, 11, 'Yes, Enecto ProspectFinder\r\n', 25, 0),
(57, 11, 'Yes, Apsis/ProspectEye\r\n', 10, 0),
(58, 11, 'Yes, other:blank_text', 10, 0),
(59, 12, 'No, and we do not need to.\r\n', -5, 0),
(60, 12, 'No, but we may start to.\r\n', 10, 0),
(61, 12, 'Yes, we use Outlook to do it.\r\n', 10, 0),
(62, 12, 'Yes, we use our CRM-system to do it.\r\n', -5, 0),
(63, 12, 'Yes, we use Apsis to do it.\r\n', 5, 0),
(64, 12, 'Yes, we use Mailchimp to do it.\r\n', 5, 0),
(65, 12, 'Yes, we use another system: blank_text to do it. \n', 0, 0),
(66, 13, 'No, and we do not need one.', 5, 0),
(67, 13, 'We used to, but we do not use it any more.\r\n', 10, 0),
(68, 13, 'No, but we are thinking of using one.\r\n', 20, 0),
(69, 13, 'Yes, we use Salesforce.', -10, 0),
(70, 13, 'Yes, we use Microsoft Dynamics.', 5, 0),
(71, 13, 'Yes, we use SugarCRM.', 5, 0),
(72, 13, 'Yes, we use SuperOffice.', 5, 0),
(73, 13, 'Yes, we use Lundalogik.\r\n', 5, 0),
(74, 13, 'Yes, we use Upsales\r\n', -10, 0),
(75, 13, 'Yes, we use blank_text', 10, 0),
(76, 14, 'I do not know our numbers, or I do not want such a specific response, so just take me to the results so far.\r\n', -10, 0),
(77, 14, 'I know at least roughly my Marketing & Sales costs, what a client brings on average, and the number of clients we get in a year and would like to get a more specific answer based on my own numbers the research of Forrester Research, Gartner group etc.\r\n', 5, 0),
(78, 15, 'blank_text e.g. 100 ', 0, 0),
(80, 16, 'blank_text e.g. 100 000 ', 0, 0),
(81, 17, 'blank_text e.g. 50 000', 0, 0),
(82, 18, 'Not applicable for us… (CHECKED)\r\n', 0, 0),
(83, 18, 'Marketing & Sales Executives\r\n', 0, 0),
(84, 18, 'Development Executives\r\n', 0, 0),
(85, 18, 'Production Executives\r\n', 0, 0),
(86, 18, 'CEOs\r\n', 0, 0),
(87, 18, 'CFOs / Controllers\r\n', 0, 0),
(88, 18, 'The Board\r\n', 0, 0),
(89, 18, 'Office Managers\r\n', 0, 0),
(90, 18, 'Others: blank_text', 0, 0),
(91, 19, 'A: Agriculture, forestry and fishing', -5, 0),
(92, 19, 'B: Mining and quarrying', -5, 0),
(93, 19, 'C: Manufacturing', 5, 0),
(94, 19, 'D: Electricity, gas, steam and air conditioning supply', 0, 0),
(95, 19, 'E: Water supply, sewerage, waste management and remediation activities', 0, 0),
(96, 19, 'F: Construction', 0, 0),
(97, 19, 'G: Wholesale or retail trade or repair and maintenance', 5, 0),
(98, 19, 'H: Transportation and storage', 0, 0),
(99, 19, 'I: Accommodation and food service activities', 5, 0),
(100, 19, 'J: Information and communication', 5, 0),
(101, 19, 'K: Financial and insurance activities', 5, 0),
(102, 19, 'L: Real estate activities', 0, 0),
(103, 19, 'M: Professional, scientific and technical activities', 5, 0),
(104, 19, 'N: Administrative and support service activities', 5, 0),
(105, 19, 'O: Public administration and defence, compulsory social security', -5, 0),
(106, 19, 'P: Education', 5, 0),
(107, 19, 'Q: Human health and social work activities', 0, 0),
(108, 19, 'R: Arts, entertainment and recreation', 0, 0),
(109, 19, 'S: Other service activities', 0, 0),
(110, 19, 'T: Activities of households as employers, undifferentiated goods- and services-producing activities of households for own use', -5, 0),
(111, 19, 'U: Activities of extraterritorial organisations and bodies, foreign embassys etc', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_skippable` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'radio',
  `note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`, `is_skippable`, `is_deleted`, `type`, `note`) VALUES
(1, 'Are you primarily targeting ?', 0, 0, 'radio', ''),
(2, 'What would you want to sell more of?', 0, 0, 'radio', ''),
(3, 'How do you work with sales today?', 0, 1, 'checkbox', ''),
(4, 'How do you work with Marketing today?', 0, 0, 'checkbox', ''),
(5, 'What 3 area(s) are you considering to focus more on ', 0, 0, 'checkbox', ''),
(6, 'How many sales reps or marketers are you?', 0, 0, 'radio', ''),
(7, 'We see most organizations tend to do sales themselves, but often outsource marketing work. Do you', 0, 0, 'radio', ''),
(8, 'How well-known are you among your potential customers ?', 0, 0, 'radio', ''),
(9, 'What are the three (3) most important areas for you?', 0, 0, 'checkbox', ''),
(10, 'How well do you know Marketing Automation ?', 0, 0, 'radio', ''),
(11, 'Do you have an IP-tracker solution to find out which are the businesses behind your web-site visitors’ IP-addresses, now when Google Analytics is not providing the info anymore?', 0, 0, 'radio', ''),
(12, 'Do you send newsletters?', 0, 0, 'radio', ''),
(13, 'Do you have a CRM (Customer Relationship Management) system?', 0, 0, 'radio', ''),
(14, 'If you’d like the test-result to be more specific, you have two choices:', 0, 0, 'radio', ''),
(15, 'How many customers did you approximately get  last year?', 1, 0, 'text', 'Currency?\r\nDon’t write any currency like $, kr, € or £. Just use the same for all questions, and the response will be in this currency as well.'),
(16, 'How much profit does one customer bring on average over its time as a client?', 1, 0, 'text', ''),
(17, 'Fill in your customer acquisition cost:', 1, 0, 'text', ''),
(18, 'If B2B, or dealing only with B2B: who are your primarily customers?', 1, 1, 'radio', ''),
(19, 'In which Industry would you say you primarily work?', 1, 1, 'select', '');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `is_view` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `email`, `content`, `created`, `is_view`, `is_deleted`) VALUES
(1, 'dat-vq@fabrica-vietnam.côm', 'a:13:{i:1;a:3:{s:8:"question";s:29:"Are you primarily targeting ?";s:6:"answer";s:26:"B2B (Business-to-Business)";s:5:"point";s:1:"5";}i:2;a:3:{s:8:"question";s:36:"What would you want to sell more of?";s:6:"answer";s:97:"Complex products – It takes time for our clients to understand the true value of our products\r\n";s:5:"point";s:1:"5";}i:4;a:3:{s:8:"question";s:37:"How do you work with Marketing today?";s:6:"answer";s:78:"Direct mail\r\n,Participating in trade shows / other events\r\n,E-mail marketing\r\n";s:5:"point";s:1:"4";}i:5;a:3:{s:8:"question";s:52:"What 3 area(s) are you considering to focus more on ";s:6:"answer";s:144:"More participation in trade shows / events\r\n,More E-mail marketing\r\n,More on-line advertizing (Google Adwords, Facebook, LinkedIn, Media houses)";s:5:"point";s:1:"6";}i:6;a:3:{s:8:"question";s:41:"How many sales reps or marketers are you?";s:6:"answer";s:47:"We are more who work with sales and marketing\r\n";s:5:"point";s:1:"5";}i:7;a:3:{s:8:"question";s:97:"We see most organizations tend to do sales themselves, but often outsource marketing work. Do you";s:6:"answer";s:74:"Tend to retain control internally but outsource certain marketing tasks.\r\n";s:5:"point";s:1:"5";}i:8;a:3:{s:8:"question";s:55:"How well-known are you among your potential customers ?";s:6:"answer";s:32:"Many will know us, but not all\r\n";s:5:"point";s:1:"0";}i:9;a:3:{s:8:"question";s:52:"What are the three (3) most important areas for you?";s:6:"answer";s:151:"Get more new sales qualified leads\r\n,Convert more websites visitors into leads\r\n,To better follow up existing leads and customers to make them buy more";s:5:"point";s:2:"18";}i:10;a:3:{s:8:"question";s:43:"How well do you know Marketing Automation ?";s:6:"answer";s:80:"Have heard about it, and would like to know more about how it could work for us.";s:5:"point";s:1:"3";}i:11;a:3:{s:8:"question";s:179:"Do you have an IP-tracker solution to find out which are the businesses behind your web-site visitors’ IP-addresses, now when Google Analytics is not providing the info anymore?";s:6:"answer";s:14:"Yes, Vendemore";s:5:"point";s:1:"0";}i:12;a:3:{s:8:"question";s:24:"Do you send newsletters?";s:6:"answer";s:38:"Yes, we use our CRM-system to do it.\r\n";s:5:"point";s:2:"-5";}i:13;a:3:{s:8:"question";s:60:"Do you have a CRM (Customer Relationship Management) system?";s:6:"answer";s:24:"Yes, we use SuperOffice.";s:5:"point";s:1:"5";}i:14;a:3:{s:8:"question";s:74:"If you’d like the test-result to be more specific, you have two choices:";s:6:"answer";s:112:"I do not know our numbers, or I do not want such a specific response, so just take me to the results so far.\r\n";s:5:"point";s:3:"-10";}}', '2015-03-18 00:17:19', 0, 0),
(2, 'vqdat169@gmail.com', 'a:13:{i:1;a:3:{s:8:"question";s:29:"Are you primarily targeting ?";s:6:"answer";s:26:"B2B (Business-to-Business)";s:5:"point";s:1:"5";}i:2;a:3:{s:8:"question";s:36:"What would you want to sell more of?";s:6:"answer";s:97:"Complex products – It takes time for our clients to understand the true value of our products\r\n";s:5:"point";s:1:"5";}i:4;a:3:{s:8:"question";s:37:"How do you work with Marketing today?";s:6:"answer";s:78:"Direct mail\r\n,Participating in trade shows / other events\r\n,E-mail marketing\r\n";s:5:"point";s:1:"4";}i:5;a:3:{s:8:"question";s:52:"What 3 area(s) are you considering to focus more on ";s:6:"answer";s:144:"More participation in trade shows / events\r\n,More E-mail marketing\r\n,More on-line advertizing (Google Adwords, Facebook, LinkedIn, Media houses)";s:5:"point";s:1:"6";}i:6;a:3:{s:8:"question";s:41:"How many sales reps or marketers are you?";s:6:"answer";s:47:"We are more who work with sales and marketing\r\n";s:5:"point";s:1:"5";}i:7;a:3:{s:8:"question";s:97:"We see most organizations tend to do sales themselves, but often outsource marketing work. Do you";s:6:"answer";s:74:"Tend to retain control internally but outsource certain marketing tasks.\r\n";s:5:"point";s:1:"5";}i:8;a:3:{s:8:"question";s:55:"How well-known are you among your potential customers ?";s:6:"answer";s:32:"Many will know us, but not all\r\n";s:5:"point";s:1:"0";}i:9;a:3:{s:8:"question";s:52:"What are the three (3) most important areas for you?";s:6:"answer";s:151:"Get more new sales qualified leads\r\n,Convert more websites visitors into leads\r\n,To better follow up existing leads and customers to make them buy more";s:5:"point";s:2:"18";}i:10;a:3:{s:8:"question";s:43:"How well do you know Marketing Automation ?";s:6:"answer";s:80:"Have heard about it, and would like to know more about how it could work for us.";s:5:"point";s:1:"3";}i:11;a:3:{s:8:"question";s:179:"Do you have an IP-tracker solution to find out which are the businesses behind your web-site visitors’ IP-addresses, now when Google Analytics is not providing the info anymore?";s:6:"answer";s:14:"Yes, Vendemore";s:5:"point";s:1:"0";}i:12;a:3:{s:8:"question";s:24:"Do you send newsletters?";s:6:"answer";s:38:"Yes, we use our CRM-system to do it.\r\n";s:5:"point";s:2:"-5";}i:13;a:3:{s:8:"question";s:60:"Do you have a CRM (Customer Relationship Management) system?";s:6:"answer";s:24:"Yes, we use SuperOffice.";s:5:"point";s:1:"5";}i:14;a:3:{s:8:"question";s:74:"If you’d like the test-result to be more specific, you have two choices:";s:6:"answer";s:112:"I do not know our numbers, or I do not want such a specific response, so just take me to the results so far.\r\n";s:5:"point";s:3:"-10";}}', '2015-03-18 00:27:49', 0, 0),
(3, 'vqdat169@gmail.com', 'a:13:{i:1;a:3:{s:8:"question";s:29:"Are you primarily targeting ?";s:6:"answer";s:26:"B2B (Business-to-Business)";s:5:"point";s:1:"5";}i:2;a:3:{s:8:"question";s:36:"What would you want to sell more of?";s:6:"answer";s:97:"Complex products – It takes time for our clients to understand the true value of our products\r\n";s:5:"point";s:1:"5";}i:4;a:3:{s:8:"question";s:37:"How do you work with Marketing today?";s:6:"answer";s:78:"Direct mail\r\n,Participating in trade shows / other events\r\n,E-mail marketing\r\n";s:5:"point";s:1:"4";}i:5;a:3:{s:8:"question";s:52:"What 3 area(s) are you considering to focus more on ";s:6:"answer";s:144:"More participation in trade shows / events\r\n,More E-mail marketing\r\n,More on-line advertizing (Google Adwords, Facebook, LinkedIn, Media houses)";s:5:"point";s:1:"6";}i:6;a:3:{s:8:"question";s:41:"How many sales reps or marketers are you?";s:6:"answer";s:47:"We are more who work with sales and marketing\r\n";s:5:"point";s:1:"5";}i:7;a:3:{s:8:"question";s:97:"We see most organizations tend to do sales themselves, but often outsource marketing work. Do you";s:6:"answer";s:74:"Tend to retain control internally but outsource certain marketing tasks.\r\n";s:5:"point";s:1:"5";}i:8;a:3:{s:8:"question";s:55:"How well-known are you among your potential customers ?";s:6:"answer";s:32:"Many will know us, but not all\r\n";s:5:"point";s:1:"0";}i:9;a:3:{s:8:"question";s:52:"What are the three (3) most important areas for you?";s:6:"answer";s:151:"Get more new sales qualified leads\r\n,Convert more websites visitors into leads\r\n,To better follow up existing leads and customers to make them buy more";s:5:"point";s:2:"18";}i:10;a:3:{s:8:"question";s:43:"How well do you know Marketing Automation ?";s:6:"answer";s:80:"Have heard about it, and would like to know more about how it could work for us.";s:5:"point";s:1:"3";}i:11;a:3:{s:8:"question";s:179:"Do you have an IP-tracker solution to find out which are the businesses behind your web-site visitors’ IP-addresses, now when Google Analytics is not providing the info anymore?";s:6:"answer";s:14:"Yes, Vendemore";s:5:"point";s:1:"0";}i:12;a:3:{s:8:"question";s:24:"Do you send newsletters?";s:6:"answer";s:38:"Yes, we use our CRM-system to do it.\r\n";s:5:"point";s:2:"-5";}i:13;a:3:{s:8:"question";s:60:"Do you have a CRM (Customer Relationship Management) system?";s:6:"answer";s:24:"Yes, we use SuperOffice.";s:5:"point";s:1:"5";}i:14;a:3:{s:8:"question";s:74:"If you’d like the test-result to be more specific, you have two choices:";s:6:"answer";s:112:"I do not know our numbers, or I do not want such a specific response, so just take me to the results so far.\r\n";s:5:"point";s:3:"-10";}}', '2015-03-18 00:35:29', 0, 0),
(4, 'vqdat169@gmail.com', 'a:13:{i:1;a:3:{s:8:"question";s:29:"Are you primarily targeting ?";s:6:"answer";s:26:"B2B (Business-to-Business)";s:5:"point";s:1:"5";}i:2;a:3:{s:8:"question";s:36:"What would you want to sell more of?";s:6:"answer";s:97:"Complex products – It takes time for our clients to understand the true value of our products\r\n";s:5:"point";s:1:"5";}i:4;a:3:{s:8:"question";s:37:"How do you work with Marketing today?";s:6:"answer";s:78:"Direct mail\r\n,Participating in trade shows / other events\r\n,E-mail marketing\r\n";s:5:"point";s:1:"4";}i:5;a:3:{s:8:"question";s:52:"What 3 area(s) are you considering to focus more on ";s:6:"answer";s:144:"More participation in trade shows / events\r\n,More E-mail marketing\r\n,More on-line advertizing (Google Adwords, Facebook, LinkedIn, Media houses)";s:5:"point";s:1:"6";}i:6;a:3:{s:8:"question";s:41:"How many sales reps or marketers are you?";s:6:"answer";s:47:"We are more who work with sales and marketing\r\n";s:5:"point";s:1:"5";}i:7;a:3:{s:8:"question";s:97:"We see most organizations tend to do sales themselves, but often outsource marketing work. Do you";s:6:"answer";s:74:"Tend to retain control internally but outsource certain marketing tasks.\r\n";s:5:"point";s:1:"5";}i:8;a:3:{s:8:"question";s:55:"How well-known are you among your potential customers ?";s:6:"answer";s:32:"Many will know us, but not all\r\n";s:5:"point";s:1:"0";}i:9;a:3:{s:8:"question";s:52:"What are the three (3) most important areas for you?";s:6:"answer";s:151:"Get more new sales qualified leads\r\n,Convert more websites visitors into leads\r\n,To better follow up existing leads and customers to make them buy more";s:5:"point";s:2:"18";}i:10;a:3:{s:8:"question";s:43:"How well do you know Marketing Automation ?";s:6:"answer";s:80:"Have heard about it, and would like to know more about how it could work for us.";s:5:"point";s:1:"3";}i:11;a:3:{s:8:"question";s:179:"Do you have an IP-tracker solution to find out which are the businesses behind your web-site visitors’ IP-addresses, now when Google Analytics is not providing the info anymore?";s:6:"answer";s:14:"Yes, Vendemore";s:5:"point";s:1:"0";}i:12;a:3:{s:8:"question";s:24:"Do you send newsletters?";s:6:"answer";s:38:"Yes, we use our CRM-system to do it.\r\n";s:5:"point";s:2:"-5";}i:13;a:3:{s:8:"question";s:60:"Do you have a CRM (Customer Relationship Management) system?";s:6:"answer";s:24:"Yes, we use SuperOffice.";s:5:"point";s:1:"5";}i:14;a:3:{s:8:"question";s:74:"If you’d like the test-result to be more specific, you have two choices:";s:6:"answer";s:112:"I do not know our numbers, or I do not want such a specific response, so just take me to the results so far.\r\n";s:5:"point";s:3:"-10";}}', '2015-03-18 00:36:09', 0, 0),
(5, 'vqdat169@gmail.com', 'a:13:{i:1;a:3:{s:8:"question";s:29:"Are you primarily targeting ?";s:6:"answer";s:26:"B2B (Business-to-Business)";s:5:"point";s:1:"5";}i:2;a:3:{s:8:"question";s:36:"What would you want to sell more of?";s:6:"answer";s:97:"Complex products – It takes time for our clients to understand the true value of our products\r\n";s:5:"point";s:1:"5";}i:4;a:3:{s:8:"question";s:37:"How do you work with Marketing today?";s:6:"answer";s:78:"Direct mail\r\n,Participating in trade shows / other events\r\n,E-mail marketing\r\n";s:5:"point";s:1:"4";}i:5;a:3:{s:8:"question";s:52:"What 3 area(s) are you considering to focus more on ";s:6:"answer";s:144:"More participation in trade shows / events\r\n,More E-mail marketing\r\n,More on-line advertizing (Google Adwords, Facebook, LinkedIn, Media houses)";s:5:"point";s:1:"6";}i:6;a:3:{s:8:"question";s:41:"How many sales reps or marketers are you?";s:6:"answer";s:47:"We are more who work with sales and marketing\r\n";s:5:"point";s:1:"5";}i:7;a:3:{s:8:"question";s:97:"We see most organizations tend to do sales themselves, but often outsource marketing work. Do you";s:6:"answer";s:74:"Tend to retain control internally but outsource certain marketing tasks.\r\n";s:5:"point";s:1:"5";}i:8;a:3:{s:8:"question";s:55:"How well-known are you among your potential customers ?";s:6:"answer";s:32:"Many will know us, but not all\r\n";s:5:"point";s:1:"0";}i:9;a:3:{s:8:"question";s:52:"What are the three (3) most important areas for you?";s:6:"answer";s:151:"Get more new sales qualified leads\r\n,Convert more websites visitors into leads\r\n,To better follow up existing leads and customers to make them buy more";s:5:"point";s:2:"18";}i:10;a:3:{s:8:"question";s:43:"How well do you know Marketing Automation ?";s:6:"answer";s:80:"Have heard about it, and would like to know more about how it could work for us.";s:5:"point";s:1:"3";}i:11;a:3:{s:8:"question";s:179:"Do you have an IP-tracker solution to find out which are the businesses behind your web-site visitors’ IP-addresses, now when Google Analytics is not providing the info anymore?";s:6:"answer";s:14:"Yes, Vendemore";s:5:"point";s:1:"0";}i:12;a:3:{s:8:"question";s:24:"Do you send newsletters?";s:6:"answer";s:38:"Yes, we use our CRM-system to do it.\r\n";s:5:"point";s:2:"-5";}i:13;a:3:{s:8:"question";s:60:"Do you have a CRM (Customer Relationship Management) system?";s:6:"answer";s:24:"Yes, we use SuperOffice.";s:5:"point";s:1:"5";}i:14;a:3:{s:8:"question";s:74:"If you’d like the test-result to be more specific, you have two choices:";s:6:"answer";s:112:"I do not know our numbers, or I do not want such a specific response, so just take me to the results so far.\r\n";s:5:"point";s:3:"-10";}}', '2015-03-18 00:41:00', 0, 0),
(6, 'vqdat169@gmail.com', 'a:13:{i:1;a:3:{s:8:"question";s:29:"Are you primarily targeting ?";s:6:"answer";s:26:"B2B (Business-to-Business)";s:5:"point";s:1:"5";}i:2;a:3:{s:8:"question";s:36:"What would you want to sell more of?";s:6:"answer";s:97:"Complex products – It takes time for our clients to understand the true value of our products\r\n";s:5:"point";s:1:"5";}i:4;a:3:{s:8:"question";s:37:"How do you work with Marketing today?";s:6:"answer";s:78:"Direct mail\r\n,Participating in trade shows / other events\r\n,E-mail marketing\r\n";s:5:"point";s:1:"4";}i:5;a:3:{s:8:"question";s:52:"What 3 area(s) are you considering to focus more on ";s:6:"answer";s:144:"More participation in trade shows / events\r\n,More E-mail marketing\r\n,More on-line advertizing (Google Adwords, Facebook, LinkedIn, Media houses)";s:5:"point";s:1:"6";}i:6;a:3:{s:8:"question";s:41:"How many sales reps or marketers are you?";s:6:"answer";s:47:"We are more who work with sales and marketing\r\n";s:5:"point";s:1:"5";}i:7;a:3:{s:8:"question";s:97:"We see most organizations tend to do sales themselves, but often outsource marketing work. Do you";s:6:"answer";s:74:"Tend to retain control internally but outsource certain marketing tasks.\r\n";s:5:"point";s:1:"5";}i:8;a:3:{s:8:"question";s:55:"How well-known are you among your potential customers ?";s:6:"answer";s:32:"Many will know us, but not all\r\n";s:5:"point";s:1:"0";}i:9;a:3:{s:8:"question";s:52:"What are the three (3) most important areas for you?";s:6:"answer";s:151:"Get more new sales qualified leads\r\n,Convert more websites visitors into leads\r\n,To better follow up existing leads and customers to make them buy more";s:5:"point";s:2:"18";}i:10;a:3:{s:8:"question";s:43:"How well do you know Marketing Automation ?";s:6:"answer";s:80:"Have heard about it, and would like to know more about how it could work for us.";s:5:"point";s:1:"3";}i:11;a:3:{s:8:"question";s:179:"Do you have an IP-tracker solution to find out which are the businesses behind your web-site visitors’ IP-addresses, now when Google Analytics is not providing the info anymore?";s:6:"answer";s:14:"Yes, Vendemore";s:5:"point";s:1:"0";}i:12;a:3:{s:8:"question";s:24:"Do you send newsletters?";s:6:"answer";s:38:"Yes, we use our CRM-system to do it.\r\n";s:5:"point";s:2:"-5";}i:13;a:3:{s:8:"question";s:60:"Do you have a CRM (Customer Relationship Management) system?";s:6:"answer";s:24:"Yes, we use SuperOffice.";s:5:"point";s:1:"5";}i:14;a:3:{s:8:"question";s:74:"If you’d like the test-result to be more specific, you have two choices:";s:6:"answer";s:112:"I do not know our numbers, or I do not want such a specific response, so just take me to the results so far.\r\n";s:5:"point";s:3:"-10";}}', '2015-03-18 00:41:53', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
