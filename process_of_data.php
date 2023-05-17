<?php
/**
 * mysqlへデータ送信をする為の処理ファイル
 *
 * @package narukami
 */


global $wpdb;
	$tablename =  $wpdb->prefix . "コンテンツ１";
	// 各種データの保存
	$wpdb->insert(
		$tablename,
		array(
			'supporter_id' => "1",
			'supporter_name' => "コンテンツ１テスト",
			'todo_content' => $val3,
			'deadline' => $val4,
			'adddate' => $val5,
		),
		array(
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
		)
	);