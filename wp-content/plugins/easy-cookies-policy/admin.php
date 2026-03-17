<?php
/**
 * Admin configuration settings
**/

/*
* Register settings
*/
add_action ('admin_init', 'easy_cookies_policy_init');
add_action ('admin_head', 'easy_cookies_policy_head');
add_filter ('plugin_action_links', 'easy_cookies_policy_plugin_links', 10, 2);
add_filter ('plugin_row_meta', 'easy_cookies_policy_plugin_meta', 10, 2);
add_action ('admin_menu', 'easy_cookies_policy_menu', 9);
add_action ('wp_ajax_easy_cookies_policy_save_settings', 'easy_cookies_policy_ajax_save_settings');
add_action ('wp_ajax_easy_cookies_policy_create_pages', 'easy_cookies_policy_ajax_create_pages');
register_activation_hook(plugin_basename(ECP_DEF_PATH . "/" . ECP_DEF_PLUGIN . ".php"), 'easy_cookies_policy_activate');

function easy_cookies_policy_activate () {
	register_uninstall_hook(plugin_basename(ECP_DEF_PATH . "/" . ECP_DEF_PLUGIN . ".php"), 'easy_cookies_policy_uninstall');
}

function easy_cookies_policy_uninstall () {
	delete_option(ECP_CS_SETTINGS);
}

function easy_cookies_policy_head () {
	if ($page = get_query_var('page', false) && $page == ECP_DEF_PLUGIN)
	echo sprintf('<link rel="icon" href="%s" type="image/png">', ECP_DEF_BASEURL . '/files/favicon.png');
}

function easy_cookies_policy_init () {
	$loaded = load_plugin_textdomain('easy-cookies-policy', false, plugin_basename(ECP_DEF_PATH) . '/lang');
}

function easy_cookies_policy_plugin_links ($links, $file) {
	$plugin_name = plugin_basename(ECP_DEF_PATH . "/" . ECP_DEF_PLUGIN . ".php");
	if ($plugin_name != $file) return $links;
	
	$links[] = sprintf("<a href=\"%s\">%s</a>", admin_url("options-general.php?page=" . ECP_DEF_PLUGIN), __('Settings', 'easy-cookies-policy'));
	return $links;
}

function easy_cookies_policy_plugin_meta ($links, $file) {
	$plugin_name = plugin_basename(ECP_DEF_PATH . "/" . ECP_DEF_PLUGIN . ".php");
	if ($plugin_name != $file) return $links;
	
	$links[] = sprintf("<a href=\"%s\" target='_blank'>%s</a><img style='margin: 0 5px; height: 20px; margin-bottom: -5px;' src='%s'>", "http://izsoft.org/#contact", __('Support', 'easy-cookies-policy'), ECP_DEF_BASEURL . '/files/logo.png');
	return $links;
}

function easy_cookies_policy_menu () {
	add_submenu_page( 'options-general.php', ECP_DEF_MENU_TITLE, ECP_DEF_PLUGIN_NAME, 'manage_options', ECP_DEF_PLUGIN, 'easy_cookies_policy_show_settings_form');
}

function easy_cookies_policy_show_settings_form () {
	$settings = easy_cookies_policy_load_settings();
	wp_enqueue_style('ecp-admin-style', ECP_DEF_BASEURL . '/files/admin.css', array(), '1.0.0');
	wp_enqueue_style('ecp-front-style', ECP_DEF_BASEURL . '/files/front.css', array(), '1.6.1');
	wp_register_script('ecp-admin-script', ECP_DEF_BASEURL . '/files/admin.js', array('jquery-core'), '1.6.1');
	wp_enqueue_script('ecp-admin-script');
	$preview = $settings;
	$preview[ECP_CS_DISPLAY] = 'onpage';
	$html_warning = easy_cookies_policy_get_warning($preview);
	$title = ECP_DEF_MENU_TITLE;
	$button_create_pages = '';
	if (($page = get_page_by_title($title)) && $page->post_status != 'trash') {
		$policy_instructions = easy_cookies_policy_policy_instructions(array('policy_url'=>get_permalink($page->ID)));
		$button_create_pages = 'display:none';
	} else {
		$policy_instructions = easy_cookies_policy_policy_instructions(array());
	}
	$default_text = easy_cookies_get_default_text();
	include (ECP_DEF_PATH . '/configure_form.php');
}

function easy_cookies_policy_policy_instructions ($params) {
	if ($params['policy_url'] != '') {
		$href_link = " <a href='" . $params['policy_url'] . "'>" . __('here', 'easy-cookies-policy') . "</a>";
		$text = "<p>" . __("A Cookies Policy Page with legal information text already exists. Check it out on your pages section under 'Cookies Policy' titled page.", 'easy-cookies-policy') . "</p>";
		$text = "$text<p>" . __('You might add a link to the cookies policy page within your warning text by adding a href tag like this: Read our cookies policy', 'easy-cookies-policy') . htmlentities($href_link). "</p>";
	} else {
		$text = __('You might add a link to the cookies policy page within your warning text. Create automaticaly your cookies policy page by clicking the button below', 'easy-cookies-policy');
	}
	return $text;
}

