<?php
function create_product_item_page_type() {
    $labels = array(
        'name'               => '商品紹介ページ',
        'singular_name'      => '商品紹介ページ',
        'menu_name'          => '商品紹介ページ',
        'name_admin_bar'     => '商品紹介ページを追加',
        'add_new'            => '新規追加',
        'add_new_item'       => '新しい商品紹介ページを追加',
        'new_item'           => '新しい商品紹介ページ',
        'edit_item'          => '商品紹介ページを編集',
        'view_item'          => '商品紹介ページを見る',
        'all_items'          => '全ての商品紹介ページ',
        'search_items'       => '商品紹介ページを検索',
        'parent_item_colon'  => '親商品紹介ページ:',
        'not_found'          => '商品紹介ページが見つかりません',
        'not_found_in_trash' => 'ゴミ箱に商品紹介ページが見つかりません',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'product_item_page'),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'),
        'show_in_rest'       => true, // ブロックエディターで使う場合は必要
    );

    register_post_type('product_item_page', $args);
}
add_action('init', 'create_product_item_page_type');

// テーマがアクティベートされたときに実行する
function narukami_itemone_flush_rewrite_rules() {
    // カスタム投稿タイプを先に登録する必要がある
    create_product_item_page_type(); // カスタム投稿タイプの関数を呼び出す
    flush_rewrite_rules(); // パーマリンクを更新
}
add_action('after_switch_theme', 'narukami_itemone_flush_rewrite_rules');
?>