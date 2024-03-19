<div id="cmaker_text_content_wrap" class="cmakerWraptext_content">
	<div class="text_content_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT text_content_bg_color, text_content_title_color, text_content_title, text_content_content FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $text_content_bg_color = $row->text_content_bg_color;
				 $text_content_title = $row->text_content_title; 
				 $text_content_content = $row->text_content_content; 
				 $text_content_title_color= $row->text_content_title_color; 
			  };
			  ?>
			<div class="text_content-back-wrap"
				 style="background-color:<?php if( isset( $_POST['text_content_bg_color'])){ echo $_POST['text_content_bg_color']; }elseif( !isset($_POST['text_content_bg_color']) ){ echo $text_content_bg_color; };?>">
				<div class="text_content-text-wrap">
				<p class="text_content-main-title"
				   style="color: <?php if(isset($_POST['text_content_title_color'])){ echo $_POST['text_content_title_color'];}elseif( !isset($_POST['text_content_title_color'])){ echo $text_content_title_color;};?>"><?php if( isset( $_POST['text_content_title'])){ echo $_POST['text_content_title']; }elseif( !isset($_POST['text_content_title'])){ echo $text_content_title; };?></p>
				<p class="text_content-main-content"
				   style="color: <?php if(isset($_POST['text_content_title_color'])){ echo $_POST['text_content_title_color'];}elseif( !isset($_POST['text_content_title_color'])){ echo $text_content_title_color;};?>"><?php if( isset( $_POST['text_content_content'])){ echo nl2br($_POST['text_content_content']); }elseif( !isset($_POST['text_content_content'])){ echo nl2br($text_content_content); };?></p>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
	<h4 class="h-admin-4-bg">テキストエリア背景色を選択してください</h4>
	<?php 
			if( !empty($_POST['text_content_bg_color']) )
			{ 
				$text_content_bg_color_new = $_POST['text_content_bg_color']; 
			} else{ 
				$text_content_bg_color_new = $text_content_bg_color;
			}
	;?>
	<?php
  	genelate_color_picker_tag_demo('text_content_bg_color', $text_content_bg_color_new, 'テキストエリア背景色');
	?>
	<h4>テキストエリアのタイトルを入力してください。</h4>
	<input type="text" name="text_content_title" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['text_content_title'])){
			   echo $_POST['text_content_title'];
		   }else{
			   echo $text_content_title;
		   }
			   ;?>
		   >
	<h4>テキストエリアのコンテンツを入力してください</h4>
	<textarea name="text_content_content" class="adm-textarea"><?php
		if( isset($_POST['text_content_content'])){
			echo $_POST['text_content_content'];
		}else{
			echo $text_content_content;
		}
		;?>
		</textarea>
	<?php 
			if( !empty($_POST['text_content_title_color']) )
			{ 
				$text_content_title_color_new = $_POST['text_content_title_color']; 
			} else{ 
				$text_content_title_color_new = $text_content_title_color;
			}
	;?>
	<?php
  	genelate_color_picker_tag_demo('text_content_title_color', $text_content_title_color_new, 'タイトルとコンテンツの文字色を選択してください。');
	?>
	</div>
	<button type="button" id="text_contentCloseBtn" onClick="closeFile(this)">閉じる</button>
</div>