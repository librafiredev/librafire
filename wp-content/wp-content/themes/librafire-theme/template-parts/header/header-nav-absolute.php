<?php

/**
 * Absolute nav
 */
?>

<div class="header-nav-absolute">
    <div class="container">
        <div class="header-nav-absolute__nav-logo">
            <div class="header-nav-absolute__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="site-logo">
                    <img src="<?php echo (esc_url(get_header_image())); ?>" alt="<?php echo (esc_attr(get_bloginfo('title'))); ?>" />
                </a>
            </div>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'header_top',
                'container' => 'nav',
                'container_id' => 'header-top',
                'menu_class' => 'clearfix'
            ));
            ?>
        </div>
    </div>
</div>