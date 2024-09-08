<?php
$i_site_rogo_img_url = sanitize_option_value(get_option('header-rogo-url'));
$i_site_title_value = sanitize_option_value(get_option('header-tite'));
$i_site_discription_value = sanitize_option_value(get_option('header-discription'));
$i_header_display_setting = sanitize_option_value(get_option('header-disp-set'));
$i_header_rogo_setting = sanitize_option_value(get_option('header-rogo-set'));
$i_header_stitle_setting = sanitize_option_value(get_option('header-stitle-set'));
$i_header_sdisc_setting = sanitize_option_value(get_option('header-sdisc-set'));
$i_header_bgcolor = sanitize_option_value(get_option('header-bg-color'));
$i_header_textcolor_setting = sanitize_option_value(get_option('header-text-color'));
$animetion_type = sanitize_option_value(get_option('loading-anime-type'));
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
	 style="background-color: <?php echo $i_header_bgcolor; ?>; display: <?php echo $disp_switch; ?>;">
	<div class="header-flex-setting">
		<div class="header-rogo-wrap" style="display: <?php echo $disp_img_switch; ?>;">
    		<a href="<?php echo home_url(); ?>">
        		<img src="<?php echo $i_site_rogo_img_url; ?>" alt="Site Logo">
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
	console.log(headerBgContainer)
	headerBgContainer.classList.add('bg-opacity-value');
}
</script>