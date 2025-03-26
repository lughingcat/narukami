// JavaScript Document
document.addEventListener('DOMContentLoaded', function(){
	var herooverWrapElement = document.querySelector('.animetion-prewrap');
	var heroanimationStyle = herooverWrapElement.getAttribute('data-index');
	allBgControl();
	headerControl();
	moveTitleControl();
	scrollBtnShowControl();
	callBtnShowControl();
	herooverWrapElement.classList.add(heroanimationStyle);
	loadingTextControl();
	popupRogoPreviewControl();
});

//loading...アニメーション制御
function loadingTextControl(){
	var loadingAnimeContainer = document.querySelector('.loading-text');
	loadingAnimeContainer.classList.add('loading-anime');
}
//rogo出現アニメーション制御
function popupRogoPreviewControl(){
	var popupRogoContainer = document.querySelector('.loadwrap-rogo');
	popupRogoContainer.classList.add('popup-rogo');
}

//ヘッダーコントロール
function headerControl(){
    var headerElement = document.getElementById('masthead');
    if (!headerElement) return; 
    var animationValue = headerElement.getAttribute('data-index');
    if (animationValue === 'loading-anime-not-use') {
       	setTimeout(function () {
            headerElement.classList.remove("notshow");
        }, 3000);
    } else {
        setTimeout(function () {
            headerElement.classList.remove("notshow");
        }, 1000);
    }
}

//動画titlewrap出現制御　heroheader-video-title-wrap
function moveTitleControl(){
	var elMove = document.getElementById('masthead');
    var headerElementTitle = document.querySelector('.heroheader-video-title-wrap');
    if (!headerElementTitle) return; 
    var movieValue = elMove.getAttribute('data-index');
    if (movieValue === 'loading-anime-not-use') {
        headerElementTitle.classList.remove("notshow");
    } else {
        setTimeout(function () {
            headerElementTitle.classList.remove("notshow");
        }, 1000);
    }
}

//背景画像出現コントール
function allBgControl(){
	var allBgwrap = document.body;
	if (!allBgwrap) return;
	var elbody = document.getElementById('masthead');
	var elBvalue = elbody.getAttribute('data-index');
	if(elBvalue === 'loading-anime-not-use'){
		setTimeout(function () {
    		allBgwrap.classList.remove("no-bg");
    	}, 1000);
	}else{
		setTimeout(function () {
    		allBgwrap.classList.remove("no-bg");
    	}, 5000);
	} 
}

//スクロールボタンコントロール
function scrollBtnShowControl(){
	var scrollBtn = document.querySelector('.scroll-top-btn');
	if(!scrollBtn) return;
	var headerElement = document.getElementById('masthead');
	var animationValueScroll = headerElement.getAttribute('data-index');
	if(animationValueScroll === 'loading-anime-not-use'){
		scrollBtn.classList.remove("notshow");
	} else {
		setTimeout(function () {
            scrollBtn.classList.remove("notshow");
        }, 1000);
	}
}
//電話ボタンコントロール
function callBtnShowControl(){
	var callBtn = document.querySelector('.store-call-btn');
	if(!callBtn) return;
	var headerElementcall = document.getElementById('masthead');
	var animationValuecall = headerElementcall.getAttribute('data-index');
	if(animationValuecall === 'loading-anime-not-use'){
		setTimeout(function () {
            callBtn.classList.remove("notshow");
        }, 2800);
	} else {
		setTimeout(function () {
            callBtn.classList.remove("notshow");
        }, 1000);
	}
}