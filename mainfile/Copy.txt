const btn = document.getElementById("button"); // button要素取得
const txt = document.getElementById("text").textContent; // テキスト取得

btn.addEventListener("click", () => { // ボタンをクリックしたら
  navigator.clipboard
    .writeText(txt) // テキストをクリップボードに書き込み（＝コピー）
   .then(
     (success) => console.log('テキストのコピーに成功'),
     (error) => console.log('テキストのコピーに失敗')
   );

   btn.innerHTML = "OK!"; // ボタンの文字変更
     setTimeout(() => (btn.innerHTML = "COPY!"), 1000); // ボタンの文字を戻す
});