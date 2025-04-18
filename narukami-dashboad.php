<?php
function add_narukami_welcome_panel() {
    ?>
    <div class="custom-welcome-panel">
        <h2>鳴雷でサイト作成を始めよう！</h2>
        <p class="about-description">
			飲食店専用WordPressThem 鳴雷-NARUKAMI-をご購入頂きありがとうございます。(※以下「鳴雷」とします。)<br>
			一緒に素敵なウェブサイトを作成していきましょう。<br>
			鳴雷は画像と文章を用意して挿入するだけの作業で、スタイリッシュなウェブサイトを作成することが可能です。<br>
			以下に主な作成ツールの紹介と設定方法を記載します。<br>
		</p>
		<h3>はじめに必ずお読みください。</h3>
		<ul class="narukami-setting-panel-wrap">
			<li class="panel-item">
					<a>
						<div class="panel-content-wrap">
							<p class="panel-icon"><i class="fa-solid fa-images"></i></p>
							<h2>鳴雷の画像サイズについて</h2>
							<p>
								鳴雷で使用する画像は以下のサイズを推奨しています。<br>
								ファビコン系最小単位: 512 x 512px 正方形<br>
								ランキング画像小単位: 875 x 875px 正方形<br>
								カラム系画像中単位: 1600 x 1600px 正方形<br>
								ヒーローヘッダー画像: 1600 x 900px 長方形<br>
								全画面系最大単位: 1740 x 1320px 長方形<br>
							</p>
							<p>上記のピクセルで用意していただくと綺麗にデザインできるようにしています。2000px(1MB以上)を超える画像は、サイトが重くなり、css系のアニメーションが正常に動作しなくなる可能性があります。その場合は画像を小さくしたり圧縮したりして調整してください。理想のファイルサイズは50KB〜200KBです。画像のimgタグやdivにはcoverを使用してますので、多少サイズがオーバーしても、センター寄せで表示されるようにcssを調整していますのでご安心ください。<br>
							</p>
						</div>
					</a>
					<div class="panel-btn-flex-wrap">
					</div>
			</li>
			<li class="panel-item">
					<a>
						<div class="panel-content-wrap">
							<p class="panel-icon"><i class="fa-solid fa-plug-circle-bolt"></i></p>
							<h2>推奨プラグインについて。</h2>
							<p>
								飲食店のサイトではどうしても画像が多くなり、サイトの表示速度が落ちてしまう場合がございます<br>
								推奨のフォーマットと最大容量を確保して頂くと正常に動作はしますが、どうしても画質を落としたくない場合もあるかと思います<br>
								その際は以下のプラグインを導入してください。<br>
								1, Jetpack(画像をcdn経由で配信)<br>
								2, MaxUploader(アップロードサイズ変更)<br>
							</p>
							<p>
								1, jetpackについて<br>
								このプラグインをサイト作成前にインストールしてください。アップロードした画像が全て圧縮されcdn経由で高速配信されるようになります。サイト自体の動きが軽くなりcssアニメーションも綺麗に動きます。<br>
								※このプラグインを使用するとLPページの鳴雷専用ブロック「大きな画像とコンテンツ」の画質が荒くなりますので、併用はお控えください。<br>
								2, MaxUploader<br>
								このプラグインをサイト作成前にインストールしてください。大きな画像や動画がスムーズにアップロードできます。<br>
							</p>
						</div>
					</a>
			</li>
			<li class="panel-item">
					<a>
						<div class="panel-content-wrap">
							<p class="panel-icon"><i class="fa-solid fa-video"></i></p>
							<h2>動画について</h2>
							<p>
								鳴雷のヘッダー設定に「ヒーローヘッダー設定」があります。ヒーローヘッダーの種類は３種類「静止画」「動画」「スライダー」をご用意しており、動画の注意事項を以下に記載します。
							</p>
							<p>
								１,ヒーローヘッダー動画タイプについて<br>
								動画のサイズですが、4Kや、フレームレートが高いものはスマホで表示されない可能性があります。<br>
								pcで問題なく動画再生されていてもスマホで確認すると灰色の背景だけが存在し動画が再生されない場合は、確実に動画のサイズによるエラーです。
								鳴雷ではサイトのロード時間やSEOを視野に入れて<br>
								解像度　720p(HD画質)<br>
								フレームレート　24fps(映画の標準フレームレート)<br>
								フォーマット　MP4（H.264） / WEBM<br>
								データ容量　4MG以下<br>
								です。サイズ変更に関しては無料のブラウザツールやお手持ちのツールでこの規格に変更をお願いします。<br>
								無料のブラウザツールでは「FlexClip」をおすすめします。<br>
								操作が簡単で日本語で表示されているので使いやすいです。
							</p>
						</div>
					</a>
					<div class="panel-btn-flex-wrap">
					</div>
			</li>
		</ul>
		<h3>鳴雷各種ツール紹介とデモページ。</h3>
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
					<a class="sample-site-btn" href="https://nousondiner.com/product_list_page/obento-list/">デモページ</a>
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
					<a class="sample-site-btn" href="https://nousondiner.com/product_item_page/chikinkatsu/">サンプルサイト</a>
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
					<a class="sample-site-btn" href="https://nousondiner.com/product_lp_page/butadon-set/">デモサイト</a>
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
					<a class="sample-site-btn" href="https://nousondiner.com/notfound">デモサイト</a>
				</div>
			</li>
			<li class="panel-item">
				<a href="<?php echo admin_url('admin.php?page=custom_submenu_page_4'); ?>">
					<div class="panel-content-wrap">
						<p class="panel-icon"><i class="fa-solid fa-rectangle-ad"></i></p>
						<h2>ポップアップバナー設定</h2>
						<p>
							トップページに告知目的で表示されるポップアップバナーを設定できます。トップページのみに限定することでユーザーが迷惑に感じません。<br>
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