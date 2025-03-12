<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404プレビューページ</title>
    <?php wp_head(); ?>
</head>
	<?php
	$narukami_font_family = sanitize_option_value(get_option('narukami-font-family', 'Sawarabi Gothic'));
	?>
	<?php 
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
        // フォームデータを取得して表示
        $notfound_formData = $_POST;
		if(isset($notfound_formData['page404bg-type'])){
			if($notfound_formData['page404bg-type'] === 'main-bg-img'){
				$bg_img = sanitize_option_value(get_option('page404bg-type', 'main-bg-img'));
			}elseif($notfound_formData['page404bg-type'] === 'original404-bg-img'){
				$bg_img = sanitize_option_value($_POST['notfoundpage-bg-img']);
			}
		}
	}
	?>
	<style>
		body{
			font-family: <?php echo $narukami_font_family; ?>;
			background-image: url(<?php echo $bg_img; ?>);
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			background-attachment: fixed;
		}
	</style>
<body style="position: relative;">
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
        // フォームデータを取得して表示
        $notfound_formData = $_POST;
		if(isset($notfound_formData['page404bg-type'])){
			include(get_template_directory() . '/lib/narukami-404/not-found-preview.php');
		}
	}
?>
	<?php include(get_template_directory() . '/lib/narukami-footer/narukami_footer.php');?>
    <?php wp_footer(); ?>
</body>
</html>