<?php
//変数初期設定
$defult_info_img = get_template_directory_uri() . '/admin-img/sump-1600-1600.jpg';
$bunner_home_link = home_url();

$an_banner_title = sanitize_option_value(get_option('banner-title', '告知タイトル'));
$an_banner_img = get_optimized_image_url(sanitize_option_value(get_option('banner-img', $defult_info_img)));
$an_banner_link = sanitize_option_value(get_option('banner-link', $bunner_home_link));
$an_banner_control = sanitize_option_value(get_option('banner-use-control', 'banner-use'));
?>
<div class="banner-all-wrap remove-banner">
	<div class="banner-content-wrap">
		<p class="banner-title"><?php echo $an_banner_title; ?></p>
		<a href="<?php echo $an_banner_link; ?>">
  			<img src="<?php echo $an_banner_img; ?>" alt="banner image" />
		</a>
		<button class="banner-close-button"></button>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    function bannerScroll() {
        var bannerEl = document.querySelector('.banner-all-wrap');
        if (bannerEl) {
            bannerEl.classList.remove('remove-banner');
        }
        window.removeEventListener('scroll', bannerScroll); // 実行後にイベントリスナーを削除
    }

    window.addEventListener('scroll', bannerScroll);
});



//deleteBtn 
document.addEventListener('DOMContentLoaded', function(){
	var bannerDlBtn = document.querySelector('.banner-close-button');
	if(bannerDlBtn){
		bannerDlBtn.addEventListener('click',function(){
			var parentEl = document.querySelector('.banner-all-wrap');
			parentEl.classList.add('remove-banner');
			parentEl.style.zIndex = "-1";
			parentEl.style.pointerEvents = "none";

		});
	}
});
</script>