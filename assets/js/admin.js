/*==================================
コンテンツメーカーjs
==================================*/

//selectbox追加動作

function cloneSelectBox() {
	const selectBoxLength = document.querySelectorAll('.clone-wrap-parent').length;
    const originalSelectBox = Array.from(document.querySelectorAll('.clone-wrap-parent'));;
	const lastOriginalSelectBox = originalSelectBox.pop();
    const clonedSelectBox = lastOriginalSelectBox.cloneNode(true);
	
	//各種要素を取得
    const cloneContentContainer = clonedSelectBox.querySelector('.content-Container');
	const cloneSelectbox =  clonedSelectBox.querySelector('.cmaker-wrap');
	const insertIdOriginal = clonedSelectBox.querySelector('.insert-item-id');
	const insertDataIndex =  cloneSelectbox.getAttribute('data-index');
	const newIndex = insertDataIndex.replace(/\d+$/, '');
	
    // 新しいIDをセット
    clonedSelectBox.id = 'clone-wrap_' + selectBoxLength;
	insertIdOriginal.id = 'insert-ids-' + selectBoxLength;
	insertIdOriginal.value = 'insert-id' + selectBoxLength;
	cloneSelectbox.setAttribute('data-index', newIndex + selectBoxLength);
	const targetOptionInitial = '選択してください';
	for(let i=0; i < cloneSelectbox.options.length; i++){
		const option = cloneSelectbox.options[i];
		if(option.text.includes(targetOptionInitial)){
			option.selected = true;
		} else {
			option.selected = false;
		}
	}
    cloneContentContainer.id = 'contentContainer_' + selectBoxLength;
	
    // 複製したセレクトボックスを追加
    document.getElementById('clonedSelectBoxes').appendChild(clonedSelectBox);
}




//closebtn動作

//パララックス動作制御
let handleScroll;
function parallaxControl(){
	
const parallax = document.querySelectorAll(".parallax-layer");
const section = document.querySelectorAll(".parallax-section");
const windowHeight = window.innerHeight;
parallax[0].classList.add('parallax-isblock');

	
	handleScroll = function(){
        for (let i = 0; i < section.length; i++) {
            const getElementParentTop = document.querySelector(".parallax-container").getBoundingClientRect().top;
            const getElementDistanceTop = section[i].getBoundingClientRect().top;
            const getElementDistanceBottom = section[i].getBoundingClientRect().bottom;

            if (getElementDistanceTop < windowHeight) {
                parallax[i].classList.add('parallax-isblock');
            } else {
                parallax[i].classList.remove('parallax-isblock');
            }

            if (getElementDistanceTop < 0 && getElementDistanceBottom > 0) {
                parallax[i].classList.add("parallax-isactive");
            } else {
                parallax[i].classList.remove("parallax-isactive");
            }

            if (i === section.length - 1) {
                parallax[i].classList.remove("parallax-isactive");
            }
        }
}
	
	document.addEventListener("scroll", handleScroll);
 
}
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
                newIndex =　parentIndex;
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

        

