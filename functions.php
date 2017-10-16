<?php
function freud_script_enqueue() {
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/freud.css', array(), '1.0', 'all');
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/freud.js', array(), '1.0', true);
	wp_enqueue_script( 'customjs', '//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js' );
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

/*===sidebar===*/
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

/*===favicon===*/
function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="', get_stylesheet_directory_uri() . '/ico/favicon.ico" />'. "\n";
}
add_action( 'wp_head', 'favicon_link' );

/*===home title===*/
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

/*===content width===*/
if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}

/*===comments reply===*/
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

function freud_enqueue_comments_reply() {
if( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'comment_form_before', 'freud_enqueue_comments_reply' );

/*===editor styles===*/
function freud_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'freud_add_editor_styles' );

/*=== google fonts ===*/
function wpb_add_google_fonts() {
wp_enqueue_style( 'wpb-google-fonts', "https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400' rel='stylesheet", false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/*=== remove empty p tags from wordpress posts ===*/ 
add_filter( 'the_content', 'remove_empty_p', 20, 1 );
function remove_empty_p( $content ){
	// clean up p tags around block elements
	$content = preg_replace( array(
		'#<p>\s*<(div|aside|section|article|header|footer)#',
		'#</(div|aside|section|article|header|footer)>\s*</p>#',
		'#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
		'#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
		'#<p>\s*</(div|aside|section|article|header|footer)#',
	), array(
		'<$1',
		'</$1>',
		'</$1>',
		'<$1$2>',
		'</$1',
	), $content );

	return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)*(\s|&nbsp;)*</p>#i', '', $content);
}


/*=== add metatags ===
function add_meta_tags() {
    global $post;
    if ( is_single() ) {
        $meta = strip_tags( $post->post_content );
        $meta = strip_shortcodes( $post->post_content );
        $meta = str_replace( array("\n", "\r", "\t"), ' ', $meta );
        $meta = substr( $meta, 0, 125 );
        $keywords = get_the_category( $post->ID );
        $metakeywords = '';
        foreach ( $keywords as $keyword ) {
            $metakeywords .= $keyword->cat_name . ", ";
        }
        echo '<meta name="description" content="' . $meta . '" />' . "\n";
        echo '<meta name="keywords" content="' . $metakeywords . '" />' . "\n";
    }
}
add_action( 'wp_head', 'add_meta_tags' , 2 );*/



