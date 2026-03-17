<?php
?>
<div class="easy-cookies-policy-admin">
	<div class="easy-cookies-policy-logo">
		<?php echo sprintf('<img src="%s">', ECP_DEF_BASEURL . '/files/logo.png');?>
	</div>
        <h1><?php echo ECP_DEF_PLUGIN_NAME;?></h1>
	<div class="easy-cookies-policy-box">
		<div class="easy-cookies-policy-grid">
			<h2><?php _e('Layout preview', 'easy-cookies-policy');?></h2>
			<?php echo $html_warning;?>
		</div>
		<form>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label class="padv10"><?php _e('Main text', 'easy-cookies-policy');?></label>
				<div id="easy-cookies-default-text" style="display: none"><?php echo $default_text;?></div>
				<div id="easy-cookies-set-default-text" class="easy-cookies-policy-button"><?php _e('Set default text', 'easy-cookies-policy');?></div>
			</div>
			<div class="easy-cookies-policy-input">
				<textarea name="easy-cookies-policy-main-text" id="easy-cookies-policy-main-text" rows="6"><?php echo esc_html($settings[ECP_CS_MAIN_TEXT]);?></textarea>
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Color theme', 'easy-cookies-policy');?></label>
			</div>
			<div class="easy-cookies-policy-input easy-cookies-policy-background">
				<input id="ecp-background-color-black" type="radio" name="ecp-background-color" value="black" <?php echo ($settings[ECP_CS_BGCOLOR] == 'black')? 'checked':'';?>>
				<label for="ecp-background-color-black" class="ecp-bg-radio"><div class="ecp-bg-black"></div></label>
				<input id="ecp-background-color-white" type="radio" name="ecp-background-color" value="white" <?php echo ($settings[ECP_CS_BGCOLOR] == 'white')? 'checked':'';?>>
				<label for="ecp-background-color-white" class="ecp-bg-radio"><div class="ecp-bg-white"></div></label>
				<input id="ecp-background-color-blue" type="radio" name="ecp-background-color" value="blue" <?php echo ($settings[ECP_CS_BGCOLOR] == 'blue')? 'checked':'';?>>
				<label for="ecp-background-color-blue" class="ecp-bg-radio"><div class="ecp-bg-blue"></div></label>
				<input id="ecp-background-color-green" type="radio" name="ecp-background-color" value="green" <?php echo ($settings[ECP_CS_BGCOLOR] == 'green')? 'checked':'';?>>
				<label for="ecp-background-color-green" class="ecp-bg-radio"><div class="ecp-bg-green"></div></label>
				<input id="ecp-background-color-red" type="radio" name="ecp-background-color" value="red" <?php echo ($settings[ECP_CS_BGCOLOR] == 'red')? 'checked':'';?>>
				<label for="ecp-background-color-red" class="ecp-bg-radio"><div class="ecp-bg-red"></div></label>
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Background transparency', 'easy-cookies-policy');?></label>
			</div>
			<div class="easy-cookies-policy-input" id="easy-cookies-policy-transparency">
				<input name="ecp-transparency" type="range" min="0" max="100" value="<?php echo ($settings[ECP_CS_TRANSPARENCY]);?>" step="1" />
				<label for="ecp-transparency"><?php echo $settings[ECP_CS_TRANSPARENCY];?></label>
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Warning text color', 'easy-cookies-policy');?></label>
			</div>
			<div class="easy-cookies-policy-input">
				<input id="easy-cookies-color-picker" type="color" value="<?php echo ($settings[ECP_CS_TEXT_COLOR]);?>" size="10" style="padding:0px; width: 50px">
				<input id="easy-cookies-text-color" type="text" name="ecp-text-color" value="<?php echo ($settings[ECP_CS_TEXT_COLOR]);?>" size="10" maxlength="7" style="width: 100px">
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Closing behavior', 'easy-cookies-policy');?></label>
			</div>
			<div class="easy-cookies-policy-input">
				<select id="easy-cookies-policy-behavior" name="ecp-behavior">
					<option value="auto" <?php echo ($settings[ECP_CS_CLOSE] == 'auto')? 'selected':'';?>><?php echo _e('Automatic (on next page load)', 'easy-cookies-policy');?></option>
					<option value="accept" <?php echo ($settings[ECP_CS_CLOSE] == 'accept')? 'selected':'';?>><?php echo _e('On Accept button click', 'easy-cookies-policy');?></option>
					<option value="close" <?php echo ($settings[ECP_CS_CLOSE] == 'close')? 'selected':'';?>><?php echo _e('On Close button click', 'easy-cookies-policy');?></option>
				</select>
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Warning accept button', 'easy-cookies-policy');?></label>
			</div>
			<div class="easy-cookies-policy-input">
				<input type="text" id="easy-cookies-button-text" value="<?php echo ($settings[ECP_CS_BUTTON_TEXT]);?>" size="10" maxlength="24">
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Warning box display', 'easy-cookies-policy');?></label>
			</div>
			<div class="easy-cookies-policy-input">
				<select id="easy-cookies-policy-display" name="easy-cookies-policy-display">
					<option value="fixed" <?php echo ($settings[ECP_CS_DISPLAY] == 'fixed')? 'selected':'';?>><?php echo _e('Fixed (always visible)', 'easy-cookies-policy');?></option>
					<option value="onpage" <?php echo ($settings[ECP_CS_DISPLAY] == 'onpage')? 'selected':'';?>><?php echo _e('On page content', 'easy-cookies-policy');?></option>
				</select>
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Warning box position', 'easy-cookies-policy');?></label>
			</div>
			<div class="easy-cookies-policy-input">
				<select id="easy-cookies-policy-position" name="easy-cookies-policy-position">
					<option value="top" <?php echo ($settings[ECP_CS_POSITION] == 'top')? 'selected':'';?>><?php echo _e('Top', 'easy-cookies-policy');?></option>
					<option value="bottom" <?php echo ($settings[ECP_CS_POSITION] == 'bottom')? 'selected':'';?>><?php echo _e('Bottom', 'easy-cookies-policy');?></option>
				</select>
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Warning expiration (days)', 'easy-cookies-policy');?></label>
			</div>
			<div class="easy-cookies-policy-input">
				<input name="ecp-expires" type="text" maxlength="4" value="<?php echo ($settings[ECP_CS_EXPIRES]);?>">
			</div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div id="easy-cookies-policy-cookies-policy"><?php echo $policy_instructions;?></div>
		</div>
		<div class="easy-cookies-policy-grid" style="<?php echo $button_create_pages;?>">
			<div class="easy-cookies-policy-button easy-cookies-policy-create-pages"><?php echo _e('Create cookies policy page', 'easy-cookies-policy');?></div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-label">
				<label><?php echo _e('Enable/disable cookies warning');?></label>
			</div>
			<label class="easy-cookies-policy-input switch">
				<input id="easy-cookies-policy-enabled" type="checkbox" <?php echo ($settings[ECP_CS_ENABLED] == 'true')?'checked':'';?>><div class="slider round"></div>
			</label>
		</div>
		<div class="easy-cookies-policy-grid">
                                <hr>
                </div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-messages"></div>
		</div>
		<div class="easy-cookies-policy-grid">
			<div class="easy-cookies-policy-button easy-cookies-policy-save"><?php echo _e('Save settings', 'easy-cookies-policy');?></div><br>
			<div class="easy-cookies-policy-button easy-cookies-policy-save easy-cookies-policy-savetry"><?php echo _e('Save settings & try out', 'easy-cookies-policy');?></div>
		</div>
	</form>
</div>
