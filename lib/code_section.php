<div id="cmaker_code_section_wrap" class="cmakerWrapCodeSection show-element notshow">
	<div class="code_section_Prevew">
		<article class="cmakerPrevew">
		<?php
		    require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
		    global $wpdb;
			global $insert_id_post;
			 if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
				 $insertGlobalId = $_SESSION['insertGlobalId'];
				 if(preg_match('/([a-zA-Z]+)(\d+)/', $insertGlobalId, $matches)) {
					 $gm_numbers = $matches[2];
					 var_dump('セッション送信:'. $gm_numbers);
				 }
			 } else {
				 $insertGlobalId = $insert_id_post;
				 if(preg_match('/([a-zA-Z]+)(\d+)/', $insertGlobalId, $matches)) {
					 $gm_numbers = $matches[2];
					 var_dump('ポスト送信orDB値:'. $gm_numbers);
				 }
			 }
			$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}narukami_content_maker WHERE insert_ids = %s", $insertGlobalId);
			$id_result = $wpdb->get_results($sql);
			
			if( empty($id_result) || $insert_id_post !== $insertGlobalId){
				$query = "SELECT 
				insert_ids,  
				code_section 
				FROM wp_narukami_content_maker 
				WHERE insert_ids = 'insert_id_first'";
			}else{
				$query = "SELECT 
				insert_ids, 
				code_section 
				FROM wp_narukami_content_maker 
				WHERE insert_ids = '" . $insertGlobalId . "'";
			}
			
		    $rows = $wpdb->get_results($query);
		    foreach($rows as $row) {
			   $code_section_value = $row->code_section;
			   $insert_id_array = $row->insert_ids;
		    };
		  ?>
		  <?php
		  //array-check
		  $code_section_value_check = isset($_POST['code_section_code']) ? $_POST['code_section_code'] : "";
		  //function-result
		  $code_section_value_result = data_variable_set($code_section_value_check, $code_section_value, $gm_numbers);
		  ?>
			
		<div>
			
		</div>
		</article>
	</div>
	<div class="inputForm">
	<input type="hidden" name="array-num[<?php echo $gm_numbers; ?>]" value="<?php echo $gm_numbers; ?>">
	<h4>差し込むコードを入力してください。</h4>
	<textarea name="code_section_code[<?php echo $gm_numbers; ?>]" class="narukami-code-editor"><?php echo $code_section_value_result; ?>
	</textarea>
	</div>
	<button type="button" id="codeSectionCloseBtn" onClick="closeFile(this)">閉じる</button>
</div>