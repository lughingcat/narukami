<div id="back_wrap">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">ヘッダー設定</span></h3>
        <div class="inside">
			<h2 class="narukami-admin-h2">トップページビルダー</h2>
			<form method="post" name="test" action="">
          <div class="main">
			  <?php 
			  $selectbox_item = '';
			  
			  $selectbox_item_list = array(
			  	"選択してください",
			  	"商品1カラム",
			  	"スライダー",
			  	"商品2カラム",
			  );
				if(isset($_POST['s_cmaker'])){
					$selectbox_item = $_POST['s_cmaker'];
				}
			  ?>
			  <select name="s_cmaker" class="cmaker-wrap" id="cmaker" onchange="cmakerChange()">
				  <?php 
				  foreach( $selectbox_item_list as $value){
					  if( $value === $selectbox_item ){
						  echo "<option value='$value' selected>".$value."</option>";
					  }else{
						  echo "<option value='$value'>".$value."</option>";
					  }
				  }
			  ?>
			  </select>
			  
			  <div id="cmakerChild" class="cmakerChildWrap">
				  <?php get_template_part('lib/item_1column'); ?>
				  <?php get_template_part('lib/slider'); ?>
			  </div>
			  <button type="submit" name="submit">送信</button>
			  </div><!--mainEnd-->
			</form>
			<?php get_template_part('lib/procces');?>
          </div> 
        </div>
      </div>
	<div class="wp-submitAllBtn">
	<?php submit_button('全体をサイトへ反映'); ?>
	</div>
</div>