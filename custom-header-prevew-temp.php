<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body style="position: relative;">
	 <?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
        // フォームデータを取得して表示
        $headerformData = $_POST;
		if($headerformData['header-display-setting'] === 'display_on'){
			include(get_template_directory() . '/front-inc-header/inc-header-part.php');
		}
		if($headerformData['heorheader-type'] === 'still_img'){
			include(get_template_directory() . '/front-inc-header/inc-HH-still-img-part.php');
		}elseif($headerformData['heorheader-type'] === 'move'){
			include(get_template_directory() . '/front-inc-header/inc-HH-move-part.php');
		}elseif($headerformData['heorheader-type'] === 'slider'){
			include(get_template_directory() . '/front-inc-header/inc-HH-slider-part.php');
		}
		include(get_template_directory() . '/front-inc-header/inc-globalHeader-part.php');
	}
    ?>
	<?php
	//トップページビルダー
	global $wpdb;
	$sql_s_cmaker = $wpdb->get_col( "SELECT s_cmaker FROM {$wpdb->prefix}narukami_content_maker LIMIT 18446744073709551615 OFFSET 1" );
	foreach($sql_s_cmaker as $cmaker){
		echo $cmaker;
	}
	?>
	<div style="height: 200px; background-color: black;"></div>
	<?php include(get_template_directory() . '/lib/narukami-footer/footer.php');?>
    <?php wp_footer(); ?>
</body>
</html>