<div id="cmaker_concept_wrap" class="cmakerWrapConcept">
	<div class="concept_Prevew">
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
			if( !empty($_POST['slider_img_url']) )
			{ 
				$slider_url = $_POST['slider_img_url']; 
			} else{ 
				$slider_url = $img_url_array;
			}
	;?>
	<h4>コンセプト表示の背景画像を選択してください。aaa</h4>
	<?php
  	generate_upload_image_tag('slider_img_url', $slider_url);
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="concept_title" value="初期値">
	<h4>コンセプト文章を入力してください。</h4>
	<textarea name="concept_content"></textarea>
	</div>
	<button type="button" id="conceptCloseBtn">閉じる</button>
</div>