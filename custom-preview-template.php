<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>トップページビルダープレビューページ</title>
    <?php wp_head(); ?>
</head>
	<?php
	$narukami_font_family = sanitize_option_value(get_option('narukami-font-family', 'Sawarabi Gothic'));
	?>
	<style>
		body{
			font-family: <?php echo $narukami_font_family; ?>;
		}
	</style>
<body style="position: relative;">
    <?php
	//ヘッダー,ヒーローヘッダー,グローバルメニュー読み込み
	$i_header_display_setting = sanitize_text_field(get_option('header-disp-set', 'display_on'));//ヘッダー表示設定
	$i_heorheader_type = sanitize_option_value(get_option('heorheader_type', 'still_img'));//ヒーローヘッダータイプ
	if($i_header_display_setting === 'display_on'){
			include(get_template_directory() . '/TOP_PAGE_FILES/top_header_part.php');
		}
		if($i_heorheader_type === 'still_img'){
			include(get_template_directory() . '/TOP_PAGE_FILES/top_still_img_part.php');
		}elseif($i_heorheader_type === 'move'){
			include(get_template_directory() . '/TOP_PAGE_FILES/top_move_part.php');
		}elseif($i_heorheader_type === 'slider'){
			include(get_template_directory() . '/TOP_PAGE_FILES/top_slider_part.php');
		}
		include(get_template_directory() . '/TOP_PAGE_FILES/top_globalheader_part.php');
	?>
	<?php
	//トップページメーカーPOST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       // フォームデータを取得して表示
       $formData = $_POST;
		//配列を初期化
	   $results = array();
		if (isset($formData['array-num']) && is_array($formData['array-num'])) {
			foreach ($formData['array-num'] as $index) {
				$result = array();
				foreach ($formData as $key => $value) {
					// $value が配列であり、該当インデックスが存在する場合のみ追加
					if (is_array($value) && isset($value[$index])) {
						$result[$key] = $value[$index];
					}
				}
				$results[] = $result; // 生成した結果を結果配列に追加
			}
		}
	foreach($results as $key=> $value){
		if($value['array-num'] == $key && $value['s_cmaker'] === 'concept'){
			$insert_ids = $value['insert_ids'];
			$concept_title = $value['concept_title'];
			$concept_content = $value['concept_content'];
			$concept_content_nl2br = nl2br($concept_content);
			$concept_bg_img_url = $value['concept_bg_img_url'];
			include(get_template_directory() . '/front-inc/front_concept.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'grandmenu'){
			$insert_ids = $value['insert_ids'];
			$gm_primary_title = $value['gm_primary_title'];
			$grandmenu_img_url = $value['grandmenu_img_url'];
			$grandmenu_title = $value['grandmenu_title'];
			$grandmenu_pagelink = $value['grandmenu_pagelink'];
			include(get_template_directory() . '/front-inc/front_grandmenu.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'column_right_1'){
			$insert_ids = $value['insert_ids'];
			$column_right_bg_img_url = $value['column_right_bg_img_url'];
			$column_right_1_title = $value['column_right_1_title'];
			$column_right_1_content = $value['column_right_1_content'];
			$column_right_1_content_nl2br = nl2br($column_right_1_content);
			include(get_template_directory() . '/front-inc/front_column_right_1.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'column_left_1'){
			$insert_ids = $value['insert_ids'];
			$column_left_bg_img_url = $value['column_left_bg_img_url'];
			$column_left_1_title = $value['column_left_1_title'];
			$column_left_1_content = $value['column_left_1_content'];
			$column_left_1_content_nl2br = nl2br($column_left_1_content);
			include(get_template_directory() . '/front-inc/front_column_left_1.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'column_2'){
			$insert_ids = $value['insert_ids'];
			$column_two_bg_img_url = $value['column_two_bg_img_url'];
			$column_2_title = $value['column_2_title'];
			$column_2_content = $value['column_2_content'];
			$column_2_content_nl2br = nl2br($column_2_content);
			$column_two_sec_bg_img_url = $value['column_two_sec_bg_img_url'];
			$column_2_sec_title = $value['column_2_sec_title'];
			$column_2_sec_content = $value['column_2_sec_content'];
			$column_2_sec_content_nl2br = nl2br($column_2_sec_content);
			include(get_template_directory() . '/front-inc/front_column2.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'column_3'){
			$insert_ids = $value['insert_ids'];
			$column_three_bg_img_url = $value['column_three_bg_img_url'];
			$column_3_title = $value['column_3_title'];
			$column_3_content = $value['column_3_content'];
			$column_3_content_nl2br = nl2br($column_3_content);
			$column_three_sec_bg_img_url = $value['column_three_sec_bg_img_url'];
			$column_3_sec_title = $value['column_3_sec_title'];
			$column_3_sec_content = $value['column_3_sec_content'];
			$column_3_sec_content_nl2br = nl2br($column_3_sec_content);
			$column_three_third_bg_img_url = $value['column_three_third_bg_img_url'];
			$column_3_third_title = $value['column_3_third_title'];
			$column_3_third_content = $value['column_3_third_content'];
			$column_3_third_content_nl2br = nl2br($column_3_third_content);
			include(get_template_directory() . '/front-inc/front_column3.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'ranking'){
			$insert_ids = $value['insert_ids'];
			$rank_primary_title = $value['rank_primary_title'];
			$rank_pop = $value['rank_pop'];
			$rank_style = $value['rank_style'];
			$item_img_url = $value['item_img_url'];
			$item_title = $value['item_title'];
			$item_price = $value['item_price'];
			$item_page_link = $value['item_page_link'];
			$rank_on = $value['rank_on'];
			$item_img_url_2 = $value['item_img_url_2'];
			$item_title_2 = $value['item_title_2'];
			$item_price_2 = $value['item_price_2'];
			$item_page_link_2 = $value['item_page_link_2'];
			$rank_on_2 = $value['rank_on_2'];
			$item_img_url_3 = $value['item_img_url_3'];
			$item_title_3 = $value['item_title_3'];
			$item_price_3 = $value['item_price_3'];
			$item_page_link_3 = $value['item_page_link_3'];
			$rank_on_3 = $value['rank_on_3'];
			$item_img_url_4 = $value['item_img_url_4'];
			$item_title_4 = $value['item_title_4'];
			$item_price_4 = $value['item_price_4'];
			$item_page_link_4 = $value['item_page_link_4'];
			$rank_on_4 = $value['rank_on_4'];
			$item_img_url_5 = $value['item_img_url_5'];
			$item_title_5 = $value['item_title_5'];
			$item_price_5 = $value['item_price_5'];
			$item_page_link_5 = $value['item_page_link_5'];
			$rank_on_5 = $value['rank_on_5'];
			$item_img_url_6 = $value['item_img_url_6'];
			$item_title_6 = $value['item_title_6'];
			$item_price_6 = $value['item_price_6'];
			$item_page_link_6 = $value['item_page_link_6'];
			$rank_on_6 = $value['rank_on_6'];
			include(get_template_directory() . '/front-inc/front_ranking.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'text_content'){
			$insert_ids = $value['insert_ids'];
			$text_content_title = $value['text_content_title'];
			$text_content_content = $value['text_content_content'];
			$text_content_content_nl2br = nl2br($text_content_content);
			include(get_template_directory() . '/front-inc/front_text_content.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'store_info'){
			$insert_ids = $value['insert_ids'];
			$store_info_title = $value['store_info_title'];
			$store_name = $value['store_name'];
			$store_info_bg_img_url = $value['store_info_bg_img_url'];
			$store_post_number = $value['store_post_number'];
			$store_adress = $value['store_adress'];
			$store_phone_num = $value['store_phone_num'];
			$store_rg_holiday = $value['store_rg_holiday'];
			include(get_template_directory() . '/front-inc/front_store_info.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'parallax'){
			$insert_ids = $value['insert_ids'];
			$parallax_primary_title = $value['parallax_primary_title'];
			$parallax_bg_img_url = $value['parallax_bg_img_url'];
			$parallax_title = $value['parallax_title'];
			$parallax_content = $value['parallax_content'];
			include(get_template_directory() . '/front-inc/front_parallax.php');
		}
		if($value['array-num'] == $key && $value['s_cmaker'] === 'code_section'){
			$insert_ids = $value['insert_ids'];
			$code_section_value = $value['code_section_code'];
			include(get_template_directory() . '/front-inc/front_code_section.php');
		}
	}//foreach end
		
	} else {
		echo '<p>フォームデータが送信されていません。</p>';
	}
    ?>
	<?php 
	//フッター読み込み
	include(get_template_directory() . '/lib/narukami-footer/narukami_footer.php');
	?>
    <?php wp_footer(); ?>
</body>
</html>