<?php
session_start();

// セッション変数の初期化
if (!isset($_SESSION['gmTitleArray'])) {
    $_SESSION['gmTitleArray'] = array();
}

// セッション変数からデータを取得（初回のみ）
if (isset($_POST['gmTitleArray']) && empty($_SESSION['gmTitleArray'])) {
    $_SESSION['gmTitleArray'] = json_decode($_POST['gmTitleArray'], true);
    // $myArrayFromDB を使って必要な処理を行う
}

// POSTリクエストがあるかどうかを確認し、ボタンがクリックされた場合に空文字を追加
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addEmpty"])) {
   $_SESSION['gmTitleArray'][] = "あ"; // 空文字を追加
}

// 配列をHTML形式で返す
foreach ($_SESSION['gmTitleArray'] as $gm_item) {
    echo $gm_item . "</br>";
}


?>
