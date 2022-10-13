//もしボタンが押されたら任意の文字列をコピーする
let copy_text =$json_value;
let copy_text1=$json_value1;
let copy_btn = document.getElementById('copy-btn');
  copy_btn.addEventListener(`click`, navigator.clipboard.writeText(copy_text).then(
    () => {
    // true
    console.log("Copied it to the clipboard.");
   }

  /*navigator.clipboard.writeText(copy_text).then(() => {
    // true
    output.textContent = 'Copied it to the clipboard.';
   }, () => {
    // false
    output.textContent = 'Could not copy.';
   });*/
   //navigator.clipboard.readText().then(
    //(copy_text) => document.getElementById("copy-text").innerText = copy_text);
  
));