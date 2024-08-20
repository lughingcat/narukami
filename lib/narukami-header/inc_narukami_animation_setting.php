<?php
require_once(dirname(dirname(dirname(dirname(dirname(dirname( __FILE__ )))))) . '/wp-load.php' );
global $wpdb;
//sample hero header
$i_heroheader_stillImg = sanitize_option_value(get_option('hero-H-stillImg'));
$i_loading_anime_type = sanitize_option_value(get_option('loading-anime-type'));
$i_open_bgimgurl = sanitize_option_value(get_option('open-bg-imgurl'));
$i_open_rogoimgurl = sanitize_option_value(get_option('open-rogo-imgurl'));
$i_loadingtext_color = sanitize_option_value(get_option('loadingtext-color'));
if(isset($i_loading_anime_type)){
	if($i_loading_anime_type === "stretch-shrink-right"){
		$stretch_check = "checked";
		$stretch_curtain = "";
		$stretch_circle = "";
		$stretch_none = "";
	}elseif($i_loading_anime_type === "stretch-shrink-curtain"){
		$stretch_check = "";
		$stretch_curtain = "checked";
		$stretch_circle = "";
		$stretch_none = "";
	}elseif($i_loading_anime_type === "expand-circle"){
		$stretch_check = "";
		$stretch_curtain = "";
		$stretch_circle = "checked";
		$stretch_none = "";
	}elseif($i_loading_anime_type === "loading-anime-not-use"){
		$stretch_check = "";
		$stretch_curtain = "";
		$stretch_circle = "";
		$stretch_none = "checked";
	}
}else{
	$stretch_check = "";
	$stretch_curtain = "";
	$stretch_circle = "";
	$stretch_none = "";
}
?>
<div id="animetion_setting_wrap" class="narukami_animetion_setting_wrap">
	<div class="animetion-all-wrap">
		<div class="anime-set-prevew-wrap" style="background-image: url('<?php echo $i_heroheader_stillImg; ?>');">

			<p>HERO HEADER IMG & TEXT</p>
		</div>
		<div class="animetion-prewrap" style="background-image: url('<?php echo $i_open_bgimgurl; ?>');">
			<p class="loadwrap-rogo">
				<img src="<?php echo $i_open_rogoimgurl; ?>" alt="ROGO">
			</p>
			<p class="loading-text" style="color: <?php echo $i_loadingtext_color; ?>;">Loding...</p>
		</div>
	</div>
	<div class="inputForm">
		<h4>ローディングアニメーションのパターンを選択してください。</h4>
		<div class="prevew-btn-wrap">
			<div class="loading-anime-item-wrap">
				<button id="right-to-left-btn" class="load-anime-prevew-btn" type="button">Prevew</button>
				<label class="loading-anime-label"><input type="radio" name="ladinganime-type" value="stretch-shrink-right" <?php echo $stretch_check; ?>>右スライド</label>
			</div>
			<div class="loading-anime-item-wrap">
				<button id="curtain-btn" class="load-anime-prevew-btn" type="button">Prevew</button>
				<label class="loading-anime-label"><input type="radio" name="ladinganime-type" value="stretch-shrink-curtain" <?php echo $stretch_curtain; ?>>カーテン</label>
			</div>
			<div class="loading-anime-item-wrap">
				<button id="circle-open-btn" class="load-anime-prevew-btn" type="button">Prevew</button>
				<label class="loading-anime-label"><input type="radio" name="ladinganime-type" value="expand-circle" <?php echo $stretch_circle; ?>>サークル</label>
			</div>
			<div class="loading-anime-item-wrap">
				<button id="not-use-btn" class="load-anime-prevew-btn not-use-btn" type="button">NOT USE</button>
				<label class="loading-anime-label"><input type="radio" name="ladinganime-type" value="loading-anime-not-use" <?php echo $stretch_none; ?>>使用しない。</label>
			</div>
		</div>
		<h4>オーバーラップデザインを選択してください。</h4>
		<div>
			<p>オーバーラップさせる背景画像を選択してください。</p>
			<?php
  			generate_upload_image_single_tag('open-bg-img-url', $i_open_bgimgurl);
			?>
			<p>オープニングロゴを選択してください。</p>
			<?php
  			generate_upload_image_single_tag('open-rogo-img-url', $i_open_rogoimgurl);
			?>
			<p>loading...文字色選択を選択してください。</p>
			<div class="loadtext-color-wrap">
				<div class="color-box-child">
				<?php 
				genelate_color_picker_tag_demo(
        	  	'loadingtext-color', 
        	  	$i_loadingtext_color,
        	  	'「loading...」文字色'
        		);
				?> 
				</div>
			</div>
		</div>
	</div><!--inputform-end-->
</div><!--all-wrap-end-->