<?php
get_header(); ?>
<?php
$i_subfooter_use_notuse = sanitize_option_value(get_option('subfooter-use-notuse'));
if($i_subfooter_use_notuse === "subfooter-use"){
	include('lib/narukami-subfooter/subfooter.php');
}
?>
<div class="product-item-page-content">
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
get_footer(); ?>
