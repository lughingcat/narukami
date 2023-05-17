<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">ヘッダー設定</span></h3>
        <div class="inside">
			<h2 class="narukami-admin-h2">トップページビルダー</h2>
			<form method="post" name="test" action="">
          <div class="main">
			  <?php
			  $urlrink = get_template_directory_uri();'/lib/test.php"';
				  
			  ?>
			  <select name="cmaker" class="cmaker-wrap" id="cmaker" onchange="cmakerChange()">
				  <option hidden>選択してください。</option>
				  <option value="select1">コンテンツ１</option>
				  <option value="select2">スライダー</option>
				  <option value="select3">２ブロックカラム</option>
			  </select>
			  <div id="cmakerCild" style="display: none;">
				  <?php get_template_part('lib/content1'); ?>
			  </div>
			  <button type="submit">送信</button>
          </div><!--mainEnd-->
			</form>
          </div> 
        </div>
      </div>
	<div class="wp-submitAllBtn">
	<?php submit_button('全体をサイトへ反映'); ?>
	</div>
</div>