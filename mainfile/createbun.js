let num = 1;
let view_count = document.querySelectorAll("div[id]").length;

$(function() {
 $('button#add').click(function(){

  num = num + 1 ;
  view_count = view_count + 1 ;

  fetch('indexSumi4.php', {
    method: 'POST',
    headers: { 'Content-Type':'application/json'},
    body: JSON.stringify(num)
  })
  .then(response => response.json())
  .then(res => {
    console.log(res);
  });

  let tr_form = '' + 
   '<tr>' + 
    '<td><input type="text" name="main-name[]"></td>' + 
    '<td>' + 
     '<div id="view_1"></div>' + 
     '<select name="Type[]">' + 
      '<option value=" 未入力(型)">--</option>' + 
      '<option value=" INTEGER">INTEGER(整数値)</option>' + 
      '<option value=" DECIMAL">DECIMAL(小数)</option>' + 
      '<option value=" CHAR">CHAR(固定長 文字列)</option>' + 
      '<option value=" VARCHAR">VARCHAR(可変長 文字列)</option>' + 
      '<option value=" DATETIME">DATETIME(日付と時間)</option>' + 
      '<option value=" DATE">DATE(日付)</option>' + 
      '<option value=" TIME">TIME(時間)</option>' + 
     '</select>' + 
    '</td>' + 
    '<td><input type="text" name="Type-numerical[]"size="3" maxlength="3"></td>' + 
    '<td><input type="text" name="start[]" size="5" maxlength="10"></td>' + 
    '<td>' + 
     '<div id="view_1"></div>' + 
     '<select name="重複[]">' + 
      '<option value=" 未入力(重複)">--</option>' + 
      '<option value="">重複可</option>' + 
      '<option value=" UNIQUE">重複なし</option>' + 
     '</select>' + 
    '</td>' + 
    '<td><input type="text" name="else-rule[]" size="5" maxlength="10"></td>' + 
    '<td>' + 
     '<div id="view_1"></div>' + 
     '<select name="yes-no-null[]" >' + 
      '<option value=" 未入力(null)">--</option>' + 
      '<option value=" NOT NULL">不可</option>' + 
      '<option value="">可</option>' + 
     '</select>' + 
    '</td>' + 
    '<td>' + 
     '<div id="view_1"></div>' + 
     '<select name="main-key[]" >' + 
      '<option value=" 未入力(主キー)">--</option>' + 
      '<option value="">不要</option>' + 
      '<option value=" PRIMARY KEY">必要</option>' + 
     '</select>' + 
    '</td>' + 
    '<td>' + 
     '<div id="view_1"></div>' + 
     '<select name="forign-key[]">' + 
      '<option value=" 未入力(外部キー)">--</option>' + 
      '<option value="">不要</option>' + 
      '<option value=" REFERENCES">必要</option>' + 
     '</select>' + 
    '</td>' + 
    '<td><input type="text" name="forign-name[]" size="10" maxlength="10"></td>' + 
    '</tr>';

   $(tr_form).appendTo($('table > tbody'));
 });
});

