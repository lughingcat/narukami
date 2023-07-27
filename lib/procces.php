
<?php
require_once( dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
//ランキング
//1
$i_title = $_POST['item_title'];
$i_id = $_POST['item_id'];
$i_price = $_POST['item_price'];
$i_item_url = $_POST['item_img_url'];
//2
$i_title_2 = $_POST['item_title_2'];
$i_id_2 = $_POST['item_id_2'];
$i_price_2 = $_POST['item_price_2'];
$i_item_url_2 = $_POST['item_img_url_2'];
//3
//セレクトボックス
$select_content = $_POST['s_cmaker'];
//スライダー
$slider_img_url = $_POST['slider_img_url'];
$slider_item_name = $_POST['slider_item_name'];
$slider_item_price = $_POST['slider_item_price'];
global $wpdb;
	$tablename =  $wpdb->prefix . "narukami_content_maker";
	// 各種データの保存
	$wpdb->insert(
		$tablename,
		array(
			//ランキング
			'id' => $i_id,
			'item_name' => $i_title,
			'item_price' => $i_price,
			'item_img_url' => $i_item_url,
			//セレクトボックス
			's_cmaker' => $select_content,
			//スライダー
			'slider_img_url' => $slider_img_url,
			'slider_item_name' => $slider_item_name,
			'slider_item_price' => $slider_item_price,
		),
		array(
			//ランキング
			'%d',
			'%s',
			'%s',
			'%s',
			//セレクトボックス
			'%s',
			//スライダー
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