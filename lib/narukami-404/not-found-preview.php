<?php
//コンテンツ
$i_page404_title = sanitize_option_value($_POST['page404-title']);
$i_page404_title_color = sanitize_option_value($_POST['notfound-text-color']);
$i_page404_title_shadow = sanitize_option_value($_POST['notfound-text-shadow']);

//check is shadow type
if(empty($i_page404_title_shadow)){
	$notfound_text_shadow_value = "";
}else{
	$notfound_text_shadow_value = "1px 1px 35px" . $i_page404_title_shadow;
}
?>
<style>
	.notfound-title{
		color: <?php echo $i_page404_title_color; ?>;
		text-shadow: <?php echo $notfound_text_shadow_value; ?>;
	}
</style>
<div class="notfound_all_wrap">
	<p class="notfound-title"><?php echo $i_page404_title?></p>
	<a class="notfound-title notfound-linktext" href="<?php echo home_url(); ?>">ホームに戻る。</a>
</div>