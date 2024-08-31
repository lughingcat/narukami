<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">サブフッター[NarukamiSubfooterSetting]</span></h3>
        	<div class="inside">
			<?php
			$subfooter_bg_color = sanitize_option_value(get_option('subfooter-bg-color'));
			$subfooter_textcolor = sanitize_option_value(get_option('subfooter-textcolor'));
			?>
			<form id="narukami-subfooter-form" method="post" name="narukami-subfooter-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_subfooter" /><!--post_nonce_check.phpへ送信(サブフッター用)-->
          		<div class="main">
            
				</div><!--mainEnd-->
			<h4>各種配色を選択してください。</h4>
			<div class="color-bg-box">
				<div class="color-box-child">
				  <?php 
				  genelate_color_picker_tag_demo(
                    'subfooter-bg-color', 
                    $subfooter_bg_color, 
                    'サブフッターの背景色を選択してください。'
                  );
                  ?>
				</div>
				<div class="color-box-child">
				  <?php 
				  genelate_color_picker_tag_demo(
                    'subfooter-textcolor', 
                    $subfooter_textcolor, 
                    'テキストの文字色を選択してください。'
                  );
                  ?> 
				  </div>
		     </div><!--color-bg-box end-->
				<button type="submit">保存する</button>
			<?php wp_nonce_field('update_subfooter_action', 'update_subfooter_nonce'); ?>
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