//グランドメニューのバリテート

 document.getElementById('grandmenuCloseBtn').addEventListener('click', function() {
            var isFormValid = validateForm();
   			// 処理が完了している場合、true を返しているのでログを出力
   			if (isFormValid) {
			   document.getElementById('cmaker_grandmenu_wrap').style.display="";
			   document.getElementById('valitate-complete').style.display="block";
			   document.getElementById('close-valitate-btn').addEventListener('click', ()=>{
					event.preventDefault();
					document.getElementById('valitate-complete').style.display="none";
					document.getElementById('cmaker_grandmenu_wrap').style.display="none";
			   });
   			}else{
				document.getElementById('valitate-complete').style.display="none";
			}
 });


        function validateForm() {
			var emptyInputId;
            var gmform = document.getElementById('gm-form-erea');
            var inputElements = gmform.querySelectorAll('input');
			var erroeMsegTitle = document.querySelectorAll('[id^="gm_title_error_"]');
			var erroeMsegImg = document.querySelectorAll('[id^="gm_img_error_"]');
			var erroeMsegLink = document.querySelectorAll('[id^="gm_link_error_"]');
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
				var delRenumber = elements.forEach((element) => {
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

	
//gmリスト表示の遅延処理
var items = document.getElementsByClassName('gm-item-wrap');
var itemsArray = Array.from(items);
          itemsArray.forEach(function(item, index) {
              setTimeout(function() {
                  item.classList.add('show');
              }, index * 300); // 各要素が0.2秒ずつ遅れて表示される
          });
        

}//gmControle



//ランキング表示非表示切り替え1
function rankingControl(){
	rankCheck = document.getElementsByName('rank_on');
	rank1ItemImg = document.getElementById('item_img_url');
	rank1ItemTitle = document.getElementById('rank1-item-title');
	rank1ItemPrice = document.getElementById('rank-item-price');
	rank1ItemUrl = document.getElementById('rank-item-url');
	rank1ItemUrlBtn = document.getElementById('item_img_url_btn');
	rank1ItemUrlClear = document.getElementById('item_img_url_clear');
	rank1Overlay = document.getElementById('rank-notshow-overlay');
	rankShowValue= document.getElementById('rank-1-show');
	rankNotShowValue = document.getElementById('rank-1-notshow');
		if( rankShowValue.checked ){
			rank1ItemImg.disabled = false;
			rank1ItemTitle.disabled = false;
			rank1ItemPrice.disabled = false;
			rank1ItemUrl.disabled = false;
			rank1ItemUrlBtn.disabled = false;
			rank1ItemUrlClear.disabled = false;
			rank1Overlay.style.display = "none";
		}else if( rankNotShowValue.checked  ){
			rank1ItemImg.disabled = true;
			rank1ItemTitle.disabled = true;
			rank1ItemPrice.disabled = true;
			rank1ItemUrl.disabled = true;
			rank1ItemUrlBtn.disabled = true;
			rank1ItemUrlClear.disabled = true;
			rank1Overlay.style.display = "";
		}
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank1Value = document.querySelector("input:checked[name=rank_on]").value;
			if( rank1Value === "rank_not_show_1"){
				rank1ItemImg.disabled = true;
				rank1ItemTitle.disabled = true;
				rank1ItemPrice.disabled = true;
				rank1ItemUrl.disabled = true;
				rank1ItemUrlBtn.disabled = true;
				rank1ItemUrlClear.disabled = true;
				rank1Overlay.style.display = "";
				localStorage.setItem("rank1Show", "true");
			}else if( rank1Value === "rank_show_1" ){
				rank1ItemImg.disabled = false;
				rank1ItemTitle.disabled = false;
				rank1ItemPrice.disabled = false;
				rank1ItemUrl.disabled = false;
				rank1ItemUrlBtn.disabled = false;
				rank1ItemUrlClear.disabled = false;
				rank1Overlay.style.display = "none";
				localStorage.setItem("rank1Show", "false");
			}
		});
	});



//ランキング２
	rankCheck = document.getElementsByName('rank_on_2');
	rank2ItemImg = document.getElementById('item_img_url_2');
	rank2ItemTitle = document.getElementById('rank2-item-title');
	rank2ItemPrice = document.getElementById('rank2-item-price');
	rank2ItemUrl = document.getElementById('rank2-item-url');
	rank2ItemUrlBtn = document.getElementById('item_img_url_2_btn');
	rank2ItemUrlClear = document.getElementById('item_img_url_2_clear');
	rank2Overlay = document.getElementById('rank-notshow-overlay-2');
	rankShowValue= document.getElementById('rank-2-show');
	rankNotShowValue = document.getElementById('rank-2-notshow');
	var rank2Show = localStorage.getItem('rank2Show');
	if( rankNotShowValue.checked ){
		rank2ItemImg.disabled = true;
		rank2ItemTitle.disabled = true;
		rank2ItemPrice.disabled = true;
		rank2ItemUrl.disabled = true;
		rank2ItemUrlBtn.disabled = true;
		rank2ItemUrlClear.disabled = true;
		rank2Overlay.style.display = "";
	}else if( rankShowValue.checked ){
		rank2ItemImg.disabled = false;
		rank2ItemTitle.disabled = false;
		rank2ItemPrice.disabled = false;
		rank2ItemUrl.disabled = false;
		rank2ItemUrlBtn.disabled = false;
		rank2ItemUrlClear.disabled = false;
		rank2Overlay.style.display = "none";
	}
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank2Value = document.querySelector("input:checked[name=rank_on_2]").value;
			if( rank2Value == "rank_not_show_2"){
				rank2ItemImg.disabled = true;
				rank2ItemTitle.disabled = true;
				rank2ItemPrice.disabled = true;
				rank2ItemUrl.disabled = true;
				rank2ItemUrlBtn.disabled = true;
				rank2ItemUrlClear.disabled = true;
				rank2Overlay.style.display = "";
				localStorage.setItem("rank2Show", "true");
			}else if( rank2Value == "rank_show_2" ){
				rank2ItemImg.disabled = false;
				rank2ItemTitle.disabled = false;
				rank2ItemPrice.disabled = false;
				rank2ItemUrl.disabled = false;
				rank2ItemUrlBtn.disabled = false;
				rank2ItemUrlClear.disabled = false;
				rank2Overlay.style.display = "none";
				localStorage.setItem("rank2Show", "false");
			}
		});
	});

