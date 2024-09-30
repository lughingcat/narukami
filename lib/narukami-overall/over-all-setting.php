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
				$i_narukami_favicon_image = sanitize_option_value(get_option('narukami-favicon-image'));
				$i_background_image = sanitize_option_value(get_option('background_image'));
				$i_background_image_custom_option = get_background_image();
				$i_scroll_btn_bg_color = sanitize_option_value(get_option('scroll-btn-bg-color', ''));
				$i_scroll_btn_arrow_color = sanitize_option_value(get_option('scroll-btn-arrow-color', ''));
				$i_scroll_btn_active = sanitize_option_value(get_option('scroll-btn-active', 'scroll-on'));
				$i_call_btn_active = sanitize_option_value(get_option('call-btn-active', 'call-btn-on'));
				$i_call_btn_bg_color = sanitize_option_value(get_option('call-btn-bg-color'));
				//bg select
				if($i_background_image){
					$bg_img_url = $i_background_image;
				}else{
					$bg_img_url = $i_background_image_custom_option;
				}
				//scroll btn
				if($i_scroll_btn_active){
					if($i_scroll_btn_active === "scroll-on"){
						$scroll_on = "checked";
						$scroll_off = "";
					}else{
						$scroll_on = "";
						$scroll_off = "checked";
					}
				}
				//call btn
				if($i_call_btn_active){
					if($i_call_btn_active === "call-btn-on"){
						$callBtn_on = "checked";
						$callBtn_off = "";
					}else{
						$callBtn_on = "";
						$callBtn_off = "checked";
					}
				}
				
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
				<?php
  				generate_upload_image_single_tag('background_image', $bg_img_url);
				?>
				<h4>ファビコン設定</h4>
				<?php
  				generate_upload_image_single_tag('narukami-favicon-image', $i_narukami_favicon_image);
				?>
				<h4>スクロールトップボタン設定</h4>
				<label><input class="scroll-btn-active" type="radio" name="scroll-btn-active" value="scroll-on" <?php echo $scroll_on; ?>>スクロールボタンを表示する。</label>
				<label><input class="scroll-btn-active" type="radio" name="scroll-btn-active" value="scroll-off" <?php echo $scroll_off; ?>>スクロールボタンを非表示にする。</label>
				
				<div class="scroll-btn-design notshow">
					<h4>アイコンの種類を選択してください</h4>
					<p class="preview-text">スクロールアイコン PREVIEW</p>
					<div id="icon-preview" class="scroll-icon-preview" 
						 style="color: <?php echo $i_scroll_btn_arrow_color; ?>;">
					</div>
					<select id="icon-select">
					    <option value="fas fa-chevron-up">Chevron Up</option>
					    <option value="fas fa-arrow-up">Arrow Up</option>
					    <option value="fas fa-caret-up">Caret Up</option>
					</select>

					<div class="color-box-child">
					<?php 
					genelate_color_picker_tag_demo(
        	  		'scroll-btn-bg-color', 
        	  		$i_scroll_btn_bg_color,
        	  		'ボタンの背景色'
        			);
					?> 
					</div>
					
					<div class="color-box-child">
					<?php 
					genelate_color_picker_tag_demo(
        	  		'scroll-btn-arrow-color', 
        	  		$i_scroll_btn_arrow_color,
        	  		'ボタンの矢印色'
        			);
					?> 
					</div>
				</div>
				
				<h4>電話ボタン設定</h4>
				<p>
				スマホでサイトが表示された時に出現します。<br>
				ボタンをタップするとお店に電話をかける事ができ、ご予約までの流れがスムーズになります。<br>
				</p>
				<label><input class="call-btn-active" type="radio" name="call-btn-active" value="call-btn-on" <?php echo $callBtn_on; ?>>電話ボタンを表示する。</label>
				<label><input class="call-btn-active" type="radio" name="call-btn-active" value="call-btn-off" <?php echo $callBtn_off; ?>>電話ボタンを非表示にする。</label>
				
				<div class="call-btn-design">
					<p class="preview-text">電話アイコン PREVIEW</p>
					<div id="call-icon-preview" class="call-icon-preview" 
						 style="color: <?php echo $i_call_btn_bg_color; ?>;">
						<i class="fas fa-phone-square"></i>
					</div>

					<div class="color-box-child">
					<?php 
					genelate_color_picker_tag_demo(
        	  		'call-btn-bg-color', 
        	  		$i_call_btn_bg_color,
        	  		'ボタンの背景色'
        			);
					?> 
					</div>
				</div>
				
			
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
//font-family
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

