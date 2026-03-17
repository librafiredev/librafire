<?php

/**
 * Homepage header hero 
 */
?>

<?php
$title = get_field('main_title');
$image = get_field('background');
$button_1 = get_field('button_1');
$button_2 = get_field('button_2');
$facebook = get_field('facebook');
$instagram = get_field('instagram');
$linkedin = get_field('linkedin');

?>

<section class="home-hero">
    <div class="container">
        <div class="home-hero__inner">

            <div class="home-hero__content">

                <div class="home-hero__content-left">

                    <?php if ($title) : ?>
                        <h1 class="heading-primary" fetchpriority="high"><?php echo $title; ?></h1>
                    <?php endif; ?>


                    <?php if ($button_1 || $button_2) : ?>

                        <div class="home-hero__buttons">

                            <?php if ($button_1) : ?>

                                <a href="<?php echo $button_1['url']; ?>" class="home-hero__button home-hero__button--long"><?php echo $button_1['title']; ?></a>

                            <?php endif; ?>

                            <?php if ($button_2) : ?>

                                <a href="<?php echo $button_2['url']; ?>" class="home-hero__button home-hero__button--short"><?php echo $button_2['title']; ?></a>

                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                </div>

                <?php echo file_get_contents(get_template_directory() . '/images/lines/home-hero.svg'); ?> 

            </div>

            <div class="home-hero__bottom">
                <div class="home-hero__arrow">
                    <a href="#projects" aria-label="Go to projects"><?php echo file_get_contents(get_template_directory() . "/images/arrow-down.svg"); ?> </a>
                </div>

                <?php if ($facebook || $linkedin || $instagram) : ?>

                    <div class="home-hero__social">

                        <?php if ($facebook) : ?>

                            <a target="_blank" href="<?php echo $facebook; ?>" aria-label="Facebook"><?php echo file_get_contents(get_template_directory() . "/images/facebook.svg"); ?></a>

                        <?php endif; ?>

                        <?php if ($instagram) : ?>

                            <a target="_blank" href="<?php echo $instagram; ?>" aria-label="Instagram"><?php echo file_get_contents(get_template_directory() . "/images/instagram.svg"); ?></a>

                        <?php endif; ?>

                        <?php if ($linkedin) : ?>

                            <a target="_blank" href="<?php echo $linkedin; ?>" aria-label="Linkedin"><?php echo file_get_contents(get_template_directory() . "/images/linkedin.svg"); ?></a>

                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>
    </div>

    <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-home-orange-top-left.svg'); ?> 
    <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-home-orange-bottom-left.svg'); ?> 
    <?php echo file_get_contents(get_template_directory() . '/images/lines/shape-home-orange-bottom-right.svg'); ?> 
</section>