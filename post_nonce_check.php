<?php
//ヘッダー設定
function update_custom_option() {
    if (isset($_POST['header_site_title'])) {
        // ノンスのチェック
        if (!isset($_POST['update_header_nonce']) || !wp_verify_nonce($_POST['update_header_nonce'], 'update_header_action')) {
            die('不正なリクエストです。');
        }
		
        //update_optionヘッダー
        $header_rogo_url_value = esc_url($_POST['site-rogo-img-url']);
        $header_title_value = sanitize_text_field($_POST['header_site_title']);
        $header_discription_value = wp_kses_post($_POST['header_site_discription']);
        $header_display_set = sanitize_text_field($_POST['header-display-setting']);
        $header_rogo_set = sanitize_text_field($_POST['header-display-rogo']);
        $header_stitle_set = sanitize_text_field($_POST['header-display-sitetitle']);
        $header_sdisc_set = sanitize_text_field($_POST['header-display-sitedisc']);
        $header_bgcolor_set = sanitize_text_field($_POST['header-bg-color']);
        $header_sort_set = sanitize_text_field($_POST['header-display-sort']);
        $header_textcolor_set = sanitize_text_field($_POST['header-text-color']);
        update_option('header-rogo-url', $header_rogo_url_value);
        update_option('header-tite', $header_title_value);
        update_option('header-discription', $header_discription_value);
        update_option('header-disp-set', $header_display_set);
        update_option('header-rogo-set', $header_rogo_set);
        update_option('header-stitle-set', $header_stitle_set);
        update_option('header-bg-color', $header_bgcolor_set);
        update_option('header-sort-set', $header_sort_set);
        update_option('header-text-color', $header_textcolor_set);

        wp_redirect(add_query_arg('updated', 'true', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_update_custom_option', 'update_custom_option');
?>