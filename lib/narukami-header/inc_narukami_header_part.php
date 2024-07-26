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
			//サイトタイトル表示切り替え
			if($i_header_stitle_setting === 'display_on'){
				$display_sitetitle_on = "checked";
				$display_sitetitle_off = "";
			}else{
				$display_sitetitle_on = "";
				$display_sitetitle_off = "checked";
			}
			//サイトディスクリプション切り替え
			if($i_header_sdisc_setting === 'display_on'){
				$display_sitedisc_on = "checked";
				$display_sitedisc_off = "";
			}else{
				$display_sitedisc_on = "";
				$display_sitedisc_off = "checked";
			}
			//ロゴとタイトルの並び切り替え
			if($i_header_sort_setting === 'block'){
				$display_sort_block = "checked";
				$display_sort_flex = "";
			}else{
				$display_sort_block = "";
				$display_sort_flex = "checked";
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
	<h4>ヘッダー表示設定。</h4>
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-setting" value="display_on" <?php echo $display_on; ?>>ヘッダーを表示する</label>
			<label><input type="radio" name="header-display-setting" value="display_off" <?php echo $display_off; ?>>ヘッダーを非表示にする</label>
		</div>
	<h4>ヘッダー背景色設定。</h4>
		<div class="color-box-child">
		<?php 
			genelate_color_picker_tag_demo(
        	  'header-bg-color', 
        	  get_option('header-bg-color'), 
        	  'ヘッダー背景色を選択してください。'
        	);
        ?> 
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
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-sitetitle" value="display_on" <?php echo $display_sitetitle_on; ?>>サイトタイトルを表示する</label>
			<label><input type="radio" name="header-display-sitetitle" value="display_off" <?php echo $display_sitetitle_off; ?>>サイトタイトルを非表示にする</label>
		</div>
	<h4>サイトディスクリプションを入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="header_site_discription" class="narukami-tinymce-editor"><?php echo $i_site_discription_value;?>
	</textarea>
		<div class="header-radio-wrap">
			<label><input type="radio" name="header-display-sitedisc" value="display_on" <?php echo $display_sitedisc_on; ?>>サイト説明を表示する</label>
			<label><input type="radio" name="header-display-sitedisc" value="display_off" <?php echo $display_sitedisc_off; ?>>サイト説明を非表示にする</label>
		</div>
	<h4>ロゴとサイトタイトルの並びを選択してください。</h4>
		<div class="header-radio-wrap sort-line-flex">
			<div class="display-sort-wrap">
				<div class="display-inner-wrap-block">
					<p class="header-rogo"><span>ROGO</span></p>
					<span class="header-title">SITE TITLE</span>
				</div>
				<label><input type="radio" name="header-display-sort" value="block" <?php echo $display_sort_block; ?>>縦並び</label>
			</div>
			<div class="display-sort-wrap">
				<div class="display-inner-wrap-block flex-line">
					<p class="header-rogo"><span>ROGO</span></p>
					<p class="header-title flex-patern"><span>SITE TITLE</span></p>
				</div>
				<label><input type="radio" name="header-display-sort" value="flex" <?php echo $display_sort_flex; ?>>横並び</label>
			</div>
		</div>
	</div><!--inputform-end-->
</div><!--all-wrap-end-->