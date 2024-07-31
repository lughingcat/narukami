<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); 
	?>
	
	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">鳴雷ヘッダー設定[NarukamiHeaderSetting]</span></h3>
        <div class="inside">
			<div class="tab-setting-all-wrap">
				<div class="tab-button-wrap">
				 	<button class="tablinks" onclick="openTab(event, 'Tab1')">ヘッダー設定</button>
				 	<button class="tablinks" onclick="openTab(event, 'Tab2')">グローバルメニュー設定</button>
				 	<button class="tablinks" onclick="openTab(event, 'Tab3')">ヒーローヘッダー設定</button>
				 	<button class="tablinks" onclick="openTab(event, 'Tab4')">サイトアニメーション設定</button>
				</div>
				<form id="narukami-header-form" method="post" name="narukami-header-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
					<input type="hidden" name="action" value="update_custom_option" /><!--アクション名(フック用)-->
					<div class="tab-content-wrap">
						<div id="narukami-header-setting" class="tabcontent" style="display: none;">
					  		<h3>ヘッダープレビュー</h3>
					  		<?php include('inc_narukami_header_part.php');?>
						</div>
						
						<div id="narukami-globalmenu-setting" class="tabcontent" style="display: none;">
					  		<h3>グローバルメニュープレビュー</h3>
					  		<?php include('inc_narukami_globalmenu_part.php');?>
						</div>
						
						<div id="narukami-heroheader-setting" class="tabcontent">
					  		<h3>ヒーローヘッダープレビュー</h3>
					 		<?php include('inc_narukami_heroheader_part.php');?>
						</div>
					
						<div id="narukami-siteanimation-setting" class="tabcontent">
					  		<h3>Tab 3</h3>
					  		<p>Content for Tab 3.</p>
						</div>
					</div><!--tab-content-wrap-end-->
					<button type="submit">保存する</button>
					<?php wp_nonce_field('update_header_action', 'update_header_nonce'); ?>
				</form><!--form-end-->
			</div><!--tab-setting-all-wrap-end-->
        </div><!--inside-end-->
      </div><!--postbox bg-end-->
    </div><!--metabox-holder-end-->
</div><!--back_wrap-end-->
		