<?php
$slider_img_link = sanitize_option_value($_POST['slider-img-link']);
$slider_item_title = sanitize_option_value($_POST['slider_item_title']);
$slider_item_shadow = isset($_POST['shadowValue']) 
    ? sanitize_option_value($_POST['shadowValue']) 
    : 'shadow-off';
$slider_item_shadow_volume = isset($_POST['slider-shadow-range-value']) 
    ? sanitize_option_value($_POST['slider-shadow-range-value']) 
    : '';
$animetion_type = isset($_POST['ladinganime-type']) 
    ? sanitize_option_value($_POST['ladinganime-type']) 
    : 'still-img';
$i_open_bgimgurl = sanitize_option_value($_POST['open-bg-img-url']);
$i_open_rogoimgurl = sanitize_option_value($_POST['open-rogo-img-url']);
$i_loadingtext_color = sanitize_option_value($_POST['loadingtext-color']);
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
        echo '<img src="' . $item['url'] . '" alt="">';
        echo '<div class="back-shadow" style="' . $shadow_value . '"></div>';
        echo '<p>' . $item['title'] . '</p>';
        echo '</div>';
    }
    ?>
	</div><!--heroheader-slider-wrap-end-->
	<div class="animetion-prewrap" style="background-image: url('<?php echo $i_open_bgimgurl; ?>');">
		<p class="loadwrap-rogo">
			<img src="<?php echo $i_open_rogoimgurl; ?>" alt="ROGO">
		</p>
		<p class="loading-text" style="color: <?php echo $i_loadingtext_color; ?>;">Loding...</p>
	</div>
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