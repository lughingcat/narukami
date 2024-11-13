<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>
	
	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">鳴雷トップページビルダー[NarukamiTopPageBilder]</span></h3>
        <div class="inside">
		  <h2 class="narukami-admin-h2">各セクションパーツデザイン</h2>
			
		  <div class="hopup-section-all-wrap">
			  <div class="hopup-discription">
			  	<p>
			  	鳴雷トップページビルダーの各セクションのデザインを確認できます。</br>
			  	ボタンをクリックするとホップアップ表示しますので作成前にご確認ください。</br>
			  	用途など詳細も記載していますのでご自身の作りたいサイトに合わせてご利用ください。</br>
			  	</p>
			</div>
			  <div class="hopup-button-wrap">
			  	<button id="popup-ranking-btn" type="button" class="narukami-hopup-section-btn">ランキング</button>
				  <div id="hopup-ranking-wrap" class="popup-element-narukami popup-notshow">
					<iframe id="popup-ranking" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-ranking.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">ランキングセクションです。</br>お店のおすすめ商品を紹介してください。</br>デザインパターンは複数ご用意しています。お好みにカスタムしてください。</p>
						</div>
					<button id="ranking-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  </div>
			  	<button id="popup-concept-btn" type="button" class="narukami-hopup-section-btn">コンセプト</button>
				  <div id="hopup-concept-wrap" class="popup-element-narukami popup-notshow">
					<iframe id="popup-concept" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-concept.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">コンセプトセクションです。</br>キャッチフレーズと店舗の伝えたい思いを記述してください。</br>背景画像は全画面表示になってます。店の人気メニューを載せると効果的です。</p>
						</div>
					<button id="concept-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  </div>
			  	<button id="popup-grandmenu-btn" type="button" class="narukami-hopup-section-btn">グランドメニュー</button>
				  <div id="hopup-grandmenu-wrap" class="popup-element-narukami popup-notshow">
					<iframe id="popup-grandmenu" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-grandmenu.php'; ?>"></iframe>
						<div class="hopup-prevew-discription grandmenu-custumtop">
							<p class="hopup-info">グランドメニューセクションです。</br>お店の商品ジャンルのリンク元としてお使いください。コース料理がある場合コース料理一覧ページへのリンク元としてもご利用いただけます。</p>
						</div>
					<button id="grandmenu-delete-hopup-btn" type="button" class="hopup-delete-btn custum-top-gm" onclick="hopupDeleteElment(this)">Delete</button>
				  </div>
			  	<button id="popup-right1-btn" type="button" class="narukami-hopup-section-btn">右寄せ1カラム</button>
					<div id="hopup-right1-wrap" class="popup-element-narukami popup-notshow">
						<iframe id="popup-right1" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-right1.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">右寄せ1カラムセクションです。</br>画像と説明を一緒に訴求できます。画面一杯のセクションの間に挟むように使うとおしゃれにデザインできます。</p>
						</div>
					<button id="right1-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  	</div>
			  	<button id="popup-left1-btn" type="button" class="narukami-hopup-section-btn">左寄せ1カラム</button>
					<div id="hopup-left1-wrap" class="popup-element-narukami popup-notshow">
						<iframe id="popup-left1" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-left1.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">左寄せ1カラムセクションです。</br>画像と説明を一緒に訴求できます。画面一杯のセクションの間に挟むように使うとおしゃれにデザインできます。</p>
						</div>
					<button id="left1-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  	</div>
			  	<button id="popup-column2-btn" type="button" class="narukami-hopup-section-btn">2カラム</button>
					<div id="hopup-column2-wrap" class="popup-element-narukami popup-notshow">
						<iframe id="popup-column2" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-2column.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">2カラムセクションです。</br>お店のサブコンテンツや並べて訴求したい場合有効です。連続で使うことで使っている素材のこだわりや調味料のこだわりなどを伝えることができます。</p>
						</div>
					<button id="column2-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  	</div>
			  	<button id="popup-column3-btn" type="button" class="narukami-hopup-section-btn">3カラム</button>
					<div id="hopup-column3-wrap" class="popup-element-narukami popup-notshow">
						<iframe id="popup-column3" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-3column.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">3カラムセクションです。</br>お店のサブコンテンツや並べて訴求したい場合有効です。連続で使うことで使っている素材のこだわりや調味料のこだわりなどを伝えることができます。</p>
						</div>
					<button id="column3-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  	</div>
			  	<button id="popup-parallax-btn" type="button" class="narukami-hopup-section-btn">パララックス</button>
					<div id="hopup-parallax-wrap" class="popup-element-narukami popup-notshow">
						<iframe id="popup-parallax" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-parallax.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">パララックスセクションです。</br>とにかく派手に動きのあるセクションをデザインできます。画面いっぱいの画像で美味しそうな料理画像を並べてお店のブランド力を訴求できます。</p>
						</div>
					<button id="parallax-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  	</div>
			  	<button id="popup-storeinfo-btn" type="button" class="narukami-hopup-section-btn">店舗情報</button>
					<div id="hopup-storeinfo-wrap" class="popup-element-narukami popup-notshow">
						<iframe id="popup-storeinfo" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-storeinfo.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">店舗情報セクションです。</br>お店の営業概要を訴求できます。フッターの上に配置すると一番効果的に訴求できます。Googleマップの埋め込みも出来るように設計しています。</p>
						</div>
					<button id="storeinfo-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  	</div>
			  	<button id="popup-textarea-btn" type="button" class="narukami-hopup-section-btn">テキストエリア</button>
					<div id="hopup-textarea-wrap" class="popup-element-narukami popup-notshow">
						<iframe id="popup-textarea" class="hopup-element-iframe" src="<?php echo get_template_directory_uri() . '/popup-element/popup-textarea.php'; ?>"></iframe>
						<div class="hopup-prevew-discription">
							<p class="hopup-info">テキストエリアセクションです。</br>画像なしで、シンプルに文字だけで訴求したい場合に有効です。画像がメインのコンセプトセクションやパララックスセクションの後に使用するとおしゃれにデザインできます。</p>
						</div>
					<button id="textarea-delete-hopup-btn" type="button" class="hopup-delete-btn" onclick="hopupDeleteElment(this)">Delete</button>
				  	</div>
			  </div>
		  </div>

		<h2 class="narukami-admin-h2">鳴雷トップページビルダーの使い方</h2>
		  <div class="tpb-discription-textwrap">
  			<p>トップページビルダーの使い方を解説します。</br>インフォメーションの各種ボタンにマウスオーバーさせると詳細解説が表示されますのでご確認ください。</p>
  			<p>[操作方法]</p>
  			<p>コンテンツを追加して、セクションを選択し表示したいデータを入力してください。</p>
  			<p>各セクションは並んでいる順番でトップページへ表示されます。</p>
  			<p>入力が完了しましたら「設定を保存」というボタンをクリックし、設定をデータベースへ保存してください。</br>ここで保存されたデータがトップページとして表示されます。</p>
  			<p>保存されてない状態で作成途中のトップページデザインを確認をしたい場合は「PREVEW」ボタンをクリックしてください。作成途中でも状態を確認することができます。</p>
		  </div>
		  <div class="tpb-discription">
			  <div class="hover-container">
		    	<button class="hover-btn-discription"><i class="fa-solid fa-up-down-left-right"></i></button>
		    	<p class="hover-discrption-text">マウスオーバーした状態でドラッグアンドドロップすると各セクションの並べ替えが可能です。</br>保存していないセクションは移動ができません。</p>
			  </div>
			  <div class="hover-container">
		    	<button class="hover-btn-discription hover-delete">削除</button>
		    	<p class="hover-discrption-text">追加したまたは既存のセクションを削除します。</br>ここで削除を行ってもデータベースの入力値は削除はされません。</br>データベースの削除を行う場合は「設定を保存」ボタンを押して</br>新規データとして保存してください。</p>
			  </div>
			  <div class="hover-container">
		    	<button class="hover-btn-discription file-open-icon"><i class="fa-regular fa-folder-open"></i></button>
		    	<p class="hover-discrption-text">データベースに保存した値が出力されている場合このアイコンが登場します。</br>クリックすると入力フォームが出現しますので、変更や追加を行ってください。</br>決定した際は、「設定を保存」ボタンを押してデータベースへ保存をしてください。</p>
			  </div>
			  <div class="hover-container">
		    	<button class="hover-btn-discription file-close-icon"><i class="fa-solid fa-folder-closed"></i></button>
		    	<p class="hover-discrption-text">セクションを選択した際このボタンが出現します。</br>このボタンが出現した状態は、データベースへの値の保存が完了していない状態です。</br>「設定を保存」ボタンを押すことでオレンジファイルボタンに変わります。</br>このボタンが出現している場合、「移動」ができません。</br>移動をする場合は「設定を保存」ボタンを押し、データベースへの値の保存を完了させ</br>オレンジファイルボタンを出現させてから移動を行ってください。</p>
			  </div>
			  <div class="hover-container">
		    	<button class="hover-btn-discription add-section-btn">コンテンツを追加</button>
		    	<p class="hover-discrption-text">このボタンをクリックすると新しいセクションを追加できます。</br>追加したらセクションを選択、値を入力し</br>「設定を保存」ボタンをクリックしてデータベースへ値を保存してください。</p>
			  </div>
			  <div class="hover-container">
		    	<button class="hover-btn-discription save-section-btn">設定を保存</button>
		    	<p class="hover-discrption-text">現在表示されてる各セクションの入力値を全てデータベースへ保存します。</br>ここで保存された値がセクション並び順にトップページへ出力されます。</p>
			  </div>
			  <div class="hover-container">
		    	<button class="hover-btn-discription prevew-section-btn">PREVEW</button>
		    	<p class="hover-discrption-text">現在作成途中のトップページビルダーの確認ができます。</br>保存、未保存関係なくデザインを確認したい際にクリックしてください。</p>
			  </div>
		  </div>
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
			  	<?php 
				  include('insert-id-reload-ajax.php');
				  ?>
			  </div>
			  
			  <?php $i = 0; foreach($selectboxitem_summarize as $entry) : ?>
			  <div id="clone-wrap_<?php echo $i; ?>" class="clone-wrap-parent">
				  <input type="hidden" id="insert-ids-<?php echo $i; ?>" name="insert_ids[]" class="insert-item-id" value="insert-id<?php echo $i; ?>">
			  <div class="select-box-item-wrap">
			  <div class="move-handle"><p><i class="fa-solid fa-up-down-left-right"></i></p></div>
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
				  <button type="button" id="open-file<?php echo $i?>" class="open-file-button" onClick="openPageElement(this)"><i class="fa-regular fa-folder-open"></i></button>
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
			  </div><!--content-Container-end-->
			  </div><!--select-box-item-wrap-end-->
			  </div><!--clone-wrap-parent-end-->
			  <?php $i++; endforeach; ?>
			  <div id="clonedSelectBoxes"></div>
			  </div><!--mainEnd-->
			<div class="control-setting-btn">
				<button type="button" class="reproduction-btn" onclick="cloneSelectBox(); rankingRemoved(this);"><span>コンテンツを追加</span></button>	
				<button id="gmvalidate" type="submit" class="top-page-maker-save-btn" name="toppage_initialization">設定を保存</button>
				<?php 
				// プレビューボタン
    			$preview_link = add_query_arg(
    			    array(
    			        'preview' => 'true',
    			        'page' => 'toppage_builder_preview'
    			    ),
    			    home_url('/')
    			);
				echo '<button type="button" class="narukami-prevew-btn" onclick="submitPreviewForm()">PREVEW</button>';
echo '
<script type="text/javascript">
function submitPreviewForm() {
    var form = document.getElementById("post-toppage-maker");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    var preview_link = "' . $preview_link . '";
    xhr.open("POST", preview_link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            console.log("XHR Status:", xhr.status);
            if (xhr.status == 200) {
                var previewWindow = window.open(preview_link, "_blank");
                previewWindow.document.open();
                previewWindow.document.write(xhr.responseText);
                previewWindow.document.close();
            }
        }
    };
    xhr.send(formData);
}
</script>
';
				?>
			</div>
			</form>
			<?php include("procces.php"); ?>	
          </div> 
        </div>
      </div>
</div>