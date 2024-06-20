<div id="cmaker_store_info_wrap" class="cmakerWrapstore_info show-element notshow">
	<div class="store_info_Prevew">
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
				 }
			 } else {
				 $insertGlobalId = $insert_id_post;
				 if(preg_match('/([a-zA-Z]+)(\d+)/', $insertGlobalId, $matches)) {
					 $gm_numbers = $matches[2];
					 var_dump('ポスト送信orDB値:'. $gm_numbers);
				 }
			 }
			$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}narukami_content_maker WHERE insert_ids = %s", $insertGlobalId);
			$id_result = $wpdb->get_results($sql);
			
			if( empty($id_result) || $insert_id_post !== $insertGlobalId){
			  $query = "SELECT 
			  insert_ids,
			  store_info_title, 
			  store_name, 
			  store_info_bg_img_url,  
			  store_post_number, 
			  store_adress, 
			  store_phone_num, 
			  store_rg_holiday 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = 'insert_id_first'";
			}else{
			  $query = "SELECT 
			  insert_ids,
			  store_info_title, 
			  store_name, 
			  store_info_bg_img_url,  
			  store_post_number, 
			  store_adress, 
			  store_phone_num, 
			  store_rg_holiday 
			  FROM wp_narukami_content_maker
			  WHERE insert_ids = '" . $insertGlobalId . "'";
			}
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $store_info_title = $row->store_info_title;
				 $store_name = $row->store_name;
				 $store_info_bg_img_url = $row->store_info_bg_img_url;
				 $store_post_number = $row->store_post_number; 
				 $store_adress = $row->store_adress; 
				 $store_phone_num = $row->store_phone_num;
				 $store_rg_holiday = $row->store_rg_holiday;
				 $insert_id_array = $row->insert_ids;
			  };
			  ?>
			<?php
			//array-check
			$store_info_title_check = isset($_POST['store_info_title']) ? $_POST['store_info_title'] : "";
			$store_name_check = isset($_POST['store_name']) ? $_POST['store_name'] : "";
			$store_info_bg_img_url_check = isset($_POST['column_right_1_content']) ? $_POST['column_right_1_content'] : "";
			$store_post_number_check = isset($_POST['store_post_number']) ? $_POST['store_post_number'] : "";
			$store_adress_check = isset($_POST['store_adress']) ? $_POST['store_adress'] : "";
			$store_phone_num_check = isset($_POST['store_phone_num']) ? $_POST['store_phone_num'] : "";
			$store_rg_holiday_check = isset($_POST['store_rg_holiday']) ? $_POST['store_rg_holiday'] : "";

			//function-result
			$store_info_title_result = data_variable_set($store_info_title_check, $store_info_title, $gm_numbers);
			$store_name_result = data_variable_set($store_name_check, $store_name, $gm_numbers);
			$store_info_bg_img_url_result = data_variable_set_stripslashes($store_info_bg_img_url_check, $store_info_bg_img_url, $gm_numbers);
			$store_post_number_result = data_variable_set($store_post_number_check, $store_post_number, $gm_numbers);
			$store_adress_result = data_variable_set($store_adress_check, $store_adress, $gm_numbers);
			$store_phone_num_result = data_variable_set($store_phone_num_check, $store_phone_num, $gm_numbers);
			$store_rg_holiday_result = data_variable_set($store_rg_holiday_check, $store_rg_holiday, $gm_numbers);
			?>
			<div class="store-info-primary-title-prevew">
				<p class="store-info-p_title"><?php echo $store_info_title_result; ?></p>
			</div>
			<div class="store_info-all-wrap">
				<div class="store_info-text-wrap">
					<p class="adress-detail-title">店舗名</p>
					<p class="store_info-main-title"><?php echo $store_name_result; ?></p>
					<p class="adress-detail-title">郵便番号</p>
					<p class="store_info-main-title">〒<?php echo $store_post_number_result; ?></p>
					<p class="adress-detail-title">店舗住所</p>
					<p class="store_info-main-title"><?php echo $store_adress_result; ?></p>
					<p class="adress-detail-title">電話番号</p>
					<p class="store_info-main-title"><?php echo $store_phone_num_result; ?></p>
					<p class="adress-detail-title">定休日</p>
					<p class="store_info-main-title"><?php echo $store_rg_holiday_result; ?></p>
				</div>
				<div class="store_info-back-wrap">
					<?php echo $store_info_bg_img_url_result; ?>
				</div>
			</div>
		</article>
	</div>
	<div class="inputForm">
	<input type="hidden" name="array-num[<?php echo $gm_numbers; ?>]" value="<?php echo $gm_numbers; ?>">
	<h4>店舗情報のタイトルを入力してください</h4>
	<input type="text" name="store_info_title[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=<?php echo $store_info_title_result; ?>>
		
	<h4>店舗名を入力してください。</h4>
	<input type="text" name="store_name[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=<?php echo $store_name_result; ?>>
		
	<h4 class="h-admin-4-bg">GoogleMapの地図情報を入力してください</h4>
		<div class="map-discription">
		<p>※ GoogleMapの地図情報を取得する方法</p>
		<p>1, GoogleMapで店舗名を検索してください</p>
		<p>2, GoogleMap左上にある　<i class="fa-solid fa-bars"></i>　このアイコンをクリックし、「地図の共有または埋め込む」をクリックします。</p>
		<p>3, 「地図を埋め込む」のタブを選択し、「HTMLをコピー」をクリックして生成されたコードをコピーしてください。</p>
		<p>4, 3でコピーしたコードを以下のフォームへペーストしてください。</p>
		</div>
	<input type="text" name="store_info_bg_img_url[<?php echo $gm_numbers; ?>]" class="img-setect-url" value='<?php echo $store_info_bg_img_url_result; ?>'>
		
	<h4>郵便番号を入力してください</h4>
	<input type="text" name="store_post_number[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=<?php echo $store_post_number_result; ?>>
		
	<h4>住所を入力してください</h4>
	<input type="text" name="store_adress[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=<?php echo $store_adress_result; ?>>
		
	<h4>電話番号を入力してください</h4>
	<input type="text" name="store_phone_num[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=<?php echo $store_phone_num_result; ?>>
		
	<h4>定休日を入力してください</h4>
	<input type="text" name="store_rg_holiday[<?php echo $gm_numbers; ?>]" class="img-setect-url" value=<?php echo $store_rg_holiday_result; ?>>
	</div>
	<button type="button" id="store_infoCloseBtn" onClick="closeFile(this)">閉じる</button>
</div>