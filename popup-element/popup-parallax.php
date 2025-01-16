<head>
<link rel="stylesheet" href="hopup-asset/css/hopup-style.css">
</head>
<div class="popup-element-all-wrap special-width">
    <div class="popup-discription">
	<?php
	$parallax_title = array(
		'PARALLAX TITLE 1',
		'PARALLAX TITLE 2',
		'PARALLAX TITLE 3'
	);
	$parallax_bg_img_url = array(
		'../admin-img/samp-2400-1400.jpg',
		'../admin-img/samp-2400-1400.jpg',
		'../admin-img/samp-2400-1400.jpg'
	);
	$parallax_content = array(
		'Content for section 1.',
		'Content for section 2.',
		'Content for section 3.'
	);
	// 連想配列を作成
	$pallx_item_Array = array();
	
	// $parallax_title_dec_result が配列であるかを確認
	if (is_array($parallax_title)) {
		// 各変数が配列であるかを確認
		if (is_array($parallax_bg_img_url) && is_array($parallax_content)) {
			for ($p = 0; $p < count($parallax_title); $p++) {
				// 配列のインデックスが存在するかを確認
				if (isset($parallax_bg_img_url[$p]) && isset($parallax_content[$p])) {
					$pallx_item_Array[$parallax_title[$p]] = array(
						'title' => $parallax_title[$p],
						'imgurl' => $parallax_bg_img_url[$p],
						'content' => $parallax_content[$p]
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
	
	<div id="parallax-popup-wrap" class='parallax-container'>
		<div class='parallax-section'>
			<div class='parallax-layer'>
				<div class='parallax-title-wrap'>
					<p class='parallax-title'>Parallax Primary Title</P>
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
</div>
</div>
<script src="hopup-asset/js/hopup-element.js"></script>