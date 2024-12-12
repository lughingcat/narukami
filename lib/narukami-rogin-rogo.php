<?php
// ログイン画面のロゴを変更
function custom_login_logo() {
    ?>
    <style type="text/css">
        body.login h1 a {
            background-image: url('<?php echo get_template_directory_uri(); ?>/admin-img/narukami-rogo-var3.1.0.png');
            background-size: contain;
            width: 120px;
        }
		body.login .custom-login-text {
            text-align: center;
            font-size: 16px;
            color: #555;
            margin: 20px auto;
        }
    </style>
    <?php
}

function custom_login_message($message) {
    if (empty($message)) {
        $message = '<p class="custom-login-text">飲食店専用WordPressTheme鳴雷の<br>ご購入ありがとうございます。<br>一緒に素敵なウェブサイトを作りましょう！</p>';
    }
    return $message;
}
add_filter('login_message', 'custom_login_message');

add_action('login_enqueue_scripts', 'custom_login_logo');

// ロゴのリンク先を変更
function custom_login_logo_url() {
    return home_url(); // サイトのホームURLにリンク
}
add_filter('login_headerurl', 'custom_login_logo_url');

// ロゴのリンクにホバーしたときのタイトルを変更
function custom_login_logo_url_title() {
    return '鳴雷　飲食店専用WordPressテーマ'; // ツールチップのテキスト
}
add_filter('login_headertext', 'custom_login_logo_url_title');

?>