function initCustomEditor() {
    var editorSelector = '.narukami-tinymce-editor';
    if (typeof tinymce !== 'undefined') {
		tinymce.remove();
        tinymce.init({
            selector: editorSelector,
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
                     'alignleft aligncenter alignright alignjustify | ' +
                     'bullist numlist outdent indent | link charmap | '　+
					 'fullscreen | removeformat | help',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true
        });
    } else {
        console.error('TinyMCE is not defined');
    }
}
jQuery(document).ready(function($) {
    initCustomEditor();
});

