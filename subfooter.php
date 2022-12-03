<?php
/**
 * サブフッターファイル
 *
 * 個別商品テンプレートと商品一覧テンプレートで呼び出して使用します。
 *
 * 
 *
 * 
 */

?>
	<div class="sub_footer_bg" style="background-color: <?php echo get_option('bgcolor'); ?>;">
		<ul class="sub_footer_main">
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('url'); ?>"><?php echo get_option('text'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('url2'); ?>"><?php echo get_option('text2'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('url3'); ?>"><?php echo get_option('text3'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('url4'); ?>"><?php echo get_option('text4'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('url5'); ?>"><?php echo get_option('text5'); ?></a></li>
		</ul>	
	</div>

