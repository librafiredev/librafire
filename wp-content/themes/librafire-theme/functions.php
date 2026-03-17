<?php
/**
 * Starter functions and definitions
 *
 * @package Starter
 */

if ( ! function_exists( 'starter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function starter_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Starter, use a find and replace
		 * to change 'libra' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'libra', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add theme photo sizes
		add_image_size( 'blog', 360, 193, true );
		add_image_size( 'blog-thumb', 360, 560, true );
		add_image_size( 'contact', 747, 570, true );
		add_image_size( 'portfolio', 360, 360, true );
		add_image_size( 'single', 1920, 400, true );
		add_image_size( 'partner', 240, 110, true );
		add_image_size( 'service-bg', 487, 530, true );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary'    => esc_html__( 'Primary Menu', 'libra' ),
			'header_top' => esc_html__( 'Header Top', 'libra' ),
			'footer'     => esc_html__( 'Footer Menu', 'libra' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'starter_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif; // starter_setup
add_action( 'after_setup_theme', 'starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'starter_content_width', 640 );
}

add_action( 'after_setup_theme', 'starter_content_width', 0 );


// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);
 
// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
 
//Disable gutenberg style in Front
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'libra' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'libra' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */





function starter_scripts() {

	//wp_enqueue_style( 'montserrat', '//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&amp;subset=latin-ext' );
	//wp_enqueue_style( 'playfair', '//fonts.googleapis.com/css?family=Playfair+Display:400,700,900&amp;subset=latin-ext' );

    wp_enqueue_style( 'libra-grid', get_stylesheet_directory_uri() . '/css/grid.min.css' );
    wp_enqueue_style( 'reset', get_stylesheet_directory_uri() . '/css/reset.css' );
    wp_enqueue_style( 'lf', get_stylesheet_directory_uri() . '/dist/lf.css' );
	wp_enqueue_script( 'libra-select2-js', get_template_directory_uri() . '/js/select2.min.js', array( 'jquery' ), '25', true );
	wp_enqueue_script( 'libra-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '1.01', true );
	// wp_enqueue_script( 'imagesloaded-theme', get_template_directory_uri() . '/js/imagesloaded.min.js', array( 'jquery' ), '4.1.3', false );
	wp_enqueue_script( 'intersection', get_template_directory_uri() . '/js/intersection.js', array(), '1.1', true );
	wp_enqueue_script( 'equal-height', get_template_directory_uri() . '/js/equalheight.js', array(), '1.1', true );
	//wp_enqueue_script( 'libra-main', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'imagesloaded-theme' ), '1.0', true );
	wp_enqueue_script( 'libra-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'libra-main', 'get_info', array(
		'root'  => get_template_directory_uri(),
		'ajax'  => admin_url( 'admin-ajax.php' ),
		'blog'  => is_single(),
		'page'  => is_page(),
		'home'  => is_front_page()
	) );
	wp_enqueue_script( 'libra-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if(!is_page_template( 'tpl-quote.php' ) && !is_page_template( 'tpl-contact.php' )) {
    	wp_dequeue_style( 'formidable' );
    }



}

add_action( 'wp_enqueue_scripts', 'starter_scripts' );

function footer_styles() {
    wp_enqueue_style( 'libra-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'libra-select2', get_template_directory_uri() . '/css/select2.min.css' );
	if(!is_page_template( 'tpl-quote.php' ) && !is_page_template( 'tpl-contact.php' )) {
      wp_enqueue_style( 'formidable' );
    }
  
}

add_action( 'wp_footer', 'footer_styles' );




// remove tag type for scripts/style
//add_filter( 'script_loader_tag', 'clean_script_tag' );

function clean_script_tag( $input ) {
	$input = str_replace( "type='text/javascript' ", '', $input );

	return str_replace( "'", '"', $input );
}

function script_style_type_off() { ?>
    <script>
        window.onload = function () {
            var scripts = document.getElementsByTagName("script");
            for (var i = 0; i < scripts.length; i++) {
                if (scripts[i].type === "text/javascript") {
                    scripts[i].removeAttribute("type");
                }
            }
            var styles = document.getElementsByTagName("style");
            for (var j = 0; j < styles.length; j++) {
                if (styles[j].type === "text/css") {
                    styles[j].removeAttribute("type");
                }
            }
        }
    </script>
<?php }

add_action( 'wp_head', 'script_style_type_off' );

add_filter( 'get_the_archive_title', function ( $title ) {

	if ( is_category() ) {

		$title = single_cat_title( '', false );

	} elseif ( is_tag() ) {

		$title = single_tag_title( '', false );

	} elseif ( is_author() ) {

		$title = '<span class="vcard">' . get_the_author() . '</span>';

	}

	return $title;

} );
function customizer_css() {
	get_template_part( '/inc/customizer_css' );
}

//add_action( 'wp_head', 'customizer_css', '100' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Helper Functions
 */
require get_template_directory() . '/inc/theme_functions.php';
/**
 * Include slick
 */
require get_template_directory() . '/inc/slick/slick.php';
/**
 * Include Nav helper
 */
require get_template_directory() . '/inc/nav-helper/nav.php';
/**
 * Include Custom Post Type
 */
require get_template_directory() . '/inc/cpt.php';
/**
 * Include Isotope
 */
require get_template_directory() . '/inc/isotope/isotope.php';
/**
 * Include Magnific Popup
 */
require get_template_directory() . '/inc/popup/popup.php';

 /**
 * Include File Upload
 */
require get_template_directory() . '/inc/fileupload/upload.php';

/*
 * Wp-Login Logo Change
 * */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo( get_header_image() ); ?>);
            width: 100% !important;
            background-size: auto;
            background-position: center;
            margin-bottom: 0;
            min-height: 75px;
        }

		.login {
			background-color: #f7a31f;
		}

		body.login form {
			border: 0;
			border-radius: 15px;
			background: #f05928;
		}

		body.login form input[type=checkbox]:hover, body.login form input[type=checkbox]:focus{
			box-shadow: none;
			outline: none;
		}

		body.login .forgetmenot {
			cursor: pointer;
		}

		body.login .forgetmenot input[type='checkbox'] {
			position: absolute;
			left: -9999px;
			opacity: 0;
		}

		body.login .forgetmenot input[type='checkbox']:checked + label::after {
			transform: scale(1);
		}

		body.login .forgetmenot label {
			position: relative;
			cursor: pointer;
		}

		body.login .forgetmenot label::before {
			display: inline-block;
			content: '';
			width: 20px;
			height: 20px;
			border: 1px solid #fff;
			margin-right: 15px;
			position: relative;
			top: 6px;
			transition: 250ms ease;
			border-radius: 4px;
		}

		body.login .forgetmenot label::after {
			display: block;
			content: '';
			left: 5px;
			top: 11px;
			position: absolute;
			width: 12px;
			height: 12px;
			transform: scale(0);
			background-color: #fff;
			transition: all .3s ease;
			border-radius: 2px;
		}
		body.login #backtoblog a, body.login #nav a {
			color: #fff;
			transition: .3s all ease-in;
			font-size: 16px;
		}

		body.login #backtoblog a:hover, body.login #nav a:hover, body.login #backtoblog a:focus, body.login #nav a:focus
		 {
			color: #333;
			outline: none;
			box-shadow: none;
		}

		body.login label {
			color: #fff;
			margin-bottom: 5px;
			font-size: 16px;
		}

		body.login .button-primary {
			background-color: #333;
			border: 0;
			font-size: 16px;
			border-radius: 4px;
			transition: .3s all ease-in;
		}

		body.login .button-primary:hover, body.login .button-primary:active, body.login .button-primary:focus, body.login .button-primary:focus-visible {
			background-color: #f7a31f;
			box-shadow: none;
			outline: none;
		}

		body.login form .input, .login input[type=password], body.login input[type=text] {
			font-size: 22px;
			border: 0;
			font-family: inherit;
			color: #333;
			padding: 0 8px;
		}

		body.login form .input:focus, .login input[type=password]:focus, body.login input[type=text]:focus {
			box-shadow: 0 0 0 1px #333;
		}

		body.login .dashicons-visibility::before  {
			color: #333;
		}

		body.login .dashicons-hidden::before  {
			color: #333;
		}

		body.login .button.wp-hide-pw:focus {
			box-shadow: none;
			border: 0;
		}

		body.login .message, body.login .notice, body.login .success  {
			border: 0;
    		margin-top: 20px;
		}

		body.login .language-switcher .button {
			background-color: #666;
			color: #fff;
			border: 0;
			border-radius: 4px;
			transition: .3s all ease-in;
		}

		body.login .language-switcher .button:hover, body.login .language-switcher .button:active, body.login .language-switcher .button:focus, body.login .language-switcher .button:focus-visible {
			background-color: #333;
			box-shadow: none;
			outline: none;
		}

		body.login #language-switcher select {
			transition: .3s all ease-in;
		}

		body.login #language-switcher select:hover, body.login #language-switcher select:active, body.login #language-switcher select:focus, body.login #language-switcher select:focus-visible  {
			box-shadow: none;
			outline: none;
			border-color: #333;
			color: #333;
		}


    </style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Style ACF tabs
