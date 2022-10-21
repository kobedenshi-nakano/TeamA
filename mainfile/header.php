<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>SQLツクール</title>
<link rel="stylesheet" href="../css/header.css">
</head>
<body>

<script>
    var i = 1 ;
function addForm() {
if(i<=1){
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'inputform_' + i;
  input_data.placeholder = '列の名前' + i;
  input_data.innerHTML="&nbsp;";
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);

  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'inputformnext_' + i;
  input_data.placeholder = '更新する列の値' + i;
  input_data.innerHTML="&nbsp;";
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);

  var button_data = document.createElement('button');
  button_data.name = i;
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = "&nbsp;";
  button_data.innerHTML = '削除';
  var input_area = document.getElementById(input_data.name);
  parent.appendChild(button_data);
  
}
  

  i++;
}

function deleteBtn(target) {
  var target_id = target.id;
  var parent = document.getElementById('form_area');
  /*このした5行を削除するとリロードがかかるが値がリセットされるので配列に影響が出ない*/
  var ipt_id = document.getElementById('inputform_' + target_id);
  var ipt_id = document.getElementById('inputformnext_' + target_id);
  var tgt_id = document.getElementById(target_id);
  parent.removeChild(ipt_id);
  parent.removeChild(tgt_id);	
}

function addcolom() {
if(i<=2){
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'colom_name_' + i;
  input_data.placeholder = 'カラム名' + i;
  input_data.innerHTML="&nbsp;";
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);

  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'value_name_' + i;
  input_data.placeholder = '値を入力(value)' + i;
  input_data.innerHTML="&nbsp;";
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);

  var button_data = document.createElement('button');
  button_data.name = i;
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = "&nbsp;";
  button_data.innerHTML = '削除';
  var input_area = document.getElementById(input_data.name);
  parent.appendChild(button_data);

}
  i++;
}

function addselect() {
if(i<=2){
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'colom_name_' + i;
  input_data.placeholder = 'カラム名' + i;
  input_data.innerHTML="&nbsp;";
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);

  var button_data = document.createElement('button');
  button_data.name = i;
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = "&nbsp;";
  button_data.innerHTML = '削除';
  var input_area = document.getElementById(input_data.name);
  parent.appendChild(button_data);
}
  

  i++;
}


function addwhere() {
if(i<=1){
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'where_' + i;
  input_data.placeholder = '列の名前' + i;
  input_data.innerHTML="&nbsp;";
  var parent = document.getElementById('where');
  parent.appendChild(input_data);

  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'search_' + i;
  input_data.placeholder = '更新する列の値' + i;
  input_data.innerHTML="&nbsp;";
  var parent = document.getElementById('where');
  parent.appendChild(input_data);

  var button_data = document.createElement('button');
  button_data.name = i;
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = "&nbsp;";
  button_data.innerHTML = '削除';
  var input_area = document.getElementById(input_data.name);
  parent.appendChild(button_data);

  input_data.innerText='\n';
}
  

  i++;
}

function copyToClipboard() {
            // コピー対象をJavaScript上で変数として定義する
            var copyTarget = document.getElementById("kekka-container");

            // コピー対象のテキストを選択する
            copyTarget.select();

            // 選択しているテキストをクリップボードにコピーする
            document.execCommand("Copy");

            // コピーをお知らせする
            alert("コピーできました！ : " + copyTarget.value);
        }

</script>

<header>
	<div class="header-container">
		<a href="createbun.php"><h1>SQLツクール</h1></a>
	</div>
</header>