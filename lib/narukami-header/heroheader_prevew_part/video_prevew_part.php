<?php
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
        <div class="heroheader-video-wrap">
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
        <div class="heroheader-video-title-wrap">
            <p class="heroheader-video-title" 
               style="color: <?php echo esc_attr($i_heroheader_video_textColor); ?>; text-shadow: 1px 1px 10px <?php echo esc_attr($i_heroheader_video_textShadow); ?>;">
               <?php echo esc_html($i_heroheader_video_title); ?>
            </p>
        </div>
    </div><!--heroheader-video-back-wrap-end-->
</div><!--heroheader-prevew-video-all-wrap-end-->