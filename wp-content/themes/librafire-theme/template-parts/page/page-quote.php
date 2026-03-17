<?php
/**
 * Quote template
 */
?>

<section id="quote-content" class="essential"><!-- Quote section -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec9.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec10.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>

    <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-quote-orange-top-left.svg'); ?> 
    <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-quote-orange-top-right.svg'); ?> 
    <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-quote-orange-bottom-right.svg'); ?> 
    
    <div class="contact-container container">
        <?php echo file_get_contents(get_template_directory() . '/images/libra-guy.svg'); ?>
        <?php if ( get_field( 'content' ) ) : ?>
          <div class="get-in-touch quote">
            <?php the_field( 'content' ); ?>
          </div>
		    <?php endif; ?>
    </div>
</section><!-- End of Quote section -->
