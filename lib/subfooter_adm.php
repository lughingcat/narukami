<div id="back_wrap">
	<form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    settings_fields('custom-menu-group');
    do_settings_sections('custom-menu-group'); ?>

	<div class="metabox-holder">
      <div class="postbox bg">
        <h3 class='hndle'><span class="title">サブフッター設定</span></h3>
        <div class="inside">
          <div class="main">
            <p class="setting_description">サブフッターを設定をONにすると、商品一覧ページ、個別商品ページにページリンクが自動で差し込まれます。サイトへ訪れたお客様が、目的の商品を探しやすくなりますので設定する事をおすすめします。</p>
			  <div class="toggle-area">
			  <?php 
				  $subfootersSwich = get_option('subfSwich');
				  if(empty($subfootersSwich)){
				  }else{
					  $sbfResult = 'checked="checked"';
				  }
			  ?>
			  <input
      			type="checkbox"
      			id="subfooters-swich"
      			name="subfSwich"
				value="1"
			    <?php echo $sbfResult ;?>
			    >
   				<label for="subfooters-swich">サブフッター設定ON</label>
			 　 </div>
			     <div class="all_form_wrap">
			  		<div class="text_form_wrap">
						<div id="subfooters">
							<p class="subf-prev-title">PreVew</p>
							<div class="subf-prev-bg">
								<ul class="subf-prev-wrap" style="background-color: <?php echo get_option('bgcolor'); ?>;">
									<li v-for="(subfooter,index) in subfooters" class="subf-prev-list">
										<a :href="subfooter.url" style="color: <?php echo get_option('textcolor'); ?>;" >{{subfooter.text}}</a>
								    </li>
								</ul>
							</div>
							<h2 class="narukami-admin-h2">サブフッターのタイトルとリンク先URLを記載してください。</h2>
									<article v-if="active"　key="1"><button type="button" class="btn btn-success btn-sm" v-on:click="reactive(); moveON(); BgSwich();">並び替えON</button></article>
									<article v-else key="2"><button type="button" class="btn btn-dark btn-sm" v-on:click="reactive(); moveON(); BgSwich();">並び替えOFF</button></article>
							<article class="crudWrap" v-bind:class="{BgSwich: isBgSwich}">
							<table class="subfootersTablewrap" v-bind:class="{BgSwich: isBgSwich}">
								<p class="subfooterNumberdiscription">サブフッターに追加できる項目は最大６個です。現在数[{{subfooters.length}}個]</p>
								<thead>
									<tr>
									<th>移動制御</th>
									<th>タイトル</th>
									<th>URL</th>
									<th>消去</th>
									</tr>
									</thead>
								<tbody>
								<tr v-for="(subfooter,index) in subfooters" 
									:key="subfooter.id" 
									v-bind:draggable="active"
  									@dragstart="dragList($event, index)"
									@drop="dropList($event, index)"
 									@dragover.prevent
 									@dragenter.prevent
									>
									<td v-if="active"><button type="button" class="btn btn-outline-success　btn-sm"><i class="fa-solid fa-up-down-left-right" v-bind:class="{moveOn: ismoveOn}"></i></button></td>
									<td v-else><button type="button" class="btn btn-outline-dark　btn-sm"><i class="fa-solid fa-lock"></i></button></td>
									<td><input type="text" class="subfootersForm" name="sub_footer_text[]" v-model="subfooter.text" v-bind:placeholder="subfooterPlhText"></td>
									<td><input type="url" class="subfootersForm" name="sub_footer_url[]" v-model="subfooter.url" v-bind:placeholder="subfooterPlhUrl"></td>
									<td><button type="button" class="btn btn-danger btn-sm" v-on:click="del(index); changeBtnAdd();">削除</button></td>
								</tr>
								</tbody>
							</table>
							</article>
							<div class="subfootersBtnAllWrap">
								<button v-if="addActive" type="button" class="btn btn-secondary btn-sm" v-on:click="add();">最大数到達</button>
								<button v-else type="button" class="btn btn-outline-success btn-sm" v-on:click="add(); changeBtnAdd();">追加</button>
								<button type="button" class="btn btn-outline-danger btn-sm" v-on:click="delall(index); changeBtnAdd();">一括削除</button>
								<button　type="button" class="btn btn-primary btn-sm" v-on:click="tempSave">設定を保存</button>
							</div>
						</div><!--appEnd-->
					</div>
			  	</div>
			  </div><!--mainEnd-->
			  <p class="subf-colorBox-title">ColorSelect</p>
			  <div class="color-bg-box">
				  <div class="color-box-child">
				  <?php 
				  genelate_color_picker_tag_demo(
                    'bgcolor', 
                    get_option('bgcolor'), 
                    'サブフッターの背景色を選択してください。'
                  );
                  ?>
				  </div>
				  <div class="color-box-child">
				  <?php 
				  genelate_color_picker_tag_demo(
                    'textcolor', 
                    get_option('textcolor'), 
                    'テキストの文字色を選択してください。'
                  );
                  ?> 
				  </div>
		      </div><!--color-bg-boxEnd-->
			<div class="subfootersBtnAllWrap">
				<button class="btn btn-primary btn-sm">公開</button>
			</div>
          </div> 
        </div>
      </div>
	<div class="wp-submitAllBtn">
	<?php submit_button('全体をサイトへ反映'); ?>
	</div>
	</form>
</div>
