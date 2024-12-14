<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package narukami
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php
		//コンテンツ
		$i_page404_title = sanitize_option_value(get_option('page404-title', 'お探しのページが見つかりません。'));
		$i_page404_title_color = sanitize_option_value(get_option('notfound-text-color', '#ffffff'));
		$i_page404_title_shadow = sanitize_option_value(get_option('notfound-text-shadow','#000'));
		$template_slug = get_page_template_slug();
		var_dump($template_slug);
		//check is shadow type
		if(empty($i_page404_title_shadow)){
			$notfound_text_shadow_value = "";
		}else{
			$notfound_text_shadow_value = "1px 1px 35px" . $i_page404_title_shadow;
		}
		?>
		<style>
		.notfound-title{
			color: <?php echo $i_page404_title_color; ?>;
			text-shadow: <?php echo $notfound_text_shadow_value; ?>;
		}
		</style>
		<div class="notfound_all_wrap">
			<p class="notfound-title"><?php echo $i_page404_title?></p>
			<a class="notfound-title notfound-linktext" href="<?php echo home_url(); ?>">ホームに戻る。</a>
			<?php var_dump($template_slug);?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
