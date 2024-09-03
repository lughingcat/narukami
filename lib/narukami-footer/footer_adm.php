<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">フッター設定[NarukamifooterSetting]</span></h3>
        	<div class="inside">
			<?php
			$i_footer_title_array = sanitize_option_value(get_option('footer_item_title', ''));
			$i_footer_url_array = sanitize_option_value(get_option('footer_item_link', ''));
			$footer_bg_color = sanitize_option_value(get_option('footer-bg-color'));
			$footer_textcolor = sanitize_option_value(get_option('footer-textcolor'));
			?>
			<form id="narukami-footer-form" method="post" name="narukami-footer-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_footer" /><!--post_nonce_check.phpへ送信(フッター用)-->
				<h3>フッタープレビュー</h3>
		<div class="inputForm">
			<h4>各種配色を選択してください。</h4>
				<div class="color-bg-box">
					<div class="color-box-child">
					  	<?php 
				  		genelate_color_picker_tag_demo(
                    	'footer-bg-color', 
						$footer_bg_color, 
						'フッターの背景色を選択してください。(クリアで透過)'
                  		);
                  		?>
					</div>
					<div class="color-box-child">
					  	<?php 
				  		genelate_color_picker_tag_demo(
                    	'footer-textcolor', 
                    	$footer_textcolor, 
                    	'テキストの文字色を選択してください。'
                  		);
                  		?> 
					</div>
		     	</div><!--color-bg-box end-->
		</div><!--inputForm end-->
			<div class="control-setting-btn">
				<button class="top-page-maker-save-btn" type="submit">保存する</button>
			</div>
				<?php wp_nonce_field('update_footer_action', 'update_footer_nonce'); ?>
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
