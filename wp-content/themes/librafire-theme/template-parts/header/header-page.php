<?php
/**
 * Page header template
 */
?>

<?php $page_id = get_the_ID();
if (is_home() && get_option('page_for_posts')) : ?>
    <div id="hero-image">
        <?php
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'full');

            if ($image) { ?>
                <img class="hero-image__bcg" src="<?php echo $image['0']; ?>" alt="Hero image" width="<?php echo $image['1']; ?>" height="<?php echo $image['2']; ?>" >
            <?php } else { ?>
                <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-orange-left.svg'); ?>   
                <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-orange-right.svg'); ?>   
            <?php }
        ?>

        <div class="container">
            <h1><?php echo single_post_title(); ?></h1>
            <?php breadcrumbs_i(); ?>
        </div>
    </div>
<?php elseif (is_search()) : ?>
    <div id="hero-image"
         style="background-image: url('<?php echo get_template_directory_uri() . '/images/backgrounds/hero_code_bg.png' ?>')">
        <div class="container">
            <h1><?php echo single_post_title(); ?></h1>
            <?php breadcrumbs_i(); ?>
        </div>
    </div>
<?php elseif (is_author()) : ?>
    <div id="hero-image"
         style="background-image: url('<?php echo get_template_directory_uri() . '/images/backgrounds/hero_code_bg.png' ?>')">
        <div class="container">
            <h1><?php echo get_the_author($page_id); ?></h1>
            <?php breadcrumbs_i(); ?>
        </div>
    </div>
<?php elseif (is_404()) : ?>

<?php elseif (is_page_template( 'tpl-quote.php' )) : ?>

<?php elseif (is_category()) : ?> 
    <div id="hero-image">
        <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-orange-left.svg'); ?>   
        <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-orange-right.svg'); ?>   
            
        <div class="container">
            <h1><?php echo get_queried_object()->name; ?></h1>
            <?php breadcrumbs_i(); ?>
        </div>
    </div>
   
<?php else : ?>
    <div id="hero-image">
        <?php
            $postThumbId = get_post_thumbnail_id();
            $image = wp_get_attachment_image_src($postThumbId, 'full');

            /*$image = [
                "0" => get_stylesheet_directory_uri()."/images/hero-section.jpg",
                "1" => "1820",
                "2" => "500"
            ];*/

            if ($image) { ?>
                <img class="hero-image__bcg" src="<?php echo $image['0']; ?>" alt="Hero image" width="<?php echo $image['1']; ?>" height="<?php echo $image['2']; ?>" >
            <?php } else { ?>
                <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-orange-left.svg'); ?>   
                <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-orange-right.svg'); ?>   
            <?php }
        ?>

        <div class="container">
            <h1><?php echo get_the_title($page_id); ?></h1>
            <?php breadcrumbs_i(); ?>
        </div>
    </div>
<?php endif;
