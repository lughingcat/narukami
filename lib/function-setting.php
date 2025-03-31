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
	<?php include('narukami-overall/over-all-setting.php'); ?>
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
					 '鳴雷トップページビルダー', 
					 '鳴雷トップページビルダー', 
					 'manage_options', 
					 'custom_submenu_page_1',
					 'add_custom_menu_page_1',
					 1);
	
	//鳴雷ヘッダー設定
	add_submenu_page('custom_menu_page', 
					 '鳴雷ヘッダー設定', 
					 '鳴雷ヘッダー設定', 
					 'manage_options', 
					 'custom_submenu_page_2', 
					 'add_custom_menu_page_2',
					 2);
	//鳴雷404ページ設定
	add_submenu_page('custom_menu_page', 
					 '鳴雷404ページ設定', 
					 '鳴雷404ページ設定', 
					 'manage_options', 
					 'custom_submenu_page_3', 
					 'add_custom_menu_page_3',
					 3);
	//ホップアップバナー設定
	add_submenu_page('custom_menu_page', 
					 'ホップアップバナー設定', 
					 'ホップアップバナー設定', 
					 'manage_options', 
					 'custom_submenu_page_4', 
					 'add_custom_menu_page_4',
					 4);
	//鳴雷サブフッダー設定
	add_submenu_page('custom_menu_page', 
					 '鳴雷サブフッター設定', 
					 '鳴雷サブフッター設定', 
					 'manage_options', 
					 'custom_submenu_page_5', 
					 'add_custom_menu_page_5',
					 5);
	//鳴雷フッダー設定
	add_submenu_page('custom_menu_page', 
					 '鳴雷フッター設定', 
					 '鳴雷フッター設定', 
					 'manage_options', 
					 'custom_submenu_page_6', 
					 'add_custom_menu_page_6',
					 6);
}

//トップページビルダー
function add_custom_menu_page_1(){
?>

<div class="wrap">
    <h2>鳴雷トップページビルダー</h2>
	<div id="include-file-sorting">
	<?php include('top-page-maker.php'); ?>
	</div>
</div>
<?php
}



//鳴雷ヘッダー設定
function add_custom_menu_page_2()
{
?>
<div class="wrap">
    <h2>鳴雷ヘッダー設定</h2>
	<?php include('narukami-header/header_setting.php'); ?>
</div>
<?php
}


//サイトロゴ設定
function add_custom_menu_page_3()
{
    ?>
<div class="wrap">
    <h2>鳴雷404ページ設定</h2>
	<?php include('narukami-404/404_setting.php'); ?>
</div>
<?php
}

//ヘッダー設定
function add_custom_menu_page_4()
{
    ?>
<div class="wrap">
    <h2>ポップアップバナー設定</h2>
	<?php include('narukami-banner/banner-setting.php'); ?>
</div>
<?php
}

//サブフッター設定
function add_custom_menu_page_5()
{
    ?>
<div class="wrap">
    <h2>鳴雷サブフッター設定</h2>
<?php include('narukami-subfooter/subfooter_adm.php'); ?>
</div>

<?php
}

//フッター設定
function add_custom_menu_page_6()
{
    ?>
<div class="wrap">
    <h2>鳴雷フッター設定</h2>
<?php include('narukami-footer/footer_adm.php'); ?>
</div>
<?php
}



