<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Starter
 */

?>

<?php if ( ! is_page_template( 'tpl-services.php' ) && ! is_page_template( 'tpl-contact.php' ) && ! is_page_template( 'tpl-quote.php' ) && ! is_page( 'about-us' ) && ! is_404() ) :
	get_template_part( 'template-parts/footer/footer', 'above' );
endif; ?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="widget-wrapper">
        <div class="container">
            <div class="row justify-content-center footer-widgets-wrapper">
				<?php get_template_part( 'template-parts/footer', 'widgets' ); ?>
            </div>
        </div>
    </div>
    <div class="footer-contact">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="contact-info col-md-6">
                    <?php if ( get_field( 'phone', 'option' ) ) : ?>
                        <div class="col-12 col-lg-2">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <a href="tel:<?php echo str_replace( '-', '', get_field( 'phone', 'option' ) ) ?>"
                            target="hidden-iframe">
                                <?php the_field( 'phone', 'option' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ( get_field( 'email_address', 'option' ) ) : ?>
                        <div class="col-12 col-lg-2">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <a href="mailto:<?php the_field( 'email_address', 'option' ) ?>" target="hidden-iframe">
                                <?php the_field( 'email_address', 'option' ); ?>
                            </a>
                            <iframe name="hidden-iframe" style="visibility:hidden;display: none"></iframe>
                        </div>
                    <?php endif; ?>
                    <?php if ( get_field( 'address', 'option' ) ) : ?>
                        <div class="col-12 col-lg-4">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <a href="<?php the_field( 'location', 'option' ); ?>"
                            target="_blank"><?php the_field( 'address', 'option' ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-lg-4 col-md-6 socials">
                    <div class="social-wrapper">
                        <span><?php _e( 'Follow us', 'libra' ); ?></span><?php echo the_social_links(); ?></div>
                </div>
            </div>
        </div>
    </div>
	<?php if ( get_theme_mod( 'footer_customizer_text' ) != '' ): ?>
        <div class="site-info">
            <div class="container">
                <div class="footer-copyright col-md-12 align-center"><?php echo get_theme_mod( 'footer_customizer_text' ); ?></div>
            </div>
        </div><!-- .site-info -->
	<?php endif; ?>
 
</div>
	
</footer><!-- #colophon -->

</div><!-- #page -->

<script>
	<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
		
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-58934976-1', 'auto');
        ga('send', 'pageview');

    <?php endif; ?>
</script>

<?php echo get_field('smart_look_tracking_code', 'option'); ?>
     
<?php echo get_theme_mod( 'google_analytics_code' ); ?>

<?php wp_footer(); ?>

<script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZyxPjiipYXnSU0ygqeac2q7CVYMbh84q0uHVRRxEtvFPiQYbXWUorga2aqZJ0z"></script>
</body>
</html>
