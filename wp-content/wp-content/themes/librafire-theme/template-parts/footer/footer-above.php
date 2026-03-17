<?php
/**
 * Section above footer with contact form
 */

if(get_locale() == 'nl_NL'){
    $contact_us_id = 'contact';

}else{
    $contact_us_id = 'contact-us';
}
?>
<section id="contact-us" class="essential" data-slug="<?php echo $contact_us_id;?>"><!-- Contact Us -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec1.svg'); ?>
    <?php //echo file_get_contents(get_template_directory() . '/images/decorations/dec7.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec8.svg'); ?>
    <div class="contact-container">
        <?php if (get_field('contact_image', 'option')) : ?>
            <div class="office">
                <?php 
                    if( $image = get_field('contact_image', 'option') ) :
                        echo wp_get_attachment_image( $image['ID'], 'contact' ); 
                    endif;
                ?>
            </div>
        <?php endif; ?>
        <?php if (get_field('contact_form', 'option')) : ?>
            <div class="work-with-us">
            <?php echo file_get_contents(get_template_directory() . '/images/lines/contact-us.svg'); ?>
	            <?php if (get_field('contact_title')) : ?>
                    <h3><?php the_field('contact_title') ?></h3>
	            <?php else : ?>
                    <h3><?php the_field('form_title', 'option'); ?></h3>
	            <?php endif; ?>
                <?php echo do_shortcode('' . get_field('contact_form', 'option') . ''); ?>
            </div>
        <?php endif; ?>
    </div>
</section><!-- End of Contact Us -->
