<?php
//動画変数
$i_heroheader_video= sanitize_option_value(get_option('hero-H-move'));
$i_heroheader_video_title = sanitize_option_value(get_option('hero-H-moveTitle'));
$i_heroheader_video_textColor = sanitize_option_value(get_option('heroheader-moveTitleTextColor'));
$i_heroheader_video_textShadow = sanitize_option_value(get_option('heroheader-moveTitleShadowColor'));
$i_heroheader_video_backShadow = sanitize_option_value(get_option('hero-H-movebackshadow'));
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
			 style="display: <?php echo $back_shadow_value; ?>;"></div>
		<div class="heroheader-video-title-wrap">
			<p class="heroheader-video-title" 
			   style="color: <?php echo $i_heroheader_video_textColor; ?>; text-shadow: 1px 1px 10px <?php echo $i_heroheader_video_textShadow; ?>;">
			   <?php echo $i_heroheader_video_title; ?>
			</p>
		</div>
	</div><!--heroheader-video-back-wrap-end-->
</div><!--heroheader-prevew-video-all-wrap-end-->