<?php
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

//ランキングpopスタイル
$rank_pop_roop = isset($rank_pop[$key]) ? $rank_pop[$key] : ''; 
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