function my_acf_admin_head5() {

	?>
    <style type="text/css">
        .acf-tab-group li.active a {
            background: #F16926 !important;
            color: #FFF !important;
        }
    </style>
<?php }

add_action( 'acf/input/admin_head', 'my_acf_admin_head5' );

// ACF Theme option page
if ( function_exists( 'acf_add_options_page' ) ) {
	$option_page = acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'icon_url'   => 'dashicons-admin-home',
		'capability' => 'edit_posts'
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Footer Settings',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-general-settings'
	) );
}

// Add breadcrumbs
function breadcrumbs_i() {
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	}
}

// Add feature image description
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_des' );
function add_featured_image_des( $content ) {
	return $content .= '<p>' . __( 'Please use an image that is 1920 x 400px.', 'libra' ) . '</p>';
}

// Add meta box to page (page excerpt)
add_action( 'add_meta_boxes', 'add_page_meta' );
function add_page_meta() {
	add_meta_box(
		'page_meta',
		'Page Excerpt',
		'display_page_information',
		'page',
		'normal',
		'default' );
}

function display_page_information( $post ) {
	global $post;
	$values = get_post_custom( $post->ID );
	$text   = isset( $values['custom_page_excerpt'] ) ? esc_attr( $values['custom_page_excerpt'][0] ) : "";
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	echo '<textarea style="width: 100%" name="custom_page_excerpt" rows="3" placeholder="Add page excerpt...">' . $text . '</textarea>';
}

