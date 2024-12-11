<?php
//変数初期値設定
$defult_footer_rogo_img = get_template_directory_uri() . '/admin-img/narukami-rogo-var3.1.0.png';
$footer_item_title1 = "SAMPLE 1";
$footer_item_title2 = "SAMPLE 2";
$footer_item_title3 = "SAMPLE 3";

$footer_item_url1 = home_url();
$footer_item_url2 = home_url();
$footer_item_url3 = home_url();

$i_footer_title_array = sanitize_option_value(get_option('footer-item-title', array($footer_item_title1,$footer_item_title2,$footer_item_title3)));
$i_footer_url_array = sanitize_option_value(get_option('footer-item-link',array($footer_item_url1,$footer_item_url2,$footer_item_url3)));
$footer_bg_color = sanitize_option_value(get_option('footer-bg-color', '#ffffff'));
$footer_textcolor = sanitize_option_value(get_option('footer-textcolor', '#353535'));
$follow_us_color = sanitize_option_value(get_option('follow-us-color', '#de309f'));
//sns
$twitter_sns_switch = sanitize_option_value(get_option('twitter-switch', 'twitter-on'));
$instagram_sns_switch = sanitize_option_value(get_option('instagram-switch', 'instagram-on'));
$facebook_sns_switch = sanitize_option_value(get_option('facebook-switch', 'facebook-on'));
$line_sns_switch = sanitize_option_value(get_option('line-switch', 'line-on'));
$youtube_sns_switch = sanitize_option_value(get_option('youtube-switch', 'youtube-on'));
//sns-switchの値を保持する
$twitter_switch_value = sns_checkbox_value($twitter_sns_switch, "twitter-on");
$instagram_switch_value = sns_checkbox_value($instagram_sns_switch, "instagram-on");
$facebook_switch_value = sns_checkbox_value($facebook_sns_switch, "facebook-on");
$line_switch_value = sns_checkbox_value($line_sns_switch, "line-on");
$youtube_switch_value = sns_checkbox_value($youtube_sns_switch, "youtube-on");
	
//sns-link
$twitter_sns_link = sanitize_option_value(get_option('twitter-linkurl', $footer_item_url1));
$instagram_sns_link = sanitize_option_value(get_option('instagram-linkurl', $footer_item_url1));
$facebook_sns_link = sanitize_option_value(get_option('facebook-linkurl', $footer_item_url1));
$line_sns_link = sanitize_option_value(get_option('line-linkurl', $footer_item_url1));
$youtube_sns_link = sanitize_option_value(get_option('youtube-linkurl', $footer_item_url1));

//フッターロゴ画像
$i_site_rogo_img_url_footer = esc_url(get_option('header-rogo-url', $defult_footer_rogo_img));

// 連想配列を作成
$footer_items_Array = array();
			
// $i_footer_title_arrayが配列であるかを確認
if (is_array($i_footer_title_array)) {
	// 各変数が配列であるかを確認
	if (is_array($i_footer_url_array)) {
		for ($footer = 0; $footer < count($i_footer_title_array); $footer++) {
			// 配列のインデックスが存在するかを確認
			if (isset($i_footer_title_array[$footer])) {
				$footer_items_Array[$i_footer_title_array[$footer]] = array(
					'title' => $i_footer_title_array[$footer],
					'url' => $i_footer_url_array[$footer]
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
<div class="footer-all-wrap"
	 style="background-color: <?php echo $footer_bg_color; ?>;">
	<div class="footer-back-wrap" 
		 style="color: <?php echo $footer_textcolor; ?>">
		<div class="footer-left-wrap">
			<div class="footer-rogo-wrap">
				<img src="<?php echo $i_site_rogo_img_url_footer; ?>" alt="ROGO">
			</div>
				<div class="footer-sns-wrap">
					<a href="<?php echo $twitter_sns_link; ?>" style="display: <?php echo $twitter_switch_value['display']; ?>;">
   						<i class="fa-brands fa-square-x-twitter"></i>
					</a>
					<a href="<?php echo $facebook_sns_link; ?>" style="display: <?php echo $facebook_switch_value['display']; ?>;">
					    <i class="fa-brands fa-square-facebook"></i>
					</a>
					<a href="<?php echo $instagram_sns_link; ?>" style="display: <?php echo $instagram_switch_value['display']; ?>;">
					    <i class="fa-brands fa-square-instagram instagram-icon"></i>
					</a>
					<a href="<?php echo $line_sns_link; ?>" style="display: <?php echo $line_switch_value['display']; ?>;">
					    <i class="fa-brands fa-line"></i>
					</a>
					<a href="<?php echo $youtube_sns_link; ?>" style="display: <?php echo $youtube_switch_value['display']; ?>;">
					    <i class="fa-brands fa-youtube"></i>
					</a>
				</div>
				<p class="follow-text" style="color: <?php echo $follow_us_color; ?>">Follow Us!</p>
		</div>
		<div class="footer-right-wrap">
			<div class="footer-link-wrap">
				<p class="footer-right-title">このサイトについて</p>
				<ul class="subfooter-ul-wrap">
					<?php
					if (isset($footer_items_Array) && is_array($footer_items_Array)) {
						foreach ($footer_items_Array as $key => $values ) {
						echo "<li>
        				<a class='footer-item-title' 
           				style='color: " . $footer_textcolor . ";' 
           				href='" . $values['url'] . "'>
						" . $values['title'] . "
						</a>
      					</li>";
						}											  
					}
					?>
				</ul>
			</div>
		</div>
	</div><!--footer-back-wrap end-->
	<p class="copy-right-text" 
	   style="color: <?php echo $footer_textcolor; ?>;"> <?php echo '&copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All rights reserved.'; ?></p>
</div><!--footer-all-wrap end-->
