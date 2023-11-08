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


function add_cdns(){
	wp_enqueue_script('vue','https://cdn.jsdelivr.net/npm/vue@2.7.11/dist/vue.js');
	wp_enqueue_script('twinMax','https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js');
	wp_enqueue_script('sprintf','https://cdnjs.cloudflare.com/ajax/libs/sprintf/1.1.2/sprintf.min.js');
	wp_enqueue_script('sortable','https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js');
	wp_enqueue_script('draggable','https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.24.3/vuedraggable.umd.js');
	wp_enqueue_script('bootstrapJs','https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js');
	wp_enqueue_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css');
}
add_action( 'admin_enqueue_scripts', 'add_cdns' );


function add_admin_style(){
	add_filter('script_loader_tag', 'add_defer', 10, 2);

	function add_defer($tag, $handle) {
		if($handle !== 'admin_script') {
			return $tag;
		}
		
		return str_replace(' id=', ' defer id=', $tag);
	}
  $path_css = get_template_directory_uri().'/assets/css/admin.css';
  wp_enqueue_style('admin_style', $path_css);
  $path_js = get_template_directory_uri().'/assets/js/admin.js';
  wp_enqueue_script('admin_script', $path_js, '', '', true);
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


function my_admin_print_styles_demo() {
 wp_enqueue_style( 'wp-color-picker' );
}
add_action('admin_print_styles', 'my_admin_print_styles_demo');

/**
 * テーマ有効時、コンテンツメーカーのテーブルをdbに作成する。
 */

function narukami_theme_activate() {
    global $pagenow;
    if(is_admin() && $pagenow == "themes.php" && isset($_GET["activated"])) {
        do_action('narukami_theme_activate');
	}
}
add_action('init', 'narukami_theme_activate');

function create_theme_tables() {

	global $wpdb;
	$table_name = $wpdb->prefix.'narukami_content_maker';

    //テーブルが存在していなければ作成する
    if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name) {

		if(!empty($wpdb->charset)){
			$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} ";
		}
		if(!empty($wpdb->collate)){
			$charset_collate .= "COLLATE {$wpdb->collate}";
		}
		$sql = "CREATE TABLE {$table_name} (
		  `s_cmaker` varchar(255) NOT NULL,
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `rank_pop` varchar(255) NOT NULL,
		  `rank_style` varchar(255) NOT NULL,
		  `rank_primary_title` varchar(255) NOT NULL,
		  `item_name` varchar(255) NOT NULL,
		  `item_name_2` varchar(255) NOT NULL,
		  `item_name_3` varchar(255) NOT NULL,
		  `item_name_4` varchar(255) NOT NULL,
		  `item_name_5` varchar(255) NOT NULL,
		  `item_name_6` varchar(255) NOT NULL,
		  `item_price` int(11) NOT NULL,
		  `item_price_2` int(11) NOT NULL,
		  `item_price_3` int(11) NOT NULL,
		  `item_price_4` int(11) NOT NULL,
		  `item_price_5` int(11) NOT NULL,
		  `item_price_6` int(11) NOT NULL,
		  `item_img_url` varchar(255) NOT NULL,
		  `item_img_url_2` varchar(255) NOT NULL,
		  `item_img_url_3` varchar(255) NOT NULL,
		  `item_img_url_4` varchar(255) NOT NULL,
		  `item_img_url_5` varchar(255) NOT NULL,
		  `item_img_url_6` varchar(255) NOT NULL,
		  `item_page_link` varchar(255) NOT NULL,
		  `item_page_link_2` varchar(255) NOT NULL,
		  `item_page_link_3` varchar(255) NOT NULL,
		  `item_page_link_4` varchar(255) NOT NULL,
		  `item_page_link_5` varchar(255) NOT NULL,
		  `item_page_link_6` varchar(255) NOT NULL,
		  `rank_on` varchar(255) NOT NULL,
		  `rank_on_2` varchar(255) NOT NULL,
		  `rank_on_3` varchar(255) NOT NULL,
		  `rank_on_4` varchar(255) NOT NULL,
		  `rank_on_5` varchar(255) NOT NULL,
		  `rank_on_6` varchar(255) NOT NULL,
		  `concept_bg_img_url` varchar(255) NOT NULL,
		  `concept_title` varchar(255) NOT NULL,
		  `concept_content` varchar(1000) NOT NULL,
		  `grandmenu_img_url` varchar(2000) NOT NULL,
		  `grandmenu_title` varchar(255) NOT NULL,
		  `grandmenu_pagelink` varchar(2000) NOT NULL,
		  PRIMARY KEY (`id`)
		) {$charset_collate} AUTO_INCREMENT=1;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta($sql);
    }

}

add_action('narukami_theme_activate', 'create_theme_tables');

