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
            <p class="setting_description">サブフッターを設定すると、メニュー一覧ページ、個別商品ページに自動で差し込まれます。メニュー内でユーザー回遊が起こりやすく、サイト滞在時間が伸びますので設定する事を推奨します。</p></form>　
			  <p class="prev-adm">プレビュー</p>
				<div class="sub_footer_prev">
					<?php get_template_part('subfooter');?>
				</div>
			  	<h4>サブフッターのタイトルとリンク先URLを記載してください。</h4>
			     <div class="all_form_wrap">
			  		<div class="text_form_wrap">
						<p class="form_title">タイトル</p>
						<?php 
					    $nameList = get_option('sub_footer_text');
						foreach($nameList as $name){
							echo $name;
						}
					    ?>
						
						<div id="app">
							<table>
								<tr 
									v-for="(subfooter, index) in subfooters" 
									draggable
									v-bind:key="subfooter.id" 
  									@dragstart="dragList($event, index)"
									@drop="dropList($event, index)"
 									@dragover.prevent
 									@dragenter.prevent
									>
									<td><input type="text" name="sub_footer_text[]" v-model="subfooter.text" value="初期値"></td>
									<td><input type="url" name="sub_footer_url[]" value="初期値を指定" v-model="subfooter.url"></td>
									<td><button type="button" v-on:click="del(index)">削除</button></td>
									<td><button type="button">移動</button></td>
								</tr>
							</table>
							<p>{{subfooters.length}}</p>
								<button type="button" v-on:click="add">追加</button>
								<button type="button" v-on:click="delall(index)">一括削除</button>
								<button>保存</button>
						</div>
						
						<div id="app2">
						  <p>
						    My name is <input v-model="name">
						    and I am <input v-model="age"> years old.
						  </p>
						  <p>
						    <button type="button" @click="persist">Save</button>
						  </p>
						</div>
						</div>
						
			  		</div>
			         
			           <div id="drag" class="container">
						  <draggable :list="items" class="dragarea">
  						    <div v-for="item in items" class="item">
  						      {{item.text}}
  						    </div>
  						   </draggable>
						</div>
			
			
			        <div class="url_form_wrap">
						<p class="form_title">URL</p>
			        </div>
			     </div>
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
			  </div
          </div> 
        </div>
      </div>
	</div>
	<?php submit_button(); ?>
		</form>
		
		
		<?php 
            $textname = get_option('sub_footer_text');
			var_dump($textname);
        ?><br>
		<?php 
            $urlname = get_option('sub_footer_url');
			var_dump($urlname);
        ?>
	
</div>
