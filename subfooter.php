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

	
<?php 
	$textname = get_option('sub_footer_text');
	$urlname = get_option('sub_footer_url');
?>

	<div class="sub_footer_bg" style="background-color: <?php echo get_option('bgcolor'); ?>;">
　		<ul class="sub_footer_main">
			<?php foreach( array_map( NULL, $textname, $urlname) as [ $textNameList, $urlNameList ]): ?>
				<li><a style="color: <?php echo get_option('textcolor'); ?>;" href="<?php echo $urlNameList; ?>"><?php echo $textNameList; ?></a></li>
    	    <?php endforeach; ?>
    	 </ul>
	</div>

