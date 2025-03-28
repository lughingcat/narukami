
/*==================================
404設定js
==================================*/
// ページロード時の処理
  document.addEventListener('DOMContentLoaded', function() {
	  var notFoundPage = document.getElementById('narukami-404page-form');
	  if(notFoundPage){
		  checkSelectedOption();
	  }
  });

  // ラジオボタンがクリックされたときの処理
  document.querySelectorAll('input[name="page404bg-type"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
      toggleBackgroundOptions();
    });
  });

  // ラジオボタンの選択に応じてクラスを付与/削除する関数
  function toggleBackgroundOptions() {
    const selectedValue = document.querySelector('input[name="page404bg-type"]:checked').value;
    const wrapElement = document.querySelector('.notfound-img-select-wrap');

    if (selectedValue === 'original404-bg-img') {
      wrapElement.classList.remove('notshow'); // 表示
    } else {
      wrapElement.classList.add('notshow'); // 非表示
    }
  }

  // ページロード時にチェックされているラジオボタンを確認し、クラスを適切に設定する関数
  function checkSelectedOption() {
    const selectedValue = document.querySelector('input[name="page404bg-type"]:checked').value;
    const wrapElement = document.querySelector('.notfound-img-select-wrap');

    if (selectedValue === 'original404-bg-img') {
      wrapElement.classList.remove('notshow'); // 表示
    } else {
      wrapElement.classList.add('notshow'); // 非表示
    }
  }
/*==================================
ヘッダー設定js
==================================*/
//ヘッダー設定表示切り替え
function openTab(button, tabName) {
	if(tabName === 'header-tab1'){
		document.getElementById('header-tab1').style.display = "block";
		document.getElementById('header-tab2').style.display = "none";
		document.getElementById('header-tab3').style.display = "none";
		document.getElementById('header-tab4').style.display = "none";
		tabStyleControl();
		button.classList.add('tab-check-on');
	}else if(tabName === 'header-tab2'){
		document.getElementById('header-tab1').style.display = "none";
		document.getElementById('header-tab2').style.display = "block";
		document.getElementById('header-tab3').style.display = "none";
		document.getElementById('header-tab4').style.display = "none";
		tabStyleControl();
		button.classList.add('tab-check-on');
	}else if(tabName === 'header-tab3'){
		document.getElementById('header-tab1').style.display = "none";
		document.getElementById('header-tab2').style.display = "none";
		document.getElementById('header-tab3').style.display = "block";
		document.getElementById('header-tab4').style.display = "none";
		tabStyleControl();
		button.classList.add('tab-check-on');
	}else if(tabName === 'header-tab4'){
		document.getElementById('header-tab1').style.display = "none";
		document.getElementById('header-tab2').style.display = "none";
		document.getElementById('header-tab3').style.display = "none";
		document.getElementById('header-tab4').style.display = "block";
		tabStyleControl();
		button.classList.add('tab-check-on');
	}
  localStorage.setItem('selectedTab', tabName);
}

// ページが読み込まれた際に、ローカルストレージの値に基づいてタブを表示
window.onload = function() {
  	var selectedTab = localStorage.getItem('selectedTab');
	var mainTabContent = document.getElementById('animetion_setting_wrap');
  	if (mainTabContent && selectedTab) {
    	document.getElementById(selectedTab).style.display = "block";
		var targetBtn = getButtonBySecondArgument(selectedTab);
		targetBtn.classList.add('tab-check-on');
  	} else if(mainTabContent) {
		// 初回ロード時、デフォルトのタブを開く
    	document.getElementById('header-tab1').style.display = "block";
    	document.getElementById('header-tab1').classList.add('tab-check-on');
  	}
}

//選択中のタブのスタイル制御
function tabStyleControl(){
	var onClickCheckStyle = document.querySelectorAll('.tablinks');
	var tabCheckValue = document.querySelector('.tab-check-on');
	if(tabCheckValue){
		onClickCheckStyle.forEach(function(checkStyle) {
  			checkStyle.classList.remove('tab-check-on');
		});
	};
}

