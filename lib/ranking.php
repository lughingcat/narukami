<div id="cmaker_ranking_wrap" class="cmaker-wrap-ranking show-element notshow">
	<div class="ranking_Prevew">
		<article class="cmakerPrevew">
			<?php
			 require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			 global $wpdb;
			 global $insert_id_post;
			 if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
				 $insertGlobalId = $_SESSION['insertGlobalId'];
				 if(preg_match('/([a-zA-Z]+)(\d+)/', $insertGlobalId, $matches)) {
					 $gm_numbers = $matches[2];
					 var_dump('セッション送信:'. $gm_numbers);
				 }else{
					 $gm_numbers = 0;
				 }
			 } else {
				 $insertGlobalId = $insert_id_post;
				 if(preg_match('/([a-zA-Z]+)(\d+)/', $insertGlobalId, $matches)) {
					 $gm_numbers = $matches[2];
					 var_dump('ポスト送信orDB値:'. $gm_numbers);
				 }else{
					 $gm_numbers = 0;
				 }
			 }
			$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}narukami_content_maker WHERE insert_ids = %s", $insertGlobalId);
			$id_result = $wpdb->get_results($sql);
			if( empty($id_result) || $insert_id_post !== $insertGlobalId){
			 $query = "SELECT
			 rank_pop,
			 rank_style,
			 rank_primary_title,
			 item_name, 
			 item_name_2, 
			 item_name_3, 
			 item_name_4, 
			 item_name_5, 
			 item_name_6, 
			 item_price, 
			 item_price_2, 
			 item_price_3, 
			 item_price_4, 
			 item_price_5, 
			 item_price_6, 
			 id,
			 insert_ids,
			 item_img_url,
			 item_img_url_2,
			 item_img_url_3,
			 item_img_url_4,
			 item_img_url_5,
			 item_img_url_6,
			 item_page_link,
			 item_page_link_2,
			 item_page_link_3,
			 item_page_link_4,
			 item_page_link_5,
			 item_page_link_6,
			 rank_on,
			 rank_on_2,
			 rank_on_3,
			 rank_on_4,
			 rank_on_5,
			 rank_on_6
			 FROM wp_narukami_content_maker
			 WHERE insert_ids = 'insert_id_first'";
			 }else{
				$query = "SELECT
			 rank_pop,
			 rank_style,
			 rank_primary_title,
			 item_name, 
			 item_name_2, 
			 item_name_3, 
			 item_name_4, 
			 item_name_5, 
			 item_name_6, 
			 item_price, 
			 item_price_2, 
			 item_price_3, 
			 item_price_4, 
			 item_price_5, 
			 item_price_6, 
			 id,
			 insert_ids,
			 item_img_url,
			 item_img_url_2,
			 item_img_url_3,
			 item_img_url_4,
			 item_img_url_5,
			 item_img_url_6,
			 item_page_link,
			 item_page_link_2,
			 item_page_link_3,
			 item_page_link_4,
			 item_page_link_5,
			 item_page_link_6,
			 rank_on,
			 rank_on_2,
			 rank_on_3,
			 rank_on_4,
			 rank_on_5,
			 rank_on_6
			 FROM wp_narukami_content_maker
			 WHERE insert_ids = '" . $insertGlobalId . "'";
			 }
			$rows = $wpdb->get_results($query);
			foreach($rows as $row) {
				$id = $row->id;
				$rank_pop = $row->rank_pop;
				$rank_style = $row->rank_style;
				$rank_primary_title = $row->rank_primary_title;
				$item_name = $row->item_name; 
				$item_name_2 = $row->item_name_2; 
				$item_name_3 = $row->item_name_3; 
				$item_name_4 = $row->item_name_4; 
				$item_name_5 = $row->item_name_5; 
				$item_name_6 = $row->item_name_6; 
				$item_price = $row->item_price; 
				$item_price_2 = $row->item_price_2; 
				$item_price_3 = $row->item_price_3; 
				$item_price_4 = $row->item_price_4; 
				$item_price_5 = $row->item_price_5; 
				$item_price_6 = $row->item_price_6; 
				$item_url = $row->item_img_url; 
				$item_url_2 = $row->item_img_url_2; 
				$item_url_3 = $row->item_img_url_3; 
				$item_url_4 = $row->item_img_url_4; 
				$item_url_5 = $row->item_img_url_5; 
				$item_url_6 = $row->item_img_url_6;
				$item_page_link = $row->item_page_link;
				$item_page_link_2 = $row->item_page_link_2;
				$item_page_link_3 = $row->item_page_link_3;
				$item_page_link_4 = $row->item_page_link_4;
				$item_page_link_5 = $row->item_page_link_5;
				$item_page_link_6 = $row->item_page_link_6;
				$item_rank_on = $row->rank_on;
				$item_rank_on_2 = $row->rank_on_2;
				$item_rank_on_3 = $row->rank_on_3;
				$item_rank_on_4 = $row->rank_on_4;
				$item_rank_on_5 = $row->rank_on_5;
				$item_rank_on_6 = $row->rank_on_6;
				$insert_ids_array = $row->insert_ids;
			};
			?>
		    <style>
				.overlay{
					background-position: center;
					background-repeat: no-repeat;
					background-size: cover;
				}
			</style>
			<?php
			//変数セット
			$math_sq_bg = "math_sq_bg";
			$math_circle_bg = "math_circle_bg";
			$math_band_bg = "math_band_bg";
			$math_label_bg = "math_label_bg";
			$overlay = "overlay";
			$clipping = "clipping";
			$circle = "circle";
			$ranking_pop_name = array(
				"math_sq_bg",
				"math_circle_bg",
				"math_band_bg",
				"math_label_bg"
			);
			$ranking_style_name = array(
				"overlay",
				"clipping",
				"circle"
			);
			$rank_show_result = "rank_show_1";
			$rank_show_2_result = "rank_show_2";
			$rank_show_3_result = "rank_show_3";
			$rank_show_4_result = "rank_show_4";
			$rank_show_5_result = "rank_show_5";
			$rank_show_6_result = "rank_show_6";
			$rank_notshow_result = "rank_not_show_1";
			$rank_notshow_2_result = "rank_not_show_2";
			$rank_notshow_3_result = "rank_not_show_3";
			$rank_notshow_4_result = "rank_not_show_4";
			$rank_notshow_5_result = "rank_not_show_5";
			$rank_notshow_6_result = "rank_not_show_6";
			//primary_title
			$rank_primary_title_check = isset($_POST['rank_primary_title']) ? $_POST['rank_primary_title'] : '';
			$rank_primary_title_result = data_variable_set($rank_primary_title_check, $rank_primary_title, $gm_numbers);
			
			//ランキングポップ
			$rank_pop_check = isset($_POST['rank_pop']) ? $_POST['rank_pop'] : "";
			$rank_pop_result = data_variable_set($rank_pop_check, $rank_pop, $gm_numbers);
			
			//ランキングスタイル
			$rank_style_check = isset($_POST['rank_style']) ? $_POST['rank_style'] : "";
			$rank_style_result = data_variable_set($rank_style_check, $rank_style, $gm_numbers);
			
			//アイテムタイトル
			$rank_item_name_check = isset($_POST['item_title']) ? $_POST['item_title'] : "";
			$rank_item_name_2_check = isset($_POST['item_title_2']) ? $_POST['item_title_2'] : "";
			$rank_item_name_3_check = isset($_POST['item_title_3']) ? $_POST['item_title_3'] : "";
			$rank_item_name_4_check = isset($_POST['item_title_4']) ? $_POST['item_title_4'] : "";
			$rank_item_name_5_check = isset($_POST['item_title_5']) ? $_POST['item_title_5'] : "";
			$rank_item_name_6_check = isset($_POST['item_title_6']) ? $_POST['item_title_6'] : "";
			
			$rank_item_name_result = data_variable_set($rank_item_name_check, $item_name, $gm_numbers);
			$rank_item_name_2_result = data_variable_set($rank_item_name_2_check, $item_name_2, $gm_numbers);
			$rank_item_name_3_result = data_variable_set($rank_item_name_3_check, $item_name_3, $gm_numbers);
			$rank_item_name_4_result = data_variable_set($rank_item_name_4_check, $item_name_4, $gm_numbers);
			$rank_item_name_5_result = data_variable_set($rank_item_name_5_check, $item_name_5, $gm_numbers);
			$rank_item_name_6_result = data_variable_set($rank_item_name_6_check, $item_name_6, $gm_numbers);
			
			//アイテムプライス
			$rank_item_price_check = isset($_POST['item_price']) ? $_POST['item_price'] : "";
			$rank_item_price_2_check = isset($_POST['item_price_2']) ? $_POST['item_price_2'] : "";
			$rank_item_price_3_check = isset($_POST['item_price_3']) ? $_POST['item_price_3'] : "";
			$rank_item_price_4_check = isset($_POST['item_price_4']) ? $_POST['item_price_4'] : "";
			$rank_item_price_5_check = isset($_POST['item_price_5']) ? $_POST['item_price_5'] : "";
			$rank_item_price_6_check = isset($_POST['item_price_6']) ? $_POST['item_price_6'] : "";
			
			$rank_item_price_result = data_variable_set($rank_item_price_check, $item_price, $gm_numbers);
			$rank_item_price_2_result = data_variable_set($rank_item_price_2_check, $item_price_2, $gm_numbers);
			$rank_item_price_3_result = data_variable_set($rank_item_price_3_check, $item_price_3, $gm_numbers);
			$rank_item_price_4_result = data_variable_set($rank_item_price_4_check, $item_price_4, $gm_numbers);
			$rank_item_price_5_result = data_variable_set($rank_item_price_5_check, $item_price_5, $gm_numbers);
			$rank_item_price_6_result = data_variable_set($rank_item_price_6_check, $item_price_6, $gm_numbers);
			
			//img画像リンク
			$rank_img_check = isset($_POST['item_img_url']) ? $_POST['item_img_url']: "";
			$rank_img_2_check = isset($_POST['item_img_url_2']) ? $_POST['item_img_url_2']: "";
			$rank_img_3_check = isset($_POST['item_img_url_3']) ? $_POST['item_img_url_3']: "";
			$rank_img_4_check = isset($_POST['item_img_url_4']) ? $_POST['item_img_url_4']: "";
			$rank_img_5_check = isset($_POST['item_img_url_5']) ? $_POST['item_img_url_5']: "";
			$rank_img_6_check = isset($_POST['item_img_url_6']) ? $_POST['item_img_url_6']: "";
			
			$rank_img_result = data_variable_set($rank_img_check, $item_url, $gm_numbers);
			$rank_img_2_result = data_variable_set($rank_img_2_check, $item_url_2, $gm_numbers);
			$rank_img_3_result = data_variable_set($rank_img_3_check, $item_url_3, $gm_numbers);
			$rank_img_4_result = data_variable_set($rank_img_4_check, $item_url_4, $gm_numbers);
			$rank_img_5_result = data_variable_set($rank_img_5_check, $item_url_5, $gm_numbers);
			$rank_img_6_result = data_variable_set($rank_img_6_check, $item_url_6, $gm_numbers);
			
			//ページリンク
			$item_page_link_check = isset($_POST['item_page_link']) ? $_POST['item_page_link']: "";
			$item_page_link_2_check = isset($_POST['item_page_link_2']) ? $_POST['item_page_link_2']: "";
			$item_page_link_3_check = isset($_POST['item_page_link_3']) ? $_POST['item_page_link_3']: "";
			$item_page_link_4_check = isset($_POST['item_page_link_4']) ? $_POST['item_page_link_4']: "";
			$item_page_link_5_check = isset($_POST['item_page_link_5']) ? $_POST['item_page_link_5']: "";
			$item_page_link_6_check = isset($_POST['item_page_link_6']) ? $_POST['item_page_link_6']: "";
			
			$item_page_link_result = data_variable_set($item_page_link_check, $item_page_link, $gm_numbers);
			$item_page_link_2_result = data_variable_set($item_page_link_2_check, $item_page_link_2, $gm_numbers);
			$item_page_link_3_result = data_variable_set($item_page_link_3_check, $item_page_link_3, $gm_numbers);
			$item_page_link_4_result = data_variable_set($item_page_link_4_check, $item_page_link_4, $gm_numbers);
			$item_page_link_5_result = data_variable_set($item_page_link_5_check, $item_page_link_5, $gm_numbers);
			$item_page_link_6_result = data_variable_set($item_page_link_6_check, $item_page_link_6, $gm_numbers);
			
			//オーバーレイコントロール
			$overlay_control_result = overlay_control($rank_style_check, $rank_style, $overlay, $gm_numbers, $rank_img_result);
			$overlay_control_2_result = overlay_control($rank_style_check, $rank_style, $overlay, $gm_numbers, $rank_img_2_result);
			$overlay_control_3_result = overlay_control($rank_style_check, $rank_style, $overlay, $gm_numbers, $rank_img_3_result);
			$overlay_control_4_result = overlay_control($rank_style_check, $rank_style, $overlay, $gm_numbers, $rank_img_4_result);
			$overlay_control_5_result = overlay_control($rank_style_check, $rank_style, $overlay, $gm_numbers, $rank_img_5_result);
			$overlay_control_6_result = overlay_control($rank_style_check, $rank_style, $overlay, $gm_numbers, $rank_img_6_result);
			
			//入力制御
			$rank_on_check = isset($_POST['rank_on']) ? $_POST['rank_on'] : "";
			$rank_on_check_2 = isset($_POST['rank_on_2']) ? $_POST['rank_on_2'] : "";
			$rank_on_check_3 = isset($_POST['rank_on_3']) ? $_POST['rank_on_3'] : "";
			$rank_on_check_4 = isset($_POST['rank_on_4']) ? $_POST['rank_on_4'] : "";
			$rank_on_check_5 = isset($_POST['rank_on_5']) ? $_POST['rank_on_5'] : "";
			$rank_on_check_6 = isset($_POST['rank_on_6']) ? $_POST['rank_on_6'] : "";
			$rank_on_1_result = process_rank_on($rank_on_check, $item_rank_on, $rank_show_result, $gm_numbers);
			$rank_on_2_result = process_rank_on($rank_on_check_2, $item_rank_on_2, $rank_show_2_result, $gm_numbers);
			$rank_on_3_result = process_rank_on($rank_on_check_3, $item_rank_on_3, $rank_show_3_result, $gm_numbers);
			$rank_on_4_result = process_rank_on($rank_on_check_4, $item_rank_on_4, $rank_show_4_result, $gm_numbers);
			$rank_on_5_result = process_rank_on($rank_on_check_5, $item_rank_on_5, $rank_show_5_result, $gm_numbers);
			$rank_on_6_result = process_rank_on($rank_on_check_6, $item_rank_on_6, $rank_show_6_result, $gm_numbers);
			?>
		<div class="rank-primary-title-prevew">
			<p class="r-p-t-prev"><?php echo $rank_primary_title_result;?></p>
		</div>
		<div class="ranking-all-wrap">
		<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_1_result ;?> ; background-image: url(<?php echo $overlay_control_result;?>)"><!--ランキング１位-->
			<a href=<?php echo $item_page_link_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>1</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング１位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_2_result ;?> ; background-image: url(<?php echo $overlay_control_2_result;?>)"><!--ランキング2位-->
			<a href=<?php echo $item_page_link_2_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>2</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_2_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_2_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_2_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング2位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_3_result ;?> ; background-image: url(<?php echo $overlay_control_3_result;?>)"><!--ランキング3位-->
			<a href=<?php echo $item_page_link_3_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>3</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_3_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_3_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_3_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング3位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_4_result ;?> ; background-image: url(<?php echo $overlay_control_4_result;?>)"><!--ランキング4位-->
			<a href=<?php echo $item_page_link_4_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>4</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_4_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_4_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_4_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング4位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_5_result ;?> ; background-image: url(<?php echo $overlay_control_5_result;?>)"><!--ランキング5位-->
			<a href=<?php echo $item_page_link_5_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>5</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_5_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_5_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_5_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング5位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_6_result ;?> ; background-image: url(<?php echo $overlay_control_6_result;?>)"><!--ランキング6位-->
			<a href=<?php echo $item_page_link_6_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>6</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_6_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_6_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_6_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング6位end-->
		</div>
		</article>
	</div>
	<div class="inputForm">
			<div class="rank-p-title-wrap">
			<h4 class="rank-prev">ランキングタイトル</h4>
			<p>ランキングタイトルを入力してください</p>
			<input type="text" class="rank-primary-title" name="rank_primary_title[<?php echo $gm_numbers; ?>]" value="<?php echo $rank_primary_title_result;?>">
			</div>
		<h4 class="rank-prev">ランキングポップデザイン</h4>
		<p>ランキングポップのデザインを選択してください</p>
		<div class="rank-font-all-wrap">
			<div class="font-wrap">
			<div class="rank-font-1-wrap">
				<p class="rank-font-1">1</p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">四角背景</p>
					<input type="radio" name="rank_pop[<?php echo $gm_numbers; ?>]" value="math_sq_bg"
						   <?php 
						   echo checkbox_dataset($rank_pop_check, $rank_pop, $math_sq_bg, $gm_numbers);
						   ?>
						   >
				</div>
			</div><!--font-wrap-end-->
			
			<div class="font-wrap-2">
			<div class="rank-font-2-wrap">
				<p class="rank-font-2">1</p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">丸背景</p>
					<input type="radio" name="rank_pop[<?php echo $gm_numbers; ?>]" value="math_circle_bg" 
						   <?php 
						   echo checkbox_dataset($rank_pop_check, $rank_pop, $math_circle_bg, $gm_numbers);
						   ?>
						   >
				</div>
			</div><!--font-wrap-2-end-->
			
			<div class="font-wrap-3">
			<div class="rank-font-3-wrap">
				<p class="rank-font-3"><span>1</span></p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">縦帯背景</p>
					<input type="radio" name="rank_pop[<?php echo $gm_numbers; ?>]" value="math_band_bg"
						   <?php 
						   echo checkbox_dataset($rank_pop_check, $rank_pop, $math_band_bg, $gm_numbers);
						   ?>
						   >
				</div>
			</div><!--font-wrap-3-end-->
			
			
			<div class="font-wrap-4">
			<div class="rank-font-4-wrap">
				<p class="rank-font-4"><span>1</span></p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">ラベル背景</p>
					<input type="radio" name="rank_pop[<?php echo $gm_numbers; ?>]" value="math_label_bg"
						   <?php 
						   echo checkbox_dataset($rank_pop_check, $rank_pop, $math_label_bg, $gm_numbers);
						   ?>
						   >
				</div>
			</div><!--font-wrap-4-end-->
			
			
		</div><!--rank-font-all-wrap-end-->
		
		
		<h4 class="rank-prev">ランキングスタイルデザイン</h4>
		<p>ランキングスタイルデザインを選択してください</p>
		<div class="rank-item-all-wrap">
			<div class="rank-wrap">
			<div class="rank-item-wrap">
				<div class="rank-item-bg">
					<p class="img-p">IMG</p>
					<div class="rank-overray">
					<p>商品名</p>
					<p>価格</p>
					</div>
				</div>
			</div>
				<div class="rank-radio-style">
					<p class="rank-item-title">画像背景オーバーレイ</p>
					<input type="radio" name="rank_style[<?php echo $gm_numbers; ?>]" value="overlay"
						   <?php
						   echo checkbox_dataset($rank_style_check, $rank_style, $overlay, $gm_numbers);
						   ?>
						   >
				</div>
			</div><!--rank-wrap-end-->
			
			<div class="rank-wrap-2">
			 <div class="rank-item-wrap-2">
			 	<div class="rank-item-bg-2">
			 		<p class="img-p-2">IMG</p>
			 	</div>
				 <div class="rank-overray-2">
			 		<p>商品名</p>
			 		<p>価格</p>
			 		</div>
			 </div>
				<div class="rank-radio-style">
					<p class="rank-item-title-2">画像のみ背景透過</p>
					<input type="radio" name="rank_style[<?php echo $gm_numbers; ?>]" value="clipping" 
						   <?php 
						   echo checkbox_dataset($rank_style_check, $rank_style, $clipping, $gm_numbers);
						   ?>
						   >
				</div>
			</div><!--ranl-wrap-2-end-->
			
			<div class="rank-wrap-3">
			 <div class="rank-item-wrap-3">
			 	<div class="rank-item-bg-3">
			 		<p class="img-p-3">IMG</p>
			 	</div>
				 <div class="rank-overray-3">
			 		<p>商品名</p>
			 		<p>価格</p>
			 		</div>
			 </div>
				<div class="rank-radio-style">
					<p class="rank-item-title-3">画像背景丸形切り抜き</p>
					<input type="radio" name="rank_style[<?php echo $gm_numbers; ?>]" value="circle" 
						   <?php 
						   echo checkbox_dataset($rank_style_check, $rank_style, $circle, $gm_numbers);
						   ?>
						   >
				</div>
			</div><!--ranl-wrap-3-end-->
			
		</div><!--rank-item-all-wrap-end-->
	<h4 class="rank-prev">ランキングアイテム入力</h4>
