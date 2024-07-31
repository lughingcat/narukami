//セレクトボックス変更に対してphpファイルのincludeを制御
function loadContent(selectElement) {
    var selectedValue = selectElement.value;
    var parentEL = selectElement.parentNode.parentNode//親要素の親要素を取得
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


//ヒーローヘッダーの選択値による読み込みファイルの分岐
jQuery(document).ready(function($) {
    $('input[name="heorheader-type"]').on('change', function() {
        if ($('.partfile-includecontaider').length > 0) {
            var selectedValue = $(this).val();

            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'heroheader_type_change',
                    header_type: selectedValue
                },
                success: function(response) {
                    $('.partfile-includecontaider').html(response);
                }
            });
        } else {
            console.error('[partfile-includecontaider]コンテナが存在しません・');
        }
    });
});



