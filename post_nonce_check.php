<?php
//ヘッダー設定
function update_custom_option() {
    if (isset($_POST['header_site_title'])) {
        // ノンスのチェック
        if (!isset($_POST['update_header_nonce']) || !wp_verify_nonce($_POST['update_header_nonce'], 'update_header_action')) {
            die('不正なリクエストです。');
        }
		
        //update_option ヘッダー
		
        $header_rogo_url_value = esc_url($_POST['site-rogo-img-url']);//サイトロゴ
        $header_title_value = sanitize_text_field($_POST['header_site_title']);//タイトル
        $header_discription_value = wp_kses_post($_POST['header_site_discription']);//説明文
        $header_display_set = sanitize_text_field($_POST['header-display-setting']);//ヘッダーの表示設定
        $header_rogo_set = sanitize_text_field($_POST['header-display-rogo']);//ロゴの表示設定
        $header_stitle_set = sanitize_text_field($_POST['header-display-sitetitle']);//サイトタイトルの表示設定
        $header_sdisc_set = sanitize_text_field($_POST['header-display-sitedisc']);//説明文表示設定
        $header_bgcolor_set = sanitize_text_field($_POST['header-bg-color']);//ヘッダー背景色
        $header_sort_set = sanitize_text_field($_POST['header-display-sort']);//並べ替え
        $header_textcolor_set = sanitize_text_field($_POST['header-text-color']);//ヘッダーテキストカラー
        update_option('header-rogo-url', $header_rogo_url_value);
        update_option('header-tite', $header_title_value);
        update_option('header-discription', $header_discription_value);
        update_option('header-disp-set', $header_display_set);
        update_option('header-rogo-set', $header_rogo_set);
        update_option('header-stitle-set', $header_stitle_set);
        update_option('header-sdisc-set', $header_sdisc_set);
        update_option('header-bg-color', $header_bgcolor_set);
        update_option('header-sort-set', $header_sort_set);
        update_option('header-text-color', $header_textcolor_set);
		
		//update_option グローバルメニュー
		$gloalmenu_title_array = sanitize_option_value($_POST['global_item_title']);
		$gloalmenu_link_array = sanitize_option_value($_POST['global_item_link']);
		$gloalmenu_bgcolor = sanitize_option_value($_POST['globalmenu-bg-color']);
		$gloalmenu_textcolor = sanitize_option_value($_POST['globalmenu-text-color']);
		$humberger_btn_bg = sanitize_option_value($_POST['humberger-btn-bg']);
		$humberger_arrowcolor = sanitize_option_value($_POST['humberger-arrowcolor']);
		$global_textunderlinecolor = sanitize_option_value($_POST['global-textunderlinecolor']);
		$global_text_menucolor = sanitize_option_value($_POST['global-text-menucolor']);
		update_option('global_title_array', $gloalmenu_title_array);
		update_option('global_url_array', $gloalmenu_link_array);
		update_option('gloalmenu_bgcolor', $gloalmenu_bgcolor);
		update_option('gloalmenu_textcolor', $gloalmenu_textcolor);
		update_option('humberger_btn_bg', $humberger_btn_bg);
		update_option('humberger-arrowcolor', $humberger_arrowcolor);
		update_option('global-textunderlinecolor', $global_textunderlinecolor);
		update_option('global-text-menucolor', $global_text_menucolor);
		
		//ヒーローヘッダー
		//設定
		$heorheader_type = sanitize_option_value($_POST['heorheader-type']);
		update_option('heorheader_type', $heorheader_type);
		//静止画
		$hh_still_img = sanitize_option_value($_POST['hh-still-img']);
		$hh_still_title = sanitize_option_value($_POST['hh-still-title']);
		$hh_titleTextColor = sanitize_option_value($_POST['hh-titleTextColor']);
		$hh_titleShadowColor = sanitize_option_value($_POST['hh-titleShadowColor']);
		update_option('hero-H-stillImg', $hh_still_img);
		update_option('hero-H-stillTitle', $hh_still_title);
		update_option('heroheader-titleTextColor', $hh_titleTextColor);
		update_option('heroheader-titleShadowColor', $hh_titleShadowColor);
		
		//動画
		$hh_move_img = sanitize_option_value($_POST['hh-move']);
		$hh_move_title = sanitize_option_value($_POST['hh-move-title']);
		$hh_move_backshadow = sanitize_option_value($_POST['hh-moveFrontWrap']);
		$hh_moveTitleColor = sanitize_option_value($_POST['hh-moveTitleColor']);
		$hh_moveTitleShadowColor = sanitize_option_value($_POST['hh-moveTitleShadowColor']);
		update_option('hero-H-move', $hh_move_img);
		update_option('hero-H-moveTitle', $hh_move_title);
		update_option('hero-H-movebackshadow', $hh_move_backshadow);
		update_option('heroheader-moveTitleTextColor', $hh_moveTitleColor);
		update_option('heroheader-moveTitleShadowColor', $hh_moveTitleShadowColor);
		
		//スライダー
		$hh_slider_img = sanitize_option_value($_POST['slider-img-link']);
		$hh_slider_title = sanitize_option_value($_POST['slider_item_title']);
		$hh_slider_shadow = sanitize_option_value($_POST['shadowValue']);
		$hh_slider_shadow_volume = sanitize_option_value($_POST['slider-shadow-range-value']);
		update_option('slider_img_link_array', $hh_slider_img);
		update_option('slider_item_title_array', $hh_slider_title);
		update_option('slider_item_shadow', $hh_slider_shadow);
		update_option('slider_item_shadow_volume', $hh_slider_shadow_volume);
		
		//オープニングアニメーション
		$loading_anime_type = sanitize_option_value($_POST['ladinganime-type']);
		$open_bg_img_url = sanitize_option_value($_POST['open-bg-img-url']);
		$open_rogo_img_url = sanitize_option_value($_POST['open-rogo-img-url']);
		$loadingtext_color = sanitize_option_value($_POST['loadingtext-color']);
		update_option('loading-anime-type', $loading_anime_type);
		update_option('open-bg-imgurl', $open_bg_img_url);
		update_option('open-rogo-imgurl', $open_rogo_img_url);
		update_option('loadingtext-color', $loadingtext_color);
		
        wp_redirect(add_query_arg('updated', 'true', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_update_custom_option', 'update_custom_option');

//サブフッター設定
function update_custom_option_subfooter() {
    if (isset($_POST['subfooter-bg-color'])) {
        // ノンスのチェック
        if (!isset($_POST['update_subfooter_nonce']) || !wp_verify_nonce($_POST['update_subfooter_nonce'], 'update_subfooter_action')) {
            die('不正なリクエストです。');
        }
		
        //update_option サブフッター
		
        $subfooter_use_notuse = sanitize_option_value($_POST['subfooter-use-notuse']);
        $subfooter_item_title = sanitize_option_value($_POST['subfooter_item_title']);
        $subfooter_item_link = sanitize_option_value($_POST['subfooter_item_link']);
        $subfooter_bgcolor = sanitize_option_value($_POST['subfooter-bg-color']);
        $subfooter_textcolor = sanitize_option_value($_POST['subfooter-textcolor']);
        update_option('subfooter-use-notuse', $subfooter_use_notuse);
        update_option('subfooter_item_title', $subfooter_item_title);
        update_option('subfooter_item_link', $subfooter_item_link);
        update_option('subfooter-bg-color', $subfooter_bgcolor);
        update_option('subfooter-textcolor', $subfooter_textcolor);
		
		
        wp_redirect(add_query_arg('updated_subfooter', 'true', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_update_custom_option_subfooter', 'update_custom_option_subfooter');
?>