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
						<?php
						$opt = get_option('textnew');
							echo($opt[0]);
							echo($opt[1]);
						
					    $textform = array(
							'<input type="text" id="text" name="textnew[]" value=> echo($opt[0])',
							'<input type="text" id="text" name="textnew[]" value=> echo($opt[1])',
							'<input type="text" id="text" name="textnew[]" value=> echo($opt[2])'
						);
						
						foreach( $textform as $roop){
							echo $roop;
						}
						?>
						
						
			  		</div>
			        <div class="url_form_wrap">
						<p class="form_title">URL</p>
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
        </div>
      </div>
	</div>
	<?php submit_button(); ?>
	</form>
		<form action="admin.php?page=custom_submenu_page_5" method="post">
			
			
			<input type="text" id="text" name="textform" value="">
			
			
			
			<button type="submit">追加</button>
			
		</form>
		<?php 
            $textname = get_option('textnew');
			var_dump($textname);
        ?>
</div>
