<div id="cmaker_ranking_wrap" class="cmakerWrap">
	<div class="ranking_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
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
			  rank_on_6,
			  s_cmaker
			  FROM wp_narukami_content_maker;";
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
				 $select_box = $row->s_cmaker; 
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
			
			if( $_POST['rank_on'] == "rank_show_1"){
				$rank_on_1_result = "";
			}elseif( $_POST['rank_on'] == "rank_not_show_1" && $item_rank_on == "rank_show_1"){
				$rank_on_1_result = "none";
			}elseif( $_POST['rank_on'] == "" && $item_rank_on == ""){
				$rank_on_1_result = "none";
			}
			
			if( $_POST['rank_on_2'] == "rank_show_2"){
				$rank_on_2_result = "";
			}elseif( $_POST['rank_on_2'] == "rank_not_show_2" && $item_rank_on_2 == "rank_show_2"){
				$rank_on_2_result = "none";
			}elseif( $_POST['rank_on_2'] == "" && $item_rank_on_2 == ""){
				$rank_on_2_result = "none";
			}
			
			if( $_POST['rank_on_3'] == "rank_show_3"){
				$rank_on_3_result = "";
			}elseif( $_POST['rank_on_3'] == "rank_not_show_3" && $item_rank_on_3 == "rank_show_3"){
				$rank_on_3_result = "none";
			}elseif( $_POST['rank_on_3'] == "" && $item_rank_on_3 == ""){
				$rank_on_3_result = "none";
			}
			
			if( $_POST['rank_on_4'] == "rank_show_4"){
				$rank_on_4_result = "";
			}elseif( $_POST['rank_on_4'] == "rank_not_show_4" && $item_rank_on_4 == "rank_show_4"){
				$rank_on_4_result = "none";
			}elseif( $_POST['rank_on_4'] == "" && $item_rank_on_4 == ""){
				$rank_on_4_result = "none";
			}
			
			if( $_POST['rank_on_5'] == "rank_show_5"){
				$rank_on_5_result = "";
			}elseif( $_POST['rank_on_5'] == "rank_not_show_5" && $item_rank_on_5 == "rank_show_5"){
				$rank_on_5_result = "none";
			}elseif( $_POST['rank_on_5'] == "" && $item_rank_on_5 == ""){
				$rank_on_5_result = "none";
			}
			
			if( $_POST['rank_on_6'] == "rank_show_6"){
				$rank_on_6_result = "";
			}elseif( $_POST['rank_on_6'] == "rank_not_show_6" && $item_rank_on_6 == "rank_show_6"){
				$rank_on_6_result = "none";
			}elseif( $_POST['rank_on_6'] == "" && $item_rank_on_6 == ""){
				$rank_on_6_result = "none";
			}
			?>
		<div class="rank-primary-title-prevew">
			<p class="r-p-t-prev"><?php
				if( isset( $_POST['rank_primary_title'])){
					echo $_POST['rank_primary_title'];
				}elseif( !isset($_POST['rank_primary_title'])){
					echo $rank_primary_title;
				}
				;?></p>
		</div>
		<div class="ranking-all-wrap">
		<div class="<?php if( isset($_POST['rank_style']) ){ echo $_POST['rank_style']; } else{ echo $rank_style;}?>" 
			 style="display: <?php echo $rank_on_1_result ;?> ; background-image: url(<?php if( $_POST['rank_style'] == "overlay" ){ echo $_POST['item_img_url']; } elseif( $_POST['rank_style'] == "" && $rank_style == "overlay" ){ echo $item_url;} else{ echo ""; }?>)"><!--ランキング１位-->
			<a href=<?php if( isset($_POST['item_page_link']) ){ echo $_POST['item_page_link']; } else{ echo $item_page_link;}?>></a>
			<div class="<?php if( isset($_POST['rank_pop']) ){ echo $_POST['rank_pop']; } else{ echo $rank_pop;}?>"><span>1</span></div>
			<div class="ranking-img">
				<img src="<?php if( isset($_POST['item_img_url']) ){ echo $_POST['item_img_url']; } else{ echo $item_url;}?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php if( isset($_POST['item_title']) ){ echo $_POST['item_title']; } else{ echo $item_name;}?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php if( isset($_POST['item_price']) ){ echo $_POST['item_price']; } else{ echo $item_price;}?>円</p>
				</div>
		    </div>
		</div><!--ランキング１位end-->
			
			<div class="<?php if( isset($_POST['rank_style']) ){ echo $_POST['rank_style']; } else{ echo $rank_style;}?>" 
			 style="display: <?php echo $rank_on_2_result ;?> ; background-image: url(<?php if( $_POST['rank_style'] == "overlay" ){ echo $_POST['item_img_url_2']; } elseif( $_POST['rank_style'] == "" && $rank_style == "overlay" ){ echo $item_url_2;} else{ echo ""; }?>)"><!--ランキング2位-->
			<a href=<?php if( isset($_POST['item_page_link_2']) ){ echo $_POST['item_page_link_2']; } else{ echo $item_page_link_2;}?>></a>
			<div class="<?php if( isset($_POST['rank_pop']) ){ echo $_POST['rank_pop']; } else{ echo $rank_pop;}?>"><span>2</span></div>
			<div class="ranking-img">
				<img src="<?php if( isset($_POST['item_img_url_2']) ){ echo $_POST['item_img_url_2']; } else{ echo $item_url_2;}?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php if( isset($_POST['item_title_2']) ){ echo $_POST['item_title_2']; } else{ echo $item_name_2;}?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php if( isset($_POST['item_price_2']) ){ echo $_POST['item_price_2']; } else{ echo $item_price_2;}?>円</p>
				</div>
		    </div>
		</div><!--ランキング2位end-->
			
			<div class="<?php if( isset($_POST['rank_style']) ){ echo $_POST['rank_style']; } else{ echo $rank_style;}?>" 
			 style="display: <?php echo $rank_on_3_result ;?> ; background-image: url(<?php if( $_POST['rank_style'] == "overlay" ){ echo $_POST['item_img_url_3']; } elseif( $_POST['rank_style'] == "" && $rank_style == "overlay" ){ echo $item_url_3;} else{ echo ""; }?>)"><!--ランキング3位-->
			<a href=<?php if( isset($_POST['item_page_link_3']) ){ echo $_POST['item_page_link_3']; } else{ echo $item_page_link_3;}?>></a>
			<div class="<?php if( isset($_POST['rank_pop']) ){ echo $_POST['rank_pop']; } else{ echo $rank_pop;}?>"><span>3</span></div>
			<div class="ranking-img">
				<img src="<?php if( isset($_POST['item_img_url_3']) ){ echo $_POST['item_img_url_3']; } else{ echo $item_url_3;}?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php if( isset($_POST['item_title_3']) ){ echo $_POST['item_title_3']; } else{ echo $item_name_3;}?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php if( isset($_POST['item_price_3']) ){ echo $_POST['item_price_3']; } else{ echo $item_price_3 ;}?>円</p>
				</div>
		    </div>
		</div><!--ランキング3位end-->
			
			<div class="<?php if( isset($_POST['rank_style']) ){ echo $_POST['rank_style']; } else{ echo $rank_style;}?>" 
			 style="display: <?php echo $rank_on_4_result ;?> ; background-image: url(<?php if( $_POST['rank_style'] == "overlay" ){ echo $_POST['item_img_url_4']; } elseif( $_POST['rank_style'] == "" && $rank_style == "overlay" ){ echo $item_url_4;} else{ echo ""; }?>)"><!--ランキング4位-->
			<a href=<?php if( isset($_POST['item_page_link_4']) ){ echo $_POST['item_page_link_4']; } else{ echo $item_page_link_4;}?>></a>
			<div class="<?php if( isset($_POST['rank_pop']) ){ echo $_POST['rank_pop']; } else{ echo $rank_pop;}?>"><span>4</span></div>
			<div class="ranking-img">
				<img src="<?php if( isset($_POST['item_img_url_4']) ){ echo $_POST['item_img_url_4']; } else{ echo $item_url_4;}?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php if( isset($_POST['item_title_4']) ){ echo $_POST['item_title_4']; } else{ echo $item_name_4;}?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php if( isset($_POST['item_price_4']) ){ echo $_POST['item_price_4']; } else{ echo $item_price_4 ;}?>円</p>
				</div>
		    </div>
		</div><!--ランキング4位end-->
			
			<div class="<?php if( isset($_POST['rank_style']) ){ echo $_POST['rank_style']; } else{ echo $rank_style;}?>" 
			 style="display: <?php echo $rank_on_5_result ;?> ; background-image: url(<?php if( $_POST['rank_style'] == "overlay" ){ echo $_POST['item_img_url_5']; } elseif( $_POST['rank_style'] == "" && $rank_style == "overlay" ){ echo $item_url_5;} else{ echo ""; }?>)"><!--ランキング3位-->
			<a href=<?php if( isset($_POST['item_page_link_5']) ){ echo $_POST['item_page_link_5']; } else{ echo $item_page_link_5;}?>></a>
			<div class="<?php if( isset($_POST['rank_pop']) ){ echo $_POST['rank_pop']; } else{ echo $rank_pop;}?>"><span>5</span></div>
			<div class="ranking-img">
				<img src="<?php if( isset($_POST['item_img_url_5']) ){ echo $_POST['item_img_url_5']; } else{ echo $item_url_5;}?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php if( isset($_POST['item_title_5']) ){ echo $_POST['item_title_5']; } else{ echo $item_name_5;}?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php if( isset($_POST['item_price_5']) ){ echo $_POST['item_price_5']; } else{ echo $item_price_5 ;}?>円</p>
				</div>
		    </div>
		</div><!--ランキング5位end-->
			
			<div class="<?php if( isset($_POST['rank_style']) ){ echo $_POST['rank_style']; } else{ echo $rank_style;}?>" 
			 style="display: <?php echo $rank_on_6_result ;?> ; background-image: url(<?php if( $_POST['rank_style'] == "overlay" ){ echo $_POST['item_img_url_6']; } elseif( $_POST['rank_style'] == "" && $rank_style == "overlay" ){ echo $item_url_6;} else{ echo ""; }?>)"><!--ランキング3位-->
			<a href=<?php if( isset($_POST['item_page_link_6']) ){ echo $_POST['item_page_link_6']; } else{ echo $item_page_link_6;}?>></a>
			<div class="<?php if( isset($_POST['rank_pop']) ){ echo $_POST['rank_pop']; } else{ echo $rank_pop;}?>"><span>6</span></div>
			<div class="ranking-img">
				<img src="<?php if( isset($_POST['item_img_url_6']) ){ echo $_POST['item_img_url_6']; } else{ echo $item_url_6;}?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php if( isset($_POST['item_title_6']) ){ echo $_POST['item_title_6']; } else{ echo $item_name_6;}?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php if( isset($_POST['item_price_6']) ){ echo $_POST['item_price_6']; } else{ echo $item_price_6 ;}?>円</p>
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
			<input type="text" class="rank-primary-title" name="rank_primary_title" value="<?php
				if( isset( $_POST['rank_primary_title'])){
					echo $_POST['rank_primary_title'];
				}elseif( !isset($_POST['rank_primary_title'])){
					echo $rank_primary_title;
				}
				;?>">
			</div>
		<?php 
		$math_sq_bg = "math_sq_bg";
		$math_circle_bg = "math_circle_bg";
		$math_band_bg = "math_band_bg";
		$math_label_bg = "math_label_bg";
		$overlay = "overlay";
		$clipping = "clipping";
		$circle = "circle";
		?>
		<h4 class="rank-prev">ランキングポップデザイン</h4>
		<p>ランキングポップのデザインを選択してください</p>
		<div class="rank-font-all-wrap">
			<div class="font-wrap">
			<div class="rank-font-1-wrap">
				<p class="rank-font-1">1</p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">四角背景</p>
					<input type="radio" name="rank_pop" value="math_sq_bg" 
						   <?php 
						   if($_POST['rank_pop'] == "" || $_POST['rank_pop'] == "math_sq_bg" ){
							   echo "checked";
						   }
						   elseif( $_POST['rank_pop'] == "" && $rank_pop == $math_sq_bg){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
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
					<input type="radio" name="rank_pop" value="math_circle_bg" 
						   <?php 
						   if($_POST['rank_pop'] == "math_circle_bg" ){
							   echo "checked";
						   }
						   elseif( $_POST['rank_pop'] == "" && $rank_pop == $math_circle_bg){
							   echo "checked";
						   }else{
							   echo "";
						   }
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
					<input type="radio" name="rank_pop" value="math_band_bg"
						   <?php 
						   if($_POST['rank_pop'] == "math_band_bg" ){
							   echo "checked";
						   }
						   elseif( $_POST['rank_pop'] == "" && $rank_pop == $math_band_bg){
							   echo "checked";
						   }else{
							   echo "";
						   }
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
					<input type="radio" name="rank_pop" value="math_label_bg"
						   <?php
						   if($_POST['rank_pop'] == "math_label_bg" ){
							   echo "checked";
						   } 
						   elseif( $_POST['rank_pop'] == "" && $rank_pop == $math_label_bg){
							   echo "checked" ;
						   }else{ 
							   echo "";}
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
					<input type="radio" name="rank_style" value="overlay"
						   <?php
						   if( $_POST['rank_style'] == "" || $_POST['rank_style'] == "overlay" ){
							   echo "checked";
						   }
						   elseif( $_POST['rank_style'] == "" && $rank_style == $overlay ){
							   echo "checked";
						   } else{
							   echo ""; 
						   }
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
					<input type="radio" name="rank_style" value="clipping" 
						   <?php 
						   if($_POST['rank_style'] == "clipping" ){ 
							   echo "checked";
						   }
						   elseif( $_POST['rank_style'] == "" && $rank_style == $clipping ){ 
							   echo "checked";
						   } else{
							   echo ""; }
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
					<input type="radio" name="rank_style" value="circle" 
						   <?php 
						   if( $_POST['rank_style'] == "circle" ){ 
							   echo "checked";
						   }
						   elseif( $_POST['rank_style'] == "" && $rank_style == $circle ){
							   echo "checked";
						   } else{
							   echo ""; }
						   ?>
						   >
				</div>
			</div><!--ranl-wrap-3-end-->
			
		</div><!--rank-item-all-wrap-end-->
	<h4 class="rank-prev">ランキングアイテム入力</h4>
　　　<p>ランキングアイテムの詳細を入力してください。</br>ランキングにラインナップできる最大アイテム数は6つです。</p>
		
		
		<div class="rank-item-detail-wrap">
			<?php 
			if( isset($_POST['item_img_url']) )
			{ 
				$url = $_POST['item_img_url']; 
			} else{ 
				$url = $item_url;
			}
			;?>
		<h4 class="rank-prev rank-prev-num">ランキング１位</h4>
			<?php
  			generate_upload_image_tag('item_img_url',  $url);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank1-item-title" class="img-setect-url" name="item_title" value=<?php if( isset($_POST['item_title']) ){ echo $_POST['item_title']; } else{ echo $item_name;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank-item-price"  class="img-setect-url" name="item_price" value=<?php if( isset($_POST['item_price']) ){ echo $_POST['item_price']; } else{ echo $item_price;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank-item-url" class="img-setect-url" name="item_page_link" value=<?php if( isset($_POST['item_page_link']) ){ echo $_POST['item_page_link']; } else{ echo $item_page_link;}?>>
				<div id="rank-notshow-overlay" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap1-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-1-show" type="radio" name="rank_on" value="rank_show_1"
						  <?php 
						  if($_POST['rank_on'] == "rank_show_1" || $_POST['rank_on'] == "" || $item_rank_on == "rank_show_1"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on'] == "" && $item_rank_on == "rank_show_1"){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>
						  >表示する</label>
			<label><input id="rank-1-notshow" type="radio" name="rank_on" value="rank_not_show_1"
						  <?php 
						  if( $_POST['rank_on'] == "rank_not_show_1"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on'] == "" && $item_rank_on == ""){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>>非表示にする</label>
		<div class="rank-item-detail-wrap">
			<?php 
			if( isset($_POST['item_img_url_2']) )
			{ 
				$url2 = $_POST['item_img_url_2']; 
			} else{ 
				$url2 = $item_url_2;
			}
			;?>
		<h4 class="rank-prev rank-prev-num">ランキング2位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_2',  $url2);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank2-item-title" class="img-setect-url" name="item_title_2" value=<?php if( isset($_POST['item_title_2']) ){ echo $_POST['item_title_2']; } else{ echo $item_name_2;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank2-item-price" class="img-setect-url" name="item_price_2" value=<?php if( isset($_POST['item_price_2']) ){ echo $_POST['item_price_2']; } else{ echo $item_price_2;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank2-item-url" class="img-setect-url" name="item_page_link_2" value=<?php if( isset($_POST['item_page_link_2']) ){ echo $_POST['item_page_link_2']; } else{ echo $item_page_link_2;}?>>
				<div id="rank-notshow-overlay-2" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap2-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-2-show" type="radio" name="rank_on_2" value="rank_show_2"
						  <?php 
						  if($_POST['rank_on_2'] == "rank_show_2" || $_POST['rank_on_2'] == "" || $item_rank_on_2 == "rank_show_2"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_2'] == "" && $item_rank_on_2 == "rank_show_2"){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>
						  >表示する</label>
			<label><input id="rank-2-notshow" type="radio" name="rank_on_2" value="rank_not_show_2"
						  <?php 
						  if( $_POST['rank_on_2'] == "rank_not_show_2"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_2'] == "" && $item_rank_on_2 == ""){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>>非表示にする</label>

		<div class="rank-item-detail-wrap">
			<?php 
			if( isset($_POST['item_img_url_3']) )
			{ 
				$url3= $_POST['item_img_url_3']; 
			} else{ 
				$url3 = $item_url_3;
			}
			;?>
		<h4 class="rank-prev rank-prev-num">ランキング3位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_3',  $url3);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank3-item-title" class="img-setect-url" name="item_title_3" value=<?php if( isset($_POST['item_title_3']) ){ echo $_POST['item_title_3']; } else{ echo $item_name_3;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank3-item-price" class="img-setect-url" name="item_price_3" value=<?php if( isset($_POST['item_price_3']) ){ echo $_POST['item_price_3']; } else{ echo $item_price_3;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank3-item-url" class="img-setect-url" name="item_page_link_3" value=<?php if( isset($_POST['item_page_link_3']) ){ echo $_POST['item_page_link_3']; } else{ echo $item_page_link_3;}?>>
			<div id="rank-notshow-overlay-3" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap3-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-3-show" type="radio" name="rank_on_3" value="rank_show_3"
						  <?php 
						  if($_POST['rank_on_3'] == "rank_show_3" || $_POST['rank_on_3'] == "" || $item_rank_on_3 == "rank_show_3"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_3'] == "" && $item_rank_on_3 == "rank_show_3"){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>
						  >表示する</label>
			<label><input id="rank-3-notshow" type="radio" name="rank_on_3" value="rank_not_show_3"
						  <?php 
						  if( $_POST['rank_on_3'] == "rank_not_show_3"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_3'] == "" && $item_rank_on_3 == ""){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>>非表示にする</label>


		<div class="rank-item-detail-wrap">
			<?php 
			if( isset($_POST['item_img_url_4']) )
			{ 
				$url4 = $_POST['item_img_url_4']; 
			} else{ 
				$url4 = $item_url_4;
			}
			;?>
		<h4 class="rank-prev rank-prev-num">ランキング4位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_4',  $url4);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank4-item-title" class="img-setect-url" name="item_title_4" value=<?php if( isset($_POST['item_title_4']) ){ echo $_POST['item_title_4']; } else{ echo $item_name_4;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank4-item-price" class="img-setect-url" name="item_price_4" value=<?php if( isset($_POST['item_price_4']) ){ echo $_POST['item_price_4']; } else{ echo $item_price_4;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank4-item-url" class="img-setect-url" name="item_page_link_4" value=<?php if( isset($_POST['item_page_link_4']) ){ echo $_POST['item_page_link_4']; } else{ echo $item_page_link_4;}?>>
			<div id="rank-notshow-overlay-4" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap4-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-4-show" type="radio" name="rank_on_4" value="rank_show_4"
						  <?php 
						  if($_POST['rank_on_4'] == "rank_show_4" || $_POST['rank_on_4'] == "" || $item_rank_on_4 == "rank_show_4"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_4'] == "" && $item_rank_on_4 == "rank_show_4"){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>
						  >表示する</label>
			<label><input id="rank-4-notshow" type="radio" name="rank_on_4" value="rank_not_show_4"
						  <?php 
						  if( $_POST['rank_on_4'] == "rank_not_show_4"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_4'] == "" && $item_rank_on_4 == ""){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>>非表示にする</label>


		<div class="rank-item-detail-wrap">
			<?php 
			if( isset($_POST['item_img_url_5']) )
			{ 
				$url5 = $_POST['item_img_url_5']; 
			} else{ 
				$url5 = $item_url_5;
			}
			;?>
		<h4 class="rank-prev rank-prev-num">ランキング5位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_5',  $url5);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank5-item-title" class="img-setect-url" name="item_title_5" value=<?php if( isset($_POST['item_title_5']) ){ echo $_POST['item_title_5']; } else{ echo $item_name_5;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank5-item-price" class="img-setect-url" name="item_price_5" value=<?php if( isset($_POST['item_price_5']) ){ echo $_POST['item_price_5']; } else{ echo $item_price_5;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank5-item-url" class="img-setect-url" name="item_page_link_5" value=<?php if( isset($_POST['item_page_link_5']) ){ echo $_POST['item_page_link_5']; } else{ echo $item_page_link_5;}?>>
			<div id="rank-notshow-overlay-5" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap5-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-5-show" type="radio" name="rank_on_5" value="rank_show_5"
						  <?php 
						  if($_POST['rank_on_5'] == "rank_show_5" || $_POST['rank_on_5'] == "" || $item_rank_on_5 == "rank_show_5"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_5'] == "" && $item_rank_on_5 == "rank_show_5"){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>
						  >表示する</label>
			<label><input id="rank-5-notshow" type="radio" name="rank_on_5" value="rank_not_show_5"
						  <?php 
						  if( $_POST['rank_on_5'] == "rank_not_show_5"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_5'] == "" && $item_rank_on_5 == ""){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>>非表示にする</label>


		<div class="rank-item-detail-wrap">
			<?php 
			if( isset($_POST['item_img_url_6']) )
			{ 
				$url6 = $_POST['item_img_url_6']; 
			} else{ 
				$url6 = $item_url_6;
			}
			;?>
		<h4 class="rank-prev rank-prev-num">ランキング6位</h4>
			<?php
  			generate_upload_image_tag('item_img_url_6',  $url6);
			?>
			<div class="inputWrap">
			<h4>商品名を入力してください。</h4>
			<input type="text" id="rank6-item-title" class="img-setect-url" name="item_title_6" value=<?php if( isset($_POST['item_title_6']) ){ echo $_POST['item_title_6']; } else{ echo $item_name_6;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" id="rank6-item-price" class="img-setect-url" name="item_price_6" value=<?php if( isset($_POST['item_price_6']) ){ echo $_POST['item_price_6']; } else{ echo $item_price_6;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" id="rank6-item-url" class="img-setect-url" name="item_page_link_6" value=<?php if( isset($_POST['item_page_link_6']) ){ echo $_POST['item_page_link_6']; } else{ echo $item_page_link_6;}?>>
			<div id="rank-notshow-overlay-6" class="rank-notinput-overlay">
					<p class="rank-notshow-p">ランキングを非表示にしています。</p>
					<p class="rank-notshow-p-sub">ランキングを入力、表示させるには下記のランキング表示切り替えで「表示する」をクリックして、入力をしてください。</p>
				</div>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap6-end-->
		<h4>ランキング表示切り替え</h4>
			<label><input id="rank-6-show" type="radio" name="rank_on_6" value="rank_show_6"
						  <?php 
						  if($_POST['rank_on_6'] == "rank_show_6" || $_POST['rank_on_6'] == "" || $item_rank_on_6 == "rank_show_6"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_6'] == "" && $item_rank_on_6 == "rank_show_6"){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>
						  >表示する</label>
			<label><input id="rank-6-notshow" type="radio" name="rank_on_6" value="rank_not_show_6"
						  <?php 
						  if( $_POST['rank_on_6'] == "rank_not_show_6"){
							  echo "checked";
						  }
						  elseif( $_POST['rank_on_6'] == "" && $item_rank_on_6 == ""){
							   echo "checked";
						   }else{ 
							   echo "";
						   }
						  ?>>非表示にする</label>
		
		
	</div><!--inputForm-end-->
	<button type="button" id="rankingCloseBtn" onClick="closeFile(this)">閉じる</button>
</div>