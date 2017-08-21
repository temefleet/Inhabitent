<?php
/**
 * The template for displaying archive pages.
 *
 * @package inhabitent_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main no-banner" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="adventures-page-header">
				<?php
					the_archive_title( '<h1 class="page-title">Latest ', '</h1>' );
				?>
			</header><!-- .page-header -->

			<div class="adventures-content">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						get_template_part( 'template-parts/content', 'adventure-archive' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div><!-- .adventures-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
