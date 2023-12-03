<div id="cmaker_grandmenu_wrap" class="cmakerWrapgrandmenu">
	<div class="grandmenu_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT gm_primary_title, grandmenu_img_url,  grandmenu_title, grandmenu_pagelink FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query,OBJECT);
			  foreach($rows as $row) {
				 $grandmenu_img_url = $row->grandmenu_img_url;
				 $grandmenu_title = $row->grandmenu_title;
				 $grandmenu_pagelink = $row->grandmenu_pagelink;
				 $gm_primary_title = $row->gm_primary_title;
			  };
			  ?>
			<?php
			if(isset($_POST['gm_primary_title'])){
			$grandmenu_primary_title = $_POST['gm_primary_title'];
			}else{
			$grandmenu_primary_title = $gm_primary_title;
			}
			if(isset($_POST['grandmenu_img_url'])){
			$grandmenu_title_dec = $_POST['grandmenu_title'];
			$grandmenu_img_url_dec = $_POST['grandmenu_img_url'];
			$grandmenu_pagelink_dec = $_POST['grandmenu_pagelink'];
			}else{
			$grandmenu_title_dec = json_decode($grandmenu_title);
			$grandmenu_img_url_dec = json_decode($grandmenu_img_url);
			$grandmenu_pagelink_dec = json_decode($grandmenu_pagelink);
			}
			// 連想配列を作成
			$gm_item_Array = array();
			
			for ($i = 0; $i < count($grandmenu_title_dec); $i++) {
				$gm_item_Array[$grandmenu_title_dec[$i]] = array(
					'title' => $grandmenu_title_dec[$i],
					'imgurl' => $grandmenu_img_url_dec[$i],
					'pagelink' => $grandmenu_pagelink_dec[$i]
				);
			}
			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['grandmenu_title'])) {
				$grandmenu_title_dec[] = ""; // 空文字を追加
			}

			;?>
			
			<div class="grandmenu-wrap" >
				<div class="gm-primary-title-prevew">
						<p class="gm-primary-title"><?php echo $grandmenu_primary_title;?></p>
				</div>
					<ul class="grandmenu-title-wrap">
					<?php
					if (isset($gm_item_Array) && is_array($gm_item_Array)) {
						foreach ($gm_item_Array as $key => $values ) {
							echo "<a class='gm-item-wrap' href='". $values['pagelink']."' style='background-image: url(\"" . $values['imgurl'] . "\");'>";
							echo "<li>";
							echo "<p>" . $values['title'] . "</p>";
							echo "</li>";
							echo "</a>";
						}											  
					}
					;?>	
					
					</ul>
			</div>
		</article>
	</div>
	<div id="gm-form-erea" class="inputForm">
		<div class="rank-p-title-wrap">
			<h4 class="rank-prev">グランドメニュータイトル</h4>
			<p>ランキングタイトルを入力してください</p>
			<input type="text" class="img-setect-url" name="gm_primary_title" value="<?php echo $grandmenu_primary_title ;?>">
		</div>
		<?php 
			if( !empty($_POST['grandmenu_img_url']) )
			{ 
				$grandmenu_img_bg_url = $_POST['grandmenu_img_url']; 
			} else{ 
				$grandmenu_img_bg_url = $grandmenu_img_url_dec;
			}
	;?>
	<?php
	if (isset($gm_item_Array) && is_array($gm_item_Array)) {
		$index = 0;
		foreach ($gm_item_Array as $key => $values ) {
			echo "<div id='gm-form_$index' class='gm-form-style'>";
			echo '<h4 class="h-admin-4-bg">グランドメニュージャンルの背景画像を選択してください。</h4>';
			$result_gm = generate_upload_multipleimage_tag('grandmenu_img_url', $values['imgurl'], $index);
			echo $result_gm;
			$error_message_img = 'グランドメニューの背景画像が選択されていません。';
			echo '<div id="gm_img_error_' . $index . '" class="gm-error-message-img" style="display: none;">' . $error_message_img . '</div>';
			echo "<h4>グランドメニューのジャンル名を入力してください。</h4>";
			echo "<input id='gm_title_$index' type='text' name='grandmenu_title[]' class='img-setect-url' value='" . $values['title'] . "'>";
			$error_message_title = 'グランドメニュータイトルが入力されていません。';
			echo '<div id="gm_title_error_' . $index . '" class="gm-error-message-title" style="display: none;">' . $error_message_title . '</div>';
			echo "<h4>ジャンル一覧ページへのリンクを入力してください。</h4>";
			echo "<input id='gm_link_$index' type='text' name='grandmenu_pagelink[]' class='img-setect-url' value='" . $values['pagelink'] . "'>";
			$error_message_link = 'グランドメニューのページリンクが選択されていません。';
			echo '<div id="gm_link_error_' . $index . '" class="gm-error-message-link" style="display: none;">' . $error_message_link . '</div>';
			echo '<button type="button" onclick="deleteParentEl(this)">削除</button>';
			echo "</div>";
			
			 $index++;
		}
	}
	?>
	</div>

	<button type="button" id="gm-elment-add">追加</button>
	<button type="button" id="grandmenuCloseBtn">保存(閉じる)</button>


</div>