//ランキング3
	rankCheck = document.getElementsByName('rank_on_3');
	rank3ItemImg = document.getElementById('item_img_url_3');
	rank3ItemTitle = document.getElementById('rank3-item-title');
	rank3ItemPrice = document.getElementById('rank3-item-price');
	rank3ItemUrl = document.getElementById('rank3-item-url');
	rank3ItemUrlBtn = document.getElementById('item_img_url_3_btn');
	rank3ItemUrlClear = document.getElementById('item_img_url_3_clear');
	rank3Overlay = document.getElementById('rank-notshow-overlay-3');
	rankShowValue= document.getElementById('rank-3-show');
	rankNotShowValue = document.getElementById('rank-3-notshow');
	var rank3Show = localStorage.getItem('rank3Show');
	if( rankNotShowValue.checked ){
		rank3ItemImg.disabled = true;
		rank3ItemTitle.disabled = true;
		rank3ItemPrice.disabled = true;
		rank3ItemUrl.disabled = true;
		rank3ItemUrlBtn.disabled = true;
		rank3ItemUrlClear.disabled = true;
		rank3Overlay.style.display = "";
	}else if( rankShowValue.checked ){
		rank3ItemImg.disabled = false;
		rank3ItemTitle.disabled = false;
		rank3ItemPrice.disabled = false;
		rank3ItemUrl.disabled = false;
		rank3ItemUrlBtn.disabled = false;
		rank3ItemUrlClear.disabled = false;
		rank3Overlay.style.display = "none";
	}
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank3Value = document.querySelector("input:checked[name=rank_on_3]").value;
			if( rank3Value == "rank_not_show_3"){
				rank3ItemImg.disabled = true;
				rank3ItemTitle.disabled = true;
				rank3ItemPrice.disabled = true;
				rank3ItemUrl.disabled = true;
				rank3ItemUrlBtn.disabled = true;
				rank3ItemUrlClear.disabled = true;
				rank3Overlay.style.display = "";
				localStorage.setItem("rank3Show", "true");
			}else if( rank3Value == "rank_show_3" ){
				rank3ItemImg.disabled = false;
				rank3ItemTitle.disabled = false;
				rank3ItemPrice.disabled = false;
				rank3ItemUrl.disabled = false;
				rank3ItemUrlBtn.disabled = false;
				rank3ItemUrlClear.disabled = false;
				rank3Overlay.style.display = "none";
				localStorage.setItem("rank3Show", "false");
			}
		});
	});



//ランキング4
	rankCheck = document.getElementsByName('rank_on_4');
	rank4ItemImg = document.getElementById('item_img_url_4');
	rank4ItemTitle = document.getElementById('rank4-item-title');
	rank4ItemPrice = document.getElementById('rank4-item-price');
	rank4ItemUrl = document.getElementById('rank4-item-url');
	rank4ItemUrlBtn = document.getElementById('item_img_url_4_btn');
	rank4ItemUrlClear = document.getElementById('item_img_url_4_clear');
	rank4Overlay = document.getElementById('rank-notshow-overlay-4');
	rankShowValue= document.getElementById('rank-4-show');
	rankNotShowValue = document.getElementById('rank-4-notshow');
	var rank4Show = localStorage.getItem('rank4Show');
	if( rankNotShowValue.checked ){
		rank4ItemImg.disabled = true;
		rank4ItemTitle.disabled = true;
		rank4ItemPrice.disabled = true;
		rank4ItemUrl.disabled = true;
		rank4ItemUrlBtn.disabled = true;
		rank4ItemUrlClear.disabled = true;
		rank4Overlay.style.display = "";
	}else if( rankShowValue.checked ){
		rank4ItemImg.disabled = false;
		rank4ItemTitle.disabled = false;
		rank4ItemPrice.disabled = false;
		rank4ItemUrl.disabled = false;
		rank4ItemUrlBtn.disabled = false;
		rank4ItemUrlClear.disabled = false;
		rank4Overlay.style.display = "none";
	}
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank4Value = document.querySelector("input:checked[name=rank_on_4]").value;
			if( rank4Value == "rank_not_show_4"){
				rank4ItemImg.disabled = true;
				rank4ItemTitle.disabled = true;
				rank4ItemPrice.disabled = true;
				rank4ItemUrl.disabled = true;
				rank4ItemUrlBtn.disabled = true;
				rank4ItemUrlClear.disabled = true;
				rank4Overlay.style.display = "";
				localStorage.setItem("rank4Show", "true");
			}else if( rank4Value == "rank_show_4" ){
				rank4ItemImg.disabled = false;
				rank4ItemTitle.disabled = false;
				rank4ItemPrice.disabled = false;
				rank4ItemUrl.disabled = false;
				rank4ItemUrlBtn.disabled = false;
				rank4ItemUrlClear.disabled = false;
				rank4Overlay.style.display = "none";
				localStorage.setItem("rank4Show", "false");
			}
		});
	});


