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
$narukami_font_family = sanitize_option_value(get_option('narukami-font-family'));
$i_background_image = sanitize_option_value(get_option('background_image'));
$i_background_image_custom_option = get_background_image();
	//bg select
	if($i_background_image){
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
		height: 100vh;
	}
</style>
<body>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'narukami_all_theme_item' ); ?></a>

	<header id="masthead" class="site-header">
		<?php 
		$i_header_display_setting = sanitize_text_field(get_option('header-disp-set'));//ヘッダー表示設定
		if($i_header_display_setting === 'display_on'){
			include(get_template_directory() . '/TOP_PAGE_FILES/top_header_part.php');
		}
		?>
	</header><!-- #masthead -->
