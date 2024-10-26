<?php
function create_product_list_page_type() {
    $labels = array(
        'name'               => '商品リストページ',
        'singular_name'      => '商品リストページ',
        'menu_name'          => '商品リストページ',
        'name_admin_bar'     => '商品リストページを追加',
        'add_new'            => '新規追加',
        'add_new_item'       => '新しい商品リストページを追加',
        'new_item'           => '新しい商品リストページ',
        'edit_item'          => '商品リストページを編集',
        'view_item'          => '商品リストページを見る',
        'all_items'          => '全ての商品リストページ',
        'search_items'       => '商品リストページを検索',
        'parent_item_colon'  => '親商品リストページ:',
        'not_found'          => '商品リストページが見つかりません',
        'not_found_in_trash' => 'ゴミ箱に商品リストページが見つかりません',
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