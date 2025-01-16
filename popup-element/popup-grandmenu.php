<head>
<link rel="stylesheet" href="hopup-asset/css/hopup-style.css">
</head>
<div class="popup-element-all-wrap special-width">
    <div class="popup-discription">
<?php
$grandmenu_title = array(
	'Appetizer',
	'Fish Dishes',
	'Rice Food',
	'Sake Appetizer',
	'Course Meal'
);
$grandmenu_img_url = array(
	'../admin-img/sampimg-875_875.jpg',
	'../admin-img/sampimg-875_875.jpg',
	'../admin-img/sampimg-875_875.jpg',
	'../admin-img/sampimg-875_875.jpg',
	'../admin-img/sampimg-875_875.jpg'
);
// 連想配列を作成
$gm_item_Array = array();

// $grandmenu_title_dec_result が配列であるかを確認
if (is_array($grandmenu_title)) {
	// 各変数が配列であるかを確認
	if (is_array($grandmenu_img_url)){
		for ($g = 0; $g < count($grandmenu_title); $g++) {
			// 配列のインデックスが存在するかを確認
			if (isset($grandmenu_img_url[$g])) {
				$gm_item_Array[$grandmenu_title[$g]] = array(
					'title' => $grandmenu_title[$g],
					'imgurl' => $grandmenu_img_url[$g]
				);
			} else {
			//urlエラーハンドリング
			}
		}
	} else {
		//arrayに対するエラーハンドリング
	}
} else {
	//全体arrayに対するエラーハンドリング
}
;?>

<div class="grandmenu-wrap" >
	<div class="gm-primary-title-prevew">
		<p class="gm-primary-title">Grand Menu</p>
	</div>
		<ul class="grandmenu-title-wrap">
		<?php
		if (isset($gm_item_Array) && is_array($gm_item_Array)) {
			foreach ($gm_item_Array as $key => $values ) {
				echo "<a class='gm-item-wrap' style='background-image: url(\"" . $values['imgurl'] . "\");'>";
				echo "<li>";
				echo "<p>" . $values['title'] . "</p>";
				echo "</li>";
				echo "</a>";
			}											  
		}
		;?>	
		</ul>
</div>
    </div>
</div>
<script src="hopup-asset/js/hopup-element.js"></script>