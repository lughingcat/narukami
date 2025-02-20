<?php
//変数初期値設定
$defult_still_img_prev = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
$defult_rogo_img_prev = get_template_directory_uri() . '/admin-img/narukami-rogo-var3.1.0.png';
//静止画変数
$i_heroheader_stillImg = get_optimized_image_url(sanitize_option_value(get_option('hero-H-stillImg', $defult_still_img_prev)));
$i_heroheader_stillTitle = sanitize_option_value(get_option('hero-H-stillTitle','SITE TITLE'));
$i_hh_still_title_color = sanitize_option_value(get_option('heroheader-titleTextColor', '#ffffff'));
$i_hh_still_shadow_color = sanitize_option_value(get_option('heroheader-titleShadowColor', '#000'));
$animetion_type = sanitize_option_value(get_option('loading-anime-type', 'stretch-shrink-right'));
$i_open_bgimgurl = get_optimized_image_url(sanitize_option_value(get_option('open-bg-imgurl', $defult_still_img_prev)));
$i_open_rogoimgurl = get_optimized_image_url(sanitize_option_value(get_option('open-rogo-imgurl', $defult_rogo_img_prev)));
$i_loadingtext_color = sanitize_option_value(get_option('loadingtext-color', '#000'));
?>
<div class="heroheader-prevew-all-wrap">
	<div class="heroheader-back-wrap">
		<div class="heroheader-rogo-wrap loadanime-opacity-control"
			 style="background-image: url('<?php echo $i_heroheader_stillImg; ?>');">
				<div class="heroheader-title-wrap">
					<p class="heroheader-title" 
					   style="color: <?php echo $i_hh_still_title_color; ?>; text-shadow: 1px 1px 10px <?php echo $i_hh_still_shadow_color; ?>;">
						<?php echo $i_heroheader_stillTitle; ?>
					</p>
				</div>
		</div>
		<div class="animetion-prewrap" style="background-image: url('<?php echo $i_open_bgimgurl; ?>');">
			<p class="loadwrap-rogo">
				<img src="<?php echo $i_open_rogoimgurl; ?>" alt="ROGO">
			</p>
			<p class="loading-text" style="color: <?php echo $i_loadingtext_color; ?>;">Loding...</p>
		</div>
	</div><!--heroheader-back-wrap-end-->
</div><!--heroheader-prevew-all-wrap-end-->

<script>
document.addEventListener('DOMContentLoaded', function(){
	var overWrapElement = document.querySelector('.animetion-prewrap');
	var animationStyle = "<?php echo $animetion_type; ?>";
	overWrapElement.classList.add(animationStyle);
	if(animationStyle === 'loading-anime-not-use'){
		removeOpacityCntrol();
		bgTitleHopupNotUse();
		bgScaleAnime();
	}else{
		setTimeout(removeOpacityCntrol(),1000);
		bgPreviewOpacty();
		bgTitleHopup();
	}
	loadingTextControl();
	popupRogoPreviewControl();
});
	
//透明度初期値コントロール
function removeOpacityCntrol(){
	var bgElement = document.querySelector('.heroheader-rogo-wrap');
	bgElement.classList.remove('loadanime-opacity-control');
}
//bg透明度コントロール
function bgPreviewOpacty(){
	var bgContainer = document.querySelector('.heroheader-rogo-wrap');
	bgContainer.classList.add('bg-opacity-value');
}
//bgタイトルホップアップ
function bgTitleHopup(){
	var bgTitle = document.querySelector('.heroheader-title');
	bgTitle.classList.add('hopup-animation');
}
//bgタイトルホップアップ(アニメーションなし)
function bgTitleHopupNotUse(){
	var bgTitle = document.querySelector('.heroheader-title');
	bgTitle.classList.add('hopup-animation-notuse');
}
//bg画像スケールアニメーション(アニメーションなし)
function bgScaleAnime(){
	var scaleBg = document.querySelector('.heroheader-rogo-wrap');
	scaleBg.classList.add('scale-animation');
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