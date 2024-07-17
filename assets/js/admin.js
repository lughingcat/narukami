/*==================================
トップページビルダーjs
==================================*/
//各セクション詳細表示制御
document.addEventListener('DOMContentLoaded', function(){
	var sectionButtons = document.querySelectorAll('.narukami-hopuo-section-btn');
	sectionButtons.forEach(function(sectionBtn, index){
		var btnId = sectionBtn.id;
		sectionBtn.addEventListener('click',function(){
			if( btnId === 'popup-concept-btn'){
			document.getElementById('hopup-concept-wrap').classList.remove('popup-notshow');
			}
		});
		
	});
});
//セクション詳細非表示ボタン
function hopupDeleteElment(button){
	var btnId = button.id;
	if( btnId === 'concept-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
}
//selectbox移動動作制御
 document.addEventListener('DOMContentLoaded', function() {
	 function initializeSortable() {
    // Sortableのインスタンスを作成
    var sortable = new Sortable(document.getElementById('select-all-wrap'), {
        animation: 150, // ドラッグ時のアニメーション
        ghostClass: 'blue-background-class', // ドラッグ中の要素に適用されるクラス
		handle: '.move-handle',
		onChoose: function (evt) {
            var item = evt.item;
            // 子要素にopen-file-buttonクラスが含まれてない場合
            if (!item.querySelector('.open-file-button')) {
                // ドラッグをキャンセルしてアラートを表示
                evt.preventDefault(); // ドラッグをキャンセル
                alert('保存が完了していません。\n保存をしてからドラッグしてください。');
				item.setAttribute('data-drag-disabled', 'false');
            }
        },
		onStart: function (evt) {
			var item = evt.item;
                // フラグが設定されている場合、ドラッグをキャンセル
                if (item.getAttribute('data-drag-disabled') === 'false') {
                    evt.preventDefault(); // ドラッグをキャンセル
                    return;
                }
            // 並べ替え開始時にエディタを破棄
            tinymce.remove('.narukami-tinymce-editor');
            },
		onEnd: function (evt) { // ドラッグ終了時に実行
           	updateIndices();
			indicesfunc();
			initCustomEditor();
        }
    });
   }
	 initializeSortable();
 });
function updateIndices() {
	const selectBoxes = document.querySelectorAll('.clone-wrap-parent');
	selectBoxes.forEach((box, index) => {
		const scmakerEl = box.querySelector('.cmaker-wrap');
		const contentContainer = box.querySelector('.content-Container');
		const openFileButton = contentContainer.querySelector('.open-file-button');
		const hiddenInput = box.querySelector('input[name="insert_ids[]"]');
		const deleteBtn = box.querySelector('.delete_selectbox_item');
		//親要素
    	// IDを更新
    	box.id = 'clone-wrap_' + index;
		// hidden value,id
    	hiddenInput.value = 'insert-id' + index;
    	hiddenInput.id = 'insert-ids-' + index;
		//deleteBtnのid更新
		deleteBtn.id = 'delete_selectbox_' + index;
		//子要素
    	// data-index,id
    	scmakerEl.dataset.index = 'insert-id'+ index;
    	scmakerEl.id = 'cmaker_'+ index;
    	contentContainer.id = 'contentContainer_'+ index;
		
    });
　childElementRenumber();
}
//各.content-Containerの子要素内のinputの再ナンバリング	
function childElementRenumber(){
	const contentContainer = document.querySelectorAll('.content-Container');
	contentContainer.forEach(function(container,number){
		var inputs = container.querySelectorAll('input');
		var textareas = container.querySelectorAll('textarea');
		var insertIds = container.querySelectorAll('[data-insert-id]');
		var arrayNums = container.querySelectorAll('input[name*="array-num"]');
		arrayNums.forEach(function(arrayNum){
			arrayNum.value = number;
		})
		inputs.forEach(function(input) {
        	var name = input.getAttribute('name');
        	if (name) {
        	    var newName = name.replace(/\[\d+\]/, '[' + number + ']');
        	    input.setAttribute('name', newName);
        	}
        });
		textareas.forEach(function(textarea){
			var name = textarea.getAttribute('name');
			if(name){
				var newName = name.replace(/\[\d+\]/, '[' + number + ']');
				textarea.setAttribute('name', newName);
			}
		})
		insertIds.forEach(function(insertId){
			var dataInsertId = insertId.getAttribute('data-insert-id');
			if(dataInsertId){
				var newValue = 'insert-id' + number;
				insertId.setAttribute('data-insert-id', newValue)
			}
		});
	});
}
//selectbox削除
function deleteSelectboxItem(button){
	var selectboxItems = document.querySelectorAll('.clone-wrap-parent');
	if (selectboxItems.length <= 1) {
    	alert("最後のセレクトボックスは削除できません。");
    	return; // 削除処理を終了
	}
	var confirmDelete = confirm("入力データが完全に消去されます。\n実行しますか？");
	if (confirmDelete) {
		var parentElement = button.parentNode.parentNode;
		parentElement.remove();
		updateIndices();
	}else{
		console.log("削除がキャンセルされました。");
	}
}

function indicesfunc(){
	const scmakerValue = document.getElementsByName('s_cmaker[]');
	const scmakerValues = [];
	for(var i = 0; i < scmakerValue.length; i++){
		scmakerValues.push(scmakerValue[i].value);
	}
	const selectBoxes = document.querySelectorAll('.clone-wrap-parent input[name="insert_ids[]"]');
    const data = Array.from(selectBoxes).map(input => input.value);
	const postData = {
        action: 'custom_ajax_action',
        dataArray: data,
		scmakerArray: scmakerValues
    };
	const url = `${my_ajax_obj.ajaxurl}?action=custom_ajax_action&nonce=${my_ajax_obj.nonce}`;
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
			'X-Requested-With': 'XMLHttpRequest',
        },
        body: JSON.stringify(postData)
    })
    .then(response => response.json()) // JSON形式でレスポンスをパース
    .then(response => {
        if (response.success) {
            const insertIdReloadContainer = document.getElementById('insert-id-reload-value');
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ action: 'notify_top_page' }).toString()
            })
            .then(response => response.json())
            .then(data => {
				if(data.success){
					//ここにレスポンスのDOMを操作するコードを入れる。現段階では何もしない。
				}else{
					console.error('Error:', data.data);
				}
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            console.error('AJAX request failed:', response.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


//selectbox追加動作

function cloneSelectBox() {
	const selectBoxLength = document.querySelectorAll('.clone-wrap-parent').length;
    const originalSelectBox = Array.from(document.querySelectorAll('.clone-wrap-parent'));;
	const lastOriginalSelectBox = originalSelectBox.pop();
    const clonedSelectBox = lastOriginalSelectBox.cloneNode(true);//全体
	
	//各種要素を取得
    const cloneContentContainer = clonedSelectBox.querySelector('.content-Container');
	const cloneSelectbox =  clonedSelectBox.querySelector('.cmaker-wrap');//セレクトボックスのみ
	const insertIdOriginal = clonedSelectBox.querySelector('.insert-item-id');
	const insertDataIndex =  cloneSelectbox.getAttribute('data-index');//セレクトボックスのみ
	const newIndex = insertDataIndex.replace(/\d+$/, '');
	
    // 新しいIDをセット
    clonedSelectBox.id = 'clone-wrap_' + selectBoxLength;
	insertIdOriginal.id = 'insert-ids-' + selectBoxLength;
	insertIdOriginal.value = 'insert-id' + selectBoxLength;
	cloneSelectbox.id = 'cmaker_' + selectBoxLength;//セレクトボックスのみ
	cloneSelectbox.setAttribute('data-index', newIndex + selectBoxLength);//セレクトボックスのみ
	const targetOptionInitial = '選択してください';
	for(let i=0; i < cloneSelectbox.options.length; i++){//セレクトボックスのみ
		const option = cloneSelectbox.options[i];
		if(option.text === targetOptionInitial){
        option.selected = true;
        break;
    	}
	}
    cloneContentContainer.id = 'contentContainer_' + selectBoxLength;
	cloneContentContainer.innerHTML = '';
    // 複製したセレクトボックスを追加
    document.getElementById('clonedSelectBoxes').appendChild(clonedSelectBox);
}

//パララックス動作制御
let handleScroll;
function parallaxControl() {
    const parallaxContainers = document.querySelectorAll(".parallax-container");
    const windowHeight = window.innerHeight; // ビューポートの高さ（表示領域）を測る
    const handleScroll = function() {
        parallaxContainers.forEach(container => {
            const sections = container.querySelectorAll(".parallax-section");
            const parallaxLayers = container.querySelectorAll(".parallax-layer");

            sections.forEach((section, i) => {
                const getElementDistanceTop = section.getBoundingClientRect().top; // セクションの上がトップとどれだけ離れているか
                const getElementDistanceBottom = section.getBoundingClientRect().bottom; // セクションの下がトップとどれだけ離れているか

                if (getElementDistanceTop < windowHeight) {
                    parallaxLayers[i].classList.add('parallax-isblock');
                } else {
                    parallaxLayers[i].classList.remove('parallax-isblock');
                }

                if (getElementDistanceTop < 0 && getElementDistanceBottom > 0) {
                    parallaxLayers[i].classList.add("parallax-isactive");
                } else {
                    parallaxLayers[i].classList.remove("parallax-isactive");
                }

                if (i === sections.length - 1) {
                    parallaxLayers[i].classList.remove("parallax-isactive");
                }
            });
        });
    };

    document.addEventListener("scroll", handleScroll);
    handleScroll(); // 初期ロード時に呼び出しておく
}


//パララックスページ読み込み後関数呼び出し
document.addEventListener('DOMContentLoaded', (event) => {
    // ページ全体が読み込まれた後に実行するコード
    let element = document.getElementById('cmaker_parallax_wrap');
    if (element) {
        parallaxControl(); // parallaxControl() を呼び出す
    }
});

//data-indexの親、子要素のナンバリングを再処理する
function updateDataIndex(element, newIndex) {
    // data-index属性を新しい値に更新
    element.dataset.index = newIndex;

    // 子要素も再帰的に処理
    element.querySelectorAll('[data-index]').forEach((childElement) => {
        let childIndex = parseInt(childElement.dataset.index, 10);
        if (!isNaN(childIndex)) {
            let newChildIndex = childIndex + 1;
            childElement.dataset.index = newChildIndex;
        }
    });
}
//グランドメニューのCRAD
																					  
function grandMenuControl(){
	
//data-index連番振り直し処理
var gmItemDelBtnDataIndex = document.querySelectorAll('.gm-item-del-btn');
gmItemDelBtnDataIndex.forEach(function(gmItemDelBtn){
	gmItemDelBtn.addEventListener('click', function(event){
		//data-indexの連番を振るため、親要素の数を取得する
		let dataIndexParentsLengh = document.querySelectorAll('.img-wrap-function');
		
            //親要素をループ処理
            dataIndexParentsLengh.forEach((parentElement, parentIndex) => {
                newIndex = parentIndex;
				updateDataIndex(parentElement, newIndex);//親要素のナンバリングを関数で処理
				
				// 子要素を再帰的に処理
				parentElement.querySelectorAll('[data-index]').forEach((childElement) => {
				updateDataIndex(childElement, newIndex);
				});
            });
		
			
	});
});
 function addGmElement() {
			let countEl = document.querySelectorAll('.gm-form-style').length;
			let lastNam = countEl -1;
			let plasNam = lastNam +1;
            let gmForm = document.getElementById("gm-form_" + lastNam);
            let addField = gmForm.parentElement;
            let copied = gmForm.cloneNode(true);
            let newId = "gm-form_" + plasNam;
            copied.id = newId;
			 // 子要素の input 要素を選択し、id を変更する
	 		
				
			copied.querySelectorAll('*[id]').forEach((childElement) => {
    		   let childElementId = childElement.id;
			   let lastNumber = parseInt(childElementId.match(/\d+$/), 10); // 末尾の数字を取得し、数値に変換
			   if (!isNaN(lastNumber)) {
			   	let newChildIds = childElementId.replace(/\d+$/, lastNumber + 1);
			   	childElement.id = newChildIds;
			   } else {
			   	console.error('IDに数字が見つかりませんでした。');
			   }
				
    		});
	 		
	 		//コピーで増やした要素のdata-indexの値を親、子要素全て変更する
	 		var copiedNewDataIndex = copied.querySelector('.img-wrap-function');
	 		var dataIndexValue = parseInt(copiedNewDataIndex.dataset.index, 10);
	 		
	 		if (!isNaN(dataIndexValue)) {
		 		copiedNewDataIndex.dataset.index = dataIndexValue + 1;
				copiedNewDataIndex.querySelectorAll('[data-index]').forEach((childElement) => {
				newIndex = copiedNewDataIndex.dataset.index;
				updateDataIndex(childElement, newIndex);
				});
				
	 		} else {
		 		// パースに失敗した場合の処理
		 		console.error("Invalid data-index value");
	 		}
	 		//コピーで増やした要素の削除ボタンを生成
	 		var delBtnNum = copied.querySelector('#gm-del-button_' + plasNam);
	 		delBtnNum.innerHTML = plasNam + 1 + "番目の要素を全削除";
    		addField.appendChild(copied);
            plasNam++;
        }
    
        const gmAddBtn = document.getElementById('gm-elment-add');
        gmAddBtn.addEventListener("click", addGmElement, false);

        


}//gmControle

//グランドメニューのバリテート
document.addEventListener("DOMContentLoaded", function() {
	document.addEventListener('click',function(event){
 	if (event.target.classList.contains("gm-vali-btn")) {
   	    var button = event.target;
   	    var parentEl = button.parentElement;
   	
        var isFormValid = validateForm(parentEl);
   			// 処理が完了している場合、true を返しているのでログを出力
   			if (isFormValid) {
			   var hopupChildIdName = 'valitate-complete';
			   var hopupCloseIdName = 'close-valitate-btn';
			   var hopupChildId = parentEl.querySelector('#' + hopupChildIdName);
			   var hopupCloseId = parentEl.querySelector('#' + hopupCloseIdName);
			   hopupChildId.style.display="block";
			   hopupCloseId.addEventListener('click', ()=>{
					event.preventDefault();
					hopupChildId.style.display="none";
					parentEl.classList.add('notshow');
			   });
   			}else{
				validateForm(parentEl);
			}
	}
	});
});

        function validateForm(parentEl) {
			var emptyInputId;
            var gmform = parentEl.querySelector('#gm-form-erea');
            var inputElements = gmform.querySelectorAll('input');
			var erroeMsegTitle = gmform.querySelectorAll('[id^="gm_title_error_"]');
			var erroeMsegImg = gmform.querySelectorAll('[id^="gm_img_error_"]');
			var erroeMsegLink = gmform.querySelectorAll('[id^="gm_link_error_"]');
            var scrollToElement;
            var hasEmptyInput = false;
			
            inputElements.forEach(function(input) {
                if (input.value.trim() === '') {
                    hasEmptyInput = true;
                    scrollToElement = input;
					emptyInputId = input.id; // 空の input の id を保存
                    input.classList.add('gmform-error'); // 赤い枠で囲む
                } else {
                    input.classList.remove('gmform-error'); // 枠をクリア
					
					erroeMsegTitle.forEach(function(msgtitle) {
   	 		        	msgtitle.style.display = 'none';
   	 		    	});
					erroeMsegImg.forEach(function(msgimg) {
   	 		        	msgimg.style.display = 'none';
   	 		    	});
					erroeMsegLink.forEach(function(msglink) {
   	 		        	msglink.style.display = 'none';
   	 		    	});
					
				}
                
            });
			// emptyInputIdから最後の数字のみを抽出
			var lastNumber = getNumberFromId(emptyInputId);
			
			//取得したエラーメッセージのクラス名を除去し、id名だけを抽出し配列に格納
			var erroeMsegTitleArray = Array.from(erroeMsegTitle).map(element => element.id);
			var erroeMsegImgArray = Array.from(erroeMsegImg).map(element => element.id);
			var erroeMsegLinkArray = Array.from(erroeMsegLink).map(element => element.id);
			
			//エラーメッセージの配列idナンバーを抽出
			var errorMesTitleNum = processMultipleIds(erroeMsegTitleArray);
			var errorMesImgNum = processMultipleIds(erroeMsegImgArray);
			var errorMesLinkNum = processMultipleIds(erroeMsegLinkArray);
			
			//空のid名を取得する
			
			var firstResult = null;
			
			var searchResults = [
				{ key: 'title', result: checkString(emptyInputId, 'title') },
				{ key: 'img', result: checkString(emptyInputId, 'img') },
				{ key: 'link', result: checkString(emptyInputId, 'link') }
			];
			searchResults.forEach(function(result) {
				if (result.result) {
					if (result.result && firstResult === null) {
						firstResult = result.key;
					}
				}
				
				return firstResult;
			});
			
            if (hasEmptyInput && scrollToElement) {
                // 空の input がある場合、その要素までスクロール
                scrollToElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
			}
			if(hasEmptyInput){
				var findTextEl = errorMesTitleNum.find(function(element){
					return element === lastNumber;
				});
				var findImgEl = errorMesImgNum.find(function(element){
					return element === lastNumber;
				});
				
				var findLinkEl = errorMesLinkNum.find(function(element){
					return element === lastNumber;
				});
				
				if(firstResult === 'title'){
					erroeMsegTitle[findTextEl].style.display = 'block';
					
				}
				if(firstResult === 'img'){
					erroeMsegImg[findImgEl].style.display = 'block';
				}
				if(firstResult === 'link'){
					erroeMsegLink[findLinkEl].style.display = 'block';
				}
				var inputElementsArray = Array.from(inputElements);
				var emptyInputs = inputElementsArray.filter(function(input) {
					return input.value.trim() === '';
				});
				emptyInputs.forEach(function(emptyInput) {
					emptyInput.addEventListener('input', function(event) {
						if(firstResult === 'title'){
							erroeMsegTitle[findTextEl].style.display = 'none';
							this.classList.remove('gmform-error');
						}
						if(firstResult === 'img'){
							erroeMsegImg[findImgEl].style.display = 'none';
							this.classList.remove('gmform-error');
						}
						if(firstResult === 'link'){
							erroeMsegLink[findLinkEl].style.display = 'none';
							this.classList.remove('gmform-error');
						}
					});
				});
			}
			
		return !hasEmptyInput;
		}



//idのナンバーを抜き出す関数
function getNumberFromId(id) {
    if (!id) {
        return null;
    }
    // アンダースコアで分割し、最後の部分（数字）を取得
    var parts = id.split('_');

    // 分割された部分が存在しない場合はnullを返す
    if (!parts || parts.length === 0) {
        return null;
    }

    var lastPart = parts[parts.length - 1];

    // 数字が存在する場合は抽出された数字を返す。存在しない場合はnullを返す。
    return lastPart.match(/\d+/) ? parseInt(lastPart, 10) : null;
}
//getNumberFromIdを使い配列を処理する関数
function processMultipleIds(ids) {
    var numbers = ids.map(getNumberFromId);
	return numbers;
}
//空のinputタグのidを照合する関数

function checkString(variable, searchString) {
	variable = variable || '';
    return variable.includes(searchString);
}



function gmImgListAnimation(){
//gmリスト表示の遅延処理
var items = document.getElementsByClassName('gm-item-wrap');
var itemsArray = Array.from(items);
    itemsArray.forEach(function(item, index) {
        setTimeout(function() {
            item.classList.add('show');
        }, index * 300); // 各要素が0.2秒ずつ遅れて表示される
    });
}


document.addEventListener("DOMContentLoaded", function(event) {
    gmImgListAnimation();
});
//gmアイテム削除ボタン関数
function deleteParentEl(button) {
			let elements = document.querySelectorAll('.gm-form-style');
			// 最後の1つの要素になった場合
			if (elements.length === 1) {
				alert("最後の要素は削除できません");
				return; // 削除しない
			}
            var parentEl = button.parentElement;
            if (parentEl) {
               	parentEl.remove();
				
				let elements = document.querySelectorAll('.gm-form-style');
   				elements.forEach((el, index) => {
   				    el.id = "gm-form_" + index;
               	});
				
				
				var delBtnNum = document.querySelectorAll('.gm-item-del-btn');
				delBtnNum.forEach((el,index)=>{
					el.innerHTML = index + 1 + "番目のメニューを全削除。";	
				});
				
				elements.forEach((element) => {
				let parentNum = parseInt(element.id.match(/\d+$/), 10);
				var nodesWithId = element.querySelectorAll('*[id]');
				Array.from(nodesWithId).forEach((node, nodeIdex) => {
					let currentId = node.id;
					let lastNumbers = parseInt(currentId.match(/\d+$/), 10);
					// 新しいIDを生成する
					let newId = `${currentId.replace(/\d+$/, parentNum)}`;
					// 新しいIDを割り当てる
					node.id = newId;
				});
				});
				
			}
}

function handleRankSettings(rankCheck, itemImg, itemTitle, itemPrice, itemUrl, itemUrlBtn, itemUrlClear, overlay, rankShowValue, rankNotShowValue, number) {
	if( rankNotShowValue.checked ){
		itemImg.disabled = true;
		itemTitle.disabled = true;
		itemPrice.disabled = true;
		itemUrl.disabled = true;
		itemUrlBtn.disabled = true;
		itemUrlClear.disabled = true;
		overlay.style.display = "";
	}else if( rankShowValue.checked ){
		itemImg.disabled = false;
		itemTitle.disabled = false;
		itemPrice.disabled = false;
		itemUrl.disabled = false;
		itemUrlBtn.disabled = false;
		itemUrlClear.disabled = false;
		overlay.style.display = "none";
	}	
    rankCheck.forEach(function(e) {
        e.addEventListener("click", function() {           
            const clickedInput = event.target;
    		const rankValue = clickedInput.value;
            if (rankValue === "rank_not_show_" + number) {
                itemImg.disabled = true;
                itemTitle.disabled = true;
                itemPrice.disabled = true;
                itemUrl.disabled = true;
                itemUrlBtn.disabled = true;
                itemUrlClear.disabled = true;
                overlay.style.display = "";
            } else if (rankValue === "rank_show_" + number) {
                itemImg.disabled = false;
                itemTitle.disabled = false;
                itemPrice.disabled = false;
                itemUrl.disabled = false;
                itemUrlBtn.disabled = false;
                itemUrlClear.disabled = false;
                overlay.style.display = "none";
            }
        });
    });
}
//ランキング表示非表示切り替え1
function rankingControl(idNum){
	const parentEl = document.getElementById('contentContainer_' + idNum);
//ランキング1	
handleRankSettings(
	parentEl.querySelectorAll('input[name="rank_on[' + idNum + ']"]'), 
    parentEl.querySelector('#item_img_url'), 
    parentEl.querySelector('#rank1-item-title'), 
    parentEl.querySelector('#rank-item-price'), 
    parentEl.querySelector('#rank-item-url'), 
    parentEl.querySelector('#item_img_url_btn'), 
    parentEl.querySelector('#item_img_url_clear'), 
    parentEl.querySelector('#rank-notshow-overlay'),
	parentEl.querySelector('#rank-1-show'),
	parentEl.querySelector('#rank-1-notshow'),
	1
);
//ランキング2	
handleRankSettings(
	parentEl.querySelectorAll('input[name="rank_on_2[' + idNum + ']"]'), 
    parentEl.querySelector('#item_img_url_2'), 
    parentEl.querySelector('#rank2-item-title'), 
    parentEl.querySelector('#rank2-item-price'), 
    parentEl.querySelector('#rank2-item-url'), 
    parentEl.querySelector('#item_img_url_2_btn'), 
    parentEl.querySelector('#item_img_url_2_clear'), 
    parentEl.querySelector('#rank-notshow-overlay-2'),
	parentEl.querySelector('#rank-2-show'),
	parentEl.querySelector('#rank-2-notshow'),
	2
);
//ランキング3	
handleRankSettings(
	parentEl.querySelectorAll('input[name="rank_on_3[' + idNum + ']"]'), 
    parentEl.querySelector('#item_img_url_3'), 
    parentEl.querySelector('#rank3-item-title'), 
    parentEl.querySelector('#rank3-item-price'), 
    parentEl.querySelector('#rank3-item-url'), 
    parentEl.querySelector('#item_img_url_3_btn'), 
    parentEl.querySelector('#item_img_url_3_clear'), 
    parentEl.querySelector('#rank-notshow-overlay-3'),
	parentEl.querySelector('#rank-3-show'),
	parentEl.querySelector('#rank-3-notshow'),
	3
);
//ランキング4	
handleRankSettings(
	parentEl.querySelectorAll('input[name="rank_on_4[' + idNum + ']"]'), 
    parentEl.querySelector('#item_img_url_4'), 
    parentEl.querySelector('#rank4-item-title'), 
    parentEl.querySelector('#rank4-item-price'), 
    parentEl.querySelector('#rank4-item-url'), 
    parentEl.querySelector('#item_img_url_4_btn'), 
    parentEl.querySelector('#item_img_url_4_clear'), 
    parentEl.querySelector('#rank-notshow-overlay-4'),
	parentEl.querySelector('#rank-4-show'),
	parentEl.querySelector('#rank-4-notshow'),
	4
);
//ランキング5	
handleRankSettings(
	parentEl.querySelectorAll('input[name="rank_on_5[' + idNum + ']"]'), 
    parentEl.querySelector('#item_img_url_5'), 
    parentEl.querySelector('#rank5-item-title'), 
    parentEl.querySelector('#rank5-item-price'), 
    parentEl.querySelector('#rank5-item-url'), 
    parentEl.querySelector('#item_img_url_5_btn'), 
    parentEl.querySelector('#item_img_url_5_clear'), 
    parentEl.querySelector('#rank-notshow-overlay-5'),
	parentEl.querySelector('#rank-5-show'),
	parentEl.querySelector('#rank-5-notshow'),
	5
);
//ランキング6
handleRankSettings(
	parentEl.querySelectorAll('input[name="rank_on_6[' + idNum + ']"]'), 
    parentEl.querySelector('#item_img_url_6'), 
    parentEl.querySelector('#rank6-item-title'), 
    parentEl.querySelector('#rank6-item-price'), 
    parentEl.querySelector('#rank6-item-url'), 
    parentEl.querySelector('#item_img_url_6_btn'), 
    parentEl.querySelector('#item_img_url_6_clear'), 
    parentEl.querySelector('#rank-notshow-overlay-6'),
	parentEl.querySelector('#rank-6-show'),
	parentEl.querySelector('#rank-6-notshow'),
	6
);
}//rankingControlEnd

//トップ各項目タイトル時間差表示関数
const animateTextWithSpans = function(selector, delay = 100) {
    const wrapCharSpan = function(str) {
        return [...str].map(char => `<span>${char}</span>`).join('');
    }

    const target = document.querySelector(selector);
    if (!target) {
        console.error(`Element with selector ${selector} not found.`);
        return;
    }

    const originalText = target.textContent; // 元の文字列を保持

    // 初回の呼び出しで元の文字列を span 要素で置き換える
    target.innerHTML = wrapCharSpan(originalText);

    Array.from(target.children).forEach((char, index) => {
        window.setTimeout(function () {
            char.classList.add('is-animated');
        }, delay * index);
    });
}
//各ページクローズボタン実装
function closeFile(closeEl) {
    targetPage = closeEl.parentNode;
    targetPage.classList.add('notshow');
}
//セレクトボックスの選択で.notshowを削除しファイルを表示
function loadCloseClass(element, parentIdNum){
	const targetClass = document.querySelectorAll('.content-Container')[parentIdNum];
	const childElement = targetClass.getElementsByClassName("show-element")[0]; 
	childElement.classList.remove('notshow');
}

//セレクトボックスを操作せずに選択しているファイルを開く
function openPageElement(button) {
    const parentEl = button.parentElement;
    let grandmenuWrap = parentEl.querySelector('.cmakerWrapgrandmenu');
    let conceptWrap = parentEl.querySelector('.cmakerWrapConcept');
	let rankingWrap = parentEl.querySelector('.cmaker-wrap-ranking');
	let column_right_1 = parentEl.querySelector('.cmakerWrapcolumn_right_1');
	let column_left_1 = parentEl.querySelector('.cmakerWrapcolumn_left_1');
	let column_2 = parentEl.querySelector('.cmakerWrapcolumn_2');
	let column_3 = parentEl.querySelector('.cmakerWrapcolumn_3');
	let storeInfo = parentEl.querySelector('.cmakerWrapstore_info');
	let textContent = parentEl.querySelector('.cmakerWraptext_content');
	let parallax = parentEl.querySelector('.cmakerWrapparallax');
	let buttonId = parentEl.id;
	let idNum = buttonId.match(/\d+$/)[0];
    if (grandmenuWrap) {
        grandmenuWrap.classList.toggle('notshow');
    } else if (conceptWrap) {
        conceptWrap.classList.toggle('notshow');
    } else if (rankingWrap) {
		rankingWrap.classList.toggle('notshow');
		rankingControl(idNum);
	} else if (column_right_1){
		column_right_1.classList.toggle('notshow');
	} else if (column_left_1){
		column_left_1.classList.toggle('notshow');
	} else if (column_2){
		column_2.classList.toggle('notshow');
	} else if (column_3){
		column_3.classList.toggle('notshow');
	} else if (storeInfo){
		storeInfo.classList.toggle('notshow');
	} else if (textContent){
		textContent.classList.toggle('notshow');
	} else if (parallax){
		parallax.classList.toggle('notshow');
	}
}

function handleSelectChange(selectName, parentIdNum) {
    var selectedValue = selectName;
	commonInitialization();
    if (selectedValue === "parallax") {
		
        parallaxControl();
		loadCloseClass(selectedValue, parentIdNum);
        animateTextWithSpans('.parallax-title');
		
    } else if (selectedValue === "grandmenu") {
		
        grandMenuControl();
		gmImgListAnimation();
		loadCloseClass(selectedValue, parentIdNum);
        animateTextWithSpans('.gm-primary-title');
		
    } else if (selectedValue === "concept") {
		
		loadCloseClass(selectedValue, parentIdNum);
        animateTextWithSpans('.concept-main-title');
		initCustomEditor();
		
    } else if (selectedValue === "ranking") {
		
        rankingControl(parentIdNum);
		loadCloseClass(selectedValue, parentIdNum);
        animateTextWithSpans('.r-p-t-prev');
		
    } else if (selectedValue === "store_info") {
		
		loadCloseClass(selectedValue, parentIdNum);
        animateTextWithSpans('.store-info-p_title');
		
    } else if (selectedValue === "column_right_1"){
		
		loadCloseClass(selectedValue, parentIdNum);
		animateTextWithSpans('.column_right_1-main-title');
		initCustomEditor();
		
	} else if (selectedValue === "column_left_1"){
		
		loadCloseClass(selectedValue, parentIdNum);
		animateTextWithSpans('.column_left_1-main-title');
		initCustomEditor();
		
	} else if (selectedValue === "column_2"){
		
		loadCloseClass(selectedValue, parentIdNum);
		initCustomEditor();
		
	} else if (selectedValue === "column_3"){
		
		loadCloseClass(selectedValue, parentIdNum);
		initCustomEditor();
		
	} else if (selectedValue === "text_content"){
		
		loadCloseClass(selectedValue, parentIdNum);
		animateTextWithSpans('.text_content-main-title');
		initCustomEditor();
	}
}
function commonInitialization(){
	document.removeEventListener("scroll", handleScroll);
}

function rankingRemoved(select){
	const rankingValue = 'ranking';
    const selectboxes = document.querySelectorAll('.cmaker-wrap');
    // 現在のセレクトボックスの値を取得
    const selectedValue = select.value;

    // すべてのセレクトボックスをループ
    selectboxes.forEach(function(box) {
        const options = box.querySelectorAll('option');
        options.forEach(function(option) {
            if (option.value === rankingValue) {
                // 他のセレクトボックスでランキングが選択されているかチェック
                let isRankingSelectedInOtherBox = false;
                selectboxes.forEach(function(otherBox) {
                    if (otherBox !== box && otherBox.value === rankingValue) {
                        isRankingSelectedInOtherBox = true;
                    }
                });
                // 現在のセレクトボックスがランキングを選択していない場合
                if (box !== select) {
                    option.disabled = isRankingSelectedInOtherBox;
                } else {
                    option.disabled = false; // 選択されているボックスではランキングは無効にしない
                }
            }
        });
    });
}

// ページ読み込み時にも初期化を行う
document.addEventListener('DOMContentLoaded', function() {
    const selectboxes = document.querySelectorAll('.cmaker-wrap');
    selectboxes.forEach(function(select) {
        select.addEventListener('change', function() {
            rankingRemoved(select);
        });

        // 初期化時に呼び出し
        rankingRemoved(select);
    });
});




/*==================================
メディアアップローダーjs
==================================*/

//idをクリックしたボタンから抜き出し、アップローダ関数を実行(single)
function uploaderOpenClick(button) {
    var buttonId = button.id;
	var singleName = buttonId.replace(/_btn|\d/g, '');
	var insertIdName = button.getAttribute('data-insert-id');
	var insertLastNumber = parseInt(insertIdName.match(/\d+$/)[0]);
    initializeUploader(jQuery, singleName, insertIdName, insertLastNumber);
  }

//削除ボタンの実装(single)
function uploaderdeleteClick(button) {
    var buttonIdDel = button.id;
	var singleNameDel = buttonIdDel.replace(/_clear|\d/g, '');
	var insertIdName = button.getAttribute('data-insert-id');
	var insertLastNumber = parseInt(insertIdName.match(/\d+$/)[0]);
    deleteImgUploader(jQuery, singleNameDel, insertIdName, insertLastNumber); 
}

//削除ボタン関数(single)
function deleteImgUploader($, name, insertIdName, insertLastNumber){
        $("input:text[name='" + name + "[" + insertLastNumber + "]'][data-insert-id='" + insertIdName + "']").val("");
        $("#" + name + "_thumbnail[data-insert-id=" + insertIdName + "]").empty();
}

//アップローダsingle  
function initializeUploader($, name, insertIdName, insertLastNumber) {
    var custom_uploader = wp.media({
        title: "画像を選択してください",
        library: {
            type: "image"
        },
        button: {
            text: "画像の選択"
        },
        multiple: false
    });
    custom_uploader.on("select", function () {
        var images = custom_uploader.state().get("selection");
        images.each(function (file) {
            var inputName = $("input:text[name='" + name + "[" + insertLastNumber + "]'][data-insert-id='" + insertIdName + "']");
            var thumbnailContainer = $("#" + name + "_thumbnail[data-insert-id=" + insertIdName + "]");
            if (inputName.length && thumbnailContainer.length) {
                inputName.val(file.attributes.url); // ファイルのURLを挿入
                thumbnailContainer.empty();
                thumbnailContainer.append('<img src="' + file.attributes.sizes.thumbnail.url + '" />');
            }
        });
    });

    custom_uploader.open();
}
//idをクリックしたボタンから抜き出し、アップローダ関数を実行(multi)
function uploaderOpenClickMultiple(button) {
    var buttonIdMult = button.id;
	var indexValue = button.getAttribute("data-index");
	var dataIndexValue = button.getAttribute("data-insert-id");
	var singleNameMult = buttonIdMult.replace(/_btn_(\d+)$/, '');
    initializeUploaderMult(jQuery, singleNameMult, indexValue, dataIndexValue);
  }

//削除ボタンの実装(multi)
function uploaderdeleteClickMulti(button) {
    var buttonIdDel = button.id;
	var multiNameDel = buttonIdDel.replace(/_clear_(\d+)$/, '');
	var delBtnDataIndex = button.getAttribute('data-index');
	var insertIdName = button.getAttribute('data-insert-id');
    deleteImgUploaderMulti(jQuery, multiNameDel, delBtnDataIndex, insertIdName); 
}

//削除ボタン関数(multi)
function deleteImgUploaderMulti($, name, index, insertIdName){
        $('#' + name + '_' + index + '[data-insert-id="' + insertIdName + '"]').val('');
        $('#' + name + '_thumbnail_' + index + '[data-insert-id="' + insertIdName + '"]').empty();
}


//アップローダmult
var custom_uploaders = [];
function initializeUploaderMult($, name, index, insertIdName) {
            custom_uploaders[index] = wp.media({
                title: '画像を選択してください',
                library: {
                    type: 'image'
                },
                button: {
                    text: '画像の選択'
                },
                multiple: false
            });

            custom_uploaders[index].on('select', function () {
                var images = custom_uploaders[index].state().get('selection');
                images.each(function (file) {
                    $('#' + name + '_' + index + '[data-insert-id="' + insertIdName + '"]').val(file.attributes.url);
                    $('#' + name + '_thumbnail_' + index + '[data-insert-id="' + insertIdName + '"]').empty();
                    $('#' + name + '_thumbnail_' + index + '[data-insert-id="' + insertIdName + '"]').append('<img src="' + file.attributes.sizes.thumbnail.url + '" />');
                });
            });

        // アップローダーを開く
        custom_uploaders[index].open();
}

/*==================================
サブフッターCRUDシステムjs
==================================*/

document.addEventListener('DOMContentLoaded', function() {
new Vue({
	el: '#subfooters',
	data(){
		return{
			subfooters:[{ text: '', url: ''}],
			active: false,
			addActive: false,
			ismoveOn: false,
			isBgSwich: false,
			subfooterPlhText: 'タイトルを入力してください',
			subfooterPlhUrl: 'URLを入力してください',
		}
	},
	
	
	mounted() { 
    if (localStorage.getItem('subfooters')) { //ストレジのkeyを検索
      try { //json -> stringに変換
        this.subfooters = JSON.parse(localStorage.getItem('subfooters'));
      } catch(e) { //データに問題があった場合に削除
        localStorage.removeItem('subfooters');
      }
    }
	 window.onload = ()=>{
	  var sfNum = this.subfooters.length;
	  if( sfNum <= 5 ){
	   this.addActive = false;
	  }if( sfNum > 5 ){
	   this.addActive = true;
	  }
	}
  },
	
	
	methods:{
		add: function(){
			var sfNum = this.subfooters.length;
			if( sfNum <= 5){
			this.subfooters.push({ text: '', url:'' });
			}
		},
		
		del: function(index){
			this.subfooters.splice(index,1);
		},
		delall : function(){
			this.subfooters.splice(0,this.subfooters.length);
		},
		
		dragList(event, dragIndex){
        event.dataTransfer.effectAllowed = 'move'
        event.dataTransfer.dropEffect = 'move'
        event.dataTransfer.setData('drag-index',dragIndex)
      },
      dropList(event, dropIndex){
        const dragIndex = event.dataTransfer.getData('drag-index')
        const deleteList = this.subfooters.splice(dragIndex, 1);
        this.subfooters.splice(dropIndex, 0, deleteList[0])
      },
	  tempSave(){
	  const parsed = JSON.stringify(this.subfooters);
	  localStorage.setItem('subfooters', parsed);
      alert('保存に成功しました。\n「公開」または「全体をサイトへ反映」をクリックしてサイトへ反映してください。')
    },
	  reactive: function(){
		  this.active = !this.active;
	},
	  moveON: function(){
		  this.ismoveOn = !this.ismoveOn;
	},
	  BgSwich: function(){
		  this.isBgSwich = !this.isBgSwich;
	},
	  changeBtnAdd: function(){
		  var sfNum = this.subfooters.length;
		  if( sfNum <= 5 ){
			  this.addActive = false;
		  }if( sfNum > 5 ){
			  this.addActive = true;
		  }
	}

	}

});
	});
