<?php
//初期設定変数値
$defult_still_img = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';

$i_hh_still_img = sanitize_option_value(get_option('hero-H-stillImg', $defult_still_img));
$i_hh_still_title = sanitize_option_value(get_option('hero-H-stillTitle', 'SITE TITLE'));

?>
<div class="still-img-all-wrap">
	<h4 class="h-admin-4-bg">ヒーローヘッダー静止画像を選択してください。</h4>
		<?php
  		generate_upload_image_single_tag('hh-still-img', $i_hh_still_img);
		?>
	<h4>ヒーローヘッダー静止画像タイトルを入力してください。</h4>
		<input type="text" name="hh-still-title" class="img-setect-url" value="<?php echo $i_hh_still_title; ?>">
	<h4>ヒーローヘッダータイトルの文字色を選択してください。</h4>
		<div class="heroheader-textcolor-wrap">
			<div class="color-box-child">
			<?php 
			genelate_color_picker_tag_demo(
        	  'hh-titleTextColor', 
        	  get_option('heroheader-titleTextColor', '#ffffff'),
        	  'タイトルのテキスト色'
        	);
			?> 
			</div>
		</div>
		<div class="heroheader-textcolor-wrap">
			<div class="color-box-child">
			<?php 
			genelate_color_picker_tag_demo(
        	  'hh-titleShadowColor', 
        	  get_option('heroheader-titleShadowColor', '#000'),
        	  'タイトルシャドウ色'
        	);
			?> 
			</div>
		</div>
</div>