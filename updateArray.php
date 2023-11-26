<?php
// セッションを開始

session_start();

// セッション変数にデータがない場合、初期データを設定
if (!isset($_SESSION['myArray'])) {
    $_SESSION['myArray'] = array("apple", "banana", "orange");
}

// POSTリクエストがあるかどうかを確認し、ボタンがクリックされた場合に空文字を追加
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addEmpty"])) {
    $_SESSION['myArray'][] = "あ"; // 空文字を追加
}


// 配列をHTML形式で返す
foreach ($_SESSION['myArray'] as $item) {
    echo $item . "</br>";
}

?>
