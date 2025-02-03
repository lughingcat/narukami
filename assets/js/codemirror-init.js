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

        cm.on("inputRead", function(cm, change) {
            if (change.text[0].match(/[\w</]/)) {  // `<` `/` も許可
                setTimeout(function() {
                    CodeMirror.commands.autocomplete(cm, null);
                }, 300);
            }
        });
    });
});
