const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload } = wp.blockEditor;
const { Button } = wp.components;
const { __ } = wp.i18n;
const el = wp.element.createElement;

wp.domReady(function() {
    wp.blocks.setCategories([
        { slug: 'text', title: 'テキスト', icon: 'editor-paragraph' },
        { slug: 'media', title: 'メディア', icon: 'format-image' },
        { slug: 'design', title: 'デザイン', icon: 'admin-customizer' },
        { slug: 'widgets', title: 'ウィジェット', icon: 'screenoptions' },
        { slug: 'embeds', title: '埋め込み', icon: 'embed-generic' },
        { slug: 'narukami-categorys', title: '鳴雷カテゴリー', icon: 'admin-plugins' }
    ]);
});

wp.domReady(function() {
	registerBlockType('itemlist-custom-block/item-list-block', {
    title: __('商品リスト', 'narukami'),
    icon: 'cart',
    category: 'narukami-categorys',
    attributes: {
        productImage: {
            type: 'string',
            default: ''
        },
        productTitle: {
            type: 'string',
            default: ''
        },
        productPrice: {
            type: 'string',
            default: ''
        }
    },
    edit: function (props) {
        const { attributes, setAttributes } = props;
        const { productImage, productTitle, productPrice } = attributes;

        return el('div', { className: 'product-block-editor' },
            el(MediaUpload, {
                onSelect: function (media) {
                    setAttributes({ productImage: media.url });
                },
                type: 'image',
                render: function (obj) {
                    return el(Button, { onClick: obj.open, className: 'button' },
                        productImage ?
                            el('img', { src: productImage, alt: __('Product Image', 'narukami') }) :
                            __('Select Image', 'narukami')
                    );
                }
            }),
            el(TextControl, {
                label: __('Product Title', 'narukami'),
                value: productTitle,
                onChange: function (value) {
                    setAttributes({ productTitle: value });
                }
            }),
            el(TextControl, {
                label: __('Product Price', 'narukami'),
                value: productPrice,
                onChange: function (value) {
                    setAttributes({ productPrice: value });
                }
            })
        );
    },
    save: function (props) {
        const { attributes } = props;
        const { productImage, productTitle, productPrice } = attributes;

        return el('div', { className: 'product-block' },
            productImage && el('img', { src: productImage, alt: __('Product Image', 'narukami') }),
            el('h2', { className: 'product-title' }, productTitle),
            el('p', { className: 'product-price' }, productPrice)
        );
    }
});

});
