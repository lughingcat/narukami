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
				$concept_bg_img_url = $value['concept_bg_img_url'];
				echo '<pre>' . print_r($concept_bg_img_url, true) . '</pre>';
			}
		}
		
	} else {
		echo '<p>フォームデータが送信されていません。</p>';
	}
    ?>
    <?php wp_footer(); ?>
</body>
</html>