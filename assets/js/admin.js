// JavaScript Document
//ナンバリング用代入数字
var i = 1;
//inputの中身をセット
function creatForm(){
	var input_deta = document.createElement('input');
	input_deta.type = 'text';
	input_deta.id = 'text' + i;
	input_deta.name = 'text' + i;
	input_deta.placeholder = 'タイトル' + i;
//出力する親要素の取得
	var parent = document.getElementById('text_wrap');
//出力
	parent.appendChild(input_deta);
	
}

//削除ボタンを生成する

var button_date = document.createElement('button');
//生成したボタンの１をプラス
button_date.id = i;

