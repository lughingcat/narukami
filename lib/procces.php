
<?php
require_once( dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
$i_title = $_POST['item_title'];
$i_price = $_POST['item_price'];
global $wpdb;
	$tablename =  $wpdb->prefix . "narukami_content_maker";
	// 各種データの保存
	$wpdb->insert(
		$tablename,
		array(
			'id' => '',
			'item_name' => $i_title,
			'item_price' => $i_price,
			'url' => '',
		),
		array(
			'%d',
			'%s',
			'%s',
			'%s',
			
		)
	);