

<div id="item_1column">
	<div class="item_1column_Prevew">
		<article class="item_1colum_wrap">
			<img src="" width="200px" height="200px">
		</article>
	</div>
	<div class="inputForm">
	<?php
  	generate_upload_image_tag('item_img_url', get_option('item_img_url'));
	?>
	<input type="hidden" name="item_id">
	<input type="text" name="item_title">
	<input type="text" name="item_price">
	</div>
</div>