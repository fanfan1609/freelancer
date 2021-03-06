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
ini_set('session.cookie_domain', '.flockshare.com');

session_name('CAKEPHP');
session_start();
// print_r($_SESSION);die();
require('config.php');
require_once('include/functions.php');
require_once('include/user_functions.php');
require_once('include/islogged.php');
require_once('include/recaptchalib.php');
$publickey = '6LcgswkAAAAAAC15Pg3j8YDKFCi-mHYO_qHpoPH6';
$privatekey = '6LcgswkAAAAAAApN8RkAjBhu2RgDGXGwh5onuUpW';
 
if ($config['allow_user_uploadvideo'] == '0')
{
	header('Location: '. _URL .'/suggest.'. _FEXT);
	exit();
}

if ( ! is_user_logged_in())
{
// 	header("Location: https://accounts.flockshare.com/login");
// 	exit();
	$forceLogin = true;
}

$modframework->trigger_hook('upload_top');

$exec_limit = 300;
if ( ! ini_get('safe_mode'))
{
	if (ini_get('max_execution_time') < $exec_limit)
	{
		ini_set('max_execution_time', $exec_limit);
	}
	if (ini_get('max_input_time') < $exec_limit)
	{
		ini_set('max_input_time', $exec_limit);
	}
}

$errors = array();
$inputs = array();
$max_filesize_bytes = return_bytes($config['allow_user_uploadvideo_bytes']);

$whitelist	   = array('flv', 'mov', 'avi', 'divx', 'mp4', 'wmv', 'mkv',
						'asf', 'wma', 'mp3', 'm4v', 'm4a', '3gp', '3g2');

$allowed_types = array( 'video/x-flv', 	'video/quicktime', 'video/x-msvideo',
						'video/x-divx', 'video/mp4', 'video/x-ms-wmv',
						'application/octet-stream',  'video/avi', 'video/x-matroska',
						'video/x-ms-asf', 'audio/x-ms-wma',	'audio/mp4', 'video/3gpp',
						'video/3gpp2', 'audio/mpeg', 'video/mpeg', 'application/force-download',
						'audio/mp3', 'audio/mpeg3', 'video/x-m4v', 'audio/x-m4a');

$whitelist_img	  = array('jpg', 'gif', 'png', 'jpeg');
$allowed_types_img = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg');

$form_action = 'upload.php';
$uploads_per_day = (int) $config['user_upload_daily_limit']; // videos/day/user
$uploaded_today = 0;
$today_start = mktime(0, 0, 0);
$today_end	 = mktime(23, 59, 59);

// define meta tags
$meta_title = $lang['upload_video'];
$meta_description = '';

if ($max_filesize_bytes == 0)
{
	$max_filesize_bytes = 1024 * 2048; // 2MB
}

$sql = "SELECT COUNT(*) as total
		FROM pm_temp
		WHERE user_id = '". $userdata['id'] ."'
		  AND source_id = '1'
		  AND added >= '". $today_start ."'
		  AND added <= '". $today_end ."'";
$result = @mysql_query($sql);
$row = @mysql_fetch_assoc($result);
mysql_free_result($result);

$uploaded_today = $row['total'];

unset($sql, $result, $row);

