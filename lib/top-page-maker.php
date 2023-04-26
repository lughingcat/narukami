<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">ヘッダー設定</span></h3>
        <div class="inside">
			<h2 class="narukami-admin-h2">トップページビルダー</h2>
          <div class="main">
			  <select name="cmker">
				  <option value="スライダー">page1</option>
				  <option value="ヒーロー">page2</option>
				  <option value="コンテンツ２">page3</option>
			  </select>
          </div><!--mainEnd-->
          </div> 
        </div>
      </div>
	<div class="wp-submitAllBtn">
	<?php submit_button('全体をサイトへ反映'); ?>
	</div>
</div>