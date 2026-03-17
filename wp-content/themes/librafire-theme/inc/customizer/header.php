<?php
	$wp_customize->add_panel( 'header_options', array(
	 'priority'       => 51,
	  'capability'     => 'edit_theme_options',
	  'theme_supports' => '',
	  'title'          => __('Header', 'libra'),
	) );
 	$wp_customize->get_section( 'header_image' )->panel = 'header_options';
 	$wp_customize->get_section( 'header_image' )->title = 'Logo';

 	$wp_customize->add_section( 'sticky_header_section' , array(
    'title'      => __( 'Header Layout', 'libra' ),
    'priority'   => 90,
    'panel' => 'header_options'
    ) );
 	$wp_customize->add_setting( 'sticky_header' , array(
    	'default' => 'no',
        'sanitize_callback' => 'sanitize_choices',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sticky_header', array(
        'section'  => 'sticky_header_section',
        'settings' => 'sticky_header',
        'label' => __( 'Enable Sticky Header', 'libra' ),
        'type' => 'radio',
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    ) ) );



    $wp_customize->add_setting( 'side_widget_area' , array(
        'default' => 'no',
        'sanitize_callback' => 'sanitize_choices',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'side_widget_area', array(
        'section'  => 'sticky_header_section',
        'settings' => 'side_widget_area',
        'label' => __( 'Enable Side Widget Area', 'libra' ),
        'type' => 'radio',
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    ) ) );


    $wp_customize->add_setting( 'left_menu_layout' , array(
        'default' => 'no',
        'sanitize_callback' => 'sanitize_choices',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'left_menu_layout', array(
        'section'  => 'sticky_header_section',
        'settings' => 'left_menu_layout',
        'label' => __( 'Enable Side Menu Layout', 'libra' ),
        'type' => 'radio',
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    ) ) );

$wp_customize->add_setting( 'enable_top_bar' , array(
    'default' => 'yes',
    'sanitize_callback' => 'sanitize_choices',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_top_bar', array(
    'section'  => 'top_bar',
    'settings' => 'enable_top_bar',
    'label' => __( 'Enable Top Bar', 'libra' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
) ) );

$wp_customize->add_setting( 'social_icon_text' , array(
    'default' => 'Follow us',
    'sanitize_callback' => 'text_sanitize',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_icon_text', array(
    'section'  => 'top_bar',
    'settings' => 'social_icon_text',
    'label' => __( 'Social Icons Text', 'libra' ),
    'type' => 'text',

) ) );

$wp_customize->add_setting( 'social_icons_in_header' , array(
    'default' => 'no',
    'sanitize_callback' => 'sanitize_choices',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_icons_in_header', array(
    'section'  => 'top_bar',
    'settings' => 'social_icons_in_header',
    'label' => __( 'Social Icons In TopBar', 'libra' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
) ) );


$wp_customize->add_setting( 'side_widget_area' , array(
    'default' => 'no',
    'sanitize_callback' => 'sanitize_choices',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'side_widget_area', array(
    'section'  => 'sticky_header_section',
    'settings' => 'side_widget_area',
    'label' => __( 'Enable Side Widget Area', 'libra' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
) ) );

$wp_customize->add_setting( 'full_width_header' , array(
    'default' => 'no',
    'sanitize_callback' => 'sanitize_choices',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'full_width_header', array(
    'section'  => 'sticky_header_section',
    'settings' => 'full_width_header',
    'label' => __( 'Enable Full Width Header', 'libra' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
) ) );






$wp_customize->add_section( 'top_bar' , array(
    'title'      => __( 'Top Bar', 'libra' ),
    'priority'   => 90,
    'panel' => 'header_options'
) );


$wp_customize->add_setting( 'phone_number' , array(
    'default'   => '',
    'sanitize_callback' => 'text_sanitize'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_number', array(
    'label'    => __( 'Phone Number', 'libra' ),
    'section'  => 'top_bar',
    'settings' => 'phone_number',
) ) );


$wp_customize->add_setting( 'your_email' , array(
    'default'   => '',
    'sanitize_callback' => 'text_sanitize'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'your_email', array(
    'label'    => __( 'Email Address', 'libra' ),
    'section'  => 'top_bar',
    'settings' => 'your_email',
) ) );



/****--------*/

$wp_customize->add_section( 'header_colors' , array(
    'title'      => __( 'Header Colors', 'libra' ),
    'priority'   => 90,
    'panel' => 'header_options'
) );


$wp_customize->add_setting( 'main_menu_text_color', array(
    'default'   => '#000',
    'sanitize_callback' => 'sanitize_color'   ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_text_color', array(
    'label'    => __( 'Main Menu Text', 'libra' ),
    'section'  => 'header_colors',
    'settings' => 'main_menu_text_color',
    'priority'   => 3
) ) );

$wp_customize->add_setting( 'header_color', array(
    'default'   => '#FFF',
    'sanitize_callback' => 'sanitize_color'   ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
    'label'    => __( 'Header Background Color', 'libra' ),
    'section'  => 'header_colors',
    'settings' => 'header_color',
    'priority'   => 3
) ) );

$wp_customize->add_setting( 'transpraent_header' , array(
    'default' => 'yes',
    'sanitize_callback' => 'sanitize_choices',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'transpraent_header', array(
    'section'  => 'header_colors',
    'settings' => 'transpraent_header',
    'label' => __( 'Enable Transparent Header', 'libra' ),
    'type' => 'radio',
    'choices' => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
) ) );

 ?>