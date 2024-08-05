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

	wp_enqueue_script( 'narukami_all_theme_item-navigation', get_template_directory_uri() . '/front-js/navigation.js', array(), _S_VERSION, true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'narukami_all_theme_item_scripts' );
/**
 * 管理画面のcss/jsの読み込み
 */
function add_cdns(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('vue','https://cdn.jsdelivr.net/npm/vue@2.7.11/dist/vue.js');
	wp_enqueue_script('twinMax','https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js');
	wp_enqueue_script('sprintf','https://cdnjs.cloudflare.com/ajax/libs/sprintf/1.1.2/sprintf.min.js');
	wp_enqueue_script('sortable','https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js');
	wp_enqueue_script('draggable','https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.24.3/vuedraggable.umd.js');
	wp_enqueue_script('bootstrapJs','https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js');
	wp_enqueue_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css');
	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
	// Slick SliderのJavaScriptをエンキュー
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
	// Slick Sliderの初期化スクリプトをエンキュー
    wp_add_inline_script('slick-js', '
        jQuery(document).ready(function($) {
            $(".heroheader-slider-wrap").slick({
                
                autoplaySpeed: 3000,
                dots: true,
                infinite: true,
                speed: 500,
				arrows: true,
                cssEase: "linear"
            });
        });
    ');
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
  wp_enqueue_script('jquery');
  $path_css = get_template_directory_uri().'/assets/css/admin.css';
  wp_enqueue_style('admin_style', $path_css);
  $path_js = get_template_directory_uri().'/assets/js/admin.js';
  wp_enqueue_script('admin_script', $path_js, array('jquery'), null, true);
  // admin_scriptにローカライズを追加
  wp_localize_script('admin_script', 'my_ajax_obj', array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('my_ajax_nonce'),
	  'topPageMakerUrl' => home_url('/wp-content/themes/narukami/lib/top-page-maker.php')
  ));
}
add_action('admin_enqueue_scripts', 'add_admin_style');

function my_custom_editor_enqueue() {
	wp_enqueue_editor();
    wp_enqueue_script('my_custom_editor_script', get_template_directory_uri() . '/assets/js/custom-editor.js', array('jquery', 'wp-editor'), null, true);
}
add_action('admin_enqueue_scripts', 'my_custom_editor_enqueue');

/**
 * フロントサイトのcss,js,エンキュー
 */
function enqueue_narukami_top_preview_assets() {
    // プレビュー表示中かどうかをチェック
    if (is_preview()) {
        // CSSファイルをエンキュー
        wp_enqueue_style('narukami-top-preview', get_template_directory_uri() . '/sass/preview/narukami-top-preview.css');
		wp_enqueue_script('narukami-top-js-preview', get_template_directory_uri() . '/front-js/preview/narukami-top-preview.js', array('jquery'), null, true);
    }
}
// wp_enqueue_scripts アクションにフック
add_action('wp_enqueue_scripts', 'enqueue_narukami_top_preview_assets');


//セッション
function start_admin_session() {
    if ( ! session_id() ) {
        session_start();
    }
}
add_action('admin_init', 'start_admin_session');


//ajax追加
add_action('admin_enqueue_scripts', 'enqueue_custom_scripts');

