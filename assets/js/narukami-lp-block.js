const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck, PlainText, InspectorControls, PanelColorSettings, RichText } = wp.blockEditor;
const { Button } = wp.components;
const { __ } = wp.i18n;
const el = wp.element.createElement;
const { createElement, Fragment } = wp.element;
const { PanelBody, RangeControl, RadioControl, TextControl } = wp.components;

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

//ヒーローヘッダー
wp.domReady(function() {
    registerBlockType('hero-header-block/hero-header-linetitle-block', {
        title: __('ヒーローヘッダーとタイトル(横文字)', 'narukami'),
        icon: 'images-alt2',
        category: 'narukami-categorys',
        attributes: {
            imageUrl: { type: 'string', default: '' },
            titleText: { type: 'string', default: '' },
            textColor: { type: 'string', default: '#000000' },
            fontSize: { type: 'number', default: 24 },
            textShadowColor: { type: 'string', default: '#000000' },
            textShadowOffsetX: { type: 'number', default: 2 },
            textShadowOffsetY: { type: 'number', default: 2 },
            textShadowBlur: { type: 'number', default: 4 },
        },
        edit: function(props) {
            const { attributes, setAttributes } = props;

            const onSelectImage = (media) => {
                setAttributes({ imageUrl: media.url });
            };

            const onChangeTitleText = (value) => {
                setAttributes({ titleText: value });
            };

            const onChangeTextColor = (newColor) => {
                setAttributes({ textColor: newColor });
            };

            const onChangeFontSize = (newSize) => {
                setAttributes({ fontSize: newSize });
            };

            const onChangeTextShadowColor = (newColor) => {
                setAttributes({ textShadowColor: newColor });
            };

            const onChangeTextShadowOffsetX = (value) => {
                setAttributes({ textShadowOffsetX: value });
            };

            const onChangeTextShadowOffsetY = (value) => {
                setAttributes({ textShadowOffsetY: value });
            };

            const onChangeTextShadowBlur = (value) => {
                setAttributes({ textShadowBlur: value });
            };

            return (
                el('div', {},
                    el(InspectorControls, {},
                        el(PanelBody, { title: __('テキスト設定', 'narukami'), initialOpen: true },
                            el(RangeControl, {
                                label: __('文字サイズ', 'narukami'),
                                value: attributes.fontSize,
                                onChange: onChangeFontSize,
                                min: 10,
                                max: 80,
                            })
                        ),
                        el(PanelColorSettings, {
                            title: __('文字色設定', 'narukami'),
                            colorSettings: [
                                {
                                    label: __('文字色', 'narukami'),
                                    value: attributes.textColor,
                                    onChange: onChangeTextColor,
                                }
                            ]
                        }),
                        el(PanelBody, { title: __('テキストシャドウ設定', 'narukami'), initialOpen: false },
                            el(PanelColorSettings, {
                                title: __('シャドウの色', 'narukami'),
                                colorSettings: [
                                    {
                                        label: __('シャドウ色', 'narukami'),
                                        value: attributes.textShadowColor,
                                        onChange: onChangeTextShadowColor,
                                    }
                                ]
                            }),
                            el(RangeControl, {
                                label: __('シャドウのXオフセット', 'narukami'),
                                value: attributes.textShadowOffsetX,
                                onChange: onChangeTextShadowOffsetX,
                                min: -20,
                                max: 20,
                            }),
                            el(RangeControl, {
                                label: __('シャドウのYオフセット', 'narukami'),
                                value: attributes.textShadowOffsetY,
                                onChange: onChangeTextShadowOffsetY,
                                min: -20,
                                max: 20,
                            }),
                            el(RangeControl, {
                                label: __('シャドウのぼかし', 'narukami'),
                                value: attributes.textShadowBlur,
                                onChange: onChangeTextShadowBlur,
                                min: 0,
                                max: 20,
                            })
                        )
                    ),
                    el('div', { className: 'hero-header-block' },
                        el('div', { className: 'hero-header-image' },
                            el(MediaUpload, {
                                onSelect: onSelectImage,
                                allowedTypes: ['image'],
                                render: (obj) => el(Button, {
                                    className: attributes.imageUrl ? 'image-button' : 'button',
									isPrimary: true,
                                    onClick: obj.open
                                }, __('画像を選択', 'narukami'))
                            })
                        ),
                        attributes.imageUrl && el('div', { className: 'hero-header-image-preview' },
                            el('img', { src: attributes.imageUrl, alt: __('Selected Image', 'narukami') }),
							el('div', { 
                            className: 'hero-header-title', 
                        },
                            el(PlainText, {
                                value: attributes.titleText,
                                onChange: onChangeTitleText,
                                placeholder: __('タイトルを入力', 'narukami'),
								style: { 
                                color: attributes.textColor, 
                                fontSize: attributes.fontSize + 'px', 
                                textAlign: 'center', 
                                backgroundColor: 'transparent',
                                textShadow: `${attributes.textShadowOffsetX}px ${attributes.textShadowOffsetY}px ${attributes.textShadowBlur}px ${attributes.textShadowColor}`
                            	} 
                            })
                        )
                        )
                    )
                )
            );
        },
        save: function(props) {
            const { attributes } = props;

            return (
                el('div', { className: 'hero-header-block' },
                    el('div', { className: 'hero-header-image' },
                        attributes.imageUrl && el('img', { src: attributes.imageUrl, alt: __('Hero Header Image', 'narukami') })
                    ),
                    el('div', { 
                        className: 'hero-header-title', 
                        style: { 
                            color: attributes.textColor, 
                            fontSize: attributes.fontSize + 'px', 
                            textShadow: `${attributes.textShadowOffsetX}px ${attributes.textShadowOffsetY}px ${attributes.textShadowBlur}px ${attributes.textShadowColor}`
                        } 
                    },
                        el('h2', {}, attributes.titleText)
                    )
                )
            );
        }
    });
});

