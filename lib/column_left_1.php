<div id="cmaker_column_left_1_wrap" class="cmakerWrapcolumn_left_1">
	<div class="column_left_1_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT column_left_1_bg_img_url,  column_left_1_title, column_left_1_content FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $column_left_1_bgImg_url = $row->column_left_1_bg_img_url;
				 $column_left_1_title = $row->column_left_1_title; 
				 $column_left_1_content = $row->column_left_1_content; 
			  };
			  ?>
			<div class="column_left_1-all-wrap">
				<div class="column_left_1-back-wrap"
					 style="background-image: url(<?php if( isset( $_POST['column_left_1_bg_img_url'])){ echo $_POST['column_left_1_bg_img_url']; }elseif( !isset($_POST['column_left_1_bg_img_url']) ){ echo $column_left_1_bgImg_url; };?> )">
				</div>
				<div class="column_left_1-text-wrap">
					<p class="column_left_1-main-title"><?php if( isset( $_POST['column_left_1_title'])){ echo $_POST['column_left_1_title']; }elseif( !isset($_POST['column_left_1_title'])){ echo $column_left_1_title; };?></p>
					<p class="column_left_1-main-content"><?php if( isset( $_POST['column_left_1_content'])){ echo nl2br($_POST['column_left_1_content']); }elseif( !isset($_POST['column_left_1_content'])){ echo nl2br($column_left_1_content); };?></p>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
		<?php 
			if( !empty($_POST['column_left_1_bg_img_url']) )
			{ 
				$column_left_1_bg_url = $_POST['column_left_1_bg_img_url']; 
			} else{ 
				$column_left_1_bg_url = $column_left_1_bgImg_url;
			}
	;?>
	<h4 class="h-admin-4-bg">コンセプト表示の背景画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_left_1_bg_img_url', $column_left_1_bg_url);
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="column_left_1_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['column_left_1_title'])){
			   echo $_POST['column_left_1_title'];
		   }else{
			   echo $column_left_1_title;
		   }
			   ;?>
		   >
	<h4>コンセプト文章を入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます(1000文字以内)</p>
	<textarea name="column_left_1_content" class="adm-textarea"><?php
		if( isset($_POST['column_left_1_content'])){
			echo $_POST['column_left_1_content'];
		}else{
			echo $column_left_1_content;
		}
		;?>
		</textarea>
	</div>
	<button type="button" id="column_left_1CloseBtn">閉じる</button>
</div>