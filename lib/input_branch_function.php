<?php
//ランキングの表示切り替えカプセル(プレビュー用)
/*
ランキングタイトル,
ランキングポップ,
ランキングスタイル,
ランキングアイテムタイトル,
ランキングアイテムリンク,
ランキングアイテム画像,
*/
function data_variable_set($POST_data, $DB_data, $gm_numbers){
	if(is_array($POST_data)){
		return $POST_data[$gm_numbers];
	}elseif(!empty($POST_data)){
		return $POST_data;
	}else{
		return $DB_data;
	}
}
/*
右1カラムコンテンツ,
*/
function data_variable_set_nl2br($POST_data, $DB_data, $gm_numbers){
	if(is_array($POST_data)){
		return nl2br($POST_data[$gm_numbers]);
	}elseif(!empty($POST_data)){
		return nl2br($POST_data);
	}else{
		return nl2br($DB_data);
	}
}

//ランキング表示切り替え
function process_rank_on($POST_data, $DB_data, $former_data, $gm_numbers) {
	if(is_array($POST_data) && !empty($POST_data[$gm_numbers]) && $POST_data[$gm_numbers] == $former_data){
		return "";
	}elseif(!empty($POST_data) && $POST_data == $former_data){
		return "";
	}elseif(empty($POST_data) && $DB_data == $former_data){
		return "";
	}else{
		return "none";
	}
}

//チェックボックス制御
function checkbox_dataset($POST_data, $DB_data, $former_data, $gm_numbers) {
	if(is_array($POST_data) && !empty($POST_data[$gm_numbers]) && $POST_data[$gm_numbers] == $former_data){
		return "checked";
	}elseif(!empty($POST_data) && $POST_data == $former_data){
		return "checked";
	}elseif(empty($POST_data) && $DB_data == $former_data){
		return "checked";
	}else{
		return "";
	}
}
//overlay制御
function overlay_control($POST_data, $DB_data, $overlay, $gm_numbers, $img_data){
	if(is_array($POST_data) && !empty($POST_data[$gm_numbers]) && $POST_data[$gm_numbers] == $overlay){
		return $img_data;
	}elseif(!empty($POST_data) && $POST_data == $overlay){
		return $img_data;
	}elseif(empty($POST_data) && $DB_data == $overlay){
		return $img_data;
	}else{
		return "";
	}
}

//ランキング入力制御show(input用)

function check_rank_show($rank_on, $item_rank_on, $gm_numbers, $rank_show_values) {
	if(is_array($rank_on) && !empty($rank_on[$gm_numbers]) && $rank_on[$gm_numbers] == $rank_show_values){
		return "checked";
	}elseif(!empty($rank_on) && $rank_on == $rank_show_values){
		return "checked";
	}elseif(empty($rank_on) && $item_rank_on == $rank_show_values){
		return "checked";
	}else{
		return "";
	}
}
?>