//ロード時のタブスタイルを見つける関数
function getButtonBySecondArgument(targetValue) {
  var buttons = document.querySelectorAll('.tablinks');
  
  for (var i = 0; i < buttons.length; i++) {
    var onclickAttr = buttons[i].getAttribute('onclick');
    if (onclickAttr.includes(targetValue)) {
      return buttons[i];
    }
  }
  
  return null; // 見つからない場合は null を返す
}

//グローバルメニュー追加処理
document.addEventListener('DOMContentLoaded', function(){
	var globalMenuAddBtn = document.getElementById('globalmenu-add-btn');
	if(globalMenuAddBtn){
		globalMenuAddBtn.addEventListener('click', function(){
			var parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap');
			if (parentElementAll.length > 0) {
                // 最後の要素を取得
                var lastElement = parentElementAll[parentElementAll.length - 1];
                // 複製
                var clone = lastElement.cloneNode(true);
                // 必要に応じてIDや名前の変更
                clone.id = 'global-flex-wrap_' + parentElementAll.length;
                clone.querySelectorAll('input').forEach(function(input) {
                    input.value = ''; // 複製後に入力値をリセット
                });
                // 親要素に追加
                lastElement.parentNode.appendChild(clone);
            }
		});
	}
});
//グローバルメニュー削除処理
function globalmenuDeleteElement(button) {
    var parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap');
    
    if (parentElementAll.length > 1) { // 要素が1つ以上ある場合のみ削除可能
        var parentEl = button.parentElement;
        parentEl.remove();

        parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap'); // 更新
        parentElementAll.forEach(function(parent, index) {
            parent.id = 'global-flex-wrap_' + index;
			//console.log(parent.id);
        });
    }else{
		alert('最後の１つは削除出来ません。');
	}
}
//グローバルメニュー動作制御
document.addEventListener('DOMContentLoaded', function() {
  var globalmenuToggle = document.querySelector('.span-wrap');
  if(globalmenuToggle){
  		globalmenuToggle.addEventListener('click', function() {
    		globalmenuToggle.classList.toggle('global-open');
			document.querySelector('.humberger-button-wrap').classList.toggle('wrap-change');
			document.querySelector('.globalmenu-back-wrap').classList.toggle('slide-change');
  		});
  }
});

