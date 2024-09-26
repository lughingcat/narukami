<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
	<?php 
	//背景
	$notfound_default_bg = sanitize_option_value(get_theme_mod('background_image'));
	$notfound_original_bg = sanitize_option_value($_POST['notfoundpage-bg-img']);
	$notfound_bg_type = sanitize_option_value($_POST['page404bg-type']);
	
	if($notfound_bg_type === "main-bg-img"){
		$main_img = $notfound_default_bg;
	}else{
		$main_img = $notfound_original_bg;
	}
	?>
	<?php
	$narukami_font_family = sanitize_option_value(get_option('narukami-font-family'));
	?>
	<style>
		body{
			font-family: <?php echo $narukami_font_family; ?>
		}
	</style>
<style>
	body{
		background-image: url('<?php echo esc_url($main_img); ?>');
		background-repeat: no-repeat;
		background-position: center;
		background-attachment: fixed;
		background-size: cover;
	}
</style>
<body style="position: relative;">
	<?php
	//ヘッダー読み込み
	$i_header_display_setting = sanitize_text_field(get_option('header-disp-set'));//ヘッダー表示設定
	if($i_header_display_setting === 'display_on'){
			include(get_template_directory() . '/TOP_PAGE_FILES/top_header_part.php');
		}
		include(get_template_directory() . '/TOP_PAGE_FILES/top_globalheader_part.php');
	?>
	 <?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
        // フォームデータを取得して表示
        $notfound_formData = $_POST;
		if(isset($notfound_formData['page404bg-type'])){
			include(get_template_directory() . '/lib/narukami-404/not-found-preview.php');
		}
	}
    ?>
	<!--フッター-->
	<?php include(get_template_directory() . '/lib/narukami-footer/footer.php');?>
    <?php wp_footer(); ?>
</body>
</html>