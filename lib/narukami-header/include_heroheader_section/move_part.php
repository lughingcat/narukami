<?php
$move_type = sanitize_option_value(get_option('move-type', ''));
$youtube_id = sanitize_option_value(get_option('youtube-id',''));
$youtube_full_path = 'https://www.youtube.com/watch?v=' . $youtube_id;
$i_hh_move = sanitize_option_value(get_option('hero-H-move'));
$i_hh_move_title = sanitize_option_value(get_option('hero-H-moveTitle', 'SITE TITLE'));
$i_hh_move_backshadow = sanitize_option_value(get_option('hero-H-movebackshadow', 'backshadow-on'));
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
//checkbox初期値設定
$youtube_checked = '';
$original_checked = '';

// original のときのみ original を checked にする
if ($move_type === 'original') {
    $original_checked = 'checked';
} else {
    // それ以外は全部 youtube を初期値にする
    $youtube_checked = 'checked';
}
?>
<div class="heromove-all-wrap">
	<h4>ヒーローヘッダーの動画タイプを選択してください</h4>
	<label><input type="radio" class="" name="move-type" value="youtube" <?php echo $youtube_checked; ?>>youtubeを使用する。</label>
	<label><input type="radio" class="" name="move-type" value="original" <?php echo $original_checked; ?>>自作動画を使用する。</label>
	<div class="original-move-wrap">
	<h4 class="h-admin-4-bg">ヒーローヘッダーの動画を選択してください。</h4>
		<?php
  		generate_upload_video_single_tag('hh-move', $i_hh_move);
		?>
	</div>
	<div class="youtube-move-wrap">
		<h4>youtubeの動画リンクを記入してください</h4>
		<input type="text" name="youtube-id" class="img-setect-url" value="<?php echo $youtube_full_path; ?>">
	</div>
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
        	  get_option('heroheader-moveTitleTextColor', '#ffffff'),
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
        	  get_option('heroheader-moveTitleShadowColor', '#000'),
        	  'タイトルシャドウ色'
        	);
			?> 
			</div>
		</div>
</div>
<script>
//youtubeとオリジナル動画の切り替え制御
document.addEventListener("DOMContentLoaded", function () {
    function toggleVideoSections() {
        var selectedValue = document.querySelector('input[name="move-type"]:checked').value;
        var originalWrap = document.querySelector('.original-move-wrap');
        var youtubeWrap = document.querySelector('.youtube-move-wrap');

        if (selectedValue === 'youtube') {
            originalWrap.classList.add('notshow');
            youtubeWrap.classList.remove('notshow');
        } else if (selectedValue === 'original') {
            originalWrap.classList.remove('notshow');
            youtubeWrap.classList.add('notshow');
        }
    }

    // 初期状態の設定
    toggleVideoSections();

    // ラジオボタン変更時の処理
    document.querySelectorAll('input[name="move-type"]').forEach(function (radio) {
        radio.addEventListener('change', toggleVideoSections);
    });
});
</script>