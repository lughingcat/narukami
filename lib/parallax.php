<div id="cmaker_parallax_wrap" class="cmakerWrapparallax show-element notshow">
	<div class="parallax_Prevew">
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
			  parallax_primary_title, 
			  parallax_bg_img_url,  
			  parallax_title, 
			  parallax_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = 'insert_id_first'";
			}else{
			  $query = "SELECT 
			  insert_ids,
			  parallax_primary_title, 
			  parallax_bg_img_url,  
			  parallax_title, 
			  parallax_content 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = '" . $insertGlobalId . "'";
			}
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $parallax_primary_title = $row->parallax_primary_title;
				 $parallax_bgImg_url = $row->parallax_bg_img_url;
				 $parallax_title = $row->parallax_title; 
				 $parallax_content = $row->parallax_content; 
			  };
			  ?>
			<?php
		  	//array-check
		  	$pallx_primary_title_check = isset($_POST['pallx_primary_title']) ? $_POST['pallx_primary_title'] : "";
		  	$parallax_title_dec_check = isset($_POST['parallax_title']) ? $_POST['parallax_title'] : "";
		  	$parallax_bg_img_url_dec_check = isset($_POST['parallax_bg_img_url']) ? $_POST['parallax_bg_img_url'] : "";
		  	$parallax_content_dec_check = isset($_POST['parallax_content']) ? $_POST['parallax_content'] : "";
		  	//function-result
		  	$pallx_primary_title_result = data_variable_set($pallx_primary_title_check, $parallax_primary_title, $gm_numbers);
		  	$parallax_title_dec_result = data_variable_set_json($parallax_title_dec_check, $parallax_title, $gm_numbers);
		  	$parallax_bg_img_url_dec_result = data_variable_set_json($parallax_bg_img_url_dec_check, $parallax_bgImg_url, $gm_numbers);
		  	$parallax_content_dec_result = data_variable_set_json($parallax_content_dec_check, $parallax_content, $gm_numbers);
		  	?>
			<?php
			// 連想配列を作成
			$pallx_item_Array = array();
			
			// $parallax_title_dec_result が配列であるかを確認
			if (is_array($parallax_title_dec_result)) {
				// 各変数が配列であるかを確認
				if (is_array($parallax_bg_img_url_dec_result) && is_array($parallax_content_dec_result)) {
					for ($i = 0; $i < count($parallax_title_dec_result); $i++) {
						// 配列のインデックスが存在するかを確認
						if (isset($parallax_bg_img_url_dec_result[$i]) && isset($parallax_content_dec_result[$i])) {
							$pallx_item_Array[$parallax_title_dec_result[$i]] = array(
								'title' => $parallax_title_dec_result[$i],
								'imgurl' => $parallax_bg_img_url_dec_result[$i],
								'content' => $parallax_content_dec_result[$i]
							);
						} else {
							//url, content,　エラーハンドリング
						}
					}
				} else {
					//arrayに対するエラーハンドリング
				}
			} else {
				//全体arrayに対するエラーハンドリング
			}
			;?>
			
			<div class='parallax-container'>
				<div class='parallax-section'>
					<div class='parallax-layer'>
						<div class='parallax-title-wrap'>
							<p class='parallax-title'><?php echo $pallx_primary_title_result ;?></P>
						</div>
						</div>
				</div>
			<?php
			if(isset($pallx_item_Array) && is_array($pallx_item_Array)){
				foreach($pallx_item_Array as $key => $values){
					echo "<div class='parallax-section'>";
					echo "<div class=\"parallax-layer\" style=\"background-image: url('{$values['imgurl']}')\">";
					echo "<p class='parallax-content-title'>" . $values['title'] . "</p>";
					echo "<p class='parallax-content'>" . $values['content'] . "</p>";
					echo "</div>";
					echo "</div>";	
				}
			}
			;?>
			</div>
			</article>
	</div>
	<div class="inputForm">
	<h4>パララックスのメインタイトルを入力してください。</h4>
	<input type="text" name="parallax_primary_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=<?php echo $pallx_primary_title_result ;?>>
	<?php
	if (isset($pallx_item_Array) && is_array($pallx_item_Array)) {
		$index = 0;
		foreach ($pallx_item_Array as $key => $values ) {
			echo "<div id='parallaxform_$index' class='parallax-form'>";
			echo '<h4 class="h-admin-4-bg">パララックスの背景画像を選択してください。</h4>';
			$result_parallax_img = generate_upload_multipleimage_tag('parallax_bg_img_url', $values['imgurl'], $index, $insertGlobalId, $gm_numbers);
			echo $result_parallax_img;
			echo "<h4>パララックス画像内のタイトルを入力してください。</h4>";
			echo "<input id='parallax_title_$index' type='text' name='parallax_title[$gm_numbers][]' class='img-setect-url' value='" . $values['title'] . "'>";
			echo "<h4>パララックス画像内のコンテンツを入力してください。</h4>";
			echo "<textarea id='parallax_content_$index' type='text' name='parallax_content[$gm_numbers][]' class='img-setect-url'>{$values['content']}</textarea></br>";
			echo "</div>";
			
			$index++;
		}
	}
	?>
	</div>
	<button type="button" id="parallaxCloseBtn" onClick="closeFile(this)">閉じる</button>
<script>

</script>
</div>