add_action( 'save_post', 'cd_meta_box_page' );

function cd_meta_box_page( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post' ) ) {
		return;
	}
	if ( defined( "DOING_AUTOSAVE" ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( isset( $_POST["custom_page_excerpt"] ) ) {
		$meta_box_text_value = $_POST["custom_page_excerpt"];
	}
	update_post_meta( $post_id, "custom_page_excerpt", $meta_box_text_value );
}

// Add google map API ket for acf
function custom_acf_init() {

	acf_update_setting( 'google_api_key', GOOGLE_MAPS_API_KEY );
}

add_action( 'acf/init', 'custom_acf_init' );

// Load more posts on select category
add_action( 'wp_ajax_load_libra_posts', 'load_more_post' );
add_action( 'wp_ajax_nopriv_load_libra_posts', 'load_more_post' );

function load_more_post() {
	$offset = intval( $_POST['posts_offset'] );

	$cat    = $_POST['cat'];
	$cat_id = intval( get_cat_ID( $cat ) );
	$args   = array(
		'post_type'      => 'post',
		'posts_per_page' => get_option( 'posts_per_page' )
	);
	if ( $cat != '*' ) {
		$args['cat'] = $cat_id;
	}

	$posts = new WP_Query( $args );
	if ( $posts->found_posts !== 0 ) {
		if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile;
			wp_reset_postdata();
		endif;
	}

	wp_die();
}

// Load more posts on select category
add_action( 'wp_ajax_load_libra_more_posts', 'load_more_post_btn' );
add_action( 'wp_ajax_nopriv_load_libra_more_posts', 'load_more_post_btn' );

function load_more_post_btn() {
	$offset = intval( $_POST['posts_offset'] );
	$cat    = $_POST['cat'];
	$cat_id = intval( get_cat_ID( $cat ) );
	$args   = array(
		'post_type'      => 'post',
		'offset'         => $offset,
		'posts_per_page' => 3
	);
	if ( $cat != '*' ) {
		$args['cat'] = $cat_id;
	}

	$posts = new WP_Query( $args );
	if ( $posts->found_posts !== 0 ) {
		if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile;
			wp_reset_postdata();
		endif;
	}

	wp_die();
}

// Load project mockup
add_action( 'wp_ajax_project_mockup', 'project_mockup_get' );
add_action( 'wp_ajax_nopriv_project_mockup', 'project_mockup_get' );

function project_mockup_get() {

	$ID = intval( $_POST['id'] );

	if ( isset( $ID ) ) { ?>
        <img src="<?php echo get_field( 'mockup', $ID )['url']; ?>"
             alt="<?php echo get_field( 'mockup', $ID )['alt']; ?>">
	<?php }

	wp_die();
}

// Add short codes
if ( ! function_exists( 'jobs_list' ) ) {

	function jobs_list( $atts, $content = null ) {
		$pages        = new WP_Query();
		$get_children = $pages->query(
			array(
				'post_type'      => 'page',
				'posts_per_page' => '-1',
				'order'          => 'ASC',
				'post_parent'    => get_the_ID()
			) );
		$children     = get_page_children( get_the_ID(), $get_children );
		$list = '';
		if ( $children ) :
			$list         .= '<div class="careers-section">';
			$list.= file_get_contents(get_template_directory() . '/images/decorations/dec4.svg');
			$list.= file_get_contents(get_template_directory() . '/images/decorations/dec5.svg');  
			$list         .= '<h2>' . __( 'We are hiring', 'libra' ) . '</h2>';
			$list         .= '<div class="careers-container row">';
			foreach ( $children as $child ) :
				$list .= '<div class="col-md-4">';
				$list .= '<a class="career-item" href="' . get_the_permalink( $child->ID ) . '">';
				$list .= '<img src="' . get_field( 'small_photo', $child->ID )['url'] . '" width="' . get_field( 'small_photo', $child->ID )['width'] . '" height="' . get_field( 'small_photo', $child->ID )['height'] . '" alt="' . get_field( 'small_photo', $child->ID )['alt'] . '"/>';
				$list .= '<div class="career-info d-flex align-items-center">';
				$list .= '<h3>' . get_the_title( $child->ID ) . '</h3>';
				$list .= '</div>';
				$list .= '</a>';
				$list .= '</div>';
			endforeach;
			$list .= '</div>';
			$list .= '</div>';
		endif;

		return $list;
	}
}
add_shortcode( 'jobs_list_shortcode', 'jobs_list' );

// Remove search page
function wpb_filter_query( $query, $error = true ) {
	if ( is_search() ) {
		$query->is_search       = false;
		$query->query_vars[ s ] = false;
		$query->query[ s ]      = false;
		if ( $error == true ) {
			$query->is_404 = true;
		}
	}
}

add_action( 'parse_query', 'wpb_filter_query' );
// add_filter( 'get_search_form', create_function( '$a', "return null;" ) );


function generateRandomString( $length = 5 ) {
	$characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen( $characters );
	$randomString     = '';
	for ( $i = 0; $i < $length; $i ++ ) {
		$randomString .= $characters[ rand( 0, $charactersLength - 1 ) ];
	}

	return $randomString;
}

function custom_delete() {
	$output_dir = UPLOADS;
	if ( isset( $_POST["op"] ) && $_POST["op"] == "delete" && isset( $_POST['name'] ) ) {
		$fileName = $_POST['name'];
		$fileName = str_replace( "..", ".", $fileName );
		$filePath = $output_dir . $fileName;
		if ( file_exists( $filePath ) ) {
			unlink( $filePath );
		}
		echo "Deleted File " . $fileName . "<br>";
	}
	wp_die();
}

function add_rewrite_rules( $wp_rewrite )
{
    $new_rules = array(
        'blog/page/(.+?)/?$' => 'index.php?post_type=post&paged='. $wp_rewrite->preg_index(1),
        'blog/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
    );

    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'add_rewrite_rules');



function change_blog_links($post_link, $id=0){

    $post = get_post($id);

    if( is_object($post) && $post->post_type == 'post'){
        return home_url('/blog/'. $post->post_name.'/');
    }

    return $post_link;
}
add_filter('post_link', 'change_blog_links', 1, 3);

// Remove Emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_filter( 'xmlrpc_enabled', '__return_false' );

// Remove admin bar top margin

add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

// Redirect all 404 pages to home

if( !function_exists('redirect_404_to_homepage') ){

    add_action( 'template_redirect', 'redirect_404_to_homepage' );

    function redirect_404_to_homepage(){
       if(is_404()):
            wp_safe_redirect( home_url('/') );
            exit;
        endif;
    }
}

function sort_posts_by_date( $query )
{
    if ( $query->is_main_query() && ( $query->is_home() || $query->is_search() || $query->is_archive() )  )
    {
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'desc' );
    }
}
add_action( 'pre_get_posts', 'sort_posts_by_date' );
?>
