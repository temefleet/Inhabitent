<?php
/**
 * Inhabitent Front Page
 *
 * @package inhabitent_Theme
 */

get_header('dark'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <section id="hero-banner" class="front-page-hero-banner">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-full.svg" alt="Home Hero Banner">
      </section>

      <section class="front-page-content">  

      <!-- shop stuff ******************************************** -->
      <h2>Shop Stuff</h2>
      
      <?php
        $args = array( 'taxonomy' => 'product-type' );
        $product_types = get_terms( $args );
      ?>

      <ul class="front-page-product-types">
      <?php foreach ( $product_types as $type ) : setup_postdata( $type ); ?>
        <li class="front-page-type">
          
          <img src="<?php echo get_template_directory_uri(); ?>/images/product-type-icons/<?php echo $type->slug ?>.svg"
            alt="Products to <?php echo $type->slug ?>">
          <p><?php echo $type->description ?></p>
          
          <a class="green-button"
            href="<?php echo get_site_url(); ?>/product-type/<?php echo $type->slug ?>">
            <?php echo $type->name ?> Stuff
          </a>
          
        </li>
      <?php endforeach; wp_reset_postdata(); ?>
      </ul>

      <!-- journal entries          ***************************** -->
      <?php
        $args = array( 'posts_per_page' => 3 );
        $journal_posts = get_posts( $args );
      ?>
      <h2>
        <?php echo get_the_title( 48 ); ?>
      </h2>

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

      <!-- adventures ****************************************************** -->
      <h2>Latest Adventures</h2>
      
      <?php
        $args = array( 'post_type' => 'adventure' );
        $adventures = new WP_Query( $args );
      ?>

      <section class="adventure-wrapper">
      <ul class="front-page-adventures">

        <?php if ( $adventures->have_posts() ) : ?>
            <?php while ( $adventures->have_posts() ) : $adventures->the_post(); ?>
            <li class="front-page-adventure">
              
              <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'full' ); 
              } ?>
              
              <div class="adventure-info">
                <h3 class="front-page-adventure-title">
                  <a class="front-page-adventure-title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <a class="transparent-button" href="<?php the_permalink(); ?>">Read More</a>
              </div>
                
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <h2>Nothing found!</h2>
        <?php endif; ?>
      </ul>
      <a href="<?php echo get_post_type_archive_link( 'adventure' ); ?>" class="green-button">More Adventures</a>
      </section>

      </section><!-- .front-page-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