function enqueue_custom_scripts() {
	// jQueryをエンキュー
    wp_enqueue_script('jquery');

    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array('jquery'), null, true);

    // Ajax用の変数を設定
    wp_localize_script('custom-scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

// セレクトボック選択のajax処理
add_action('wp_ajax_load_content', 'load_content');
add_action('wp_ajax_nopriv_load_content', 'load_content');

function load_content() {
    if (isset($_GET['selectedValue'])) {
        $selectedValue = $_GET['selectedValue'];
		$_SESSION['insertGlobalId'] = $_GET['insertId'];
        $content = getContentBasedOnValue($selectedValue);
        echo $content;
		echo '<button type="button" class="not-save-faile" onClick="openPageElement(this)"><i class="fa-solid fa-folder-closed"></i></div>';
    }
    // 必ず終了する
    wp_die();
}

function getContentBasedOnValue($value) {
    ob_start();
    include('lib/' . $value . '.php');
    return ob_get_clean();
}

//ヒーローヘッダーのajax処理

function heroheader_type_change() {
    if (isset($_POST['header_type'])) {
        $header_type = sanitize_text_field($_POST['header_type']);
		update_option('heorheader_type', $header_type);
        switch ($header_type) {
            case 'still_img':
                include get_template_directory() . '/lib/narukami-header/include_heroheader_section/still_img_part.php';
                break;
            case 'move':
                include get_template_directory() . '/lib/narukami-header/include_heroheader_section/move_part.php';
                break;
            case 'slider':
                include get_template_directory() . '/lib/narukami-header/include_heroheader_section/slider_part.php';
                break;
            default:
                break;
        }
    }
    wp_die();
}
add_action('wp_ajax_heroheader_type_change', 'heroheader_type_change');
add_action('wp_ajax_nopriv_heroheader_type_change', 'heroheader_type_change');


//セレクトボックス移動によるajaxの処理（nonce）

function handle_custom_ajax_request() {
    check_ajax_referer('my_ajax_nonce', 'nonce');
    // JSONのペイロードを取得
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
	
    if (!empty($data['dataArray']) && !empty($data['scmakerArray'])) {
		// 受け取ったデータを変数にセット
        $insert_id = $data['dataArray'];
        $scmaker_array = $data['scmakerArray'];
        // レスポンスを作成
        $response = array(
            'status' => 'success',
            'message' => 'Indices updated successfully',
            'data' => $insert_id,
            'scmaker' => $scmaker_array
        );// JSONレスポンスを返す
		update_option('insert_id_indices', $insert_id );
		update_option('scmaker_array_values', $scmaker_array );
		wp_send_json_success($response);
    } else {
        // エラーレスポンスの作成
        $response = array(
            'status' => 'error',
            'message' => 'No indices received'
        );

        // JSONレスポンスを返す
        wp_send_json_error($response);
    }

    // WordPressの終了処理を実行
    wp_die();
}
add_action('wp_ajax_custom_ajax_action', 'handle_custom_ajax_request');
add_action('wp_ajax_nopriv_custom_ajax_action', 'handle_custom_ajax_request');

//top-page-maker.phpへの通知

function notify_top_page_callback() {
    // ここに処理を記述する
    // 必要に応じてtop-page-maker.phpに通知する処理を追加する
    
    // 例: top-page-maker.phpに通知する
	$topPageMakerUrl = home_url('/wp-content/themes/narukami/lib/top-page-maker.php');
	error_log('Debug data: ' . print_r($topPageMakerUrl, true));
    $response = wp_remote_post($topPageMakerUrl, array(
        'method'    => 'POST',
        'body'      => array(
            'action' => 'notify_top_page'
        )
    ));
	$insert_filename = 'insert-id-reload-ajax';
	$selectbox_filename = 'selectbox_file_reload_ajax';
	$response_insertid_file = getContentBasedOnValue($insert_filename);
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        wp_send_json_error($error_message);
    } else {
		$response_data = array(
        'insertIdContent' => $response_insertid_file
    	);
    wp_send_json_success($response_data);
    }

    wp_die();
}
add_action('wp_ajax_notify_top_page', 'notify_top_page_callback');
add_action('wp_ajax_nopriv_notify_top_page', 'notify_top_page_callback');


// カラーピッカーの生成関数ノーマル
function genelate_color_picker_tag_demo($name, $value, $label) { ?>
    <p><label for="<?php echo $name; ?>"><?php echo $label; ?></label></p>
    <p><input type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>" ></p>
    <?php wp_enqueue_script('wp-color-picker');
    $data = '(function( $ ) {
        var options = {
            defaultColor: false,
            change: function(event, ui){},
            clear: function() {},
            hide: true,
            palettes: true,
        };
        $("input:text[name=\'' . $name . '\']").wpColorPicker(options);
    })( jQuery );';
    wp_add_inline_script('wp-color-picker', $data, 'after');
}

// カラーピッカー用スタイルの読み込み
function my_admin_print_styles_demo() {
    wp_enqueue_style('wp-color-picker');
}
add_action('admin_print_styles', 'my_admin_print_styles_demo');




/**
 * トップページのコンテンツ保存時、列id1以外を削除し、再保存させる
 */
function my_save_button_handler() {
    // 保存ボタンがクリックされた場合
    if (isset($_POST['toppage_initialization'])) {
        delete_keep_update(); // データをクリアする関数を呼び出す
        // ここに他の保存処理を追加
    }
}

// 'admin_post' フックを利用して、特定のアクションが発生したときに関数を呼び出す
add_action('init', 'my_save_button_handler');

function delete_keep_update(){
		global $wpdb;
		$narukamicmker =  $wpdb->prefix . "narukami_content_maker";
		//idが1以外のレコードを取得
		$records_to_delete = $wpdb->get_results("SELECT * FROM $narukamicmker WHERE id != 1");
			foreach ($records_to_delete as $record) {
				$wpdb->delete(
					$narukamicmker, 
					array(
						'id' => $record->id
					), 
					array(
						'%d'
					));
			}
}
//動画アップロード用のタグを出力する(single配列なし)
function generate_upload_video_single_tag($name, $value){?>
<div class="img-wrap-function">
<p class="subf-prev-title">選択画像PREVEW</p>
<div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail">
	<video width="320" height="200" controls autoplay loop muted>
		<source src="<?php echo $value; ?>" type="video/mp4">
	</video>
  </div>
  <input id="<?php echo $name; ?>" class="img-setect-url img-count-item" name="<?php echo $name; ?>" type="text" value="<?php echo $value; ?>" />
  <input id="<?php echo $name; ?>_btn" type="button" class="img-select" name="<?php echo $name; ?>_slect" onclick="sngleUploaderVideoOpen(this)" value="選択" />
  <input id="<?php echo $name; ?>_clear" type="button" class="img-select-clear" name="<?php echo $name; ?>_clear" onclick="sngleUploaderVideoDelete(this)"  value="クリア" />
</div>
<div id="script-container"></div>
  <?php
}

