<div id="back_wrap">
	<form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">サブフッター設定</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">サブフッターを設定すると、メニュー一覧ページ、個別商品ページに自動で差し込まれます。メニュー内でユーザー回遊が起こりやすく、サイト滞在時間が伸びますので設定する事を推奨します。</p>
			  <p class="prev-adm">プレビュー</p>
				<div class="sub_footer_prev">
					<?php get_template_part('subfooter');?>
				</div>
			  	<h4>サブフッターのタイトルとリンク先URLを記載してください。</h4>
			     <div class="all_form_wrap">
			  		<div class="text_form_wrap">
						<p class="form_title">タイトル</p>
              		  	<input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>">
              		  	<input type="text" id="text" name="text2" value="<?php echo get_option('text2'); ?>" >
              		  	<input type="text" id="text" name="text3" value="<?php echo get_option('text3'); ?>" >
              		  	<input type="text" id="text" name="text4" value="<?php echo get_option('text4'); ?>" >
              		  	<input type="text" id="text" name="text5" value="<?php echo get_option('text5'); ?>" >
			  		</div>
			        <div class="url_form_wrap">
						<p class="form_title">URL</p>
			        	<input type="url" id="url" name="url" value="<?php echo get_option('url'); ?>" >
			        	<input type="url" id="url" name="url2" value="<?php echo get_option('url2'); ?>" >
			        	<input type="url" id="url" name="url3" value="<?php echo get_option('url3'); ?>" >
			        	<input type="url" id="url" name="url4" value="<?php echo get_option('url4'); ?>" >
			        	<input type="url" id="url" name="url5" value="<?php echo get_option('url5'); ?>" >
			        </div>
			     </div>
			  <div class="color-bg-box">
				  <?php 
				  genelate_color_picker_tag_demo(
                    'bgcolor', 
                    get_option('bgcolor'), 
                    'サブフッターの背景色を選択してください。'
                  );
                  ?>
				  <?php 
				  genelate_color_picker_tag_demo(
                    'textcolor', 
                    get_option('textcolor'), 
                    'テキストの文字色を選択してください。'
                  );
                  ?>
			  </div
          </div>
				  <?php if(is_active_sidebar('sidebar-1')): ?>
  　　　　　　　　　　　(<ul>)
  　　　　　　　　　　　  <?php dynamic_sidebar('sidebar-1'); ?>
  　　　　　　　　　　　(</ul>)
　　　　　　　　　　　　　<?php endif; ?>
        </div>
      </div>
	</div>
	<?php submit_button(); ?>
	</form>
		<form action="admin.php?page=custom_submenu_page_5" method="post">
			<?php
             // ファイルポインタをオープン
             $handle = fopen("subfooter-text.txt", "r");
             // ファイル内容を出力
             while ($line = fgets($handle)) {
               echo $line;
             }
             // ファイルポインタをクローズ
             fclose($handle);
             ?>

			<button type="submit" name="addbtn">追加</button>
		</form>
</div>
