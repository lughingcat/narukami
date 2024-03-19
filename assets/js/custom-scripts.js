
function loadContent(selectElement) {
    var selectedValue = selectElement.value;
	var parentEL = selectElement.parentNode;
    var contentContainer = parentEL.querySelector('div');
    
    if (contentContainer) {
        // Ajaxリクエスト
        jQuery.ajax({
            type: 'GET',
            url: ajax_object.ajax_url,
            data: {
                action: 'load_content',
                selectedValue: selectedValue
            },
            success: function(response) {
                // サーバーからの応答を表示対象の要素に設定
                contentContainer.innerHTML = response;
                handleSelectChange(selectedValue);
            }
        });
    } else {
        console.error('contentContainerが見つかりませんでした。');
    }
}


