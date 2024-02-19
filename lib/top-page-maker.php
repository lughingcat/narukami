<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
	
	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">ヘッダー設定</span></h3>
        <div class="inside">
			<h2 class="narukami-admin-h2">トップページビルダー</h2>
			<form id="post-toppage-maker" method="post" name="test" action="">
          <div class="main">
			  <?php 
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT
			  s_cmaker
			  FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $select_box = $row->s_cmaker;
			  }
			  $selectbox_item = '';
			  $selectbox_item_list = array(
			  	"ランキング" => 'ranking',
   				"コンセプト" => 'concept',
   				"グランドメニュー" => 'grandmenu',
   				"右寄せ背景1カラム" => 'column_right_1',
   				"左寄せ背景1カラム" => 'column_left_1',
   				"2カラム" => 'column_2',
   				"3カラム" => 'column_3',
   				"店舗情報" => 'store_info',
   				"テキストエリア" => 'text_content',
   				"パララックス" => 'parallax',
			  );
				if(isset($_POST['s_cmaker'])){
					$selectbox_item = $_POST['s_cmaker'];
				}elseif( !isset($_POST['s_cmaker'])){
					$selectbox_item = $select_box;
				}
			  ?>
			  <select name="s_cmaker" class="cmaker-wrap" id="cmaker" onchange="loadContent()">
				  <option hidden>選択してください</option>
				  <?php 
				  foreach( $selectbox_item_list as $label => $value){
					  if( $value === $selectbox_item ){
						  echo "<option value='$value' selected>" . $label . "</option>";
					  }else{
						  echo "<option value='$value'>" . $label . "</option>";
					  }
				  }
			  ?> 
			  </select>
			  <div>
				  </div> 
			  <div id="contentContainer"></div>
			  <button type="button" onclick="cloneSelectBox()">複製</button>
			  <div id="clonedSelectBoxes"></div>
			  
			  <div id="cmakerChild" class="cmakerChildWrap">
				 
			  </div>
			  
			  
			  <button id="gmvalidate" type="submit" name="">保存</button>
			  <button id="gmvalidate" type="submit" name="delete_iniz" value="Initialization">初期化</button>
			  </div><!--mainEnd-->
			</form>
			<?php get_template_part('lib/procces');?>
			
          </div> 
        </div>
      </div>
	<div class="wp-submitAllBtn">
	<?php submit_button('全体をサイトへ反映'); ?>
	</div>
</div>