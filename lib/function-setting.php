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
  }
  function add_custom_menu_page()
  {
?>
<div class="wrap">
  <h2>鳴雷全体設定</h2>
	seo設定
	キーワード設定
	アクセス解析
	テスト
	test
	テスト２
	テスト３あああ
	あああ
</div>
<?php
}
//サブメニュー
add_action('admin_menu', 'add_custom_submenu_page');
function add_custom_submenu_page()
{
	//コンテンツビルダー
    add_submenu_page('custom_menu_page',
					 'コンテンツビルダー', 
					 'コンテンツビルダー',
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
}
//コンテンツビルダーコード
function add_custom_menu_page_1()
{
    ?>
<div class="wrap">
    <h2>コンテンツビルダー</h2>
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

