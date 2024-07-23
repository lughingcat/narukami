<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
	
	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">鳴雷ヘッダー設定[NarukamiHeaderSetting]</span></h3>
        <div class="inside">
			<div class="tab-setting-all-wrap">
				<div class="tab-button-wrap">
				 	<button class="tablinks" onclick="openTab(event, 'Tab1')">ヘッダー設定</button>
				 	<button class="tablinks" onclick="openTab(event, 'Tab2')">ヒーローヘッダー設定</button>
				 	<button class="tablinks" onclick="openTab(event, 'Tab3')">サイトアニメーション設定</button>
				</div>
				<div class="tab-content-wrap">
					<div id="narukami-header-setting" class="tabcontent">
				  		<h3>Tab 1</h3>
				  		<p>Content for Tab 1.</p>
					</div>
				
					<div id="narukami-heroheader-setting" class="tabcontent">
				  		<h3>Tab 2</h3>
				 		<p>Content for Tab 2.</p>
					</div>
				
					<div id="narukami-siteanimation-setting" class="tabcontent">
				  		<h3>Tab 3</h3>
				  		<p>Content for Tab 3.</p>
					</div>
				</div><!--tab-content-wrap-end-->
			</div><!--tab-setting-all-wrap-end-->
        </div><!--inside-end-->
      </div><!--postbox bg-end-->
    </div><!--metabox-holder-end-->
</div><!--back_wrap-end-->
		