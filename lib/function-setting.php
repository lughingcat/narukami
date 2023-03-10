<?php
  add_action('admin_menu', 'custom_menu_page');
  function custom_menu_page()
  {
    add_menu_page('鳴雷全体設定',
				  '鳴雷全体設定', 
				  'manage_options',
				  'custom_menu_page', 
				  'add_custom_menu_page', 
				  'dashicons-admin-generic',
				  4);
	add_action('admin_init', 'register_custom_setting');
  }
  function add_custom_menu_page()
  {
?>
<div class="wrap">
  <h2>鳴雷全体設定</h2>
</div>
<?php
}
?>
<?php
//サブメニュー
add_action('admin_menu', 'add_custom_submenu_page');
function add_custom_submenu_page()
{
	//トップページビルダー
    add_submenu_page('custom_menu_page',
					 'トップページビルダー', 
					 'トップページビルダー',
					 'manage_options', 
					 'custom_submenu_page_1',
					 'add_custom_menu_page_1',
					 1);
	//構造化マークアップ
	add_submenu_page('custom_menu_page', 
					 '構造化マークアップ設定', 
					 '構造化マークアップ設定', 
					 'manage_options', 
					 'custom_submenu_page_2', 
					 'add_custom_menu_page_2',
					 2);
	//サイトロゴ設定
	add_submenu_page('custom_menu_page', 
					 'サイトロゴ設定', 
					 'サイトロゴ設定', 
					 'manage_options', 
					 'custom_submenu_page_3', 
					 'add_custom_menu_page_3',
					 3);
	//ヘッダー設定
	add_submenu_page('custom_menu_page', 
					 'ヘッダー設定', 
					 'ヘッダー設定', 
					 'manage_options', 
					 'custom_submenu_page_4', 
					 'add_custom_menu_page_4',
					 4);
	//サブフッダー設定
	add_submenu_page('custom_menu_page', 
					 'サブフッター設定', 
					 'サブフッター設定', 
					 'manage_options', 
					 'custom_submenu_page_5', 
					 'add_custom_menu_page_5',
					 5);
	//フッダー設定
	add_submenu_page('custom_menu_page', 
					 'フッター設定', 
					 'フッター設定', 
					 'manage_options', 
					 'custom_submenu_page_6', 
					 'add_custom_menu_page_6',
					 6);
}

//コンテンツビルダーコード
function add_custom_menu_page_1()
{
    ?>
<div class="wrap">
    <h2>トップページビルダー</h2>
</div>
<?php
}


//構造化マークアップコード
function add_custom_menu_page_2()
{
    ?>
<div class="wrap">
    <h2>構造化マークアップ設定</h2>
</div>
<?php
}


//サイトロゴ設定
function add_custom_menu_page_3()
{
    ?>
<div class="wrap">
    <h2>サイトロゴ設定</h2>
</div>
<?php
}

//ヘッダー設定
function add_custom_menu_page_4()
{
    ?>
<div class="wrap">
    <h2>ヘッダー設定</h2>
</div>
<?php
}

//サブフッター設定
function add_custom_menu_page_5()
{
    ?>
<div class="wrap">
    <h2>サブフッター設定</h2>
<?php include('subfooter_adm.php'); ?>
</div>

<?php
}
function register_custom_setting()
{//サブフッターの入力項目をoptions.phpに登録
	//配列データの格納に失敗get_potionでnullを返す
    register_setting('custom-menu-group', 'sub_footer_text');
    register_setting('custom-menu-group', 'sub_footer_url');
    
//サブフッターでのカラーピッカー選択色をoptions.phpに登録
    register_setting('custom-menu-group', 'bgcolor');
    register_setting('custom-menu-group', 'textcolor');
}



//フッター設定
function add_custom_menu_page_6()
{
    ?>
<div class="wrap">
    <h2>フッター設定</h2>
</div>
<?php
}