　　　<p>ランキングアイテムの詳細を入力してください。</br>ランキングにラインナップできる最大アイテム数は6つです。</p>
		
		
		<div class="rank-item-detail-wrap">
		<h4 class="rank-prev rank-prev-num">ランキング１位</h4>
			<?php
  			generate_upload_image_tag('item_img_url', $rank_img_result, $insertGlobalId, $gm_numbers);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank1-item-title" class="img-setect-url" name="item_title[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_name_result; ?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank-item-price"  class="img-setect-url" name="item_price[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_price_result; ?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank-item-url" class="img-setect-url" name="item_page_link[<?php echo $gm_numbers; ?>]" value=<?php echo $item_page_link_result; ?>>
				<div id="rank-notshow-overlay" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap1-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-1-show" type="radio" name="rank_on[<?php echo $gm_numbers; ?>]" value="rank_show_1"
						  <?php 
						  echo check_rank_show($rank_on_check, $item_rank_on, $gm_numbers, $rank_show_result);
						  ?>
						  >表示する</label>
			<label><input id="rank-1-notshow" type="radio" name="rank_on[<?php echo $gm_numbers; ?>]" value="rank_not_show_1"
						  <?php 
						  echo check_rank_show($rank_on_check, $item_rank_on, $gm_numbers, $rank_notshow_result);
						  ?>
						  >非表示にする</label>

		<div class="rank-item-detail-wrap">
		<h4 class="rank-prev rank-prev-num">ランキング2位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_2', $rank_img_2_result, $insertGlobalId, $gm_numbers);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank2-item-title" class="img-setect-url" name="item_title_2[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_name_2_result; ?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank2-item-price" class="img-setect-url" name="item_price_2[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_price_2_result; ?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank2-item-url" class="img-setect-url" name="item_page_link_2[<?php echo $gm_numbers; ?>]" value=<?php echo $item_page_link_2_result; ?>>
				<div id="rank-notshow-overlay-2" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap2-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-2-show" type="radio" name="rank_on_2[<?php echo $gm_numbers; ?>]" value="rank_show_2"
						  <?php 
						  echo check_rank_show($rank_on_check_2, $item_rank_on_2, $gm_numbers, $rank_show_2_result);
						  ?>
						  >表示する</label>
			<label><input id="rank-2-notshow" type="radio" name="rank_on_2[<?php echo $gm_numbers; ?>]" value="rank_not_show_2"
						  <?php 
						  echo check_rank_show($rank_on_check_2, $item_rank_on_2, $gm_numbers, $rank_notshow_2_result);
						  ?>
						  >非表示にする</label>

		<div class="rank-item-detail-wrap">
		<h4 class="rank-prev rank-prev-num">ランキング3位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_3', $rank_img_3_result, $insertGlobalId, $gm_numbers);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank3-item-title" class="img-setect-url" name="item_title_3[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_name_3_result; ?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank3-item-price" class="img-setect-url" name="item_price_3[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_price_3_result; ?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank3-item-url" class="img-setect-url" name="item_page_link_3[<?php echo $gm_numbers; ?>]" value=<?php echo $item_page_link_3_result; ?>>
			<div id="rank-notshow-overlay-3" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap3-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-3-show" type="radio" name="rank_on_3[<?php echo $gm_numbers; ?>]" value="rank_show_3"
						  <?php 
						  echo check_rank_show($rank_on_check_3, $item_rank_on_3, $gm_numbers, $rank_show_3_result);
						  ?>
						  >表示する</label>
			<label><input id="rank-3-notshow" type="radio" name="rank_on_3[<?php echo $gm_numbers; ?>]" value="rank_not_show_3"
						  <?php 
						  echo check_rank_show($rank_on_check_3, $item_rank_on_3, $gm_numbers, $rank_notshow_3_result);
						  ?>
						  >非表示にする</label>
		<div class="rank-item-detail-wrap">
		<h4 class="rank-prev rank-prev-num">ランキング4位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_4', $rank_img_4_result, $insertGlobalId, $gm_numbers);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank4-item-title" class="img-setect-url" name="item_title_4[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_name_4_result; ?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank4-item-price" class="img-setect-url" name="item_price_4[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_price_4_result; ?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank4-item-url" class="img-setect-url" name="item_page_link_4[<?php echo $gm_numbers; ?>]" value=<?php echo $item_page_link_4_result; ?>>
			<div id="rank-notshow-overlay-4" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap4-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-4-show" type="radio" name="rank_on_4[<?php echo $gm_numbers; ?>]" value="rank_show_4"
						  <?php 
						  echo check_rank_show($rank_on_check_4, $item_rank_on_4, $gm_numbers, $rank_show_4_result);
						  ?>
						  >表示する</label>
			<label><input id="rank-4-notshow" type="radio" name="rank_on_4[<?php echo $gm_numbers; ?>]" value="rank_not_show_4"
						  <?php 
						  echo check_rank_show($rank_on_check_4, $item_rank_on_4, $gm_numbers, $rank_notshow_4_result);
						  ?>
						  >非表示にする</label>


		<div class="rank-item-detail-wrap">
		<h4 class="rank-prev rank-prev-num">ランキング5位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_5', $rank_img_5_result, $insertGlobalId, $gm_numbers);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank5-item-title" class="img-setect-url" name="item_title_5[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_name_5_result; ?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank5-item-price" class="img-setect-url" name="item_price_5[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_price_5_result; ?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank5-item-url" class="img-setect-url" name="item_page_link_5[<?php echo $gm_numbers; ?>]" value=<?php echo $item_page_link_5_result; ?>>
			<div id="rank-notshow-overlay-5" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap5-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-5-show" type="radio" name="rank_on_5[<?php echo $gm_numbers; ?>]" value="rank_show_5"
						  <?php 
						  echo check_rank_show($rank_on_check_5, $item_rank_on_5, $gm_numbers, $rank_show_5_result);
						  ?>
						  >表示する</label>
			<label><input id="rank-5-notshow" type="radio" name="rank_on_5[<?php echo $gm_numbers; ?>]" value="rank_not_show_5"
						  <?php 
						  echo check_rank_show($rank_on_check_5, $item_rank_on_5, $gm_numbers, $rank_notshow_5_result);
						  ?>
						  >非表示にする</label>
		<div class="rank-item-detail-wrap">
		<h4 class="rank-prev rank-prev-num">ランキング6位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_6', $rank_img_6_result, $insertGlobalId, $gm_numbers);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank6-item-title" class="img-setect-url" name="item_title_6[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_name_6_result; ?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank6-item-price" class="img-setect-url" name="item_price_6[<?php echo $gm_numbers; ?>]" value=<?php echo $rank_item_price_6_result; ?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank6-item-url" class="img-setect-url" name="item_page_link_6[<?php echo $gm_numbers; ?>]" value=<?php echo $item_page_link_6_result; ?>>
			<div id="rank-notshow-overlay-6" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap6-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-6-show" type="radio" name="rank_on_6[<?php echo $gm_numbers; ?>]" value="rank_show_6"
						  <?php 
						  echo check_rank_show($rank_on_check_6, $item_rank_on_6, $gm_numbers, $rank_show_6_result);
						  ?>
						  >表示する</label>
			<label><input id="rank-6-notshow" type="radio" name="rank_on_6[<?php echo $gm_numbers; ?>]" value="rank_not_show_6"
						  <?php 
						  echo check_rank_show($rank_on_check_6, $item_rank_on_6, $gm_numbers, $rank_notshow_6_result);
						  ?>
						  >非表示にする</label>
		
		
	</div><!--inputForm-end-->
	<button type="button" id="rankingCloseBtn" onClick="closeFile(this)">閉じる</button>
</div>