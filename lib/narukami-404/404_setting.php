<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">404ページ設定[Narukami404Setting]</span></h3>
        	<div class="inside">
			<?php
				//変数初期設定
				$defult_notfound_img = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
				
				$i_page404bg_type = sanitize_option_value(get_option('page404bg-type', 'main-bg-img'));
				$i_page404_title = sanitize_option_value(get_option('page404-title', 'お探しのページが見つかりません。'));
				$i_page404_title_color = sanitize_option_value(get_option('notfound-text-color', '#ffffff'));
				$i_page404_titleshadow_color = sanitize_option_value(get_option('notfound-text-shadow', '#000'));
				$i_notfoundpage_bg_img = sanitize_option_value(get_option('notfoundpage-bg-img', $defult_notfound_img));
				
				//check is　bg type
				if($i_page404bg_type === "main-bg-img"){
					$mainBg = "checked";
					$originBg = "";
				}else{
					$mainBg = "";
					$originBg = "checked";
				}
			?>
			<form id="narukami-404page-form" method="post" name="narukami-404page-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_404page" /><!--post_nonce_check.phpへ送信(フッター用)-->
			<div class="inputForm notfound-page-wrap">
				<h4 class="h-admin-4-bg">404ページの背景画像を選択してください</h4>
					<label><input type="radio" name="page404bg-type" value="main-bg-img" <?php echo $mainBg; ?>>サイトで設定している背景を使う。</label>
					<label><input type="radio" name="page404bg-type" value="original404-bg-img" <?php echo $originBg; ?>>専用背景を設定する。</label>
					<div class="notfound-img-select-wrap">
					<?php
  					generate_upload_image_single_tag('notfoundpage-bg-img', $i_notfoundpage_bg_img);
					?>
					</div>
				<h4>404ページの見出しタイトルを入力してください。</h4>
				<input type="text" name="page404-title" class="img-setect-url" value="<?php echo $i_page404_title; ?>" placeholder="404 NOT FOUND">
				
				<div class="color-box-child">
				<?php 
				genelate_color_picker_tag_demo(
				'notfound-text-color', 
        	  	$i_page404_title_color,
        	  	'404テキスト色選択'
        		);
				?> 
				</div>
				
				<div class="color-box-child">
				<?php 
				genelate_color_picker_tag_demo(
				'notfound-text-shadow', 
        	  	$i_page404_titleshadow_color,
        	  	'404テキストシャドウ色選択'
        		);
				?> 
				</div>
				
				<div class="control-setting-btn">
					<button class="top-page-maker-save-btn" type="submit">保存する</button>
					<?php 
						// プレビューボタン
    					$preview_link = add_query_arg(
    			   		 array(
    			   		     'preview' => 'true',
    			   		     'page' => 'page404_preview'
    			   		 ),
    			   		 home_url('/')
    					);
						echo '<button type="button" class="narukami-prevew-btn" onclick="page404PreviewBtn()">PREVIEW</button>';
						echo '
						<script type="text/javascript">
							function page404PreviewBtn() {
								var form = document.getElementById("narukami-404page-form");
								var formData = new FormData(form);
								var xhr = new XMLHttpRequest();
								var preview_link = "' . $preview_link . '";
								var previewWindow = window.open(preview_link, "_blank");
								xhr.open("POST", preview_link, true);
								xhr.onreadystatechange = function () {
									if (xhr.readyState == 4) {
										console.log("XHR Status:", xhr.status);
									if (xhr.status == 200) {
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
				<?php wp_nonce_field('update_404page_action', 'update_404page_nonce'); ?>
			</div><!--inputForm end-->
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
