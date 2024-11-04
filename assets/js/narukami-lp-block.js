const { addFilter } = wp.hooks;
const { registerBlockType } = wp.blocks;
const { MediaUpload, MediaUploadCheck, PlainText, InspectorControls, PanelColorSettings, RichText, } = wp.blockEditor;
const { Button } = wp.components;
const { __ } = wp.i18n;
const el = wp.element.createElement;
const { createElement, Fragment, useState } = wp.element;
const { PanelBody, RangeControl, RadioControl, TextControl, ColorPalette, ColorPicker } = wp.components;

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
                            style: { width: '100%', height: '200px' }
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
                    { 
						className: 'bg-title-heding-left',
						style: { 
							zIndex: 2, 
							padding: '10px', 
							color: titleColor }
					},
                    createElement('h2', {}, title),
                    createElement('p', { style: { color: subtitleColor } }, subtitle)
                ),
                createElement(
                    'div',
                    { 
						className: 'bg-title-heding-right',
						style: { 
							zIndex: 2, 
							padding: '10px', 
							color: contentColor }
					},
                    createElement('p', {}, content)
                )
            );
        }
    });
});

//2カラム画像付きコンテンツ
wp.domReady(function() {
    registerBlockType('item-two-column-content/two-column-content-block', {
        title: '2カラム画像付きコンテンツ',
        icon: 'images-alt2',
        category: 'narukami-categorys',
        attributes: {
            imageUrl1: { type: 'string', default: '' },
            heading1: { type: 'string', default: '見出し' },
            subtitle1: { type: 'string', default: 'サブタイトル' },
            content1: { type: 'string', default: 'コンテンツ' },
            imageUrl2: { type: 'string', default: '' },
            heading2: { type: 'string', default: '見出し' },
            subtitle2: { type: 'string', default: 'サブタイトル' },
            content2: { type: 'string', default: 'コンテンツ' },
            textColor: { type: 'string', default: '#000000' },
            backgroundColor: { type: 'string', default: '#ffffff' },
        },
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { imageUrl1, heading1, subtitle1, content1, imageUrl2, heading2, subtitle2, content2, textColor, backgroundColor } = attributes;

            const renderColumn = (imageUrl, heading, subtitle, content, onSelectImage, setHeading, setSubtitle, setContent) => (
                el('div', {
                    style: {
                        display: 'flex',
                        width: '50%',
                        justifyContent: 'space-between',
                        backgroundColor: backgroundColor,
                        padding: '20px'
                    }
                },
                    el('div', {
                        style: {
                            height: '300px',
                            width: '50%',
                            backgroundImage: `url(${imageUrl})`,
                            backgroundRepeat: 'no-repeat',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center'
                        }
                    },
                        el(MediaUpload, {
                            onSelect: onSelectImage,
                            allowedTypes: ['image'],
                            render: (openEvent) => el(Button, { onClick: openEvent.open, isPrimary: true }, '画像選択')
                        })
                    ),
                    el('div', { style: { width: '50%', padding: '10px' } },
                        el(RichText, {
                            tagName: 'h2',
                            style: { color: textColor },
                            value: heading,
                            onChange: setHeading,
                            placeholder: '見出しを入力'
                        }),
                        el(RichText, {
                            tagName: 'p',
                            className: 'narukami-subtitle',
                            style: { color: textColor },
                            value: subtitle,
                            onChange: setSubtitle,
                            placeholder: 'サブタイトルを入力'
                        }),
                        el(RichText, {
                            tagName: 'p',
                            className: 'narukami-content',
                            style: { color: textColor },
                            value: content,
                            onChange: setContent,
                            placeholder: 'コンテンツを入力'
                        })
                    )
                )
            );

            return (
                el(Fragment, {},
                    el(InspectorControls, {},
                        el(PanelBody, { title: '設定' },
                            el('div', {},
                                el('p', {}, 'テキストカラー'),
                                el(ColorPalette, {
                                    value: textColor,
                                    onChange: (color) => setAttributes({ textColor: color })
                                })
                            ),
                            el('div', {},
                                el('p', {}, '背景色'),
                                el(ColorPalette, {
                                    value: backgroundColor,
                                    onChange: (color) => setAttributes({ backgroundColor: color })
                                })
                            )
                        )
                    ),
                    el('div', { style: { display: 'flex', backgroundColor: backgroundColor } },
                        renderColumn(
                            imageUrl1, heading1, subtitle1, content1,
                            (media) => setAttributes({ imageUrl1: media.url }),
                            (text) => setAttributes({ heading1: text }),
                            (text) => setAttributes({ subtitle1: text }),
                            (text) => setAttributes({ content1: text })
                        ),
                        renderColumn(
                            imageUrl2, heading2, subtitle2, content2,
                            (media) => setAttributes({ imageUrl2: media.url }),
                            (text) => setAttributes({ heading2: text }),
                            (text) => setAttributes({ subtitle2: text }),
                            (text) => setAttributes({ content2: text })
                        )
                    )
                )
            );
        },
        save: function(props) {
            const { attributes } = props;
            const { imageUrl1, heading1, subtitle1, content1, imageUrl2, heading2, subtitle2, content2, textColor, backgroundColor } = attributes;

            const renderSavedColumn = (imageUrl, heading, subtitle, content) => (
                el('div', {
                    style: {
                        display: 'flex',
                        width: '50%',
                        justifyContent: 'space-between',
                        backgroundColor: backgroundColor,
                        padding: '20px'
                    }
                },
                    el('div', {
                        style: {
                            height: '250px',
                            width: '50%',
                            backgroundImage: `url(${imageUrl})`,
                            backgroundRepeat: 'no-repeat',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center'
                        }
                    }),
                    el('div', { style: { width: '50%', padding: '0 10px 0 20px' } },
                        el('h2', { style: { color: textColor } }, heading),
                        el('p', { className: 'two-columns-subtitle', style: { color: textColor } }, subtitle),
                        el('p', { className: 'two-columns-content', style: { color: textColor } }, content)
                    )
                )
            );

            return el('div', { 
				style: { display: 'flex', backgroundColor: backgroundColor },
				className: 'two-columns-allwrap'
			},
                renderSavedColumn(imageUrl1, heading1, subtitle1, content1),
                renderSavedColumn(imageUrl2, heading2, subtitle2, content2)
            );
        }
    });
});

