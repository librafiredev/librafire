<?php
/**
 * Displaying author posts
 */
get_header(); ?>

    <section id="blog-page">
        <div class="container">
            <div class="row">

				<?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

            </div>
        </div>
    </section>

<?php get_footer();
