<?php
/**
 * Adventure Archives
 *
 * @package inhabitent_Theme
 */

?>

<article class="adventure-archive-post">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'full' ); ?>
	<?php endif; ?>

	<div class="adventure-info">
		<h3 class="adventure-archive-title">
			<a class="adventure-archive-title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<a class="transparent-button" href="<?php the_permalink(); ?>">Read More</a>
	</div>
</article><!-- #post-## -->
