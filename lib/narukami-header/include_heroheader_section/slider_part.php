<?php
//変数の初期値設定
$hh_slider_img_1 = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
$hh_slider_img_2 = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
$hh_slider_img_3 = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
//title
$hh_slider_title_1 = "SLIDER TITLE 1";
$hh_slider_title_2 = "SLIDER TITLE 2";
$hh_slider_title_3 = "SLIDER TITLE 3";

//配列として初期化
$slider_img_array = get_option('slider_img_link_array', array($hh_slider_img_1,$hh_slider_img_2,$hh_slider_img_3));
$slider_title_array = get_option('slider_item_title_array', array($hh_slider_title_1,$hh_slider_title_2,$hh_slider_title_3));
//shadowVolumeの数値初期化
$slider_shadow_val = get_option('slider_item_shadow_volume', '0.50');

//登録時処理
$slider_img_array = !empty($slider_img_array) ? sanitize_option_value($slider_img_array) : array('');
$slider_title_array = !empty($slider_title_array) ? sanitize_option_value($slider_title_array) : array('');

//shadow変数セット
$slider_shadow_value = sanitize_option_value(get_option('slider_item_shadow', 'shadow-on'));
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

<h4>ヒーローヘッダースライダーの画像を暗くする</h4>
<label><input id="slider-shadow-swich" type="checkbox" name="shadowValue" value="shadow-on" <?php echo $shadow_value_check; ?>>暗くする</label>
<div class="slider-shadow-range notshow">
	<div class="shadow-range-prevew-wrap">
		<div class="shadow-range-bg"></div>
		<div class="shadow-range-wrap" style="background-color: rgba(0, 0, 0, <?php echo $slider_shadow_val; ?>);"></div>
		<p>Darkness of Shadow</p>
	</div>
	<input id="precision-slider" type="range" name="slider-shadow-range-value" min="0" max="1" value="<?php echo $slider_shadow_val; ?>" step="0.01">
	<span id="shaow-rgba-balue"><?php echo $slider_shadow_val; ?></span>
</div>
<h4>ヒーローヘッダースライダーの画像を選択してタイトルを入力してください。</h4>
<div class="slider-item-all-wrap">
	<?php
	if (isset($slider_formItem_array) && is_array($slider_formItem_array)) {
	$slider_lengh = 0;
		foreach($slider_formItem_array as $key2=>$s_item){
			echo '<div id="slider-form-wrap_' . $slider_lengh . '" class="slider-form-wrap">';
			echo '<p>スライダー画像を選択してください。(画像サイズ横1740px縦1320px　推奨)</p>';	
			echo generate_upload_image_single_array_tag('slider-img-link', $s_item['sf-url'], $slider_lengh);
			echo '<p>スライダータイトルを入力してください。</p>';	
			echo '<input type="text" name="slider_item_title[]" class="img-setect-url" value="' . $s_item['sf-title'] . '">';
			echo '<button class="slider-del-btn" type="button" onclick="sliderItemDelBtn(this)">このアイテムを削除する</button>';
			echo '</div>';
			$slider_lengh++;
		}
	}
	?>
</div>
<button type="button" id="slider-add-button" class="slider-item-add-btn">新規スライダーを追加</button>
