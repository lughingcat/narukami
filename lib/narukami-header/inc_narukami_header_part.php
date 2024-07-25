<div id="header_setting_wrap" class="narukami_header_setting_wrap">
	<div class="header_part_Prevew">
		<article class="headerPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			$i_site_rogo_img_url = esc_url(get_option('header-rogo-url'));
			$i_site_title_value = sanitize_text_field(get_option('header-tite'));
			$i_site_discription_value = wp_kses_post(get_option('header-discription'));
			$i_header_display_setting = sanitize_text_field(get_option('header-disp-set'));
			$i_header_rogo_setting = sanitize_text_field(get_option('header-rogo-set'));
		?>
		<?php
			//ヘッダー表示切り替え
			if($i_header_display_setting === 'display_on'){
				$display_on = "checked";
				$display_off = "";
			}else{
				$display_on = "";
				$display_off = "checked";
			}
			//ヘッダーロゴ表示切り替え
			if($i_header_rogo_setting === 'display_on'){
				$display_rogo_on = "checked";
				$display_rogo_off = "";
			}else{
				$display_rogo_on = "";
				$display_rogo_off = "checked";
			}
		?>
		<div class="header-back-wrap"
			 style="background-image: url(<?php echo $i_site_rogo_img_url; ?>)">
			<div class="header-title-wrap">
				<p class="header-site-title"><?php echo $i_site_title_value; ?></p>
				<p class="header-site-discription"><?php echo $i_site_discription_value;?></p>
			</div>
		</div>
		</article>
	</div>
	<div class="inputForm">
	<h4 class="h-admin-4-bg">ヘッダー表示設定。</h4>
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-setting" value="display_on" <?php echo $display_on; ?>>ヘッダーを表示する</label>
			<label><input type="radio" name="header-display-setting" value="display_off" <?php echo $display_off; ?>>ヘッダーを非表示にする</label>
		</div>
	<h4 class="h-admin-4-bg">サイトロゴ画像を選択してください。</h4>
		<?php
  		generate_upload_image_single_tag('site-rogo-img-url', $i_site_rogo_img_url);
		?>
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-rogo" value="display_on" <?php echo $display_rogo_on; ?>>ヘッダーロゴを表示する</label>
			<label><input type="radio" name="header-display-rogo" value="display_off" <?php echo $display_rogo_off; ?>>ヘッダーロゴを非表示にする</label>
		</div>
	<h4>サイトタイトルを入力してください。</h4>
	<input type="text" name="header_site_title" class="img-setect-url" value=<?php echo $i_site_title_value; ?>>
	<h4>サイトディスクリプションを入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="header_site_discription" class="narukami-tinymce-editor"><?php echo $i_site_discription_value;?>
	</textarea>
	</div>
</div>