<?php
//動画変数
$i_heroheader_video= sanitize_option_value(get_option('hero-H-move'));
$i_heroheader_video_title = sanitize_option_value(get_option('hero-H-moveTitle'));
$i_heroheader_video_textColor = sanitize_option_value(get_option('heroheader-moveTitleTextColor'));
$i_heroheader_video_textShadow = sanitize_option_value(get_option('heroheader-moveTitleShadowColor'));
$i_heroheader_video_backShadow = sanitize_option_value(get_option('hero-H-movebackshadow'));
$animetion_type = sanitize_option_value(get_option('loading-anime-type'));
$i_open_bgimgurl = sanitize_option_value(get_option('open-bg-imgurl'));
$i_open_rogoimgurl = sanitize_option_value(get_option('open-rogo-imgurl'));
$i_loadingtext_color = sanitize_option_value(get_option('loadingtext-color'));
	if($i_heroheader_video_backShadow === "backshadow-on"){
		$back_shadow_value = "";
	}else{
		$back_shadow_value = "none";
	}
?>
<div class="heroheader-prevew-video-all-wrap">
	<div class="heroheader-video-back-wrap">
		<div class="heroheader-video-wrap">
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
		
	}else{
		bgPreviewOpacty();
		bgTitleHopup();
	}
	loadingTextControl();
	popupRogoPreviewControl();
});
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