<?php
get_header(); ?>
<?php
$i_subfooter_use_notuse = sanitize_option_value(get_option('subfooter-use-notuse', 'subfooter-use'));
if($i_subfooter_use_notuse === "subfooter-use"){
	include('lib/narukami-subfooter/subfooter.php');
}
?>
<div class="product-list-page-content">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="content">
                <?php the_content(); ?>
				
            </div>
        <?php endwhile;
    else : ?>
        <p>このテストページが見つかりませんでした。</p>
    <?php endif; ?>
</div>
<?php 
$scroll_btn_value = sanitize_option_value(get_option('scroll-btn-active', 'scroll-on'));
$scroll_btn_bgcolor = sanitize_option_value(get_option('scroll-btn-bg-color', '#0086AD'));
$scroll_btn_arrow_color = sanitize_option_value(get_option('scroll-btn-arrow-color', '#ffffff'));
$arrow_type = sanitize_option_value(get_option('arrow-type', 'fas fa-chevron-up'));
	if($scroll_btn_value === "scroll-on" && $arrow_type === "fas fa-chevron-up" ){
		echo '<style>
		.fa-chevron-up::before {
    		color: ' . $scroll_btn_arrow_color . ';
			font-size: 1.2em;
		}
		</style>';
		echo '<button style="background-color: ' . $scroll_btn_bgcolor . ';" type="button" class="scroll-top-btn">' .
     '<i class="' . $arrow_type . '"></i>' .
     '</button>';
	}elseif( $scroll_btn_value === "scroll-on" && $arrow_type === "fas fa-arrow-up" ){
		echo '<style>
		.fa-arrow-up::before {
    		color: ' . $scroll_btn_arrow_color . ';
			font-size: 1.2em;
		}
		</style>';
		echo '<button style="background-color: ' . $scroll_btn_bgcolor . ';" type="button" class="scroll-top-btn">' .
     '<i class="' . $arrow_type . '"></i>' .
     '</button>';
	}elseif( $scroll_btn_value === "scroll-on" && $arrow_type === "fas fa-caret-up" ){
		echo '<style>
		.fa-caret-up::before {
    		color: ' . $scroll_btn_arrow_color . ';
			font-size: 1.5em;
		}
		</style>';
		echo '<button style="background-color: ' . $scroll_btn_bgcolor . ';" type="button" class="scroll-top-btn">' .
     '<i class="' . $arrow_type . '"></i>' .
     '</button>';
	}
?>
<?php 
	$call_btn_value = sanitize_option_value(get_option('call-btn-active', 'call-btn-on'));
	$call_btn_bgcolor = sanitize_option_value(get_option('call-btn-bg-color', '#0D6432'));
	$store_smartphone_number = filter_var(get_option('store-smartphone-number'), FILTER_SANITIZE_NUMBER_INT);
	if($call_btn_value === "call-btn-on"){
		echo '<a href="tel:' . $store_smartphone_number . '" class="store-call-btn">' .
     '<i style="color: ' . $call_btn_bgcolor . ';" class="fas fa-phone-square"></i>' .
     '</a>';
	}
?>
<?php
get_footer(); ?>
