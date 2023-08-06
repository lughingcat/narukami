<div id="cmaker_1item_column_wrap" class="cmakerWrap">
	<div class="item_1column_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT 
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
			  s_cmaker
			  FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $id = $row->id;
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
				 $select_box = $row->s_cmaker; 
			  };
			  ?>
		<div class="circle">
			<div class="rank-pop">1</div>
			<img src="<?php if( isset($_POST['item_img_url']) ){ echo $_POST['item_img_url']; } else{ echo $item_url;}?>" width="200px" height="200px">
			<p><?php if( isset($_POST['item_title']) ){ echo $_POST['item_title']; } else{ echo $item_name;}?></p>
			<p><?php if( isset($_POST['item_price']) ){ echo $_POST['item_price']; } else{ echo $item_price;}?>円</p>
		</div>
		</article>
	</div>
	<div class="inputForm">
		<h3>おすすめ商品ランキング</h3>
		<p>おすすめ商品をランキングで訴求できます。</p>
			<div class="rank-p-title-wrap">
			<h4 class="rank-prev">ランキングタイトル</h4>
			<p>ランキングタイトルを入力してください</p>
			<input type="text" class="rank-primary-title" name="rank_primary-title">
			</div>
		<h4 class="rank-prev">ランキング背景デザイン</h4>
		<p>ランキング背景のデザインを選択してください</p>
		<div class="rank-font-all-wrap">
			<div class="font-wrap">
			<div class="rank-font-1-wrap">
				<p class="rank-font-1">1</p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">四角背景</p>
					<input type="radio" name="rank_font" value="math_sq_bg">
				</div>
			</div><!--font-wrap-end-->
			
			<div class="font-wrap-2">
			<div class="rank-font-2-wrap">
				<p class="rank-font-2">1</p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">丸背景</p>
					<input type="radio" name="rank_font" value="math_circle_bg">
				</div>
			</div><!--font-wrap-2-end-->
			
			<div class="font-wrap-3">
			<div class="rank-font-3-wrap">
				<p class="rank-font-3"><span>1</span></p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">縦帯背景</p>
					<input type="radio" name="rank_font" value="math_band_bg">
				</div>
			</div><!--font-wrap-3-end-->
			
			
			<div class="font-wrap-4">
			<div class="rank-font-4-wrap">
				<p class="rank-font-4"><span>1</span></p>
			</div><!--rank-font-1-wrap-end-->
				<div class="font-setting">
					<p class="font-title">ラベル背景</p>
					<input type="radio" name="rank_font" value="math_label_bg">
				</div>
			</div><!--font-wrap-4-end-->
			
			
		</div><!--rank-font-all-wrap-end-->
		
		
		<h4 class="rank-prev">ランキングデザイン</h4>
		<p>ランキングデザインを選択してください</p>
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
					<input type="radio" name="rank_style" value="overlay">
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
					<input type="radio" name="rank_style" value="clipping">
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
					<input type="radio" name="rank_style" value="circle">
				</div>
			</div><!--ranl-wrap-3-end-->
			
		</div><!--rank-item-all-wrap-end-->
	<h4 class="rank-prev">ランキングアイテム入力</h4>
　　　<p>ランキングアイテムの詳細を入力してください。</br>ランキングにラインナップできる最大アイテム数は5つです。</p>
		
		
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
			<input type="text" class="img-setect-url" name="item_title" value=<?php if( isset($_POST['item_title']) ){ echo $_POST['item_title']; } else{ echo $item_name;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" class="img-setect-url" name="item_price" value=<?php if( isset($_POST['item_price']) ){ echo $_POST['item_price']; } else{ echo $item_price;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" class="img-setect-url" name="item_page_link" value=<?php if( isset($_POST['item_page_link']) ){ echo $_POST['item_page_link']; } else{ echo $item_page_link;}?>>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap1-end-->
		
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
			<input type="text" class="img-setect-url" name="item_title_2" value=<?php if( isset($_POST['item_title_2']) ){ echo $_POST['item_title_2']; } else{ echo $item_name_2;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" class="img-setect-url" name="item_price_2" value=<?php if( isset($_POST['item_price_2']) ){ echo $_POST['item_price_2']; } else{ echo $item_price_2;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" class="img-setect-url" name="item_page_link_2" value=<?php if( isset($_POST['item_page_link_2']) ){ echo $_POST['item_page_link_2']; } else{ echo $item_page_link_2;}?>>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap2-end-->


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
			<input type="text" class="img-setect-url" name="item_title_3" value=<?php if( isset($_POST['item_title_3']) ){ echo $_POST['item_title_3']; } else{ echo $item_name_3;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" class="img-setect-url" name="item_price_3" value=<?php if( isset($_POST['item_price_3']) ){ echo $_POST['item_price_3']; } else{ echo $item_price_3;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" class="img-setect-url" name="item_page_link_3" value=<?php if( isset($_POST['item_page_link_3']) ){ echo $_POST['item_page_link_3']; } else{ echo $item_page_link_3;}?>>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap3-end-->


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
			<input type="text" class="img-setect-url" name="item_title_4" value=<?php if( isset($_POST['item_title_4']) ){ echo $_POST['item_title_4']; } else{ echo $item_name_4;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" class="img-setect-url" name="item_price_4" value=<?php if( isset($_POST['item_price_4']) ){ echo $_POST['item_price_4']; } else{ echo $item_price_4;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" class="img-setect-url" name="item_page_link_4" value=<?php if( isset($_POST['item_page_link_4']) ){ echo $_POST['item_page_link_4']; } else{ echo $item_page_link_4;}?>>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap4-end-->


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
			<input type="text" class="img-setect-url" name="item_title_5" value=<?php if( isset($_POST['item_title_5']) ){ echo $_POST['item_title_5']; } else{ echo $item_name_5;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" class="img-setect-url" name="item_price_5" value=<?php if( isset($_POST['item_price_5']) ){ echo $_POST['item_price_5']; } else{ echo $item_price_5;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" class="img-setect-url" name="item_page_link_5" value=<?php if( isset($_POST['item_page_link_5']) ){ echo $_POST['item_page_link_5']; } else{ echo $item_page_link_5;}?>>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap5-end-->


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
			<input type="text" class="img-setect-url" name="item_title_6" value=<?php if( isset($_POST['item_title_6']) ){ echo $_POST['item_title_6']; } else{ echo $item_name_6;}?>>
			<h4>商品価格を入力してください。（※半角英数で数字のみ記載してください。）</h4>
			<input type="text" class="img-setect-url" name="item_price_6" value=<?php if( isset($_POST['item_price_6']) ){ echo $_POST['item_price_6']; } else{ echo $item_price_6;}?>>
			<h4>詳細ページリンクURL</h4>
			<input type="text" class="img-setect-url" name="item_page_link_6" value=<?php if( isset($_POST['item_page_link_6']) ){ echo $_POST['item_page_link_6']; } else{ echo $item_page_link_6;}?>>
			</div><!--inputWrap-end-->
		</div><!--rank-item-detail-wrap6-end-->
		
		
	</div><!--inputForm-end-->
	<button type="button" id="1columnCloseBtn">閉じる</button>
</div>