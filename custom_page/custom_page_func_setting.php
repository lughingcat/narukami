<?php
function create_product_list_page_type() {
    $labels = array(
        'name'               => '商品一覧ページ',
        'singular_name'      => '商品一覧ページ',
        'menu_name'          => '商品一覧ページ',
        'name_admin_bar'     => '商品一覧ページを追加',
        'add_new'            => '新規追加',
        'add_new_item'       => '新しい商品一覧ページを追加',
        'new_item'           => '新しい商品一覧ページ',
        'edit_item'          => '商品一覧ページを編集',
        'view_item'          => '商品一覧ページを見る',
        'all_items'          => '全ての商品一覧ページ',
        'search_items'       => '商品一覧ページを検索',
        'parent_item_colon'  => '親商品一覧ページ:',
        'not_found'          => '商品一覧ページが見つかりません',
        'not_found_in_trash' => 'ゴミ箱に商品一覧ページが見つかりません',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'product-list-page'),
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

?>