//ヘッダースライダーアイテム追加処理
document.addEventListener('DOMContentLoaded', function(){
	var sliderAddBtn = document.getElementById('slider-add-button');
	if(sliderAddBtn){
		sliderAddBtn.addEventListener('click', function(){
			var parentElementAll = document.querySelectorAll('.slider-form-wrap');
			if (parentElementAll.length > 0) {
                // 最後の要素を取得
                var lastElement = parentElementAll[parentElementAll.length - 1];
                // 複製
                var clone = lastElement.cloneNode(true);
                // 必要に応じてIDや名前の変更
                clone.id = 'slider-form-wrap_' + parentElementAll.length;
				//data-indexの値を更新
				var dataIndexCloneValue = clone.querySelector('#slider-img-link_thumbnail').getAttribute(['data-index']);
				dataIndexCloneValue++;
				dataIndexElement = clone.querySelectorAll('[data-index]');
				dataIndexElement.forEach(function(element){
					element.setAttribute('data-index', dataIndexCloneValue);
				});
				//inputの初期化
                clone.querySelector('#slider-img-link').value = '';
                clone.querySelector('input[name="slider_item_title[]"]').value = '';
                const imageElement = clone.querySelector('#slider-img-link_thumbnail img');
				if (imageElement) {
					imageElement.remove();
				}
                // 親要素に追加
                lastElement.parentNode.appendChild(clone);
            }
		});
	}
});
//スライダーアイテム削除処理
function sliderItemDelBtn(button){
	 var parentElementAll = document.querySelectorAll('.slider-form-wrap');
    
    if (parentElementAll.length > 1) { // 要素が1つ以上ある場合のみ削除可能
        var parentEl = button.parentElement;
        parentEl.remove();

        parentElementAll = document.querySelectorAll('.slider-form-wrap'); // 更新
        parentElementAll.forEach(function(parent, index) {
            parent.id = 'slider-form-wrap_' + index;
			var parentNumber = parent.id.split('_')[1];
			var childDataIndex = parent.querySelectorAll('[data-index]');
			//data-indexの値を更新
			childDataIndex.forEach(function(childData){
				childData.setAttribute('data-index', parentNumber);
			})
        });
    }else{
		alert('最後の１つは削除出来ません。');
	}
}
//スライダーシャドウスイッチ制御
 function initializeSliderShadow() {
    var sliderShadowSwich = document.getElementById('slider-shadow-swich');
    var shadowVolume = document.getElementById('precision-slider');

    if(sliderShadowSwich){
        // shadow数値表示
        shadowVolume.addEventListener('input', function() {
            var shadowValue = parseFloat(shadowVolume.value).toFixed(2);
            document.getElementById('shaow-rgba-balue').textContent = shadowValue;
            document.querySelector('.shadow-range-wrap').style.backgroundColor = 'rgba(0, 0, 0, ' + shadowValue + ')';
        });

        var sliderRangeVolume = document.querySelector('.slider-shadow-range');

        // 初期化 switch, volume
        if (sliderShadowSwich.checked) {
            sliderRangeVolume.classList.remove('notshow');
        }

        sliderShadowSwich.addEventListener('change', function() {
            if (sliderShadowSwich.checked) {
                sliderRangeVolume.classList.remove('notshow');
            } else {
                sliderRangeVolume.classList.add('notshow');
            }
        });
    }
}
//ヒーローヘッダータイプ変更スイッチ制御
document.addEventListener('DOMContentLoaded', function() {
    var heroheaderAllInput = document.querySelectorAll('.heroheader-value');

    // もしラジオボタンが存在しない場合は処理をスキップする
    if (heroheaderAllInput.length === 0) {
        return;
    }

    function toggleHeroHeaderParts() {
        // 各パートの要素を取得
        const stillImgPart = document.querySelector('.still-imgpart-wrap');
        const movePart = document.querySelector('.movepart-wrap');
        const sliderPart = document.querySelector('.sliderpart-wrap');
        // プレビュー側の要素を取得
        const stillImgPrevew = document.querySelector('.still-img-prevewpart-wrap');
        const movePrevew = document.querySelector('.move-prevewpart-wrap');
        const sliderPrevew = document.querySelector('.slider-prevewpart-wrap');

        // 要素が存在しない場合は処理をスキップ
        if (!stillImgPart || !movePart || !sliderPart || !stillImgPrevew || !movePrevew || !sliderPrevew) {
            return;
        }

        // すべて非表示にする
        stillImgPart.style.display = 'none';
        movePart.style.display = 'none';
        sliderPart.style.display = 'none';
        stillImgPrevew.style.display = 'none';
        movePrevew.style.display = 'none';
        sliderPrevew.style.display = 'none';

        // 選択されているラジオボタンに基づいて表示を切り替え
        const selectedRadio = document.querySelector('input[name="heorheader-type"]:checked');
        if (selectedRadio) {
            if (selectedRadio.value === 'still_img') {
                stillImgPart.style.display = 'block';
                stillImgPrevew.style.display = 'block';
            } else if (selectedRadio.value === 'move') {
                movePart.style.display = 'block';
                movePrevew.style.display = 'block';
            } else if (selectedRadio.value === 'slider') {
                sliderPart.style.display = 'block';
                sliderPrevew.style.display = 'block';
				initializeSliderShadow();
            }
        }
    }

    // ページロード時に表示を切り替える
    toggleHeroHeaderParts();

    // ラジオボタンの変更時に表示を切り替える
    heroheaderAllInput.forEach(function(radio) {
        radio.addEventListener('change', toggleHeroHeaderParts);
    });
});

