<?php

/*
*ブロックエディタ拡張 render block
*/

//hタグに見出しを出力
function render_narukami_heading_block( $block_content, $block ) {
    // 'core/heading' ブロックのみ対象にする
    if ( 'core/heading' === $block['blockName'] ) {
		error_log(print_r($block, true));
		if ( isset( $block['attrs']['narukami_subtitleAlignment'] ) && ! empty( $block['attrs']['narukami_subtitleAlignment'] ) ) {
        	$alignment = esc_attr( $block['attrs']['narukami_subtitleAlignment'] );
		} else {
        	// デフォルト値（例えば左揃え）を設定する
        	$alignment = '';
    	}
        // 属性を確認してサブタイトルを取得
        if ( isset( $block['attrs']['narukami_subtitle'] ) 
    		&& ! empty( $block['attrs']['narukami_subtitle'] ) 
    		&& isset( $block['attrs']['className'] )
    		&& strpos( $block['attrs']['className'], 'narukami-hedding-style1' ) !== false ) {
            // サブタイトルのHTMLを作成
            $subtitle = '<p class="wp-block-heading narukami-subtitle" style="text-align: ' . $alignment . ';">' . esc_html( $block['attrs']['narukami_subtitle'] ) . '</p>';

            // 見出しの後ろにサブタイトルを追加
            $block_content .= $subtitle;
			
        }elseif( isset( $block['attrs']['narukami_subtitle'] ) 
    		&& ! empty( $block['attrs']['narukami_subtitle'] ) 
    		&& isset( $block['attrs']['className'] )
			
    		&& strpos( $block['attrs']['className'], 'narukami-hedding-style2' ) !== false){
			
			$subtitle = '<p class="wp-block-heading narukami-subtitle2" style="text-align: ' . $alignment . ';">' . esc_html( $block['attrs']['narukami_subtitle'] ) . '</p>';
			$block_content .= $subtitle;
			
		}elseif( isset( $block['attrs']['narukami_subtitle'] ) 
    		&& ! empty( $block['attrs']['narukami_subtitle'] ) 
    		&& isset( $block['attrs']['className'] )
			&& isset( $block['attrs']['narukami_subtitleAlignment'] )
    		&& strpos( $block['attrs']['className'], 'narukami-hedding-style3' ) !== false){
			
			$subtitle = '<p class="wp-block-heading narukami-subtitle3" style="text-align: ' . $alignment . ';">' . esc_html( $block['attrs']['narukami_subtitle'] ) . '</p>';
			$block_content .= $subtitle;
			
		}
    }
    return $block_content;
}
add_filter( 'render_block', 'render_narukami_heading_block', 10, 2 );
//エディタパターン削除
remove_theme_support('core-block-patterns');

//product-lsit-page投稿ページにブロックをデフォルト挿入する

function insert_default_blocks_on_post_create($post_id, $post, $update) {
    // 新規投稿であることを確認（既存の投稿を更新している場合は無視）
    if ($update || $post->post_type !== 'product_list_page') {
        return;
    }
    
    // デフォルトのブロック構成を作成
    $default_blocks = '
	<!-- wp:heading {"level":2,"className":"narukami-hedding-style1","narukami_headingStyle":"narukami-hedding-style1","narukami_subtitle":"サブタイトル - 右の設定パネルから入力できます。 -","narukami_subtitleAlignment":""} -->
	<h2 class="narukami-hedding-style1">ページタイトルを入力してください。</h2>
	<!-- /wp:heading -->
	
	<!-- wp:itemlist-custom-block/image-slider-block {"sliderTitle":"期間限定商品、おすすめ商品など入力してください。","slides":[{"productImage":"","productTitle":"","productPrice":""}]} -->
           <div class="wp-block-itemlist-custom-block-image-slider-block slider-container">
           <h2 class="slider-title">期間限定商品、おすすめ商品など入力してください。</h2>
           <div class="narukami-product-slider">
           <div class="slide-items">
           <img src="" alt="Product Image"/>
           <h2 class="product-title"></h2>
           <p class="product-price"> 円</p>
           </div>
           </div>
           </div>
    <!-- /wp:itemlist-custom-block/image-slider-block -->
	
	<!-- wp:heading {"level":2,"className":"narukami-hedding-style2","narukami_headingStyle":"narukami-hedding-style2","narukami_subtitle":"サブタイトル - 右の設定パネルから入力できます。 -","narukami_subtitleAlignment":""} -->
	<h2 class="narukami-hedding-style2">ページタイトルを入力してください。</h2>
	<!-- /wp:heading -->
	
	<!-- wp:itemlist-custom-block/item-list-block {"itemList":[{"productImage":"","productTitle":"","productPrice":"","productLink":""}]} -->
            <div class="wp-block-itemlist-custom-block-item-list-block item-list-block">
                <a class="item-list" href="#" target="_blank" rel="noopener noreferrer" style="display:inline-block;text-decoration:none;">
                    <img src="" alt="Product Image"/>
                    <h2 class="product-title"></h2>
                    <p class="product-price"> 円</p>
                </a>
            </div>
    <!-- /wp:itemlist-custom-block/item-list-block -->
	';

    
    // 投稿の内容を更新
    wp_update_post(array(
        'ID'           => $post_id,
        'post_content' => $default_blocks,
    ));
}
add_action('wp_insert_post', 'insert_default_blocks_on_post_create', 10, 3);
?>