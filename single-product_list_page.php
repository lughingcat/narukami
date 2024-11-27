<?php
get_header(); ?>
<?php
$i_subfooter_use_notuse = sanitize_option_value(get_option('subfooter-use-notuse'));
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
$scroll_btn_value = sanitize_option_value(get_option('scroll-btn-active'));
$scroll_btn_bgcolor = sanitize_option_value(get_option('scroll-btn-bg-color'));
$scroll_btn_arrow_color = sanitize_option_value(get_option('scroll-btn-arrow-color'));
$arrow_type = sanitize_option_value(get_option('arrow-type'));
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
<?php
get_footer(); ?>
