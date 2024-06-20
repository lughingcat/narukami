<?php 
$store_info_bg_img_url_stripslashes = stripslashes($store_info_bg_img_url);
?>
<article class="n-section-block">
	<div class="store-info-primary-title-prevew">
		<p class="store-info-p_title"><?php echo $store_info_title; ?></p>
	</div>
	<div class="store_info-all-wrap">
		<div class="store_info-text-wrap">
			<p class="adress-detail-title">店舗名</p>
			<p class="store_info-main-title"><?php echo $store_name; ?></p>
			<p class="adress-detail-title">郵便番号</p>
			<p class="store_info-main-title">〒<?php echo $store_post_number; ?></p>
			<p class="adress-detail-title">店舗住所</p>
			<p class="store_info-main-title"><?php echo $store_adress; ?></p>
			<p class="adress-detail-title">電話番号</p>
			<p class="store_info-main-title"><?php echo $store_phone_num; ?></p>
			<p class="adress-detail-title">定休日</p>
			<p class="store_info-main-title"><?php echo $store_rg_holiday; ?></p>
		</div>
		<div class="store_info-back-wrap">
			<?php echo $store_info_bg_img_url_stripslashes; ?>
		</div>
	</div>
</article>