//font-awesome preview
document.getElementById('icon-select').addEventListener('change', function() {
    var selectedIconClass = this.value;
	var bgColor = 'background-color: <?php echo esc_attr($i_scroll_btn_bg_color); ?>;';
    document.getElementById('icon-preview').innerHTML = '<i class="' + selectedIconClass + '"style="' + bgColor + ';"></i>';
	localStorage.setItem('scrollIconFont', selectedIconClass)
});
	
window.addEventListener('DOMContentLoaded', function() {
    var previewIconContainer = document.getElementById('icon-preview');
    var selectedFont = localStorage.getItem('scrollIconFont');
	var bgColor = 'background-color: <?php echo esc_attr($i_scroll_btn_bg_color); ?>;';
	
    if (selectedFont) {
        previewIconContainer.innerHTML = '<i class="' + escapeHTML(selectedFont) + '"style="' + bgColor + ';"></i>';
		document.getElementById('icon-select').value = escapeHTML(selectedFont);
    } else {
        previewIconContainer.innerHTML = '<i class="fas fa-chevron-up" style="' + bgColor + ';"></i>';
		document.getElementById('icon-select').value = 'fas fa-chevron-up';
    }
});

// HTMLエスケープ関数を追加して、XSS 攻撃を防ぐ
function escapeHTML(str) {
    var div = document.createElement('div');
    div.appendChild(document.createTextNode(str));
    return div.innerHTML;
}
	
// ページロード時に表示/非表示を設定する関数
  function initializeScrollButtonVisibility() {
    var selectedValue = document.querySelector('input[name="scroll-btn-active"]:checked').value;
    toggleScrollButton(selectedValue);
  }

  // スクロールボタンの表示・非表示を切り替える関数
  function toggleScrollButton(value) {
    var scrollBtnDesign = document.querySelector('.scroll-btn-design');
    if (value === 'scroll-on') {
      scrollBtnDesign.classList.remove('notshow');
    } else {
      scrollBtnDesign.classList.add('notshow');
    }
  }

  // DOMが完全に読み込まれたら実行
  window.addEventListener('DOMContentLoaded', function() {
    initializeScrollButtonVisibility(); // ページロード時に表示を設定

    // ラジオボタンの変更を監視して表示を切り替え
    var radioButtons = document.querySelectorAll('input[name="scroll-btn-active"]');
    radioButtons.forEach(function(radio) {
      radio.addEventListener('change', function() {
        toggleScrollButton(this.value);
      });
    });
  });
	
//電話ボタンプレビューの表示/非表示切り替え
document.addEventListener('DOMContentLoaded', function () {
    const callBtnDesign = document.querySelector('.call-btn-design');
    const radioButtons = document.querySelectorAll('.call-btn-active');

    // ラジオボタンの状態に応じて表示・非表示を切り替える関数
    function toggleCallBtnDesign() {
        const isCallBtnOn = document.querySelector('input[name="call-btn-active"]:checked').value === 'call-btn-on';
        callBtnDesign.classList.toggle('notshow', !isCallBtnOn);
    }

    // 初期状態の設定
    toggleCallBtnDesign();

    // ラジオボタンの切り替え時に表示・非表示を更新
    radioButtons.forEach(radio => {
        radio.addEventListener('change', toggleCallBtnDesign);
    });
});
</script>