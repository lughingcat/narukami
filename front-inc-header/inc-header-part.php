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