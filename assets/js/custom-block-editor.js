//鳴雷見出し機能追加

//見出し宣言
const { createElement, Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, RadioControl, TextControl } = wp.components;
const { createHigherOrderComponent } = wp.compose;

// 見出しにカスタム属性を追加
function addPostTitleAttributes( settings, name ) {
    if ( name === 'core/heading' ) {
        settings.attributes = Object.assign( settings.attributes, {
            narukami_headingStyle: {
                type: 'string',
                default: '', // クラスなしがデフォルト
            },
            narukami_subtitle: {
                type: 'string',
                default: '', // 空のサブタイトルがデフォルト
            },
			 narukami_subtitleAlignment: {
                type: 'string',
                default: '', // デフォルトは左揃え
            },
        });
    }
    return settings;
}

// インスペクターコントロールにラジオボタンとテキスト入力を追加
const withPostTitleInspectorControls = createHigherOrderComponent( function( BlockEdit ) {
    return function( props ) {
        const { name, attributes, setAttributes } = props;

        if ( name !== 'core/heading' ) {
            return createElement( BlockEdit, props );
        }

        const className = attributes.className || '';
        const selectedStyle = attributes.narukami_headingStyle || '';
		const subtitle = attributes.narukami_subtitle || '';
		const textAlignment = attributes.narukami_subtitleAlignment || '';
		
        return createElement(
            Fragment,
            null,
            createElement(
                'div',
                {
        			className: `${className}1` // ここで動的にクラスを追加
    			},
                createElement( BlockEdit, props ),
                subtitle && createElement(
    			'p',
    			{ className: 'wp-block-heading narukami-subtitle', style: { textAlign: textAlignment } },
				subtitle
				)
            ),
            createElement(
                InspectorControls,
                null,
                createElement(
                    PanelBody,
                    { title: '鳴雷見出しデザイン' },
                    createElement(RadioControl, {
                        label: 'スタイルを選択',
                        selected: selectedStyle,
                        options: [
                            { label: 'デフォルト', value: '' },
                            { label: 'スタイル1', value: 'narukami-hedding-style1' },
                            { label: 'スタイル2', value: 'narukami-hedding-style2' },
                            { label: 'スタイル3', value: 'narukami-hedding-style3' },
                        ],
                        onChange: function( value ) {
                            let updatedClassName = className
                                .replace(/\bnarukami-hedding-style1\b|\bnarukami-hedding-style2\b|\bnarukami-hedding-style3\b/g, '')
                                .trim();

                            if ( value ) {
                                updatedClassName += ' ' + value;
                            } else {
                                // デフォルトを選択した場合、サブタイトルを空にする
                                setAttributes({ narukami_subtitle: '' });
                            }

                            setAttributes({
                                narukami_headingStyle: value,
                                className: updatedClassName.trim(),
                            });
                        },
                    }),
                    createElement(TextControl, {
                        label: 'サブタイトル',
                        value: attributes.narukami_subtitle,
                        onChange: function( value ) {
                            setAttributes({ narukami_subtitle: value });
                        },
                    }),
					createElement(
                        RadioControl,
                        {
                            label: 'サブタイトルの配置',
                            selected: attributes.narukami_subtitleAlignment,
                            options: [
                                { label: '左揃え', value: 'left' },
                                { label: '中央揃え', value: 'center' },
                                { label: '右揃え', value: 'right' },
                            ],
                            onChange: function( value ) {
                                setAttributes({ narukami_subtitleAlignment: value });
                            },
                        }
                    )
                )
            )
        );
    };
}, 'withPostTitleInspectorControls' );


// クラスとサブタイトルを見出しに反映
function addPostTitleStyleClass( extraProps, blockType, attributes ) {
    if ( blockType.name === 'core/heading' && attributes.narukami_headingStyle ) {
        // 既に追加されていない場合のみクラスを追加
        const currentClassName = extraProps.className || '';
        const styleClass = attributes.narukami_headingStyle;
        
        if (!currentClassName.includes(styleClass)) {
            extraProps.className = currentClassName + ' ' + styleClass;
        }
    }
    return extraProps;
}



addFilter(
    'blocks.registerBlockType',
    'narukami/add-post-title-attributes',
    addPostTitleAttributes
);

addFilter(
    'editor.BlockEdit',
    'narukami/with-post-title-inspector-controls',
    withPostTitleInspectorControls
);

addFilter(
    'blocks.getSaveContent.extraProps',
    'narukami/add-post-title-style-class',
    addPostTitleStyleClass
);

// Subtitlesとスタイルのカスタマイズを blocks.getSaveContent.extraProps で追加










