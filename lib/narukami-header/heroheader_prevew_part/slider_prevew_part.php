<?php
	$slider_img_link = sanitize_option_value(get_option('slider_img_link_array'));
	$slider_item_title = sanitize_option_value(get_option('slider_item_title_array'));
	$slider_item_shadow = sanitize_option_value(get_option('slider_item_shadow'));
	$slider_item_shadow_volume = sanitize_option_value(get_option('slider_item_shadow_volume'));
	if($slider_item_shadow === "shadow-on"){
		$shadow_value = "background-color: rgba(0, 0, 0, {$slider_item_shadow_volume});";
	}else{
		$shadow_value = "";
	}
	// 連想配列を作成
	$slider_items_Array = array();

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
<div class="heroheader-prevew-slider-all-wrap">
	<div class="heroheader-slider-wrap">
    <?php
    foreach($slider_items_Array as $key => $item){
        echo '<div>';
        echo '<img src="' . $item['url'] . '" alt="Slide 1">';
        echo '<div class="back-shadow" style="' . $shadow_value . '"></div>';
        echo '<p>' . $item['title'] . '</p>';
        echo '</div>';
    }
    ?>
	</div><!--heroheader-slider-wrap-end-->
</div><!--heroheader-prevew-slider-all-wrap-end-->
