<?php
$i_site_rogo_img_url = sanitize_option_value($_POST['site-rogo-img-url']);
$i_site_title_value = sanitize_option_value($_POST['header_site_title']);
$i_site_discription_value = sanitize_option_value($_POST['header_site_discription']);
$i_header_display_setting = sanitize_option_value($_POST['header-display-setting']);
$i_header_rogo_setting = sanitize_option_value($_POST['header-display-rogo']);
$i_header_stitle_setting = sanitize_option_value($_POST['header-display-sitetitle']);
$i_header_sdisc_setting = sanitize_option_value($_POST['header-display-sitedisc']);
$i_header_bgcolor = sanitize_option_value($_POST['header-bg-color']);
$i_header_textcolor_setting = sanitize_option_value($_POST['header-text-color']);
$i_header_height_value = sanitize_text_field($_POST['header-height']);
$i_header_rogo_width_value = sanitize_text_field($_POST['header-rogo-width']);
$animetion_type = sanitize_option_value($_POST['ladinganime-type']);
?>
<?php
//ヘッダー表示切り替え
if($i_header_display_setting === 'display_on'){
	$disp_switch = "";
}else{
	$disp_switch = "none";
}
//ヘッダーロゴ表示切り替え
if($i_header_rogo_setting === 'display_on'){
	$disp_img_switch = "";
}else{
	$disp_img_switch = "none";
}
//サイトタイトル表示切り替え
if($i_header_stitle_setting === 'display_on'){
	$disp_title_switch = "";
}else{
	$disp_title_switch = "none";
}
//サイトディスクリプション切り替え
if($i_header_sdisc_setting === 'display_on'){
	$disp_disc_switch = "";
}else{
	$disp_disc_switch = "none";
}
//背景色選択
if($i_header_bgcolor === ''){
	$i_header_bgcolor = "transparent";
}
?>

<div class="header-back-wrap"
	 style="background-color: transparent; display: <?php echo $disp_switch; ?>; height: <?php echo $i_header_height_value?>px;">
	<div class="header-flex-setting">
		<div class="header-rogo-wrap" style="display: <?php echo $disp_img_switch; ?>;">
    		<a href="<?php echo home_url(); ?>">
        		<img 
					 style="width: <?php echo $i_header_rogo_width_value?>px; height: <?php echo $i_header_rogo_width_value; ?>px"
					 src="<?php echo $i_site_rogo_img_url; ?>" 
					 alt="Site Logo">
    		</a>
		</div>
		<div class="header-title-wrap">
			<p class="header-site-title" 
			   style="color: <?php echo $i_header_textcolor_setting; ?>; display: <?php echo $disp_title_switch; ?>;"><?php echo $i_site_title_value; ?></p>
			<p class="header-site-discription" 
			   style="color: <?php echo $i_header_textcolor_setting; ?>; display: <?php echo $disp_disc_switch; ?>;"><?php echo $i_site_discription_value;?></p>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
	var headerAnimationStyle = '<?php echo $animetion_type; ?>';
	if(headerAnimationStyle === 'loading-anime-not-use'){
		
	}else{
		headerBgPreviewOpacty();
	}
});
//bg透明度コントロール
function headerBgPreviewOpacty(){
	var headerBgContainer = document.querySelector('.header-back-wrap');
	headerBgContainer.classList.add('bg-opacity-value');
}
	

// スクロールイベントを監視
let lastScrollTop = 0;
let hasScrolledOnce = false;

// サイズ変更関数rogoのみ
function changeHeaderSizeOnlyRogo() {
    const header = document.querySelector('.header-back-wrap');
    const logo = document.querySelector('.header-rogo-wrap img');

    header.style.transform = 'translateY(0)';
    header.style.height = '80px';
    logo.style.height = '50px';
    logo.style.width = '50px';
}
//ロゴとタイトル
function changeHeaderSizeRogoTitle() {
    const header = document.querySelector('.header-back-wrap');
    const logo = document.querySelector('.header-rogo-wrap img');
    const titleWrap = document.querySelector('.header-title-wrap');
	const title = document.querySelector('.header-site-title');

    header.style.transform = 'translateY(0)';
    header.style.height = '100px';
    logo.style.height = '40px';
    logo.style.width = '40px';
	titleWrap.style.marginTop = '-10px';
	title.style.fontSize = '.6em';
	
}
//ロゴとタイトルとサブタイトル
function changeHeaderSizeRogoTitleSubtitle() {
    const header = document.querySelector('.header-back-wrap');
    const logo = document.querySelector('.header-rogo-wrap img');
    const titleWrap = document.querySelector('.header-title-wrap');
	const title = document.querySelector('.header-site-title');
	const subtitle = document.querySelector('.header-site-discription');

    header.style.transform = 'translateY(0)';
    header.style.height = '120px';
    logo.style.height = '50px';
    logo.style.width = '50px';
	titleWrap.style.marginTop = '-10px';
	title.style.fontSize = '.5em';
	subtitle.style.fontSize = '.4em';
	
}
//タイトルとサブタイトル
function changeHeaderSizeTitleSubtitle() {
    const header = document.querySelector('.header-back-wrap');
	const title = document.querySelector('.header-site-title');
	const subtitle = document.querySelector('.header-site-discription');

    header.style.transform = 'translateY(0)';
    header.style.height = '80px';
	title.style.fontSize = '.7em';
	subtitle.style.fontSize = '.6em';
}

