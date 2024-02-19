<div id="cmaker_parallax_wrap" class="cmakerWrapparallax">
	<div class="parallax_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT parallax_primary_title, parallax_bg_img_url,  parallax_title, parallax_content FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $parallax_primary_title = $row->parallax_primary_title;
				 $parallax_bgImg_url = $row->parallax_bg_img_url;
				 $parallax_title = $row->parallax_title; 
				 $parallax_content = $row->parallax_content; 
			  };
			  ?>
			<?php
			if(isset($_POST['parallax_primary_title'])){
			$pallx_primary_title = $_POST['parallax_primary_title'];
			}else{
			$pallx_primary_title = $parallax_primary_title;
			}
			if(isset($_POST['parallax_bg_img_url'])){
			$parallax_title_dec = $_POST['parallax_title'];
			$parallax_bg_img_url_dec = $_POST['parallax_bg_img_url'];
			$parallax_content_dec = $_POST['parallax_content'];
			}else{
			$parallax_title_dec = json_decode($parallax_title);
			$parallax_bg_img_url_dec = json_decode($parallax_bgImg_url);
			$parallax_content_dec = json_decode($parallax_content);
			}
			// 連想配列を作成
			$pallx_item_Array = array();
			
			for ($i = 0; $i < count($parallax_title_dec); $i++) {
				$pallx_item_Array[$parallax_title_dec[$i]] = array(
					'title' => $parallax_title_dec[$i],
					'imgurl' => $parallax_bg_img_url_dec[$i],
					'content' => $parallax_content_dec[$i]
				);
			}
			

			;?>
			<div class='parallax-container'>
				<div class='parallax-section'>
					<div class='parallax-layer'>
						<div class='parallax-title-wrap'>
							<p class='parallax-title'><?php echo $parallax_primary_title ;?></P>
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
	<input type="text" name="parallax_primary_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['parallax_primary_title'])){
			   echo $_POST['parallax_primary_title'];
		   }else{
			   echo $parallax_primary_title;
		   }
			   ;?>
		   >
		<?php 
			if( !empty($_POST['parallax_bg_img_url']) )
			{ 
				$parallax_bg_url = $_POST['parallax_bg_img_url']; 
			} else{ 
				$parallax_bg_url = $parallax_bgImg_url;
			}
	;?>
	<?php
	if (isset($pallx_item_Array) && is_array($pallx_item_Array)) {
		$index = 0;
		foreach ($pallx_item_Array as $key => $values ) {
			echo "<div id='parallaxform_$index' class='parallax-form'>";
			echo '<h4 class="h-admin-4-bg">パララックスの背景画像を選択してください。</h4>';
			$result_parallax_img = generate_upload_multipleimage_tag('parallax_bg_img_url', $values['imgurl'], $index);
			echo $result_parallax_img;
			echo "<h4>パララックス画像内のタイトルを入力してください。</h4>";
			echo "<input id='parallax_title_$index' type='text' name='parallax_title[]' class='img-setect-url' value='" . $values['title'] . "'>";
			echo "<h4>パララックス画像内のコンテンツを入力してください。</h4>";
			echo "<textarea id='parallax_content_$index' type='text' name='parallax_content[]' class='img-setect-url'>{$values['content']}</textarea></br>";
			echo "</div>";
			
			 $index++;
		}
	}
	?>
	</div>
	<button type="button" id="parallaxCloseBtn">閉じる</button>
<script>

</script>
</div>