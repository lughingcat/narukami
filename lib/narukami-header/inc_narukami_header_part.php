<div id="header_setting_wrap" class="narukami_header_setting_wrap">
	<div class="header_part_Prevew">
		<article class="headerPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			$site_rogo_img_url = "https://nousondiner.com/wp-content/uploads/2022/03/cropped-singl-rogo-var1.00-1.png";
			$insertGlobalId = "insert_id1";
			$gm_numbers = '0';
		  ?>
		<div class="header-back-wrap"
			 style="background-image: url(<?php echo $site_rogo_img_url; ?>)">
			<div class="header-title-wrap">
				<p class="header-site-title">サイトタイトル</p>
				<p class="header-site-discription">サイトディスクリプション</p>
			</div>
		</div>
		</article>
	</div>
	<div class="inputForm">
	<h4 class="h-admin-4-bg">サイトロゴ画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('site-rogo-img', $site_rogo_img_url, $insertGlobalId, $gm_numbers);
	?>
	<h4>サイトタイトルを入力してください。</h4>
	<input type="text" name="header_site_title" class="img-setect-url" value="サイトタイトル">
	<h4>サイトディスクリプションを入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="header_site_discription" class="narukami-tinymce-editor">サイトディスクリプション
	</textarea>
	</div>
</div>