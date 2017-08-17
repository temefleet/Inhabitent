<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package inhabitent_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function inhabitent_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'inhabitent_body_classes' );

// change login logo ------------------
function inhabitent_login_logo() { ?>
	<style type="text/css"> 
    
	#login h1 a, .login h1 a {
    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logos/inhabitent-logo-text-dark.svg);
		height:53px;
		width:300px;
		background-size: 300px 53px;
		background-repeat: no-repeat;
  }
	#login .button.button-primary {
			background-color: #248A83;
	}
    </style>
<?php }
add_action('login_head', 'inhabitent_login_logo');


// hover on login logo title
function inhabitent_login_title() {
	return 'Inhabitent';
}
add_filter('login_headertitle', 'inhabitent_login_title');


// link login logo to homepage
function inhabitent_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'inhabitent_login_logo_url' );

function inhabitent_remove_submenus() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'inhabitent_remove_submenus', 110 );

/**
 * Make hero image customizable through CFS field or featured image.
**/
 function inhabitent_dynamic_css() {
	if ( ! is_page_template( 'page-templates/about.php' ) ) {
			return;
	}
	
	$image = CFS()->get( 'about_header_image' );
	if ( ! $image ) {
			return;
	}
	$hero_css = ".page-template-about .entry-header {
			background:
					linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
					url({$image}) no-repeat center bottom;
			background-size: cover, cover;
	}";
	wp_add_inline_style( 'tent-style', $hero_css );
}
add_action( 'wp_enqueue_scripts', 'inhabitent_dynamic_css' );

// Replaces the excerpt "Read More" text by a link
function inhabitent_replace_read_more($more) {
	global $post;
	return '[...]<p><a class="white-button" href="'. get_permalink($post->ID) . '">Read More →</a></p>';
}
add_filter('excerpt_more', 'inhabitent_replace_read_more');

// post limit per page
function inhabitent_limit_archive_posts($query){
	if ($query->is_archive) {
		$query->set('posts_per_page', 20);
    }
    return $query;
}
add_filter('pre_get_posts', 'inhabitent_limit_archive_posts');

function my_theme_archive_title( $title ) {
	if ( is_post_type_archive('product') ) {
			$title = 'Shop Stuff';
	}elseif(is_post_type_archive('adventure')){
		$title = 'Adventures';
	}
	return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );