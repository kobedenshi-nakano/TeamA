//もしボタンが押されたら任意の文字列をコピーする
const copy_text =$json_value;
const copy_text1=$json_value1;
const copy_btn = document.getElementById('btn');
btn.addEventListener("click", () => { // ボタンをクリックしたら
  navigator.clipboard
    .writeText(copy_text) // テキストをクリップボードに書き込み（＝コピー）
    .then(
      (success) => console.log('テキストのコピーに成功'),
      (error) => console.log('テキストのコピーに失敗')
    );

  btn.innerHTML = "OK!"; // ボタンの文字変更
  setTimeout(() => (btn.innerHTML = "COPY!"), 1000); // ボタンの文字を戻す
});
//copy_btn.addEventListener(`click`, navigator.clipboard.writeText(copy_text).then(
    //() => {
    // true
    //console.log("Copied it to the clipboard.");
   //}

  /*navigator.clipboard.writeText(copy_text).then(() => {
    // true
    output.textContent = 'Copied it to the clipboard.';
   }, () => {
    // false
    output.textContent = 'Could not copy.';
   });*/
   //navigator.clipboard.readText().then(
    //(copy_text) => document.getElementById("copy-text").innerText = copy_text);
  
//));