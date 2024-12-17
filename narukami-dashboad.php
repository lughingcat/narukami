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
				<a href="<?php echo admin_url('edit.php?post_type=product_list_page'); ?>">
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
					<a class="sample-site-btn" href="<?php echo admin_url('edit.php?post_type=product_list_page'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/obento-list/">デモページ</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('edit.php?post_type=product_item_page'); ?>">
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
					<a class="sample-site-btn" href="<?php echo admin_url('edit.php?post_type=product_item_page'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/shouyu-karaage/">サンプルサイト</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('edit.php?post_type=product_lp_page'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-file-pen"></i></p>
						<h2>LPページ</h2>
						<p>
							この機能ではランディングページを作成することができます。鳴雷オリジナルの9つのブロックで自由度の高いlpを作成することができます。<br>
							各ページごとに背景も設定できるようにしていますので、コンセプトページやコース料理、期間限定メニューなどの訴求にお使いください。<br>
						</p>
						<p>私がLPページで作成したサイトを確認したい場合はデモサイトのボタンをクリックしてください。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn" href="<?php echo admin_url('edit.php?post_type=product_lp_page'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/butadon-set/">デモサイト</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_2'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-heading"></i></p>
						<h2>鳴雷ヘッダー設定</h2>
						<p>
							ヘッダーに関する全ての設定を行えます。主にヘッダー、ヒーローヘッダー、オープニングアニメーションを設定できます<br>
							店舗のロゴなどを設定してお店のカラーを出すことができます。ヒーローヘッダーやオープニングアニメーションを設定することで高級感の演出も可能です。<br>
						</p>
						<p>以下の設定開始ボタンを押すと設定画面に移動します。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn long-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_2'); ?>">設定開始！</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_6'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-table-list"></i></i></p>
						<h2>鳴雷フッター設定</h2>
						<p>
							ここでサイトフッターの設定を行います。ここで設定したフッターはサイトの最下段に表示されます。<br>
							フッターでは主にサイトマップリンクで各ページをつなぎ、ユーザーのサイト回遊率を上げることやSNSのアカウント紐つけることでフォロワーを増やすことができます。<br>
						</p>
						<p>以下の設定開始ボタンを押すと設定画面に移動します。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn long-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_6'); ?>">設定開始！</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_5'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-ellipsis"></i></p>
						<h2>鳴雷サブフッター設定</h2>
						<p>
							サブフッターは商品紹介ページと商品リストページへ挿入される追従フッターです。<br>
							ユーザーに訪れてほしいページを設定することで目につきやすく回遊率が上がります。設定することを強く推奨する機能です。<br>
						</p>
						<p>以下の設定開始ボタンを押すと設定画面に移動します。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn long-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_5'); ?>">設定開始！</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_3'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-triangle-exclamation"></i></p>
						<h2>鳴雷404ページ設定</h2>
						<p>
							作成したサイトの存在しないページをユーザーが表示した場合に現れる「404ページ」のデザインを設定することができます。<br>
							ここをおしゃれにデザインする事でサイト自体の価値が高まります。背景画像も専用の設定ができるように設計しました。<br>
						</p>
						<p>私が404ページで作成したサイトを確認したい場合はデモサイトのボタンをクリックしてください。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_3'); ?>">作成開始！</a>
					<a class="sample-site-btn" href="https://nousondiner.com/narukami">デモサイト</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_4'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-rectangle-ad"></i></p>
						<h2>ホップアップバナー設定</h2>
						<p>
							トップページにスクロールしたタイミングで一回だけ表示されるポップアップバナーを設定できます。トップページのみに限定することでユーザーが迷惑に感じません。<br>
							これを設定する事でユーザーに強くお知らせしたい情報やイベントなどの告知を確実に伝えることができます。<br>
						</p>
						<p>以下の設定開始ボタンを押すと設定画面に移動します。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn long-btn" href="<?php echo admin_url('admin.php?page=custom_submenu_page_4'); ?>">設定開始！</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_menu_page'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-gear"></i></p>
						<h2>鳴雷全体設定</h2>
						<p>
							サイト全体に適応する設定をここで行います。主にフォントファミリー、背景画像、コールボタン、スクロールボタンなどです。<br>
							特にコールボタンは必ず設定をしてください。ユーザーがスマホでアクセスした時に出現するボタンです。コールボタンタップでお店に電話を発信する設計にしています。<br>
						</p>
						<p>以下の設定開始ボタンを押すと設定画面に移動します。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
					<a class="sample-site-btn long-btn" href="<?php echo admin_url('admin.php?page=custom_menu_page'); ?>">設定開始！</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-regular fa-image"></i></p>
						<h2>鳴雷の画像サイズについて</h2>
						<p>
							鳴雷で使用する画像は以下のサイズを推奨しています。<br>
							ファビコン系最小単位: 512 x 512px以上 正方形<br>
							ランキング画像小単位: 875 x 875px以上 正方形<br>
							カラム系画像中単位: 1600 x 1600px以上 正方形又は、長方形<br>
							全画面系最大単位: 2400 x 1400px以上 長方形<br>
						</p>
						<p>絶対ではないですが、上記のピクセルで用意していただくと綺麗にデザインできるようにしています。画像のimgタグやdivにはcoverを使用してますので、多少サイズが足りなくてもセンター寄せで表示されるようにcssを調整していまのでご安心ください。</p>
					</div>
				</a>
				<div class="panel-btn-flex-wrap">
				</div>
			</li>
        </ul>
    </div>
    <?php
}

add_action('welcome_panel', 'add_narukami_welcome_panel');



//ウィジェット追加
//function my_custom_dashboard_widget() {
//    wp_add_dashboard_widget(
//        'my_custom_widget', // ウィジェットのID
//        'カスタムダッシュボードウィジェット', // ウィジェットのタイトル
//        'my_custom_widget_content' // ウィジェットの内容を表示するコールバック関数
//    );
//}
//
//function my_custom_widget_content() {
//    echo '<p>ここに自作の説明やリンクを記載できます。</p>';
//    echo '<p><a href="https://example.com">こちらをクリックしてください。</a></p>';
//}
//
//add_action('wp_dashboard_setup', 'my_custom_dashboard_widget');

//既存ウィジェット削除

function remove_dashboard_widgets() {
    // 以下は例です。必要に応じて削除するウィジェットを選んでください。

    // 「WordPress イベントとニュース」を削除
    remove_meta_box('dashboard_primary', 'dashboard', 'side');

    // 「クイックドラフト」を削除
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');

    // 「アクティビティ」を削除
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
	
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