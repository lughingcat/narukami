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
$select_contents = isset($_POST['s_cmaker']) ? $_POST['s_cmaker'] : array();
$i_insert_ids = isset($_POST['insert_ids']) ? $_POST['insert_ids'] : array();
//コンセプト
$i_concept_bgImg_url = $_POST['concept_bg_img_url'];
$i_concept_title = $_POST['concept_title'];
$i_concept_content = $_POST['concept_content'];
//グランドメニュー
$i_grandmenu_img_url = json_encode($_POST['grandmenu_img_url'], JSON_UNESCAPED_UNICODE);
$i_grandmenu_title = json_encode( $_POST['grandmenu_title'], JSON_UNESCAPED_UNICODE);
$i_grandmenu_pagelink = json_encode( $_POST['grandmenu_pagelink'], JSON_UNESCAPED_UNICODE);
$i_gm_primary_title = $_POST['gm_primary_title'];
//パララックス
$i_parallax_bg_img_url = json_encode($_POST['parallax_bg_img_url'], JSON_UNESCAPED_UNICODE);
$i_parallax_title = json_encode( $_POST['parallax_title'], JSON_UNESCAPED_UNICODE);
$i_parallax_content = json_encode( $_POST['parallax_content'], JSON_UNESCAPED_UNICODE);
$i_parallax_primary_title = $_POST['parallax_primary_title'];
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
//3カラム
$i_column_3_bgImg_url = $_POST['column_3_bg_img_url'];
$i_column_3_title = $_POST['column_3_title'];
$i_column_3_content = $_POST['column_3_content'];
$i_column_3_sec_bgImg_url = $_POST['column_3_sec_bg_img_url'];
$i_column_3_sec_title = $_POST['column_3_sec_title'];
$i_column_3_sec_content = $_POST['column_3_sec_content'];
$i_column_3_third_bgImg_url = $_POST['column_3_third_bg_img_url'];
$i_column_3_third_title = $_POST['column_3_third_title'];
$i_column_3_third_content = $_POST['column_3_third_content'];
//店舗情報
$i_store_info_title = $_POST['store_info_title'];
$i_store_name = $_POST['store_name'];
$i_store_info_bg_img_url = $_POST['store_info_bg_img_url'];
$i_store_post_number = $_POST['store_post_number'];
$i_store_adress = $_POST['store_adress'];
$i_store_phone_num = $_POST['store_phone_num'];
$i_store_rg_holiday = $_POST['store_rg_holiday'];
//テキストエリア
$i_text_content_bg_color = $_POST['text_content_bg_color'];
$i_text_content_title = $_POST['text_content_title'];
$i_text_content_content = $_POST['text_content_content'];
$i_text_content_title_color = $_POST['text_content_title_color'];
//dbの初期化
$i_delete_iniz = $_POST['delete_iniz'];

//ループ処理で$select_contentの値を振り分けてinsertさせる
global $wpdb;
$tablename =  $wpdb->prefix . "narukami_content_maker";
foreach ($select_contents as $key => $select_content) {
	
	$insert_id = isset($i_insert_ids[$key]) ? $i_insert_ids[$key] : ''; 
	
	if($select_content === 'ranking'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
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
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
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
		)
		);
	}
	if($select_content === 'concept'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//コンセプト
		'concept_bg_img_url' => $i_concept_bgImg_url,
		'concept_title' => $i_concept_title,
		'concept_content' => $i_concept_content,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
		//コンセプト
		'%s',
		'%s',
		'%s',
		)
		);
	}
	if($select_content === 'grandmenu'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//グランドメニュー
		'grandmenu_img_url' => $i_grandmenu_img_url,
		'grandmenu_title' => $i_grandmenu_title,
		'grandmenu_pagelink' => $i_grandmenu_pagelink,
		'gm_primary_title' => $i_gm_primary_title,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
		//グランドメニュー
		'%s',
		'%s',
		'%s',
		'%s',
		)
		);
	}
	
	if($select_content === 'column_right_1'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//右画像１カラム
		'column_right_1_bg_img_url' => $i_column_right_1_img_url,
		'column_right_1_title' => $i_column_right_1_title,
		'column_right_1_content' => $i_column_right_1_content,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
		//右画像１カラム
		'%s',
		'%s',
		'%s',
		)
		);
	}
	
	if($select_content === 'column_left_1'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//左画像１カラム
		'column_left_1_bg_img_url' => $i_column_left_1_img_url,
		'column_left_1_title' => $i_column_left_1_title,
		'column_left_1_content' => $i_column_left_1_content,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
		//左画像１カラム
		'%s',
		'%s',
		'%s',
		)
		);
	}
	
	if($select_content === 'column_2'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//2カラム
		'column_2_bg_img_url' => $i_column_2_bgImg_url,
		'column_2_title' => $i_column_2_title,
		'column_2_content' => $i_column_2_content,
		'column_2_sec_bg_img_url' => $i_column_2_sec_bgImg_url,
		'column_2_sec_title' => $i_column_2_sec_title,
		'column_2_sec_content' => $i_column_2_sec_content,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
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
	}
	
	if($select_content === 'column_3'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//3カラム
		'column_3_bg_img_url' => $i_column_3_bgImg_url,
		'column_3_title' => $i_column_3_title,
		'column_3_content' => $i_column_3_content,
		'column_3_sec_bg_img_url' => $i_column_3_sec_bgImg_url,
		'column_3_sec_title' => $i_column_3_sec_title,
		'column_3_sec_content' => $i_column_3_sec_content,
		'column_3_third_bg_img_url' => $i_column_3_third_bgImg_url,
		'column_3_third_title' => $i_column_3_third_title,
		'column_3_third_content' => $i_column_3_third_content,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
		//3カラム
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		)
		);
	}
	
	if($select_content === 'store_info'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//店舗情報
		'store_info_title' => $i_store_info_title,
		'store_name' => $i_store_name,
		'store_info_bg_img_url' => $i_store_info_bg_img_url,
		'store_post_number' => $i_store_post_number,
		'store_adress' => $i_store_adress,
		'store_phone_num' => $i_store_phone_num,
		'store_rg_holiday' => $i_store_rg_holiday,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
		//店舗情報
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		)
		);
	}
	
	if($select_content === 'text_content'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//テキストエリア
		'text_content_bg_color' => $i_text_content_bg_color,
		'text_content_title' => $i_text_content_title,
		'text_content_content' => $i_text_content_content,
		'text_content_title_color' => $i_text_content_title_color,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
		//テキストエリア
		'%s',
		'%s',
		'%s',
		'%s',
		)
		);
	}
	
	if($select_content === 'parallax'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//パララックス
		'parallax_bg_img_url' => $i_parallax_bg_img_url,
		'parallax_title' => $i_parallax_title,
		'parallax_content' => $i_parallax_content,
		'parallax_primary_title' => $i_parallax_primary_title,
		),
		array(
		//セレクトボックス
		'%s',
		//インサートid
		'%s',
		//パララックス
		'%s',
		'%s',
		'%s',
		'%s',
		)
		);
	}
}//foreachEnd

//$narukamicmkerの初期化
global $wpdb;
$narukamicmker =  $wpdb->prefix . "narukami_content_maker";
//idが1以外のレコードを取得
$records_to_delete = $wpdb->get_results("SELECT * FROM $narukamicmker WHERE id != 1");
if( $i_delete_iniz == "Initialization" ){
foreach ($records_to_delete as $record) {
    $wpdb->delete(
		$narukamicmker, 
		array(
			'id' => $record->id
		), 
		array(
			'%d'
		));
}
}
//update_db
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



