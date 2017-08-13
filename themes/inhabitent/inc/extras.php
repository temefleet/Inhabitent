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
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function inhabitent_remove_submenus() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'inhabitent_remove_submenus', 110 );