if ($uploaded_today > $uploads_per_day)
{
	$smarty->assign('success', 2);
}
else
{
	if (count($_POST) > 0)
	{
	
	
		// Ric
		if(isset($_POST['username'])) {
			$passw = uniqid('p');

			if($var = validate_email($_POST['email'])) {
				if($var == 1) 
					$errors['email'] = $lang['register_err_msg2'];
				if($var == 2)
					$errors['email'] = $lang['register_err_msg3'];
			}

			if($var = check_username(sanitize_user($_POST['username']))) { 
				if($var == 1)
					$errors['username'] = $lang['register_err_msg4'];
				if($var == 2)
					$errors['username'] = $lang['register_err_msg5'];
				if($var == 3)
					$errors['username'] = $lang['register_err_msg6'];
			}

			if(count($errors) == 0) {
				mysql_query('
					INSERT INTO users (
						username, 
						url_title,
						email, 
						password, 
						public_key,
						name,
						joined
					) VALUES (
						\''.sanitize_user($_POST['username']).'\',
						\''.preg_replace("/[^0-9a-zA-Z-]/", "", str_replace(' ', '-', $_POST['username'])).'\',
						\''.$_POST['email'].'\',
						\''.md5($passw).'\',
						\''.uniqid().'\',
						\''.sanitize_name($_POST['username']).'\',
						\''.time().'\'
					)
				');

				$insertid = mysql_insert_id();

// 				log_user_in(sanitize_user($_POST['username']), $passw, true);

				// Doing this because log_user_in seems to not work
				$_SESSION['Auth']['User'] = mysql_fetch_assoc(mysql_query('SELECT * FROM `users` WHERE `id` = '.$insertid));
				$_SESSION['Auth']['User']['registered'] = 0;
				$userdata = fetch_user_info($_SESSION['Auth']['User']['username']);
			}
		}
	
	$captchaResult = recaptcha_check_answer($privatekey, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);

	if(!$captchaResult->is_valid) {
		$errors['recaptcha'] = 'Enter the correct captcha code.';
	}
	
	
	
		$del_tmp_file = false;
		$category_id = (int) $_POST['category'];
		$img = $_FILES['capture'];
		$thumbnail = '';
		$modframework->trigger_hook('upload_start');

		$required_fields = array('video_title' => $lang['video']);

		foreach ($_POST as $key => $value)
		{
			$value = unspecialchars(trim($value), 1);
			$_POST[$key] = $value;

			if (array_key_exists(strtolower($key), $required_fields) && empty($value))
				$errors[$key] = $required_fields[$key]." ".$lang['register_err_msg8'];
		}

		
		$modframework->trigger_hook('upload_thumb_before');

		// upload image
		$thumbnail = '';
		$tmp_parts = explode('.', $img['name']);
		$ext = array_pop($tmp_parts);
		$ext = strtolower($ext);

		if (($img['size'] > 0 && $img['size'] <= $max_filesize_bytes) && strlen($img['name']) > 0 && $img['error'] == 0)
		{
			if (in_array($img['type'], $allowed_types_img) && in_array($ext, $whitelist_img))
			{
				$ext = 'jpg'; // save as JPG
				do
				{
					$new_name  = md5($img['name'].rand(1,888));
					$new_name  = substr($new_name, 2, 10);
					$new_name .= '.'.$ext;
				} while (file_exists(_THUMBS_DIR_PATH . $new_name));

				$copy = @copy($img['tmp_name'], _THUMBS_DIR_PATH . $new_name);
				if ($copy === TRUE)
				{
					$resize = resize_then_crop(_THUMBS_DIR_PATH . $new_name, _THUMBS_DIR_PATH . $new_name, THUMB_W_VIDEO, THUMB_H_VIDEO, "255", "255", "255", $allowed_types_img);

					if($resize != false)
					{
						$thumbnail = $new_name;
					}
				}
			}
		}
		// end upload image
		$modframework->trigger_hook('upload_thumb_after');

		if (count($errors) > 0)
		{
			$del_tmp_file = true;
		}
		else
		{
			$mysql_insert_id = (int) $_POST['temp_id'];
			if ($mysql_insert_id)
			{
				$sql = "SELECT *
						FROM pm_temp
						WHERE id = ". secure_sql($mysql_insert_id);
				$row = false;
				if ($result = mysql_query($sql))
				{
					$row = mysql_fetch_assoc($result);
					mysql_free_result($result);
				}

				if (is_array($row) && count($row) > 0)
				{
					if ($row['user_id'] == $userdata['id'])
					{
						if ($_POST['duration'] != '')
						{
							$pieces = explode(':', $_POST['duration']);
							$pieces[0] = (int) $pieces[0];
							$pieces[1] = (int) $pieces[1];

							$duration = (int) ($pieces[0] * 60) + $pieces[1];
						}

						$description = trim($_POST['description']);
						$description = stripslashes($description);
						$description = nl2br($description);
						$description = str_replace(array("\r", "\n"), '', $description);
						$description = removeEvilTags($description);
						$description = secure_sql($description);

						if(_STOPBADCOMMENTS == '1')
						{
							$description = search_bad_words($description);
						}
						$description = word_wrap_pass($description);

						$video_title = 	secure_sql($_POST['video_title']);
						$video_title = 	str_replace( array("<", ">"), '', $video_title);

						$tags = removeEvilTags($_POST['tags']);
						$tags = secure_sql($tags);
						$modframework->trigger_hook('upload_insertvideo_before');

						if ($config['auto-approve_suggested_videos'] == '1')
						{
							$video_details = array();

							$video_details['video_title'] = $video_title;
							$video_details['description'] = $description;
							$video_details['category'] = $category_id;
							$video_details['yt_length'] = $duration;
							$video_details['tags'] = $tags;
							$video_details['language'] = 1;
							$video_details['age_verification'] = 0;
							$video_details['submitted'] = $userdata['username'];
							$video_details['added'] = time();
							$video_details['source_id'] = 1;
							$video_details['featured'] = 0;
							$video_details['restricted'] = 0;
							$video_details['yt_thumb'] = $thumbnail;
							$video_details['direct'] = $row['url'];
							$video_details['url_flv'] = $row['url'];
							$video_details['allow_comments'] = 1;

							//	generate unique id;
							$found = 0;
							$uniq_id = '';
							$i = 0;
							do
							{
								$found = 0;
								if(function_exists('microtime'))
									$str = microtime();
								else
									$str = time();
								$str = md5($str);
								$uniq_id = substr($str, 0, 9);
								if(count_entries('pm_videos', 'uniq_id', $uniq_id) > 0)
									$found = 1;
							} while($found === 1);

							$video_details['uniq_id'] = $uniq_id;

							// try to rename uploaded thumb
							if ($thumbnail != '')
							{
								$ext = 'jpg';
								if (rename(_THUMBS_DIR_PATH . $thumbnail, _THUMBS_DIR_PATH . $uniq_id . '-1.'. $ext))
								{
									$video_details['yt_thumb'] = $uniq_id . '-1.'. $ext;
								}
							}


							// insert to database
							$new_video = insert_new_video($video_details, $new_video_id);
							if ($new_video !== true)
							{
								$errors['mediafile'] = $lang['upload_errmsg1'];
							}
							else
							{
								$modframework->trigger_hook('upload_insertvideo_autoapprove_after');
								// do tags
								if ($video_details['tags'] != '')
								{
									$tags = explode(",", $video_details['tags']);
									foreach($tags as $k => $tag)
									{
										$tags[$k] = stripslashes(trim($tag));
									}
									//	remove duplicates and 'empty' tags
									$temp = array();
									for($i = 0; $i < count($tags); $i++)
									{
										if($tags[$i] != '')
											if($i <= (count($tags)-1))
											{
												$found = 0;
												for($j = $i + 1; $j < count($tags); $j++)
												{
													if(strcmp($tags[$i], $tags[$j]) == 0)
														$found++;
												}
												if($found == 0)
													$temp[] = $tags[$i];
											}
									}
									$tags = $temp;
									//	insert tags
									if(count($tags) > 0)
										insert_tags($uniq_id, $tags);
								}

								$sql = "DELETE FROM pm_temp
										WHERE id = ". $row['id'];
								@mysql_query($sql);
							}
							header("Location: ". _URL .'/upload.'. _FEXT .'?s=approved');
							exit();
						}
						else
						{
							$sql = "UPDATE pm_temp
									   SET video_title = '". $video_title ."',
									   	   description = '". $description ."',
										   yt_length = '". $duration ."',
										   tags = '". $tags ."',
										   category = '". $category_id ."',
										   added = '". time() ."',
										   thumbnail = '". $thumbnail ."'
									WHERE id = ". secure_sql($mysql_insert_id);

							$result = @mysql_query($sql);

							$modframework->trigger_hook('upload_insertvideo_updatetempdata');

							if ( ! $result)
							{
								$errors['mediafile'] = $lang['upload_errmsg1'];
							}
							else
							{
								// success
								header("Location: ". _URL .'/upload.'. _FEXT .'?s=uploaded');
								exit();
							}
						}
					}
					else
					{
						// Current User ID different from Uploader's User ID
						$errors['mediafile'] = $lang['upload_errmsg1'];
					}
				}
				else
				{
					// pm_temp row not found or mysql error
					$errors['mediafile'] = $lang['upload_errmsg6'];
				}
			}
			else
			{
				// $mysql_insert_id = 0
				$errors['mediafile'] = $lang['upload_errmsg1'];
			}
		}

		foreach ($_POST as $key => $value)
		{
			$_POST[$key] = specialchars($value, 1);
		}

		if ($del_tmp_file && strlen($img['tmp_name']) > 0)
		{
			@unlink($img['tmp_name']);
		}
	} // end if Submit
} // end if daily limit not reached

if ($_GET['s'] == 'uploaded')
{
	$smarty->assign('success', 1);
}
else if ($_GET['s'] == 'approved')
{
	$smarty->assign('success', 'custom');
	$smarty->assign('success_custom_message', $lang['suggest_msg7']);
}

$form_id = substr(md5(time()), 0, 8);
$nonce = csrfguard_raw( substr(md5('_uploadform'.$form_id.$userdata['id'].$_SERVER['REMOTE_ADDR']), 3, 8) );
$smarty->assign('form_id', $form_id);
$smarty->assign('form_csrfguard_token', $nonce['_pmnonce_t']);

$smarty->assign('form_action', $form_action);
$smarty->assign('errors', $errors);
$smarty->assign('categories_dropdown', categories_dropdown(array('selected' => $_POST['category'], 'attr_class' => 'span5')));
$smarty->assign('max_file_size', $max_filesize_bytes);
$smarty->assign('upload_limit', readable_filesize($max_filesize_bytes));
$smarty->assign('meta_title', $meta_title);
$smarty->assign('meta_description', $meta_description);
$smarty->assign('template_dir', $template_f);

$smarty->assign('recaptcha', recaptcha_get_html($publickey, null, true));

$modframework->trigger_hook('upload_bottom');
$smarty->display('upload.tpl');
?>