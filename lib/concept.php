<div id="cmaker_concept_wrap" class="cmakerWrapConcept">
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
			<div class="concept-back-wrap"
				 style="background-image: url(<?php if( isset( $_POST['concept_bg_img_url'])){ echo $_POST['concept_bg_img_url']; }elseif( !isset($_POST['concept_bg_img_url']) ){ echo $concept_bgImg_url; };?> )">
				<div class="concept-text-wrap">
				<p class="concept-main-title"><?php if( isset( $_POST['concept_title'])){ echo $_POST['concept_title']; }elseif( !isset($_POST['concept_title'])){ echo $concept_title; };?></p>
				<p class="concept-main-content"><?php if( isset( $_POST['concept_content'])){ echo nl2br($_POST['concept_content']); }elseif( !isset($_POST['concept_content'])){ echo nl2br($concept_content); };?></p>
				</div>
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
	<h4 class="h-admin-4-bg">コンセプト表示の背景画像を選択してください。</h4>
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
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="concept_content" class="adm-textarea"><?php
		if( isset($_POST['concept_content'])){
			echo $_POST['concept_content'];
		}else{
			echo $concept_content;
		}
		;?>
		</textarea>
	</div>
	<script>
		function conceputfunctiontest() {
    console.log('読み込みテスト');
		}
	</script>
	<button type="button" id="conceptCloseBtn" onClick="closeFile(this)">閉じる</button>
</div>