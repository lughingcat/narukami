<?php

if ( ! defined( 'NARUKAMI_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'NARUKAMI_VERSION', '1.0.0' );
}


function narukami_all_theme_item_setup() {

	load_theme_textdomain( 'narukami_all_theme_item', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'narukami_all_theme_item' ),
		)
	);

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

	// 鳴雷　コア背景
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

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'widgets' );

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


function narukami_all_theme_item_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'narukami_all_theme_item_content_width', 640 );
}
add_action( 'after_setup_theme', 'narukami_all_theme_item_content_width', 0 );

function narukami_block_editor_style_setup() {
    add_theme_support('editor-styles'); // エディタースタイルを有効化
    add_editor_style('assets/css/custom-block-editor.css'); // カスタムエディタースタイルシートを追加
}
add_action('after_setup_theme', 'narukami_block_editor_style_setup');


/**
 * サイトのcss/jsの読み込み
 */
function narukami_all_theme_item_scripts() {
	wp_enqueue_style( 'narukami_all_theme_item-style', get_stylesheet_uri(), array(), NARUKAMI_VERSION );
	wp_enqueue_style( 'narukami-main-style', get_template_directory_uri() . '/sass/main-style.css' );
	wp_style_add_data( 'narukami_all_theme_item-style', 'rtl', 'replace' );

	wp_enqueue_script( 'narukami_all_theme_item-navigation', get_template_directory_uri() . '/front-js/navigation.js', array(), NARUKAMI_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'narukami_all_theme_item_scripts' );
/**
 * 管理画面用(admin)css/jsのcdnエンキュー
 */
function add_cdns(){
	wp_enqueue_media();
	//wp_enqueue_script('vue','https://cdn.jsdelivr.net/npm/vue@2.7.11/dist/vue.js');
	wp_enqueue_script('twinMax','https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js');
	wp_enqueue_script('sprintf','https://cdnjs.cloudflare.com/ajax/libs/sprintf/1.1.2/sprintf.min.js');
	wp_enqueue_script('sortable','https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js');
	wp_enqueue_script('draggable','https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.24.3/vuedraggable.umd.js');
	wp_enqueue_script('bootstrapJs','https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js');
	//font
	wp_enqueue_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
	//noto-sans-jp
	wp_enqueue_style('noto-sans-jp', 'https://fonts.googleapis.com/css?family=Noto+Serif+JP', array(), null);
	//damion-font
	wp_enqueue_style('damion-font', 'https://fonts.googleapis.com/css2?family=Damion&display=swap', false, null);
	// Sawarabi Gothic
    wp_enqueue_style('sawarabi-gothic', 'https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap', false, null);
    // M PLUS Rounded 1c
    wp_enqueue_style('m-plus-rounded',
					 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;700&family=M+PLUS+1p:wght@400;700&display=swap',
					 false, null);
    // Sawarabi Mincho
    wp_enqueue_style('sawarabi-mincho', 'https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap', false, null);
    // Kosugi Maru
    wp_enqueue_style('kosugi-maru', 'https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap', false, null);
    // Toppan Bunkyu Mincho (このフォントはまだGoogle Fontsにない可能性があるため、代替としてM PLUS 1pをエンキューします)
    wp_enqueue_style('m-plus-1p', 'https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap', false, null);
    // Roboto
    wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap', false, null);

	// CodeMirrorのCSSとJSを読み込む
	wp_enqueue_style('codemirror-css', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.css');
    wp_enqueue_script('codemirror-js', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.js', array(), null, true);

	//コード補完
	wp_enqueue_script('codemirror-show-hint', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/addon/hint/show-hint.js', ['codemirror-js'], null, true);
    wp_enqueue_script('codemirror-anyword-hint', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/addon/hint/anyword-hint.js', ['codemirror-show-hint'], null, true);
	//xml
	wp_enqueue_script('codemirror-hint-xml', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/addon/hint/xml-hint.js', ['codemirror-show-hint'], null, true);
	//html
	wp_enqueue_script('codemirror-html-hint', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/addon/hint/html-hint.js', ['codemirror-show-hint'], null, true);
	//css
	wp_enqueue_script('codemirror-css-hint', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/addon/hint/css-hint.js', ['codemirror-show-hint'], null, true);
	//js
	wp_enqueue_script('codemirror-javascript-hint', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/addon/hint/javascript-hint.js', ['codemirror-show-hint'], null, true);

    wp_enqueue_style('codemirror-hint-css', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/addon/hint/show-hint.css');

    // モードを追加（HTML、CSS、JavaScript、PHP）
     wp_enqueue_script('codemirror-mode-xml', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/xml/xml.min.js', array('codemirror-js'), null, true);
    wp_enqueue_script('codemirror-mode-javascript', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/javascript/javascript.min.js', array('codemirror-js'), null, true);
    wp_enqueue_script('codemirror-mode-css', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/css/css.min.js', array('codemirror-js'), null, true);
    wp_enqueue_script('codemirror-mode-htmlmixed', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/htmlmixed/htmlmixed.min.js', array('codemirror-js', 'codemirror-mode-xml', 'codemirror-mode-javascript', 'codemirror-mode-css'), null, true);


    // CodeMirrorを適用するJS
    wp_enqueue_script('custom-codemirror-init', get_template_directory_uri() . '/assets/js/codemirror-init.js', array('codemirror-js'), null, true);

	//slick-js
	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
	// Slick SliderのJavaScriptをエンキュー
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
	// Slick Sliderの初期化スクリプトをエンキュー
    wp_add_inline_script('slick-js', '
        jQuery(document).ready(function($) {
            $(".heroheader-slider-wrap").slick({
				autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                speed: 1000,
				arrows: false,
				fade: true,
                cssEase: "linear",
				adaptiveHeight: false,
				pauseOnHover: false,
    			pauseOnFocus: false
            });
        	$(".heroheader-slider-wrap").on("beforeChange", function(event, slick, currentSlide, nextSlide) {
        	    // 一つ前のスライドを計算
        	    const newPreviousSlide = nextSlide - 1 < 0 ? slick.$slides.length - 1 : nextSlide - 1;

        	    // すべてのスライドからクラスを確実に削除
            	$(slick.$slides).removeClass("slick-custom-important");

        	    // 新しい一つ前のスライドにクラスを追加
        	    $(slick.$slides[newPreviousSlide]).addClass("slick-custom-important");
        	    // 現在の一つ前のスライドを記憶
        	    previousSlide = newPreviousSlide;
        	});

        });
    ');
}
add_action( 'admin_enqueue_scripts', 'add_cdns' );

/**
 * 管理画面用(admin)css/jsのファイルエンキュー
 */
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
  wp_enqueue_style('admin_style', $path_css, array(), NARUKAMI_VERSION);
  $path_js = get_template_directory_uri().'/assets/js/admin.js';
  wp_enqueue_script('admin_script', $path_js, array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'add_admin_style');

//カスタムエディターエンキュー
function my_custom_editor_enqueue() {
	wp_enqueue_editor();
    wp_enqueue_script('my_custom_editor_script', get_template_directory_uri() . '/assets/js/custom-editor.js', array('jquery', 'wp-editor'), NARUKAMI_VERSION, true);
}
add_action('admin_enqueue_scripts', 'my_custom_editor_enqueue');

//オリジナルブロック登録--優先順位１位
function narukami_itemlist_block_register() {
	$screen = get_current_screen();

    // 商品リストページ専用ブロック登録
    if ( 'product_list_page' === $screen->post_type ) {
        // オリジナルブロックのスクリプトを登録
        wp_register_script(
            'itemlist-custom-block',
            get_template_directory_uri() . '/assets/js/original-block-editor.js',
            array(
                'wp-blocks',
                'wp-editor',
                'wp-element',
                'wp-components',
                'wp-i18n',
                'wp-hooks',
                'wp-data'
            ),
            NARUKAMI_VERSION,
            true
        );

        // ブロックを登録
        register_block_type('itemlist-custom-block/item-list-block', array(
            'editor_script' => 'itemlist-custom-block',
        ));
    }

	//商品紹介ページ専用ブロック登録
	if ( 'product_item_page' === $screen->post_type ) {
        // オリジナルブロックのスクリプトを登録
        wp_register_script(
            'item-introduction-block',
            get_template_directory_uri() . '/assets/js/custom-block-single.js',
            array(
                'wp-blocks',
                'wp-editor',
                'wp-element',
                'wp-components',
                'wp-i18n',
                'wp-hooks',
                'wp-data'
            ),
            NARUKAMI_VERSION,
            true
        );

        // ブロックを登録
        register_block_type('item-introduction-block/introduction-block', array(
            'editor_script' => 'item-introduction-block',
        ));
		register_block_type('item-ingredients-description-block/ingredients-description-block', array(
            'editor_script' => 'item-introduction-block',
        ));
		register_block_type('allergy-information-block/allergy-info-block', array(
            'editor_script' => 'item-introduction-block',
        ));
    }

	// lpページ専用ブロック登録
    if ( 'product_lp_page' === $screen->post_type ) {
        // オリジナルブロックのスクリプトを登録
        wp_register_script(
            'custom-lp-block',
            get_template_directory_uri() . '/assets/js/narukami-lp-block.js',
            array(
                'wp-blocks',
                'wp-editor',
                'wp-element',
                'wp-components',
                'wp-i18n',
                'wp-hooks',
                'wp-data'
            ),
            NARUKAMI_VERSION,
            true
        );
		register_block_type('hero-header-block/hero-header-linetitle-block', array(
            'editor_script' => 'custom-lp-block',
        ));
		register_block_type('item-three-column-img-block/three-column-img-block', array(
            'editor_script' => 'custom-lp-block',
        ));
		register_block_type('item-bg-title-content-block/bg-title-content-block', array(
            'editor_script' => 'custom-lp-block',
        ));
		register_block_type('item-two-column-content/two-column-content-block', array(
            'editor_script' => 'custom-lp-block',
        ));
		register_block_type('item-img-vertical-writing/img-vertical-writing-block', array(
            'editor_script' => 'custom-lp-block',
        ));
		register_block_type('item-rogo-content/rogo-content-block', array(
            'editor_script' => 'custom-lp-block',
        ));
		register_block_type('item-img-content-variable/img-content-variable-block', array(
            'editor_script' => 'custom-lp-block',
        ));
		register_block_type('item-bigimg-content/bigimg-content-block', array(
            'editor_script' => 'custom-lp-block',
        ));
    }
}//function end
add_action('enqueue_block_editor_assets', 'narukami_itemlist_block_register', 10);


//ブロックエディターエンキュー --優先順位2位(既存ブロックの拡張)
function narukami_block_editor_enqueue() {
    // 基本の依存関係
    $dependencies = array(
        'wp-blocks',
        'wp-dom-ready',
        'wp-edit-post',
        'wp-block-editor',
        'wp-compose',
        'wp-components',
        'wp-hooks',
        'wp-element',
        'wp-i18n'
    );

    // 条件に応じて依存関係を追加
    if (wp_script_is('itemlist-custom-block', 'registered')) {
        $dependencies[] = 'itemlist-custom-block';
    }
    if (wp_script_is('item-introduction-block', 'registered')) {
        $dependencies[] = 'item-introduction-block';
    }
    if (wp_script_is('custom-lp-block', 'registered')) {
        $dependencies[] = 'custom-lp-block';
    }

    // スクリプトを登録・読み込み
    wp_enqueue_script(
        'narukami_block_editor_script',
        get_template_directory_uri() . '/assets/js/custom-block-editor.js',
        $dependencies,
        NARUKAMI_VERSION,
        true
    );
}
add_action('enqueue_block_editor_assets', 'narukami_block_editor_enqueue', 11);


//ブロックエディタcssエンキュー
function narukami_enqueue_block_editor_styles() {
    if (is_admin()) {
        wp_enqueue_style(
            'narukami_custom_editor_style',
            get_template_directory_uri() . '/assets/css/custom-block-editor.css',
            array(),
            NARUKAMI_VERSION
        );
    }
}
add_action('enqueue_block_assets', 'narukami_enqueue_block_editor_styles');

// ブロックエディタにカスタム背景画像を適用
function apply_custom_background_in_block_editor() {
    global $post;

    // 投稿が存在し、カスタム投稿タイプの場合のみ実行
    if ($post && $post->post_type === 'product_lp_page') {
        // カスタムフィールドから背景画像のURLを取得
        $background_image = get_post_meta($post->ID, 'background_image', true);

        if ($background_image) {
            // CSSを出力してブロックエディタに反映
            echo '<style>
                .editor-styles-wrapper {
                    background-image: url("' . esc_url($background_image) . '") !important;
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
            </style>';
        }
    }
}
add_action('enqueue_block_editor_assets', 'apply_custom_background_in_block_editor');



/**
 * プレビューページ又はシングルページ,カスタム投稿ページ,フロントページのcss,js,エンキュー
 */
function enqueue_narukami_top_preview_assets() {
    // プレビューページ又はシングルページ,カスタム投稿ページかどうかをチェック
    if (is_preview() || is_singular() || is_front_page() || is_404()) {
        // CSSファイルをエンキュー
        wp_enqueue_style('narukami-top-preview', get_template_directory_uri() . '/sass/preview/narukami-top-preview.css', array(), NARUKAMI_VERSION);
        wp_enqueue_style('narukami-product-list', get_template_directory_uri() . '/sass/product-list-style.css', array(), NARUKAMI_VERSION);
		wp_enqueue_script('narukami-top-js-preview', get_template_directory_uri() . '/front-js/preview/narukami-top-preview.js', array('jquery'), null, true);
		//font
		wp_enqueue_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
		//noto-sans-jp
		wp_enqueue_style('noto-sans-jp', 'https://fonts.googleapis.com/css?family=Noto+Serif+JP', array(), null);
		//damion-font
		wp_enqueue_style('damion-font', 'https://fonts.googleapis.com/css2?family=Damion&display=swap', false, null);
		// Sawarabi Gothic
    	wp_enqueue_style('sawarabi-gothic', 'https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap', false, null);
    	// M PLUS Rounded 1c
    	wp_enqueue_style('m-plus-rounded', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap', false, null);
    	// Sawarabi Mincho
    	wp_enqueue_style('sawarabi-mincho', 'https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap', false, null);
    	// Kosugi Maru
    	wp_enqueue_style('kosugi-maru', 'https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap', false, null);
    	// Toppan Bunkyu Mincho (このフォントはまだGoogle Fontsにない可能性があるため、代替としてM PLUS 1pをエンキューします)
    	wp_enqueue_style('m-plus-1p', 'https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap', false, null);
    	// Roboto
    	wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap', false, null);
		//jquery
		wp_enqueue_script('jquery');
		// Slick CSS
    	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css', array(), null);
    	wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css', array('slick-css'), null);
		// Slick SliderのJavaScriptをエンキュー
    	wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
		// Slick Sliderのトップページ用初期化スクリプトをエンキュー
    	wp_add_inline_script('slick-js', '
        jQuery(document).ready(function($) {
            $(".heroheader-slider-wrap").slick({
				autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                speed: 1000,
				arrows: false,
				fade: true,
                cssEase: "linear",
				adaptiveHeight: false,
				pauseOnHover: false,
    			pauseOnFocus: false
            });
        	$(".heroheader-slider-wrap").on("beforeChange", function(event, slick, currentSlide, nextSlide) {
        	    // 一つ前のスライドを計算
        	    const newPreviousSlide = nextSlide - 1 < 0 ? slick.$slides.length - 1 : nextSlide - 1;

        	    // すべてのスライドからクラスを確実に削除
            	$(slick.$slides).removeClass("slick-custom-important");

        	    // 新しい一つ前のスライドにクラスを追加
        	    $(slick.$slides[newPreviousSlide]).addClass("slick-custom-important");
        	    // 現在の一つ前のスライドを記憶
        	    previousSlide = newPreviousSlide;
        	});

        });
    ');
		// Slick Sliderの商品リストページ用初期化スクリプトをエンキュー
    	wp_add_inline_script('slick-js', '
    	jQuery(document).ready(function($) {
        	$(".narukami-product-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            cssEase: "ease-in-out",
			accessibility: true,
  			focusOnChange: false,
			arrows: true,
            dots: true
        	});
    	});
		');
		//Slick Sliderの商品紹介ページ用初期化スクリプトをエンキュー
		wp_add_inline_script('slick-js', '
        jQuery(document).ready(function($) {
    	$(".slider-container").slick({
        	slidesToShow: 1,
        	slidesToScroll: 1,
			variableWidth: true,
			adaptiveHeight: true,
        	autoplaySpeed: 2000,
			cssEase: "ease-in-out",
        	dots: true
    	});
		});
    ');

    }
}
// wp_enqueue_scripts アクションにフック
add_action('wp_enqueue_scripts', 'enqueue_narukami_top_preview_assets');

/**
 * トップページのみヒーローヘッダーのjs読み込み分岐
 */
function narukami_heroheader_js_include(){
	if (is_front_page() || is_preview() ) {
			wp_enqueue_script('n-anime-slider-js', get_template_directory_uri() . '/front-js/preview/anime-slider.js', array(), NARUKAMI_VERSION, true);
	}
}
add_action('wp_enqueue_scripts', 'narukami_heroheader_js_include');

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
<p class="subf-prev-title">選択画像PREVIEW</p>
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
<p class="subf-prev-title">選択画像PREVIEW</p>
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
function generate_upload_image_single_array_tag($name, $value, $number){?>
<div class="img-wrap-function">
<p class="subf-prev-title">選択画像PREVIEW</p>
<div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail" data-index="<?php echo $number; ?>">
    <?php if ($value): ?>
      <img src="<?php echo $value; ?>" alt="選択中の画像">
    <?php endif ?>
  </div>
  <input id="<?php echo $name; ?>" class="img-setect-url img-count-item" name="<?php echo $name; ?>[]" type="text" data-index="<?php echo $number; ?>" value="<?php echo $value; ?>" />
  <input id="<?php echo $name; ?>_btn" type="button" class="img-select" name="<?php echo $name; ?>_slect" onclick="singleSelectArryImg(this)" data-index="<?php echo $number; ?>" value="選択" />
  <input id="<?php echo $name; ?>_clear" type="button" class="img-select-clear" name="<?php echo $name; ?>_clear" onclick="sngleUploaderArrayDelete(this)" data-index="<?php echo $number; ?>"  value="クリア" />
</div>
<div id="script-container"></div>
  <?php
}

//画像アップロード用のタグを出力する(single配列)
function generate_upload_image_tag($name, $value, $insert, $gm_numbers){?>
<div class="img-wrap-function">
<p class="subf-prev-title">選択画像PREVIEW</p>
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

/*
*プレビューページ設定
*/

//トップページのプレビュー関数
add_action('template_redirect', 'custom_preview_handler', 10);
function custom_preview_handler() {
    if (isset($_GET['preview']) && $_GET['preview'] === 'true' && isset($_GET['page']) && $_GET['page'] === 'toppage_builder_preview') {
        // トップページビルダーのプレビュー用テンプレート
		status_header(200);
		ob_start();
        include(get_template_directory() . '/custom-preview-template.php');
		echo ob_get_clean();
        exit;
    }
}

//トップページリダイレクト拒否
add_filter('redirect_canonical', 'toppage_disable_preview_redirect', 10, 2);
function toppage_disable_preview_redirect($redirect_url, $requested_url) {
    if (
        isset($_GET['preview']) && $_GET['preview'] === 'true' &&
        isset($_GET['page']) && $_GET['page'] === 'toppage_builder_preview'
    ) {
        return false; // リダイレクトを無効化
    }
    return $redirect_url;
}

//トップページヘッダーのプレビュー関数
add_action('template_redirect', 'custom_header_preview_handler', 10);
function custom_header_preview_handler() {
    if (isset($_GET['preview']) && $_GET['preview'] === 'true' && isset($_GET['page']) && $_GET['page'] === 'toppage_header_preview') {
        // トップページヘッダーのプレビュー用テンプレート
		status_header(200);
		ob_start();
        include(get_template_directory() . '/custom-header-prevew-temp.php');
		echo ob_get_clean();
        exit;
    }
}
//ヘッダーリダイレクト拒否
add_filter('redirect_canonical', 'header_disable_preview_redirect', 10, 2);
function header_disable_preview_redirect($redirect_url, $requested_url) {
    if (
        isset($_GET['preview']) && $_GET['preview'] === 'true' &&
        isset($_GET['page']) && $_GET['page'] === 'toppage_header_preview'
    ) {
        return false; // リダイレクトを無効化
    }
    return $redirect_url;
}

//404ページのプレビュー関数
add_action('template_redirect', 'custom_404page_preview_handler', 10);
function custom_404page_preview_handler() {
    if (isset($_GET['preview']) && $_GET['preview'] === 'true' && isset($_GET['page']) && $_GET['page'] === 'page404_preview') {
        // 404のプレビュー用テンプレート
		status_header(200);
		ob_start();
        include(get_template_directory() . '/custom-404-preview-temp.php');
		echo ob_get_clean();
        exit;
    }
}

//404リダイレクト拒否
add_filter('redirect_canonical', 'notfound_disable_preview_redirect', 10, 2);
function notfound_disable_preview_redirect($redirect_url, $requested_url) {
    if (
        isset($_GET['preview']) && $_GET['preview'] === 'true' &&
        isset($_GET['page']) && $_GET['page'] === 'page404_preview'
    ) {
        return false; // リダイレクトを無効化
    }
    return $redirect_url;
}

//告知ページのプレビュー関数
add_action('template_redirect', 'custom_banner_preview_handler', 10);
function custom_banner_preview_handler() {
    if (isset($_GET['preview']) && $_GET['preview'] === 'true' && isset($_GET['page']) && $_GET['page'] === 'banner_preview') {
        // トップページビルダーのプレビュー用テンプレート
		status_header(200);
		ob_start();
        include(get_template_directory() . '/custom-banner-preview-temp.php');
		echo ob_get_clean();
        exit;
    }
}

//告知ページリダイレクト拒否
add_filter('redirect_canonical', 'bunner_disable_preview_redirect', 10, 2);
function bunner_disable_preview_redirect($redirect_url, $requested_url) {
    if (
        isset($_GET['preview']) && $_GET['preview'] === 'true' &&
        isset($_GET['page']) && $_GET['page'] === 'banner_preview'
    ) {
        return false; // リダイレクトを無効化
    }
    return $redirect_url;
}

// メタボックスを登録
function add_background_meta_box() {
    add_meta_box(
        'background_meta_box',
        '背景画像設定',
        'show_background_meta_box',
        'product_lp_page', // カスタム投稿タイプのスラッグに置き換え
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_background_meta_box');

// メタボックスの表示
function show_background_meta_box($post) {
    $background = get_post_meta($post->ID, 'background_image', true);
    ?>
    <div>
        <input type="text" id="background_image" name="background_image" value="<?php echo esc_url($background); ?>" style="width:100%; margin: 20px auto;" />
        <button type="button" class="button" id="upload_background_button">画像を選択</button>
    </div>
    <p style="margin: 10px auto;">背景画像のURLを入力するか、ボタンから選択してください。</p>

    <script>
    jQuery(document).ready(function($) {
        $('#upload_background_button').click(function(e) {
            e.preventDefault();
            var image = wp.media({
                title: '背景画像を選択',
                multiple: false
            }).open()
            .on('select', function() {
                var uploaded_image = image.state().get('selection').first();
                var image_url = uploaded_image.toJSON().url;
                $('#background_image').val(image_url);
            });
        });
    });
    </script>
    <?php
}

// メタボックスの保存処理
function save_background_meta_box($post_id) {
    if (isset($_POST['background_image'])) {
        update_post_meta($post_id, 'background_image', esc_url($_POST['background_image']));
    }
}
add_action('save_post', 'save_background_meta_box');

//トップページビルダーの画像をjetpackのcdn経由かオリジナルかを分岐させる関数

function get_optimized_image_url( $image_urls ) {
    // Jetpackがインストールされ、有効でPhotonモジュールがアクティブかをチェック
    if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'photon' ) ) {
        // Jetpackが有効で、Photonモジュールがアクティブな場合
        if ( is_array( $image_urls ) ) {
            // 画像URLが配列の場合、各URLに対してCDN経由のURLを取得
            return array_map( 'jetpack_photon_url', $image_urls );
        } else {
            // 単体の画像URLの場合、そのままCDN経由でURLを取得
            return jetpack_photon_url( $image_urls );
        }
    } else {
        // Jetpackが無効な場合、そのままオリジナルの画像URLを返す
        return $image_urls;
    }
}

function disable_jetpack_photon_on_product_lp_page() {
    if (is_singular('product_lp_page')) {
        // フィルターが追加される前に、フィルターを無効化する
        add_filter('jetpack_photon', '__return_false');
    }
}
add_action('wp', 'disable_jetpack_photon_on_product_lp_page');



//youtubeの動画リンクのurlを抜き出す
function get_youtube_id($url) {
    parse_str(parse_url($url, PHP_URL_QUERY), $query);
    return isset($query['v']) ? $query['v'] : '';
}
//画像のサイズをお知らせする
function narukami_image_guidelines() {
	// ライセンスページでは表示しない
    if (isset($_GET['page']) && $_GET['page'] === 'mytheme-license') {
        return;
    }
    echo '<div class="notice notice-info"><p><strong>🔹 鳴雷で使用する画像の推奨フォーマット・サイズ</strong></p>';
    echo '<table style="border-collapse: collapse; width: 100%; max-width: 700px;">';
    echo '<tr style="background: #f1f1f1;"><th style="padding: 8px; border: 1px solid #ccc;">用途</th><th style="padding: 8px; border: 1px solid #ccc;">サイズ(px)</th><th style="padding: 8px; border: 1px solid #ccc;">推奨フォーマット</th><th style="padding: 8px; border: 1px solid #ccc;">最大容量</th></tr>';
    echo '<tr><td style="padding: 8px; border: 1px solid #ccc;">ファビコン</td><td style="padding: 8px; border: 1px solid #ccc;">500×500</td><td style="padding: 8px; border: 1px solid #ccc;">WEBP / PNG</td><td style="padding: 8px; border: 1px solid #ccc;">50KB</td></tr>';
	echo '<tr><td style="padding: 8px; border: 1px solid #ccc;">サイトロゴ</td><td style="padding: 8px; border: 1px solid #ccc;">500×500</td><td style="padding: 8px; border: 1px solid #ccc;">WEBP / PNG</td><td style="padding: 8px; border: 1px solid #ccc;">50KB</td></tr>';
	echo '<tr><td style="padding: 8px; border: 1px solid #ccc;">背景画像 / ローディング背景</td><td style="padding: 8px; border: 1px solid #ccc;">1000×900</td><td style="padding: 8px; border: 1px solid #ccc;">WEBP / JPEG</td><td style="padding: 8px; border: 1px solid #ccc;">50KB</td></tr>';
    echo '<tr><td style="padding: 8px; border: 1px solid #ccc;">ランキング画像</td><td style="padding: 8px; border: 1px solid #ccc;">875×875</td><td style="padding: 8px; border: 1px solid #ccc;">WEBP / JPEG</td><td style="padding: 8px; border: 1px solid #ccc;">80KB</td></tr>';
    echo '<tr><td style="padding: 8px; border: 1px solid #ccc;">カラム画像</td><td style="padding: 8px; border: 1px solid #ccc;">1600×1600</td><td style="padding: 8px; border: 1px solid #ccc;">WEBP / JPEG</td><td style="padding: 8px; border: 1px solid #ccc;">150KB</td></tr>';
    echo '<tr><td style="padding: 8px; border: 1px solid #ccc;">ヒーローヘッダー画像</td><td style="padding: 8px; border: 1px solid #ccc;">1600×900</td><td style="padding: 8px; border: 1px solid #ccc;">WEBP / JPEG</td><td style="padding: 8px; border: 1px solid #ccc;">150KB</td></tr>';
    echo '<tr><td style="padding: 8px; border: 1px solid #ccc;">全画面画像</td><td style="padding: 8px; border: 1px solid #ccc;">1740×1320</td><td style="padding: 8px; border: 1px solid #ccc;">WEBP / JPEG</td><td style="padding: 8px; border: 1px solid #ccc;">180KB</td></tr>';
	echo '<tr style="background: #e6f7ff;"><td style="padding: 8px; border: 1px solid #ccc;">ヒーローヘッダーオリジナル動画</td><td style="padding: 8px; border: 1px solid #ccc;">1280×720（HD）</td><td style="padding: 8px; border: 1px solid #ccc;">MP4（H.264） / WEBM</td><td style="padding: 8px; border: 1px solid #ccc;">4MB 以下</td></tr>';
    echo '</table>';
    echo '<p style="margin-top: 10px;">⚠️ 一部の古いブラウザ（IEなど）は WEBP に対応していません。その場合は JPEG も併用してください。</p>';
    echo '</div>';
}
add_action('admin_notices', 'narukami_image_guidelines');


// --------------------------
// 1. 有効化時にライセンスページへリダイレクト
// --------------------------
add_action('after_switch_theme', 'mytheme_redirect_to_license_page');
function mytheme_redirect_to_license_page() {
    update_option('mytheme_theme_activated', true);
}

add_action('admin_init', 'mytheme_check_license_redirect');
function mytheme_check_license_redirect() {
    if (get_option('mytheme_theme_activated')) {
        delete_option('mytheme_theme_activated');
        wp_redirect(admin_url('themes.php?page=mytheme-license'));
        exit;
    }
}

// --------------------------
// 2. ライセンスページのメニュー追加
// --------------------------
add_action('admin_menu', 'mytheme_add_license_menu');
function mytheme_add_license_menu() {
    add_theme_page('鳴雷ライセンス認証', '鳴雷ライセンス認証', 'manage_options', 'mytheme-license', 'mytheme_license_page');
}

// --------------------------
// 3. ライセンス入力画面の表示
// --------------------------
function mytheme_license_page() {
    $status = get_option('mytheme_license_status');
    ?>
    <div class="wrap">
        <h1>鳴雷ライセンス認証</h1>
        <?php if (isset($_GET['status']) && $_GET['status'] === 'success') : ?>
            <div class="notice notice-success"><p>ライセンス認証に成功しました。</p></div>
        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error') : ?>
            <div class="notice notice-error"><p>ライセンス認証に失敗しました。正しいライセンスキーを入力してください。</p></div>
        <?php endif; ?>
        <?php if ($status !== 'activated') : ?>
        <form method="post">
            <?php wp_nonce_field('mytheme_license_action', 'mytheme_license_nonce'); ?>
			<p>
				鳴雷は１ドメイン１ライセンス制となっており、ライセンス認証が完了しないとテーマが動作しません。<br>
				下記のフォームにテーマ購入時にメールで送りしましたライセンスキーを入力して認証を行ってください。<br>
			</p>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="mytheme_license_key">鳴雷ライセンスキー</label></th>
                    <td><input type="text" name="mytheme_license_key" id="mytheme_license_key" class="regular-text" required></td>
					<input type="hidden" name="mytheme_license_domain" value="<?php echo esc_attr(home_url()); ?>">
                </tr>
            </table>
            <?php submit_button('ライセンス認証'); ?>
        </form>
        <?php else : ?>
            <p>ライセンス認証済みです。</p>
        <?php endif; ?>
    </div>
    <?php
}
if (isset($_POST['mytheme_license_key'])) {
    $license_key_time = sanitize_text_field($_POST['mytheme_license_key']);
    update_option('mytheme_license_key', $license_key_time);
}
// --------------------------
// 4. ライセンス送信ロジック（ドメイン付き）
// --------------------------
add_action('admin_init', 'mytheme_check_license_submit');
function mytheme_check_license_submit() {
    if (!isset($_POST['mytheme_license_nonce']) || !wp_verify_nonce($_POST['mytheme_license_nonce'], 'mytheme_license_action')) {
        return;
    }

    if (!isset($_POST['mytheme_license_key'])) return;

    $license_key = sanitize_text_field($_POST['mytheme_license_key']);
    $domain = home_url();
	
    $response = wp_remote_post('https://narukami-wptheme.com/wp-json/mytheme/v1/licenses', [
        'timeout' => 30,
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'body' => json_encode([
            'license_key' => $license_key,
            'domain'      => $domain,
        ]),
    ]);
	
	// wp_remote_post がエラーかどうか確認
if (is_wp_error($response)) {
    // エラーがあれば、エラーメッセージを表示
    echo '<pre>';
    print_r($response->get_error_message());
    echo '</pre>';
} else {
    // レスポンスの内容を表示
    $body = wp_remote_retrieve_body($response);
    echo '<pre>';
    print_r($body); // レスポンス内容をブラウザに表示
    echo '</pre>';
}

    if (!is_wp_error($response)) {
        $data = json_decode(wp_remote_retrieve_body($response), true);
        if (isset($data['status']) && $data['status'] === 'success') {
            update_option('mytheme_license_status', 'activated');
            wp_redirect(admin_url('themes.php?page=mytheme-license&status=success'));
            exit;
        }
    }

    delete_option('mytheme_license_status');
    wp_redirect(admin_url('themes.php?page=mytheme-license&status=error'));
    exit;
}
//delete_option('mytheme_license_status');
// --------------------------
// 5. テーマをロックする（認証されるまで）
// --------------------------
//フロント全体をロック
add_action('template_redirect', 'mytheme_block_everything_if_unlicensed');

function mytheme_block_everything_if_unlicensed() {
    // REST APIやAjaxも含めて完全ブロックする場合（管理画面以外）
    if (is_admin()) return;

    if (get_option('mytheme_license_status') !== 'activated') {
		
		 // ログインしていない場合はログインページへリダイレクト
        if (!is_user_logged_in()) {
            wp_redirect(wp_login_url($_SERVER['REQUEST_URI']));
            exit;
        }
        // REST API リクエストか確認
        if (defined('REST_REQUEST') && REST_REQUEST) {
            wp_send_json_error(['message' => 'ライセンス認証が必要です'], 403);
        }

        // Ajax リクエストの場合も停止
        if (defined('DOING_AJAX') && DOING_AJAX) {
            wp_send_json_error(['message' => 'ライセンス認証が必要です'], 403);
        }

        // それ以外のアクセスをブロック
        wp_die(
            'このテーマを使用するにはライセンス認証が必要です。<br><a href="' . admin_url('themes.php?page=mytheme-license') . '">ライセンス認証ページへ</a>',
            'ライセンス認証が必要です',
            ['response' => 403]
        );
    }
}

//管理画面もロック
add_action('admin_init', 'mytheme_block_admin_pages_if_unlicensed');

function mytheme_block_admin_pages_if_unlicensed() {
    if (!current_user_can('manage_options')) return; // 管理者以外は処理しない

    $license_status = get_option('mytheme_license_status');

    // 未認証の場合のみ制限
    if ($license_status !== 'activated') {
        // 現在の管理画面ファイル名
        $current_admin_page = basename($_SERVER['PHP_SELF']);

        // ライセンスページ or テーマページは許可
        if (
            $current_admin_page === 'themes.php' &&
            (empty($_GET['page']) || $_GET['page'] === 'mytheme-license')
        ) {
            return; // 許可
        }

        // その他の管理画面ページはライセンスページへリダイレクト
        wp_redirect(admin_url('themes.php?page=mytheme-license&license_message=1'));
        exit;
    }
}


//ライセンスアラート制御
add_action('admin_footer', 'mytheme_show_license_notice_popup');
function mytheme_show_license_notice_popup() {
    // 管理画面でライセンスページ & license_message があるときにだけ表示
    if (
        isset($_GET['page']) &&
        $_GET['page'] === 'mytheme-license' &&
        isset($_GET['license_message'])
    ) :
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            alert("WordPressTheme「鳴雷」を使用するにはライセンス認証が必要です。");
        });
    </script>
    <?php
    endif;
}

// --------------------------
// 5. ライセンス失効時テーマの機能をロックする
// --------------------------
add_filter('cron_schedules', 'mytheme_custom_cron_schedule');
function mytheme_custom_cron_schedule($schedules) {
    $schedules['every_24_hours'] = array(
        'interval' => 24 * 60 * 60, // 24時間
        'display'  => 'Every 24 Hours'
    );
    return $schedules;
}

// ライセンス確認を定期的に実行するスケジュールタスクを設定
function mytheme_schedule_license_check() {
    if (!wp_next_scheduled('mytheme_license_check_event')) {
        wp_schedule_event(time(), 'every_24_hours', 'mytheme_license_check_event');
    }
}
add_action('wp', 'mytheme_schedule_license_check');

// 定期的にライセンス確認を行う関数
function mytheme_check_license_periodically() {
    // ライセンスキーとドメイン情報を取得
    $license_key = get_option('mytheme_license_key'); // 保存されているライセンスキーを使用
    $domain = home_url();

    // ライセンスを確認するAPIリクエストを送信
    $response = wp_remote_post('https://narukami-wptheme.com/wp-json/mytheme/v1/licenses', [
        'timeout' => 30,
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'body' => json_encode([
            'license_key' => $license_key,
            'domain'      => $domain,
        ]),
    ]);

    // エラーチェック
    if (is_wp_error($response)) {
        // エラーがあればライセンスを無効化
        delete_option('mytheme_license_status');
        delete_option('mytheme_license_key');
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        // エラーが返ってきた場合にライセンスを無効化
        if (isset($data['status']) && $data['status'] !== 'success') {
            delete_option('mytheme_license_status');
            delete_option('mytheme_license_key');
			
        }
    }
}
add_action('mytheme_license_check_event', 'mytheme_check_license_periodically');

//鳴雷の自動アップデート

// アップデート情報を取得し、テーマの更新をチェックする
add_filter('pre_set_site_transient_update_themes', 'check_for_theme_update');
function check_for_theme_update($transient) {
    // サーバー上のアップデート情報URL
    $theme_update_url = 'https://narukami-wptheme.com/wp-content/uploads/theme-updates/narukami-update.json';

    // サーバーからアップデート情報を取得
    $response = wp_remote_get($theme_update_url);

    if (is_wp_error($response)) {
        return $transient; // エラーが発生した場合、そのまま戻す
    }

    // JSONデータの取得
    $update_data = json_decode(wp_remote_retrieve_body($response));

    // 新しいバージョンがある場合に更新情報を設定
    if (isset($update_data->new_version)) {
		$theme = wp_get_theme();
        $current_version = $theme->get('Version'); // 現在のテーマバージョンを取得
        if (version_compare($update_data->new_version, $current_version, '>')) {
            $theme_slug = get_template();
			$transient->response[$theme_slug] = array(
				'theme' => $theme_slug,
				'new_version' => $update_data->new_version,
				'url' => $update_data->theme_url,
				'package' => $update_data->download_url,
			);

        }
    }

    return $transient;
}

// 更新前の処理（オプション）
add_filter('upgrader_pre_install', 'install_theme_update', 10, 2);
function install_theme_update($response, $hook_extra) {
    if (isset($hook_extra['theme']) && $hook_extra['theme'] === 'NARUKAMI') {
        // 更新時に追加の処理を行いたい場合、ここにコードを追加できます
    }
    return $response;
}



/**
 * option値初期化ファイル(通常時コメントアウト)
 */
//require get_template_directory() . '/lib/delete-option.php';

/**
 * ログイン時のロゴ,リンク変更
 */
require get_template_directory() . '/lib/narukami-rogin-rogo.php';

/**
 * 鳴雷専用ダッシュボードカスタム
 */
require get_template_directory() . '/narukami-dashboad.php';

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
 * カスタムページ作成関数読み込み
 */
require get_template_directory() . '/custom_page/custom_page_item_list.php';
require get_template_directory() . '/custom_page/custom_page_item_one.php';
require get_template_directory() . '/custom_page/custom_page_lp.php';
/**
 * カスタム投稿ページデフォルトブロック差し込み関数
 */
require get_template_directory() . '/BLOCKS/block-edit-defult-setting.php';
/**
 * ダッシュボードメニュー管理
 */
require get_template_directory() . '/INC_FUNCTIONS/remove-menu.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
//テンプレート表示　要削除
add_action('wp_head', function() {
    global $template;
    echo '<!-- Current Template: ' . basename($template) . ' -->';
});
