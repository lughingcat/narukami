<div id="globalmenu_setting_wrap" class="narukami_globalmenu_setting_wrap">
	<div class="globalmenu_part_Prevew">
		<article class="globalmenuPrevew">
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
				<input type="text" name="global_item_title[]" class="img-setect-url" value=<?php echo $i_site_title_value; ?>>
			</div>
			<div class="">
				<p>リンクURL</p>
				<input type="text" name="global_item_link[]" class="img-setect-url" value=<?php echo $i_site_title_value; ?>>
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