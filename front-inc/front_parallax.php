<?php
// 連想配列を作成
$pallx_item_Array = array();

// $parallax_title_dec_result が配列であるかを確認
if (is_array($parallax_title)) {
	// 各変数が配列であるかを確認
	if (is_array($parallax_bg_img_url) && is_array($parallax_content)) {
		for ($i = 0; $i < count($parallax_title); $i++) {
			// 配列のインデックスが存在するかを確認
			if (isset($parallax_bg_img_url[$i]) && isset($parallax_content[$i])) {
				$pallx_item_Array[$parallax_title[$i]] = array(
					'title' => $parallax_title[$i],
					'imgurl' => $parallax_bg_img_url[$i],
					'content' => $parallax_content[$i]
				);
			} else {
				//url, content,　エラーハンドリング
			}
		}
	} else {
		//arrayに対するエラーハンドリング
	}
} else {
	//全体arrayに対するエラーハンドリング
}
;?>
<article class="n-section-block">
	<div class='parallax-container'>
		<div class='parallax-section'>
			<div class='parallax-layer'>
				<div class='parallax-title-wrap'>
					<p class='parallax-title'><?php echo $parallax_primary_title ;?></p>
				</div>
			</div>
		</div>
		<?php
		if(isset($pallx_item_Array) && is_array($pallx_item_Array)){
			foreach($pallx_item_Array as $key => $values){
				echo "<div class='parallax-section'>";
				echo "<div class=\"parallax-layer\" style=\"background-image: url('{$values['imgurl']}')\">";
				echo "<p class='parallax-content-title'>" . $values['title'] . "</p>";
				echo "<p class='parallax-content'>" . $values['content'] . "</p>";
				echo "</div>";
				echo "</div>";	
			}
		}
		;?>
	</div>
</article>