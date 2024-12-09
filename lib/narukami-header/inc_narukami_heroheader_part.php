<div id="heroheader_setting_wrap" class="narukami_heroheader_setting_wrap">
	<div class="heroheader_part_Prevew">
		<article class="heroheaderPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			$i_heorheader_type = sanitize_option_value(get_option('heorheader_type', 'still_img'));
			if(isset($i_heorheader_type)){
				if($i_heorheader_type === "still_img"){
					$still_img_check = "checked";
					$move_check = "";
					$slider_check = "";
				}elseif($i_heorheader_type === "move"){
					$still_img_check = "";
					$move_check = "checked";
					$slider_check = "";
				}elseif($i_heorheader_type === "slider"){
					$still_img_check = "";
					$move_check = "";
					$slider_check = "checked";
				}
			}
		?>
		<h4>ヒーローヘッダーのタイプを選択してください</h4>
		<div class="heroheader-select-all-wrap">
			<div class="heroheader-item-wrap">
				<div class="heroheader-img-wrap">
					<p><i class="fa-regular fa-image"></i></p>
				</div>
				<label><input type="radio" name="heorheader-type" class="heroheader-value" value="still_img" <?php echo $still_img_check; ?>>静止画</label>
			</div><!--heroheader-item-wrap-end-->
			<div class="heroheader-item-wrap">
				<div class="heroheader-img-wrap">
					<p><i class="fa-brands fa-youtube"></i></p>
				</div>
				<label><input type="radio" name="heorheader-type" class="heroheader-value" value="move" <?php echo $move_check; ?>>動画</label>
			</div><!--heroheader-item-wrap-end-->
			<div class="heroheader-item-wrap">
				<div class="heroheader-img-wrap">
					<p><i class="fa-solid fa-sliders"></i></p>
				</div>
				<label><input type="radio" name="heorheader-type" class="heroheader-value" value="slider" <?php echo $slider_check; ?>>スライダー</label>
			</div><!--heroheader-item-wrap-end-->
		</div><!--heroheader-select-all-wrap-end-->
			<div class="still-img-prevewpart-wrap">
				<?php
				include('heroheader_prevew_part/still_img_prevew_part.php');
				?>
			</div>
			<div class="move-prevewpart-wrap">
				<?php
				include('heroheader_prevew_part/video_prevew_part.php');
				?>
			</div>
			<div class="slider-prevewpart-wrap">
				<?php
				include('heroheader_prevew_part/slider_prevew_part.php');
				?>
			</div>
		</article>
	</div>
	<div class="inputForm">
		
		<div class="partfile-includecontaider">
			<div class="still-imgpart-wrap">
				<?php 
				include('include_heroheader_section/still_img_part.php');
				?>
			</div>
			<div class="movepart-wrap">
				<?php 
				include('include_heroheader_section/move_part.php');
				?>
			</div>
			<div class="sliderpart-wrap">
				<?php 
				include('include_heroheader_section/slider_part.php');
				?>
			</div>
		</div>
	</div><!--inputform-end-->
</div><!--all-wrap-end-->