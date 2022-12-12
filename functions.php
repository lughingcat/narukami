<?php
/**
 * narukami functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package narukami
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function narukami_all_theme_item_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on narukami, use a find and replace
		* to change 'narukami_all_theme_item' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'narukami_all_theme_item', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'narukami_all_theme_item' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'narukami_all_theme_item_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'narukami_all_theme_item_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function narukami_all_theme_item_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'narukami_all_theme_item_content_width', 640 );
}
add_action( 'after_setup_theme', 'narukami_all_theme_item_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function narukami_all_theme_item_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'narukami_all_theme_item' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'narukami_all_theme_item' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'サブフッターリスト', 'narukami_all_theme_item' ),
			'id'            => 'subfooter_elem',
			'description'   => esc_html__( 'サブフッター挿入リスト', 'narukami_all_theme_item' ),
			'before_widget' => '<section id="subfooter_list_elem" class="subfooter_2">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
}
add_action( 'widgets_init', 'narukami_all_theme_item_widgets_init' );

/**
 * サイトのcss/jsの読み込み
 */
function narukami_all_theme_item_scripts() {
	wp_enqueue_style( 'narukami_all_theme_item-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'narukami-main-style', get_template_directory_uri() . '/sass/main-style.css' );
	wp_style_add_data( 'narukami_all_theme_item-style', 'rtl', 'replace' );

	wp_enqueue_script( 'narukami_all_theme_item-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'narukami_all_theme_item_scripts' );
/**
 * 管理画面のcss/jsの読み込み
 */

function add_admin_style(){
  $path_css = get_template_directory_uri().'/assets/css/admin.css';
  wp_enqueue_style('admin_style', $path_css);
  $path_js = get_template_directory_uri().'/assets/js/admin.js';
  wp_enqueue_script('admin_script', $path_js);
}
add_action('admin_enqueue_scripts', 'add_admin_style');

//カラーピッカーの生成関数
function genelate_color_picker_tag_demo($name, $value, $label){?>
  <p><label for="<?php echo $name; ?>"><?php echo $label; ?></label></p>
  <p><input type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>" ></p>
  <?php wp_enqueue_script( 'wp-color-picker' );
  $data = '(function( $ ) {
      var options = {
          defaultColor: false,
          change: function(event, ui){},
          clear: function() {},
          hide: true,
          palettes: true
      };
      $("input:text[name='.$name.']").wpColorPicker(options);
  })( jQuery );';
    wp_add_inline_script( 'wp-color-picker', $data, 'after' ) ;

}
//カラーピッカー用スタイルの読み込み

add_action('admin_print_styles', 'my_admin_print_styles_demo');
function my_admin_print_styles_demo() {
 wp_enqueue_style( 'wp-color-picker' );
}

 



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * WordPressのフックとテーマを強化する関数
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * 管理画面に関する設定
 */
require get_template_directory() . '/lib/function-setting.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

