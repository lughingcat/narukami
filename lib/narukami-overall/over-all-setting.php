<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">鳴雷全体設定[NarukamiOverallSetting]</span></h3>
        	<div class="inside">
			<?php
			?>
			<form id="narukami-overall-form" method="post" name="narukami-overall-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_overall" /><!--post_nonce_check.phpへ送信(フッター用)-->
			<div class="inputForm notfound-page-wrap">
				<h4>背景画像設定</h4>
				<input type="text" name="banner-title" class="img-setect-url" value="<?php echo $i_banner_title; ?>" placeholder="告知タイトルを入力してください">
				<h4>ファビコン設定</h4>
				<?php
  				generate_upload_image_single_tag('favicon-img', $i_favicon_img);
				?>
				<h4>バナーのリンク先ページのURLを入力してください。</h4>
				<input type="text" name="banner-link" class="img-setect-url" value="<?php echo $i_banner_link; ?>" placeholder="URLを入力してください">
			
				<div class="control-setting-btn">
					<button class="top-page-maker-save-btn" type="submit">保存する</button>
				</div>
				<?php wp_nonce_field('update_overall_action', 'update_overall_nonce'); ?>
			</div><!--inputForm end-->
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
<script>

</script>