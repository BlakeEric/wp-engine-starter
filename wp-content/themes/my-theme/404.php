<?php
/**
 * The template for displaying 404 pages
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Custom_WP_Starter
 */

get_header();
?>

  <div id="primary">
    <main id="main" role="main">

      <section>

        <header class="404-header">
          <?php if(get_theme_mod('404_header_image')){?>
            <div class="404-header-image">
              <?php echo wp_get_attachment_image( get_theme_mod('404_header_image'), 'full', false, get_bloginfo( 'name', 'display' ) ); ?>
            </div>
          <?php } ?>

          <?php if(get_theme_mod('404_headline')){?>
             <h1 class="404-header-title"><?php esc_html_e(get_theme_mod('404_headline') , 'bc' ); ?></h1>
           <?php } else { ?>
             <h1 class="404-header-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bc' ); ?></h1>
           <?php } ?>
        </header>

        <div class="404-content">
          <?php if(get_theme_mod('404_intro_text')){?>
            <p><?php esc_html_e(get_theme_mod('404_intro_text'), 'bc' ); ?></p>
          <?php }else{ ?>
            <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'bc' ); ?></p>
          <?php } ?>
        </div>

      </section>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
