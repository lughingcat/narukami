<div id="cmaker_column_3_wrap" class="cmakerWrapcolumn_3 show-element notshow">
	<div class="column_3_Prevew">
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
			  column_3_bg_img_url,  
			  column_3_title, 
			  column_3_content, 
			  column_3_sec_bg_img_url,  
			  column_3_sec_title,
			  column_3_sec_content, 
			  column_3_third_bg_img_url, 
			  column_3_third_title, 
			  column_3_third_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = 'insert_id_first'";
			}else{
			  $query = "SELECT 
			  insert_ids,
			  column_3_bg_img_url,  
			  column_3_title, 
			  column_3_content, 
			  column_3_sec_bg_img_url,  
			  column_3_sec_title,
			  column_3_sec_content, 
			  column_3_third_bg_img_url, 
			  column_3_third_title, 
			  column_3_third_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = '" . $insertGlobalId . "'";
			}
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $column_3_bgImg_url = $row->column_3_bg_img_url;
				 $column_3_title = $row->column_3_title; 
				 $column_3_content = $row->column_3_content;
				 $column_3_sec_bgImg_url = $row->column_3_sec_bg_img_url;
				 $column_3_sec_title = $row->column_3_sec_title; 
				 $column_3_sec_content = $row->column_3_sec_content; 
				 $column_3_third_bgImg_url = $row->column_3_third_bg_img_url;
				 $column_3_third_title = $row->column_3_third_title; 
				 $column_3_third_content = $row->column_3_third_content;
				 $insert_id_array = $row->insert_ids;
			  };
			  ?>
			<?php
			//array-check
			//1
			
			$column_3_Img_url_check = isset($_POST['column_three_bg_img_url']) ? $_POST['column_three_bg_img_url'] : "";
			$column_3_title_check = isset($_POST['column_3_title']) ? $_POST['column_3_title'] : "";
			$column_3_content_check = isset($_POST['column_3_content']) ? $_POST['column_3_content'] : "";
			
			//2
			$column_3_sec_Img_url_check = isset($_POST['column_three_sec_bg_img_url']) ? $_POST['column_three_sec_bg_img_url'] : "";
			$column_3_sec_title_check = isset($_POST['column_3_sec_title']) ? $_POST['column_3_sec_title'] : "";
			$column_3_sec_content_check = isset($_POST['column_3_sec_content']) ? $_POST['column_3_sec_content'] : "";
			
			//3
			$column_3_third_Img_url_check = isset($_POST['column_three_third_bg_img_url']) ? $_POST['column_three_third_bg_img_url'] : "";
			$column_3_third_title_check = isset($_POST['column_3_third_title']) ? $_POST['column_3_third_title'] : "";
			$column_3_third_content_check = isset($_POST['column_3_third_content']) ? $_POST['column_3_third_content'] : "";
			
			//function-result
			//1
			
			$column_3_Img_url_result = data_variable_set($column_3_Img_url_check, $column_3_bgImg_url, $gm_numbers);
			$column_3_title_result = data_variable_set($column_3_title_check, $column_3_title, $gm_numbers);
			$column_3_content_result = data_variable_set($column_3_content_check, $column_3_content, $gm_numbers);
			$column_3_content_nl2br = nl2br($column_3_content_result);
			
			//2
			
			$column_3_sec_Img_url_result = data_variable_set($column_3_sec_Img_url_check, $column_3_sec_bgImg_url, $gm_numbers);
			$column_3_sec_title_result = data_variable_set($column_3_sec_title_check, $column_3_sec_title, $gm_numbers);
			$column_3_sec_content_result = data_variable_set($column_3_sec_content_check, $column_3_sec_content, $gm_numbers);
			$column_3_sec_content_nl2br = nl2br($column_3_sec_content_result);
			
			//3
			
			$column_3_third_Img_url_result = data_variable_set($column_3_third_Img_url_check, $column_3_third_bgImg_url, $gm_numbers);
			$column_3_third_title_result = data_variable_set($column_3_third_title_check, $column_3_third_title, $gm_numbers);
			$column_3_third_content_result = data_variable_set($column_3_third_content_check, $column_3_third_content, $gm_numbers);
			$column_3_third_content_nl2br = nl2br($column_3_third_content_result);
			
			?>
			<div class="column_3-all-wrap">
				<div class="column_3_item_wrap">
				<div class="column_3-back-wrap">
					<img src="<?php echo $column_3_Img_url_result; ?>" alt="<?php echo $column_3_title_result; ?>">
				</div>
				<div class="column_3-text-wrap">
					<p class="column_3-main-title"><?php echo $column_3_title_result; ?></p>
					<p class="column_3-main-content"><?php echo stripslashes($column_3_content_nl2br); ?></p>
				</div>
				</div>
				<div class="column_3_item_wrap">
				<div class="column_3-back-wrap">
					<img src="<?php echo $column_3_sec_Img_url_result; ?>" alt="<?php echo $column_3_sec_title_result; ?>">
				</div>
				<div class="column_3-text-wrap">
					<p class="column_3-main-title"><?php echo $column_3_sec_title_result; ?></p>
					<p class="column_3-main-content"><?php echo stripslashes($column_3_sec_content_nl2br); ?></p>
				</div>
				</div>
				<div class="column_3_item_wrap">
				<div class="column_3-back-wrap">
					<img src="<?php echo $column_3_third_Img_url_result; ?>" alt="<?php echo $column_3_third_title_result; ?>">
				</div>
				<div class="column_3-text-wrap">
					<p class="column_3-main-title"><?php echo $column_3_third_title_result; ?></p>
					<p class="column_3-main-content"><?php echo stripslashes($column_3_third_content_nl2br); ?></p>
				</div>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
	<input type="hidden" name="array-num[<?php echo $gm_numbers; ?>]" value="<?php echo $gm_numbers; ?>">	
	<h4 class="h-admin-4-bg">画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_three_bg_img_url', $column_3_Img_url_result, $insertGlobalId, $gm_numbers);
	?>
	<h4>タイトルを入力してください。</h4>
	<input type="text" name="column_3_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=
		  <?php echo $column_3_title_result; ?>
		   >
	<h4>文章を入力してください。</h4>
	<textarea name="column_3_content[<?php echo $gm_numbers; ?>]" class="narukami-tinymce-editor"><?php echo stripslashes($column_3_content_result); ?>
	</textarea>
	</div>
	<div class="inputForm">
	<h4 class="h-admin-4-bg">画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_three_sec_bg_img_url', $column_3_sec_Img_url_result, $insertGlobalId, $gm_numbers);
	?>
	<h4>タイトルを入力してください。</h4>
	<input type="text" name="column_3_sec_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=
		   <?php echo $column_3_sec_title_result; ?>
		   >
	<h4>文章を入力してください。</h4>
	<textarea name="column_3_sec_content[<?php echo $gm_numbers; ?>]" class="narukami-tinymce-editor"><?php echo stripslashes($column_3_sec_content_result); ?>
		</textarea>
	</div>
	<div class="inputForm">
	<h4 class="h-admin-4-bg">画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_three_third_bg_img_url', $column_3_third_Img_url_result, $insertGlobalId, $gm_numbers);
	?>
	<h4>タイトルを入力してください。</h4>
	<input type="text" name="column_3_third_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=
		   <?php echo $column_3_third_title_result; ?>
		   >
	<h4>文章を入力してください。</h4>
	<textarea name="column_3_third_content[<?php echo $gm_numbers; ?>]" class="narukami-tinymce-editor"><?php echo stripslashes($column_3_third_content_result); ?>
	</textarea>
	</div>
	<button type="button" id="column_3CloseBtn" onClick="closeFile(this)">閉じる</button>
</div>