//3カラム画像テキストブロック
wp.domReady(function() {
	registerBlockType('item-three-column-img-block/three-column-img-block', {
        title: __('3カラム画像テキスト', 'narukami'),
        icon: 'images-alt2',
        category: 'narukami-categorys',
        attributes: {
            images: {
                type: 'array',
                default: [{ url: '', title: '', text1: '', text2: '' }, { url: '', title: '', text1: '', text2: '' }, { url: '', title: '', text1: '', text2: '' }],
            },
        },
        edit: function(props) {
            const { attributes: { images }, setAttributes } = props;

            function onSelectImage(index, media) {
                const newImages = [...images];
                newImages[index].url = media.url;
                setAttributes({ images: newImages });
            }

            function onChangeTitle(index, value) {
                const newImages = [...images];
                newImages[index].title = value;
                setAttributes({ images: newImages });
            }

            function onChangeText1(index, value) {
                const newImages = [...images];
                newImages[index].text1 = value;
                setAttributes({ images: newImages });
            }

            function onChangeText2(index, value) {
                const newImages = [...images];
                newImages[index].text2 = value;
                setAttributes({ images: newImages });
            }

            return [
                wp.element.createElement(InspectorControls, {}, 
                    wp.element.createElement(PanelBody, { title: __('画像とテキスト設定', 'narukami'), initialOpen: true },
                        images.map((image, index) => 
                            wp.element.createElement('div', { key: index, style: { marginBottom: '20px' } },
                                wp.element.createElement(MediaUpload, {
                                    onSelect: (media) => onSelectImage(index, media),
                                    allowedTypes: ['image'],
                                    render: ({ open }) => 
                                        wp.element.createElement(Button, { onClick: open, isPrimary: true }, __('画像を選択', 'narukami'))
                                }),
                                wp.element.createElement(RichText, {
                                    tagName: 'h2',
                                    placeholder: __('見出しを入力', 'narukami'),
                                    value: image.title,
                                    onChange: (value) => onChangeTitle(index, value)
                                }),
                                wp.element.createElement(RichText, {
                                    tagName: 'p',
                                    placeholder: __('テキスト1を入力', 'narukami'),
                                    value: image.text1,
                                    onChange: (value) => onChangeText1(index, value)
                                }),
                                wp.element.createElement(RichText, {
                                    tagName: 'p',
                                    placeholder: __('テキスト2を入力', 'narukami'),
                                    value: image.text2,
                                    onChange: (value) => onChangeText2(index, value)
                                })
                            )
                        )
                    )
                ),
                wp.element.createElement('div', { className: 'three-column-img-block' },
                    images.map((image, index) => 
                        wp.element.createElement('div', { key: index, className: 'column' },
                            image.url && wp.element.createElement('img', { src: image.url, alt: image.title }),
                            wp.element.createElement('h2', {}, image.title),
                            wp.element.createElement('p', {}, image.text1),
                            wp.element.createElement('p', {}, image.text2)
                        )
                    )
                )
            ];
        },
        save: function(props) {
            const { attributes: { images } } = props;

            return wp.element.createElement('div', { className: 'three-column-img-block' },
                images.map((image, index) => 
                    wp.element.createElement('div', { key: index, className: 'column' },
                        image.url && wp.element.createElement('img', { src: image.url, alt: image.title }),
                        wp.element.createElement('h2', {}, image.title),
                        wp.element.createElement('p', {}, image.text1),
                        wp.element.createElement('p', {}, image.text2)
                    )
                )
            );
        }
    });
});


