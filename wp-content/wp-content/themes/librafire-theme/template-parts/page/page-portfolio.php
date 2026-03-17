<?php

/**
 * Portfolio template
 */
?>

<?php
$portfolio = get_posts([
    'post_type'         => 'project',
    'posts_per_page'    => -1,
]);
?>

<section id="portfolio" class="portfolio">
   
    <div class="portfolio__inner">
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); ?>

        <?php if($portfolio): ?>

        <div class="portfolio__items">

            <?php 
                $i = 0;
                foreach($portfolio as $project): 
                    global $post;
                    $post = $project;
                    setup_postdata($post);
                    $image = get_field('portfolio_image', get_the_ID());
                    $image_ID = isset($image['ID']) ? $image['ID'] : "";  
                    $title = get_the_title();
                    $content = get_the_content();
                    $technologies = get_field('technologies', get_the_ID());
                    $logo = get_field('logo', get_the_ID());
                    $i++;
            ?>

                <div class="portfolio__item" id="project-<?php echo $project->ID; ?>">
                    <?php 
                    if($i % 2 == 0) {
                        echo file_get_contents(get_template_directory() . '/images/lines/portfolio-2.svg');
                    } else {
                        echo file_get_contents(get_template_directory() . '/images/lines/portfolio-1.svg');
                    }
                    ?>
                    <div class="portfolio__item-wrapper">

                        <?php if($image): ?>
                            <div class="portfolio__item-image">
                                <?php echo wp_get_attachment_image($image_ID, 'large'); ?>
                            </div>
                        <?php else : ?>
                            <div class="portfolio__item-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio-placeholder-image.png" width="680" height="430" alt="Portfolio placeholder image">
                            </div>
                        <?php endif; ?>

                        <div class="portfolio__item-content">

                            <?php if($title): ?>

                            <h3 class="heading-third"><?php echo $title; ?></h3>

                            <?php endif; ?>

                            <?php if($content): ?>

                            <div class="portfolio__item-text">
                                <?php the_content(); ?>
                            </div>

                            <?php endif; ?>

                            <div class="portfolio__item-bottom">

                                <?php if($technologies): ?>

                                <a href="<?php echo get_home_url(); ?>/our-story/#our-technology" class="portfolio__item-technologies">
                                    <p><?php esc_html_e('Programs and languages:', 'libra'); ?></p>
                                    <div class="portfolio__item-technologies-icons">

                                        <?php
                                        foreach($technologies as $technology):
                                            echo get_the_post_thumbnail($technology, 'thumbnail');
                                        endforeach;
                                        ?>

                                    </div>
                                </a>

                                <?php endif; ?>

                                <?php if($logo): ?>

                                <div class="portfolio__item-logo">
                                    <?php echo wp_get_attachment_image($logo, 'medium'); ?>
                                </div>

                                <?php endif; ?>

                            </div>

                        </div>
                    </div>
                </div>

            <?php 
            endforeach;
            wp_reset_postdata(); 
            ?>
            
        </div>

        <?php endif; ?>

    </div>
</section><!-- End of Portfolio -->