//ランキング5
	rankCheck = document.getElementsByName('rank_on_5');
	rank5ItemImg = document.getElementById('item_img_url_5');
	rank5ItemTitle = document.getElementById('rank5-item-title');
	rank5ItemPrice = document.getElementById('rank5-item-price');
	rank5ItemUrl = document.getElementById('rank5-item-url');
	rank5ItemUrlBtn = document.getElementById('item_img_url_5_btn');
	rank5ItemUrlClear = document.getElementById('item_img_url_5_clear');
	rank5Overlay = document.getElementById('rank-notshow-overlay-5');
	rankShowValue= document.getElementById('rank-5-show');
	rankNotShowValue = document.getElementById('rank-5-notshow');
	var rank5Show = localStorage.getItem('rank5Show');
	if( rankNotShowValue.checked ){
		rank5ItemImg.disabled = true;
		rank5ItemTitle.disabled = true;
		rank5ItemPrice.disabled = true;
		rank5ItemUrl.disabled = true;
		rank5ItemUrlBtn.disabled = true;
		rank5ItemUrlClear.disabled = true;
		rank5Overlay.style.display = "";
	}else if( rankShowValue.checked ){
		rank5ItemImg.disabled = false;
		rank5ItemTitle.disabled = false;
		rank5ItemPrice.disabled = false;
		rank5ItemUrl.disabled = false;
		rank5ItemUrlBtn.disabled = false;
		rank5ItemUrlClear.disabled = false;
		rank5Overlay.style.display = "none";
	}
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank5Value = document.querySelector("input:checked[name=rank_on_5]").value;
			if( rank5Value == "rank_not_show_5"){
				rank5ItemImg.disabled = true;
				rank5ItemTitle.disabled = true;
				rank5ItemPrice.disabled = true;
				rank5ItemUrl.disabled = true;
				rank5ItemUrlBtn.disabled = true;
				rank5ItemUrlClear.disabled = true;
				rank5Overlay.style.display = "";
				localStorage.setItem("rank5Show", "true");
			}else if( rank5Value == "rank_show_5" ){
				rank5ItemImg.disabled = false;
				rank5ItemTitle.disabled = false;
				rank5ItemPrice.disabled = false;
				rank5ItemUrl.disabled = false;
				rank5ItemUrlBtn.disabled = false;
				rank5ItemUrlClear.disabled = false;
				rank5Overlay.style.display = "none";
				localStorage.setItem("rank5Show", "false");
			}
		});
	});

//ランキング6
	rankCheck = document.getElementsByName('rank_on_6');
	rank6ItemImg = document.getElementById('item_img_url_6');
	rank6ItemTitle = document.getElementById('rank6-item-title');
	rank6ItemPrice = document.getElementById('rank6-item-price');
	rank6ItemUrl = document.getElementById('rank6-item-url');
	rank6ItemUrlBtn = document.getElementById('item_img_url_6_btn');
	rank6ItemUrlClear = document.getElementById('item_img_url_6_clear');
	rank6Overlay = document.getElementById('rank-notshow-overlay-6');
	rankShowValue= document.getElementById('rank-6-show');
	rankNotShowValue = document.getElementById('rank-6-notshow');
	var rank6Show = localStorage.getItem('rank6Show');
	if( rankNotShowValue.checked ){
		rank6ItemImg.disabled = true;
		rank6ItemTitle.disabled = true;
		rank6ItemPrice.disabled = true;
		rank6ItemUrl.disabled = true;
		rank6ItemUrlBtn.disabled = true;
		rank6ItemUrlClear.disabled = true;
		rank6Overlay.style.display = "";
	}else if( rankShowValue.checked ){
		rank6ItemImg.disabled = false;
		rank6ItemTitle.disabled = false;
		rank6ItemPrice.disabled = false;
		rank6ItemUrl.disabled = false;
		rank6ItemUrlBtn.disabled = false;
		rank6ItemUrlClear.disabled = false;
		rank6Overlay.style.display = "none";
	}
	rankCheck.forEach(function(e) {
		e.addEventListener("click", function() {           
			const rank6Value = document.querySelector("input:checked[name=rank_on_6]").value;
			if( rank6Value == "rank_not_show_6"){
				rank6ItemImg.disabled = true;
				rank6ItemTitle.disabled = true;
				rank6ItemPrice.disabled = true;
				rank6ItemUrl.disabled = true;
				rank6ItemUrlBtn.disabled = true;
				rank6ItemUrlClear.disabled = true;
				rank6Overlay.style.display = "";
				localStorage.setItem("rank6Show", "true");
			}else if( rank6Value == "rank_show_6" ){
				rank6ItemImg.disabled = false;
				rank6ItemTitle.disabled = false;
				rank6ItemPrice.disabled = false;
				rank6ItemUrl.disabled = false;
				rank6ItemUrlBtn.disabled = false;
				rank6ItemUrlClear.disabled = false;
				rank6Overlay.style.display = "none";
				localStorage.setItem("rank6Show", "false");
			}
		});
	});
}

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
//各種クローズボタン実装
function closeFile(closeEl) {
    targetPage = closeEl.parentNode;
    targetPage.classList.add('notshow');
}

