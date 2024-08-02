<?php
$i_hh_move = sanitize_option_value(get_option('hero-H-move'));
$i_hh_move_title = sanitize_option_value(get_option('hero-H-moveTitle'));
$i_hh_move_backshadow = sanitize_option_value(get_option('hero-H-movebackshadow'));

?>
<div class="heromove-all-wrap">
	<h4 class="h-admin-4-bg">ヒーローヘッダーの動画を選択してください。</h4>
		<?php
  		generate_upload_image_single_tag('hh-move', $i_hh_move);
		?>
	<h4>ヒーローヘッダータイトルを入力してください。</h4>
		<input type="text" name="hh-move-title" class="img-setect-url" value="<?php echo $i_hh_move_title ; ?>">
	<h4>ヒーローヘッダーを暗くできます。タイトルを目立たせたい時に暗くしてください。</h4>
		<label><input type="radio" name="hh-moveFrontWrap" value="backshadow-on">暗くする</label>
		<label><input type="radio" name="hh-moveFrontWrap" value="backshadow-off">装飾なし</label>
	<h4>ヒーローヘッダータイトルの文字色を選択してください。</h4>
		<div class="heromove-color-wrap">
			<div class="color-box-child">
			<?php 
			genelate_color_picker_tag_demo(
        	  'hh-moveTitleColor', 
        	  get_option('heroheader-moveTitleTextColor'),
        	  'タイトルのテキスト色'
        	);
			?> 
			</div>
		</div>
		<div class="heromove-color-wrap">
			<div class="color-box-child">
			<?php 
			genelate_color_picker_tag_demo(
        	  'hh-moveTitleShadowColor', 
        	  get_option('heroheader-moveTitleShadowColor'),
        	  'タイトルシャドウ色'
        	);
			?> 
			</div>
		</div>
</div>