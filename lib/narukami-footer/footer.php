<?php
$i_footer_title_array = sanitize_option_value(get_option('footer-item-title', ['']));
$i_footer_url_array = sanitize_option_value(get_option('footer-item-link', ['']));
$footer_bg_color = sanitize_option_value(get_option('footer-bg-color'));
$footer_textcolor = sanitize_option_value(get_option('footer-textcolor'));
$follow_us_color = sanitize_option_value(get_option('follow-us-color'));
//sns
$twitter_sns_switch = sanitize_option_value(get_option('twitter-switch'));
$instagram_sns_switch = sanitize_option_value(get_option('instagram-switch'));
$facebook_sns_switch = sanitize_option_value(get_option('facebook-switch'));
$line_sns_switch = sanitize_option_value(get_option('line-switch'));
$youtube_sns_switch = sanitize_option_value(get_option('youtube-switch'));
//sns-switchの値を保持する
$twitter_switch_value = sns_checkbox_value($twitter_sns_switch, "twitter-on");
$instagram_switch_value = sns_checkbox_value($instagram_sns_switch, "instagram-on");
$facebook_switch_value = sns_checkbox_value($facebook_sns_switch, "facebook-on");
$line_switch_value = sns_checkbox_value($line_sns_switch, "line-on");
$youtube_switch_value = sns_checkbox_value($youtube_sns_switch, "youtube-on");
	
//sns-link
$twitter_sns_link = sanitize_option_value(get_option('twitter-linkurl'));
$instagram_sns_link = sanitize_option_value(get_option('instagram-linkurl'));
$facebook_sns_link = sanitize_option_value(get_option('facebook-linkurl'));
$line_sns_link = sanitize_option_value(get_option('line-linkurl'));
$youtube_sns_link = sanitize_option_value(get_option('youtube-linkurl'));
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
				<img src="https://nousondiner.com/wp-content/uploads/2022/03/rogomainver.5.0.0-2.png" alt="ROGO">
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
