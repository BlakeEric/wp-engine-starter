<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Custom_WP_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			myprefix_wp_posted_on();
			myprefix_wp_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header>

	<?php myprefix_wp_post_thumbnail(); ?>

	<div>
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<?php myprefix_wp_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
