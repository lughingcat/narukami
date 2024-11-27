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
        $header_textcolor_set = sanitize_text_field($_POST['header-text-color']);//ヘッダーテキストカラー
        $header_height_value = sanitize_text_field($_POST['header-height']);//ヘッダーの高さ調整
        $header_rogo_width_value = sanitize_text_field($_POST['header-rogo-width']);//ヘッダーロゴの大きさ調整
        update_option('header-rogo-url', $header_rogo_url_value);
        update_option('header-tite', $header_title_value);
        update_option('header-discription', $header_discription_value);
        update_option('header-disp-set', $header_display_set);
        update_option('header-rogo-set', $header_rogo_set);
        update_option('header-stitle-set', $header_stitle_set);
        update_option('header-sdisc-set', $header_sdisc_set);
        update_option('header-bg-color', $header_bgcolor_set);
        update_option('header-text-color', $header_textcolor_set);
        update_option('header-height', $header_height_value);
        update_option('header-rogo-width', $header_rogo_width_value);
		
		//update_option グローバルメニュー
		$gloalmenu_title_array = sanitize_option_value($_POST['global_item_title']);
		$gloalmenu_link_array = sanitize_option_value($_POST['global_item_link']);
		$gloalmenu_bgcolor = sanitize_option_value($_POST['globalmenu-bg-color']);
		$gloalmenu_textcolor = sanitize_option_value($_POST['globalmenu-text-color']);
		$humberger_btn_bg = sanitize_option_value($_POST['humberger-btn-bg']);
		$humberger_arrowcolor = sanitize_option_value($_POST['humberger-arrowcolor']);
		$global_textunderlinecolor = sanitize_option_value($_POST['global-textunderlinecolor']);
		update_option('global_title_array', $gloalmenu_title_array);
		update_option('global_url_array', $gloalmenu_link_array);
		update_option('gloalmenu_bgcolor', $gloalmenu_bgcolor);
		update_option('gloalmenu_textcolor', $gloalmenu_textcolor);
		update_option('humberger_btn_bg', $humberger_btn_bg);
		update_option('humberger-arrowcolor', $humberger_arrowcolor);
		update_option('global-textunderlinecolor', $global_textunderlinecolor);
		
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
    if (isset($_POST['subfooter_item_title'])) {
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

//フッター設定
function update_custom_option_footer() {
    if (isset($_POST['footer-bg-color'])) {
        // ノンスのチェック
        if (!isset($_POST['update_footer_nonce']) || !wp_verify_nonce($_POST['update_footer_nonce'], 'update_footer_action')) {
            die('不正なリクエストです。');
        }
		
        //update_option フッター
		
        $footer_item_title = sanitize_option_value($_POST['footer_item_title']);
        $footer_item_link = sanitize_option_value($_POST['footer_item_link']);
        $footer_bg_color = sanitize_option_value($_POST['footer-bg-color']);
        $footer_textcolor = sanitize_option_value($_POST['footer-textcolor']);
        $follow_us_color = sanitize_option_value($_POST['follow-us-color']);
		//sns
		$twitter_switch = sanitize_option_value($_POST['twitter-switch']);//twitter
		$instagram_switch = sanitize_option_value($_POST['instagram-switch']);//instagram
		$facebook_switch = sanitize_option_value($_POST['facebook-switch']);//facebook
		$line_switch = sanitize_option_value($_POST['line-switch']);//twitter
		$youtube_switch = sanitize_option_value($_POST['youtube-switch']);//twitter
		//sns-link
		$twitter_linkurl = sanitize_option_value($_POST['twitter-linkurl']);//twitter
		$instagram_linkurl = sanitize_option_value($_POST['instagram-linkurl']);//instagram
		$facebook_linkurl = sanitize_option_value($_POST['facebook-linkurl']);//facebook
		$line_linkurl = sanitize_option_value($_POST['line-linkurl']);//twitter
		$youtube_linkurl = sanitize_option_value($_POST['youtube-linkurl']);//twitter
		
        update_option('footer-item-title', $footer_item_title);
        update_option('footer-item-link', $footer_item_link);
        update_option('footer-bg-color', $footer_bg_color);
        update_option('footer-textcolor', $footer_textcolor);
        update_option('follow-us-color', $follow_us_color);
		//sns
		update_option('twitter-switch', $twitter_switch);//twitter(get_option)
		update_option('instagram-switch', $instagram_switch);//instagram(get_option)
		update_option('facebook-switch', $facebook_switch);//facebook(get_option)
		update_option('line-switch', $line_switch);//line(get_option)
		update_option('youtube-switch', $youtube_switch);//youtube(get_option)
		//sns-link
		update_option('twitter-linkurl', $twitter_linkurl);//twitter(get_option)
		update_option('instagram-linkurl', $instagram_linkurl);//instagram(get_option)
		update_option('facebook-linkurl', $facebook_linkurl);//facebook(get_option)
		update_option('line-linkurl', $line_linkurl);//line(get_option)
		update_option('youtube-linkurl', $youtube_linkurl);//youtube(get_option)
		
        wp_redirect(add_query_arg('updated_footer', 'true', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_update_custom_option_footer', 'update_custom_option_footer');

//404設定
function update_custom_option_404page() {
    if (isset($_POST['page404-title'])) {
        // ノンスのチェック
        if (!isset($_POST['update_404page_nonce']) || !wp_verify_nonce($_POST['update_404page_nonce'], 'update_404page_action')) {
            die('不正なリクエストです。');
        }
		
        //update_option 404page
		
        $page404bg_type = sanitize_option_value($_POST['page404bg-type']);
        $page404_title = sanitize_option_value($_POST['page404-title']);
        $notfoundpage_bg_img = sanitize_option_value($_POST['notfoundpage-bg-img']);
        $notfound_text_color = sanitize_option_value($_POST['notfound-text-color']);
        $notfound_text_shadow = sanitize_option_value($_POST['notfound-text-shadow']);
		
        update_option('page404bg-type', $page404bg_type);
        update_option('page404-title', $page404_title);
        update_option('notfoundpage-bg-img', $notfoundpage_bg_img);
        update_option('notfound-text-color', $notfound_text_color);
        update_option('notfound-text-shadow', $notfound_text_shadow);
		
        wp_redirect(add_query_arg('updated_404page', 'true', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_update_custom_option_404page', 'update_custom_option_404page');

//バナー設定
function update_custom_option_banner() {
    if (isset($_POST['banner-img'])) {
        // ノンスのチェック
        if (!isset($_POST['update_banner_nonce']) || !wp_verify_nonce($_POST['update_banner_nonce'], 'update_banner_action')) {
            die('不正なリクエストです。');
        }
		
        //update_option 404page
		
        $banner_use_control = sanitize_option_value($_POST['banner-use-control']);
        $banner_title = sanitize_option_value($_POST['banner-title']);
        $banner_img = sanitize_option_value($_POST['banner-img']);
        $banner_link = sanitize_option_value($_POST['banner-link']);
    
        update_option('banner-use-control', $banner_use_control);
        update_option('banner-title', $banner_title);
        update_option('banner-img', $banner_img);
        update_option('banner-link', $banner_link);
		
        wp_redirect(add_query_arg('updated_banner', 'true', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_update_custom_option_banner', 'update_custom_option_banner');

//全体設定
function update_custom_option_overall() {
    if (isset($_POST['narukami-font-family'])) {
        // ノンスのチェック
        if (!isset($_POST['update_overall_nonce']) || !wp_verify_nonce($_POST['update_overall_nonce'], 'update_overall_action')) {
            die('不正なリクエストです。');
        }
		
        //update_option 全体設定
		
        $narukami_font_family = sanitize_option_value($_POST['narukami-font-family']);
        $background_image = sanitize_option_value($_POST['background_image']);
        $narukami_favicon_image = sanitize_option_value($_POST['narukami-favicon-image']);
        $scroll_btn_bg_color = sanitize_option_value($_POST['scroll-btn-bg-color']);
        $scroll_btn_arrow_color = sanitize_option_value($_POST['scroll-btn-arrow-color']);
        $scroll_btn_active = sanitize_option_value($_POST['scroll-btn-active']);
        $scroll_btn_arrow_type = sanitize_option_value($_POST['arrow-type']);
        $call_btn_active = sanitize_option_value($_POST['call-btn-active']);
        $call_btn_bg_color = sanitize_option_value($_POST['call-btn-bg-color']);
        $store_smartphone_number = filter_var($_POST['store-smartphone-number'], FILTER_SANITIZE_NUMBER_INT);
		
        update_option('narukami-font-family', $narukami_font_family);
        update_option('background_image', $background_image);
        update_option('narukami-favicon-image', $narukami_favicon_image);
        update_option('scroll-btn-bg-color', $scroll_btn_bg_color);
        update_option('scroll-btn-arrow-color', $scroll_btn_arrow_color);
        update_option('arrow-type', $scroll_btn_arrow_type);
        update_option('scroll-btn-active', $scroll_btn_active);
        update_option('call-btn-active', $call_btn_active);
        update_option('call-btn-bg-color', $call_btn_bg_color);
        update_option('store-smartphone-number', $store_smartphone_number);
       
		
        wp_redirect(add_query_arg('updated_overall', 'true', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_update_custom_option_overall', 'update_custom_option_overall');

//ファビコン登録
function narukami_output_favicon() {
    $favicon_url = get_option('narukami-favicon-image', '');
    if ($favicon_url) {
        echo '<link rel="icon" href="' . esc_url($favicon_url) . '" sizes="32x32" />';
    }
}
add_action('wp_head', 'narukami_output_favicon');

?>
