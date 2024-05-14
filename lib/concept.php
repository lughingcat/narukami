<div id="cmaker_concept_wrap" class="cmakerWrapConcept show-element notshow">
	<div class="concept_Prevew">
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
				concept_bg_img_url,  
				concept_title, 
				concept_content 
				FROM wp_narukami_content_maker 
				WHERE insert_ids = 'insert_id_first'";
			}else{
				$query = "SELECT 
				insert_ids, 
				concept_bg_img_url,  
				concept_title, 
				concept_content 
				FROM wp_narukami_content_maker 
				WHERE insert_ids = '" . $insertGlobalId . "'";
			}
			
		    $rows = $wpdb->get_results($query);
		    foreach($rows as $row) {
			   $concept_bgImg_url = $row->concept_bg_img_url;
			   $concept_title = $row->concept_title; 
			   $concept_content = $row->concept_content;
			   $insert_id_array = $row->insert_ids;
		    };
		  ?>
		<div class="concept-back-wrap"
			 style="background-image: url(<?php 
					if( isset( $_POST['concept_bg_img_url']) && is_array( $_POST['concept_bg_img_url'])){ 
						echo $_POST['concept_bg_img_url'][$gm_numbers]; 
					}elseif( !isset($_POST['concept_bg_img_url']) ){ 
						echo $concept_bgImg_url; }
					;?> 
			)">
			<div class="concept-text-wrap">
			<p class="concept-main-title">
				<?php 
				if(isset( $_POST['concept_title']) && is_array( $_POST['concept_title'])) {
					echo $_POST['concept_title'][$gm_numbers]; 
				} elseif( !isset($_POST['concept_title'])) {
					echo $concept_title;
				}
				?>
			</p>
			<p class="concept-main-content">
				<?php 
				if( isset( $_POST['concept_content']) && is_array($_POST['concept_content'])){ 
					echo nl2br($_POST['concept_content'][$gm_numbers]); 
				}elseif( !isset($_POST['concept_content'])) { 
					echo nl2br($concept_content); 
				}
				;?>
			</p>
			</div>
		</div>
		</article>
	</div>
	<div class="inputForm">
	<?php 
		if( !empty($_POST['concept_bg_img_url']) ){ 
			$concept_bg_url = $_POST['concept_bg_img_url'][$gm_numbers]; 
		}else{ 
			$concept_bg_url = $concept_bgImg_url;
		}	
	;?>
	<h4 class="h-admin-4-bg">コンセプト表示の背景画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('concept_bg_img_url', $concept_bg_url, $insertGlobalId, $gm_numbers);
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="concept_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['concept_title'])){
			   echo $_POST['concept_title'][$gm_numbers];
		   }else{
			   echo $concept_title;
		   }
			   ;?>
		   >
	<h4>コンセプト文章を入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="concept_content[<?php echo $gm_numbers; ?>]" class="adm-textarea"><?php
		if( isset($_POST['concept_content'])){
			echo $_POST['concept_content'][$gm_numbers];
		}else{
			echo $concept_content;
		}
		;?>
		</textarea>
	</div>
	<button type="button" id="conceptCloseBtn" onClick="closeFile(this)">閉じる</button>
</div>