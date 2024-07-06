<?php 
//s_cmaker分岐
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'notify_top_page') {
	$selectbox_item = get_option('scmaker_array_values');
}else{
	if(isset($_POST['s_cmaker'])){
		$selectbox_item = $_POST['s_cmaker'];
	}else{
		$selectbox_item = $select_boxes;
	}
}
foreach($selectbox_item as $item){
	echo $item . '</br>';
}

//insert_ids分岐
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'notify_top_page') {
	$insert_id_variable = get_option('insert_id_indices');
	var_dump($insert_id_variable);
}else{
	if(isset($_POST['insert_ids'])){
		$insert_id_variable = $_POST['insert_ids'];
		echo '$POST';			
	}else{
		$insert_id_variable = $insert_id_check;
		echo 'DATABASE';			
	}
}
//s_cmakerを連想配列化する
$selectboxitem_summarize = array();
foreach ($selectbox_item as $key => $item) {
  // $keyは$selectbox_itemのキー、$itemはそのキーに対応する値
  $insert_id = isset($insert_id_variable[$key]) ? $insert_id_variable[$key] : '';
  $selectboxitem_summarize[] = array(
	  'item' => $item,
	  'insert_id' => $insert_id
  );
}
//テスト出力
foreach ($selectboxitem_summarize as $entry) {
  echo "Item: " . $entry['item'] . ", Insert ID: " . $entry['insert_id'] . "<br>";
}
?>