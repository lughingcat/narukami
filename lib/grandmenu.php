<div id="cmaker_grandmenu_wrap" class="cmakerWrapgrandmenu">
	<div class="grandmenu_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT grandmenu_img_url,  grandmenu_title FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query,OBJECT);
			  var_dump($query);
			  foreach($rows as $row) {
				 $grandmenu_img_url = $row->grandmenu_img_url;
				 $grandmenu_title = $row->grandmenu_title;
			  };
			  ?>
			<div class="grandmenu-wrap" >
				<div class="grandmenu-title-wrap">
					<ul>
						<?php
						var_dump($grandmenu_title);
						foreach( $grandmenu_title_dec as $grandmenu_title_decs){
							echo "<li>". $grandmenu_title_decs . "</li>";
						}
						;?>
					
					</ul>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
		<?php 
			if( !empty($_POST['grandmenu_img_url']) )
			{ 
				$grandmenu_img_bg_url = $_POST['grandmenu_img_url']; 
			} else{ 
				$grandmenu_img_bg_url = $grandmenu_img_url;
			}
	;?>
	<h4 class="h-admin-4-bg">コンセプト表示の背景画像を選択してください。</h4>
	<?php
  	generate_upload_image_tag('grandmenu_img_url', $grandmenu_img_bg_url);
	?>
	<h4>コンセプトタイトルを入力してください。</h4>
	<input type="text" name="grandmenu_title[]" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['grandmenu_title'])){
			   echo $_POST['grandmenu_title'];
		   }else{
			   echo $grandmenu_title;
		   }
			   ;?>
		   >
		<input type="text" name="grandmenu_title[]" class="img-setect-url">
		<input type="text" name="grandmenu_title[]" class="img-setect-url">
		<input type="text" name="grandmenu_title[]" class="img-setect-url">
		<?php 
		$grandmenu_title_json = $_POST['grandmenu_title'];
		echo json_encode($grandmenu_title_json, JSON_UNESCAPED_UNICODE);
		;?>
	</div>
	<button type="button" id="grandmenuCloseBtn">閉じる</button>
</div>