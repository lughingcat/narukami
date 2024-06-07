<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>トップページビルダープレビュー</title>
    <?php wp_head(); ?>
</head>
<body>
    <h1>NARUKAMI-TOP-PAGE-PREVIEW</h1>
	 <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // フォームデータを取得して表示
        $formData = $_POST;
        echo '<pre>' . print_r($formData, true) . '</pre>';
    } else {
        echo '<p>フォームデータが送信されていません。</p>';
    }
    ?>
    <?php wp_footer(); ?>
</body>
</html>
<h2>入力されたデータ:</h2>
            <?php foreach ($post_data as $key => $value) : ?>
                <p><strong><?php echo esc_html($key); ?>:</strong> <?php echo esc_html($value); ?></p>
            <?php endforeach; ?>