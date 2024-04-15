//セレクトボックス変更に対してphpファイルのincludeを制御
function loadContent(selectElement) {
    var selectedValue = selectElement.value;
	var parentEL = selectElement.parentNode;
    var contentContainer = parentEL.querySelector('div');
	var insertIdGlobalValue = selectElement.getAttribute('data-index');
    if (contentContainer) {
        // Ajaxリクエスト
        jQuery.ajax({
            type: 'GET',
            url: ajax_object.ajax_url,
            data: {
                action: 'load_content',
                selectedValue: selectedValue,
                insertId: insertIdGlobalValue
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


