<!-- Home/Front Page Hero -->
<?php if( is_front_page() ) : ?>
        
    <aside id="homePage-hero" aria-labelledby="homePage-hero-headline homePage-hero-subHeadline" class="homePage-hero"
        <?php if ( has_header_image()) : ?>
            style="background-image: url(<?php echo get_header_image(); ?>)"
        <?php endif; ?>	    
    >
    <?php if ( has_header_video() ) : ?>
        <?php the_custom_header_markup(); ?>
    <?php endif; ?>
        
        <div class="homePage-hero-inner inset-content">
            <div class="row">
                <div class="homePage-header">
                    <h1 id="homePage-hero-headline" class="homePage-hero-headline">
                        <?php if (the_title()) : ?>
                            <?php echo the_title(); ?>
                        <?php endif; ?>
                    </h1>
                </div> 
            </div>
        </div>

    </aside>

<?php elseif(is_404()) : ?>

<aside id="page-hero" aria-labelledby="page-hero-headline page-hero-subHeadline" class="page-hero --face"
    <?php if(get_theme_mod('404_header_image')) : ?>
    style="background-image: url(<?php echo wp_get_attachment_url( get_theme_mod('404_header_image') );?>)"
    <?php else : ?>

    style="background-image: url(<?php echo get_header_image(); ?>)"
    <?php endif; ?>	

    <?php if ( has_header_video() ) : ?>
        <?php the_custom_header_markup(); ?>
    <?php endif; ?>
>   
    <div class="page-hero-inner inset-content">
        <div class="row">
            <h1 id="page-hero-headline" class="page-hero-headline">
                <?php if (the_title()) : ?>
                    <?php echo the_title(); ?>
                <?php endif; ?>
            </h1>
            
        </div>
    </div>

</aside>

<?php elseif(!is_front_page()) : ?>
<aside id="page-hero" aria-labelledby="page-hero-headline page-hero-subHeadline" class="page-hero --face"
    <?php if(get_the_post_thumbnail_url()) : ?>
    style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"
    <?php //endif;?>

    <?php //if(get_field('header')) : ?>
    style="background-image: url(<?php //echo get_field('header') ?>)"
    <?php else : ?>

    style="background-image: url(<?php echo get_header_image(); ?>)"
    <?php endif; ?>	

    <?php if ( has_header_video() ) : ?>
        <?php the_custom_header_markup(); ?>
    <?php endif; ?>
>        
    <div class="page-hero-inner inset-content">
        <div class="row">
            <h1 id="page-hero-headline" class="page-hero-headline">
                <?php if (the_title()) : ?>
                    <?php echo the_title(); ?>
                <?php endif; ?>
                <!-- <?php //if (get_field('header_line')) : ?> -->
                        <!-- <?php //echo get_field('header_line'); ?> -->
                <!-- <?php //endif; ?> -->
            </h1>
            
            <!-- <?php //if (get_field('header_line_2')) : ?> -->
                <!-- <p class="page-hero-subHeadline"> -->
                    <!-- <?php //echo get_field('header_line_2'); ?> -->
                <!-- </p> -->
            <!-- <?php //endif; ?> -->

            <!-- <?php //if (get_field('header_button_url') && get_field('header_button_label')) : ?> -->
                <!-- <div class="header-button"><a  -->
                <!-- <?php //if(get_field('open_in_new_tab') == 'true') : ?> -->
                    <!-- target="_blank" -->
                <!-- <?php //endif; ?> -->
                <!-- href="<?php //echo get_field('header_button_url') ?>" class="page-hero-button secondary-btn"> -->
                    <!-- <?php //echo get_field('header_button_label'); ?> -->
                <!-- </a></div> -->
            <!-- <?php //endif; ?> -->

        </div>
    </div>

</aside>

<?php endif; ?>