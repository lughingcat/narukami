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
            <p class="setting_description">サブフッターを設定すると、メニュー一覧ページ、個別商品ページに自動で差し込まれます。メニュー内でユーザー回遊が起こりやすく、サイト滞在時間が伸びますので設定する事を推奨します。</p>
			  <p class="prev-adm">プレビュー</p>
				<div class="sub_footer_prev">
					<?php get_template_part('subfooter');?>
				</div>
			  	<h2>サブフッターのタイトルとリンク先URLを記載してください。</h2>
			     <div class="all_form_wrap">
			  		<div class="text_form_wrap">
						<p class="form_title">タイトル</p>
						<div id="app">
									<article v-if="active"　key="1"><button type="button" class="btn btn-success btn-sm" v-on:click="reactive(); moveON(); BgSwich();">移動可能</button></article>
									<article v-else key="2"><button type="button" class="btn btn-dark btn-sm" v-on:click="reactive(); moveON(); BgSwich();">移動ロック</button></article>
							<article class="crudWrap" v-bind:class="{BgSwich: isBgSwich}">
							<table class="subfootersTablewrap">
								<tbody is="transition-group" name="card" class="aaa">	
								<tr
									v-for="(subfooter, index) in subfooters" 
									:key="subfooter.id" 
									v-bind:draggable="active"
  									@dragstart="dragList($event, index)"
									@drop="dropList($event, index)"
 									@dragover.prevent
 									@dragenter.prevent
									>
									<td v-if="active"><button type="button" class="btn btn-outline-success　btn-sm"><i class="fa-solid fa-up-down-left-right" v-bind:class="{moveOn: ismoveOn}"></i></button></td>
									<td v-else><button type="button" class="btn btn-outline-dark　btn-sm"><i class="fa-solid fa-lock"></i></button></td>
									<td><input type="text" class="subfootersForm" name="sub_footer_text[]" v-model="subfooter.text"></td>
									<td><input type="url" class="subfootersForm" name="sub_footer_url[]" v-model="subfooter.url"></td>
									<td><button type="button" class="btn btn-danger btn-sm" v-on:click="del(index)">削除</button></td>
								</tr>
								</tbody>
							</table>
							</article>
							<div class="subfootersBtnAllWrap">
								<button class="btn btn-primary btn-sm">公開</button>
								<button type="button" class="btn btn-outline-success btn-sm" v-on:click="add()">追加＋</button>
								<button type="button" class="btn btn-outline-danger btn-sm" v-on:click="delall(index)">一括削除</button>
								<button　type="button" class="btn btn-outline-secondary btn-sm" v-on:click="tempSave">ローカルへ保存</button>
							</div>
							
							
							<button type="button" v-on:click="addform()">Add</button>
							 <ul is="transition-group" name="card">
							    <li class="card" v-for="item in items" :key="item.id">Id: {{ item.id }}</li>  
							 </ul>
							
							
						</div><!--appEnd-->
					</div>
			  	</div>
			  </div><!--mainEnd-->
			  <div class="color-bg-box">
				  <?php 
				  genelate_color_picker_tag_demo(
                    'bgcolor', 
                    get_option('bgcolor'), 
                    'サブフッターの背景色を選択してください。'
                  );
                  ?>
				  <?php 
				  genelate_color_picker_tag_demo(
                    'textcolor', 
                    get_option('textcolor'), 
                    'テキストの文字色を選択してください。'
                  );
                  ?>
				  
				  <div id="app2">
					  
				</div>
		  </div>
          </div> 
        </div>
      </div>
	<?php submit_button(); ?>
	</form>
</div>
		
		
		<?php 
            $textname = get_option('sub_footer_text');
			var_dump($textname);
        ?><br>
		<?php 
            $urlname = get_option('sub_footer_url');
			var_dump($urlname);
        ?>
