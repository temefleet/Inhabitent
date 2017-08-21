<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package inhabitent_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="search-entry-header">

		<div id="hero-banner">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'full' ); ?>
			<?php endif; ?>
		</div>	

	</header><!-- .entry-header -->

	<main class="main-adventure-content">

		<?php the_title( '<h1 class="adventure-title">', '</h1>' ); ?>

		<p class="adventure-author">By <?php the_author(); ?></p>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</main><!-- main adventure content -->

	<footer class="adventure-entry-footer">
		<?php inhabitent_entry_footer(); ?>
		<div class="social-buttons">
			<button type="button" class="white-button"><i class="fa fa-facebook"></i>Like</button>
			<button type="button" class="white-button"><i class="fa fa-twitter"></i>Tweet</button>
			<button type="button" class="white-button"><i class="fa fa-pinterest"></i>Pin</button>
		</div>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
