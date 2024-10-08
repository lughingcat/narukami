<?php
//静止画変数
$i_heroheader_stillImg = sanitize_option_value($_POST['hh-still-img']);
$i_heroheader_stillTitle = sanitize_option_value($_POST['hh-still-title']);
$i_hh_still_title_color = sanitize_option_value($_POST['hh-titleTextColor']);
$i_hh_still_shadow_color = sanitize_option_value($_POST['hh-titleShadowColor']);
$animetion_type = sanitize_option_value($_POST['ladinganime-type']);
$i_open_bgimgurl = sanitize_option_value($_POST['open-bg-img-url']);
$i_open_rogoimgurl = sanitize_option_value($_POST['open-rogo-img-url']);
$i_loadingtext_color = sanitize_option_value($_POST['loadingtext-color']);
?>
<div class="heroheader-prevew-all-wrap">
	<div class="heroheader-back-wrap">
		<div class="heroheader-rogo-wrap"
			 style="background-image: url('<?php echo $i_heroheader_stillImg; ?>');">
				<div class="heroheader-title-wrap">
					<p class="heroheader-title" 
					   style="color: <?php echo $i_hh_still_title_color; ?>; text-shadow: 1px 1px 10px <?php echo $i_hh_still_shadow_color; ?>;">
						<?php echo $i_heroheader_stillTitle; ?>
					</p>
				</div>
		</div>
		<div class="animetion-prewrap" style="background-image: url('<?php echo $i_open_bgimgurl; ?>');">
			<p class="loadwrap-rogo">
				<img src="<?php echo $i_open_rogoimgurl; ?>" alt="ROGO">
			</p>
			<p class="loading-text" style="color: <?php echo $i_loadingtext_color; ?>;">Loding...</p>
		</div>
	</div><!--heroheader-back-wrap-end-->
</div><!--heroheader-prevew-all-wrap-end-->

<script>
document.addEventListener('DOMContentLoaded', function(){
	var overWrapElement = document.querySelector('.animetion-prewrap');
	var animationStyle = '<?php echo $animetion_type; ?>';
	overWrapElement.classList.add(animationStyle);
	if(animationStyle === 'loading-anime-not-use'){
		
	}else{
		bgPreviewOpacty();
		bgTitleHopup();
	}
	loadingTextControl();
	popupRogoPreviewControl();
});
//bg透明度コントロール
function bgPreviewOpacty(){
	var bgContainer = document.querySelector('.heroheader-rogo-wrap');
	bgContainer.classList.add('bg-opacity-value');
}
//bgタイトルホップアップ
function bgTitleHopup(){
	var bgTitle = document.querySelector('.heroheader-title');
	bgTitle.classList.add('hopup-animation');
}
//loading...アニメーション制御
function loadingTextControl(){
	var loadingAnimeContainer = document.querySelector('.loading-text');
	loadingAnimeContainer.classList.add('loading-anime');
}
//rogo出現アニメーション制御
function popupRogoPreviewControl(){
	var popupRogoContainer = document.querySelector('.loadwrap-rogo');
	popupRogoContainer.classList.add('popup-rogo');
}
</script>