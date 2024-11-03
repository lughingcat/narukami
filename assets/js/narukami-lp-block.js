const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck, PlainText, InspectorControls, PanelColorSettings, RichText, } = wp.blockEditor;
const { Button } = wp.components;
const { __ } = wp.i18n;
const el = wp.element.createElement;
const { createElement, Fragment } = wp.element;
const { PanelBody, RangeControl, RadioControl, TextControl, ColorPalette, } = wp.components;

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
    const { registerBlockType } = wp.blocks;
    const { __ } = wp.i18n;
    const { MediaUpload, MediaUploadCheck, InspectorControls, PanelColorSettings } = wp.blockEditor;
    const { Fragment } = wp.element;
    const { Button, TextControl, PanelBody } = wp.components;

    registerBlockType('item-three-column-img-block/three-column-img-block', {
        title: __('3カラム画像テキスト', 'narukami'),
        icon: 'images-alt2',
        category: 'narukami-categorys',
        attributes: {
            images: { type: 'array', default: [null, null, null] },
            titles: { type: 'array', default: ['', '', ''] },
            subtitles: { type: 'array', default: ['', '', ''] },
            contents: { type: 'array', default: ['', '', ''] },
            backgroundColor: { type: 'string', default: '' },
            textColor: { type: 'string', default: '' },
        },
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { images, titles, subtitles, contents, backgroundColor, textColor } = attributes;

            const onSelectImage = (index, newImage) => {
                const updatedImages = [...images];
                updatedImages[index] = newImage;
                setAttributes({ images: updatedImages });
            };

            const onChangeTitle = (index, newTitle) => {
                const updatedTitles = [...titles];
                updatedTitles[index] = newTitle;
                setAttributes({ titles: updatedTitles });
            };

            const onChangeSubtitle = (index, newSubtitle) => {
                const updatedSubtitles = [...subtitles];
                updatedSubtitles[index] = newSubtitle;
                setAttributes({ subtitles: updatedSubtitles });
            };

            const onChangeContent = (index, newContent) => {
                const updatedContents = [...contents];
                updatedContents[index] = newContent;
                setAttributes({ contents: updatedContents });
            };

            const columns = [];
            for (let i = 0; i < 3; i++) {
                columns.push(
                    wp.element.createElement('div', { key: i, className: 'three-column-block' },
                        wp.element.createElement(MediaUploadCheck, {},
                            wp.element.createElement(MediaUpload, {
                                onSelect: (newImage) => onSelectImage(i, newImage),
                                allowedTypes: ['image'],
                                value: images[i] ? images[i].id : '',
                                render: ({ open }) => wp.element.createElement(Button, {
                                    onClick: open,
                                    className: images[i] ? 'image-button' : 'button button-large'
                                }, images[i] ? wp.element.createElement('img', { src: images[i].sizes.thumbnail.url, alt: images[i].alt }) : __('画像を選択', 'narukami'))
                            })
                        ),
                        wp.element.createElement(TextControl, {
                            label: __('見出し', 'narukami'),
                            value: titles[i],
                            className: 'three-column-hed',
                            onChange: (newTitle) => onChangeTitle(i, newTitle)
                        }),
                        wp.element.createElement(TextControl, {
                            label: __('サブタイトル', 'narukami'),
                            value: subtitles[i],
                            className: 'three-column-subhed',
                            onChange: (newSubtitle) => onChangeSubtitle(i, newSubtitle)
                        }),
                        wp.element.createElement(TextControl, {
                            label: __('コンテンツ', 'narukami'),
                            value: contents[i],
                            className: 'three-column-content',
                            onChange: (newContent) => onChangeContent(i, newContent)
                        })
                    )
                );
            }

            return wp.element.createElement(Fragment, {},
                wp.element.createElement(InspectorControls, {},
                    wp.element.createElement(PanelBody, { title: __('背景色と文字色の設定', 'narukami'), initialOpen: true },
                        wp.element.createElement(PanelColorSettings, {
                            title: __('色設定', 'narukami'),
                            colorSettings: [
                                {
                                    value: backgroundColor,
                                    onChange: (newColor) => setAttributes({ backgroundColor: newColor }),
                                    label: __('背景色', 'narukami')
                                },
                                {
                                    value: textColor,
                                    onChange: (newColor) => setAttributes({ textColor: newColor }),
                                    label: __('文字色', 'narukami')
                                },
                            ]
                        })
                    )
                ),
                wp.element.createElement('div', { className: 'three-column-container' }, columns) // 親要素を追加
            );
        },
        save: function(props) {
            const { attributes } = props;
            const { images, titles, subtitles, contents, backgroundColor, textColor } = attributes;

            const columns = [];
            for (let i = 0; i < 3; i++) {
                columns.push(
                    wp.element.createElement('div', { key: i, className: 'column' },
                        images[i] && wp.element.createElement('img', { src: images[i].url, alt: images[i].alt }),
                        wp.element.createElement('h2', { style: { color: textColor } }, titles[i]),
                        wp.element.createElement('p', { style: { color: textColor } }, subtitles[i]),
                        wp.element.createElement('p', { style: { color: textColor } }, contents[i])
                    )
                );
            }

            return wp.element.createElement('div', { className: 'three-column-img-block', style: { backgroundColor: backgroundColor } },
                wp.element.createElement('div', { className: 'three-column-container' }, columns) // 親要素を追加
            );
        },
    });
});

