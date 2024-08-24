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
				 	<button class="tablinks" onclick="openTab(this, 'header-tab1')">ヘッダー設定</button>
				 	<button class="tablinks" onclick="openTab(this, 'header-tab2')">グローバルメニュー設定</button>
				 	<button class="tablinks" onclick="openTab(this, 'header-tab3')">ヒーローヘッダー設定</button>
				 	<button class="tablinks" onclick="openTab(this, 'header-tab4')">サイトアニメーション設定</button>
				</div>
				<form id="narukami-header-form" method="post" name="narukami-header-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
					<input type="hidden" name="action" value="update_custom_option" /><!--アクション名(フック用)-->
					<div class="tab-content-wrap">
						<div id="header-tab1" class="tabcontent" style="display: none;">
					  		<h3>ヘッダープレビュー</h3>
					  		<?php include('inc_narukami_header_part.php');?>
						</div>
						
						<div id="header-tab2" class="tabcontent" style="display: none;">
					  		<h3>グローバルメニュープレビュー</h3>
					  		<?php include('inc_narukami_globalmenu_part.php');?>
						</div>
						
						<div id="header-tab3" class="tabcontent" style="display: none;">
					  		<h3>ヒーローヘッダープレビュー</h3>
					 		<?php include('inc_narukami_heroheader_part.php');?>
						</div>
					
						<div id="header-tab4" class="tabcontent" style="display: none;">
					  		<h3>サイトアニメーション設定</h3>
					  		<?php include('inc_narukami_animation_setting.php');?>
						</div>
					</div><!--tab-content-wrap-end-->
					<div class="control-setting-btn">
						<button id="header-setting-save-btn" type="submit" class="top-page-maker-save-btn">設定を保存</button>
						<?php 
						// プレビューボタン
    					$preview_link = add_query_arg(
    			   		 array(
    			   		     'preview' => 'true',
    			   		     'page' => 'toppage_header_preview'
    			   		 ),
    			   		 home_url('/')
    					);
						echo '<button type="button" class="narukami-prevew-btn" onclick="submitHeaderPreviewForm()">PREVEW</button>';
						echo '
						<script type="text/javascript">
							function submitHeaderPreviewForm() {
								var form = document.getElementById("narukami-header-form");
								var formData = new FormData(form);
								var xhr = new XMLHttpRequest();
								var preview_link = "' . $preview_link . '";
								xhr.open("POST", preview_link, true);
								xhr.onreadystatechange = function () {
									if (xhr.readyState == 4) {
										console.log("XHR Status:", xhr.status);
									if (xhr.status == 200) {
										var previewWindow = window.open(preview_link, "_blank");
										previewWindow.document.open();
										previewWindow.document.write(xhr.responseText);
										previewWindow.document.close();
									}
									}
								};
								xhr.send(formData);
							}
						</script>
							';
						?>
					</div>
					<?php wp_nonce_field('update_header_action', 'update_header_nonce'); ?>
				</form><!--form-end-->
			</div><!--tab-setting-all-wrap-end-->
        </div><!--inside-end-->
      </div><!--postbox bg-end-->
    </div><!--metabox-holder-end-->
</div><!--back_wrap-end-->
		