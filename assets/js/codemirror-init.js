function initCodeMirror() {
    document.querySelectorAll(".narukami-code-editor").forEach(textarea => {
        if (textarea.classList.contains("codemirror-initialized")) {
            return; // すでに初期化されている場合はスキップ
        }

        var cm = CodeMirror.fromTextArea(textarea, {
            mode: "htmlmixed",
            lineNumbers: true,
            matchBrackets: true,
            indentUnit: 4,
            indentWithTabs: true,
            theme: "default",
            gutters: ["CodeMirror-linenumbers"],
            lineWrapping: true,
            extraKeys: {
                "Ctrl-Space": "autocomplete",
            },
            hintOptions: {
                hint: CodeMirror.hint.anyword,
                completeSingle: true
            },
        });

        // 初期化済みフラグを設定
        textarea.classList.add("codemirror-initialized");

        // 初期化後エディタのスタイルを再適応
        setTimeout(function() {
            cm.refresh();
        }, 100);

        cm.on("inputRead", function(cm, change) {
            if (change.text[0].match(/[\w</]/)) {
                setTimeout(function() {
                    CodeMirror.showHint(cm, function(cm) {
                        var cur = cm.getCursor(), token = cm.getTokenAt(cur);
                        if (token.type === "tag" || token.string === "<") {
                            return CodeMirror.hint.html(cm);
                        } else if (token.type === "property" || token.type === "keyword") {
                            return CodeMirror.hint.css(cm);
                        } else {
                            return CodeMirror.hint.javascript(cm);
                        }
                    }, { completeSingle: false });
                }, 300);
            }
        });
    });
}

// 初回実行（DOMContentLoaded 時）
document.addEventListener("DOMContentLoaded", function () {
    initCodeMirror();
});

// 手動で再適用したいとき
// initCodeMirror();

