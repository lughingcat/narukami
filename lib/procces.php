
<?php
require_once( dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
//ランキング
//1
$i_title = $_POST['item_title'];
$i_price = $_POST['item_price'];
$i_item_url = $_POST['item_img_url'];
//2
$i_title_2 = $_POST['item_title_2'];
$i_price_2 = $_POST['item_price_2'];
$i_item_url_2 = $_POST['item_img_url_2'];
//3
$i_title_3 = $_POST['item_title_3'];
$i_price_3 = $_POST['item_price_3'];
$i_item_url_3 = $_POST['item_img_url_3'];
//4
$i_title_4 = $_POST['item_title_4'];
$i_price_4 = $_POST['item_price_4'];
$i_item_url_4 = $_POST['item_img_url_4'];
//5
$i_title_5 = $_POST['item_title_5'];
$i_price_5 = $_POST['item_price_5'];
$i_item_url_5 = $_POST['item_img_url_5'];
//6
$i_title_6 = $_POST['item_title_6'];
$i_price_6 = $_POST['item_price_6'];
$i_item_url_6 = $_POST['item_img_url_6'];
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
			'item_name' => $i_title,
			'item_price' => $i_price,
			'item_img_url' => $i_item_url,
			//2
			'item_name_2' => $i_title_2,
			'item_price_2' => $i_price_2,
			'item_img_url_2' => $i_item_url_2,
			//3
			'item_name_3' => $i_title_3,
			'item_price_3' => $i_price_3,
			'item_img_url_3' => $i_item_url_3,
			//4
			'item_name_4' => $i_title_4,
			'item_price_4' => $i_price_4,
			'item_img_url_4' => $i_item_url_4,
			//5
			'item_name_5' => $i_title_5,
			'item_price_5' => $i_price_5,
			'item_img_url_5' => $i_item_url_5,
			//6
			'item_name_6' => $i_title_6,
			'item_price_6' => $i_price_6,
			'item_img_url_6' => $i_item_url_6,
			//セレクトボックス
			's_cmaker' => $select_content,
			//スライダー
			'slider_img_url' => $slider_img_url,
			'slider_item_name' => $slider_item_name,
			'slider_item_price' => $slider_item_price,
		),
		array(
		//ランキング
			'%s',
			'%s',
			'%s',
		//2
			'%s',
			'%s',
			'%s',
		//3
			'%s',
			'%s',
			'%s',
		//4
			'%s',
			'%s',
			'%s',
		//5
			'%s',
			'%s',
			'%s',
		//6
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