<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * データベース設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** データベース設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'narukami-theme' );

/** データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** データベースのパスワード */
define( 'DB_PASSWORD', 'root' );

/** データベースのホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'C{h?j;M:VQ5!N-kTp:r5%1+z13~^A!&^&A>T$HU(vB u@dWh%diu cJ2@2Nx05Au' );
define( 'SECURE_AUTH_KEY',  'z%Qeojq TZ2Ug}#dpmYOOUHg-vNfjXjAMPF==V/tNz]U6-_E~Ck@y~{}DY[/}3kZ' );
define( 'LOGGED_IN_KEY',    'MMl_u .[^|!+}Yj*>7N2^~hojB6kGRA]_8V}TyRCQ$U9hp<}O)c5_0z&XTM:#)tL' );
define( 'NONCE_KEY',        '&/Pz^Om=H.Zzvb7[s;]M-cl;63:.>6M4m.1NxGd*C!a{Wy8l=boQ1|<&ym?GhgcW' );
define( 'AUTH_SALT',        'kTFv5.D[fd =eXspRhpx32mQ sY00UNVvU!WH<U?7;N~rbLl$p$O>ddZ[23J?BNZ' );
define( 'SECURE_AUTH_SALT', 'qxX!vjVOQ$mvfH<N6LEy8C7jIOt!^J&*6DC)LwiKz o;3Vpz?dYpjf^e_FJti.A|' );
define( 'LOGGED_IN_SALT',   'H`!qIr#:0O27c}%wy?) 7zR@3tU2fCnBwU%(}s>u/FoKG0NJB~S|j42k!EM41QC+' );
define( 'NONCE_SALT',       'X%B{H`PEnL#Qnx%;v+X9Q=vbE@shdvyg3K3:<]$s+N9!cL1c~Eo6:<UAS3{gbn=H' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
