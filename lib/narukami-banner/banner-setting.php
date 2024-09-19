<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">告知バナー設定[AnnouncementSetting]</span></h3>
        	<div class="inside">
			<?php
				$i_banner_control = sanitize_option_value(get_option('banner-use-control', 'banner-notuse'));
				$i_banner_title = sanitize_option_value(get_option('banner-title'));
				$i_banner_img = sanitize_option_value(get_option('banner-img'));
				$i_banner_link = sanitize_option_value(get_option('banner-link'));
				
				if($i_banner_control === "banner-use"){
					$bunner_on_value = "checked";
					$bunner_off_value = "";
				}else{
					$bunner_on_value = "";
					$bunner_off_value = "checked";
				}
			?>
			<form id="narukami-banner-form" method="post" name="narukami-banner-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_banner" /><!--post_nonce_check.phpへ送信(フッター用)-->
			<div class="inputForm notfound-page-wrap">
				<h4>告知バナーの使用を選択してください</h4>
				<p>サイトが最初に表示される時に１回だけ全画面に表示されます</br>新商品の告知や、スタッフの募集などの訴求に効果的です。</br>必要ない場合は「バナーを使用しない。」を選択して保存してください。</p>
					<label><input type="radio" name="banner-use-control" value="banner-use" <?php echo $bunner_on_value; ?>>バナーを使用する。</label>
					<label><input type="radio" name="banner-use-control" value="banner-notuse" <?php echo $bunner_off_value; ?>>バナーを使用しない。</label>
				<h4>バナータイトルを入力してください。</h4>
				<input type="text" name="banner-title" class="img-setect-url" value="<?php echo $i_banner_title; ?>" placeholder="告知タイトルを入力してください">
				<h4>バナー画像を選択してください。</h4>
				<?php
  				generate_upload_image_single_tag('banner-img', $i_banner_img);
				?>
				<h4>バナーのリンク先ページのURLを入力してください。</h4>
				<input type="text" name="banner-link" class="img-setect-url" value="<?php echo $i_banner_link; ?>" placeholder="URLを入力してください">
			
				<div class="control-setting-btn">
					<button class="top-page-maker-save-btn" type="submit">保存する</button>
					<?php 
						// プレビューボタン
    					$preview_link = add_query_arg(
    			   		 array(
    			   		     'preview' => 'true',
    			   		     'page' => 'banner_preview'
    			   		 ),
    			   		 home_url('/')
    					);
						echo '<button type="button" class="narukami-prevew-btn" onclick="bannerPreviewBtn()">PREVIEW</button>';
						echo '
						<script type="text/javascript">
							function bannerPreviewBtn() {
								var form = document.getElementById("narukami-banner-form");
								var formData = new FormData(form);
								var xhr = new XMLHttpRequest();
								var preview_link = "' . $preview_link . '";
								xhr.open("POST", preview_link, true);
								xhr.onreadystatechange = function () {
									if (xhr.readyState == 4) {
										console.log("XHR Status:", xhr.status);
									if (xhr.status == 200) {
										var previewWindow = window.open(preview_link, "_blank");
										previewWindow.document.open();
										previewWindow.document.write(xhr.responseText);
										previewWindow.document.close();
									}
									}
								};
								xhr.send(formData);
							}
						</script>
							';
						?>
				</div>
				<?php wp_nonce_field('update_banner_action', 'update_banner_nonce'); ?>
			</div><!--inputForm end-->
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