//背景画像つきコンテンツ
wp.domReady(function() {
    registerBlockType('item-bg-title-content-block/bg-title-content-block', {
        title: __('背景とコンテンツ', 'narukami'),
        icon: 'images-alt2',
        category: 'narukami-categorys',

        attributes: {
            title: { type: 'string', default: '' },
            subtitle: { type: 'string', default: '' },
            content: { type: 'string', default: '' },
            titleColor: { type: 'string', default: '#000000' },
            subtitleColor: { type: 'string', default: '#000000' },
            contentColor: { type: 'string', default: '#000000' },
            backgroundImage: { type: 'string', default: null },
            maskOpacity: { type: 'number', default: 0.5 }
        },

        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { title, subtitle, content, titleColor, subtitleColor, contentColor, backgroundImage, maskOpacity } = attributes;

            const onSelectImage = function(media) {
                setAttributes({ backgroundImage: media.url });
            };

            const titleStyle = { color: titleColor };
            const subtitleStyle = { color: subtitleColor };
            const contentStyle = { color: contentColor };

            return createElement(
                Fragment,
                {},
                createElement(
                    InspectorControls,
                    {},
                    createElement(
                        PanelBody,
                        { title: __('テキスト設定', 'narukami'), initialOpen: true },
                        createElement('p', {}, '見出しの色'),
                        createElement(ColorPalette, {
                            value: titleColor,
                            onChange: function(color) { setAttributes({ titleColor: color }); }
                        }),
                        createElement('p', {}, 'サブタイトルの色'),
                        createElement(ColorPalette, {
                            value: subtitleColor,
                            onChange: function(color) { setAttributes({ subtitleColor: color }); }
                        }),
                        createElement('p', {}, 'コンテンツの色'),
                        createElement(ColorPalette, {
                            value: contentColor,
                            onChange: function(color) { setAttributes({ contentColor: color }); }
                        })
                    ),
                    createElement(
                        PanelBody,
                        { title: __('背景設定', 'narukami'), initialOpen: false },
                        createElement(MediaUpload, {
                            onSelect: onSelectImage,
                            type: 'image',
                            render: function(obj) {
                                return createElement(
                                    Button,
                                    { onClick: obj.open, isDefault: true, isLarge: true },
                                    backgroundImage ? __('画像変更', 'narukami') : __('画像選択', 'narukami')
                                );
                            }
                        }),
                        createElement(RangeControl, {
                            label: __('黒の透過マスク', 'narukami'),
                            value: maskOpacity,
                            onChange: function(value) { setAttributes({ maskOpacity: value }); },
                            min: 0,
                            max: 1,
                            step: 0.1
                        })
                    )
                ),
                createElement(
                    'div',
                    {
                        className: 'bg-title-content-block',
                        style: {
                            backgroundImage: backgroundImage ? 'url(' + backgroundImage + ')' : 'none',
							backgroundRepeat: 'no-repeat',
							backgroundSize: 'cover',
							backgroundPosition: 'center',
                            position: 'relative',
                            padding: '20px',
                            display: 'flex',
                            flexDirection: 'row',
                            alignItems: 'center',
							width: '100%',
							height: '400px'
                        }
                    },
                    createElement('div', {
                        style: {
                            backgroundColor: 'rgba(0, 0, 0, ' + maskOpacity + ')',
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            zIndex: 1
                        }
                    }),
                    createElement(
                        'div',
                        { style: { 
							zIndex: 2, 
							padding: '10px',
							width: '50%',
							height: '200px'
						} },
                        createElement('h2', { style: { ...titleStyle, marginTop: '0' } },
                            createElement('input', {
                                type: 'text',
                                placeholder: __('見出しを入力...', 'narukami'),
                                value: title,
                                onChange: function(e) { setAttributes({ title: e.target.value }); },
                                style: { width: '100%', height: '50px' }
                            })
                        ),
                        createElement('p', { style: subtitleStyle },
                            createElement('input', {
                                type: 'text',
                                placeholder: __('サブタイトルを入力...', 'narukami'),
                                value: subtitle,
                                onChange: function(e) { setAttributes({ subtitle: e.target.value }); },
                                style: { width: '100%' }
                            })
                        )
                    ),
                    createElement(
                        'div',
                        { style: { 
							zIndex: 2, 
							padding: '10px',
							width: '50%'
						} },
                        createElement('textarea', {
                            placeholder: __('コンテンツを入力...', 'narukami'),
                            value: content,
                            onChange: function(e) { setAttributes({ content: e.target.value }); },
                            style: { width: '100%', height: '200px', color: contentColor }
                        })
                    )
                )
            );
        },

        save: function(props) {
            const { attributes } = props;
            const { title, subtitle, content, titleColor, subtitleColor, contentColor, backgroundImage, maskOpacity } = attributes;

            return createElement(
                'div',
                {
                    className: 'bg-title-content-block',
                    style: {
                        backgroundImage: backgroundImage ? 'url(' + backgroundImage + ')' : 'none',
                        position: 'relative',
                        padding: '20px',
                        display: 'flex',
                        flexDirection: 'row',
                        alignItems: 'center'
                    }
                },
                createElement('div', {
                    style: {
                        backgroundColor: 'rgba(0, 0, 0, ' + maskOpacity + ')',
                        position: 'absolute',
                        top: 0,
                        left: 0,
                        right: 0,
                        bottom: 0,
                        zIndex: 1
                    }
                }),
                createElement(
                    'div',
                    { style: { zIndex: 2, padding: '10px', color: titleColor } },
                    createElement('h2', {}, title),
                    createElement('p', { style: { color: subtitleColor } }, subtitle)
                ),
                createElement(
                    'div',
                    { style: { zIndex: 2, padding: '10px', color: contentColor } },
                    createElement('p', {}, content)
                )
            );
        }
    });
});






