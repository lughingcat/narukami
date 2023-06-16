

<div id="item_1column">
	<div class="item_1column_Prevew">
		<p>ここにプレビューがはりいます</p>
	</div>
	<div class="inputForm">
	<?php
  	generate_upload_image_tag('home_image_url', get_option('home_image_url'));
	?>
	<input type="text" name="item_title">
	<input type="text" name="item_price">
	</div>
</div>