function ranking_db_farst_insert_data(){
	$url_path = get_theme_file_uri();
	$rank1_img = "/admin-img/steak.jpg";
	$rank2_img = "/admin-img/salmon-3.jpg";
	$rank3_img = "/admin-img/unadon.jpg";
	$rank4_img = "/admin-img/chicken.jpg";
	$rank5_img = "/admin-img/loaf.jpg";
	$rank6_img = "/admin-img/beef.jpg";
	$concept_img = "/admin-img/concept-bg.jpg";
	$rank_primary_t = "RECOMMEND&nbsp;MENU";
	$rank1_img_path = $url_path.$rank1_img;
	$rank2_img_path = $url_path.$rank2_img;
	$rank3_img_path = $url_path.$rank3_img;
	$rank4_img_path = $url_path.$rank4_img;
	$rank5_img_path = $url_path.$rank5_img;
	$rank6_img_path = $url_path.$rank6_img;
	$concept_img_path = $url_path.$concept_img;
	$concept_title_path = "CONCEPT&nbsp;TITLE";
	$concept_content_sample =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$grandmenu_img_url_path = [
		$rank1_img_path,
		$rank2_img_path,
		$rank3_img_path,
		$rank4_img_path,
		$rank5_img_path
	];
	
	$grandmenu_img_url_json = json_encode($grandmenu_img_url_path,JSON_UNESCAPED_UNICODE);
	
	$grandmenu_img_title_path = [
	"お弁当",
	"どんぶり",
	"サイドメニュー",
	"酒肴",
	"オードブル"
	];
	$grandmenu_title_json = json_encode($grandmenu_img_title_path,JSON_UNESCAPED_UNICODE );
	
	$grandmenu_pagelink_path = [
		$url_path,
		$url_path,
		$url_path,
		$url_path,
		$url_path
	];
	$grandmenu_pagelink_json = json_encode($grandmenu_pagelink_path,JSON_UNESCAPED_UNICODE);
	
	global $wpdb;
	$tablename =  $wpdb->prefix . "narukami_content_maker";
	// 各種データの保存
	$wpdb->insert(
		$tablename,
		array(
		's_cmaker' => ランキング,
		'rank_pop' => math_sq_bg,
		'rank_style' => overlay,
		'rank_primary_title' => $rank_primary_t,
		'item_name' => 牛フィレのステーキ赤ワインソース,
		'item_name_2' => サーモンのグリル秋野菜のサラダ添え,
		'item_name_3' => 鰻重,
		'item_name_4' => ローストチキンチーズソース,
		'item_name_5' => エッグベネディクト,
		'item_name_6' => 牛ももの赤ワイン煮込み,
		'item_price' => 2800,
		'item_price_2' => 2000,
		'item_price_3' => 3200,
		'item_price_4' => 1800,
		'item_price_5' => 1200,
		'item_price_6' => 1800,
		'item_img_url' => $rank1_img_path,
		'item_img_url_2' => $rank2_img_path,
		'item_img_url_3' => $rank3_img_path,
		'item_img_url_4' => $rank4_img_path,
		'item_img_url_5' => $rank5_img_path,
		'item_img_url_6' => $rank6_img_path,
		'item_page_link' => $url_path,
		'item_page_link_2' => $url_path,
		'item_page_link_3' => $url_path,
		'item_page_link_4' => $url_path,
		'item_page_link_5' => $url_path,
		'item_page_link_6' => $url_path,
		'rank_on' => rank_show_1,
		'rank_on_2' => rank_show_2,
		'rank_on_3' => rank_show_3,
		'rank_on_4' => rank_show_4,
		'rank_on_5' => rank_show_5,
		'rank_on_6' => rank_show_6,
		'concept_bg_img_url' => $concept_img_path,
		'concept_title' => $concept_title_path,
		'concept_content' => $concept_content_sample,
		'grandmenu_img_url' => $grandmenu_img_url_json,
		'grandmenu_title' => $grandmenu_title_json,
		'grandmenu_pagelink' => $grandmenu_pagelink_json,
		
		),
		array(
		//スタイル
			'%s',
			'%s',
			'%s',
			'%s',
			//item_name
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//item_price
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			//item_url
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//item_link
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//rank_on
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//concept
			'%s',
			'%s',
			'%s',
			//grandmenu
			'%s',
			'%s',
			'%s',
		)
		);
}

add_action('narukami_theme_activate', 'ranking_db_farst_insert_data');

