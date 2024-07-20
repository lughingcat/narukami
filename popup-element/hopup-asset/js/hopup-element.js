// JavaScript Document
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
    let element = document.getElementById('parallax-popup-wrap');
    if (element) {
		console.log('値が存在し、関数が発火しました')
        parallaxControl(); // parallaxControl() を呼び出す
    }
});