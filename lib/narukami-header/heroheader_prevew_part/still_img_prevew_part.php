<?php
//変数初期値設定
$defult_still_img_prev = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
//静止画変数
$i_heroheader_stillImg = sanitize_option_value(get_option('hero-H-stillImg', $defult_still_img_prev));
$i_heroheader_stillTitle = sanitize_option_value(get_option('hero-H-stillTitle', 'SITE TITLE'));
$i_hh_still_title_color = sanitize_option_value(get_option('heroheader-titleTextColor', '#ffffff'));
$i_hh_still_shadow_color = sanitize_option_value(get_option('heroheader-titleShadowColor', '#000'));
?>
<div class="heroheader-prevew-all-wrap">
	<div class="heroheader-back-wrap">
		<div class="heroheader-rogo-wrap"
			 style="background-image: url('<?php echo $i_heroheader_stillImg; ?>');">
				<div class="heroheader-title-wrap">
					<p class="heroheader-title" 
					   style="color: <?php echo $i_hh_still_title_color; ?>; text-shadow: 1px 1px 10px <?php echo $i_hh_still_shadow_color; ?>;">
						<?php echo $i_heroheader_stillTitle; ?>
					</p>
				</div>
		</div>
	</div><!--heroheader-back-wrap-end-->
</div><!--heroheader-prevew-all-wrap-end-->