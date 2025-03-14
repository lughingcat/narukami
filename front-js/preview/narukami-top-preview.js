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
const rankPrimaryTitle = document.querySelectorAll('.r-p-t-prev');
const storeInfoTitle = document.querySelectorAll('.store-info-p_title');
const parallaxPrimaryTitle = document.querySelectorAll('.parallax-title');
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
		
	  if (entry.target.classList.contains('r-p-t-prev')) {
		animateTextWithSpans(entry.target);
	  }
		
	  if (entry.target.classList.contains('store-info-p_title')) {
		animateTextWithSpans(entry.target);
	  }
		
	  if (entry.target.classList.contains('parallax-title')) {
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
rankPrimaryTitle.forEach(element => observer.observe(element));
storeInfoTitle.forEach(element => observer.observe(element));
parallaxPrimaryTitle.forEach(element => observer.observe(element));


//パララックス動作制御
function parallaxControl(container) {
    const windowHeight = window.innerHeight; // ビューポートの高さ（表示領域）を測る
    const handleScroll = function() {
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
    };

    document.addEventListener("scroll", handleScroll);
    handleScroll(); // 初期ロード時に呼び出しておく
}

// IntersectionObserverのコールバック関数
const observerCallback = (entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // parallaxControlを発火させる
            parallaxControl(entry.target);
			//console.log('発火');
            // 一度発火したら監視を停止する
            observer.unobserve(entry.target);
			//console.log('停止');
        }
    });
};

// IntersectionObserverのオプション
const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1 // 要素が10%表示領域に入ったときに発火させる
};

// パララックスページ読み込み後にIntersectionObserverを設定
document.addEventListener('DOMContentLoaded', (event) => {
    const observers = new IntersectionObserver(observerCallback, observerOptions);
	const elementHeghtVh = '50vh';
    const parallaxContainers = document.querySelectorAll(".parallax-container");
    parallaxContainers.forEach(container => {
		parentEl = container.parentElement;
		parentElLayerLengh = container.querySelectorAll('.parallax-section').length -1;
		nextEl = parentEl.nextElementSibling;
		nextEl.style.marginTop = parentElLayerLengh + elementHeghtVh;
        observers.observe(container);
    });
});

//bodyのスクロールコントロール
document.addEventListener('DOMContentLoaded',function(){
	var animationEl = document.querySelector('.bg-opacity-value');
	if(animationEl){
		document.body.style.overflow = 'hidden';
		animationEl.addEventListener('animationend',function(){
			document.body.style.overflow = '';
		});
	}
});

//スクロールトップボタン制御

document.addEventListener('DOMContentLoaded', function () {
    const scrollTopBtn = document.querySelector('.scroll-top-btn');

    if (!scrollTopBtn) {
        return;
    }

    
    scrollTopBtn.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // スクロール位置に応じてボタンを表示/非表示
    window.addEventListener('scroll', function () {
        if (window.scrollY > 300) { // 300px以上スクロールしたら表示
            scrollTopBtn.style.display = 'block';
        } else {
            scrollTopBtn.style.display = 'none';
        }
    });

    // 初期状態で非表示
    scrollTopBtn.style.display = 'none';
});

