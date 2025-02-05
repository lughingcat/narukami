<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>ヘッダープレビューページ</title>
    <?php wp_head(); ?>
</head>
	<?php
	$narukami_font_family = sanitize_option_value(get_option('narukami-font-family', 'Sawarabi Gothic'));
	?>
	<style>
		body{
			font-family: <?php echo $narukami_font_family; ?>
		}
	</style>
<body style="position: relative;">
	 <?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
        // フォームデータを取得して表示
        $headerformData = $_POST;
		if($headerformData['header-display-setting'] === 'display_on'){
			include(get_template_directory() . '/front-inc-header/inc-header-part.php');
		}
		if($headerformData['heorheader-type'] === 'still_img'){
			include(get_template_directory() . '/front-inc-header/inc-HH-still-img-part.php');
		}elseif($headerformData['heorheader-type'] === 'move'){
			include(get_template_directory() . '/front-inc-header/inc-HH-move-part.php');
		}elseif($headerformData['heorheader-type'] === 'slider'){
			include(get_template_directory() . '/front-inc-header/inc-HH-slider-part.php');
		}
		include(get_template_directory() . '/front-inc-header/inc-globalHeader-part.php');
	}
    ?>
	<?php
	//トップページビルダー
	global $wpdb;
	$content_maker_table = $wpdb->prefix . 'narukami_content_maker';
	$sql_s_cmaker = $wpdb->get_results( 
		"SELECT 
		insert_ids, 
		s_cmaker 
		FROM $content_maker_table 
		LIMIT 18446744073709551615 OFFSET 1",
		ARRAY_A
	);
	//配列を初期化
	$data = [];
	//キーと値で配列化
	foreach ($sql_s_cmaker as $row) {
    $data[$row['insert_ids']] = $row['s_cmaker'];
	}

	//ループ処理
	foreach ($data as $insert_id => $s_cmaker) {
		if($s_cmaker === 'concept'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					concept_title, 
					concept_content,
					concept_bg_img_url
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$concept_title = $row['concept_title'];
			$concept_content = $row['concept_content'];
			$concept_content_nl2br = nl2br($concept_content);
			$concept_bg_img_url = get_optimized_image_url($row['concept_bg_img_url']);
			include(get_template_directory() . '/front-inc/front_concept.php');
		}
		elseif($s_cmaker === 'grandmenu'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					gm_primary_title, 
					grandmenu_img_url,
					grandmenu_title,
					grandmenu_pagelink
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			//json decode
			$gm_title_array = json_decode($row['grandmenu_title'], true);
			$gm_img_array = json_decode($row['grandmenu_img_url'], true);
			$gm_pagelink_array = json_decode($row['grandmenu_pagelink'], true);
			//変数セット
			$insert_ids = $row['insert_ids'];
			$gm_primary_title = $row['gm_primary_title'];
			$grandmenu_img_url = get_optimized_image_url($gm_img_array);
			$grandmenu_title = $gm_title_array;
			$grandmenu_pagelink = $gm_pagelink_array;
			include(get_template_directory() . '/front-inc/front_grandmenu.php');
		}
		elseif($s_cmaker === 'column_right_1'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					column_right_1_bg_img_url, 
					column_right_1_title,
					column_right_1_content
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$column_right_bg_img_url = get_optimized_image_url($row['column_right_1_bg_img_url']);
			$column_right_1_title = $row['column_right_1_title'];
			$column_right_1_content = $row['column_right_1_content'];
			$column_right_1_content_nl2br = nl2br($column_right_1_content);
			include(get_template_directory() . '/front-inc/front_column_right_1.php');
		}
		elseif($s_cmaker === 'column_left_1'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					column_left_1_bg_img_url, 
					column_left_1_title,
					column_left_1_content
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$column_left_bg_img_url = get_optimized_image_url($row['column_left_1_bg_img_url']);
			$column_left_1_title = $row['column_left_1_title'];
			$column_left_1_content = $row['column_left_1_content'];
			$column_left_1_content_nl2br = nl2br($column_left_1_content);
			include(get_template_directory() . '/front-inc/front_column_left_1.php');
		}
		elseif($s_cmaker === 'column_2'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					column_2_bg_img_url, 
					column_2_title,
					column_2_content,
					column_2_sec_bg_img_url,
					column_2_sec_title,
					column_2_sec_content
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$column_two_bg_img_url = get_optimized_image_url($row['column_2_bg_img_url']);
			$column_2_title = $row['column_2_title'];
			$column_2_content = $row['column_2_content'];
			$column_2_content_nl2br = nl2br($column_2_content);
			$column_two_sec_bg_img_url = get_optimized_image_url($row['column_2_sec_bg_img_url']);
			$column_2_sec_title = $row['column_2_sec_title'];
			$column_2_sec_content = $row['column_2_sec_content'];
			$column_2_sec_content_nl2br = nl2br($column_2_sec_content);
			include(get_template_directory() . '/front-inc/front_column2.php');
		}
		elseif($s_cmaker === 'column_3'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					column_3_bg_img_url, 
					column_3_title,
					column_3_content,
					column_3_sec_bg_img_url,
					column_3_sec_title,
					column_3_sec_content,
					column_3_third_bg_img_url,
					column_3_third_title,
					column_3_third_content
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$column_three_bg_img_url = get_optimized_image_url($row['column_3_bg_img_url']);
			$column_3_title = $row['column_3_title'];
			$column_3_content = $row['column_3_content'];
			$column_3_content_nl2br = nl2br($column_3_content);
			$column_three_sec_bg_img_url = get_optimized_image_url($row['column_3_sec_bg_img_url']);
			$column_3_sec_title = $row['column_3_sec_title'];
			$column_3_sec_content = $row['column_3_sec_content'];
			$column_3_sec_content_nl2br = nl2br($column_3_sec_content);
			$column_three_third_bg_img_url = get_optimized_image_url($row['column_3_third_bg_img_url']);
			$column_3_third_title = $row['column_3_third_title'];
			$column_3_third_content = $row['column_3_third_content'];
			$column_3_third_content_nl2br = nl2br($column_3_third_content);
			include(get_template_directory() . '/front-inc/front_column3.php');
		}
		elseif($s_cmaker === 'ranking'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					rank_primary_title, 
					rank_pop,
					rank_style,
					item_img_url,
					item_name,
					item_price,
					item_page_link,
					rank_on,
					item_img_url_2,
					item_name_2,
					item_price_2,
					item_page_link_2,
					rank_on_2,
					item_img_url_3,
					item_name_3,
					item_price_3,
					item_page_link_3,
					rank_on_3,
					item_img_url_4,
					item_name_4,
					item_price_4,
					item_page_link_4,
					rank_on_4,
					item_img_url_5,
					item_name_5,
					item_price_5,
					item_page_link_5,
					rank_on_5,
					item_img_url_6,
					item_name_6,
					item_price_6,
					item_page_link_6,
					rank_on_6
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$rank_primary_title = $row['rank_primary_title'];
			$rank_pop = $row['rank_pop'];
			$rank_style = $row['rank_style'];
			$item_img_url = get_optimized_image_url($row['item_img_url']);
			$item_title = $row['item_name'];
			$item_price = $row['item_price'];
			$item_page_link = $row['item_page_link'];
			$rank_on = $row['rank_on'];
			$item_img_url_2 = get_optimized_image_url($row['item_img_url_2']);
			$item_title_2 = $row['item_name_2'];
			$item_price_2 = $row['item_price_2'];
			$item_page_link_2 = $row['item_page_link_2'];
			$rank_on_2 = $row['rank_on_2'];
			$item_img_url_3 = get_optimized_image_url($row['item_img_url_3']);
			$item_title_3 = $row['item_name_3'];
			$item_price_3 = $row['item_price_3'];
			$item_page_link_3 = $row['item_page_link_3'];
			$rank_on_3 = $row['rank_on_3'];
			$item_img_url_4 = get_optimized_image_url($row['item_img_url_4']);
			$item_title_4 = $row['item_name_4'];
			$item_price_4 = $row['item_price_4'];
			$item_page_link_4 = $row['item_page_link_4'];
			$rank_on_4 = $row['rank_on_4'];
			$item_img_url_5 = get_optimized_image_url($row['item_img_url_5']);
			$item_title_5 = $row['item_name_5'];
			$item_price_5 = $row['item_price_5'];
			$item_page_link_5 = $row['item_page_link_5'];
			$rank_on_5 = $row['rank_on_5'];
			$item_img_url_6 = get_optimized_image_url($row['item_img_url_6']);
			$item_title_6 = $row['item_name_6'];
			$item_price_6 = $row['item_price_6'];
			$item_page_link_6 = $row['item_page_link_6'];
			$rank_on_6 = $row['rank_on_6'];
			include(get_template_directory() . '/front-inc/front_ranking.php');
		}
		elseif($s_cmaker === 'text_content'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					text_content_title, 
					text_content_content
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$text_content_title = $row['text_content_title'];
			$text_content_content = $row['text_content_content'];
			$text_content_content_nl2br = nl2br($text_content_content);
			include(get_template_directory() . '/front-inc/front_text_content.php');
		}
		elseif($s_cmaker === 'store_info'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					store_info_title, 
					store_name,
					store_info_bg_img_url,
					store_post_number,
					store_adress,
					store_phone_num,
					store_rg_holiday
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$store_info_title = $row['store_info_title'];
			$store_name = $row['store_name'];
			$store_info_bg_img_url = $row['store_info_bg_img_url'];
			$store_post_number = $row['store_post_number'];
			$store_adress = $row['store_adress'];
			$store_phone_num = $row['store_phone_num'];
			$store_rg_holiday = $row['store_rg_holiday'];
			include(get_template_directory() . '/front-inc/front_store_info.php');
		}
		elseif($s_cmaker === 'parallax'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					parallax_primary_title, 
					parallax_bg_img_url,
					parallax_title,
					parallax_content
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			//json decode
			$parallax_title_array = json_decode($row['parallax_title'], true);
			$parallax_img_array = json_decode($row['parallax_bg_img_url'], true);
			$parallax_pagecontent_array = json_decode($row['parallax_content'], true);
			$insert_ids = $row['insert_ids'];
			$parallax_primary_title = $row['parallax_primary_title'];
			$parallax_bg_img_url = get_optimized_image_url($parallax_img_array);
			$parallax_title = $parallax_title_array;
			$parallax_content = $parallax_pagecontent_array;
			include(get_template_directory() . '/front-inc/front_parallax.php');
		}
		elseif($s_cmaker === 'code_section'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					code_section 
         			FROM $content_maker_table 
					WHERE insert_ids = %s",
        			$insert_id
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$code_section_value = $row['code_section'];
			include(get_template_directory() . '/front-inc/front_code_section.php');
		}
	}//foreach end scroll-btn-active
	?>
	<?php include(get_template_directory() . '/lib/narukami-footer/narukami_footer.php');?>
    <?php wp_footer(); ?>
</body>
</html>