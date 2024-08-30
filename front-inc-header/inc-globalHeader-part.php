<?php
$i_global_title_array = sanitize_option_value($_POST['global_item_title']);
$i_global_url_array = sanitize_option_value($_POST['global_item_link']);
$i_gloalmenu_bgcolor = sanitize_option_value($_POST['globalmenu-bg-color']);
$i_gloalmenu_textcolor = sanitize_option_value($_POST['globalmenu-text-color']);
$i_humberger_btn_bg = sanitize_option_value($_POST['humberger-btn-bg']);
$i_humberger_arrowcolor = sanitize_option_value($_POST['humberger-arrowcolor']);
$i_global_textunderlinecolor = sanitize_option_value($_POST['global-textunderlinecolor']);
$i_global_text_menucolor = sanitize_option_value($_POST['global-text-menucolor']);
// 連想配列を作成
$global_items_Array = array();
			
// $i_global_title_arrayが配列であるかを確認
if (is_array($i_global_title_array)) {
	// 各変数が配列であるかを確認
	if (is_array($i_global_url_array)) {
		for ($global = 0; $global < count($i_global_title_array); $global++) {
			// 配列のインデックスが存在するかを確認
			if (isset($i_global_title_array[$global])) {
				$global_items_Array[$i_global_title_array[$global]] = array(
					'title' => $i_global_title_array[$global],
					'url' => $i_global_url_array[$global]
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
<div class="globalmenu-content-all-wrap">
	<div class="humberger-button-wrap" style="background-color: <?php echo $i_humberger_btn_bg; ?>">
		<div class="span-wrap">
			<span style="background-color: <?php echo $i_humberger_arrowcolor; ?>"></span>
			<span style="background-color: <?php echo $i_humberger_arrowcolor; ?>"></span>
			<span style="background-color: <?php echo $i_humberger_arrowcolor; ?>"></span>
			<p class="span-text" style="color: <?php echo $i_global_text_menucolor; ?>">MENU</p>
		</div>
	</div>
	<div class="globalmenu-back-wrap"
		 style="background-color: <?php echo $i_gloalmenu_bgcolor; ?>;">
		<div class="globalmenu-flex-setting">
			<ul class="globalmenu-title-wrap">
				<?php
				if (isset($global_items_Array) && is_array($global_items_Array)) {
					foreach ($global_items_Array as $key => $values ) {
					echo "<li style='border-bottom: 1px solid " . $i_global_textunderlinecolor . ";'>
        			<a class='globalmenu-item-title' 
           			style='color: " . $i_gloalmenu_textcolor . ";' 
           			href='" . $values['url'] . "'>
					" . $values['title'] . "
					</a>
      				</li>";
					}											  
				}
					?>
			</ul>
		</div>
	</div><!--globalmenu-back-wrap-end-->
</div><!--globalmenu-content-all-wrap-end-->