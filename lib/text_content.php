<div id="cmaker_text_content_wrap" class="cmakerWraptext_content show-element notshow">
	<div class="text_content_Prevew">
		<article class="cmakerPrevew">
			<?php
			require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			global $wpdb;
			global $insert_id_post;
			 if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
				 $insertGlobalId = $_SESSION['insertGlobalId'];
				 if(preg_match('/([a-zA-Z]+)(\d+)/', $insertGlobalId, $matches)) {
					 $gm_numbers = $matches[2];
					 //var_dump('セッション送信:'. $gm_numbers);
				 }
			 } else {
				 $insertGlobalId = $insert_id_post;
				 if(preg_match('/([a-zA-Z]+)(\d+)/', $insertGlobalId, $matches)) {
					 $gm_numbers = $matches[2];
					 //var_dump('ポスト送信orDB値:'. $gm_numbers);
				 }
			 }
			$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}narukami_content_maker WHERE insert_ids = %s", $insertGlobalId);
			$id_result = $wpdb->get_results($sql);
			
			if( empty($id_result) || $insert_id_post !== $insertGlobalId){
			  $query = "SELECT 
			  insert_ids,
			  text_content_bg_color, 
			  text_content_title_color,
			  text_content_title, 
			  text_content_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = 'insert_id_first'";
			}else{
			  $query = "SELECT 
			  insert_ids,
			  text_content_bg_color, 
			  text_content_title_color,
			  text_content_title, 
			  text_content_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = '" . $insertGlobalId . "'";
			}
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $text_content_bg_color = $row->text_content_bg_color;
				 $text_content_title = $row->text_content_title; 
				 $text_content_content = $row->text_content_content; 
				 $text_content_title_color= $row->text_content_title_color; 
				 $insert_id_array = $row->insert_ids;
			  };
			  ?>
			<?php
			//array-check
			$text_content_title_check = isset($_POST['text_content_title']) ? $_POST['text_content_title'] : "";
			$text_content_content_check = isset($_POST['text_content_content']) ? $_POST['text_content_content'] : "";

			//function-result
			$text_content_title_result = data_variable_set($text_content_title_check, $text_content_title, $gm_numbers);
			$text_content_content_result = data_variable_set($text_content_content_check, $text_content_content, $gm_numbers);
			$text_content_content_result_nl2br = nl2br($text_content_content_result)
			?>
			<div class="text_content-back-wrap">
				<div class="text_content-text-wrap">
				<p class="text_content-main-title"><?php echo $text_content_title_result; ?></p>
				<p class="text_content-main-content"><?php echo stripslashes($text_content_content_result_nl2br); ?></p>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
	<input type="hidden" name="array-num[<?php echo $gm_numbers; ?>]" value="<?php echo $gm_numbers; ?>">
	<h4>テキストエリアのタイトルを入力してください。</h4>
	<input type="text" name="text_content_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=
		   <?php echo $text_content_title_result; ?>
		   >
	<h4>テキストエリアのコンテンツを入力してください</h4>
	<?php settings_fields('my_custom_editor_group'); ?>
    <?php do_settings_sections('my_custom_editor_group'); ?>
	<textarea id="text_content_area" name="text_content_content[<?php echo $gm_numbers; ?>]" class="narukami-tinymce-editor"><?php echo stripslashes($text_content_content_result); ?>
	</textarea>
	</div>
	<button type="button" id="text_contentCloseBtn" onClick="closeFile(this)">閉じる</button>
</div>