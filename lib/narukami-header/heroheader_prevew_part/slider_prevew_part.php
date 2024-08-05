<?php
	$slider_img_link = array(
		'https://nousondiner.com/wp-content/uploads/2024/07/beef.jpg',
		'https://nousondiner.com/wp-content/uploads/2024/07/salmon.jpg',
		'https://nousondiner.com/wp-content/uploads/2024/07/unadon.jpg'
	);
	$slider_item_title = array(
		'Slide 1',
		'Slide 2',
		'Slide 3'
	);
	// 連想配列を作成
	$slider_items_Array = array();
			
	// $i_global_title_arrayが配列であるかを確認
	if (is_array($slider_img_link)) {
		// 各変数が配列であるかを確認
		if (is_array($slider_item_title)) {
			for ($s_num = 0; $s_num < count($slider_item_title); $s_num++) {
				// 配列のインデックスが存在するかを確認
				if (isset($slider_item_title[$s_num])) {
					$slider_items_Array[$slider_item_title[$s_num]] = array(
						'title' => $slider_item_title[$s_num],
						'url' => $slider_img_link[$s_num]
					);
				} else {
				//タイトル, URL,　エラーハンドリング
				}
			}
		} else {
			//arrayに対するエラーハンドリング
		}
	} else {
		//全体arrayに対するエラーハンドリング
	}
?>
aaa
<div class="heroheader-prevew-slider-all-wrap">
    <?php
    foreach($slider_items_Array as $key => $item){
        echo '<div class="heroheader-slider-wrap">';
        echo '<div>';
        echo '<div>';
        echo '<img src="' . $item['url'] . '" alt="Slide 1">';
        echo '<div class="back-shadow"></div>';
        echo '<p>' . $item['title'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>'; // 閉じタグを追加
    }
    ?>
</div><!--heroheader-prevew-slider-all-wrap-end-->
