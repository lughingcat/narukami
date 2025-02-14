<div id="globalmenu_setting_wrap" class="narukami_globalmenu_setting_wrap">
	<div class="globalmenu_part_Prevew">
		<article class="globalmenuPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
		    global $wpdb;
			//変数初期値設定
			$global_title_value1 = "Samle 1";
			$global_title_value2 = "Samle 2";
			$global_title_value3 = "Samle 3";
			
			$global_url_value1 = home_url();
			$global_url_value2 = home_url();
			$global_url_value3 = home_url();
			
			$i_global_title_array = sanitize_option_value(get_option('global_title_array',array($global_title_value1,$global_title_value2,$global_title_value3)));
			$i_global_url_array = sanitize_option_value(get_option('global_url_array',array($global_url_value1,$global_url_value2,$global_url_value3)));
			$i_gloalmenu_bgcolor = sanitize_option_value(get_option('gloalmenu_bgcolor', '#000'));
			$i_gloalmenu_textcolor = sanitize_option_value(get_option('gloalmenu_textcolor', '#ffffff'));
			$i_humberger_btn_bg = sanitize_option_value(get_option('humberger_btn_bg', '#0086ad'));
			$i_humberger_arrowcolor = sanitize_option_value(get_option('humberger-arrowcolor', '#ffffff'));
			$i_global_textunderlinecolor = sanitize_option_value(get_option('global-textunderlinecolor', '#ffffff'));
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
						//タイトル, URL,　エラーハンドリング
						}
					}
				} else {
					//arrayに対するエラーハンドリング
				}
			} else {
				//全体arrayに対するエラーハンドリング
			}
		?>
		<div class="globalmenu-content-all-wrap">
			<div class="humberger-button-wrap" style="background-color: <?php echo $i_humberger_btn_bg; ?>">
				<div class="span-wrap">
					<span style="background-color: <?php echo $i_humberger_arrowcolor; ?>"></span>
					<span style="background-color: <?php echo $i_humberger_arrowcolor; ?>"></span>
					<span style="background-color: <?php echo $i_humberger_arrowcolor; ?>"></span>
				</div>
			</div>
			<div class="globalmenu-back-wrap"
				 style="background-color: <?php echo $i_gloalmenu_bgcolor; ?>;">
				<div class="globalmenu-flex-setting">
					<ul class="globalmenu-title-wrap">
						<?php
					if (isset($global_items_Array) && is_array($global_items_Array)) {
						foreach ($global_items_Array as $key => $values ) {
						echo "<li style='border-bottom: 1px solid " . $i_global_textunderlinecolor . ";'>
        				<a class='globalmenu-item-title' 
           				style='color: " . $i_gloalmenu_textcolor . ";' 
           				href='" . $values['url'] . "'>
						" . $values['title'] . "
						</a>
      					</li>";


						}											  
					}
					?>
					</ul>
				</div>
			</div><!--globalmenu-back-wrap-end-->
			<div class="store-web-site">
				<h2>STORE WEB SITE</h2>
			</div>
		</div><!--globalmenu-content-all-wrap-end-->
		</article>
	</div>
	<div class="inputForm">
	<h4>グローバルメニュー背景色設定。</h4>
		<div class="color-box-all-wrap">
			<div class="color-box-child">
			<?php 
				genelate_color_picker_tag_demo(
          		'globalmenu-bg-color', 
          		$i_gloalmenu_bgcolor,
          		'グローバルメニュー背景色。'
        		);
			?> 
			</div>
			<div class="color-box-child">
			<?php 
				genelate_color_picker_tag_demo(
          		'humberger-btn-bg', 
          		$i_humberger_btn_bg,
          		'ハンバーガーメニューボタン背景色。'
        		);
			?> 
			</div>
			<div class="color-box-child">
			<?php 
				genelate_color_picker_tag_demo(
          		'humberger-arrowcolor', 
          		$i_humberger_arrowcolor,
          		'ハンバーガーメニュー矢印色。'
        		);
			?> 
			</div>
			<div class="color-box-child">
			<?php 
				genelate_color_picker_tag_demo(
          		'global-textunderlinecolor', 
          		$i_global_textunderlinecolor,
          		'テキストアンダーライン色'
        		);
			?> 
			</div>
		</div>
	<h4>グローバルメニューの文字色を設定してください。</h4>
		<div class="color-box-child">
		<?php 
			genelate_color_picker_tag_demo(
          	'globalmenu-text-color', 
          	$i_gloalmenu_textcolor,
          	'テキスト色変更。'
        	);
		?> 
		</div>
	<h4>グローバルメニューのタイトルとリンクURLを入力してください。</h4>
		<div class="global-form-wrap">
		<?php
		if (isset($global_items_Array) && is_array($global_items_Array)) {
		$global_lentgh = 0;
		foreach ($global_items_Array as $key2 => $items ) {
			echo "<div id='global-flex-wrap_$global_lentgh' class='globalmenu-flex-wrap'>";
			echo "<div class='flex-child-wrap'>";
			echo "<p>タイトル</p>";
			echo '<input type="text" name="global_item_title[]" class="img-setect-url" value="' . $items['title'] . '">';
			echo "</div>";
			echo "<div class='flex-child-wrap'>";
			echo "<p>リンクURL</p>";
			echo '<input type="text" name="global_item_link[]" class="img-setect-url" value="' . $items['url'] . '">';
			echo "</div>";
			echo '<button type="button" class="globalmenu-delete-btn" onClick="globalmenuDeleteElement(this)">削除</button>';
			echo "</div>";
			$global_lentgh++;
		}
		}
		?>
		</div>
	</div><!--inputform-end-->
	<button id="globalmenu-add-btn" type="button" class="reproduction-btn">フォームを追加する</button>
</div><!--all-wrap-end-->