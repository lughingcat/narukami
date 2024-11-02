<?php
get_header(); ?>
<div class="product-lp-page-content"
	 style="max-width: 100vw; margin: 0; padding: 0;">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="content"
				 style="width: 100vw; padding: 0;">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
    else : ?>
        <p>このテストページが見つかりませんでした。</p>
    <?php endif; ?>
</div>
<?php
get_footer(); ?>
