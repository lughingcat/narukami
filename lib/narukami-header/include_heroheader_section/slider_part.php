<?php

//配列として初期化
$slider_img_array = get_option('slider_img_link_array', array(''));
$slider_title_array = get_option('slider_item_title_array', array(''));

//登録時処理
$slider_img_array = !empty($slider_img_array) ? sanitize_option_value($slider_img_array) : array('');
$slider_title_array = !empty($slider_title_array) ? sanitize_option_value($slider_title_array) : array('');

//shadow変数セット
$slider_shadow_value = sanitize_option_value(get_option('slider_item_shadow'));
	if($slider_shadow_value === "shadow-on"){
		$shadow_value_check = "checked";
	}else{
		$shadow_value_check = "";
	}

//配列を作成
$slider_formItem_array = array();

if (is_array($slider_img_array)) {
		// 各変数が配列であるかを確認
		if (is_array($slider_title_array)) {
			for ($sf_num = 0; $sf_num < count($slider_title_array); $sf_num++) {
				// 配列のインデックスが存在するかを確認
				if (isset($slider_title_array[$sf_num])) {
					$slider_formItem_array[$slider_title_array[$sf_num]] = array(
						'sf-title' => $slider_title_array[$sf_num],
						'sf-url' => $slider_img_array[$sf_num]
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

<h4>スライダーの画像を暗くする</h4>
<label><input id="slider-shadow-swich" type="checkbox" name="shadowValue" value="shadow-on" <?php echo $shadow_value_check; ?>>暗くする</label>
<div class="slider-shadow-range notshow">
	<input id="precision-slider" type="range" name="slider-shadow-range-value" min="0" max="1" value="0.5" step="0.01">
</div>
<h4>スライダーの画像を選択してタイトルを入力してください。</h4>
<div class="slider-item-all-wrap">
	<?php
	if (isset($slider_formItem_array) && is_array($slider_formItem_array)) {
	$slider_lengh = 0;
		foreach($slider_formItem_array as $key2=>$s_item){
			echo '<div id="slider-form-wrap_' . $slider_lengh . '" class="slider-form-wrap">';
			echo '<p>画像を選択してください。</p>';	
			echo generate_upload_image_single_array_tag('slider-img-link', $s_item['sf-url'], $slider_lengh);
			echo '<p>タイトルを入力してください。</p>';	
			echo '<input type="text" name="slider_item_title[]" class="img-setect-url" value="' . $s_item['sf-title'] . '">';
			echo '<button class="slider-del-btn" type="button" onclick="sliderItemDelBtn(this)">このアイテムを削除する</button>';
			echo '</div>';
			$slider_lengh++;
		}
	}
	?>
</div>
<button type="button" id="slider-add-button" class="slider-item-add-btn">アイテムを追加</button>
