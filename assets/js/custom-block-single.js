const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck } = wp.blockEditor;
const { Button } = wp.components;
const { __ } = wp.i18n;
const el = wp.element.createElement;
const { PanelBody, RadioControl, TextControl } = wp.components;
const { createElement, Fragment } = wp.element;

wp.domReady(function() {
    wp.blocks.setCategories([
        { slug: 'text', title: 'テキスト', icon: 'editor-paragraph' },
        { slug: 'design', title: 'デザイン', icon: 'admin-customizer' },
        { slug: 'narukami-categorys', title: '鳴雷カテゴリー', icon: 'admin-plugins' }
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

registerBlockType('item-introduction-block/introduction-block', {
	title: __('商品紹介(画像,価格,解説)', 'narukami'),
    icon: 'cart',
    category: 'narukami-categorys',
    attributes: {
        sliderImage: {
            type: 'string',
            default: ''
        },
		productDescription: {
            type: 'string',
            default: ''
        },
		productPrice: {
            type: 'string',
            default: ''
        },
		subPrices: {
            type: 'array',
            default: []
        },
    },
	
    edit: function(props) {
        const { attributes, setAttributes } = props;
        const { productDescription, productPrice, subPrices, sliderImage } = attributes;

        const addSubPrice = () => {
            const newSubPrices = [...subPrices, ''];
            setAttributes({ subPrices: newSubPrices });
        };

        const updateSubPrice = (value, index) => {
            const newSubPrices = [...subPrices];
            newSubPrices[index] = value;
            setAttributes({ subPrices: newSubPrices });
        };

        return wp.element.createElement(Fragment, null,
            wp.element.createElement("div", { className: "product-slider-block" },
                wp.element.createElement("div", { className: "slider-container" },
                        wp.element.createElement(MediaUpload, {
                            onSelect: (media) => setAttributes({ sliderImage: media.url }),
                            allowedTypes: ['image'],
                            render: ({ open }) =>
                                wp.element.createElement(Button, { onClick: open }, "画像を選択")
                        }),
						attributes.sliderImage &&
    					wp.element.createElement("img", {
    					    src: attributes.sliderImage,
    					    alt: "選択した画像",
    					    className: "slider-image"
    					})
                ),
                wp.element.createElement("div", { className: "content-container" },
                    wp.element.createElement(TextControl, {
                        label: "商品説明",
                        value: productDescription,
                        onChange: (value) => setAttributes({ productDescription: value })
                    }),
                    wp.element.createElement(TextControl, {
                        label: "商品価格",
                        value: productPrice,
                        onChange: (value) => setAttributes({ productPrice: value })
                    }),
                    subPrices.map((subPrice, index) =>
                        wp.element.createElement(TextControl, {
                            key: index,
                            label: `サブプライス ${index + 1}`,
                            value: subPrice,
                            onChange: (value) => updateSubPrice(value, index)
                        })
                    ),
                    wp.element.createElement(Button, { onClick: addSubPrice }, "サブプライスを追加")
                )
            )
        );
    },
    save: function(props) {
        const { attributes } = props;
        const { productDescription, productPrice, subPrices, sliderImage } = attributes;

        return wp.element.createElement("div", { className: "product-slider-block" },
            wp.element.createElement("div", { className: "slider-container" },
                wp.element.createElement("img", { src: sliderImage, alt: productDescription })
            ),
            wp.element.createElement("div", { className: "content-container" },
                wp.element.createElement("div", { className: "product-description" }, productDescription),
                wp.element.createElement("div", { className: "product-price" }, productPrice),
                wp.element.createElement("ul", { className: "sub-prices" },
                    subPrices.map((subPrice, index) =>
                        wp.element.createElement("li", { key: index }, subPrice)
                    )
                )
            )
        );
    },
});