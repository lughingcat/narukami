<?php
function create_product_lp_page_type() {
    $labels = array(
        'name'               => 'LPページ',
        'singular_name'      => 'LPページ',
        'menu_name'          => 'LPページ',
        'name_admin_bar'     => 'LPページを追加',
        'add_new'            => '新規追加',
        'add_new_item'       => '新しいLPページを追加',
        'new_item'           => '新しいLPページ',
        'edit_item'          => 'LPページを編集',
        'view_item'          => 'LPページを見る',
        'all_items'          => '全てのLPページ',
        'search_items'       => 'LPページを検索',
        'parent_item_colon'  => '親LPページ:',
        'not_found'          => 'LPページが見つかりません',
        'not_found_in_trash' => 'ゴミ箱にLPページが見つかりません',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'product_lp_page'),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
		'menu_icon' => 'dashicons-admin-page',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'),
        'show_in_rest'       => true, // ブロックエディターで使う場合は必要
    );

    register_post_type('product_lp_page', $args);
}
add_action('init', 'create_product_lp_page_type');

// テーマがアクティベートされたときに実行する
function narukami_lp_flush_rewrite_rules() {
    // カスタム投稿タイプを先に登録する必要がある
    create_product_lp_page_type(); // カスタム投稿タイプの関数を呼び出す
    flush_rewrite_rules(); // パーマリンクを更新
}
add_action('after_switch_theme', 'narukami_lp_flush_rewrite_rules');
?>