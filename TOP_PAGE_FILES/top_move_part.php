<?php
//変数初期設定
$defult_anime_img_prev = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
$defult_rogo_img_prev = get_template_directory_uri() . '/admin-img/narukami-rogo-var3.1.0.png';
//動画変数
$i_heroheader_video= sanitize_option_value(get_option('hero-H-move'));
$i_heroheader_video_title = sanitize_option_value(get_option('hero-H-moveTitle', 'SITE TITLE'));
$i_heroheader_video_textColor = sanitize_option_value(get_option('heroheader-moveTitleTextColor', '#ffffff'));
$i_heroheader_video_textShadow = sanitize_option_value(get_option('heroheader-moveTitleShadowColor', '#ffffff'));
$i_heroheader_video_backShadow = sanitize_option_value(get_option('hero-H-movebackshadow', 'backshadow-on'));
$animetion_type = sanitize_option_value(get_option('loading-anime-type', 'stretch-shrink-right'));
$i_open_bgimgurl = get_optimized_image_url(sanitize_option_value(get_option('open-bg-imgurl', $defult_anime_img_prev)));
$i_open_rogoimgurl = get_optimized_image_url(sanitize_option_value(get_option('open-rogo-imgurl', $defult_rogo_img_prev)));
$i_loadingtext_color = sanitize_option_value(get_option('loadingtext-color', '#000'));
	if($i_heroheader_video_backShadow === "backshadow-on"){
		$back_shadow_value = "";
	}else{
		$back_shadow_value = "none";
	}
?>
<div class="heroheader-prevew-video-all-wrap">
	<div class="heroheader-video-back-wrap">
		<div class="heroheader-video-wrap loadanime-opacity-control">
			<video autoplay loop muted playsinline>
            	<source src="<?php echo $i_heroheader_video; ?>" type="video/mp4">
			    Your browser does not support the video tag.
        	</video>
		</div>
		<div class="heroheader-overlay"
			 style="display: <?php echo $back_shadow_value; ?>;">
		</div>
		<div class="heroheader-video-title-wrap">
			<p class="heroheader-video-title" 
			   style="color: <?php echo $i_heroheader_video_textColor; ?>; text-shadow: 1px 1px 10px <?php echo $i_heroheader_video_textShadow; ?>;">
			   <?php echo $i_heroheader_video_title; ?>
			</p>
		</div>
		<div class="animetion-prewrap" style="background-image: url('<?php echo $i_open_bgimgurl; ?>');">
			<p class="loadwrap-rogo">
				<img src="<?php echo $i_open_rogoimgurl; ?>" alt="ROGO">
			</p>
			<p class="loading-text" style="color: <?php echo $i_loadingtext_color; ?>;">Loding...</p>
		</div>
	</div><!--heroheader-video-back-wrap-end-->
</div><!--heroheader-prevew-video-all-wrap-end-->
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
		bgTitleHopup();
	}
	loadingTextControl();
	popupRogoPreviewControl();
});
//透明度初期値コントロール
function removeOpacityCntrol(){
	var bgElement = document.querySelector('.heroheader-video-wrap');
	bgElement.classList.remove('loadanime-opacity-control');
}
//bg透明度コントロール
function bgPreviewOpacty(){
	var bgContainer = document.querySelector('.heroheader-video-wrap');
	bgContainer.classList.add('bg-opacity-value');
}
//bgタイトルホップアップ
function bgTitleHopup(){
	var bgTitle = document.querySelector('.heroheader-video-title');
	bgTitle.classList.add('hopup-animation');
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