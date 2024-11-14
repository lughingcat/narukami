const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck, InspectorControls } = wp.blockEditor;
const { Button } = wp.components;
const { __ } = wp.i18n;
const el = wp.element.createElement;
const { createElement, Fragment } = wp.element;
const { PanelBody, RadioControl, TextControl } = wp.components;

wp.domReady(function() {
    wp.blocks.setCategories([
        { slug: 'text', title: 'テキスト', icon: 'editor-paragraph' },
        { slug: 'design', title: 'デザイン', icon: 'admin-customizer' },
        { slug: 'narukami-categorys', title: '鳴雷専用ブロック', icon: 'media-text' }
    ]);

	//除外項目ブロック
	wp.blocks.unregisterBlockType('core/paragraph');      // 段落
    wp.blocks.unregisterBlockType('core/list');           // リスト
    wp.blocks.unregisterBlockType('core/quote');          // 引用
    wp.blocks.unregisterBlockType('core/code');           // コード
    wp.blocks.unregisterBlockType('core/details');        // 詳細
    wp.blocks.unregisterBlockType('core/preformatted');   // 整形済みテキスト
    wp.blocks.unregisterBlockType('core/pullquote');      // プルクオート
    wp.blocks.unregisterBlockType('core/table');          // テーブル
    wp.blocks.unregisterBlockType('core/verse');          // 詩
    wp.blocks.unregisterBlockType('core/freeform');       // クラシック (クラシックエディタ)
	wp.blocks.unregisterBlockType('core/button');     // ボタンブロックを除外
    wp.blocks.unregisterBlockType('core/buttons');    // ボタン複数
    wp.blocks.unregisterBlockType('core/columns');    // カラムブロックを除外
    wp.blocks.unregisterBlockType('core/group');      // グループブロックを除外
    wp.blocks.unregisterBlockType('core/more');       // 続きブロックを除外
    wp.blocks.unregisterBlockType('core/nextpage'); // ページ区切りを除外
    wp.blocks.unregisterBlockType('core/separator');  // 区切りブロックを除外
	//メディア
	wp.blocks.unregisterBlockType('core/image');    // 画像ブロック
    wp.blocks.unregisterBlockType('core/gallery');  // ギャラリーブロック
    wp.blocks.unregisterBlockType('core/audio');    // オーディオブロック
    wp.blocks.unregisterBlockType('core/video');    // ビデオブロック
    wp.blocks.unregisterBlockType('core/file');     // ファイルブロック
});

//アイテムリストブロック

wp.domReady(function() {
	registerBlockType('itemlist-custom-block/item-list-block', {
    title: __('商品リスト', 'narukami'),
    icon: 'cart',
    category: 'narukami-categorys',
    attributes: {
        itemList: {
            type: 'array',
            default: []
        },
    },
	
    edit: function (props) {
    const { attributes, setAttributes } = props;
    const { itemList } = attributes;

    const addItem = () => {
        setAttributes({
            itemList: [
                ...itemList,
                {
                    productImage: '',
                    productTitle: '',
                    productPrice: '',
                    productLink: '',
                },
            ],
        });
    };

    const updateItem = (index, newItem) => {
        const updatedItems = itemList.slice();
        updatedItems[index] = newItem;
        setAttributes({ itemList: updatedItems });
    };

    const removeItem = (index) => {
        const updatedItems = itemList.filter((_, i) => i !== index);
        setAttributes({ itemList: updatedItems });
    };

    return el('div', {}, 
        el(Button, { onClick: addItem, className: 'item-add-btn' }, __('商品を追加', 'narukami')),
        el('div', { className: 'item-list-block-editor' },
            itemList.map((item, index) => 
                el('div', { key: index, className: 'item-list-editor' },
                    el(MediaUpload, {
                        onSelect: function (media) {
                            const updatedItems = [...itemList];
                            updatedItems[index].productImage = media.url;
                            setAttributes({ itemList: updatedItems });
                        },
                        type: 'image',
                        render: function (obj) {
                            return el(Button, { onClick: obj.open, className: 'item-list-img-btn' },
                                item.productImage ?
                                    el('img', { src: item.productImage, alt: __('Product Image', 'narukami') }) :
                                    __('画像を選択してください。', 'narukami')
                            );
                        }
                    }),
                    el(TextControl, {
                        label: __('商品名', 'narukami'),
                        value: item.productTitle,
                        onChange: function (value) {
                            const updatedItems = [...itemList];
                            updatedItems[index].productTitle = value;
                            setAttributes({ itemList: updatedItems });
                        }
                    }),
                    el(TextControl, {
                        label: __('商品価格', 'narukami'),
                        value: item.productPrice,
                        onChange: function (value) {
                            const updatedItems = [...itemList];
                            updatedItems[index].productPrice = value;
                            setAttributes({ itemList: updatedItems });
                        }
                    }),
                    el(TextControl, {
                        label: __('商品紹介ページリンク', 'narukami'),
                        value: item.productLink,
                        onChange: function (value) {
                            const updatedItems = [...itemList];
                            updatedItems[index].productLink = value;
                            setAttributes({ itemList: updatedItems });
                        }
                    }),
                    el(Button, { onClick: () => removeItem(index), className: 'item-remove-btn' }, __('削除', 'narukami'))
                )
            )
        )
    );
},

save: function (props) {
    const { attributes } = props;
    const { itemList } = attributes;

    return el('div', { className: 'item-list-block' },
        itemList.length > 0 ? 
            itemList.map((item, index) => 
                el('a', { 
                    className: 'item-list', 
                    key: index, 
                    href: item.productLink || '#', // リンクがない場合は `#` に飛ぶ
                    target: '_blank', 
                    rel: 'noopener noreferrer', 
                    style: { display: 'inline-block', textDecoration: 'none' } // デフォルトのリンク装飾を削除
                },
                    el('img', { src: item.productImage, alt: __('Product Image', 'narukami') }),
                    el('h2', { className: 'product-title' }, item.productTitle),
                    el('p', { className: 'product-price' }, item.productPrice + ' 円')
                )
            ) 
        : el('p', __('商品はありません。', 'narukami'))
    );
}

});

});

