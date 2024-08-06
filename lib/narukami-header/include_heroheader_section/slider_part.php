<?php
 $slider_img_array = sanitize_option_value(get_option('slider_img_link_array'));
 $slider_title_array = sanitize_option_value(get_option('slider_item_title_array'));
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
<h4>スライダーの画像を選択してタイトルを入力してください。</h4>
	<div id="slider-form-wrap_0">
		<p>画像を選択してください。</p>
		<?php
		$data_num = 'index_0';
		 echo generate_upload_image_single_array_tag('slider-img-link', $value, $data_num);
		?>
		<p>タイトルを入力してください。</p>
		<input type="text" name="slider_item_title[]" class="img-setect-url" value="">
	</div>
	<?php
	if (isset($slider_formItem_array) && is_array($slider_formItem_array)) {
	$slider_lengh = 0;
		foreach($slider_formItem_array as $key2=>$s_item){
			echo '<div id="slider-form-wrap_'. $slider_lengh . '">';
			echo '<p>画像を選択してください。</p>';	
			echo generate_upload_image_tag('slider-img-link', $s_item['sf-url'], 'slider-value', 0);
			echo '<p>タイトルを入力してください。</p>';	
			echo '<input type="text" name="slider_item_title[]" class="img-setect-url" value="' . $s_item['sf-title'] . '">';
			echo '</div>';
			$slider_lengh++;
		}
	}
	?>