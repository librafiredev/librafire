<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_theme_mod('favicon_image'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php
    $site_name = 'LibraFire';
    $twitter = '@LibraFireAgency';
    $facebook = 'https://www.facebook.com/librafireagency/';
    $site_url = get_site_url();
    ?>
    <meta name="author" content="<?php echo $site_name ?>">
    <meta name="theme-color" content="#263038" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/images/apple-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo get_template_directory_uri() ?>/images/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo get_template_directory_uri() ?>/images/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo get_template_directory_uri() ?>/images/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo get_template_directory_uri() ?>/images/apple-icon-144x144.png" />
    <meta property="og:title" content="<?php echo $site_name; ?>: WordPress Development Services" />
    <meta property="og:type" content="website" />

    <meta property="og:description"
        content="<?php echo $site_name; ?> offers all types of WordPress development services.We are a team of dedicated WordPress developers and we provide best quality service." />
    <meta property="og:site_name" content="<?php echo $site_name; ?>" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="<?php echo $twitter ?>" />
    <meta name="twitter:creator" content="<?php echo $twitter ?>" />
    <meta name="twitter:url" content="<?php echo $site_url; ?>" />
    <meta name="twitter:title" content="<?php echo $site_name ?>: WordPress Development Services" />
    <meta name="twitter:description"
        content="<?php echo $site_name; ?> offers all types of WordPress development services.We are a team of dedicated WordPress developers and we provide best quality service." />
    <meta name="twitter:image" content="<?php echo get_template_directory_uri() ?>/images/og-image.jpg" />


    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo $site_name; ?>: WordPress Development Services">
    <meta itemprop="description"
        content="<?php echo $site_name; ?> offers all types of WordPress development services.We are a team of dedicated WordPress developers and we provide best quality service.">
    <!-- <meta itemprop="image" content="<?php //echo get_template_directory_uri() ?>/images/og-image.jpg"> -->

    <script type="application/ld+json">
        { "@context" : "http://schema.org",
            "@type" : "Organization",
            "name" : "<?php echo $site_name; ?>",
            "url" : "<?php echo $site_url; ?>",
            "logo": "<?php echo $site_url; ?>/images/logo-small.png",
            "sameAs" : [ "<?php echo $facebook; ?>",
                "https://twitter.com/<?php echo $twitter; ?>"]
        }
    </script>

    <!--  Style search results: Add sitelinks search box and site name in search results -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "url": "<?php echo $site_url; ?>",
            "name": "<?php echo $site_name ?>",
            "alternateName" : "<?php echo $site_name ?>: WordPress Development Services"
        }
    </script>

    <?php //if(is_front_page()) { ?>
    <link rel="preload" href="<?php echo site_url(); ?>/wp-content/themes/librafire-theme/images/lines/home-hero.svg"
        as="image" type="image/svg+xml" crossorigin="anonymous">
    <link rel="preload" href="<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Black.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Roman.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Heavy.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php //} ?>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "LibraFire",
  "url": "https://librafire.com",
  "logo": "https://librafire.com/logo.svg",
  "sameAs": [
    "https://www.facebook.com/LibraFire",
    "https://twitter.com/LibraFire",
    "https://www.linkedin.com/company/librafire"
  ],
  "contactPoint": [{
    "@type": "ContactPoint",
    "email": "info@librafire.com",
    "contactType": "Customer Service",
    "areaServed": "US"
  }]
}
</script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What technologies does LibraFire use?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "We specialize in WordPress, Laravel, HTML5, CSS3, SCSS, JavaScript, PHP, jQuery, Drupal, and Adobe Creative Suite."
    }
  }, {
    "@type": "Question",
    "name": "How can I get a quote?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Visit our Get‑a‑Quote page or contact us directly via the form."
    }
  }]
}
</script>

    <style>
        body {
            margin: 0;
        }

        .home-hero .heading-primary {
            color: #fff;
            font-size: 60px;
            font-weight: 900;
            letter-spacing: 0;
            line-height: 80px;
            margin: 0 0 50px;
            max-width: 398px;
            text-transform: none;
            width: 100%;
        }

        .home-hero .heading-primary .heading-primary-black {
            color: #252f37;
        }

        .screen-reader-text {
            clip: rect(1px, 1px, 1px, 1px);
            position: absolute !important;
            height: 1px;
            width: 1px;
            overflow: hidden;
        }


        @-ms-viewport {
            width: device-width;
        }


        html {
            box-sizing: border-box;
            -ms-overflow-style: scrollbar;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        .container {
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
            width: 100%;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1170px;
            }
        }

        .container-fluid {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
            width: 100%;
        }

        .row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }

        .no-gutters>.col,
        .no-gutters>[class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }

        .col-1,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-10,
        .col-11,
        .col-12,
        .col,
        .col-auto,
        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm,
        .col-sm-auto,
        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md,
        .col-md-auto,
        .col-lg-1,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg,
        .col-lg-auto,
        .col-xl-1,
        .col-xl-2,
        .col-xl-3,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-10,
        .col-xl-11,
        .col-xl-12,
        .col-xl,
        .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%;
        }

        .col-auto {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto;
            max-width: none;
        }

        .col-1 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 8.33333%;
            flex: 0 0 8.33333%;
            max-width: 8.33333%;
        }

        .col-2 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 16.66667%;
            flex: 0 0 16.66667%;
            max-width: 16.66667%;
        }

        .col-3 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }

        .col-4 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 33.33333%;
            flex: 0 0 33.33333%;
            max-width: 33.33333%;
        }

        .col-5 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 41.66667%;
            flex: 0 0 41.66667%;
            max-width: 41.66667%;
        }

        .col-6 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-7 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 58.33333%;
            flex: 0 0 58.33333%;
            max-width: 58.33333%;
        }

        .col-8 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 66.66667%;
            flex: 0 0 66.66667%;
            max-width: 66.66667%;
        }

        .col-9 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%;
        }

        .col-10 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 83.33333%;
            flex: 0 0 83.33333%;
            max-width: 83.33333%;
        }

        .col-11 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 91.66667%;
            flex: 0 0 91.66667%;
            max-width: 91.66667%;
        }

        .col-12 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .with_frm_style input[type="text"],
        .with_frm_style input[type="password"],
        .with_frm_style input[type="email"],
        .with_frm_style input[type="number"],
        .with_frm_style input[type="url"],
        .with_frm_style input[type="tel"],
        .with_frm_style input[type="file"],
        .with_frm_style input[type="search"],
        .with_frm_style select,
        .with_frm_style .frm-card-element.StripeElement {
            min-height: 30px;
            line-height: 1.3;
        }

        .project-container .project-slider {
            max-height: 450px;
            overflow: hidden;
        }

        .project-container .project-slider.slick-initialized {
            overflow: initial;
        }

        .social-wrapper {
            display: flex;
        }

        .grecaptcha-badge {
            display: none;
        }

        #our-technology .logo-container .w-100 {
            background: hsla(0, 0%, 100%, .2);
            height: 1px;
            margin: 30px 0;
        }

        #easy-cookies-policy-main-wrapper#easy-cookies-policy-main-wrapper {
            padding: 15px 30px;
            z-index: 9999999999
        }

        @media screen and (max-width: 1024px) {
            #easy-cookies-policy-main-wrapper .easy-cookies-policy-content {
                align-items: center;
                display: flex;
                justify-content: center;
                text-align: left
            }
        }

        @media screen and (max-width: 400px) {
            #easy-cookies-policy-main-wrapper .easy-cookies-policy-content {
                flex-direction: column;
                text-align: center
            }
        }

        #easy-cookies-policy-main-wrapper.easy-cookies-policy-theme-black .easy-cookies-policy-accept {
            background-color: #f16926;
            border: none;
            border-radius: 0;
            color: #fff;
            margin-left: 30px;
            margin-right: 0;
            transition: all .5s
        }

        #easy-cookies-policy-main-wrapper.easy-cookies-policy-theme-black .easy-cookies-policy-accept:hover {
            background-color: #f8a419
        }

        @media screen and (max-width: 400px) {
            #easy-cookies-policy-main-wrapper.easy-cookies-policy-theme-black .easy-cookies-policy-accept {
                margin: 15px auto 0
            }
        }

        #easy-cookies-policy-main-wrapper.easy-cookies-policy-theme-black a {
            color: #fff;
            transition: all .5s
        }

        #easy-cookies-policy-main-wrapper.easy-cookies-policy-theme-black a:hover {
            color: #f8a419
        }

        .attachment-load-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 76px;
            border: 2px dashed #fff;
            margin-top: 5px;
            border-radius: 5px;
        }

        @media screen and (max-width: 1199px) {
            .attachment-load-wrapper {
                height: 84px;
            }
        }

        @media screen and (max-width: 900px) {
            .attachment-load-wrapper {
                height: 80px;
            }
        }

        .attachment-load-button {
            background: transparent;
            border: 1px solid #fff;
            border-radius: 40px;
            color: #fff;
            cursor: pointer;
            font-family: Avenir-Black, sans-serif !important;
            font-size: 14px !important;
            font-weight: 900;
            letter-spacing: 1.8px;
            margin: 0;
            padding: 8px 70px;
            text-align: center;
            text-transform: uppercase;
            transition: all .5s;
        }

        @media screen and (max-width: 1199px) {
            .attachment-load-button {
                font-size: 13px !important;
                padding: 12px 50px !important;
            }
        }

        @media screen and (max-width: 900px) {
            .attachment-load-button {
                padding: 10px 50px !important;
            }
        }

        .page-header.page-header {
            padding: 0;
        }

        .no-results.not-found {
            padding: 0 15px 40px;
        }

        @media screen and (max-width: 569px) {
            .no-results.not-found {
                padding: 0 15px;
            }
        }

        .frm_dropzone.frm_multi_upload {
            display: none;
        }

        .category-selector.category-selector {
            display: none !important;
        }

        .categories-load {
            background-color: #fff;
            border: 2px solid #f05928;
            border-radius: 40px;
            height: 40px;
            font-family: Avenir-Black, sans-serif;
            font-size: 18px;
            font-weight: 900;
            letter-spacing: 1.8px;
            color: #f05928;
            line-height: 40px;
            padding: 0 20px;
            text-transform: uppercase;
            width: 211px;
            margin-left: auto;
            margin-bottom: 40px;
        }

        @font-face {
            font-family: 'Avenir-Black';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Black.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Black.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Black.ttf') format('truetype');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Light.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Light.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir-Book-Oblique';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-BookOblique.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-BookOblique.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-BookOblique.ttf') format('truetype');
            font-weight: normal;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Oblique.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Oblique.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Oblique.ttf') format('truetype');
            font-weight: normal;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir Black Oblique';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-BlackOblique.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-BlackOblique.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-BlackOblique.ttf') format('truetype');
            font-weight: 900;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-LightOblique.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-LightOblique.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-LightOblique.ttf') format('truetype');
            font-weight: 300;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-MediumOblique.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-MediumOblique.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-MediumOblique.ttf') format('truetype');
            font-weight: 500;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir-Roman';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Roman.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Roman.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Roman.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir-Book';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Book.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Book.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Book.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir-Medium';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Medium.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Medium.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Medium.ttf') format('truetype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir-Heavy';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Heavy.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Heavy.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-Heavy.ttf') format('truetype');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Avenir';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-HeavyOblique.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-HeavyOblique.woff') format('woff'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Avenir-HeavyOblique.ttf') format('truetype');
            font-weight: 900;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Montserrat-Light.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Montserrat-Light.woff') format('woff');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Montserrat-Medium.woff2') format('woff2'),
                url('<?php echo site_url(); ?>/wp-content/themes/librafire-theme/fonts/Montserrat-Medium.woff') format('woff');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
    </style>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <?php if (is_front_page()):
            get_template_part('template-parts/header/header', 'nav-absolute');

            $header_hero = get_field('choose_home_hero');
            if ($header_hero === 'home-hero-with-slider'):
                get_template_part('template-parts/header/header', 'home-hero-slider');

            elseif ($header_hero === 'home-hero-basic'):
                get_template_part('template-parts/header/header', 'home-hero');
            endif;
        else:
            get_template_part('template-parts/header/header', 'nav-absolute');
            get_template_part('template-parts/header/header', 'page');
        endif; ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'libra'); ?></a>
        <header id="masthead" class="site-header">
            <div class="logo-menu-wrapper d-flex align-items-center">
                <div class="site-branding-main-logo site-branding">
                    <div class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="Home">
                            <svg version="1.1" id="libra_logo" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="48.75px" height="72px"
                                viewBox="0 0 48.75 72" enable-background="new 0 0 48.75 72" xml:space="preserve">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FAA61A"
                                        d="M30.32,30.661c-2.509,6.069-7.69,11.79-10.048,18.706
                                    c-2.582,7.573,2.302,12.366,8.547,9.697C38.733,54.829,38.227,36.717,30.32,30.661z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FAA61A"
                                        d="M18.986,25.762c-2.399,4.134-5.529,9.543-7.195,15
                                    C7.71,54.124,14.574,63.095,24.032,63.17c8.354,0.065,13.271-7.45,14.101-14.191C41.184,61.28,33.717,71,22.779,71
                                    C5.674,71-1.411,54.721,1.41,40.267C3.654,28.77,14.425,12.966,15.203,6.968C17.479,8.497,23.538,16.976,18.986,25.762z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#F15625"
                                        d="M16.375,56.573c-0.02-0.017-6.858-6.102-0.206-20.456
                                    c2.308-4.979,4.992-8.934,6.699-14.375C24.89,15.292,20.338,6.543,15.695,1c4.993,4.068,26.742,9.181,32.497,3.606
                                    c-2.279,9.944-12.438,10.545-18.417,8.536c0.895,3.074,1.05,5.907,0.703,8.574c5.642,0.563,10.892,0.11,13.313-2.235
                                    c-1.926,8.402-9.478,10.133-15.381,9.255C24.276,38.021,15.9,45.892,16.375,56.573z" />
                                </g>
                            </svg>
                        </a>
                    </div>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"
                        aria-label="Menu toggle">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'clearfix'
                    )); ?>
                </nav><!-- #site-navigation -->
            </div> <!-- /.container logo-menu-wrapper clearfix -->
        </header><!-- #masthead -->

        <div id="content" class="site-content">