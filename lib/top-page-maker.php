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
			  require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php');
			  global $wpdb;
			  
			  $query_check = "SELECT COUNT(*) FROM {$wpdb->prefix}narukami_content_maker WHERE id != 1;";
			  $count_rows = $wpdb->get_var($query_check);
			  
			  $select_boxes = array();
			  $insert_id_check = array();
			  if ($count_rows === '0') {
				  // idが1以外の挿入がない場合、idが1の行も取得する
				  $query = "SELECT
				  s_cmaker,
				  insert_ids
				  FROM {$wpdb->prefix}narukami_content_maker
				  WHERE id = 1;";
			  } else {
				  // idが1以外の挿入がある場合、idが1以外の行を取得
				  $query = "SELECT
				  s_cmaker,
				  insert_ids
				  FROM {$wpdb->prefix}narukami_content_maker
				  WHERE id != 1;";
			  }
			  
			  $rows = $wpdb->get_results($query);
			  foreach ($rows as $row) {
				  $select_boxes[] = $row->s_cmaker;
				  $insert_id_check[] = $row->insert_ids;
			  }
			  var_dump($select_boxes);
			  var_dump($insert_id_check);
			  

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
			  //s_cmaker分岐
				if(isset($_POST['s_cmaker'])){
					$selectbox_item = $_POST['s_cmaker'];
				}else{
					$selectbox_item = $select_boxes;
				}
			  //insert_ids分岐
			  	if(isset($_POST['insert_ids'])){
					$insert_id_variable = $_POST['insert_ids'];
				}else{
					$insert_id_variable = $insert_id_check;
				}
			  
			  $selectboxitem_summarize = array();
			  foreach ($selectbox_item as $key => $item) {
				  // $keyは$selectbox_itemのキー、$itemはそのキーに対応する値
				  $insert_id = isset($insert_id_variable[$key]) ? $insert_id_variable[$key] : '';
				  $selectboxitem_summarize[] = array(
					  'item' => $item,
					  'insert_id' => $insert_id
				  );
			  }
			  foreach ($selectboxitem_summarize as $entry) {
    // $entry['item']と$entry['insert_id']を使用して処理を行う
    echo "Item: " . $entry['item'] . ", Insert ID: " . $entry['insert_id'] . "<br>";
}
			  ?>
			  
			  <?php $i = 0; foreach($selectboxitem_summarize as $entry) : ?>
			  <div id="clone-wrap_<?php echo $i; ?>" class="clone-wrap-parent">
				  <input type="hidden" id="insert-ids-<?php echo $i; ?>" name="insert_ids[]" class="insert-item-id" value="insert-id<?php echo $i; ?>">
			  <select name="s_cmaker[]" class="cmaker-wrap" id="cmaker_<?php echo $i; ?>" onchange="loadContent(this)">
				  <option hidden>選択してください</option>
				  <?php 
				  foreach( $selectbox_item_list as $label => $value){
					  if( $value === $entry['item'] ){
						  echo "<option value='$value' selected>" . $label . "</option>";
					  }else{
						  echo "<option value='$value'>" . $label . "</option>";
					  }
				  }
			  ?> 
			  </select> 
			  <div id="contentContainer_<?php echo $i; ?>" class="content-Container">
				  <?php
				  
				  ;?>
			  </div>
			  </div>
			  <?php $i++; endforeach; ?>
			  <div id="clonedSelectBoxes"></div>
			  <button type="button" onclick="cloneSelectBox()">複製</button>
			  </div><!--mainEnd-->
				
			<button id="gmvalidate" type="submit" name="toppage_initialization">保存</button>
			<button id="gmvalidate" type="submit" name="delete_iniz" value="Initialization">初期化</button>
			</form>
			
			<?php get_template_part('lib/procces');?>
			
          </div> 
        </div>
      </div>
	<div class="wp-submitAllBtn">
	<?php submit_button('全体をサイトへ反映'); ?>
	</div>
</div>