<?php
/**
 * Quote template
 */
?>

<section id="contact-content"><!-- Top Contact section -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec6.svg'); ?>
    <div class="contact-container">
		<?php if ( get_field( 'contact_image' ) ) : ?>
            <div class="office">
                  <?php 
                        if( $image = get_field('contact_image', 'option') ) :
                              echo wp_get_attachment_image( $image['ID'], 'contact' ); 
                        endif;
                  ?>
            </div>
		<?php endif;
		if ( get_field( 'content' ) ) : ?>
            <div class="get-in-touch quote">
				<?php the_field( 'content' ); ?>
            </div>
		<?php endif; ?>
    </div>
</section><!-- End of Top Contact section -->
