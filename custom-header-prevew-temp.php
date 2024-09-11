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
	$content_maker_table = $wpdb->prefix . 'narukami_content_maker';
	$sql_s_cmaker = $wpdb->get_col( "SELECT s_cmaker FROM $content_maker_table LIMIT 18446744073709551615 OFFSET 1" );
	foreach($sql_s_cmaker as $cmaker){
		if($cmaker === 'concept'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					concept_title, 
					concept_content,
					concept_bg_img_url
         			FROM $content_maker_table 
					WHERE s_cmaker = %s",
        			$cmaker
    				),
    			ARRAY_A
				);
			$insert_ids = $row['insert_ids'];
			$concept_title = $row['concept_title'];
			$concept_content = $row['concept_content'];
			$concept_bg_img_url = $row['concept_bg_img_url'];
			include(get_template_directory() . '/front-inc/front_concept.php');
		}
		if($cmaker === 'grandmenu'){
			$row = $wpdb->get_row(
    			$wpdb->prepare(
        			"SELECT 
					insert_ids, 
					gm_primary_title, 
					grandmenu_img_url,
					grandmenu_title,
					grandmenu_pagelink
         			FROM $content_maker_table 
					WHERE s_cmaker = %s",
        			$cmaker
    				),
    			ARRAY_A
				);
			//json decode
			$gm_title_array = json_decode($row['grandmenu_title'], true);
			$gm_img_array = json_decode($row['grandmenu_img_url'], true);
			$gm_pagelink_array = json_decode($row['grandmenu_pagelink'], true);
			//変数セット
			$insert_ids = $row['insert_ids'];
			$gm_primary_title = $row['gm_primary_title'];
			$grandmenu_img_url = $gm_img_array;
			$grandmenu_title = $gm_title_array;
			$grandmenu_pagelink = $gm_pagelink_array;
			include(get_template_directory() . '/front-inc/front_grandmenu.php');
		}
		
	}//foreach end
	?>
	<div style="height: 200px; background-color: black;"></div>
	<?php include(get_template_directory() . '/lib/narukami-footer/footer.php');?>
    <?php wp_footer(); ?>
</body>
</html>