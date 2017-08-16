<?php
/**
 * Template Name: Front Page
 *
 * @package inhabitent_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <?php
      $args = array( 'post_type' => 'product' );
      $product_types = get_terms( $args );
    ?>

    

    <ul class="front-page-product-types">
    <?php foreach ( $product_types as $type ) : setup_postdata( $type ); ?>
      <li class="front-page-type">
        <img src="<?php echo get_template_directory_uri(); ?>/images/product-type-icons/<?php echo $type->slug ?>.svg">
        <p><?php echo $type->description ?></p>
        <a class="green-button"
          href="<?php echo get_site_url(); ?>/product-type/<?php echo $type->slug ?>">
          <?php echo $type->name ?> Stuff
        </a>
      </li>
    
    <?php endforeach; wp_reset_postdata(); ?>
    </ul>


		<?php
      $args = array( 'posts_per_page' => 3 );
      $journal_posts = get_posts( $args );
    ?>

    <ul class="journal-entries">
    <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
      <li class="journal-post">  
       
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail( 'large' ); 
        } ?>

        <div class="front-page-journal-blurb">
          <div class="date-comments">
            <?php inhabitent_posted_on(); ?>
            <?php comments_number( '/ 0 Comments', '/ 1 Comment', '/ % Comments' ); ?>
          </div>

          <a class="blurb-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <a class="white-button" href="<?php the_permalink(); ?>">Read Entry</a>
        </div>
      </li>
    
    <?php endforeach; wp_reset_postdata(); ?>
    </ul>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
