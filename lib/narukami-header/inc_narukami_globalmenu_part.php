<div id="globalmenu_setting_wrap" class="narukami_globalmenu_setting_wrap">
	<div class="globalmenu_part_Prevew">
		<article class="globalmenuPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			$i_global_title_array = sanitize_option_value(get_option('global_title_array'));
			$i_global_url_array = sanitize_option_value(get_option('global_url_array'));
			// 連想配列を作成
			$global_items_Array = array();
			
			// $i_global_title_arrayが配列であるかを確認
			if (is_array($i_global_title_array)) {
				// 各変数が配列であるかを確認
				if (is_array($i_global_url_array)) {
					for ($global = 0; $global < count($i_global_title_array); $global++) {
						// 配列のインデックスが存在するかを確認
						if (isset($i_global_title_array[$global])) {
							$global_items_Array[$i_global_title_array[$global]] = array(
								'title' => $i_global_title_array[$global],
								'url' => $i_global_url_array[$global]
							);
						} else {
						//url, pagelink,　エラーハンドリング
						}
					}
				} else {
					//arrayに対するエラーハンドリング
				}
			} else {
				//全体arrayに対するエラーハンドリング
			}
			if(is_array($global_items_Array)){
				foreach($global_items_Array as $key=>$value){
					echo $value['title'];
					echo $value['url'];
				}
			}
		?>
		<div class="globalmenu-back-wrap"
			 style="background-color: <?php echo $i_header_bgcolor; ?>; display: <?php echo $disp_switch; ?>;">
			<div class="globalmenu-flex-setting">
				<ul class="globalmenu-title-wrap">
					<li><a href="<?php echo $i_global_item_link; ?>" class="globalmenu-item-title" 
					   style="color: <?php echo $i_header_textcolor_setting; ?>;">
						<?php echo $i_global_item_title?></a></li>
				</ul>
			</div>
		</div>
		<?php
		if (isset($global_items_Array) && is_array($global_items_Array)) {
			foreach ($global_items_Array as $key => $values ) {
				echo "<li><a class='globalmenu-item-title' href='" . $values['url'] . "'>" . $values['title'] . "</li></a>";
			}											  
		}
		?>
		</article>
	</div>
	<div class="inputForm">
	<h4>グローバルメニュー背景色設定。</h4>
		<div class="color-box-child">
		<?php 
			genelate_color_picker_tag_demo(
          	'globalmenu-bg-color', 
          	get_option('globalmenu-bg-color'),
          	'デフォルトは透明です。変更後再度透明にしたい場合は、クリアを押してください。'
        	);
		?> 
		</div>
	<h4>グローバルメニューのタイトルとリンクURLを入力してください。</h4>
		<div class="globalmenu-flex-wrap">
			<div class="flex-child-wrap">
				<p>タイトル</p>
				<input type="text" name="global_item_title[]" class="img-setect-url">
			</div>
			<div class="flex-child-wrap">
				<p>リンクURL</p>
				<input type="text" name="global_item_link[]" class="img-setect-url">
			</div>
		</div>
	<h4>グローバルメニューの文字色を設定してください。</h4>
		<div class="color-box-child">
		<?php 
			genelate_color_picker_tag_demo(
          	'globalmenu-bg-color', 
          	get_option('globalmenu-bg-color'),
          	'テキスト色変更。'
        	);
		?> 
		</div>
	</div><!--inputform-end-->
</div><!--all-wrap-end-->