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
		
		
        wp_redirect(add_query_arg('updated', 'true', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_update_custom_option', 'update_custom_option');
?>