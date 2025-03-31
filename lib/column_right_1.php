<div id="cmaker_column_right_1_wrap" class="cmakerWrapcolumn_right_1 show-element notshow">
	<div class="column_right_1_Prevew">
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
			  column_right_1_bg_img_url, 
			  column_right_1_title, 
			  column_right_1_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = 'insert_id_first'";
			}else{
			  $query = "SELECT
			  insert_ids,
			  column_right_1_bg_img_url, 
			  column_right_1_title, 
			  column_right_1_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = '" . $insertGlobalId . "'";
			}
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $column_right_1_bgImg_url = $row->column_right_1_bg_img_url;
				 $column_right_1_title = $row->column_right_1_title; 
				 $column_right_1_content = $row->column_right_1_content; 
				 $insert_id_array = $row->insert_ids;
			  };
			  ?>
			<?php
			//array-check
			$column_right_1_bgImg_url_check = isset($_POST['column_right_bg_img_url']) ? $_POST['column_right_bg_img_url'] : "";
			$column_right_1_title_check = isset($_POST['column_right_1_title']) ? $_POST['column_right_1_title'] : "";
			$column_right_1_content_check = isset($_POST['column_right_1_content']) ? $_POST['column_right_1_content'] : "";
			//function-result
			$column_right_1_bgImg_url_result = data_variable_set($column_right_1_bgImg_url_check, $column_right_1_bgImg_url, $gm_numbers);
			$column_right_1_title_result = data_variable_set($column_right_1_title_check, $column_right_1_title, $gm_numbers);
			$column_right_1_content_result = data_variable_set($column_right_1_content_check, $column_right_1_content, $gm_numbers);
			$column_right_1_content_nl2br = nl2br($column_right_1_content_result);
			?>
			<div class="column_right_1-all-wrap">
				<div class="column_right_1-text-wrap">
					<p class="column_right_1-main-title"><?php echo $column_right_1_title_result; ?></p>
					<p class="column_right_1-main-content"><?php echo stripslashes($column_right_1_content_nl2br); ?></p>
				</div>
				<div class="column_right_1-back-wrap">
					<img src="<?php echo $column_right_1_bgImg_url_result; ?>" alt="<?php echo $column_right_1_title_result; ?>">
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
	<input type="hidden" name="array-num[<?php echo $gm_numbers; ?>]" value="<?php echo $gm_numbers; ?>">
	<h4 class="h-admin-4-bg">画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_right_bg_img_url', $column_right_1_bgImg_url_result, $insertGlobalId, $gm_numbers);
	?>
	<h4>タイトルを入力してください。</h4>
	<input type="text" name="column_right_1_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=
		   <?php echo $column_right_1_title_result; ?>
		   >
	<h4>文章を入力してください。</h4>
	<textarea name="column_right_1_content[<?php echo $gm_numbers; ?>]" class="narukami-tinymce-editor"><?php echo stripslashes($column_right_1_content_result);?>
	</textarea>
	</div>
	<button type="button" id="column_right_1CloseBtn" onClick="closeFile(this)">閉じる</button>
</div>