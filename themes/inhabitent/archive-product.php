<?php
/**
 * The template for displaying archive pages.
 *
 * @package inhabitent_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>

				<ul class="shop-page-product-types">
				<?php
					$terms= get_terms( 'product-type' );
					if( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						foreach ( $terms as $term ) : setup_postdata( $term ); ?>
							<li class="shop-page-type">
								<a class="green-link"
									href="<?php echo get_term_link( $term )?>"><?php echo $term->name ?>
								</a>
							</li>	
						<?php endforeach; wp_reset_postdata(); 
					} ?>
				</ul>
			</header><!-- .page-header -->

			<section class="shop-page-products">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						get_template_part( 'template-parts/content', 'archive' );
					?>

				<?php endwhile; ?>
			</section>
			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>



<!-- how to filter out archive titles -->

