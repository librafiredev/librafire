<?php
/**
 * Homepage header template
 */

?>

    <div class="header-company-description">
        <div class="container align-center">
            <?php echo '<img src="' . get_field('slider_logo')['url'] . '" alt="' . get_field('slider_logo')['alt'] . '"/>'; ?>
        </div>
    </div>

<?php if (have_rows('main_slider')) :
    echo '<div class="home-slider"><!-- Home Slider -->';
    while (have_rows('main_slider')) : the_row();
        echo '<div class="home-slide" style="background-image: url(' . get_sub_field('slide_image')['url'] . ');">';
       echo '<h3 class="main-title">' . get_sub_field('slider_main_text') . '</h3>';
        if (get_sub_field('call_to_action')) :
            echo '<a class="btn-link slider-action" href="' . get_sub_field('call_to_action')['url'] . '" target="_self" >' . get_sub_field('call_to_action')['title'] . '</a>';
        endif;
        if (get_sub_field('slide_image')) :
            echo '<h2 class="d-flex align-items-center justify-content-center">' . get_sub_field('slide_image')['description'] . '</h2>';
        endif;
        echo '</div>';
    endwhile;
    wp_reset_postdata();
    echo '</div><!-- End of Home Slider -->';
endif;