function handleSelectChange(selectName) {
    var selectedValue = selectName;
	commonInitialization();
	changeSameIdConcept();
    if (selectedValue === "parallax") {
        parallaxControl();
        animateTextWithSpans('.parallax-title');
    } else if (selectedValue === "grandmenu") {
        grandMenuControl();
        animateTextWithSpans('.gm-primary-title');
    } else if (selectedValue === "concept") {
        animateTextWithSpans('.concept-main-title');
		
    } else if (selectedValue === "ranking") {
        rankingControl();
        animateTextWithSpans('.r-p-t-prev');
    } else if (selectedValue === "store_info") {
        animateTextWithSpans('.store-info-p_title');
    }
}
function commonInitialization(){
	document.removeEventListener("scroll", handleScroll);
}

function changeSameIdConcept() {
    const conceptIdOriginal = document.querySelectorAll('.img-select');
    const conceptIdOriginalLength = conceptIdOriginal.length; // 配列の長さを取得
    for (var i = 0; i < conceptIdOriginalLength; i++) {
        conceptIdOriginal[i].id = 'concept_bg_img_url' + (i + 1) + '_btn'; // インデックス i に基づいて ID を設定
    }
}



/*==================================
メディアアップローダーjs
==================================*/

//idをクリックしたボタンから抜き出し、アップローダ関数を実行
　 function uploaderOpenClick(button) {
    var buttonId = button.id;
	var singleName = buttonId.replace('_btn', '');
	var insertIdName = document.querySelector('.insert-item-id').value;
    initializeUploader(jQuery, singleName);
  }


//idをクリックしたボタンから抜き出し、アップローダ関数を実行(配列対応)
　 function uploaderOpenClickMultiple(button) {
    var buttonIdMult = button.id;
	var dataIndexValue = button.getAttribute("data-index");
	var singleNameMult = buttonIdMult.replace(/_btn_(\d+)$/, '');
    initializeUploaderMult(jQuery, singleNameMult, dataIndexValue);
  }


//削除ボタンの実装
function uploaderdeleteClick(button) {
    var buttonIdDel = button.id;
	var singleNameDel = buttonIdDel.replace('_clear', '');
    deleteImgUploader(jQuery, singleNameDel);
  }


//アップローダsingle  
function initializeUploader($, name) {

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
            $("input:text[name=" + name + "]").val("");
            $("#" + name + "_thumbnail").empty();
            $("input:text[name=" + name + "]").val(file.attributes.sizes.full.url);
            $("#" + name + "_thumbnail").append('<img src="' + file.attributes.sizes.thumbnail.url + '" />');
        });
    });

    custom_uploader.open();
}
function deleteImgUploader($, name){
        $("input:text[name=" + name + "]").val("");
        $("#" + name + "_thumbnail").empty();
}

//アップローダmult
var custom_uploaders = [];
function initializeUploaderMult($, name, index) {
	
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
                    $('#' + name + '_' + index).val(file.attributes.url);
                    $('#' + name + '_thumbnail_' + index).empty();
                    $('#' + name + '_thumbnail_' + index).append('<img src="' + file.attributes.sizes.thumbnail.url + '" />');
                });
            });

        // アップローダーを開く
        custom_uploaders[index].open();

    $(document).on('click', '.img-clear-btn', function () {
        var buttonId = $(this).attr('id');
        var index = buttonId.split('_').pop();  // ボタンのidからindexを取得
        $('#' + name + '_' + index).val('');
        $('#' + name + '_thumbnail_' + index).empty();
    });
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
