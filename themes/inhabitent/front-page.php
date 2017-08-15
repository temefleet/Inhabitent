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
      $args = array( 'posts_per_page' => 3 );
      $journal_posts = get_posts( $args );
    ?>

    <ul class="journal-entries">
    <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
      <li class="journal-post">  
       
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail( 'large' ); 
        } ?>

        <div class="date-comments">
          <?php inhabitent_posted_on(); ?> /
          <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
        </div>

        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <a class="black-btn" href="<?php the_permalink(); ?>">Read Entry</a>
        
      </li>
    
    <?php endforeach; wp_reset_postdata(); ?>
    </ul>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
