<?php
// +------------------------------------------------------------------------+
// | PHP Melody ( www.phpsugar.com )
// +------------------------------------------------------------------------+
// | PHP Melody IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | PHPSUGAR, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +------------------------------------------------------------------------+
// | Developed by: PHPSUGAR (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2013 PHPSUGAR. All rights reserved.
// +------------------------------------------------------------------------+

session_name('CAKEPHP');
session_start();

require('config.php');
require_once(ABSPATH .'include/user_functions.php');
require_once(ABSPATH .'include/islogged.php');
require_once(ABSPATH .'include/article_functions.php');


$page_name = 'Video Deleted';

$page['title'] = $page_name;
$page['content'] = 'Your video was deleted. Return to <a href="https://zoology.flockshare.com/videos/">home</a>';

$smarty->assign('page', $page);

$smarty->assign('template_dir', $template_f);
$smarty->assign('meta_title', htmlspecialchars($page['title'], ENT_QUOTES));
$smarty->assign('meta_keywords', '');
$smarty->assign('meta_description', '');
$smarty->assign('show_addthis_widget', $config['show_addthis_widget']);

$smarty->display('page.tpl');
?>