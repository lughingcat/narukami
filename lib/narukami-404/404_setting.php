<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">404ページ設定[Narukami404Setting]</span></h3>
        	<div class="inside">
			<?php
				$i_page404_title = sanitize_option_value(get_option('page404-title'));
			?>
			<form id="narukami-404page-form" method="post" name="narukami-404page-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_404page" /><!--post_nonce_check.phpへ送信(フッター用)-->
			<div class="inputForm">
				<h4>404ページの見出しタイトルを入力してください。</h4>
				<input type="text" name="page404-title" class="img-setect-url" value="" placeholder="404 NOT FOUND">
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
						echo '<button type="button" class="narukami-prevew-btn" onclick="page404PreviewBtn()">PREVEW</button>';
						echo '
						<script type="text/javascript">
							function page404PreviewBtn() {
								var form = document.getElementById("narukami-404page-form");
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
				<?php wp_nonce_field('update_404page_action', 'update_404page_nonce'); ?>
			</div><!--inputForm end-->
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
