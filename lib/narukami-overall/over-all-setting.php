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
				
				<h4>ファビコン設定</h4>
				
				<h4>スクロールトップボタン設定</h4>
				ボタンの表示/非表示
				ボタンの背景色
				ボタンの矢印色
				
				<h4>電話ボタン設定</h4>
				電話ボタンの表示/非表示
				電話ボタンの背景色
				電話ボタンの文字色
				
			
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