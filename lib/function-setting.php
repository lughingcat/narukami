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
  <h2>ページビルダー</h2>
  <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
    <div class="metabox-holder">
      <div class="postbox ">
        <h3 class='hndle'><span>テキスト</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">テキストを入力してください。</p>
            <h4>テキスト</h4>
            <p><input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>"></p>
          </div>
        </div>
      </div>
      <div class="postbox ">
        <h3 class='hndle'><span>テキストボックス</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">テキストボックスを入力してください。</p>
            <h4>テキストボックス</h4>
            <textarea id="textbox" class="regular-text" name="textbox" rows="10" cols="60"><?php echo get_option('textbox'); ?></textarea>
          </div>
        </div>
      </div>
      <div class="postbox ">
        <h3 class='hndle'><span>セレクトボックス</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">セレクトボックスを選択してください。</p>
            <h4>セレクトボックス</h4>
            <select name="select" id="select">
              <option value="0" <?php selected(0, get_option('select')); ?> >選択してください</option>
              <option value="1" <?php selected(1, get_option('select')); ?> >ごろちゃん</option>
              <option value="2" <?php selected(2, get_option('select')); ?> >ちろちゃん</option>
              <option value="3" <?php selected(3, get_option('select')); ?> >ゆうちゃん</option>
            </select>
          </div>
        </div>
      </div>
      <div class="postbox ">
        <h3 class='hndle'><span>ラジオボタン</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">ラジオボタンを選択してください。</p>
            <h4>ラジオボタン</h4>
            <ul>
              <li><label><input name="radio" type="radio" value="0" <?php checked(0, get_option('radio')); ?> />ごろちゃん</label></li>
              <li><label><input name="radio" type="radio" value="1" <?php checked(1, get_option('radio')); ?> />ちろちゃん</label></li>
              <li><label><input name="radio" type="radio" value="2" <?php checked(2, get_option('radio')); ?> />ゆうちゃん</label></li>
              <li><label><input name="radio" type="radio" value="3" <?php checked(3, get_option('radio')); ?> />さっちゃん</label></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="postbox ">
        <h3 class='hndle'><span>チェックボックス</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">設定がよければチェックボックスにチェックを入れてください</p>
            <h4>チェックボックス</h4>
            <label><input name="checkbox" id="checkbox1" type="checkbox" value="1" <?php checked(1, get_option('checkbox')); ?> />チェックボックス1</label>
          </div>
        </div>
      </div>
    </div>
    <?php submit_button(); ?>
  </form>
</div>
<?php
}
function register_custom_setting()
{
    register_setting('custom-menu-group', 'text');
    register_setting('custom-menu-group', 'textbox');
    register_setting('custom-menu-group', 'select');
    register_setting('custom-menu-group', 'radio');
    register_setting('custom-menu-group', 'checkbox');
}
?>
<?php
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

