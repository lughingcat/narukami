<?php
$an_banner_title = sanitize_option_value($_POST['banner-title']);
$an_banner_img = sanitize_option_value($_POST['banner-img']);
$an_banner_link = sanitize_option_value($_POST['banner-link']);
$an_banner_control = sanitize_option_value($_POST['banner-use-control']);
?>
<div class="banner-all-wrap-prev remove-banner">
	<div class="banner-content-wrap">
		<p class="banner-title"><?php echo $an_banner_title; ?></p>
		<a href="<?php echo $an_banner_link; ?>">
  			<img src="<?php echo $an_banner_img; ?>" alt="banner image" />
		</a>
		<button class="banner-close-button-prev"></button>
	</div>
</div>
<script>
function bannerScroll() {
    var bannerEl = document.querySelector('.banner-all-wrap-prev');
    if (bannerEl) {
        bannerEl.classList.remove('remove-banner');
    }
    window.removeEventListener('scroll', bannerScroll); // 実行後にイベントリスナーを削除
}

window.addEventListener('scroll', bannerScroll);

//deleteBtn 
document.addEventListener('DOMContentLoaded', function(){
	var bannerDlBtn = document.querySelector('.banner-close-button-prev');
	if(bannerDlBtn){
		bannerDlBtn.addEventListener('click',function(){
			var parentEl = document.querySelector('.banner-all-wrap-prev');
			parentEl.classList.add('remove-banner');
			parentEl.style.zIndex = "-1";
			parentEl.style.pointerEvents = "none";

		});
	}
});
</script>