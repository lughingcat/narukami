<?php
//ヘッダー設定
function update_custom_option() {
    if (isset($_POST['submit'])) {
        // ノンスのチェック
        if (!isset($_POST['update_header_nonce']) || !wp_verify_nonce($_POST['update_header_nonce'], 'update_header_action')) {
            die('不正なリクエストです。');
        }
		$allowed_tags = array(
    		'a' => array(
        	'href' => array(),
        	'title' => array(),
        	'target' => array(),
    	),
    		'br' => array(),
    		'em' => array(),
    		'strong' => array(),
    		'ul' => array(),
    		'ol' => array(),
    		'li' => array(),
    		'p' => array(),
    		'span' => array(
    	    'style' => array(),
    	),
			// 他の必要なタグを追加
		);
		
        //update_optionヘッダー
        $header_rogo_url_value = esc_url($_POST['site-rogo-img']);
        $header_title_value = sanitize_text_field($_POST['header_site_title']);
        $header_discription_value = wp_kses($_POST['header_site_discription'], $allowed_tags);
        update_option('header-rogo-url', $header_rogo_url_value);
        update_option('header-tite', $header_title_value);
        update_option('header-discription', $header_discription_value);

        // メッセージを表示
        echo 'オプションが更新されました。';
    }
}
?>