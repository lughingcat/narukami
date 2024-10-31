<?php
function remove_menus() {
    remove_menu_page('edit.php');          // 投稿を非表示
    remove_menu_page('edit.php?post_type=page'); // 固定ページを非表示
	remove_submenu_page('themes.php', 'edit.php?post_type=wp_block'); // 外観メニューの「パターン」を非表示
    remove_submenu_page('themes.php', 'widgets.php'); // ウィジェット
    remove_submenu_page('themes.php', 'nav-menus.php'); // メニュー
}
add_action('admin_menu', 'remove_menus');

function disable_block_patterns() {
    remove_theme_support('core-block-patterns'); // コアのブロックパターンを無効化
}
add_action('after_setup_theme', 'disable_block_patterns');

// コメント機能を無効化
function disable_comments() {
    // 投稿タイプにおけるコメントとトラックバック機能を無効化
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);
    // 管理画面上のコメント項目を非表示
    remove_menu_page('edit-comments.php');
    // ダッシュボードの「最近のコメント」ウィジェットを非表示
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_menu', 'disable_comments');


?>