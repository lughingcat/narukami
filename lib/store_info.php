<div id="cmaker_store_info_wrap" class="cmakerWrapstore_info">
	<div class="store_info_Prevew">
		<article class="cmakerPrevew">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT store_name, store_info_bg_img_url,  store_post_number, store_adress, store_phone_num, store_rg_holiday  FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $store_name = $row->store_name;
				 $store_info_bg_img_url = $row->store_info_bg_img_url;
				 $store_post_number = $row->store_post_number; 
				 $store_adress = $row->store_adress; 
				 $store_phone_num = $row->store_phone_num;
				 $store_rg_holiday = $row->store_rg_holiday;
			  };
			  ?>
			<div class="store_info-all-wrap">
				<div class="store_info-text-wrap">
					<p class="adress-detail-title">店舗名</p>
					<p class="store_info-main-title"><?php if( isset( $_POST['store_name'])){ echo $_POST['store_name']; }elseif( !isset($_POST['store_name'])){ echo $store_name; };?></p>
					<p class="adress-detail-title">郵便番号</p>
					<p class="store_info-main-title">〒<?php if( isset( $_POST['store_post_number'])){ echo $_POST['store_post_number']; }elseif( !isset($_POST['store_post_number'])){ echo $store_post_number; };?></p>
					<p class="adress-detail-title">店舗住所</p>
					<p class="store_info-main-title"><?php if( isset( $_POST['store_adress'])){ echo nl2br($_POST['store_adress']); }elseif( !isset($_POST['store_adress'])){ echo nl2br($store_adress); };?></p>
					<p class="adress-detail-title">電話番号</p>
					<p class="store_info-main-title"><?php if( isset( $_POST['store_phone_num'])){ echo nl2br($_POST['store_phone_num']); }elseif( !isset($_POST['store_phone_num'])){ echo nl2br($store_phone_num); };?></p>
					<p class="adress-detail-title">定休日</p>
					<p class="store_info-main-title"><?php if( isset( $_POST['store_rg_holiday'])){ echo nl2br($_POST['store_rg_holiday']); }elseif( !isset($_POST['store_rg_holiday'])){ echo nl2br($store_rg_holiday); };?></p>
				</div>
				<div class="store_info-back-wrap">
					<?php 
					$test_post = $_POST['store_info_bg_img_url'];
					$test_esc_post = stripslashes($test_post);
					$test_esc_post_db = stripslashes($store_info_bg_img_url);
					;?>
					 <?php if( isset( $_POST['store_info_bg_img_url'])){ 
							echo nl2br($test_esc_post); 
						}elseif( !isset($_POST['store_info_bg_img_url']) ){ 
							echo nl2br($test_esc_post_db); 
						}
					 ;?>
					
				</div>
				
			</div>
		</article>
	</div>
	<div class="inputForm">
	<h4>店舗名を入力してください。</h4>
	<input type="text" name="store_name" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['store_name'])){
			   echo $_POST['store_name'];
		   }else{
			   echo $store_name;
		   }
			   ;?>
		   >
	<h4 class="h-admin-4-bg">GoogleMapの地図情報を入力してください</h4>
		<p>※GoogleMapの地図情報を取得する方法</p>
		<p>1,GoogleMapで店舗名を検索してください</p>
		<p>2,GoogleMap左上にある　<i class="fa-solid fa-bars"></i>　このアイコンをクリックし、「地図の共有または埋め込む」をクリックします。</p>
		<p>3,「地図を埋め込む」のタブを選択し、お好みのサイズを選択してから「HTMLをコピー」をクリックして生成されたコードをコピーしてください。</p>
		<p>4,3でコピーしたコードを以下のフォームへペーストしてください。</p>
		
	<input type="text" name="store_info_bg_img_url" class="img-setect-url" value='<?php
		   if( isset($_POST['store_info_bg_img_url'])){
			   echo $test_esc_post;
		   }else{
			   echo $test_esc_post_db;
		   }
			   ;?>'
		   >
	<h4>郵便番号を入力してください</h4>
	<input type="text" name="store_post_number" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['store_post_number'])){
			   echo $_POST['store_post_number'];
		   }else{
			   echo $store_post_number;
		   }
			   ;?>
		   >
	<h4>住所を入力してください</h4>
	<input type="text" name="store_adress" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['store_adress'])){
			   echo $_POST['store_adress'];
		   }else{
			   echo $store_adress;
		   }
			   ;?>
		   >
	<h4>電話番号を入力してください</h4>
	<input type="text" name="store_phone_num" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['store_phone_num'])){
			   echo $_POST['store_phone_num'];
		   }else{
			   echo $store_phone_num;
		   }
			   ;?>
		   >
	<h4>定休日を入力してください</h4>
	<input type="text" name="store_rg_holiday" class="img-setect-url" value=
		   <?php
		   if( isset($_POST['store_rg_holiday'])){
			   echo $_POST['store_rg_holiday'];
		   }else{
			   echo $store_rg_holiday;
		   }
			   ;?>
		   >
	</div>
	<button type="button" id="store_infoCloseBtn">閉じる</button>
</div>