//スライドショーブロック
wp.domReady(function() {
	registerBlockType('itemlist-custom-block/image-slider-block', {
    title: __('商品スライドショー', 'narukami'),
    icon: 'images-alt2',
    category: 'narukami-categorys',
    attributes: {
        slides: {
            type: 'array',
            default: [],
        },
		sliderTitle: {
            type: 'string',
            default: '',
        },
    },
    
    edit: function (props) {
        const { attributes, setAttributes } = props;
        const { slides, sliderTitle } = attributes;

        const addSlide = () => {
            setAttributes({
                slides: [
                    ...slides,
                    {
                        productImage: '',
                        productTitle: '',
                        productPrice: '',
                    },
                ],
            });
        };

        const updateSlide = (index, updatedSlide) => {
            const updatedSlides = slides.slice();
            updatedSlides[index] = updatedSlide;
            setAttributes({ slides: updatedSlides });
        };

        const removeSlide = (index) => {
            const updatedSlides = slides.filter((_, i) => i !== index);
            setAttributes({ slides: updatedSlides });
        };

        return el('div', {},
			el(TextControl, {
                label: __('スライダーのタイトル', 'narukami'),
				className: 'narukami-slider-title',
                value: sliderTitle,
                onChange: function (value) {
                    setAttributes({ sliderTitle: value });
                }
            }),
            el(Button, { onClick: addSlide, className: 'slide-add-btn' }, __('スライドを追加', 'narukami')),
            el('div', { className: 'slide-list' },
                slides.map((slide, index) =>
                    el('div', { key: index, className: 'slide-item' },
                        el(MediaUpload, {
                            onSelect: (media) => {
                                const updatedSlides = [...slides];
                                updatedSlides[index].productImage = media.url;
                                setAttributes({ slides: updatedSlides });
                            },
                            allowedTypes: ['image'],
                            render: (obj) => (
                                el(Button, { onClick: obj.open, className: 'slide-image-btn' },
                                    slide.productImage ?
                                        el('img', { src: slide.productImage, alt: __('Product Image', 'narukami') }) :
                                        __('画像を選択してください', 'narukami')
                                )
                            )
                        }),
                        el(TextControl, {
                            label: __('商品名', 'narukami'),
                            value: slide.productTitle,
                            onChange: (value) => {
                                const updatedSlides = [...slides];
                                updatedSlides[index].productTitle = value;
                                setAttributes({ slides: updatedSlides });
                            },
                        }),
                        el(TextControl, {
                            label: __('商品価格', 'narukami'),
                            value: slide.productPrice,
                            onChange: (value) => {
                                const updatedSlides = [...slides];
                                updatedSlides[index].productPrice = value;
                                setAttributes({ slides: updatedSlides });
                            },
                        }),
                        el(Button, { onClick: () => removeSlide(index), className: 'slide-remove-btn' }, __('削除', 'narukami'))
                    )
                )
            )
        );
    },

    save: function (props) {
        const { attributes } = props;
        const { slides, sliderTitle } = attributes;

        return el(
    		'div',
    		{ className: 'slider-container-list-page' }, // 2つのコンテンツを囲む div
			// スライダーのタイトルを表示
    		sliderTitle ? el('h2', { className: 'slider-title-list-page' }, sliderTitle) : null,

    		// スライダーコンテンツを表示
			el(
        	'div',
        	{ className: 'narukami-product-slider' },
        		slides.map((slide, index) =>
            		el(
                		'div',
                		{ key: index, className: 'slide-items' },
                		el('img', { src: slide.productImage, alt: __('Product Image', 'narukami') }),
                		el('h2', { className: 'product-title' }, slide.productTitle),
                		el('p', { className: 'product-price' }, slide.productPrice + ' 円')
            		)
        		)
			)
		);

    },
});
});


