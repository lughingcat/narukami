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
				
		}
		
	} else {
		echo '<p>フォームデータが送信されていません。</p>';
	}
    ?>
    <?php wp_footer(); ?>
</body>
</html>