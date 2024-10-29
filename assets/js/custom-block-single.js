const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck } = wp.blockEditor;
const { Button } = wp.components;
const { __ } = wp.i18n;
const el = wp.element.createElement;
const { PanelBody, RadioControl, TextControl, TextareaControl } = wp.components;
const { createElement, Fragment } = wp.element;
const { useState } = wp.element;

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

//原材料表記ブロック
wp.domReady(function() {
    registerBlockType('item-ingredients-description-block/ingredients-description-block', {
        title: __('原材料表記', 'narukami'),
        icon: 'cart',
        category: 'narukami-categorys',

        attributes: {
            ingredientsList: {
                type: 'array',
                default: []
            }
        },

        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { ingredientsList } = attributes;

            // 原材料リストに新しい行を追加する
            const addIngredient = () => {
                const newIngredients = [...ingredientsList, { item: '', origin: '', country: '' }];
                setAttributes({ ingredientsList: newIngredients });
            };

            // 原材料リストから指定の行を削除する
            const removeIngredient = (index) => {
                const newIngredients = ingredientsList.filter((_, i) => i !== index);
                setAttributes({ ingredientsList: newIngredients });
            };

            // 入力フィールドの内容を更新する
            const updateIngredient = (index, key, value) => {
                const newIngredients = ingredientsList.map((ingredient, i) =>
                    i === index ? { ...ingredient, [key]: value } : ingredient
                );
                setAttributes({ ingredientsList: newIngredients });
            };

            return el(
                'div',
                { className: 'ingredients-description-block' },
                el('h2', null, '主な調理品原産国'),
                el(
                    'div',
                    { className: 'ingredients-list' },
                    ingredientsList.map((ingredient, index) =>
                        el(
                            'div',
                            { key: index, className: 'ingredient-item' },
                            el(TextControl, {
                                label: '調理品',
                                value: ingredient.item,
                                onChange: (value) => updateIngredient(index, 'item', value)
                            }),
                            el(TextControl, {
                                label: '原材料(材料名間にスペースを入れず,で区切ってください。)',
                                value: ingredient.origin,
                                onChange: (value) => updateIngredient(index, 'origin', value)
                            }),
                            el(TextControl, {
                                label: '原産国(原産国間にスペースを入れず,で区切ってください。)',
                                value: ingredient.country,
                                onChange: (value) => updateIngredient(index, 'country', value)
                            }),
                            el(Button, {
                                className: 'subprice-del-btn',
                                isDestructive: true,
                                onClick: () => removeIngredient(index)
                            }, '削除')
                        )
                    ),
                    el(Button, {
                        className: 'subprice-add-btn',
                        isPrimary: true,
                        onClick: addIngredient
                    }, '項目を追加')
                )
            );
        },

        save: function(props) {
    const { attributes } = props;
    const { ingredientsList } = attributes;

    return el(
        'div',
        { className: 'ingredients-description-block' },
        el('h2', null, '主な調理品原産国'),
        el(
            'div',
            { className: 'ingredients-list' },
            el(
                'div',
                { className: 'ingredient-headers' },
                el('p', null, '調理品', '/', '原材料', '/', '原産国')
            ),
            ingredientsList.map((ingredient, index) =>
                el(
                    'div',
                    { key: index, className: 'ingredient-item' },
                    el('p', null, ingredient.item, '/', ingredient.origin, '/', ingredient.country)
                )
            )
        )
    );
}

    });
});


