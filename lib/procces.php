
<?php
require_once( dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
//ランキングpopスタイル
$rank_pop = $_POST['rank_pop'];
//ランキング背景スタイル
$rank_style = $_POST['rank_style'];
//ランキングメインタイトル
$rank_primary_title = $_POST['rank_primary_title'];
//ランキング
//1
$i_title = $_POST['item_title'];
$i_price = $_POST['item_price'];
$i_item_url = $_POST['item_img_url'];
$i_item_page_link = $_POST['item_page_link'];
$i_rank_on = $_POST['rank_on'];
//2
$i_title_2 = $_POST['item_title_2'];
$i_price_2 = $_POST['item_price_2'];
$i_item_url_2 = $_POST['item_img_url_2'];
$i_item_page_link_2 = $_POST['item_page_link_2'];
$i_rank_on_2 = $_POST['rank_on_2'];
//3
$i_title_3 = $_POST['item_title_3'];
$i_price_3 = $_POST['item_price_3'];
$i_item_url_3 = $_POST['item_img_url_3'];
$i_item_page_link_3 = $_POST['item_page_link_3'];
$i_rank_on_3 = $_POST['rank_on_3'];
//4
$i_title_4 = $_POST['item_title_4'];
$i_price_4 = $_POST['item_price_4'];
$i_item_url_4 = $_POST['item_img_url_4'];
$i_item_page_link_4 = $_POST['item_page_link_4'];
$i_rank_on_4 = $_POST['rank_on_4'];
//5
$i_title_5 = $_POST['item_title_5'];
$i_price_5 = $_POST['item_price_5'];
$i_item_url_5 = $_POST['item_img_url_5'];
$i_item_page_link_5 = $_POST['item_page_link_5'];
$i_rank_on_5 = $_POST['rank_on_5'];
//6
$i_title_6 = $_POST['item_title_6'];
$i_price_6 = $_POST['item_price_6'];
$i_item_url_6 = $_POST['item_img_url_6'];
$i_item_page_link_6 = $_POST['item_page_link_6'];
$i_rank_on_6 = $_POST['rank_on_6'];
//セレクトボックス
$select_content = $_POST['s_cmaker'];
//スライダー
$i_concept_bgImg_url = $_POST['concept_bg_img_url'];
$i_concept_title = $_POST['concept_title'];
$i_concept_content = $_POST['concept_content'];
//グランドメニュー
$i_grandmenu_img_url = json_encode($_POST['grandmenu_img_url'], JSON_UNESCAPED_UNICODE);
$i_grandmenu_title = json_encode( $_POST['grandmenu_title'], JSON_UNESCAPED_UNICODE);
$i_grandmenu_pagelink = json_encode( $_POST['grandmenu_pagelink'], JSON_UNESCAPED_UNICODE);
$i_gm_primary_title = $_POST['gm_primary_title'];
//右画像１カラム
$i_column_right_1_img_url = $_POST['column_right_1_bg_img_url'];
$i_column_right_1_title = $_POST['column_right_1_title'];
$i_column_right_1_content = $_POST['column_right_1_content'];
//左画像１カラム
$i_column_left_1_img_url = $_POST['column_left_1_bg_img_url'];
$i_column_left_1_title = $_POST['column_left_1_title'];
$i_column_left_1_content = $_POST['column_left_1_content'];
//2カラム
$i_column_2_bgImg_url = $_POST['column_2_bg_img_url'];
$i_column_2_title = $_POST['column_2_title'];
$i_column_2_content = $_POST['column_2_content'];
$i_column_2_sec_bgImg_url = $_POST['column_2_sec_bg_img_url'];
$i_column_2_sec_title = $_POST['column_2_sec_title'];
$i_column_2_sec_content = $_POST['column_2_sec_content'];
global $wpdb;
	$tablename =  $wpdb->prefix . "narukami_content_maker";
	// 各種データの保存
	$wpdb->insert(
		$tablename,
		array(
			//ランキングpopスタイル
		    'rank_pop' => $rank_pop,
			//ランキング背景スタイル
			'rank_style' => $rank_style,
			//ランキングメインタイトル
			'rank_primary_title' => $rank_primary_title,
			//ランキング
			'item_name' => $i_title,
			'item_price' => $i_price,
			'item_img_url' => $i_item_url,
			'item_page_link' => $i_item_page_link,
			'rank_on' => $i_rank_on,
			//2
			'item_name_2' => $i_title_2,
			'item_price_2' => $i_price_2,
			'item_img_url_2' => $i_item_url_2,
			'item_page_link_2' => $i_item_page_link_2,
			'rank_on_2' => $i_rank_on_2,
			//3
			'item_name_3' => $i_title_3,
			'item_price_3' => $i_price_3,
			'item_img_url_3' => $i_item_url_3,
			'item_page_link_3' => $i_item_page_link_3,
			'rank_on_3' => $i_rank_on_3,
			//4
			'item_name_4' => $i_title_4,
			'item_price_4' => $i_price_4,
			'item_img_url_4' => $i_item_url_4,
			'item_page_link_4' => $i_item_page_link_4,
			'rank_on_4' => $i_rank_on_4,
			//5
			'item_name_5' => $i_title_5,
			'item_price_5' => $i_price_5,
			'item_img_url_5' => $i_item_url_5,
			'item_page_link_5' => $i_item_page_link_5,
			'rank_on_5' => $i_rank_on_5,
			//6
			'item_name_6' => $i_title_6,
			'item_price_6' => $i_price_6,
			'item_img_url_6' => $i_item_url_6,
			'item_page_link_6' => $i_item_page_link_6,
			'rank_on_6' => $i_rank_on_6,
			//セレクトボックス
			's_cmaker' => $select_content,
			//スライダー
			'concept_bg_img_url' => $i_concept_bgImg_url,
			'concept_title' => $i_concept_title,
			'concept_content' => $i_concept_content,
			//グランドメニュー
			'grandmenu_img_url' => $i_grandmenu_img_url,
			'grandmenu_title' => $i_grandmenu_title,
			'grandmenu_pagelink' => $i_grandmenu_pagelink,
			'gm_primary_title' => $i_gm_primary_title,
			//右画像１カラム
			'column_right_1_bg_img_url' => $i_column_right_1_img_url,
			'column_right_1_title' => $i_column_right_1_title,
			'column_right_1_content' => $i_column_right_1_content,
			//左画像１カラム
			'column_left_1_bg_img_url' => $i_column_left_1_img_url,
			'column_left_1_title' => $i_column_left_1_title,
			'column_left_1_content' => $i_column_left_1_content,
			//2カラム
			'column_2_bg_img_url' => $i_column_2_bgImg_url,
			'column_2_title' => $i_column_2_title,
			'column_2_content' => $i_column_2_content,
			'column_2_sec_bg_img_url' => $i_column_2_sec_bgImg_url,
			'column_2_sec_title' => $i_column_2_sec_title,
			'column_2_sec_content' => $i_column_2_sec_content,
		),
		array(
		//ランキングpopスタイル
			'%s',
		//ランキング背景スタイル
			'%s',
		//ランキングメインタイトル
			'%s',
		//ランキング
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		//2
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		//3
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		//4
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		//5
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		//6
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		//セレクトボックス
			'%s',
		//スライダー
			'%s',
			'%s',
			'%s',
		//グランドメニュー
			'%s',
			'%s',
			'%s',
			'%s',
		//右画像１カラム
			'%s',
			'%s',
			'%s',
		//左画像１カラム
			'%s',
			'%s',
			'%s',
		//2カラム
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		)
	);


global $wpdb;
$narukamicmker =  $wpdb->prefix . "narukami_content_maker";
if( $i_rank_on == "rank_not_show_1" ){
$wpdb->update(
    $narukamicmker,
    array(
        'item_name' => null,
		'item_price'=> null,
		'item_img_url'=> null,
		'item_page_link' => null,
		'rank_on' => null
    ),
	array(
		'id' => $id
	),
    array(
        '%d',
        '%s',
        '%d',
        '%d',
        '%d',
    )
);
}

if( $i_rank_on_2 == "rank_not_show_2" ){
$wpdb->update(
    $narukamicmker,
    array(
        'item_name_2' => null,
		'item_price_2'=> null,
		'item_img_url_2'=> null,
		'item_page_link_2' => null,
		'rank_on_2' => null
    ),
	array(
		'id' => $id
	),
    array(
        '%d',
        '%s',
        '%d',
        '%d',
        '%d',
    )
);
}

if( $i_rank_on_3 == "rank_not_show_3" ){
$wpdb->update(
    $narukamicmker,
    array(
        'item_name_3' => null,
		'item_price_3'=> null,
		'item_img_url_3'=> null,
		'item_page_link_3' => null,
		'rank_on_3' => null
    ),
	array(
		'id' => $id
	),
    array(
        '%d',
        '%s',
        '%d',
        '%d',
        '%d',
    )
);
}

if( $i_rank_on_4 == "rank_not_show_4" ){
$wpdb->update(
    $narukamicmker,
    array(
        'item_name_4' => null,
		'item_price_4'=> null,
		'item_img_url_4'=> null,
		'item_page_link_4' => null,
		'rank_on_4' => null
    ),
	array(
		'id' => $id
	),
    array(
        '%d',
        '%s',
        '%d',
        '%d',
        '%d',
    )
);
}

if( $i_rank_on_5 == "rank_not_show_5" ){
$wpdb->update(
    $narukamicmker,
    array(
        'item_name_5' => null,
		'item_price_5'=> null,
		'item_img_url_5'=> null,
		'item_page_link_5' => null,
		'rank_on_5' => null
    ),
	array(
		'id' => $id
	),
    array(
        '%d',
        '%s',
        '%d',
        '%d',
        '%d',
    )
);
}

if( $i_rank_on_6 == "rank_not_show_6" ){
$wpdb->update(
    $narukamicmker,
    array(
        'item_name_6' => null,
		'item_price_6'=> null,
		'item_img_url_6'=> null,
		'item_page_link_6' => null,
		'rank_on_6' => null
    ),
	array(
		'id' => $id
	),
    array(
        '%d',
        '%s',
        '%d',
        '%d',
        '%d',
    )
);
}