//サイトアニメーション設定
document.addEventListener('DOMContentLoaded', function(){
	var animeBtnAll = document.querySelectorAll('.load-anime-prevew-btn');
	var circlerogo = document.querySelector('.loadwrap-rogo');
	var circleText = document.querySelector('.loading-text');
	if(animeBtnAll){
		const animetionElement = document.querySelector('.animetion-prewrap');
		animeBtnAll.forEach(function(animeBtn){
			var btnId = animeBtn.id;
			animeBtn.addEventListener('click', function(){
				if(btnId === 'right-to-left-btn'){
					bgOpacityControl();
					loadinganimetionControl();
					popupRogoControl();
					animetionElement.classList.add('stretch-shrink-right');
					animetionElement.addEventListener('animationend', function() {
    					animetionElement.classList.remove('stretch-shrink-right');
  					}); 
				} else if(btnId === 'curtain-btn'){
					bgOpacityControl();
					loadinganimetionControl();
					popupRogoControl();
					animetionElement.classList.add('stretch-shrink-curtain');
					animetionElement.addEventListener('animationend', function() {
    					animetionElement.classList.remove('stretch-shrink-curtain');
  					});
				} else if(btnId === 'circle-open-btn'){
					bgOpacityControl();
					animetionElement.classList.add('expand-circle');
					animetionElement.addEventListener('animationend', function() {
    					animetionElement.classList.remove('expand-circle');
  					});
					circlerogo.classList.add('loading-opacity-cont');
					circlerogo.addEventListener('animationend', function() {
    					circlerogo.classList.remove('loading-opacity-cont');
  					});
					circleText.classList.add('loading-anime');
					circleText.addEventListener('animationend', function() {
    					circleText.classList.remove('loading-anime');
  					});
					
				}
			});
		});
	}
});

//bg透明度コントロール
function bgOpacityControl(){
	var bgContainer = document.querySelector('.anime-set-prevew-wrap');
	bgContainer.classList.add('bg-opacity-value');
	bgContainer.addEventListener('animationend', function() {
    	bgContainer.classList.remove('bg-opacity-value');
  	});
}
//loading...アニメーション制御
function loadinganimetionControl(){
	var loadingAnimeContainer = document.querySelector('.loading-text');
	loadingAnimeContainer.classList.add('loading-anime');
	loadingAnimeContainer.addEventListener('animationend', function(){
		loadingAnimeContainer.classList.remove('loading-anime');
	});
}
//rogo出現アニメーション制御
function popupRogoControl(){
	var popupRogoContainer = document.querySelector('.loadwrap-rogo');
	popupRogoContainer.classList.add('popup-rogo');
	popupRogoContainer.addEventListener('animationend', function(){
		popupRogoContainer.classList.remove('popup-rogo');
	});
}