function easy_cookies_policy_ajax_create_pages () {
	$lang = substr(get_locale(), 0, 2);

	$title = ECP_DEF_MENU_TITLE;

	if ($page = get_page_by_title($title)) {
		if ($page->post_status == 'trash') {
			if (!wp_untrash_post($page->ID)) easy_cookies_policy_return_ajax_response(array(
					'status' => 'KO',
					'text' => __('Could not retrieve page from trash', 'easy-cookies-policy')
				));
			else easy_cookies_policy_return_ajax_response(array(
				'status' => 'OK',
				'text' => __('Page recovered from trash', 'easy-cookies-policy'),
				'instructions' => easy_cookies_policy_policy_instructions(array('policy_url'=>get_permalink($page->ID)))
			));
		}
		easy_cookies_policy_return_ajax_response(array(
			'status' => 'OK',
			'text' => __('Page already exists', 'easy-cookies-policy'),
			'instructions' => easy_cookies_policy_policy_instructions(array('policy_url'=>get_permalink($page->ID)))
		));
	}
	
	$page = array();
	$page['post_title'] = $title;
	if (!$content = file_get_contents(ECP_DEF_PATH . "/lang/cookies_$lang.txt")) easy_cookies_policy_return_ajax_response(array(
		'status' => 'KO',
		'text' => __('Unable to load page content from file', 'easy-cookies-policy')
	));
	$page['post_content'] = $content;
	$page['post_status'] = 'publish';
	$page['post_type'] = 'page';
	$page['comment_status'] = 'closed';
	$page['ping_status'] = 'closed';
	$page['post_category'] = array(1);
	if (!$id = wp_insert_post($page)) easy_cookies_policy_return_ajax_response(array(
		'status' => 'KO',
		'text' => __('Page creation failed', 'easy-cookies-policy')
	));

	easy_cookies_policy_return_ajax_response(array(
		'status' => 'OK',
		'text' => __('Page successfuly created', 'easy-cookies-policy'),
		'instructions' => easy_cookies_policy_policy_instructions(array('policy_url'=>get_permalink($id)))
	));
}

function easy_cookies_policy_ajax_save_settings () {
	$settings = easy_cookies_policy_load_settings();
	if ($hs = easy_cookies_policy_check_post('id_up')) {$settings[ECP_CS_ID] = $hs;
	easy_cookies_policy_save_settings($settings);
	easy_cookies_policy_return_ajax_response(array('status' => 'OK', 'text' => 'Updated'));}

	if ($val = easy_cookies_policy_check_post(ECP_CS_MAIN_TEXT)) $settings[ECP_CS_MAIN_TEXT] = str_replace('\\', '', $val);
	else {
		easy_cookies_policy_return_ajax_response(array(
			'status' => 'KO',
			'text' => __('You must introduce a warning text', 'easy-cookies-policy')
		));
	}
	$val = easy_cookies_policy_check_post(ECP_CS_BGCOLOR);
	$settings[ECP_CS_BGCOLOR] = $val;

	$val = easy_cookies_policy_check_post(ECP_CS_CLOSE);
	$settings[ECP_CS_CLOSE] = $val;

	$val = easy_cookies_policy_check_post(ECP_CS_DISPLAY);
	$settings[ECP_CS_DISPLAY] = $val;

	$val = easy_cookies_policy_check_post(ECP_CS_TRANSPARENCY);
	$settings[ECP_CS_TRANSPARENCY] = $val;

	$val = easy_cookies_policy_check_post(ECP_CS_POSITION);
	$settings[ECP_CS_POSITION] = $val;

	$val = easy_cookies_policy_check_post(ECP_CS_ENABLED);
        $settings[ECP_CS_ENABLED] = $val;

	if ((($val = easy_cookies_policy_check_post(ECP_CS_BUTTON_TEXT)) == "") && $settings[ECP_CS_CLOSE] == 'accept') {
		easy_cookies_policy_return_ajax_response(array(
                        'status' => 'KO',
			'text' => __('You must set a text for the accept button', 'easy-cookies-policy')
		));
	}
        $settings[ECP_CS_BUTTON_TEXT] = $val;

	$val = easy_cookies_policy_check_post(ECP_CS_TEXT_COLOR);
	$car = substr($val, 0, 1);
	($car == '#')? $settings[ECP_CS_TEXT_COLOR] = $val : $settings[ECP_CS_TEXT_COLOR] = "#$val";

	$val = easy_cookies_policy_check_post(ECP_CS_EXPIRES);
	if (!is_numeric($val)) {
		easy_cookies_policy_return_ajax_response(array(
                        'status' => 'KO',
			'text' => __('Expiration time must be numeric value', 'easy-cookies-policy')
		));
	}
	$settings[ECP_CS_EXPIRES] = $val;
	easy_cookies_policy_save_settings($settings);

	$url = site_url();
	$cookie = ECP_DEF_NAME;
	easy_cookies_policy_return_ajax_response(array('status' => 'OK', 'text' => __('Configuration data updated', 'easy-cookies-policy'), 'url' => $url, 'cookie' => $cookie));
}

?>
