<?php
$i_global_title_array = sanitize_option_value(get_option('global_title_array'));
$i_global_url_array = sanitize_option_value(get_option('global_url_array'));
$i_gloalmenu_bgcolor = sanitize_option_value(get_option('gloalmenu_bgcolor'));
$i_gloalmenu_textcolor = sanitize_option_value(get_option('gloalmenu_textcolor'));
$i_humberger_btn_bg = sanitize_option_value(get_option('humberger_btn_bg'));
$i_humberger_arrowcolor = sanitize_option_value(get_option('humberger-arrowcolor'));
$i_global_textunderlinecolor = sanitize_option_value(get_option('global-textunderlinecolor'));
$i_global_text_menucolor = sanitize_option_value(get_option('global-text-menucolor'));
$animetion_type = sanitize_option_value(get_option('loading-anime-type'));
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
<script>
//グローバルメニュー動作制御
document.addEventListener('DOMContentLoaded', function() {
  var globalmenuToggle = document.querySelector('.span-wrap');
  if(globalmenuToggle){
  		globalmenuToggle.addEventListener('click', function() {
    		globalmenuToggle.classList.toggle('global-open');
			document.querySelector('.humberger-button-wrap').classList.toggle('wrap-change');
			document.querySelector('.globalmenu-back-wrap').classList.toggle('slide-change');
			document.querySelector('.span-text').classList.toggle('opacity-change');
			var scrollSwitchItem = document.querySelector('.slide-change')
			if(scrollSwitchItem){
				document.body.style.overflow = 'hidden';
			}else{
				document.body.style.overflow = '';
			}
  		});
  }
});
//スクロール中ハンバーガーメニューを左に飛ばす
document.addEventListener('scroll', function() {
  const element = document.querySelector('.humberger-button-wrap');
  
  // 要素が左に飛んでいく距離を決める（例: 100px）
  const distance = 100;

  // スクロール量に応じて要素を左に移動させる
  element.style.transform = `translateX(-${distance}px)`;
  
  // 一定時間後に元の位置に戻す
  setTimeout(() => {
    element.style.transform = 'translateX(0)';
  }, 500); // 500ms後に戻す
});
//出現アニメーション
document.addEventListener('DOMContentLoaded', function(){
	var gmAnimationStyle = '<?php echo $animetion_type; ?>';
	if(gmAnimationStyle === 'loading-anime-not-use'){
		
	}else{
		gmBgPreviewOpacty();
	}
});
//bg透明度コントロール
function gmBgPreviewOpacty(){
	var gmBgContainer = document.querySelector('.globalmenu-content-all-wrap');
	gmBgContainer.classList.add('bg-opacity-value');
}
</script>