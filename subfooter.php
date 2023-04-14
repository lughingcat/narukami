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
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('sub_footer_url'); ?>"><?php echo get_option('sub_footer_text'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('sub_footer_url'); ?>"><?php echo get_option('sub_footer_text'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('sub_footer_url'); ?>"><?php echo get_option('sub_footer_text'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('sub_footer_url'); ?>"><?php echo get_option('sub_footer_text'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('sub_footer_url'); ?>"><?php echo get_option('sub_footer_text'); ?></a></li>
			<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo get_option('sub_footer_url'); ?>"><?php echo get_option('sub_footer_text'); ?></a></li>
		</ul>	
	</div>



		<?php 
            $textname = get_option('sub_footer_text');
            $urlname = get_option('sub_footer_url');
			foreach( array_map( NULL, $textname, $urlname) as [ $textNameList, $urlNameList ])
				print $textNameList."<br>".$urlNameList;
        ?>