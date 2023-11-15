<div id="cmaker_grandmenu_wrap" class="cmakerWrapgrandmenu">
	<div class="grandmenu_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT grandmenu_img_url,  grandmenu_title, grandmenu_pagelink FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query,OBJECT);
			  foreach($rows as $row) {
				 $grandmenu_img_url = $row->grandmenu_img_url;
				 $grandmenu_title = $row->grandmenu_title;
				 $grandmenu_pagelink = $row->grandmenu_pagelink;
			  };
			  ?>
			<div class="grandmenu-wrap" >
				<div class="grandmenu-title-wrap">
					<ul>
						<?php
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
						;?>
					
					</ul>
					</br>
				</div>
			</div>
		</article>
	</div>
	<div id="gm-form-erea" class="inputForm">
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
			echo "<h4>グランドメニューのジャンル名を入力してください。</h4>";
			echo "<input type='text' name='grandmenu_title[]' class='img-setect-url' value='" . $values['title'] . "'>";
			$error_message = 'グランドメニュータイトルが入力されていません';
			echo '<div class="gm-error-message" style="display: none;">' . $error_message . '</div>';
			echo "<h4>ジャンル一覧ページへのリンクを入力してください。</h4>";
			echo "<input type='text' name='grandmenu_pagelink[]' class='img-setect-url' value='" . $values['pagelink'] . "'>";
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