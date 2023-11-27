
<?php
// セッションを開始

session_start();


// セッション変数にデータがない場合、初期データを設定
if (!isset($_SESSION['gm_title_array'])) {
    $_SESSION['gm_title_array'] = $grandmenu_title_dec;
}

// POSTリクエストがあるかどうかを確認し、ボタンがクリックされた場合に空文字を追加
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addEmpty"])) {
    $_SESSION['gm_title_array'][] = "あ"; // 空文字を追加
}


// 配列をHTML形式で返す
foreach ($_SESSION['gm_title_array'] as $gm_item) {
    echo $gm_item . "</br>";
	

}


?>