//タイトルのみ
function changeHeaderSizeTitle() {
    const header = document.querySelector('.header-back-wrap');
	const title = document.querySelector('.header-site-title');

    header.style.transform = 'translateY(0)';
    header.style.height = '70px';
	title.style.fontSize = '.7em';
}
//サブタイトルのみ
function changeHeaderSizeSubTitle() {
    const header = document.querySelector('.header-back-wrap');
	const subtitle = document.querySelector('.header-site-discription');

    header.style.transform = 'translateY(0)';
    header.style.height = '50px';
	subtitle.style.fontSize = '.8em';
}
// スクロールイベントのリスナー
window.addEventListener('scroll', function () {
    const header = document.querySelector('.header-back-wrap');
    const logo = document.querySelector('.header-rogo-wrap img');
	const logoWrap = document.querySelector('.header-rogo-wrap');
	const title = document.querySelector('.header-site-title');
	const subtitle = document.querySelector('.header-site-discription');
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
	var headerBackgroundClolor = '<?php echo $i_header_bgcolor; ?>';

    // 初回スクロール時に一度だけ実行
    if (!hasScrolledOnce && scrollTop > 0 && title.style.display === 'none' && subtitle.style.display === 'none') {
        // ロゴのみ
        header.style.transform = 'translateY(-100%)';
        hasScrolledOnce = true;

        setTimeout(() => {
			header.style.backgroundColor = headerBackgroundClolor;
            changeHeaderSizeOnlyRogo();
        }, 1000); 
    }else if (!hasScrolledOnce && scrollTop > 0 && logoWrap.style.display === '' && title.style.display === '' && subtitle.style.display === 'none'){
		 //ロゴとタイトル
        header.style.transform = 'translateY(-100%)';
        hasScrolledOnce = true;

        setTimeout(() => {
			header.style.backgroundColor = headerBackgroundClolor;
            changeHeaderSizeRogoTitle();
        }, 1000); 
	}else if (!hasScrolledOnce && scrollTop > 0　&& logoWrap.style.display === 'none' && title.style.display === '' && subtitle.style.display === ''){
		//タイトルとサブタイトル
        header.style.transform = 'translateY(-100%)';
        hasScrolledOnce = true;

        setTimeout(() => {
			header.style.backgroundColor = headerBackgroundClolor;
            changeHeaderSizeTitleSubtitle();
        }, 1000); 
	}else if (!hasScrolledOnce && scrollTop > 0　&& logoWrap.style.display === 'none' && title.style.display === '' && subtitle.style.display === 'none'){
		//タイトルのみ
        header.style.transform = 'translateY(-100%)';
        hasScrolledOnce = true;

        setTimeout(() => {
			header.style.backgroundColor = headerBackgroundClolor;
            changeHeaderSizeTitle();
        }, 1000);
	}else if (!hasScrolledOnce && scrollTop > 0　&& logoWrap.style.display === 'none' && title.style.display === 'none' && subtitle.style.display === ''){
		//サブタイトルのみ
        header.style.transform = 'translateY(-100%)';
        hasScrolledOnce = true;

        setTimeout(() => {
			header.style.backgroundColor = headerBackgroundClolor;
            changeHeaderSizeSubTitle();
        }, 1000);
	}else if (!hasScrolledOnce && scrollTop > 0){
		 //ロゴとタイトルとサブタイトル
        header.style.transform = 'translateY(-100%)';
        hasScrolledOnce = true;

        setTimeout(() => {
			header.style.backgroundColor = headerBackgroundClolor;
            changeHeaderSizeRogoTitleSubtitle();
        }, 1000);
	}
});



</script>