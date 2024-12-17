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
							ウェブサイトの顔であるトップページを作成することができます。サイト作成で一番最初に作成するページがこのトップページです。<br>
							使い方は非常に簡単。各コンテンツを追加、選択、画像とテキストを入れ保存で完了します。各コンテンツの並び替えも自由にできます。<br>
						</p>
						<p>私がトップページビルダーで作成したデモページを確認することができます。以下のデモページのボタンをクリックしてください。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/">デモページ</a>
				</div>
			</li>
            <li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-list-check"></i></i></p>
						<h2>商品リストページ機能</h2>
						<p>
							アイテムリストを作成、表示することができます。各料理カテゴリーの商品を一覧して表示し商品紹介ページへの誘導を行えます。<br>
							お弁当リストやサイドメニュー、スペシャリテなどのを一覧表示したい際にご利用ください。<br>
						</p>
						<p>私が商品リストページで作成したデモページを確認することができます。以下のデモページのボタンをクリックしてください。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/">デモページ</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_1'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-utensils"></i></p>
						<h2>商品紹介ページ</h2>
						<p>
							商品の詳細を解説できるページが作成できます。金額や使用している原材料、アレルギー表示に対応しています。<br>
							メニュー写真も複数スライド形式で表示させることができますので単品やセット商品などの訴求にも効果的です。<br>
						</p>
						<p>私が商品紹介ページで作成したサイトを確認したい場合はデモサイトのボタンをクリックしてください。</p>
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
						<h2>lpページ</h2>
						<p>
							この機能ではランディングページを作成することができます。鳴雷オリジナルの9つのブロックで自由度の高いlpを作成することができます。<br>
							各ページごとに背景も設定できるようにしていますので、コンセプトページやコース料理、期間限定メニューなどの訴求にお使いください。<br>
						</p>
						<p>私がlpページで作成したサイトを確認したい場合はデモサイトのボタンをクリックしてください。</p>
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