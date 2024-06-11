//グランドメニュー遅延表示処理
function gmImgListAnimation(container) {
    // gmリスト表示の遅延処理
    var items = container.getElementsByClassName('gm-item-wrap');
    var itemsArray = Array.from(items);
    itemsArray.forEach(function(item, index) {
        setTimeout(function() {
            item.classList.add('show');
        }, index * 300); // 各要素が0.3秒ずつ遅れて表示される
    });
}

// トップ各項目タイトル時間差表示関数
const animateTextWithSpans = function(element, delay = 100) {
    const wrapCharSpan = function(str) {
        return [...str].map(char => `<span>${char}</span>`).join('');
    }

    if (!element) {
        console.error('Element not found.');
        return;
    }

    const originalText = element.textContent; // 元の文字列を保持

    // 初回の呼び出しで元の文字列を span 要素で置き換える
    element.innerHTML = wrapCharSpan(originalText);

    Array.from(element.children).forEach((char, index) => {
        window.setTimeout(function () {
            char.classList.add('is-animated');
        }, delay * index);
    });
}

//表示領域に入った場合各種イベントの発火
const gmItemList = document.querySelectorAll('.grandmenu-title-wrap');
const gmPrimaryTitle = document.querySelectorAll('.gm-primary-title');
const conceptMainTitle = document.querySelectorAll('.concept-main-title');
// IntersectionObserverのコールバック関数
const callback = (entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
		
      if (entry.target.classList.contains('grandmenu-title-wrap')) {
        gmImgListAnimation(entry.target);
      }
		
	  if (entry.target.classList.contains('gm-primary-title')) {
        animateTextWithSpans(entry.target);
      }
		
      if (entry.target.classList.contains('concept-main-title')) {
        animateTextWithSpans(entry.target);
      }
		observer.unobserve(entry.target);
    }
  });
};

// IntersectionObserverのオプション
const options = {
  root: null, 
  rootMargin: '0px',
  threshold: 0.2 // 要素が20%領域で発火させる
};

// IntersectionObserverのインスタンスを作成
const observer = new IntersectionObserver(callback, options);

// 監視対象の要素を指定
gmItemList.forEach(element => observer.observe(element));
gmPrimaryTitle.forEach(element => observer.observe(element));
conceptMainTitle.forEach(element => observer.observe(element));
