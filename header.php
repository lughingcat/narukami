<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package narukami
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://unpkg.com/vue@next"></script>
	<?php wp_head(); ?>
</head>
	
<?php 
//変数初期設定
$defult_notfound_img_head = get_template_directory_uri() . '/admin-img/samp-2400-1400.jpg';
	
$notfoundpage_bg_type = sanitize_option_value(get_option('page404bg-type', 'main-bg-img'));
$notfound_original_img = sanitize_option_value(get_option('notfoundpage-bg-img', $defult_notfound_img_head));
$narukami_font_family = sanitize_option_value(get_option('narukami-font-family', 'Sawarabi Gothic'));
$i_background_image = sanitize_option_value(get_option('background_image'));
$i_background_image_custom_option = get_background_image();
	//404ページBG分岐
	if($notfoundpage_bg_type === "main-bg-img"){
		$notfound_img = $i_background_image;
	}elseif($notfoundpage_bg_type === "original404-bg-img"){
		$notfound_img = $notfound_original_img;
	}
	//bg select トップページとシングルページと404
	if(is_singular('product_lp_page')){
		$bg_img_url = get_post_meta(get_the_ID(), 'background_image', true);
	}elseif(is_404()){
		$bg_img_url = $notfound_img;
	}elseif($i_background_image){
		$bg_img_url = $i_background_image;
	}else{
		$bg_img_url = $i_background_image_custom_option;
	}
	
?>
	
<style>
	body{
		font-family: <?php echo $narukami_font_family; ?>;
		position: relative;
		background-image: url(<?php echo $bg_img_url; ?>);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
		background-attachment: fixed;
	}
</style>
<body>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'narukami_all_theme_item' ); ?></a>

	<header id="masthead" class="site-header">
		<?php 
		$i_header_display_setting = sanitize_text_field(get_option('header-disp-set'));//ヘッダー表示設定
		if($i_header_display_setting === 'display_off' || is_singular('product_lp_page')){
			
		}elseif($i_header_display_setting === 'display_on'){
			include(get_template_directory() . '/TOP_PAGE_FILES/top_header_part.php');
		}
		include(get_template_directory() . '/TOP_PAGE_FILES/top_globalheader_part.php');
		?>
	</header><!-- #masthead -->
