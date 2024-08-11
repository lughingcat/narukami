<?php
$i_hh_move = sanitize_option_value(get_option('hero-H-move'));
$i_hh_move_title = sanitize_option_value(get_option('hero-H-moveTitle'));
$i_hh_move_backshadow = sanitize_option_value(get_option('hero-H-movebackshadow'));
$hero_move_backshadow = !empty($i_hh_move_backshadow) ? sanitize_option_value($i_hh_move_backshadow) : 'backshadow-on';
if(isset($hero_move_backshadow)){
	if($hero_move_backshadow === 'backshadow-on'){
		$shadow_on = "checked";
		$shadow_off = "";
	}elseif($hero_move_backshadow === "backshadow-off"){
		$shadow_on = "";
		$shadow_off = "checked";
	}
}
?>
<div class="heromove-all-wrap">
	<h4 class="h-admin-4-bg">ヒーローヘッダーの動画を選択してください。</h4>
		<?php
  		generate_upload_video_single_tag('hh-move', $i_hh_move);
		?>
	<h4>ヒーローヘッダー動画タイトルを入力してください。</h4>
		<input type="text" name="hh-move-title" class="img-setect-url" value="<?php echo $i_hh_move_title ; ?>">
	<h4>ヒーローヘッダーを暗くできます。タイトルを目立たせたい時に暗くしてください。</h4>
		<label><input type="radio" name="hh-moveFrontWrap" value="backshadow-on" <?php echo $shadow_on; ?>>暗くする</label>
		<label><input type="radio" name="hh-moveFrontWrap" value="backshadow-off" <?php echo $shadow_off; ?>>装飾なし</label>
	<h4>ヒーローヘッダー動画タイトルの文字色を選択してください。</h4>
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