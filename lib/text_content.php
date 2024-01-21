<div id="cmaker_text_content_wrap" class="cmakerWraptext_content">
	<div class="text_content_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT text_content_bg_color,  text_content_title, text_content_content FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $text_content_bgImg_url = $row->text_content_bg_img_url;
				 $text_content_title = $row->text_content_title; 
				 $text_content_content = $row->text_content_content; 
			  };
			  ?>
			<div class="text_content-back-wrap"
				 style="background-image: url(<?php if( isset( $_POST['text_content_bg_img_url'])){ echo $_POST['text_content_bg_img_url']; }elseif( !isset($_POST['text_content_bg_img_url']) ){ echo $text_content_bgImg_url; };?> )">
				<div class="text_content-text-wrap">
				<p class="text_content-main-title test-text_content-title"><?php if( isset( $_POST['text_content_title'])){ echo $_POST['text_content_title']; }elseif( !isset($_POST['text_content_title'])){ echo $text_content_title; };?></p>
				<p class="text_content-main-content"><?php if( isset( $_POST['text_content_content'])){ echo nl2br($_POST['text_content_content']); }elseif( !isset($_POST['text_content_content'])){ echo nl2br($text_content_content); };?></p>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
	<h4 class="h-admin-4-bg">テキストエリア背景色を選択してください</h4>
	<?php
  	genelate_color_picker_tag_demo('text_content_bg_color', $text_content_bg_color, 'テキストエリア背景色');
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="text_content_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['text_content_title'])){
			   echo $_POST['text_content_title'];
		   }else{
			   echo $text_content_title;
		   }
			   ;?>
		   >
	<h4>コンセプト文章を入力してください。</h4>
		<p>※改行せずに入力すると美しく見えます。</p>
	<textarea name="text_content_content" class="adm-textarea"><?php
		if( isset($_POST['text_content_content'])){
			echo $_POST['text_content_content'];
		}else{
			echo $text_content_content;
		}
		;?>
		</textarea>
	</div>
	<button type="button" id="text_contentCloseBtn">閉じる</button>
</div>