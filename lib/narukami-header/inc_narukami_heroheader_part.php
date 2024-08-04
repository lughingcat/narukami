<div id="heroheader_setting_wrap" class="narukami_heroheader_setting_wrap">
	<div class="heroheader_part_Prevew">
		<article class="heroheaderPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			$i_heorheader_type = sanitize_option_value(get_option('heorheader_type'));
			//静止画変数
			$i_heroheader_stillImg = sanitize_option_value(get_option('hero-H-stillImg'));
			$i_heroheader_stillTitle = sanitize_option_value(get_option('hero-H-stillTitle'));
			$i_hh_still_title_color = sanitize_option_value(get_option('heroheader-titleTextColor'));
			$i_hh_still_shadow_color = sanitize_option_value(get_option('heroheader-titleShadowColor'));
			//動画変数
			$i_heroheader_video= sanitize_option_value(get_option('hero-H-move'));
			$i_heroheader_video_title = sanitize_option_value(get_option('hero-H-moveTitle'));
			$i_heroheader_video_shadow = sanitize_option_value(get_option('hero-H-movebackshadow'));
			$i_heroheader_video_textColor = sanitize_option_value(get_option('heroheader-moveTitleTextColor'));
			$i_heroheader_video_textShadow = sanitize_option_value(get_option('heroheader-moveTitleShadowColor'));
			$i_heroheader_video_backShadow = sanitize_option_value(get_option('hero-H-movebackshadow'));
			if(isset($i_heorheader_type)){
				if($i_heorheader_type === "still_img"){
					$still_img_check = "checked";
					$move_check = "";
					$slider_check = "";
					$i_heroheader_bg = $i_heroheader_stillImg;
					$i_heroheader_title = $i_heroheader_stillTitle;
					$i_heroheader_color = $i_hh_still_title_color;
					$i_heroheader_shadow = $i_hh_still_shadow_color;
					include('heroheader_prevew_part/still_img_prevew_part.php');
				}elseif($i_heorheader_type === "move"){
					$still_img_check = "";
					$move_check = "checked";
					$slider_check = "";
					$i_heroheader_bg = $i_heroheader_video;
					$i_heroheader_title = $i_heroheader_video_title;
					$i_heroheader_color = $i_heroheader_video_textColor;
					$i_heroheader_shadow = $i_heroheader_video_textShadow;
					if($i_heroheader_video_backShadow === "backshadow-on"){
						$back_shadow_value = "";
					}else{
						$back_shadow_value = "none";
					}
					include('heroheader_prevew_part/video_prevew_part.php');
				}elseif($i_heorheader_type === "slider"){
					$still_img_check = "";
					$move_check = "";
					$slider_check = "checked";
					include('heroheader_prevew_part/slider_prevew_part.php');
				}
			}
		?>
		</article>
	</div>
	<div class="inputForm">
		<h4>ヒーローヘッダーのタイプを選択してください</h4>
		<div class="heroheader-select-all-wrap">
			<div class="heroheader-item-wrap">
				<div class="heroheader-img-wrap">
					<p>静止画</p>
				</div>
				<label><input type="radio" name="heorheader-type" class="heroheader-value" value="still_img" <?php echo $still_img_check; ?>>静止画</label>
			</div><!--heroheader-item-wrap-end-->
			<div class="heroheader-item-wrap">
				<div class="heroheader-img-wrap">
					<p>動画</p>
				</div>
				<label><input type="radio" name="heorheader-type" class="heroheader-value" value="move" <?php echo $move_check; ?>>動画</label>
			</div><!--heroheader-item-wrap-end-->
			<div class="heroheader-item-wrap">
				<div class="heroheader-img-wrap">
					<p>スライダー</p>
				</div>
				<label><input type="radio"name="heorheader-type" class="heroheader-value" value="slider" <?php echo $slider_check; ?>>スライダー</label>
			</div><!--heroheader-item-wrap-end-->
		</div><!--heroheader-select-all-wrap-end-->
		
		<div class="partfile-includecontaider">
			<?php 
			if(isset($i_heorheader_type)){
				if($i_heorheader_type === "still_img"){
					include('include_heroheader_section/still_img_part.php');
				}elseif($i_heorheader_type === "move"){
					include('include_heroheader_section/move_part.php');
				}elseif($i_heorheader_type === "slider"){
					include('include_heroheader_section/slider_part.php');
				}
			}
			?>
		</div>
	</div><!--inputform-end-->
</div><!--all-wrap-end-->