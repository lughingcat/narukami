const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck } = wp.blockEditor;
const { Button } = wp.components;
const { __ } = wp.i18n;
const el = wp.element.createElement;
const { PanelBody, RadioControl, TextControl, TextareaControl } = wp.components;
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


wp.domReady(function() {
registerBlockType('item-introduction-block/introduction-block', {
    title: __('商品紹介(画像,価格,解説)', 'narukami'),
    icon: 'cart',
    category: 'narukami-categorys',
    attributes: {
        sliderImages: {
            type: 'array',
            default: []
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
        const { productDescription, productPrice, subPrices, sliderImages } = attributes;

        const addSubPrice = () => {
            const newSubPrices = [...subPrices, ''];
            setAttributes({ subPrices: newSubPrices });
        };

        const updateSubPrice = (value, index) => {
            const newSubPrices = [...subPrices];
            newSubPrices[index] = value;
            setAttributes({ subPrices: newSubPrices });
        };

        const removeSubPrice = (index) => {
            const newSubPrices = subPrices.filter((_, i) => i !== index);
            setAttributes({ subPrices: newSubPrices });
        };

        const onSelectImages = (media) => {
            const newImages = media.map((img) => ({
                id: img.id,
                url: img.url
            }));
            setAttributes({ sliderImages: newImages });
        };

        return createElement(Fragment, null,
            createElement("div", { className: "product-slider-block" },
                createElement("div", { className: "slider-container" },
                    createElement(MediaUploadCheck, null,
                        createElement(MediaUpload, {
                            onSelect: onSelectImages,
                            allowedTypes: ['image'],
                            multiple: true,
                            render: ({ open }) =>
                                createElement(Button, { onClick: open, className: "maltiple-img-btn" }, "画像を選択(shift+クリックで複数選択可能)")
                        })
                    ),
                    createElement("div", { className: "selected-images" },
                        sliderImages.map((img, index) =>
                            createElement("div", { key: index, className: "image-wrapper" },
                                createElement("img", {
                                    src: img.url,
                                    alt: `選択した画像 ${index + 1}`,
                                    className: "slider-image"
                                })
                            )
                        )
                    )
                ),
                createElement("div", { className: "content-container" },
                    createElement(TextareaControl, {
                        label: "商品説明",
                        value: productDescription,
						className: "item-information",
						style: { height: '200px' },
                        onChange: (value) => setAttributes({ productDescription: value })
                    }),
                    createElement(TextControl, {
                        label: "商品価格",
                        value: productPrice,
						className: "product-item-price",
                        onChange: (value) => setAttributes({ productPrice: value })
                    }),
                    subPrices.map((subPrice, index) =>
                        createElement("div", { key: index, className: "sub-price-item" },
                            createElement(TextControl, {
                                label: `サブプライス ${index + 1}`,
                                value: subPrice,
								className: "product-subprice",
                                onChange: (value) => updateSubPrice(value, index)
                            }),
                            createElement(Button, {
								className: "subprice-del-btn",
                                onClick: () => removeSubPrice(index)
                            }, "削除")
                        )
                    ),
                    createElement(Button, { onClick: addSubPrice, className: "subprice-add-btn" }, "サブプライスを追加")
                )
            )
        );
    },

    save: function(props) {
    const { attributes } = props;
    const { productDescription, productPrice, subPrices, sliderImages } = attributes;

    return createElement(
    Fragment,
    null,
    createElement("div", { className: "flex-container" }, // 新しいflex-containerで要素を囲む
        createElement("div", { className: "product-slider-block" },
            createElement("div", { className: "slider-container" },
                sliderImages.map((img, index) =>
                    createElement("div", { key: index, className: "slide-wrapper" },
                        createElement("img", {
                            src: img.url,
                            alt: `ギャラリー画像 ${index + 1}`
                        })
                    )
                )
            )
        ),
        createElement("div", { className: "content-container" },
            createElement("div", { className: "product-description" }, productDescription),
            createElement("div", { className: "product-price" }, productPrice),
            createElement("ul", { className: "sub-prices" },
                subPrices.map((subPrice, index) =>
                    createElement("li", { key: index }, subPrice)
                )
            )
        )
    )
);

},

});//registerBlockType() end
});//wp.domReady(function() end
