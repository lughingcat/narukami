//セレクトボックス変更に対してphpファイルのincludeを制御
function loadContent(selectElement) {
    var selectedValue = selectElement.value;
    var parentEL = selectElement.parentNode;
    var parentIdNum = parentEL.id.replace(/\D/g, '');
    var contentContainer = parentEL.querySelector('.content-Container');
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
                try {
                    // サーバーからの応答がエラーメッセージを含んでいるか確認
                    if (response.startsWith('Error:')) {
                        throw new Error(response);
                    }
                    // サーバーからの応答を表示対象の要素に設定
                    contentContainer.innerHTML = response;
                    handleSelectChange(selectedValue, parentIdNum);
					console.log(ajax_object);
                } catch (error) {
                    console.error('Error in success handler:', error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // AJAXリクエスト自体のエラーをコンソールに出力
                console.error('AJAX error:', textStatus, errorThrown);
            }
        });
    } else {
        console.error('contentContainerが見つかりませんでした。');
    }
}



