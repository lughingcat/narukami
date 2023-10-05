<div id="cmaker_concept_wrap" class="cmakerWrapConcept" style="display: none;">
	<div class="concept_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT concept_bg_img_url,  concept_title, concept_content FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $concept_bgImg_url = $row->concept_bg_img_url;
				 $concept_title = $row->concept_title; 
				 $concept_content = $row->concept_content; 
			  };
			  ?>
			<div>
			</div>
		</article>
	</div>
	<div class="inputForm">
		<?php 
			if( !empty($_POST['concept_bg_img_url']) )
			{ 
				$concept_bg_url = $_POST['concept_bg_img_url']; 
			} else{ 
				$concept_bg_url = $concept_bgImg_url;
			}
	;?>
	<h4>コンセプト表示の背景画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('concept_bg_img_url', $concept_bg_url);
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="concept_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['concept_title'])){
			   echo $_POST['concept_title'];
		   }else{
			   echo $concept_title;
		   }
			   ;?>
		   >
	<h4>コンセプト文章を入力してください。</h4>
	<textarea name="concept_content" class="adm-textarea"><?php
		if( isset($_POST['concept_content'])){
			echo $_POST['concept_content'];
		}else{
			echo $concept_content;
		}
		;?></textarea>
	</div>
	<button type="button" id="conceptCloseBtn">閉じる</button>
</div>