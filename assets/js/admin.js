// JavaScript Document

//name属性にナンバリングする１を格納
var i = 1;

//ボタンクリック動作制御（追加ボタン）

var add_btn = document.getElementsByClassName('add_btn');
add_btn.addEventListener('click', (e) =>


//inputタグを生成
function addFrom(){
	//タイトル入力フォーム
	var input_date = document.createElement('input');
	input_date.type = 'text';
	input_date.id = 'text';
	input_date.name = 'text + i';
	input_date.placeholder = 'タイトル';
	var parent = document.getElementsByClassName('text_wrap');
	parent.appendChild(input_date);
	
	//url入力フォーム
	var input_url = document.createElement('input');
	input_date.type = 'url';
	input_date.id = 'url';
	input_date.name = 'url + i';
	input_date.placeholder = 'https://~';
	var parent = document.getElementsByClassName('text_wrap');
	parent.appendChild(input_url);
});




//クリックイベントで要素を削除

