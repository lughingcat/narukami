const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck } = wp.blockEditor;
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
                        label: __('商品単体ページリンク', 'narukami'),
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
                    el('div', { className: 'item-list', key: index, style: { display: 'inline-block' } },
                        item.productImage && el('img', { src: item.productImage, alt: __('Product Image', 'narukami') }),
                        el('h2', { className: 'product-title' }, item.productTitle),
                        el('p', { className: 'product-price' }, item.productPrice),
                        item.productLink && el('a', { className: 'product-link', href: item.productLink, target: '_blank', rel: 'noopener noreferrer' }, __('Visit Product', 'narukami'))
                    )
                ) 
            : el('p', __('商品はありません。', 'narukami'))
        );
    }
});

});
