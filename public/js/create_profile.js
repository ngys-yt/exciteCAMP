(function() {
    // 厳格モード
    'use strict';
        // load ページの読み込みが完了した時
        window.addEventListener('load', function() {
        // className 取得
        const forms = document.getElementsByClassName('needs-validation');
        const validation = Array.prototype.filter.call(forms, function(form) {
            // submitイベントでバリデーションを実行する
            form.addEventListener('submit', function(event) {
            // バリデーションを実行する
            if (form.checkValidity() === false) {
                // バリデーション失敗時にsubmitイベントを停止させる
                event.preventDefault();
                event.stopPropagation();
            }
            // バリデーション終了のCSSクラスを追加する
            form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();