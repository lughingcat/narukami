<div id="globalmenu_setting_wrap" class="narukami_globalmenu_setting_wrap">
	<div class="globalmenu_part_Prevew">
		<article class="globalmenuPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			$i_global_title_array = sanitize_option_value(get_option('global_title_array'));
			$i_global_url_array = sanitize_option_value(get_option('global_url_array'));
			if(is_array($i_global_title_array )){
			foreach($i_global_title_array as $key=>$value){
				echo $key;
				echo $value;
			}
			}
			if(is_array($i_global_url_array)){
			foreach($i_global_url_array as $key=>$value){
				echo $key;
				echo $value;
			}
			}
		?>
		<div class="globalmenu-back-wrap"
			 style="background-color: <?php echo $i_header_bgcolor; ?>; display: <?php echo $disp_switch; ?>;">
			<div class="globalmenu-flex-setting">
				<div class="globalmenu-title-wrap">
					<a href="<?php echo $i_global_item_link; ?>" class="globalmenu-item-title" 
					   style="color: <?php echo $i_header_textcolor_setting; ?>;">
					<?php echo $i_global_item_title?></a>
				</div>
			</div>
		</div>
		</article>
	</div>
	<div class="inputForm">
	<h4>グローバルメニュー背景色設定。</h4>
		<div class="color-box-child">
		<?php 
			genelate_color_picker_tag_demo(
          	'globalmenu-bg-color', 
          	get_option('globalmenu-bg-color'),
          	'デフォルトは透明です。変更後再度透明にしたい場合は、クリアを押してください。'
        	);
		?> 
		</div>
	<h4>グローバルメニュータイトルを入力してください。</h4>
		<div class="globalmenu-flex-wrap">
			<div class="">
				<p>タイトル</p>
				<input type="text" name="global_item_title[]" class="img-setect-url">
			</div>
			<div class="">
				<p>リンクURL</p>
				<input type="text" name="global_item_link[]" class="img-setect-url">
			</div>
			<div class="">
				<p>タイトル</p>
				<input type="text" name="global_item_title[]" class="img-setect-url">
			</div>
			<div class="">
				<p>リンクURL</p>
				<input type="text" name="global_item_link[]" class="img-setect-url">
			</div>
		</div>
	<h4>グローバルメニューの文字色を設定してください。</h4>
		<div class="color-box-child">
		<?php 
			genelate_color_picker_tag_demo(
          	'globalmenu-bg-color', 
          	get_option('globalmenu-bg-color'),
          	'テキスト色変更。'
        	);
		?> 
		</div>
	</div><!--inputform-end-->
</div><!--all-wrap-end-->