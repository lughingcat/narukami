
function loadContent() {
    var selectedValue = document.getElementById('cmaker').value;
    var contentContainer = document.getElementById('contentContainer');
    
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
                handleSelectChange();
            }
        });
    } else {
        console.error('contentContainerが見つかりませんでした。');
    }
}


