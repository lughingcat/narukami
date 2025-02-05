document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".narukami-code-editor").forEach(textarea => {
        var cm = CodeMirror.fromTextArea(textarea, {
            mode: "htmlmixed",  // HTML, CSS, JavaScript のモード
            lineNumbers: true,  // 行番号を表示
            matchBrackets: true,  // 括弧を強調
            indentUnit: 4,  // インデント幅
            indentWithTabs: true,  // タブでインデント
            theme: "default",  // テーマ
            gutters: ["CodeMirror-linenumbers"],  // 行番号のガターを設定
            lineWrapping: true,  // 行を折り返す
            extraKeys: {
                "Ctrl-Space": "autocomplete",  // 手動で補完をトリガー
            },
            hintOptions: {
                hint: CodeMirror.hint.anyword,  // 任意の単語を補完候補として表示
                completeSingle: true  // 1つの候補がある場合に自動補完
            },
        });
		//初期化後エディタのスタイルを再適応
		setTimeout(function() {
    		cm.refresh();
		}, 100);
		
        cm.on("inputRead", function(cm, change) {
            if (change.text[0].match(/[\w</]/)) {  // `<` `/` も許可
                setTimeout(function() {
                    CodeMirror.showHint(cm, function(cm) {
                        var cur = cm.getCursor(), token = cm.getTokenAt(cur);
                        if (token.type === "tag" || token.string === "<") {
                            return CodeMirror.hint.html(cm);  // HTML補完
                        } else if (token.type === "property" || token.type === "keyword") {
                            return CodeMirror.hint.css(cm);   // CSS補完
                        } else {
                            return CodeMirror.hint.javascript(cm);  // JS補完
                        }
                    }, { completeSingle: false });
                }, 300);
            }
        });
    });
});
