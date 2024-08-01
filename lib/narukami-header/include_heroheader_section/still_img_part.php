<?php
$i_hh_still_img = sanitize_option_value(get_option('hero-H-stillImg'));
$i_hh_still_title = sanitize_option_value(get_option('hero-H-stillTitle'));

?>
<div class="still-img-all-wrap">
	<h4 class="h-admin-4-bg">ヒーローヘッダー画像を選択してください。</h4>
		<?php
  		generate_upload_image_single_tag('hh-still-img', $i_hh_still_img);
		?>
	<h4 class="h-admin-4-bg">ヒーローヘッダータイトルを入力してください。<h4>
		<input type="text" name="hh-still-title" class="img-setect-url" value=<?php echo $i_hh_still_title; ?>>
	<h4 class="h-admin-4-bg">ヒーローヘッダータイトルの文字色を選択してください。<h4>
		<div class="heroheader-textcolor-wrap">
			<div class="color-box-child">
			<?php 
			genelate_color_picker_tag_demo(
        	  'hh-titleTextColor', 
        	  get_option('heroheader-titleTextColor'),
        	  'タイトルのテキスト色'
        	);
			?> 
			</div>
		</div>
</div>