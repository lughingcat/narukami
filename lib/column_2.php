<div id="cmaker_column_2_wrap" class="cmakerWrapcolumn_2 show-element notshow">
	<div class="column_2_Prevew">
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
			  column_2_bg_img_url,  
			  column_2_title,
			  column_2_content, 
			  column_2_sec_bg_img_url,  
			  column_2_sec_title, 
			  column_2_sec_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = 'insert_id_first'";
			}else{
			  $query = "SELECT 
			  insert_ids,
			  column_2_bg_img_url,  
			  column_2_title,
			  column_2_content, 
			  column_2_sec_bg_img_url,  
			  column_2_sec_title, 
			  column_2_sec_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = '" . $insertGlobalId . "'";
			}
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $column_2_bgImg_url = $row->column_2_bg_img_url;
				 $column_2_title = $row->column_2_title; 
				 $column_2_content = $row->column_2_content;
				 $column_2_sec_bgImg_url = $row->column_2_sec_bg_img_url;
				 $column_2_sec_title = $row->column_2_sec_title; 
				 $column_2_sec_content = $row->column_2_sec_content;
				 $insert_id_array = $row->insert_ids;
			  };
			  ?>
			<?php
			//array-check
			//1
			
			$column_2_Img_url_check = isset($_POST['column_two_bg_img_url']) ? $_POST['column_two_bg_img_url'] : "";
			$column_2_title_check = isset($_POST['column_2_title']) ? $_POST['column_2_title'] : "";
			$column_2_content_check = isset($_POST['column_2_content']) ? $_POST['column_2_content'] : "";
			
			
			//2
			$column_2_sec_Img_url_check = isset($_POST['column_two_sec_bg_img_url']) ? $_POST['column_two_sec_bg_img_url'] : "";
			$column_2_sec_title_check = isset($_POST['column_2_sec_title']) ? $_POST['column_2_sec_title'] : "";
			$column_2_sec_content_check = isset($_POST['column_2_sec_content']) ? $_POST['column_2_sec_content'] : "";
			
			//function-result
			//1
			
			$column_2_Img_url_result = data_variable_set($column_2_Img_url_check, $column_2_bgImg_url, $gm_numbers);
			$column_2_title_result = data_variable_set($column_2_title_check, $column_2_title, $gm_numbers);
			$column_2_content_result = data_variable_set($column_2_content_check, $column_2_content, $gm_numbers);
			$column_2_content_nl2br = nl2br($column_2_content_result);
			//2
			
			$column_2_sec_Img_url_result = data_variable_set($column_2_sec_Img_url_check, $column_2_sec_bgImg_url, $gm_numbers);
			$column_2_sec_title_result = data_variable_set($column_2_sec_title_check, $column_2_sec_title, $gm_numbers);
			$column_2_sec_content_result = data_variable_set($column_2_sec_content_check, $column_2_sec_content, $gm_numbers);
			$column_2_sec_content_nl2br = nl2br($column_2_sec_content_result);
			
			?>
			<div class="column_2-all-wrap">
				<div class="column_2_item_wrap">
				<div class="column_2-back-wrap">
					<img src="<?php echo $column_2_Img_url_result; ?>" alt="<?php echo $column_2_title_result; ?>">
				</div>
				<div class="column_2-text-wrap">
					<p class="column_2-main-title"><?php echo $column_2_title_result; ?></p>
					<p class="column_2-main-content"><?php echo stripslashes($column_2_content_nl2br); ?></p>
				</div>
				</div>
				<div class="column_2_item_wrap">
				<div class="column_2-back-wrap">
					<img src="<?php echo $column_2_sec_Img_url_result; ?>" alt="<?php echo $column_2_sec_title_result; ?>">
				</div>
				<div class="column_2-text-wrap">
					<p class="column_2-main-title"><?php echo $column_2_sec_title_result; ?></p>
					<p class="column_2-main-content"><?php echo stripslashes($column_2_sec_content_nl2br); ?></p>
				</div>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
	<input type="hidden" name="array-num[<?php echo $gm_numbers; ?>]" value="<?php echo $gm_numbers; ?>">
	<h4 class="h-admin-4-bg">画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_two_bg_img_url', $column_2_Img_url_result, $insertGlobalId, $gm_numbers);
	?>
	<h4>タイトルを入力してください。</h4>
	<input type="text" name="column_2_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=
		   <?php echo $column_2_title_result; ?>
	>
	<h4>文章を入力してください。</h4>
	<textarea name="column_2_content[<?php echo $gm_numbers; ?>]" class="narukami-tinymce-editor"><?php echo stripslashes($column_2_content_result); ?>
	</textarea>
	</div>
	<div class="inputForm">
	<h4 class="h-admin-4-bg">画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_two_sec_bg_img_url', $column_2_sec_Img_url_result, $insertGlobalId, $gm_numbers);
	?>
	<h4>タイトルを入力してください。</h4>
	<input type="text" name="column_2_sec_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=
		   <?php
		   echo $column_2_sec_title_result; 
		   ?>
	>
	<h4>文章を入力してください。</h4>
	<textarea name="column_2_sec_content[<?php echo $gm_numbers; ?>]" class="narukami-tinymce-editor"><?php
		echo stripslashes($column_2_sec_content_result); ?>
	</textarea>
	</div>
	<button type="button" id="column_2CloseBtn" onClick="closeFile(this)">閉じる</button>
</div>