<div id="back_wrap">
	<form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">サブフッター設定</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">サブフッターを設定すると、メニュー一覧ページ、個別商品ページに自動で差し込まれます。メニュー内でユーザー回遊が起こりやすく、サイト滞在時間が伸びますので設定する事を推奨します。</p>
			  <p class="prev-adm">プレビュー</p>
				<div class="sub_footer_prev">
					<?php get_template_part('subfooter');?>
				</div>
			  	<h4>サブフッターのタイトルとリンク先URLを記載してください。</h4>
			     <div class="all_form_wrap">
			  		<div class="text_form_wrap">
						<p class="form_title">タイトル</p>
						
						
						
						<?php
						//クリックして配列を取り出す
						$textform = '<input type="text" id="text" name="textfoxs[]" value=';
						$optionnum = get_option('textfoxs');
						foreach( (array)$optionnum as $retern){
                        echo $textform . '"' . $retern .'">';
                        }	
						$defultform = '<input type="text" id="text" name="textfoxs[]" value="テキストを入力してください">';
						echo $defultform;
						
						
						if(isset($_POST['add'])) {
						
						} else if(isset($_POST['remove'])) {
							$textformdel = array_pop($textform , $retern);
							var_dump($textformdel);
							unset($textformdel);
						}
						
						//データが空の場合は１つのinputタグと追加、移動ボタンを出力
						//設定を保存で配列をinputタグに返す
						//追加ボタンをクリックで配列に空値をセット（input要素自動出力foreach）
						//削除ボタンをクリックで配列の最後を削除（inputの最後が自動削除foreach）
						?>
			  		</div>
					 
				       <input type="submit" name="add" formaction="admin.php?page=custom_submenu_page_5" value="登録" />
   					   <input type="submit" name="remove" value="削除" />
			　　　　　　　　
						
		              
			        <div class="url_form_wrap">
						<p class="form_title">URL</p>
			        </div>
			     </div>
			  <div class="color-bg-box">
				  <?php 
				  genelate_color_picker_tag_demo(
                    'bgcolor', 
                    get_option('bgcolor'), 
                    'サブフッターの背景色を選択してください。'
                  );
                  ?>
				  <?php 
				  genelate_color_picker_tag_demo(
                    'textcolor', 
                    get_option('textcolor'), 
                    'テキストの文字色を選択してください。'
                  );
                  ?>
			  </div
          </div> 
        </div>
      </div>
	</div>
	<?php submit_button(); ?>
	</form>
		
		
		<?php 
            $textname = get_option('textfoxs');
			var_dump($textname);
        ?>
</div>