/*==================================
トップページビルダーjs
==================================*/
//各セクション詳細表示制御
document.addEventListener('DOMContentLoaded', function(){
	var sectionButtons = document.querySelectorAll('.narukami-hopup-section-btn');
	sectionButtons.forEach(function(sectionBtn, index){
		var btnId = sectionBtn.id;
		sectionBtn.addEventListener('click',function(){
			if( btnId === 'popup-concept-btn' ){
				document.getElementById('hopup-concept-wrap' ).classList.remove('popup-notshow');
			} else if( btnId === 'popup-ranking-btn'){
				document.getElementById('hopup-ranking-wrap').classList.remove('popup-notshow');
			} else if( btnId === 'popup-grandmenu-btn' ){
				document.getElementById('hopup-grandmenu-wrap').classList.remove('popup-notshow');
			} else if( btnId === 'popup-right1-btn' ){
				document.getElementById('hopup-right1-wrap').classList.remove('popup-notshow');
			} else if( btnId === 'popup-left1-btn' ){
				document.getElementById('hopup-left1-wrap').classList.remove('popup-notshow');
			} else if( btnId === 'popup-column2-btn' ){
				document.getElementById('hopup-column2-wrap').classList.remove('popup-notshow');
			} else if( btnId === 'popup-column3-btn' ){
				document.getElementById('hopup-column3-wrap').classList.remove('popup-notshow');
			} else if( btnId === 'popup-parallax-btn' ){
				document.getElementById('hopup-parallax-wrap').classList.remove('popup-notshow');
			} else if( btnId === 'popup-storeinfo-btn' ){
				document.getElementById('hopup-storeinfo-wrap').classList.remove('popup-notshow');
			} else if( btnId === 'popup-textarea-btn' ){
				document.getElementById('hopup-textarea-wrap').classList.remove('popup-notshow');
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
	if( btnId === 'ranking-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
	if( btnId === 'grandmenu-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
	if( btnId === 'right1-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
	if( btnId === 'left1-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
	if( btnId === 'column2-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
	if( btnId === 'column3-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
	if( btnId === 'parallax-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
	if( btnId === 'storeinfo-delete-hopup-btn'){
		var parentEl = button.parentNode;
		parentEl.classList.add('popup-notshow');
	}
	if( btnId === 'textarea-delete-hopup-btn'){
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
			var notMoveElement = document.getElementsByClassName('not-save-faile');
			//console.log(notMoveElement);
            // 子要素にopen-file-buttonクラスが含まれてない場合
            if (!item.querySelector('.open-file-button') || notMoveElement.length !== 0) {
                // ドラッグをキャンセルしてアラートを表示
                evt.preventDefault(); // ドラッグをキャンセル
                alert('保存が完了していません。\n保存をしてからドラッグしてください。');
				item.setAttribute('data-drag-disabled', 'false');
            }
        },
		onStart: function (evt) {
			var item = evt.item;
			var notMoveElement = document.getElementsByClassName('not-save-faile');
                // フラグが設定されている場合、ドラッグをキャンセル
                if (item.getAttribute('data-drag-disabled') === 'false' || notMoveElement.length !== 0) {
                    evt.preventDefault(); // ドラッグをキャンセル
                    return;
                }
            // 並べ替え開始時にエディタを破棄
            tinymce.remove('.narukami-tinymce-editor');
            },
		onEnd: function (evt) { // ドラッグ終了時に実行
           	updateIndices();
			initCustomEditor();
        }
    });
   }
	var element = document.getElementById('select-all-wrap');
    if (element) {
        initializeSortable();
    }
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
    
	document.querySelectorAll('#gm-elment-add').forEach((gmAddBtn) => {
    	gmAddBtn.addEventListener("click", function () {
        	addGmElement.call(this);
    	});
	});	
}//gmControle
document.addEventListener("DOMContentLoaded", function() {
	const gmAddBtnLoad = document.getElementById('gm-elment-add');
	if(gmAddBtnLoad){
		grandMenuControl();
	}
});
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
	//console.log(targetClass)
	const childElement = targetClass.getElementsByClassName("show-element")[0]; 
	//console.log(childElement)
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
	let codeSection = parentEl.querySelector('.cmakerWrapCodeSection');
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
	} else if (codeSection){
		codeSection.classList.toggle('notshow');
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
	} else if (selectedValue === "code_section"){
		
		loadCloseClass(selectedValue, parentIdNum);
		initCodeMirror();
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
//single（配列なし）
function sngleUploaderOpen(button){
	var buttonId = button.id;
	var nameId = buttonId.replace("_btn", "");
    singleUploaderfunc(jQuery, nameId);
}
//single Delete(配列なし)
function sngleUploaderDelete(button){
	var buttonIdDel = button.id;
	var singleNameDel = buttonIdDel.replace(/_clear|\d/g, '');
	singledeleteImgUploader(jQuery, singleNameDel)
}
//single配列なし削除ボタン呼び出し関数(single)
function singledeleteImgUploader($, name){
        $(`input:text[name='${name}']`).val("");
        $(`#${name}_thumbnail`).empty();
}
//アップローダsingle(配列なし)  
function singleUploaderfunc($, name) {
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
            var inputName = $(`input:text[name='${name}']`);
            var thumbnailContainer = $(`#${name}_thumbnail`);
            if (inputName.length && thumbnailContainer.length) {
                inputName.val(file.attributes.url); // ファイルのURLを挿入
                thumbnailContainer.empty();
                thumbnailContainer.append('<img src="' + file.attributes.sizes.thumbnail.url + '" />');
            }
        });
    });

    custom_uploader.open();
}
//single画像追加ボタン（配列）
function singleSelectArryImg(button){
	var buttonId = button.id;
	var nameId = buttonId.replace("_btn", "");
	var dataIndex = button.getAttribute('data-index');
	singleUploaderArrayfunc(jQuery, nameId, dataIndex);
}
//single Delete(配列)
function sngleUploaderArrayDelete(button){
	var buttonIdDel = button.id;
	var singleNameDel = buttonIdDel.replace(/_clear|\d/g, '');
	var dataIndex = button.getAttribute('data-index');
	singledeleteImgArrayUploader(jQuery, singleNameDel, dataIndex);
}
//single配列削除ボタン呼び出し関数(single)
function singledeleteImgArrayUploader($, name, dataIndex){
        $(`input[name='${name}[]'][data-index='${dataIndex}']`).val("");
        $(`#${name}_thumbnail[data-index='${dataIndex}']`).empty();
}
//アップローダsingle(配列)  
function singleUploaderArrayfunc($, name, dataIndex) {
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
            var inputName = $(`input[name='${name}[]'][data-index='${dataIndex}']`);
			var thumbnailContainer = $(`#${name}_thumbnail[data-index='${dataIndex}']`);
            if (inputName.length && thumbnailContainer.length) {
                inputName.val(file.attributes.url); // ファイルのURLを挿入
                thumbnailContainer.empty();
                thumbnailContainer.append('<img src="' + file.attributes.sizes.thumbnail.url + '" />');
            }
        });
    });

    custom_uploader.open();
}

//single（動画用配列なし）
function sngleUploaderVideoOpen(button){
	var buttonId = button.id;
	var nameId = buttonId.replace("_btn", "");
    singleUploderVideo(jQuery, nameId);
}
//single Delete(配列なし)
function sngleUploaderVideoDelete(button){
	var buttonIdDel = button.id;
	var singleNameDel = buttonIdDel.replace(/_clear|\d/g, '');
	singledeleteVideoUploader(jQuery, singleNameDel)
}
//配列なし削除ボタン呼び出し関数(single)
function singledeleteVideoUploader($, name){
        $(`input:text[name='${name}']`).val("");
        $(`#${name}_thumbnail`).empty();
}
//動画用アップローダ呼び出し関数
function singleUploderVideo($, name){
	var custom_uploader = wp.media({
        title: "動画を選択してください",
        library: {
            type: "video"
        },
        button: {
            text: "動画の選択"
        },
        multiple: false
    });

    custom_uploader.on("select", function () {
        var videos = custom_uploader.state().get("selection");
        videos.each(function (file) {
            var inputName = $(`input:text[name='${name}']`);
            var thumbnailContainer = $(`#${name}_thumbnail`);
            if (inputName.length && thumbnailContainer.length) {
                inputName.val(file.attributes.url); // ファイルのURLを挿入
                thumbnailContainer.empty();
                thumbnailContainer.append('<video width="320" height="200" controls><source src="' + file.attributes.url + '" type="video/mp4">Your browser does not support the video tag.</video>');
            }
        });
    });

    custom_uploader.open();	
}

//idをクリックしたボタンから抜き出し、アップローダ関数を実行(single)
function uploaderOpenClick(button) {
    var buttonId = button.id;
	var singleName = buttonId.replace(/_btn/g, '');
	var insertIdName = button.getAttribute('data-insert-id');
	var insertLastNumber = parseInt(insertIdName.match(/\d+$/)[0]);
	//console.log(buttonId);
	//console.log(singleName);
	//console.log(insertIdName);
	//console.log(insertLastNumber);
    initializeUploader(jQuery, singleName, insertIdName, insertLastNumber);
  }

//削除ボタンの実装(single)
function uploaderdeleteClick(button) {
    var buttonIdDel = button.id;
	var singleNameDel = buttonIdDel.replace(/_clear/g, '');
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
//サブフッター追加処理
document.addEventListener('DOMContentLoaded', function(){
	var subfooterMenuAddBtn = document.getElementById('subfooter-add-btn');
	if(subfooterMenuAddBtn){
		subfooterMenuAddBtn.addEventListener('click', function(){
			var parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap');
			if (parentElementAll.length > 0) {
				if (parentElementAll.length >= 6) {
        			alert('フォームが最大数に達しました。(最大数:6)');
        			return; 
    			}
                // 最後の要素を取得
                var lastElement = parentElementAll[parentElementAll.length - 1];
                // 複製
                var clone = lastElement.cloneNode(true);
                // 必要に応じてIDや名前の変更
                clone.id = 'subfooter-flex-wrap_' + parentElementAll.length;
                clone.querySelectorAll('input').forEach(function(input) {
                    input.value = ''; // 複製後に入力値をリセット
                });
                // 親要素に追加
                lastElement.parentNode.appendChild(clone);
            }
		});
	}
});
//グローバルメニュー削除処理
function subfooterMenuDeleteElement(button) {
    var parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap');
    
    if (parentElementAll.length > 1) { // 要素が1つ以上ある場合のみ削除可能
        var parentEl = button.parentElement;
        parentEl.remove();

        parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap'); // 更新
        parentElementAll.forEach(function(parent, index) {
            parent.id = 'global-flex-wrap_' + index;
			//console.log(parent.id);
        });
    }else{
		alert('最後の１つは削除出来ません。');
	}
}

/*==================================
フッターCRUDシステムjs
==================================*/
//サブフッター追加処理
document.addEventListener('DOMContentLoaded', function(){
	var footerMenuAddBtn = document.getElementById('footer-add-btn');
	if(footerMenuAddBtn){
		footerMenuAddBtn.addEventListener('click', function(){
			var parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap');
			if (parentElementAll.length > 0) {
				if (parentElementAll.length >= 10) {
        			alert('フォームが最大数に達しました。(最大数:10)');
        			return; 
    			}
                // 最後の要素を取得
                var lastElement = parentElementAll[parentElementAll.length - 1];
                // 複製
                var clone = lastElement.cloneNode(true);
                // 必要に応じてIDや名前の変更
                clone.id = 'footer-flex-wrap_' + parentElementAll.length;
                clone.querySelectorAll('input').forEach(function(input) {
                    input.value = ''; // 複製後に入力値をリセット
                });
                // 親要素に追加
                lastElement.parentNode.appendChild(clone);
            }
		});
	}
});
//グローバルメニュー削除処理
function footerMenuDeleteElement(button) {
    var parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap');
    
    if (parentElementAll.length > 1) { // 要素が1つ以上ある場合のみ削除可能
        var parentEl = button.parentElement;
        parentEl.remove();

        parentElementAll = document.querySelectorAll('.globalmenu-flex-wrap'); // 更新
        parentElementAll.forEach(function(parent, index) {
            parent.id = 'global-flex-wrap_' + index;
			//console.log(parent.id);
        });
    }else{
		alert('最後の１つは削除出来ません。');
	}
}


