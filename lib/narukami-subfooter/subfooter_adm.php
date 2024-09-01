<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">サブフッター[NarukamiSubfooterSetting]</span></h3>
        	<div class="inside">
			<?php
			$i_subfooter_use_notuse = sanitize_option_value(get_option('subfooter-use-notuse'));
			$i_subfooter_title_array = sanitize_option_value(get_option('subfooter_item_title', ['']));
			$i_subfooter_url_array = sanitize_option_value(get_option('subfooter_item_link', ['']));
			$subfooter_bg_color = sanitize_option_value(get_option('subfooter-bg-color'));
			$subfooter_textcolor = sanitize_option_value(get_option('subfooter-textcolor'));
			//サブフッターの使用不使用チェック分岐
			if(isset($i_subfooter_use_notuse)){
				if($i_subfooter_use_notuse === "subfooter-use"){
					$subfooter_use_check = "checked";
				}else{
					$subfooter_use_check = "";
				}
			}
			// 連想配列を作成
			$subfooter_items_Array = array();
			
			// $i_subfooter_title_arrayが配列であるかを確認
			if (is_array($i_subfooter_title_array)) {
				// 各変数が配列であるかを確認
				if (is_array($i_subfooter_url_array)) {
					for ($subfooter = 0; $subfooter < count($i_subfooter_title_array); $subfooter++) {
						// 配列のインデックスが存在するかを確認
						if (isset($i_subfooter_title_array[$subfooter])) {
							$subfooter_items_Array[$i_subfooter_title_array[$subfooter]] = array(
								'title' => $i_subfooter_title_array[$subfooter],
								'url' => $i_subfooter_url_array[$subfooter]
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
			<form id="narukami-subfooter-form" method="post" name="narukami-subfooter-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_subfooter" /><!--post_nonce_check.phpへ送信(サブフッター用)-->
				<h3>サブフッタープレビュー</h3>
          		<div class="subfooter-preview-all-wrap"
					 style="background-color: <?php echo $subfooter_bg_color; ?>;">
            		<div class="subfooter-wrap">
						<ul class="subfooter-ul-wrap">
						<?php
						if (isset($subfooter_items_Array) && is_array($subfooter_items_Array)) {
							foreach ($subfooter_items_Array as $key => $values ) {
							echo "<li>
        					<a class='subfooter-item-title' 
           					style='color: " . $subfooter_textcolor . ";' 
           					href='" . $values['url'] . "'>
							" . $values['title'] . "
							</a>
      						</li>";
							}											  
						}
						?>
						</ul>
					</div>
				</div><!--subfooter-preview-all-wrap end-->
			<div class="inputForm">
			<h4>サブフッターの使用について</h4>
			<p>使用するにチェックを入れるとトップページ以外の全ページにサブフッターが表示され、</br>リンク先ページへの動線がひかれる為ユーザーへの訴求が容易になります。</p>
			<p>ユーザーのサイト回遊を高める為にも使用する事をお勧めします。</p>
			<label><input type="checkbox" name="subfooter-use-notuse" value="subfooter-use" <?php echo $subfooter_use_check; ?>>サブフッターを使用する。</label>
			<h4>各種配色を選択してください。</h4>
				<div class="color-bg-box">
					<div class="color-box-child">
					  	<?php 
				  		genelate_color_picker_tag_demo(
                    	'subfooter-bg-color', 
						$subfooter_bg_color, 
						'サブフッターの背景色を選択してください。'
                  		);
                  		?>
					</div>
					<div class="color-box-child">
					  	<?php 
				  		genelate_color_picker_tag_demo(
                    	'subfooter-textcolor', 
                    	$subfooter_textcolor, 
                    	'テキストの文字色を選択してください。'
                  		);
                  		?> 
					</div>
		     	</div><!--color-bg-box end-->
			<h4>サブフッターのタイトルとリンクURLを入力してください。(最大６個)</h4>
			<div class="global-form-wrap">
			<?php
			if (isset($subfooter_items_Array) && is_array($subfooter_items_Array)) {
			$subfooter_lentgh = 0;
			foreach ($subfooter_items_Array as $key => $items ) {
			echo "<div id='subfooter-flex-wrap_$subfooter_lentgh' class='globalmenu-flex-wrap'>";
			echo "<div class='flex-child-wrap'>";
			echo "<p>タイトル</p>";
			echo '<input type="text" name="subfooter_item_title[]" class="img-setect-url" value="' . $items['title'] . '">';
			echo "</div>";
			echo "<div class='flex-child-wrap'>";
			echo "<p>リンクURL</p>";
			echo '<input type="text" name="subfooter_item_link[]" class="img-setect-url" value="' . $items['url'] . '">';
			echo "</div>";
			echo '<button type="button" class="globalmenu-delete-btn" onClick="subfooterMenuDeleteElement(this)">削除</button>';
			echo "</div>";
			$subfooter_lentgh++;
			}
			}
			?>
		</div>
			</div><!--inputForm end-->
				<button id="subfooter-add-btn" type="button" class="reproduction-btn">フォームを追加する</button>
				<button type="submit">保存する</button>
				<?php wp_nonce_field('update_subfooter_action', 'update_subfooter_nonce'); ?>
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
