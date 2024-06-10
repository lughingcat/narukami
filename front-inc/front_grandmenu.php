<?php
// 連想配列を作成
$gm_item_Array = array();

// $grandmenu_title_dec_result が配列であるかを確認
if (is_array($grandmenu_title)) {
	// 各変数が配列であるかを確認
	if (is_array($grandmenu_img_url) && is_array($grandmenu_pagelink)) {
		for ($i = 0; $i < count($grandmenu_title); $i++) {
			// 配列のインデックスが存在するかを確認
			if (isset($grandmenu_img_url[$i]) && isset($grandmenu_pagelink[$i])) {
				$gm_item_Array[$grandmenu_title[$i]] = array(
					'title' => $grandmenu_title[$i],
					'imgurl' => $grandmenu_img_url[$i],
					'pagelink' => $grandmenu_pagelink[$i]
				);
			} else {
			//url, pagelink,　エラーハンドリング
			}
		}
	} else {
		//arrayに対するエラーハンドリング
	}
} else {
	//全体arrayに対するエラーハンドリング
}
?>
<article class="n-section-block">
	<div class="grandmenu-wrap" >
		<div class="gm-primary-title-prevew">
			<p class="gm-primary-title"><?php echo $gm_primary_title; ?></p>
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