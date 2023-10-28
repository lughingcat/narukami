<div id="cmaker_grandmenu_wrap" class="cmakerWrapgrandmenu">
	<div class="grandmenu_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT grandmenu_img_url,  grandmenu_title FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query,OBJECT);
			  foreach($rows as $row) {
				 $grandmenu_img_url = $row->grandmenu_img_url;
				 $grandmenu_title = $row->grandmenu_title;
			  };
			  ?>
			<div class="grandmenu-wrap" >
				<div class="grandmenu-title-wrap">
					<ul>
						<?php
						$grandmenu_title_dec = json_decode($grandmenu_title);
						$grandmenu_img_url_dec = json_decode($grandmenu_img_url);
						//空配列を作成
						$resultArray = array();

						// 配列の要素数が一致していることを確認
						if (count($grandmenu_img_url_dec) == count($grandmenu_title_dec)) {
							// 連想配列を構築
							foreach ($grandmenu_img_url_dec as $index => $url) {
								$resultArray[$url] = $grandmenu_title_dec[$index];
							}
						} else {
							// 配列の要素数が一致しない場合のエラー処理
							echo "配列の要素数が一致しません。";
						}
						;?>
					
					</ul>
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
	if (isset($resultArray) && is_array($resultArray)) {
		foreach ($resultArray as $url => $title ) {
			echo '<div id="gm-form">';
			echo '<h4 class="h-admin-4-bg">グランドメニュージャンルの背景画像を選択してください。</h4>';
			$result_gm = generate_upload_image_tag('grandmenu_img_url[]', $url);
			echo $result_gm;
			echo "<h4>グランドメニューのジャンル名を入力してください。</h4>";
			echo "<input type='text' name='grandmenu_title[]' class='img-setect-url' value='" . $title . "'>";
			echo "</div>";
		}
	}
	?>
	</div>
	<button type="button" id="gm-elment-add">追加</button>
	<button type="button" id="grandmenuCloseBtn">閉じる</button>
</div>