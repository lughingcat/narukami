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
			  	<div class="text_wrap">
                <p>タイトル<input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>" onclick="addForm()" placeholder="タイトル" ></p>
                <p>URL<input type="url" id="url" name="url" value="<?php echo get_option('url'); ?>" placeholder="https://~" ></p>
				</div>
			  	<div class="add_remove_btn_wrap">
					<button class="add_btn">追加</button>
					<button class="remove_btn">削除</button>
				</div>
          </div>
        </div>
      </div>
	</div>
	<?php submit_button(); ?>
	</form>
</div>