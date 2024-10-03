const { addFilter } = wp.hooks;
const { createElement, Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, ToggleControl } = wp.components;
const { createHigherOrderComponent } = wp.compose;

// 見出しにカスタム属性を追加
function addPostTitleAttributes( settings, name ) {
    if ( name === 'core/heading' ) {
        settings.attributes = Object.assign( settings.attributes, {
            underline: {
                type: 'boolean',
                default: false,
            },
        });
		console.log(settings.attributes);
    }
    return settings;
}

// インスペクターコントロールにトグルスイッチを追加
const withPostTitleInspectorControls = createHigherOrderComponent( function( BlockEdit ) {
    return function( props ) {
        const { name, attributes, setAttributes } = props;

        // 見出しブロックが選択された場合のみインスペクターパネルに表示
        if ( name !== 'core/heading' ) {
            return createElement( BlockEdit, props );
        }

        return createElement(
            Fragment,
            null,
            createElement( BlockEdit, props ),
            createElement(
                InspectorControls,
                null,
                createElement(
                    PanelBody,
                    { title: 'Heading Settings' },
                    createElement(ToggleControl, {
                        label: 'Underline',
                        checked: !!attributes.underline,
                        onChange: function( value ) {
                            setAttributes({ underline: value });
                        }
                    })
                )
            )
        );
    };
}, 'withPostTitleInspectorControls' );

// アンダーラインを見出しに反映
function addPostTitleUnderlineClass( extraProps, blockType, attributes ) {

    if ( blockType.name === 'core/heading' && attributes.underline ) {
        extraProps.className = ( extraProps.className || '' ) + ' underline';
    }
    return extraProps;
}

// フィルターフックを使って機能追加
addFilter(
    'blocks.registerBlockType',
    'my-plugin/add-post-title-attributes',
    addPostTitleAttributes
);

addFilter(
    'editor.BlockEdit',
    'my-plugin/with-post-title-inspector-controls',
    withPostTitleInspectorControls
);

addFilter(
    'blocks.getSaveContent.extraProps',
    'my-plugin/add-post-title-underline-class',
    addPostTitleUnderlineClass
);
