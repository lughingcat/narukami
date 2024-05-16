<?php
require_once( dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
//ランキングpopスタイル
$rank_pop = isset($_POST['rank_pop']) ? $_POST['rank_pop'] : array();
//ランキング背景スタイル
$rank_style = isset($_POST['rank_style']) ? $_POST['rank_style'] : array();
//ランキングメインタイトル
$rank_primary_title = isset($_POST['rank_primary_title']) ? $_POST['rank_primary_title'] : array();
//ランキング
//1
$i_title = isset($_POST['item_title']) ? $_POST['item_title'] : array();
$i_price = isset($_POST['item_price']) ? $_POST['item_price'] : array();
$i_item_url = isset($_POST['item_img_url']) ? $_POST['item_img_url'] : array();
$i_item_page_link = isset($_POST['item_page_link']) ? $_POST['item_page_link'] : array();
$i_rank_on = isset($_POST['rank_on']) ? $_POST['rank_on'] : array();
//2
$i_title_2 = isset($_POST['item_title_2']) ? $_POST['item_title_2'] : array();
$i_price_2 = isset($_POST['item_price_2']) ? $_POST['item_price_2'] : array();
$i_item_url_2 = isset($_POST['item_img_url_2']) ? $_POST['item_img_url_2'] : array();
$i_item_page_link_2 = isset($_POST['item_page_link_2']) ? $_POST['item_page_link_2'] : array();
$i_rank_on_2 = isset($_POST['rank_on_2']) ? $_POST['rank_on_2'] : array();
//3
$i_title_3 = isset($_POST['item_title_3']) ? $_POST['item_title_3'] : array();
$i_price_3 = isset($_POST['item_price_3']) ? $_POST['item_price_3'] : array();
$i_item_url_3 = isset($_POST['item_img_url_3']) ? $_POST['item_img_url_3'] : array();
$i_item_page_link_3 = isset($_POST['item_page_link_3']) ? $_POST['item_page_link_3'] : array();
$i_rank_on_3 = isset($_POST['rank_on_3']) ? $_POST['rank_on_3'] : array();
//4
$i_title_4 = isset($_POST['item_title_4']) ? $_POST['item_title_4'] : array();
$i_price_4 = isset($_POST['item_price_4']) ? $_POST['item_price_4'] : array();
$i_item_url_4 = isset($_POST['item_img_url_4']) ? $_POST['item_img_url_4'] : array();
$i_item_page_link_4 = isset($_POST['item_page_link_4']) ? $_POST['item_page_link_4'] : array();
$i_rank_on_4 = isset($_POST['rank_on_4']) ? $_POST['rank_on_4'] : array();
//5
$i_title_5 = isset($_POST['item_title_5']) ? $_POST['item_title_5'] : array();
$i_price_5 = isset($_POST['item_price_5']) ? $_POST['item_price_5'] : array();
$i_item_url_5 = isset($_POST['item_img_url_5']) ? $_POST['item_img_url_5']: array();
$i_item_page_link_5 = isset($_POST['item_page_link_5']) ? $_POST['item_page_link_5']: array();
$i_rank_on_5 = isset($_POST['rank_on_5']) ? $_POST['rank_on_5']: array();
//6
$i_title_6 = isset($_POST['item_title_6']) ? $_POST['item_title_6']: array();
$i_price_6 = isset($_POST['item_price_6']) ? $_POST['item_price_6']: array();
$i_item_url_6 = isset($_POST['item_img_url_6']) ? $_POST['item_img_url_6']: array();
$i_item_page_link_6 = isset($_POST['item_page_link_6']) ? $_POST['item_page_link_6']: array();
$i_rank_on_6 = isset($_POST['rank_on_6']) ? $_POST['rank_on_6']: array();
//セレクトボックス
$select_contents = isset($_POST['s_cmaker']) ? $_POST['s_cmaker'] : array();
$i_insert_ids = isset($_POST['insert_ids']) ? $_POST['insert_ids'] : array();
//コンセプト
$i_concept_bgImg_url = isset($_POST['concept_bg_img_url']) ? $_POST['concept_bg_img_url'] : array();
$i_concept_title = isset($_POST['concept_title']) ? $_POST['concept_title'] : array();
$i_concept_content = isset($_POST['concept_content']) ? $_POST['concept_content'] : array();
//グランドメニュー
$i_grandmenu_img_url = isset($_POST['grandmenu_img_url']) ? $_POST['grandmenu_img_url'] : array();
$i_grandmenu_title = isset($_POST['grandmenu_title']) ? $_POST['grandmenu_title'] : array();
$i_grandmenu_pagelink = isset($_POST['grandmenu_pagelink']) ? $_POST['grandmenu_pagelink'] : array();
$i_gm_primary_title = isset($_POST['gm_primary_title']) ? $_POST['gm_primary_title'] : array();
//パララックス
$i_parallax_bg_img_url = json_encode($_POST['parallax_bg_img_url'], JSON_UNESCAPED_UNICODE);
$i_parallax_title = json_encode( $_POST['parallax_title'], JSON_UNESCAPED_UNICODE);
$i_parallax_content = json_encode( $_POST['parallax_content'], JSON_UNESCAPED_UNICODE);
$i_parallax_primary_title = $_POST['parallax_primary_title'];
//右画像１カラム
$i_column_right_1_img_url = isset($_POST['column_right_1_bg_img_url']) ? $_POST['column_right_1_bg_img_url'] : array();
$i_column_right_1_title = isset($_POST['column_right_1_title']) ? $_POST['column_right_1_title'] : array();
$i_column_right_1_content = isset($_POST['column_right_1_content']) ? $_POST['column_right_1_content'] : array();
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
	//ランキングpopスタイル
	$rank_pop_roop = isset($rank_pop[$key]) ? $rank_pop[$key] : ''; 
	var_dump($rank_pop_roop);
	//ランキング背景スタイル
	$rank_style_roop = isset($rank_style[$key]) ? $rank_style[$key] : ''; 
	//ランキングメインタイトル
	$rank_primary_title_roop = isset($rank_primary_title[$key]) ? $rank_primary_title[$key] : '';
	//1
	$i_title_roop = isset($i_title[$key]) ? $i_title[$key] : '';
	$i_price_roop = isset($i_price[$key]) ? $i_price[$key] : '';
	$i_item_url_roop = isset($i_item_url[$key]) ? $i_item_url[$key] : '';
	$i_item_page_link_roop = isset($i_item_page_link[$key]) ? $i_item_page_link[$key] : '';
	$i_rank_on_roop = isset($i_rank_on[$key]) ? $i_rank_on[$key] : '';
	//2
	$i_title_2_roop = isset($i_title_2[$key]) ? $i_title_2[$key] : '';
	$i_price_2_roop = isset($i_price_2[$key]) ? $i_price_2[$key] : '';
	$i_item_url_2_roop = isset($i_item_url_2[$key]) ? $i_item_url_2[$key] : '';
	$i_item_page_link_2_roop = isset($i_item_page_link_2[$key]) ? $i_item_page_link_2[$key] : '';
	$i_rank_on_2_roop = isset($i_rank_on_2[$key]) ? $i_rank_on_2[$key] : '';
	//3
	$i_title_3_roop = isset($i_title_3[$key]) ? $i_title_3[$key] : '';
	$i_price_3_roop = isset($i_price_3[$key]) ? $i_price_3[$key] : '';
	$i_item_url_3_roop = isset($i_item_url_3[$key]) ? $i_item_url_3[$key] : '';
	$i_item_page_link_3_roop = isset($i_item_page_link_3[$key]) ? $i_item_page_link_3[$key] : '';
	$i_rank_on_3_roop = isset($i_rank_on_3[$key]) ? $i_rank_on_3[$key] : '';
	//4
	$i_title_4_roop = isset($i_title_4[$key]) ? $i_title_4[$key] : '';
	$i_price_4_roop = isset($i_price_4[$key]) ? $i_price_4[$key] : '';
	$i_item_url_4_roop = isset($i_item_url_4[$key]) ? $i_item_url_4[$key] : '';
	$i_item_page_link_4_roop = isset($i_item_page_link_4[$key]) ? $i_item_page_link_4[$key] : '';
	$i_rank_on_4_roop = isset($i_rank_on_4[$key]) ? $i_rank_on_4[$key] : '';
	//5
	$i_title_5_roop = isset($i_title_5[$key]) ? $i_title_5[$key] : '';
	$i_price_5_roop = isset($i_price_5[$key]) ? $i_price_5[$key] : '';
	$i_item_url_5_roop = isset($i_item_url_5[$key]) ? $i_item_url_5[$key] : '';
	$i_item_page_link_5_roop = isset($i_item_page_link_5[$key]) ? $i_item_page_link_5[$key] : '';
	$i_rank_on_5_roop = isset($i_rank_on_5[$key]) ? $i_rank_on_5[$key] : '';
	//5
	$i_title_6_roop = isset($i_title_6[$key]) ? $i_title_6[$key] : '';
	$i_price_6_roop = isset($i_price_6[$key]) ? $i_price_6[$key] : '';
	$i_item_url_6_roop = isset($i_item_url_6[$key]) ? $i_item_url_6[$key] : '';
	$i_item_page_link_6_roop = isset($i_item_page_link_6[$key]) ? $i_item_page_link_6[$key] : '';
	$i_rank_on_6_roop = isset($i_rank_on_6[$key]) ? $i_rank_on_6[$key] : '';
	
	//コンセプト
	$concept_bg_img_url_roop = isset($i_concept_bgImg_url[$key]) ? $i_concept_bgImg_url[$key] : ''; 
	$concept_title_roop = isset($i_concept_title[$key]) ? $i_concept_title[$key] : ''; 
	$concept_content_roop = isset($i_concept_content[$key]) ? $i_concept_content[$key] : '';
	
	//右画像背景1カラム
	$column_right_1_img_url_roop = isset($i_column_right_1_img_url[$key]) ? $i_column_right_1_img_url[$key] : '';
	$column_right_1_title_roop = isset($i_column_right_1_title[$key]) ? $i_column_right_1_title[$key] : '';
	$column_right_1_content_roop = isset($i_column_right_1_content[$key]) ? $i_column_right_1_content[$key] : '';
	
	//グランドメニュー
	$grandmenu_img_url_roop = isset($i_grandmenu_img_url[$key]) ? $i_grandmenu_img_url[$key] : '';
	$grandmenu_img_url_roop_json = json_encode( $grandmenu_img_url_roop, JSON_UNESCAPED_UNICODE);
	
	$grandmenu_title_roop = isset($i_grandmenu_title[$key]) ? $i_grandmenu_title[$key] : '';
	$grandmenu_title_roop_json = json_encode( $grandmenu_title_roop, JSON_UNESCAPED_UNICODE);
		
	$grandmenu_pagelink_roop = isset($i_grandmenu_pagelink[$key]) ? $i_grandmenu_pagelink[$key] : '';
	$grandmenu_pagelink_roop_json = json_encode( $grandmenu_pagelink_roop, JSON_UNESCAPED_UNICODE);
	
	$gm_primary_title_roop = isset($i_gm_primary_title[$key]) ? $i_gm_primary_title[$key] : '';
	
	if($select_content === 'ranking'){
	$wpdb->insert(
		$tablename,
		array(
		//セレクトボックス
		's_cmaker' => $select_content,
		//インサートid
		'insert_ids' => $insert_id,
		//ランキングpopスタイル
		'rank_pop' => $rank_pop_roop,
		//ランキング背景スタイル
		'rank_style' => $rank_style_roop,
		//ランキングメインタイトル
		'rank_primary_title' => $rank_primary_title_roop,
		//ランキング
		'item_name' => $i_title_roop,
		'item_price' => $i_price_roop,
		'item_img_url' => $i_item_url_roop,
		'item_page_link' => $i_item_page_link_roop,
		'rank_on' => $i_rank_on_roop,
		//2
		'item_name_2' => $i_title_2_roop,
		'item_price_2' => $i_price_2_roop,
		'item_img_url_2' => $i_item_url_2_roop,
		'item_page_link_2' => $i_item_page_link_2_roop,
		'rank_on_2' => $i_rank_on_2_roop,
		//3
		'item_name_3' => $i_title_3_roop,
		'item_price_3' => $i_price_3_roop,
		'item_img_url_3' => $i_item_url_3_roop,
		'item_page_link_3' => $i_item_page_link_3_roop,
		'rank_on_3' => $i_rank_on_3_roop,
		//4
		'item_name_4' => $i_title_4_roop,
		'item_price_4' => $i_price_4_roop,
		'item_img_url_4' => $i_item_url_4_roop,
		'item_page_link_4' => $i_item_page_link_4_roop,
		'rank_on_4' => $i_rank_on_4_roop,
		//5
		'item_name_5' => $i_title_5_roop,
		'item_price_5' => $i_price_5_roop,
		'item_img_url_5' => $i_item_url_5_roop,
		'item_page_link_5' => $i_item_page_link_5_roop,
		'rank_on_5' => $i_rank_on_5_roop,
		//6
		'item_name_6' => $i_title_6_roop,
		'item_price_6' => $i_price_6_roop,
		'item_img_url_6' => $i_item_url_6_roop,
		'item_page_link_6' => $i_item_page_link_6_roop,
		'rank_on_6' => $i_rank_on_6_roop,
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
		'concept_bg_img_url' => $concept_bg_img_url_roop,
		'concept_title' => $concept_title_roop,
		'concept_content' => $concept_content_roop,
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
		'grandmenu_img_url' => $grandmenu_img_url_roop_json,
		'grandmenu_title' => $grandmenu_title_roop_json,
		'grandmenu_pagelink' => $grandmenu_pagelink_roop_json,
		'gm_primary_title' => $gm_primary_title_roop,
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
		'column_right_1_bg_img_url' => $column_right_1_img_url_roop,
		'column_right_1_title' => $column_right_1_title_roop,
		'column_right_1_content' => $column_right_1_content_roop,
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



