<?php
/**
 * Template part for displaying posts.
 *
 * @package inhabitent_Theme
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php echo get_permalink(); ?>">
			<?php the_post_thumbnail( 'large' ); ?>
		</a>
	<?php endif; ?>

	<div class="product-info">
		<?php the_title( '<h2 class="product-name">', '</h2>' ); ?>
		<div class="leader-dots"></div>
		<p class="price">$<?php echo CFS()->get( 'product_price' ); ?></p>
	</div>

</div><!-- #post-## -->