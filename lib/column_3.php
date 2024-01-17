<div id="cmaker_column_3_wrap" class="cmakerWrapcolumn_3">
	<div class="column_3_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT column_3_bg_img_url,  column_3_title, column_3_content, column_3_sec_bg_img_url,  column_3_sec_title, column_3_sec_content, column_3_third_bg_img_url,  column_3_third_title, column_3_third_content FROM wp_narukami_content_maker;";
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
			  };
			  ?>
			<div class="column_3-all-wrap">
				<div class="column_3_item_wrap">
				<div class="column_3-back-wrap"
					 style="background-image: url(<?php if( isset( $_POST['column_3_bg_img_url'])){ echo $_POST['column_3_bg_img_url']; }elseif( !isset($_POST['column_3_bg_img_url']) ){ echo $column_3_bgImg_url; };?> )">
				</div>
				<div class="column_3-text-wrap">
					<p class="column_3-main-title"><?php if( isset( $_POST['column_3_title'])){ echo $_POST['column_3_title']; }elseif( !isset($_POST['column_3_title'])){ echo $column_3_title; };?></p>
					<p class="column_3-main-content"><?php if( isset( $_POST['column_3_content'])){ echo nl2br($_POST['column_3_content']); }elseif( !isset($_POST['column_3_content'])){ echo nl2br($column_3_content); };?></p>
				</div>
				</div>
				<div class="column_3_item_wrap">
				<div class="column_3-back-wrap"
					 style="background-image: url(<?php if( isset( $_POST['column_3_sec_bg_img_url'])){ echo $_POST['column_3_sec_bg_img_url']; }elseif( !isset($_POST['column_3_sec_bg_img_url']) ){ echo $column_3_sec_bgImg_url; };?> )">
				</div>
				<div class="column_3-text-wrap">
					<p class="column_3-main-title"><?php if( isset( $_POST['column_3_sec_title'])){ echo $_POST['column_3_sec_title']; }elseif( !isset($_POST['column_3_sec_title'])){ echo $column_3_sec_title; };?></p>
					<p class="column_3-main-content"><?php if( isset( $_POST['column_3_sec_content'])){ echo nl2br($_POST['column_3_sec_content']); }elseif( !isset($_POST['column_3_sec_content'])){ echo nl2br($column_3_sec_content); };?></p>
				</div>
				</div>
				<div class="column_3_item_wrap">
				<div class="column_3-back-wrap"
					 style="background-image: url(<?php if( isset( $_POST['column_3_third_bg_img_url'])){ echo $_POST['column_3_third_bg_img_url']; }elseif( !isset($_POST['column_3_third_bg_img_url']) ){ echo $column_3_third_bgImg_url; };?> )">
				</div>
				<div class="column_3-text-wrap">
					<p class="column_3-main-title"><?php if( isset( $_POST['column_3_third_title'])){ echo $_POST['column_3_third_title']; }elseif( !isset($_POST['column_3_third_title'])){ echo $column_3_third_title; };?></p>
					<p class="column_3-main-content"><?php if( isset( $_POST['column_3_third_content'])){ echo nl2br($_POST['column_3_third_content']); }elseif( !isset($_POST['column_3_third_content'])){ echo nl2br($column_3_third_content); };?></p>
				</div>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
		<?php 
			if( !empty($_POST['column_3_bg_img_url']) )
			{ 
				$column_3_bg_url = $_POST['column_3_bg_img_url']; 
			} else{ 
				$column_3_bg_url = $column_3_bgImg_url;
			}
	;?>
	<h4 class="h-admin-4-bg">コンセプト表示の背景画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_3_bg_img_url', $column_3_bg_url);
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="column_3_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['column_3_title'])){
			   echo $_POST['column_3_title'];
		   }else{
			   echo $column_3_title;
		   }
			   ;?>
		   >
	<h4>コンセプト文章を入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます(1000文字以内)</p>
	<textarea name="column_3_content" class="adm-textarea"><?php
		if( isset($_POST['column_3_content'])){
			echo $_POST['column_3_content'];
		}else{
			echo $column_3_content;
		}
		;?>
		</textarea>
	</div>
	<div class="inputForm">
		<?php 
			if( !empty($_POST['column_3_sec_bg_img_url']) )
			{ 
				$column_3_sec_bg_url = $_POST['column_3_sec_bg_img_url']; 
			} else{ 
				$column_3_sec_bg_url = $column_3_sec_bgImg_url;
			}
	;?>
	<h4 class="h-admin-4-bg">コンセプト表示の背景画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_3_sec_bg_img_url', $column_3_sec_bg_url);
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="column_3_sec_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['column_3_sec_title'])){
			   echo $_POST['column_3_sec_title'];
		   }else{
			   echo $column_3_sec_title;
		   }
			   ;?>
		   >
	<h4>コンセプト文章を入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます(1000文字以内)</p>
	<textarea name="column_3_sec_content" class="adm-textarea"><?php
		if( isset($_POST['column_3_sec_content'])){
			echo $_POST['column_3_sec_content'];
		}else{
			echo $column_3_sec_content;
		}
		;?>
		</textarea>
	</div>
	<div class="inputForm">
		<?php 
			if( !empty($_POST['column_3_third_bg_img_url']) )
			{ 
				$column_3_third_bg_url = $_POST['column_3_third_bg_img_url']; 
			} else{ 
				$column_3_third_bg_url = $column_3_third_bgImg_url;
			}
	;?>
	<h4 class="h-admin-4-bg">コンセプト表示の背景画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('column_3_third_bg_img_url', $column_3_third_bg_url);
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="column_3_third_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['column_3_third_title'])){
			   echo $_POST['column_3_third_title'];
		   }else{
			   echo $column_3_third_title;
		   }
			   ;?>
		   >
	<h4>コンセプト文章を入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます(1000文字以内)</p>
	<textarea name="column_3_third_content" class="adm-textarea"><?php
		if( isset($_POST['column_3_third_content'])){
			echo $_POST['column_3_third_content'];
		}else{
			echo $column_3_third_content;
		}
		;?>
		</textarea>
	</div>
	<button type="button" id="column_3CloseBtn">閉じる</button>
</div>