<?php
function freud_script_enqueue() {
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/freud.css', array(), '1.0', 'all');
	wp_enqueue_script('customjs', '//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js', array(), '1.0', true);
	wp_enqueue_script('customjs', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '1.0', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/freud.js', array(), '1.0', true);
	wp_enqueue_script( 'masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.2/masonry.pkgd.js' );
}

add_action('wp_enqueue_scripts', 'freud_script_enqueue');

function freud_theme_setup(){
	add_theme_support('menus');
	register_nav_menu('primary','main menu');
	register_nav_menu('social','social menu');
}
add_action('init', 'freud_theme_setup');

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');	/*===POST THUMBNAILS IN POT AND PAGES===*/
set_post_thumbnail_size( 825, 510, true );
add_theme_support( 'title-tag' );	/*===DOCUMENT TITLE===*/
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
add_theme_support( 'post-formats', array('image', 'video', 'gallery' ) );
add_theme_support( 'automatic-feed-links' );	/*===ADD DEFAULT POSTS AND COMMENTS RSS FEED LINKS TO HEAD===*/
add_theme_support( 'editor_style');


load_theme_textdomain( 'freud', get_template_directory() . '/languages' ); /*===TRANSLATIONS===*/

/*===SIDEBAR===*/
function freud_widget_setup() {
	
	register_sidebar(
		array(
			'name' => 'Sidebar',
			'id' => 'sidebar-1',
			'class' => 'custom',
			'description' => 'Standard Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);	
}

add_action('widgets_init','freud_widget_setup');

/*===FAVICON===*/
function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="', get_stylesheet_directory_uri() . '/ico/favicon.ico" />'. "\n";
}
add_action( 'wp_head', 'favicon_link' );

/*===HOME TITLE===*/
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

/*===CONTENT WIDTH===*/
if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}

/*===COMMENTS REPLY===*/

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

function freud_enqueue_comments_reply() {
if( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'comment_form_before', 'freud_enqueue_comments_reply' );

/*===EDITOR STYLES===*/


function freud_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'freud_add_editor_styles' );

