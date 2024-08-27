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
			$i_header_stitle_setting = sanitize_text_field(get_option('header-stitle-set'));
			$i_header_sdisc_setting = sanitize_text_field(get_option('header-sdisc-set'));
			$i_header_bgcolor = sanitize_text_field(get_option('header-bg-color'));
			$i_header_sort_setting = sanitize_text_field(get_option('header-sort-set'));
			$i_header_textcolor_setting = sanitize_text_field(get_option('header-text-color'));
		?>
		<?php
			//ヘッダー表示切り替え
			if($i_header_display_setting === 'display_on'){
				$display_on = "checked";
				$display_off = "";
				$disp_switch = "";
			}else{
				$display_on = "";
				$display_off = "checked";
				$disp_switch = "none";
			}
			//ヘッダーロゴ表示切り替え
			if($i_header_rogo_setting === 'display_on'){
				$display_rogo_on = "checked";
				$display_rogo_off = "";
				$disp_img_switch = "";
			}else{
				$display_rogo_on = "";
				$display_rogo_off = "checked";
				$disp_img_switch = "none";
			}
			//サイトタイトル表示切り替え
			if($i_header_stitle_setting === 'display_on'){
				$display_sitetitle_on = "checked";
				$display_sitetitle_off = "";
				$disp_title_switch = "";
			}else{
				$display_sitetitle_on = "";
				$display_sitetitle_off = "checked";
				$disp_title_switch = "none";
			}
			//サイトディスクリプション切り替え
			if($i_header_sdisc_setting === 'display_on'){
				$display_sitedisc_on = "checked";
				$display_sitedisc_off = "";
				$disp_disc_switch = "";
			}else{
				$display_sitedisc_on = "";
				$display_sitedisc_off = "checked";
				$disp_disc_switch = "none";
			}
			//背景色選択
			if($i_header_bgcolor === ''){
				$display_bgcolor_on = "";
				$display_bgcolor_off = "checked";
				$i_header_bgcolor = "transparent";
			}else{
				$display_bgcolor_on = "checked";
				$display_bgcolor_off = "";
			}
		?>
		<div class="header-back-wrap"
			 style="background-color: <?php echo $i_header_bgcolor; ?>; display: <?php echo $disp_switch; ?>;">
			<div class="header-flex-setting">
				<div class="header-rogo-wrap"
					 style="background-image: url('<?php echo $i_site_rogo_img_url; ?>'); display: <?php echo $disp_img_switch; ?>;"
></div>
				<div class="header-title-wrap">
					<p class="header-site-title" 
					   style="color: <?php echo $i_header_textcolor_setting; ?>; display: <?php echo $disp_title_switch; ?>;"><?php echo $i_site_title_value; ?></p>
					<p class="header-site-discription" 
					   style="color: <?php echo $i_header_textcolor_setting; ?>; display: <?php echo $disp_disc_switch; ?>;"><?php echo $i_site_discription_value;?></p>
				</div>
			</div>
		</div>
		</article>
	</div>
	<div class="inputForm">
	<h4>ヘッダー表示設定。</h4>
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-setting" value="display_on" <?php echo $display_on; ?>>ヘッダーを表示する</label>
			<label><input type="radio" name="header-display-setting" value="display_off" <?php echo $display_off; ?>>ヘッダーを非表示にする</label>
		</div>
	<h4>ヘッダー背景色設定。</h4>
		<div class="header-radio-wrap">
			<div class="color-box-child">
			<?php 
			genelate_color_picker_tag_demo(
        	  'header-bg-color', 
        	  get_option('header-bg-color'),
        	  'デフォルトは透明です。変更後再度透明にしたい場合は、クリアを押してください。'
        	);
			?> 
			</div>
		</div>
	<h4 class="h-admin-4-bg">店舗ロゴ画像を選択してください。</h4>
		<?php
  		generate_upload_image_single_tag('site-rogo-img-url', $i_site_rogo_img_url);
		?>
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-rogo" value="display_on" <?php echo $display_rogo_on; ?>>店舗ロゴを表示する</label>
			<label><input type="radio" name="header-display-rogo" value="display_off" <?php echo $display_rogo_off; ?>>店舗ロゴを非表示にする</label>
		</div>
	<h4>店舗名を入力してください。</h4>
	<input type="text" name="header_site_title" class="img-setect-url" value=<?php echo $i_site_title_value; ?>>
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-sitetitle" value="display_on" <?php echo $display_sitetitle_on; ?>>店舗名を表示する</label>
			<label><input type="radio" name="header-display-sitetitle" value="display_off" <?php echo $display_sitetitle_off; ?>>店舗名を非表示にする</label>
		</div>
	<h4>サブタイトルを入力してください。</h4>
	<textarea name="header_site_discription" class="narukami-tinymce-editor"><?php echo $i_site_discription_value;?>
	</textarea>
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-sitedisc" value="display_on" <?php echo $display_sitedisc_on; ?>>サブタイトルを表示する</label>
			<label><input type="radio" name="header-display-sitedisc" value="display_off" <?php echo $display_sitedisc_off; ?>>サブタイトルを非表示にする</label>
		</div>
	<h4>店舗名とサブタイトルの文字色設定。</h4>
		<div class="color-box-child">
		<?php 
			genelate_color_picker_tag_demo(
        	  'header-text-color', 
        	  get_option('header-text-color'), 
        	  'サイトタイトルと説明文の文字色を選択してください。'
        	);
        ?> 
		</div>
	</div><!--inputform-end-->
</div><!--all-wrap-end-->