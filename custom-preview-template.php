<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>トップページビルダープレビュー</title>
    <?php wp_head(); ?>
</head>
<body>
    <h1>NARUKAMI-TOP-PAGE-PREVIEW</h1>
	 <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // フォームデータを取得して表示
        $formData = $_POST;
		foreach ($formData['array-num'] as $index) {
			$result = array();
			foreach ($formData as $key => $value) {
				if (is_array($value) && isset($value[$index])) {
					$result[$key] = $value[$index];
				}
			}
			$results[] = $result;
		}
		echo '<pre>' . print_r($results, true) . '</pre>';
		foreach($results as $key=> $value){
			if($value['array-num'] == $key && $value['s_cmaker'] === 'concept'){
				$insert_ids = $value['insert_ids'];
				$concept_title = $value['concept_title'];
				$concept_content = $value['concept_content'];
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
				include(get_template_directory() . '/front-inc/front_column_right_1.php');
			}
			if($value['array-num'] == $key && $value['s_cmaker'] === 'column_left_1'){
				$insert_ids = $value['insert_ids'];
				$column_left_bg_img_url = $value['column_left_bg_img_url'];
				$column_left_1_title = $value['column_left_1_title'];
				$column_left_1_content = $value['column_left_1_content'];
				include(get_template_directory() . '/front-inc/front_column_left_1.php');
			}
			if($value['array-num'] == $key && $value['s_cmaker'] === 'column_2'){
				$insert_ids = $value['insert_ids'];
				$column_two_bg_img_url = $value['column_two_bg_img_url'];
				$column_2_title = $value['column_2_title'];
				$column_2_content = $value['column_2_content'];
				$column_two_sec_bg_img_url = $value['column_two_sec_bg_img_url'];
				$column_2_sec_title = $value['column_2_sec_title'];
				$column_2_sec_content = $value['column_2_sec_content'];
				include(get_template_directory() . '/front-inc/front_column2.php');
			}
			if($value['array-num'] == $key && $value['s_cmaker'] === 'column_3'){
				$insert_ids = $value['insert_ids'];
				$column_three_bg_img_url = $value['column_three_bg_img_url'];
				$column_3_title = $value['column_3_title'];
				$column_3_content = $value['column_3_content'];
				$column_three_sec_bg_img_url = $value['column_three_sec_bg_img_url'];
				$column_3_sec_title = $value['column_3_sec_title'];
				$column_3_sec_content = $value['column_3_sec_content'];
				$column_three_third_bg_img_url = $value['column_three_third_bg_img_url'];
				$column_3_third_title = $value['column_3_third_title'];
				$column_3_third_content = $value['column_3_third_content'];
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
		}
		
	} else {
		echo '<p>フォームデータが送信されていません。</p>';
	}
    ?>
    <?php wp_footer(); ?>
</body>
</html>