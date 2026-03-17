<?php
/**
 * Template name: Wiki's
 */
get_header(); ?>

    <section id="wiki"><!-- Wiki's section -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form id="search-wiki" action="get" method="<?php echo site_url('/') ?>">
                        <input type="text" name="search" id="search" placeholder="Search Wiki"/>
                    </form>
                </div>
            </div>
            <div class="row wiki-sorting">
				<?php get_template_part( 'template-parts/page/page', 'wiki' ); ?>
            </div>
        </div>
    </section><!--End of Wiki's section -->

<?php get_footer();