//画像アップロード用のタグを出力する(single)
function generate_upload_image_tag($name, $value){?>
<div class="img-wrap-function">
<p class="subf-prev-title">選択画像PREVEW</p>
<div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail">
    <?php if ($value): ?>
      <img src="<?php echo $value; ?>" alt="選択中の画像">
    <?php endif ?>
  </div>
  <input id="<?php echo $name; ?>" class="img-setect-url"name="<?php echo $name; ?>" type="text" value="<?php echo $value; ?>" />
  <input id="<?php echo $name; ?>_btn" type="button" class="img-select" name="<?php echo $name; ?>_slect" value="選択" />
  <input id="<?php echo $name; ?>_clear" type="button" class="img-select-clear" name="<?php echo $name; ?>_clear" value="クリア" />
</div>


  <script type="text/javascript">
  (function ($) {

      var custom_uploader;

      $("input:button[name=<?php echo $name; ?>_slect]").click(function(e) {

          e.preventDefault();

          if (custom_uploader) {

              custom_uploader.open();
              return;

          }

          custom_uploader = wp.media({

              title: "画像を選択してください",

              /* ライブラリの一覧は画像のみにする */
              library: {
                  type: "image"
              },

              button: {
                  text: "画像の選択"
              },

              /* 選択できる画像は 1 つだけにする */
              multiple: false

          });

          custom_uploader.on("select", function() {

              var images = custom_uploader.state().get("selection");
			  
              /* file の中に選択された画像の各種情報が入っている */
              images.each(function(file){
                  $(this).text("リスト" + file);
                  /* テキストフォームと表示されたサムネイル画像があればクリア */
                  $("input:text[name=<?php echo $name; ?>]").val("");
                  $("#<?php echo $name; ?>_thumbnail").empty();
				  
				   
                  /* テキストフォームに画像の URL を表示 */
                  $("input:text[name=<?php echo $name; ?>]").val(file.attributes.sizes.full.url);
				  
				  /* プレビュー用に選択されたサムネイル画像を表示 */
                  $("#<?php echo $name; ?>_thumbnail").append('<img src="'+file.attributes.sizes.thumbnail.url+'" />');
              });
			 
          });

          custom_uploader.open();

      });

      /* クリアボタンを押した時の処理 */
      $("input:button[name=<?php echo $name; ?>_clear]").click(function() {

          $("input:text[name=<?php echo $name; ?>]").val("");
          $("#<?php echo $name; ?>_thumbnail").empty();

      });

  })(jQuery);
  </script>
  <?php
}

function generate_upload_multipleimage_tag($name, $value, $index){
    ?>
    <div class="img-wrap-function">
        <p class="subf-prev-title">選択画像PREVIEW</p>
        <div id="<?php echo $name; ?>_thumbnail_<?php echo $index; ?>" class="uploded-thumbnail">
            <?php if ($value): ?>
                <img src="<?php echo $value; ?>" alt="選択中の画像">
            <?php endif ?>
        </div>
        <input id="<?php echo $name; ?>_<?php echo $index; ?>" class="img-select-url" name="<?php echo $name; ?>[]" type="text" value="<?php echo $value; ?>" />
        <input id="<?php echo $name; ?>_btn_<?php echo $index; ?>" type="button" class="img-select img-select-btn" name="<?php echo $name; ?>_select" data-index="<?php echo $index; ?>" value="選択" />
<input id="<?php echo $name; ?>_clear_<?php echo $index; ?>" type="button" class="img-select-clear img-clear-btn" name="<?php echo $name; ?>_clear" data-index="<?php echo $index; ?>" value="クリア" />
    </div>


  <script type="text/javascript">
	  var custom_uploader;
  (function ($) {
    $(".img-select-btn").click(function (e) {
        e.preventDefault();
        var index = $(this).data("index");
		if (custom_uploader) {
            custom_uploader.close(); // 既存のアップローダーを閉じる
        }
        custom_uploader = wp.media({
            title: "画像を選択してください",
            library: {
                type: "image"
            },
            button: {
                text: "画像の選択"
            },
            multiple: false
        });

        custom_uploader.on("select", function () {
            var images = custom_uploader.state().get("selection");
            images.each(function (file) {
                $("#<?php echo $name; ?>_" + index).val(file.attributes.sizes.full.url);
                $("#<?php echo $name; ?>_thumbnail_" + index).empty();
                $("#<?php echo $name; ?>_thumbnail_" + index).append('<img src="' + file.attributes.sizes.thumbnail.url + '" />');
            });
        });

        custom_uploader.open();
    });

    $(".img-clear-btn").click(function () {
		if (custom_uploader) {
            custom_uploader.close(); // アップローダーを閉じる
        }
		
        var index = $(this).data("index");
        $("#<?php echo $name; ?>_" + index).val("");
        $("#<?php echo $name; ?>_thumbnail_" + index).empty();
    });
})(jQuery);
  </script>
  <?php
}

function my_admin_scripts() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'my_admin_scripts');
/*
*メディアのキャプションを設定する
*/

add_filter( 'wp_get_attachment_metadata', 'my_wp_get_attachment_metadata', 10, 2 );
function my_wp_get_attachment_metadata( $data, $id ) {
    $image = get_post($id);
    if(is_array($data)) {
        $data['image_meta']['caption'] = $image->post_excerpt;
    }
    return $data;
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
 * データ送信用ファイル
 */




/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



