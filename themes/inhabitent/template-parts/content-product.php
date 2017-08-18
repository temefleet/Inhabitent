<?php
/**
 * Template part for displaying single products.
 *
 * @package inhabitent_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-product-page">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<p class="price">$<?php echo CFS()->get( 'product_price' ); ?></p>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php inhabitent_entry_footer(); ?>
			<div class="social-buttons">
				<button type="button" class="white-button"><i class="fa fa-facebook"></i>Like</button>
				<button type="button" class="white-button"><i class="fa fa-twitter"></i>Tweet</button>
				<button type="button" class="white-button"><i class="fa fa-pinterest"></i>Pin</button>
			</div>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
