let num = 1;
let view_count = document.querySelectorAll("div[id]").length;

$(function() {
 num++;
 $('button#add').click(function(){
 
  num=num+1;
  $.ajax({
    type: 'POST',
    url: 'createbun.php',
    data: {
      'name1' : value1,
      
    },
    
  });
 
  view_count = view_count + 1 ;

  let tr_form = '' + 
   '<tr>' + 
    '<td><input type="text" name="main-name[]" size="10" maxlength="10"></td>' + 
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
      '<option value="" selected>2つ以上可</option>' + 
      '<option value=" UNIQUE">1つだけ</option>' + 
     '</select>' + 
    '</td>' + 
    '<td><input type="text" name="else-rule[]" size="5" maxlength="10"></td>' + 
    '<td>' + 
     '<div id="view_1"></div>' + 
     '<select name="yes-no-null[]" >' + 
      '<option value=" NOT NULL" selected>NG</option>' + 
      '<option value="">OK</option>' + 
     '</select>' + 
    '</td>' + 
    '<td>' + 
     '<div id="view_1"></div>' + 
     '<select name="main-key[]" >' + 
      '<option value="" selected>いらない</option>' + 
      '<option value=" PRIMARY KEY">いる</option>' + 
     '</select>' + 
    '</td>' + 
    '<td>' + 
     '<div id="view_1"></div>' + 
     '<select name="forign-key[]">' + 
      '<option value="" selected>いらない</option>' + 
      '<option value=" REFERENCES">いる</option>' + 
     '</select>' + 
    '</td>' + 
    '<td><input type="text" name="forign-name[]" size="10" maxlength="10"></td>' + 
    '</tr>';

   $(tr_form).appendTo($('table > tbody'));
 });
 
});

