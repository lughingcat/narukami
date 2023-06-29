

<div id="cmaker_wrap" class="cmakerWrap" style="display: none;">
	<div class="item_1column_Prevew">
		<article class="item_1colum_wrap">
			<?php
			  require_once(dirname(dirname(dirname(dirname(dirname( __FILE__ ))))) . '/wp-load.php' );
			  global $wpdb;
			  $query = "SELECT item_name,  item_price , id , item_img_url , s_cmaker FROM wp_narukami_content_maker;";
			  $rows = $wpdb->get_results($query);
			  foreach($rows as $row) {
				 $id = $row->id;
				 $item_name = $row->item_name; 
				 $item_price = $row->item_price; 
				 $item_url = $row->item_img_url; 
				 $select_box = $row->s_cmaker; 
			  };
			  ?>
			<img src="<?php if( !empty($_POST['item_img_url']) ){ echo $_POST['item_img_url']; } else{ echo $item_url;}?>" width="200px" height="200px">
			<p><?php if( !empty($_POST['item_title']) ){ echo $_POST['item_title']; } else{ echo $item_name;}?></p>
			<p><?php if( !empty($_POST['item_price']) ){ echo $_POST['item_price']; } else{ echo $item_price;}?>円</p>
		</article>
	</div>
	<div class="inputForm">
	<?php 
			if( !empty($_POST['item_img_url']) )
			{ 
				$url = $_POST['item_img_url']; 
			} else{ 
				$url = $item_url;
			}
	;?>
		
	<?php
  	generate_upload_image_tag('item_img_url',  $url);
	?>
	<input type="hidden" name="item_id">
	<input type="text" name="item_title" value="<?php if( !empty($_POST['item_title']) ){ echo $_POST['item_title']; } else{ echo $item_name;}?>">
	<input type="text" name="item_price" value="<?php if( !empty($_POST['item_price']) ){ echo $_POST['item_price']; } else{ echo $item_price;}?>">
	
	</div>
	<button type="button" id="selectCloseBtn">閉じる</button>
</div>