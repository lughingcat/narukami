function initCustomEditor() {
    var editorSelector = '.narukami-tinymce-editor';
    if (typeof tinymce !== 'undefined') {
		tinymce.remove();
        tinymce.init({
            selector: editorSelector,
			forced_root_block: false,
    		force_br_newlines: true,
    		force_p_newlines: false,
    		forced_root_block_attrs: {
    		    'data-editor': 'true'
    		},
            height: 300,
            menubar: false,
            plugins: [
                'lists link image charmap ',
                'fullscreen',
                'media paste',
				'colorpicker', 'compat3x', 'directionality', 'hr', 'tabfocus', 'textcolor',
                'wordpress', 'wpautoresize', 'wpdialogs', 'wpeditimage', 'wpemoji',
                'wpgallery', 'wplink', 'wptextpattern', 'wpview',
            ],
            toolbar: 'undo redo | bold italic underline backcolor forecolor | ' +
                     'link charmap | '　+
					 'fullscreen | removeformat | help',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
			setup: function(editor) {
          　		editor.on('focus', function() {
				  var content = editor.getContent();
				  var hiddenTextarea = editor.getElement();
				  var filteredContent = content.replace(/<p>/gi, '').replace(/<\/p>/gi, '');
				  
                  editor.setContent(filteredContent, { format: 'html' });
                  if (hiddenTextarea) {
                      hiddenTextarea.value = filteredContent;
                  }
          　  　	});
				editor.on('paste', function(event) {
            		setTimeout(() => {
                		let content = editor.getContent();
                		content = content.replace(/<p>/g, '').replace(/<\/p>/g, ''); // <p>タグを削除
                		editor.setContent(content);
            		}, 50);
        		});

        		// `paste_preprocess` を使う場合
				editor.on('init', function() {
            		editor.settings.paste_preprocess = function(plugin, args) {
                	args.content = args.content.replace(/<p>/g, '').replace(/<\/p>/g, '');
            		};
        		});
				//変更をリアルタイムでテキストエリアをオーバーライド
				editor.on('change input keyup', function() {
					var textareaElement = editor.getElement(); // 元の <textarea> を取得
                	var textareaName = jQuery(textareaElement).attr('name'); // 最新の name を取得
	
                	console.log(editor.getContent()); // デバッグ用
                	console.log(textareaName); // デバッグ用
                	
                	jQuery('textarea[name="' + textareaName + '"]').val(editor.getContent()); // 値を反映
            	});
          　}
        });
    } else {
        console.error('TinyMCE is not defined');
    }
}
jQuery(document).ready(function($) {
    initCustomEditor();
});


