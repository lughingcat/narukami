<div id="cmaker_1item_column_wrap" class="cmakerWrap">
	<div class="item_1column_Prevew">
		<article class="cmakerPrevew">
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
		<h3>おすすめ商品ランキング</h3>
		<p>おすすめ商品をランキングで訴求できます。</p>
		<p>ランキングにラインナップできる最大アイテム数は5つです。</p>
	<?php 
			if( !empty($_POST['item_img_url']) )
			{ 
				$url = $_POST['item_img_url']; 
			} else{ 
				$url = $item_url;
			}
	;?>
		<h4>ランキング１位</h4>
	<?php
  	generate_upload_image_tag('item_img_url',  $url);
	?>
	<div class="inputWrap">
	<input type="hidden" name="item_id">
	<h4>商品名を入力してください。</h4>
	<input type="text" class="inputItem" name="item_title" value="<?php if( !empty($_POST['item_title']) ){ echo $_POST['item_title']; } else{ echo $item_name;}?>">
	<h4>商品価格を入力してください。</h4>
	<input type="text" class="inputItem" name="item_price" value="<?php if( !empty($_POST['item_price']) ){ echo $_POST['item_price']; } else{ echo $item_price;}?>">
	</div>
	</div>
	<button type="button" id="1columnCloseBtn">閉じる</button>
</div>