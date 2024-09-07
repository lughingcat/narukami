<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
    	<div class="postbox bg">
        	<h3 class='hndle'><span class="title">フッター設定[NarukamiFooterSetting]</span></h3>
        	<div class="inside">
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
			<form id="narukami-footer-form" method="post" name="narukami-footer-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="update_custom_option_footer" /><!--post_nonce_check.phpへ送信(フッター用)-->
				<h3>フッタープレビュー</h3>
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
		<div class="inputForm">
			<h4>各種SNSの表示とリンク設定を行ってください</h4>
			<div class="sns-item-wrap">
				<i class="fa-brands fa-square-x-twitter"></i>
				<label class="sns-input-label">
					<input type="checkbox" name="twitter-switch" value="twitter-on" <?php echo $twitter_switch_value['switch']; ?>>
					表示する。
				</label>
				<input type="text" placeholder="お店のエックスのアカウントURLを入力してください。" name="twitter-linkurl" class="img-setect-url" value="<?php echo $twitter_sns_link; ?>">
			</div>
			<div class="sns-item-wrap">
				<i class="fa-brands fa-square-instagram instagram-icon"></i>
				<label class="sns-input-label">
					<input type="checkbox" name="instagram-switch" value="instagram-on" <?php echo $instagram_switch_value['switch']; ?>>
					表示する。
				</label>
				<input type="text" placeholder="お店のインスタグラムのアカウントURLを入力してください。" name="instagram-linkurl" class="img-setect-url" value="<?php echo $instagram_sns_link; ?>">
			</div>
			<div class="sns-item-wrap">
				<i class="fa-brands fa-square-facebook"></i>
				<label class="sns-input-label">
					<input type="checkbox" name="facebook-switch" value="facebook-on" <?php echo $facebook_switch_value['switch']; ?>>
					表示する。
				</label>
				<input type="text" placeholder="お店のフェイスブックのアカウントURLを入力してください。" name="facebook-linkurl" class="img-setect-url" value="<?php echo $facebook_sns_link; ?>">
			</div>
			<div class="sns-item-wrap">
				<i class="fa-brands fa-line"></i>
				<label class="sns-input-label">
					<input type="checkbox" name="line-switch" value="line-on" <?php echo $line_switch_value['switch']; ?>>
					表示する。
				</label>
				<input type="text" placeholder="お店のラインのアカウントURLを入力してください。" name="line-linkurl" class="img-setect-url" value="<?php echo $line_sns_link; ?>">
			</div>
			<div class="sns-item-wrap">
				<i class="fa-brands fa-youtube"></i>
				<label class="sns-input-label">
					<input type="checkbox" name="youtube-switch" value="youtube-on" <?php echo $youtube_switch_value['switch']; ?>>
					表示する。
				</label>
				<input type="text" placeholder="お店のYouTubeのアカウントURLを入力してください。" name="youtube-linkurl" class="img-setect-url" value="<?php echo $youtube_sns_link; ?>">
			</div>
			<h4>各種配色を選択してください。</h4>
				<div class="color-bg-box">
					<div class="color-box-child">
					  	<?php 
				  		genelate_color_picker_tag_demo(
                    	'footer-bg-color', 
						$footer_bg_color, 
						'フッターの背景色を選択してください。(クリアで透過)'
                  		);
                  		?>
					</div>
					<div class="color-box-child">
					  	<?php 
				  		genelate_color_picker_tag_demo(
                    	'footer-textcolor', 
                    	$footer_textcolor, 
                    	'テキストの文字色を選択してください。'
                  		);
                  		?> 
					</div>
					<div class="color-box-child">
					  	<?php 
				  		genelate_color_picker_tag_demo(
                    	'follow-us-color', 
                    	$follow_us_color, 
                    	'「Follow Us! 」の文字色を選択してください。'
                  		);
                  		?> 
					</div>
		     	</div><!--color-bg-box end-->
			<h4>フッターのサイトマップテキストとリンクURLを入力してください。(最大６個)</h4>
			<div class="global-form-wrap">
			<?php
			if (isset($footer_items_Array) && is_array($footer_items_Array)) {
			$footer_lentgh = 0;
			foreach ($footer_items_Array as $key => $items ) {
			echo "<div id='footer-flex-wrap_$footer_lentgh' class='globalmenu-flex-wrap'>";
			echo "<div class='flex-child-wrap'>";
			echo "<p>テキスト</p>";
			echo '<input type="text" name="footer_item_title[]" class="img-setect-url" value="' . $items['title'] . '">';
			echo "</div>";
			echo "<div class='flex-child-wrap'>";
			echo "<p>リンクURL</p>";
			echo '<input type="text" name="footer_item_link[]" class="img-setect-url" value="' . $items['url'] . '">';
			echo "</div>";
			echo '<button type="button" class="globalmenu-delete-btn" onClick="footerMenuDeleteElement(this)">削除</button>';
			echo "</div>";
			$footer_lentgh++;
			}
			}
			?>
		</div><!--inputForm end-->
			<div class="control-setting-btn">
				<button id="footer-add-btn" type="button" class="reproduction-btn">フォームを追加する</button>
				<button class="top-page-maker-save-btn" type="submit">保存する</button>
			</div>
				<?php wp_nonce_field('update_footer_action', 'update_footer_nonce'); ?>
			</form>
          </div><!--inside end-->
        </div><!--postbox bg end-->
      </div><!--metabox-holder end-->
</div><!--back_wrap end-->
