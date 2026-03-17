function easy_cookies_policy_init (data) {
	var id = "#" + data.id;
	jQuery(id).hide();
	jQuery(id).html(data.html);
	jQuery("#easy-cookies-policy-main-wrapper").hide();

	if (data.behavior == 'auto') easy_cookies_policy_set_cookie(data.cookie, '1', data.expires);

	jQuery("#easy-cookies-policy-main-wrapper .easy-cookies-policy-close, #easy-cookies-policy-main-wrapper .easy-cookies-policy-accept").on('click', function() {
		jQuery("#easy-cookies-policy-main-wrapper").slideUp(1000);
		easy_cookies_policy_set_cookie(data.cookie, '2', data.expires);
	});

	if (data.position == 'top' && data.display == 'onpage') {
		var html = jQuery("#easy-cookies-policy-main-wrapper").detach();
		jQuery( 'body' ).prepend(html);
	}
	jQuery(id).show();
	jQuery("#easy-cookies-policy-main-wrapper").slideDown(1000);
};

function easy_cookies_policy_get_warning () {
	var data = {
		action: 'easy_cookies_policy_get_warning',
	};

	jQuery.post(ajaxurl, data, function(resp) {
		if( resp.status == 'OK' ) {
			easy_cookies_policy_init(resp);
		}
	}, 'json');
}

function easy_cookies_policy_set_cookie (cookie, value, expires) {
	document.cookie = cookie + "=" + value + "; expires=" + expires + "; path=/";
}

jQuery(document).ready(function () {
	easy_cookies_policy_get_warning();
});
