<div id="cmaker_slider_wrap" class="cmakerWrapSlider" style="display: none;">
	<div class="slider_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT slider_img_url,  slider_item_name , slider_item_price  FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $img_url_array = $row->slider_img_url;
				 $item_name_array = $row->slider_item_name; 
				 $item_price_array = $row->slider_item_price; 
			  };
			  ?>
			<div>
			</div>
		</article>
	</div>
	<div class="inputForm">
	<?php
  	generate_upload_image_tag('slider_img_url', $url);
	?>
	<input type="text" name="slider_item_name" value="初期値">
	<input type="text" name="slider_item_price" value="初期値">
	</div>
	<button type="button" id="sliderCloseBtn">閉じる</button>
</div>