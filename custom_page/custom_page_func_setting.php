<?php
function create_product_list_page_type() {
    $labels = array(
        'name'               => '販売アイテム一覧ページ',
        'singular_name'      => '販売アイテム一覧ページ',
        'menu_name'          => '販売アイテム一覧ページ',
        'name_admin_bar'     => '販売アイテム一覧ページを追加',
        'add_new'            => '新規追加',
        'add_new_item'       => '新しい販売アイテム一覧ページを追加',
        'new_item'           => '新しい販売アイテム一覧ページ',
        'edit_item'          => '販売アイテム一覧ページを編集',
        'view_item'          => '販売アイテム一覧ページを見る',
        'all_items'          => '全ての販売アイテム一覧ページ',
        'search_items'       => '販売アイテム一覧ページを検索',
        'parent_item_colon'  => '親販売アイテム一覧ページ:',
        'not_found'          => '販売アイテム一覧ページが見つかりません',
        'not_found_in_trash' => 'ゴミ箱に販売アイテム一覧ページが見つかりません',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'product_list_page'),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'),
        'show_in_rest'       => true, // ブロックエディターで使う場合は必要
    );

    register_post_type('product_list_page', $args);
}
add_action('init', 'create_product_list_page_type');

// テーマがアクティベートされたときに実行する
function mytheme_flush_rewrite_rules() {
    // カスタム投稿タイプを先に登録する必要がある
    create_product_list_page_type(); // カスタム投稿タイプの関数を呼び出す
    flush_rewrite_rules(); // パーマリンクを更新
}
add_action('after_switch_theme', 'mytheme_flush_rewrite_rules');
?>