//背景画像つき縦書き見出し
wp.domReady(function() {
      registerBlockType('item-img-vertical-writing/img-vertical-writing-block', {
        title: __('背景画像縦書き見出し', 'text-domain'),
        icon: 'images-alt2',
        category: 'narukami-categorys',
        attributes: {
            backgroundImage: { type: 'string', default: null },
            headingText: { type: 'string', default: __('見出しを入力', 'text-domain') },
            backgroundColor: { type: 'string', default: '#ffffff' },
            textColor: { type: 'string', default: '#000000' },
            horizontalPosition: { type: 'number', default: 50 },
            verticalPosition: { type: 'number', default: 50 },
            paddingTop: { type: 'number', default: 10 },    // 上部の余白
            paddingRight: { type: 'number', default: 10 },  // 右側の余白
            paddingBottom: { type: 'number', default: 10 }, // 下部の余白
            paddingLeft: { type: 'number', default: 10 }    // 左側の余白
        },
        edit: function(props) {
            const { attributes, setAttributes } = props;
            const {
                backgroundImage,
                headingText,
                backgroundColor,
                textColor,
                horizontalPosition,
                verticalPosition,
                paddingTop,
                paddingRight,
                paddingBottom,
                paddingLeft
            } = attributes;

            return wp.element.createElement(
                wp.element.Fragment,
                null,
                wp.element.createElement(
                    InspectorControls,
                    null,
                    wp.element.createElement(
                        PanelBody,
                        { title: __('設定', 'text-domain'), initialOpen: true },
                        wp.element.createElement(MediaUpload, {
                            onSelect: function(media) { setAttributes({ backgroundImage: media.url }); },
                            type: "image",
                            value: backgroundImage,
                            render: function(obj) {
                                return wp.element.createElement(
                                    Button,
                                    {
                                        onClick: obj.open,
                                        isPrimary: true
                                    },
                                    __('背景画像を選択', 'text-domain')
                                );
                            }
                        })
                    ),
                    wp.element.createElement(
                        PanelColorSettings,
                        {
                            title: __('色設定', 'text-domain'),
                            colorSettings: [
                                {
                                    value: backgroundColor,
                                    onChange: function(color) { setAttributes({ backgroundColor: color }); },
                                    label: __('背景色', 'text-domain')
                                },
                                {
                                    value: textColor,
                                    onChange: function(color) { setAttributes({ textColor: color }); },
                                    label: __('文字色', 'text-domain')
                                }
                            ]
                        }
                    ),
                    wp.element.createElement(
                        PanelBody,
                        { title: __('位置設定', 'text-domain'), initialOpen: false },
                        wp.element.createElement(RangeControl, {
                            label: __('横位置', 'text-domain'),
                            value: horizontalPosition,
                            onChange: function(value) { setAttributes({ horizontalPosition: value }); },
                            min: 0,
                            max: 100
                        }),
                        wp.element.createElement(RangeControl, {
                            label: __('縦位置', 'text-domain'),
                            value: verticalPosition,
                            onChange: function(value) { setAttributes({ verticalPosition: value }); },
                            min: 0,
                            max: 100
                        })
                    ),
                    wp.element.createElement(
                        PanelBody,
                        { title: __('見出しの余白設定', 'text-domain'), initialOpen: false },
                        wp.element.createElement(RangeControl, {
                            label: __('上余白 (px)', 'text-domain'),
                            value: paddingTop,
                            onChange: function(value) { setAttributes({ paddingTop: value }); },
                            min: 0,
                            max: 100
                        }),
                        wp.element.createElement(RangeControl, {
                            label: __('右余白 (px)', 'text-domain'),
                            value: paddingRight,
                            onChange: function(value) { setAttributes({ paddingRight: value }); },
                            min: 0,
                            max: 100
                        }),
                        wp.element.createElement(RangeControl, {
                            label: __('下余白 (px)', 'text-domain'),
                            value: paddingBottom,
                            onChange: function(value) { setAttributes({ paddingBottom: value }); },
                            min: 0,
                            max: 100
                        }),
                        wp.element.createElement(RangeControl, {
                            label: __('左余白 (px)', 'text-domain'),
                            value: paddingLeft,
                            onChange: function(value) { setAttributes({ paddingLeft: value }); },
                            min: 0,
                            max: 100
                        })
                    )
                ),
                wp.element.createElement(
                    'div',
                    {
                        style: {
                            width: '100%',
                            height: '400px',
                            backgroundImage: backgroundImage ? `url(${backgroundImage})` : 'none',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center',
                            position: 'relative'
                        }
                    },
                    wp.element.createElement(RichText, {
                        tagName: "h2",
                        value: headingText,
                        onChange: function(text) { setAttributes({ headingText: text }); },
                        placeholder: __('見出しを入力', 'text-domain'),
                        style: {
                            color: textColor,
                            backgroundColor: backgroundColor,
                            writingMode: 'vertical-rl',
                            position: 'absolute',
                            left: horizontalPosition + '%',
                            top: verticalPosition + '%',
                            transform: 'translate(-50%, -50%)',
                            paddingTop: paddingTop + 'px',
                            paddingRight: paddingRight + 'px',
                            paddingBottom: paddingBottom + 'px',
                            paddingLeft: paddingLeft + 'px'
                        }
                    })
                )
            );
        },
        save: function(props) {
            const { attributes } = props;
            const {
                backgroundImage,
                headingText,
                backgroundColor,
                textColor,
                horizontalPosition,
                verticalPosition,
                paddingTop,
                paddingRight,
                paddingBottom,
                paddingLeft
            } = attributes;

            return wp.element.createElement(
                'div',
                {
                    style: {
                        width: '100%',
                        height: '100vh',
                        backgroundImage: backgroundImage ? `url(${backgroundImage})` : 'none',
                        backgroundSize: 'cover',
                        backgroundPosition: 'center',
                        position: 'relative'
                    }
                },
                wp.element.createElement(RichText.Content, {
                    tagName: "h2",
                    value: headingText,
                    style: {
                        color: textColor,
                        backgroundColor: backgroundColor,
                        writingMode: 'vertical-rl',
                        position: 'absolute',
                        left: horizontalPosition + '%',
                        top: verticalPosition + '%',
                        transform: 'translate(-50%, -50%)',
                        paddingTop: paddingTop + 'px',
                        paddingRight: paddingRight + 'px',
                        paddingBottom: paddingBottom + 'px',
                        paddingLeft: paddingLeft + 'px'
                    }
                })
            );
        }
    });
});












