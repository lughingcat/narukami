<?php

function add_narukami_welcome_panel() {
    ?>
    <div class="custom-welcome-panel">
        <h2>鳴雷でサイト作成を始めよう！</h2>
        <p class="about-description">
			飲食店専用WordPressThem 鳴雷-NARUKAMI-　(※以下「鳴雷」とします。)をご購入ありがとうございます。<br>
			一緒に素敵なウェブサイトを作成していきましょう。<br>
			鳴雷は画像と文章を用意して挿入するだけの作業で、スタイリッシュなウェブサイトを作成することが可能です。<br>
			以下に主な作成ツールの紹介と設定方法を記載します。<br>
			
			
		</p>
        <ul class="narukami-setting-panel-wrap">
            <li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-desktop"></i></p>
						<h2>鳴雷トップページビルダー</h2>
						<p>
							ウェブサイトのトップページを作成することができます。<br>
							使い方はトップページビルダーに記載していますのでそちらを参照してください。<br>
						</p>
						<p>トップページビルダーで作成したサイトを確認したい場合はサンプルサイトのボタンをクリックしてください。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/">サンプルサイト</a>
				</div>
			</li>
            <li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-list-check"></i></i></p>
						<h2>商品リストページ</h2>
						<p>
							ウェブサイトのトップページを作成することができます。<br>
							使い方はトップページビルダーに記載していますのでそちらを参照してください。<br>
						</p>
						<p>トップページビルダーで作成したサイトを確認したい場合はサンプルサイトのボタンをクリックしてください。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/">サンプルサイト</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-utensils"></i></p>
						<h2>商品紹介ページ</h2>
						<p>
							ウェブサイトのトップページを作成することができます。<br>
							使い方はトップページビルダーに記載していますのでそちらを参照してください。<br>
						</p>
						<p>トップページビルダーで作成したサイトを確認したい場合はサンプルサイトのボタンをクリックしてください。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/">サンプルサイト</a>
				</div>
			</li>
        </ul>
    </div>
    <?php
}

add_action('welcome_panel', 'add_narukami_welcome_panel');



//ウィジェット追加
function my_custom_dashboard_widget() {
    wp_add_dashboard_widget(
        'my_custom_widget', // ウィジェットのID
        'カスタムダッシュボードウィジェット', // ウィジェットのタイトル
        'my_custom_widget_content' // ウィジェットの内容を表示するコールバック関数
    );
}

function my_custom_widget_content() {
    echo '<p>ここに自作の説明やリンクを記載できます。</p>';
    echo '<p><a href="https://example.com">こちらをクリックしてください。</a></p>';
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widget');

//既存ウィジェット削除

function remove_dashboard_widgets() {
    // 以下は例です。必要に応じて削除するウィジェットを選んでください。

    // 「WordPress イベントとニュース」を削除
    remove_meta_box('dashboard_primary', 'dashboard', 'side');

    // 「クイックドラフト」を削除
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');

    // 「アクティビティ」を削除
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');

    // 「サイトヘルスステータス」を削除
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
	
	// 「概要」を削除
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');


//ウェルカムパネルを削除
function remove_default_welcome_panel() {
    remove_action('welcome_panel', 'wp_welcome_panel');
}

add_action('admin_head', 'remove_default_welcome_panel');
?>