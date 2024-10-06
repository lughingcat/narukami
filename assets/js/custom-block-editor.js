const { addFilter } = wp.hooks;
const { createElement, Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, RadioControl } = wp.components;
const { createHigherOrderComponent } = wp.compose;

// 見出しにカスタム属性を追加
function addPostTitleAttributes( settings, name ) {
    if ( name === 'core/heading' ) {
        settings.attributes = Object.assign( settings.attributes, {
            narukami_headingStyle: {
                type: 'string',
                default: '', // クラスなしがデフォルト
            },
        });
    }
    return settings;
}

// インスペクターコントロールにラジオボタンを追加
const withPostTitleInspectorControls = createHigherOrderComponent( function( BlockEdit ) {
    return function( props ) {
        const { name, attributes, setAttributes } = props;

        if ( name !== 'core/heading' ) {
            return createElement( BlockEdit, props );
        }

        // 現在のクラス名を取得し、スタイルを管理
        const className = attributes.className || '';
        const selectedStyle = attributes.narukami_headingStyle || '';

        return createElement(
            Fragment,
            null,
            createElement( BlockEdit, props ),
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
                            // クラス名を動的に更新
                            let updatedClassName = className
                                .replace(/\bnarukami-hedding-style1\b|\bnarukami-hedding-style2\b|\bnarukami-hedding-style3\b/g, '') // 既存のスタイルクラスを削除
                                .trim(); // 空白を削除

                            if ( value ) {
                                updatedClassName += ' ' + value; // 新しいスタイルを追加
                            }

                            setAttributes({
                                narukami_headingStyle: value,
                                className: updatedClassName.trim(), // クラス名を更新
                            });
                        },
						style: { marginTop: '5px', marginBottom: '5px' } 
                    })
                )
            )
        );
    };
}, 'withPostTitleInspectorControls' );

// クラスを見出しに反映
function addPostTitleStyleClass( extraProps, blockType, attributes ) {
    if ( blockType.name === 'core/heading' && attributes.narukami_headingStyle ) {
        extraProps.className = ( extraProps.className || '' ) + ' ' + attributes.narukami_headingStyle;
    }
    return extraProps;
}

// フィルターフックを使って機能追加
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
