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
	


//削除ボタンを生成する

var button_date = document.createElement('button');
//生成したボタンのidに１をプラス
button_date.id = i;
//削除ボタンを押した時の実行関数
button_date.onclick = function(){delete_btn(this);}
//ボタンに削除の文字を追加
button_date.innerHTML = '削除';
//input_areaに生成されたinputをidナンバー付きで格納
var input_area = document.getElementById(input_deta.id);
//ボタンを生成
parent.appendChild(button_date);
//ループ
i++;
}




//削除ボタンを押した時の動作関数(個別削除thisに呼び出し)

function delete_btn(target){
	//クリックして増えた削除ボタンのidを取得
	var target_id = target.id;
	//削除ボタンの親要素を取得
	var parent = document.getElementById('text_wrap');
	//input要素の増えた個別ナンバーを取得
	var ipt_id = document.getElementById('text' + target_id);
	//増えた削除ボタンを格納
	var tgt_id = document.getElementById(target_id);
	//inputとdelete_btnを削除
	parent.removeChild(ipt_id);
	parent.removeChild(tgt_id);
}