<?php
//変数初期設定
$defult_anime_img_prev = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
$defult_rogo_img_prev = get_template_directory_uri() . '/admin-img/narukami-rogo-var3.1.0.png';
//動画変数
$move_type = sanitize_option_value(get_option('move-type','youtube'));
$youtube_id = sanitize_option_value(get_option('youtube-id',''));
$i_heroheader_video= sanitize_option_value(get_option('hero-H-move'));
$i_heroheader_video_title = sanitize_option_value(get_option('hero-H-moveTitle', 'SITE TITLE'));
$i_heroheader_video_textColor = sanitize_option_value(get_option('heroheader-moveTitleTextColor', '#ffffff'));
$i_heroheader_video_textShadow = sanitize_option_value(get_option('heroheader-moveTitleShadowColor', '#ffffff'));
$i_heroheader_video_backShadow = sanitize_option_value(get_option('hero-H-movebackshadow', 'backshadow-on'));
	if($i_heroheader_video_backShadow === "backshadow-on"){
		$back_shadow_value = "";
	}else{
		$back_shadow_value = "none";
	}
?>
<div class="heroheader-prevew-video-all-wrap">
    <div class="heroheader-video-back-wrap">
        <div class="heroheader-video-wrap youtube-wrap">
            <?php if ($move_type === 'original') : ?>
                <!-- オリジナル動画 -->
                <video autoplay loop muted playsinline>
                    <source src="<?php echo esc_url($i_heroheader_video); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php elseif ($move_type === 'youtube') : ?>
                <!-- YouTube動画 -->
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>?autoplay=1&loop=1&mute=1&playlist=<?php echo esc_attr($youtube_id); ?>" 
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                </iframe>
            <?php endif; ?>
        </div>
        <div class="heroheader-overlay"
             style="display: <?php echo esc_attr($back_shadow_value); ?>;"></div>
        <div class="heroheader-video-title-wrap notshow">
            <p class="heroheader-video-title" 
               style="color: <?php echo esc_attr($i_heroheader_video_textColor); ?>; text-shadow: 1px 1px 10px <?php echo esc_attr($i_heroheader_video_textShadow); ?>;">
               <?php echo esc_html($i_heroheader_video_title); ?>
            </p>
        </div>
    </div><!--heroheader-video-back-wrap-end-->
</div><!--heroheader-prevew-video-all-wrap-end-->
<script>
document.addEventListener('DOMContentLoaded', function(){
	var overWrapElement = document.querySelector('.animetion-prewrap');
	var animationStyle = overWrapElement.getAttribute('data-index');
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
//透明度初期値コントロール(残す)
function removeOpacityCntrol(){
	var bgElement = document.querySelector('.heroheader-video-wrap');
	bgElement.classList.remove('loadanime-opacity-control');
}
//bg透明度コントロール(残す)
function bgPreviewOpacty(){
	var bgContainer = document.querySelector('.heroheader-video-wrap');
	bgContainer.classList.add('bg-opacity-value');
}
//bgタイトルホップアップ(残す)
function bgTitleHopup(){
	var bgTitle = document.querySelector('.heroheader-video-title');
	bgTitle.classList.add('hopup-animation');
}
//動画の余白自動調整
function adjustYouTubeScale() {
    const iframe = document.querySelector(".youtube-wrap iframe");
    if (!iframe) return;

    const container = document.querySelector(".youtube-wrap");
    const containerWidth = container.offsetWidth;
    let containerHeight = container.offsetHeight;

    // 1200px 以上ならスケールを解除（transform をリセット）
    if (window.innerWidth >= 1200) {
        iframe.style.transform = "";
        return;
    }

    // 1200px 未満ならスケールを適用
    const videoAspectRatio = 16 / 9;
    const containerAspectRatio = containerWidth / containerHeight;
    
    let scaleValue = 1;

    if (containerAspectRatio > videoAspectRatio) {
        scaleValue = containerWidth / (containerHeight * videoAspectRatio);
    } else {
        scaleValue = containerHeight * videoAspectRatio / containerWidth;
    }

    iframe.style.transform = `scale(${scaleValue})`;
}

// ウィンドウサイズ変更時に再調整
window.addEventListener("resize", adjustYouTubeScale);
window.addEventListener("DOMContentLoaded", adjustYouTubeScale);


</script>