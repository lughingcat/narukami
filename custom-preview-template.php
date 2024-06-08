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
		//$index 		 0,1
		//$key   		 s_cmaker
		//$value 		 [0]=>concept
		//$value[$index] concept
		foreach ($formData['array-num'] as $index) {
			$result = array();
			foreach ($formData as $key => $value) {
				if (is_array($value) && isset($value[$index])) {
					$result[$key] = $value[$index];
				}
				echo '<pre>' . print_r($value[$index], true) . '</pre>';
				if($value[$index] == 'concept'){
					include(get_template_directory() . '/front-inc/front_concept.php');
				}
			}
			$results[] = $result;
		}
		echo '<pre>' . print_r($results, true) . '</pre>';
	} else {
		echo '<p>フォームデータが送信されていません。</p>';
	}
    ?>
    <?php wp_footer(); ?>
</body>
</html>