//画像アップロード用のタグを出力する(single配列なし)
function generate_upload_image_single_tag($name, $value){?>
<div class="img-wrap-function">
<p class="subf-prev-title">選択画像PREVEW</p>
<div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail">
    <?php if ($value): ?>
      <img src="<?php echo $value; ?>" alt="選択中の画像">
    <?php endif ?>
  </div>
  <input id="<?php echo $name; ?>" class="img-setect-url img-count-item" name="<?php echo $name; ?>" type="text" value="<?php echo $value; ?>" />
  <input id="<?php echo $name; ?>_btn" type="button" class="img-select" name="<?php echo $name; ?>_slect" onclick="sngleUploaderOpen(this)" value="選択" />
  <input id="<?php echo $name; ?>_clear" type="button" class="img-select-clear" name="<?php echo $name; ?>_clear" onclick="sngleUploaderDelete(this)"  value="クリア" />
</div>
<div id="script-container"></div>
  <?php
}

//画像アップロード用のタグを出力する(single配列)
function generate_upload_image_tag($name, $value, $insert, $gm_numbers){?>
<div class="img-wrap-function">
<p class="subf-prev-title">選択画像PREVEW</p>
<div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail" data-insert-id="<?php echo $insert; ?>">
    <?php if ($value): ?>
      <img src="<?php echo $value; ?>" alt="選択中の画像">
    <?php endif ?>
  </div>
  <input id="<?php echo $name; ?>" class="img-setect-url img-count-item" name="<?php echo $name . '['. $gm_numbers .']'; ?>" type="text" data-insert-id="<?php echo $insert; ?>" value="<?php echo $value; ?>" />
  <input id="<?php echo $name; ?>_btn" type="button" class="img-select" name="<?php echo $name; ?>_slect" onclick="uploaderOpenClick(this)" data-insert-id="<?php echo $insert; ?>" value="選択" />
  <input id="<?php echo $name; ?>_clear" type="button" class="img-select-clear" name="<?php echo $name; ?>_clear" onclick="uploaderdeleteClick(this)" data-insert-id="<?php echo $insert; ?>" value="クリア" />
</div>
<div id="script-container"></div>
  <?php
}

//画像アップロード用のタグを複数出力する(multiple配列)
function generate_upload_multipleimage_tag($name, $value, $index, $insert, $gm_numbers){
    ?>
    <div class="img-wrap-function" data-index="<?php echo $index; ?>">
        <p class="subf-prev-title">選択画像PREVIEW</p>
        <div id="<?php echo $name; ?>_thumbnail_<?php echo $index; ?>" class="uploded-thumbnail" data-insert-id="<?php echo $insert; ?>">
            <?php if ($value): ?>
                <img src="<?php echo $value; ?>" alt="選択中の画像">
            <?php endif ?>
        </div>
        <input id="<?php echo $name; ?>_<?php echo $index; ?>" class="img-select-url" name="<?php echo $name; ?>[<?php echo $gm_numbers; ?>][]" type="text" data-insert-id="<?php echo $insert; ?>" value="<?php echo $value; ?>" />
        <input id="<?php echo $name; ?>_btn_<?php echo $index; ?>" type="button" class="img-select img-select-btn" name="<?php echo $name; ?>_select" data-index="<?php echo $index; ?>" data-insert-id="<?php echo $insert; ?>" onClick="uploaderOpenClickMultiple(this)" value="選択" />
		<input id="<?php echo $name; ?>_clear_<?php echo $index; ?>" type="button" class="img-select-clear img-clear-btn" name="<?php echo $name; ?>_clear" data-index="<?php echo $index; ?>" data-insert-id="<?php echo $insert; ?>" onClick="uploaderdeleteClickMulti(this)" value="クリア" />
    </div>

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
    // 画像が存在することを確認
    $image = get_post($id);
    if(!$image) {
        return $data;
    }

    // キャプションが設定されているか確認
    $caption = $image->post_excerpt;
    if(is_array($data) && !empty($caption)) {
      $data['image_meta']['caption'] = $caption;
    }

    return $data;
}

//トップページのプレビュー関数
add_action('template_redirect', 'custom_preview_handler');
function custom_preview_handler() {
    if (isset($_GET['preview']) && $_GET['preview'] === 'true' && isset($_GET['page']) && $_GET['page'] === 'toppage_builder_preview') {
        // トップページビルダーのプレビュー用テンプレート
        include(get_template_directory() . '/custom-preview-template.php');
        exit;
    }
}

//
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
 * テーマ有効時DBにテーブルを作成しinsertする関数
 */
require get_template_directory() . '/lib/init_function.php';
/**
 * TOP_PAGE_MAKER ARRAY,POST,DB,分岐関数
 */
require get_template_directory() . '/lib/input_branch_function.php';
/**
 * サニタイズ用関数ファイル
 */
require get_template_directory() . '/lib/sanitize_func.php';
/**
 * 管理画面に関する設定
 */
require get_template_directory() . '/lib/function-setting.php';
/**
 * nonceによるセキュリティーチェック関数
 */
require get_template_directory() . '/post_nonce_check.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



