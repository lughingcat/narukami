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



//deleteBtn24時間で再表示させる処理込み
document.addEventListener('DOMContentLoaded', function(){
    var bannerDlBtn = document.querySelector('.banner-close-button');
    var parentEl = document.querySelector('.banner-all-wrap');

    if (!parentEl) return;

    // 24時間後の期限（ミリ秒換算: 24時間 × 60分 × 60秒 × 1000ミリ秒）
    var expireTime = 24 * 60 * 60 * 1000;
    var savedTime = localStorage.getItem("bannerDismissedTime");
    var currentTime = new Date().getTime();

    // 24時間以内ならバナーを非表示
    if (savedTime && currentTime - parseInt(savedTime) < expireTime) {
        parentEl.classList.add('remove-banner');
        parentEl.style.opacity = "0";
        parentEl.style.pointerEvents = "none";
    }

    if (bannerDlBtn) {
        bannerDlBtn.addEventListener('click', function(){
            localStorage.setItem("bannerDismissedTime", new Date().getTime()); // 現在の時間を保存
            parentEl.classList.add('remove-banner');
            parentEl.style.opacity = "0";
            parentEl.style.pointerEvents = "none";
        });
    }
});

</script>