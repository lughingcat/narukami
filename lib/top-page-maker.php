<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
	
	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">ヘッダー設定</span></h3>
        <div class="inside">
			<h2 class="narukami-admin-h2">トップページビルダー</h2>
			<form id="post-toppage-maker" method="post" name="narukami_top_page_maker" action="">
          <div id="select-all-wrap" class="main">
			  <?php 
			  require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php');
			  global $wpdb;
			  $query_check = "SELECT COUNT(*) FROM {$wpdb->prefix}narukami_content_maker WHERE id != 1;";
			  $count_rows = $wpdb->get_var($query_check);
			  $select_boxes = array();
			  $insert_id_check = array();
			  if ($count_rows === '0') {
				  // idが1以外の挿入がない場合、idが1の行を取得
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
			  

			  $selectbox_item = '';
			  $selectbox_item_list = array(
			  	"ランキング※１回のみ使用可" => 'ranking',
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
			  ?>
			  
			  <div id="insert-id-reload-value">
			  	<?php include('insert-id-reload-ajax.php');?>
			  </div>
			  
			  <?php $i = 0; foreach($selectboxitem_summarize as $entry) : ?>
			  <div id="clone-wrap_<?php echo $i; ?>" class="clone-wrap-parent">
				  <input type="hidden" id="insert-ids-<?php echo $i; ?>" name="insert_ids[]" class="insert-item-id" value="insert-id<?php echo $i; ?>">
			  <div class="handle">☰</div>
			  <button id="delete_selectbox_<?php echo $i; ?>" type="button" class="delete_selectbox_item" onClick="deleteSelectboxItem(this)">削除</button>
			  <select name="s_cmaker[]" class="cmaker-wrap" id="cmaker_<?php echo $i; ?>" data-index="<?php echo 'insert-id'. $i; ?>" onchange="loadContent(this); rankingRemoved(this);">
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
				  <button type="button" id="open-file<?php echo $i?>" class="open-file-button" onClick="openPageElement(this)">開く</button>
				  <div id="ajax-reload-container">
				  	<?php
                    global $insert_id_post;
                    
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'notify_top_page') {
                    	$insert_id_post = get_option('insert_id_indices');
                    }else{
                      if (isset($_POST['insert_ids']) && is_array($_POST['insert_ids']) && isset($_POST['insert_ids'][$i])) {
                    	  $insert_id_post = $_POST['insert_ids'][$i];
                      } else {
                    	  $insert_id_post = $entry['insert_id'];
                      }
                    }
                      if($entry['item'] == "grandmenu"){
                    	  include('grandmenu.php');
                      }elseif($entry['item'] == "concept"){
                    	  include('concept.php');
                      }elseif($entry['item'] == "ranking"){
                    	  include('ranking.php');
                      }elseif($entry['item'] == "column_right_1"){
                    	  include('column_right_1.php');
                      }elseif($entry['item'] == "column_left_1"){
                    	  include('column_left_1.php');
                      }elseif($entry['item'] == "column_2"){
                    	  include('column_2.php');
                      }elseif($entry['item'] == "column_3"){
                    	  include('column_3.php');
                      }elseif($entry['item'] == "store_info"){
                    	  include('store_info.php');
                      }elseif($entry['item'] == "text_content"){
                    	  include('text_content.php');
                      }elseif($entry['item'] == "parallax"){
                    	  include('parallax.php');
                      }
                    ?>
				  </div>
			  </div>
			  </div>
			  <?php $i++; endforeach; ?>
			  <div id="clonedSelectBoxes"></div>
			  <button type="button" onclick="cloneSelectBox(); rankingRemoved(this);">複製</button>
			  </div><!--mainEnd-->
				
			<button id="gmvalidate" type="submit" name="toppage_initialization">保存</button>
			<button id="gmvalidate" type="submit" name="delete_iniz" value="Initialization">初期化</button>
			</form>
			<?php include("procces.php"); ?>	
          </div> 
        </div>
      </div>
	<div class="wp-submitAllBtn">
	<?php submit_button('全体をサイトへ反映'); ?>
	</div>
</div>