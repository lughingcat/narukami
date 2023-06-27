
<?php
require_once( dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
$i_title = $_POST['item_title'];
$i_id = $_POST['item_id'];
$i_price = $_POST['item_price'];
$i_item_url = $_POST['item_img_url'];
$select_content = $_POST['s_cmaker'];
global $wpdb;
	$tablename =  $wpdb->prefix . "narukami_content_maker";
	// 各種データの保存
	$wpdb->insert(
		$tablename,
		array(
			'id' => $i_id,
			'item_name' => $i_title,
			'item_price' => $i_price,
			'item_img_url' => $i_item_url,
			's_cmaker' => $select_content,
		),
		array(
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
			
		)
	);

global $wpdb;
$res = null;
$i_id = $_POST['item_id'];

$res = $wpdb->delete(
    $tablename,
    array(
        'id' => $i_id
    ),
    array(
        '%d'
    )
);

if( 1 <= $res ) {
    //　削除に成功
} else {
    //　削除に失敗
}