function easy_cookies_policy_show_message (text, className) {
	jQuery('.easy-cookies-policy-messages').removeClass('error').addClass(className);
	jQuery('.easy-cookies-policy-messages').html(text).fadeIn(500).delay(2000).fadeOut(1000);
}

//
function easy_cookies_policy_show_error (text) {
	easy_cookies_policy_show_message(text, 'error');
}

//
function easy_cookies_policy_save(open) {
	//
	var data = {
		action: 'easy_cookies_policy_save_settings',
		maintext: jQuery('#easy-cookies-policy-main-text').val(),
		background: jQuery("input[name='ecp-background-color']:checked").val(),
		transparency: jQuery("#easy-cookies-policy-transparency input[name='ecp-transparency']").val(),
		close: jQuery("#easy-cookies-policy-behavior").val(),
		expires: jQuery(".easy-cookies-policy-admin input[name='ecp-expires']").val(),
		enabled: jQuery('#easy-cookies-policy-enabled').is(':checked'),
		display: jQuery('#easy-cookies-policy-display').val(),
		position: jQuery('#easy-cookies-policy-position').val(),
		button_text: jQuery('#easy-cookies-button-text').val(),
		text_color: jQuery('#easy-cookies-text-color').val(),
	};

	//
	jQuery.post(ajaxurl, data, function(resp) {
		if( resp.status == 'OK' ) {
			easy_cookies_policy_show_message( resp.text );
			if (open) {
				document.cookie = resp.cookie + "=0; expires=-1; path=/";
				window.open(resp.url);
			}
		} else
			easy_cookies_policy_show_error( resp.text );
		return resp;
	}, 'json');
}

function easy_cookies_policy_create_pages () {
	var data = {
		action: 'easy_cookies_policy_create_pages'
	};
	
	jQuery.post(ajaxurl, data, function(resp) {
		if( resp.status == 'OK' ) {
			jQuery("#easy-cookies-policy-cookies-policy").html(resp.instructions);
			jQuery("#easy-cookies-policy-cookies-policy").fadeIn(500);
			jQuery(".easy-cookies-policy-create-pages").fadeOut(500);
			easy_cookies_policy_show_message(resp.text);
		} else {
			easy_cookies_policy_show_error(resp.text);
		}
	}, 'json');
}

function easy_cookies_policy_get_tc (color, trans) { 
	var rgbaCol = 'rgba(' + parseInt(color.slice(-6,-4),16) 
	+ ',' + parseInt(color.slice(-4,-2),16)
	+ ',' + parseInt(color.slice(-2),16)
	+','+trans+')';
	return rgbaCol;
}

function easy_cookies_policy_get_hexc(colorval) {
	var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	delete(parts[0]);
	for (var i = 1; i <= 3; ++i) {
		parts[i] = parseInt(parts[i]).toString(16);
		if (parts[i].length == 1) parts[i] = '0' + parts[i];
	}
	color = '#' + parts.join('');
	return color;
}

jQuery(document).ready(function() {
	jQuery('.easy-cookies-policy-save').click( function() {
		easy_cookies_policy_save(false);
	} );

	jQuery('#easy-cookies-set-default-text').click( function() {
		jQuery('#easy-cookies-policy-main-text').val(jQuery('#easy-cookies-default-text').text());
		jQuery(".easy-cookies-policy-content span").html(jQuery("#easy-cookies-policy-main-text").val());
	} );

	jQuery('.easy-cookies-policy-savetry').click( function() {
		easy_cookies_policy_save(true);
	} );

	jQuery('#easy-cookies-button-text').on('change paste keyup', function() {
		jQuery('.easy-cookies-policy-accept').text(jQuery('#easy-cookies-button-text').val());
	} );

	jQuery('.easy-cookies-policy-create-pages').click( function() {
		easy_cookies_policy_create_pages();
	} );

	jQuery("#easy-cookies-policy-main-text").on('change paste keyup', function () {
		jQuery(".easy-cookies-policy-content span").html(jQuery("#easy-cookies-policy-main-text").val());
	});

	jQuery("#easy-cookies-text-color").on('change paste keyup', function () {
		var color = jQuery("#easy-cookies-text-color").val();
		if (color.substr(0, 1) != '#') jQuery("#easy-cookies-text-color").val('#' + color.substr(0, 6));
		jQuery("#easy-cookies-color-picker").val(jQuery("#easy-cookies-text-color").val());
		jQuery(".easy-cookies-policy-content span").css("color", jQuery("#easy-cookies-text-color").val());
	});

	jQuery("#easy-cookies-color-picker").on('change', function () {
		jQuery("#easy-cookies-text-color").val(jQuery("#easy-cookies-color-picker").val());
		jQuery(".easy-cookies-policy-content span").css("color", jQuery("#easy-cookies-text-color").val());
	});

	jQuery(".easy-cookies-policy-background input[type='radio']").on('change', function () {
		jQuery("#easy-cookies-policy-main-wrapper").removeClass("easy-cookies-policy-theme-black easy-cookies-policy-theme-white easy-cookies-policy-theme-blue easy-cookies-policy-theme-green easy-cookies-policy-theme-red");
		jQuery("#easy-cookies-policy-main-wrapper").addClass("easy-cookies-policy-theme-" + jQuery(".easy-cookies-policy-background input[type='radio']:checked").val());
		jQuery("#easy-cookies-policy-main-wrapper").css('background-color', easy_cookies_policy_get_tc(
			easy_cookies_policy_get_hexc(jQuery(".ecp-bg-radio .ecp-bg-" + jQuery(".easy-cookies-policy-background input[type='radio']:checked").val()).css('background-color')),
			jQuery("#easy-cookies-policy-transparency input[name='ecp-transparency']").val()/100)
		);
	});

	jQuery("#easy-cookies-policy-transparency input[name='ecp-transparency']").on('change', function () {
		jQuery("#easy-cookies-policy-transparency label").html(jQuery("#easy-cookies-policy-transparency input[name='ecp-transparency']").val());
		jQuery("#easy-cookies-policy-main-wrapper").css('background-color', easy_cookies_policy_get_tc(
			easy_cookies_policy_get_hexc(jQuery(".ecp-bg-radio .ecp-bg-" + jQuery(".easy-cookies-policy-background input[type='radio']:checked").val()).css('background-color')),
			jQuery("#easy-cookies-policy-transparency input[name='ecp-transparency']").val()/100)
		);
	});

	jQuery("#easy-cookies-policy-behavior").on("change", function () {
		jQuery("#easy-cookies-policy-main-wrapper").removeClass("easy-cookies-policy-close-auto easy-cookies-policy-close-close easy-cookies-policy-close-accept").addClass("easy-cookies-policy-close-" + jQuery("#easy-cookies-policy-behavior").val());
	});
});
