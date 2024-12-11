<?php
//変数初期設定
$subfooter_title1 = "SAMPLE 1";
$subfooter_title2 = "SAMPLE 2";
$subfooter_title3 = "SAMPLE 3";

$subfooter_url1 = home_url();
$subfooter_url2 = home_url();
$subfooter_url3 = home_url();

$i_subfooter_title_array = sanitize_option_value(get_option('subfooter_item_title', array($subfooter_title1,$subfooter_title2,$subfooter_title3)));
$i_subfooter_url_array = sanitize_option_value(get_option('subfooter_item_link', array($subfooter_url1,$subfooter_url2,$subfooter_url3)));
$subfooter_bg_color = sanitize_option_value(get_option('subfooter-bg-color', '#ffffff'));
$subfooter_textcolor = sanitize_option_value(get_option('subfooter-textcolor', '#333333'));
// 連想配列を作成
$subfooter_items_Array = array();

// $i_subfooter_title_arrayが配列であるかを確認
if (is_array($i_subfooter_title_array)) {
	// 各変数が配列であるかを確認
	if (is_array($i_subfooter_url_array)) {
		for ($subfooter = 0; $subfooter < count($i_subfooter_title_array); $subfooter++) {
			// 配列のインデックスが存在するかを確認
			if (isset($i_subfooter_title_array[$subfooter])) {
				$subfooter_items_Array[$i_subfooter_title_array[$subfooter]] = array(
					'title' => $i_subfooter_title_array[$subfooter],
					'url' => $i_subfooter_url_array[$subfooter]
				);
			} else {
			//タイトル, URL,　エラーハンドリング
			}
		}
	} else {
		//arrayに対するエラーハンドリング
	}
} else {
	//全体arrayに対するエラーハンドリング
}
?>
<div class="subfooter-preview-all-wrap"
	 style="background-color: <?php echo $subfooter_bg_color; ?>;">
	<div class="subfooter-wrap">
		<ul class="subfooter-ul-wrap">
		<?php
		if (isset($subfooter_items_Array) && is_array($subfooter_items_Array)) {
			foreach ($subfooter_items_Array as $key => $values ) {
			echo "<li>
      			<a class='subfooter-item-title' 
         			style='color: " . $subfooter_textcolor . ";' 
         			href='" . $values['url'] . "'>
			" . $values['title'] . "
			</a>
     			</li>";
			}											  
		}
		?>
		</ul>
	</div>
</div><!--subfooter-preview-all-wrap end-->
<script>
//スクロール中ハンバーガーメニューを下に飛ばす
document.addEventListener('scroll', function() {
  const element = document.querySelector('.subfooter-preview-all-wrap');
  
  // 要素が下に飛んでいく距離を決める（例: 100px）
  const distance = 100;
	
  element.style.transform = `translateY(${distance}px)`;
  
  // 一定時間後に元の位置に戻す
  setTimeout(() => {
    element.style.transform = 'translateY(0)';
  }, 500); // 500ms後に戻す
});
</script>