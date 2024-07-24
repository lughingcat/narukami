<div id="header_setting_wrap" class="narukami_header_setting_wrap">
	<div class="header_part_Prevew">
		<article class="headerPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			$i_site_rogo_img_url = esc_url(get_option('site-rogo-img'));
			$i_site_title_value = sanitize_text_field(get_option('header-tite'));
			$i_site_discription_value = wp_kses_post(get_option('header-discription'));
			var_dump($i_site_rogo_img_url);
			var_dump($i_site_title_value);
			var_dump($i_site_discription_value);
			$insertGlobalId = "insert_id1";
			$gm_numbers = '0';
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
	<h4 class="h-admin-4-bg">サイトロゴ画像を選択してください。</h4>
	<h4>サイトタイトルを入力してください。</h4>
	<input type="text" name="header_site_title" class="img-setect-url" value=<?php echo $i_site_title_value; ?>>
	<h4>サイトディスクリプションを入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="header_site_discription" class="narukami-tinymce-editor"><?php echo $i_site_discription_value;?>
	</textarea>
	</div>
</div>