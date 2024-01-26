<div id="cmaker_column_2_wrap" class="cmakerWrapcolumn_2">
	<div class="column_2_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT column_2_bg_img_url,  column_2_title, column_2_content, column_2_sec_bg_img_url,  column_2_sec_title, column_2_sec_content FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $column_2_bgImg_url = $row->column_2_bg_img_url;
				 $column_2_title = $row->column_2_title; 
				 $column_2_content = $row->column_2_content;
				 $column_2_sec_bgImg_url = $row->column_2_sec_bg_img_url;
				 $column_2_sec_title = $row->column_2_sec_title; 
				 $column_2_sec_content = $row->column_2_sec_content; 
			  };
			  ?>
			<div class="column_2-all-wrap">
				<div class="column_2_item_wrap">
				<div class="column_2-back-wrap"
					 style="background-image: url(<?php if( isset( $_POST['column_2_bg_img_url'])){ echo $_POST['column_2_bg_img_url']; }elseif( !isset($_POST['column_2_bg_img_url']) ){ echo $column_2_bgImg_url; };?> )">
				</div>
				<div class="column_2-text-wrap">
					<p class="column_2-main-title"><?php if( isset( $_POST['column_2_title'])){ echo $_POST['column_2_title']; }elseif( !isset($_POST['column_2_title'])){ echo $column_2_title; };?></p>
					<p class="column_2-main-content"><?php if( isset( $_POST['column_2_content'])){ echo nl2br($_POST['column_2_content']); }elseif( !isset($_POST['column_2_content'])){ echo nl2br($column_2_content); };?></p>
				</div>
				</div>
				<div class="column_2_item_wrap">
				<div class="column_2-back-wrap"
					 style="background-image: url(<?php if( isset( $_POST['column_2_sec_bg_img_url'])){ echo $_POST['column_2_sec_bg_img_url']; }elseif( !isset($_POST['column_2_sec_bg_img_url']) ){ echo $column_2_sec_bgImg_url; };?> )">
				</div>
				<div class="column_2-text-wrap">
					<p class="column_2-main-title"><?php if( isset( $_POST['column_2_sec_title'])){ echo $_POST['column_2_sec_title']; }elseif( !isset($_POST['column_2_sec_title'])){ echo $column_2_sec_title; };?></p>
					<p class="column_2-main-content"><?php if( isset( $_POST['column_2_sec_content'])){ echo nl2br($_POST['column_2_sec_content']); }elseif( !isset($_POST['column_2_sec_content'])){ echo nl2br($column_2_sec_content); };?></p>
				</div>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
		<?php 
			if( !empty($_POST['column_2_bg_img_url']) )
			{ 
				$column_2_bg_url = $_POST['column_2_bg_img_url']; 
			} else{ 
				$column_2_bg_url = $column_2_bgImg_url;
			}
	;?>
	<h4 class="h-admin-4-bg">画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_2_bg_img_url', $column_2_bg_url);
	?>
	<h4>タイトルを入力してください。</h4>
	<input type="text" name="column_2_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['column_2_title'])){
			   echo $_POST['column_2_title'];
		   }else{
			   echo $column_2_title;
		   }
			   ;?>
		   >
	<h4>文章を入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="column_2_content" class="adm-textarea"><?php
		if( isset($_POST['column_2_content'])){
			echo $_POST['column_2_content'];
		}else{
			echo $column_2_content;
		}
		;?>
		</textarea>
	</div>
	<div class="inputForm">
		<?php 
			if( !empty($_POST['column_2_sec_bg_img_url']) )
			{ 
				$column_2_sec_bg_url = $_POST['column_2_sec_bg_img_url']; 
			} else{ 
				$column_2_sec_bg_url = $column_2_sec_bgImg_url;
			}
	;?>
	<h4 class="h-admin-4-bg">画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_2_sec_bg_img_url', $column_2_sec_bg_url);
	?>
	<h4>タイトルを入力してください。</h4>
	<input type="text" name="column_2_sec_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['column_2_sec_title'])){
			   echo $_POST['column_2_sec_title'];
		   }else{
			   echo $column_2_sec_title;
		   }
			   ;?>
		   >
	<h4>文章を入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="column_2_sec_content" class="adm-textarea"><?php
		if( isset($_POST['column_2_sec_content'])){
			echo $_POST['column_2_sec_content'];
		}else{
			echo $column_2_sec_content;
		}
		;?>
		</textarea>
	</div>
	<button type="button" id="column_2CloseBtn">閉じる</button>
</div>