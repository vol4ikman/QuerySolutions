<?php
/*------------------------------------*\
	CORE : Actions + Filters
\*------------------------------------*/

if ( ! function_exists( 'add_body_class' ) ){
    function add_body_class( $classes ) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if( $is_lynx ) $classes[] = 'lynx';
        elseif( $is_gecko ) $classes[] = 'gecko';
        elseif( $is_opera ) $classes[] = 'opera';
        elseif( $is_NS4 ) $classes[] = 'ns4';
        elseif( $is_safari ) $classes[] = 'safari';
        elseif( $is_chrome ) $classes[] = 'chrome';
        elseif( $is_IE ) {
            $classes[] = 'ie';
            if( preg_match( '/MSIE ( [0-11]+ )( [a-zA-Z0-9.]+ )/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
            $classes[] = 'ie' . $browser_version[1];
        } else $classes[] = 'unknown';
        if( $is_iphone ) $classes[] = 'iphone';

        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
        }
        if (defined('LANG')){
            $classes[] = 'lang-'.LANG;
        }
        return $classes;
    }
    add_filter( 'body_class','add_body_class' );
}

// Load styles
function qs_theme_styles(){
    //wp_register_style('normalize', THEME . '/normalize.css', array(), '1.0', 'all'); wp_enqueue_style('normalize');
    wp_register_style('f6', FOUNDATION . '/css/foundation.css', array(), NULL, 'all'); wp_enqueue_style('f6');
    wp_register_style('animate', THEME . '/css/animate.css', array(), '1.0', 'all'); wp_enqueue_style('animate');
    wp_register_style('slick', THEME . '/css/slick.css', array(), '1.0', 'all'); wp_enqueue_style('slick');
    wp_register_style('jquery.mCustomScrollbar.css', THEME . '/css/jquery.mCustomScrollbar.css', array(), '1.0', 'all'); wp_enqueue_style('jquery.mCustomScrollbar.css');
    wp_register_style('style', THEME . '/style.css', array(), '1.0', 'all'); wp_enqueue_style('style');
    wp_register_style('responsive', THEME . '/css/responsive.css', array(), '1.0', 'all'); wp_enqueue_style('responsive');
}
add_action('wp_enqueue_scripts', 'qs_theme_styles'); // Add Theme Stylesheet

// Load scripts
function qs_theme_scripts() {
	wp_register_script( 'modern',  THEME . '/js/modern.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'modern' );
	wp_register_script( 'f6-input',  FOUNDATION . '/js/vendor/what-input.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'f6-input' );
    wp_register_script( 'wow', THEME . '/js/wow.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'wow' );
    wp_register_script( 'slick', THEME . '/js/slick.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'slick' );
    wp_register_script( 'scroll', THEME . '/js/smooth.scroll.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'scroll' );
    wp_register_script( 'mCustomScrollbar', THEME . '/js/jquery.mCustomScrollbar.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'mCustomScrollbar' );
	wp_register_script( 'scripts', THEME . '/js/scripts.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'scripts' );
}
add_action( 'wp_enqueue_scripts', 'qs_theme_scripts' );

// Register THEME Navigation
function register_theme_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'qstheme'), // Main Navigation
    ));
}
add_action('init', 'register_theme_menus');

function header_menu(){
    wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'wpmenu' ) );
}


// Add Actions
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


/*------------------------------------*\
	Extra
\*------------------------------------*/
