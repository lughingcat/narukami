<div id="heroheader_setting_wrap" class="narukami_heroheader_setting_wrap">
	<div class="heroheader_part_Prevew">
		<article class="heroheaderPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			$i_heorheader_type = sanitize_option_value(get_option('heorheader_type'));
			$i_heroheader_stillImg = sanitize_option_value(get_option('hero-H-stillImg'));
			$i_heroheader_stillTitle = sanitize_option_value(get_option('hero-H-stillTitle'));
			$i_hh_still_title_color = sanitize_option_value(get_option('heroheader-titleTextColor'));
			if(isset($i_heorheader_type)){
				if($i_heorheader_type === "still_img"){
					$still_img_check = "checked";
					$move_check = "";
					$slider_check = "";
					$i_heroheader_bg = $i_heroheader_stillImg;
					$i_heroheader_title = $i_heroheader_stillTitle;
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
		<div class="heroheader-prevew-all-wrap">
			<div class="heroheader-back-wrap">
				<div class="heroheader-rogo-wrap"
					 style="background-image: url('<?php echo $i_heroheader_bg; ?>');">
					<div class="heroheader-title-wrap">
						<p class="heroheader-title" 
					   	   style="color: <?php echo $i_hh_still_title_color; ?>;">
						<?php echo $i_heroheader_title; ?>
						</p>
				</div>
				</div>
			</div><!--heroheader-back-wrap-end-->
		</div><!--heroheader-prevew-all-wrap-end-->
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