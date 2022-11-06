<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package narukami
 */

/**
 * bodyクラスの配列にカスタムクラスを追加します。
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function narukami_all_theme_item_body_classes( $classes ) {
	// 特異でないページに hfeed のクラスを追加します
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// サイドバーが存在しない場合、no-sidebar のクラスを追加します。
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;//classesの引数処理終了
}
add_filter( 'body_class', 'narukami_all_theme_item_body_classes' );

/**
 * 単一の投稿、ページ、または添付ファイルのピンバック URL 自動検出ヘッダーを追加します。
 */
function narukami_all_theme_item_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'narukami_all_theme_item_pingback_header' );
