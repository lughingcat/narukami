<?php

//変数の初期値設定
$hh_slider_img_1_prev = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
$hh_slider_img_2_prev = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
$hh_slider_img_3_prev = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
$defult_rogo_img_prev = get_template_directory_uri() . '/admin-img/narukami-rogo-var3.1.0.png';
//title
$hh_slider_title_1_prev = "SLIDER TITLE 1";
$hh_slider_title_2_prev = "SLIDER TITLE 2";
$hh_slider_title_3_prev = "SLIDER TITLE 3";

$slider_img_link = get_optimized_image_url(sanitize_option_value(get_option('slider_img_link_array',array($hh_slider_img_1_prev,$hh_slider_img_2_prev,$hh_slider_img_3_prev))));
$slider_item_title = sanitize_option_value(get_option('slider_item_title_array',array($hh_slider_title_1_prev,$hh_slider_title_2_prev,$hh_slider_title_3_prev)));
$slider_item_shadow = sanitize_option_value(get_option('slider_item_shadow', 'shadow-on'));
$slider_item_shadow_volume = sanitize_option_value(get_option('slider_item_shadow_volume', '0.50'));
$animetion_type = sanitize_option_value(get_option('loading-anime-type', 'stretch-shrink-right'));
$i_open_bgimgurl = get_optimized_image_url(sanitize_option_value(get_option('open-bg-imgurl', $hh_slider_img_1_prev)));
$i_open_rogoimgurl = get_optimized_image_url(sanitize_option_value(get_option('open-rogo-imgurl', $defult_rogo_img_prev)));
$i_loadingtext_color = sanitize_option_value(get_option('loadingtext-color', '#000'));
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
	<div class="animetion-prewrap" style="background-image: url('<?php echo $i_open_bgimgurl; ?>');">
		<p class="loadwrap-rogo">
			<img src="<?php echo $i_open_rogoimgurl; ?>" alt="ROGO">
		</p>
		<p class="loading-text" style="color: <?php echo $i_loadingtext_color; ?>;">Loding...</p>
	</div>
	<div class="heroheader-slider-wrap loadanime-opacity-control">
    <?php
    foreach($slider_items_Array as $key => $item){
		echo '<div>';
        echo '<img src="' . $item['url'] . '" alt="">';
        echo '<div class="back-shadow" style="' . $shadow_value . '"></div>';
        echo '<p>' . $item['title'] . '</p>';
        echo '</div>';
    }
    ?>
	</div><!--heroheader-slider-wrap-end-->
</div><!--heroheader-prevew-slider-all-wrap-end-->
<script>
document.addEventListener('DOMContentLoaded', function(){
	var overWrapElement = document.querySelector('.animetion-prewrap');
	var animationStyle = '<?php echo $animetion_type; ?>';
	overWrapElement.classList.add(animationStyle);
	if(animationStyle === 'loading-anime-not-use'){
		removeOpacityCntrol();
	}else{
		setTimeout(removeOpacityCntrol(),1000);
		bgPreviewOpacty();
	}
	loadingTextControl();
	popupRogoPreviewControl();
});
//透明度初期値コントロール
function removeOpacityCntrol(){
	var bgElement = document.querySelector('.heroheader-slider-wrap');
	bgElement.classList.remove('loadanime-opacity-control');
}
//bg透明度コントロール
function bgPreviewOpacty(){
	var bgContainer = document.querySelector('.heroheader-slider-wrap');
	bgContainer.classList.add('bg-opacity-value');
}
//loading...アニメーション制御
function loadingTextControl(){
	var loadingAnimeContainer = document.querySelector('.loading-text');
	loadingAnimeContainer.classList.add('loading-anime');
}
//rogo出現アニメーション制御
function popupRogoPreviewControl(){
	var popupRogoContainer = document.querySelector('.loadwrap-rogo');
	popupRogoContainer.classList.add('popup-rogo');
}
</script>