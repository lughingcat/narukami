const { addFilter } = wp.hooks;
const { createElement, Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, ToggleControl } = wp.components;
const { createHigherOrderComponent } = wp.compose;

// 見出しにカスタム属性を追加
function addPostTitleAttributes( settings, name ) {
    if ( name === 'core/heading' ) {
        settings.attributes = Object.assign( settings.attributes, {
            narukami_underline: {
                type: 'boolean',
                default: false,
            },
        });
    }
    return settings;
}

// インスペクターコントロールにトグルスイッチを追加
const withPostTitleInspectorControls = createHigherOrderComponent( function( BlockEdit ) {
    return function( props ) {
        const { name, attributes, setAttributes, isSelected } = props;

        if ( name !== 'core/heading' ) {
            return createElement( BlockEdit, props );
        }

        // 現在のクラス名を取得し、アンダーラインを管理
        const className = attributes.className || '';
        const hasUnderlineClass = className.includes('narukami_underline');

        return createElement(
            Fragment,
            null,
            createElement( BlockEdit, props ),
            createElement(
                InspectorControls,
                null,
                createElement(
                    PanelBody,
                    { title: 'Post Title Settings' },
                    createElement(ToggleControl, {
                        label: 'Underline',
                        checked: !!attributes.narukami_underline,
                        onChange: function( value ) {
                            setAttributes({ narukami_underline: value });
                            
                            // クラス名を動的に更新
                            let updatedClassName = className;

                            if (value && !hasUnderlineClass) {
                                updatedClassName += ' narukami_underline'; // クラスを追加
                            } else if (!value && hasUnderlineClass) {
                                 updatedClassName = updatedClassName
                                    .replace(/\bnarukami_underline\b/g, '') // クラスを正確に削除
                                    .trim(); // 前後の空白を削除
                            }

                            setAttributes({ className: updatedClassName.trim() }); // クラス名を更新
                        }
                    })
                )
            )
        );
    };
}, 'withPostTitleInspectorControls' );


// アンダーラインを見出しに反映
function addPostTitleUnderlineClass( extraProps, blockType, attributes ) {
    if ( blockType.name === 'core/heading' && attributes.narukami_underline ) {
        extraProps.className = ( extraProps.className || '' ) + ' narukami_underline';
    }
    return extraProps;
}

// フィルターフックを使って機能追加
addFilter(
    'blocks.registerBlockType',
    'underline-sys/add-post-title-attributes',
    addPostTitleAttributes
);

addFilter(
    'editor.BlockEdit',
    'underline-sys/with-post-title-inspector-controls',
    withPostTitleInspectorControls
);

addFilter(
    'blocks.getSaveContent.extraProps',
    'underline-sys/add-post-title-underline-class',
    addPostTitleUnderlineClass
);


