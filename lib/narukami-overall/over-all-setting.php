<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">鳴雷全体設定[NarukamiOverallSetting]</span></h3>
        	<div class="inside">
			<?php
				$i_narukami_font_family = sanitize_option_value(get_option('narukami-font-family', "Sawarabi Gothic"));
				function is_selected($option_value, $selected_font_family) {
    			// オプションの値と選択されたフォントが一致していれば 'selected' を返す
    				return $option_value === $selected_font_family ? 'selected' : '';
				}
				$font_family_css = "'{$i_narukami_font_family}', sans-serif";
			?>
				
			<form id="narukami-overall-form" method="post" name="narukami-overall-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_overall"/><!--post_nonce_check.phpへ送信(フッター用)-->
			<div class="inputForm notfound-page-wrap">
				<h4>サイトフォント設定</h4>
				<p class="font-change-preview"
				   style="font-family: <?php echo $font_family_css; ?>">
					下記のフォントをセレクトするとフォントが変更されます。<br>
					サイトのジャンルに合うフォントを選択してください。<br>
					ここで選択したフォントをサイトに反映させる為には設定を保存する必要があります。<br>
				</p>
				<select id="font-family-select" name="narukami-font-family">
    				<option value="Sawarabi Gothic" <?php echo is_selected("Sawarabi Gothic", $i_narukami_font_family); ?>>「ポップ」 Sawarabi Gothic</option>
    				<option value="M PLUS Rounded 1c" <?php echo is_selected("M PLUS Rounded 1c", $i_narukami_font_family); ?>>「ポップ」 M PLUS Rounded 1c</option>
    				<option value="Noto Sans JP" <?php echo is_selected("Noto Sans JP", $i_narukami_font_family); ?>>「和風」 Noto Sans JP</option>
    				<option value="Sawarabi Mincho" <?php echo is_selected("Sawarabi Mincho", $i_narukami_font_family); ?>>「和風」 Sawarabi Mincho</option>
    				<option value="Kosugi Maru" <?php echo is_selected("Kosugi Maru", $i_narukami_font_family); ?>>「高級感」 Kosugi Maru</option>
    				<option value="M PLUS 1p" <?php echo is_selected("M PLUS 1p", $i_narukami_font_family); ?>>「高級感」 M PLUS 1p</option>
    				<option value="Roboto" <?php echo is_selected("Roboto", $i_narukami_font_family); ?>>「シンプル」 Roboto</option>
				</select>

				<h4>背景画像設定</h4>
				
				<h4>ファビコン設定</h4>
				
				<h4>スクロールトップボタン設定</h4>
				ボタンの表示/非表示
				ボタンの背景色
				ボタンの矢印色
				
				<h4>電話ボタン設定</h4>
				電話ボタンの表示/非表示
				電話ボタンの背景色
				電話ボタンの文字色
				
			
				<div class="control-setting-btn">
					<button class="top-page-maker-save-btn" type="submit">保存する</button>
				</div>
				<?php wp_nonce_field('update_overall_action', 'update_overall_nonce'); ?>

			</div><!--inputForm end-->
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
<script>
document.getElementById('font-family-select').addEventListener('change', function() {
    var selectedFont = this.value;
	var fontChangeEl = document.querySelector('.font-change-preview');
    fontChangeEl.style.fontFamily = selectedFont;
	 localStorage.setItem('selectedFontFamily', selectedFont);
});
	
window.addEventListener('DOMContentLoaded', function() {
    var savedFont = localStorage.getItem('selectedFontFamily');
    var fontChangeEl = document.querySelector('.font-change-preview');
    
    if (savedFont) {
        // 保存されたフォントがあればプレビューに適用
        fontChangeEl.style.fontFamily = savedFont;

        // セレクトボックスの選択状態を更新
        var selectBox = document.getElementById('font-family-select');
        selectBox.value = savedFont;
    }
});

</script>

</script>