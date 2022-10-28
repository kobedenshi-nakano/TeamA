<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
//submitされた検索条件を使いDBに問い合わせる処理
$naiyou=array();
$error=array();

if(!empty($_POST['select'])){
	if(!empty($_POST['colom_name_0'])){		
		if(!empty($_POST['ASsearch_0'])){
			$naiyou[]="select ".$_POST['colom_name_0']." AS ".$_POST['ASsearch_0'];
		}else{
			$naiyou[]="select ".$_POST['colom_name_0'];
		}
		if(!empty($_POST['colom_name_1'])){
			if(!empty($_POST['ASsearch_1'])){
				$naiyou[]=",".$_POST['colom_name_1']." AS ".$_POST['ASsearch_1'];
			}else{
				$naiyou[]=",".$_POST['colom_name_1'];
			}
			if(!empty($_POST['colom_name_2'])){
				if(!empty($_POST['ASsearch_2'])){
					$naiyou[]=",".$_POST['colom_name_2']." AS ".$_POST['ASsearch_2'].";";
				}else{
					$naiyou[]=",".$_POST['colom_name_2'].";";
				}
			}
			else{
				$naiyou[]=";";
			}
		}
		else{
			$naiyou[]=";";
		}
	}
	else{
		$naiyou[]="select * from ".$_POST['select'].";";
	}
}else{
	$error[]="テーブル名を入力してください";
}


/*
else if(isset($_POST['colom_name_1'])&&!($_POST['group_0']==="none")){
			if(isset($_POST['colom_name_2'])&&!($_POST['group_0']==="none")){
				$naiyou[]="select ".$_POST['group_0']." (".$_POST['colom_name_0']."), ".$_POST['group_0']." (".$_POST['colom_name_1']."), ".$_POST['group_0']." (".$_POST['colom_name_2'].") from ".$_POST['select'].";";
			}
			else{
				$naiyou[]="select ".$_POST['group_0']." (".$_POST['colom_name_0']."),".$_POST['group_0']." (".$_POST['colom_name_1'].") from ".$_POST['select'].";";
			}
}else{
	$naiyou[]="select ".$_POST['colom_name_0']." from ".$_POST['select'].";";
	if(!($_POST['group_0']==="none")){
		$naiyou[]= "select ".$_POST['group_0']." (".$_POST['colom_name_0'].") "." from ".$_POST['select'].";";
	}
}


if(!empty($_POST['where_0']) || !empty($_POST['search_0'])){
	$naiyou[]=" where ".$_POST['where_0']."=".$_POST['search_0'];
}


if(!empty($_POST['group'])){
	$naiyou[]=" group by ".$_POST['group'];
}
*/


}

?>

<?php
    require_once __DIR__ .'./header.php';
	/*require_once __DIR__ .'./subnav.php';*/
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/subnav.css">
<link rel="stylesheet" href="../css/createuser.css">
<link rel="stylesheet" href="../css/select.css">
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="select.php" style="color:red">select</a></li>
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
			</ul>
</div>

	<div class="column2">
		<ul class="news-contents">
					
		<?php if(!empty($error)):?>
                <ul class="error_list">
                    <?php  foreach($error as $value){
                            echo $value;
                            echo '<br>';
                        }?>
                </ul>
                    <?php endif; ?>
				<br>
                <ul class="formnav">
                    <form method="post" action="">
                    
                    <li>参照するテーブル名:<input type="text" name="select" size="10" maxlength="10"></li>
                        
                        <table>
                            <tr>
                            <tbody>
                            <li>column(文字型の場合は""を付ける)</li>
                                <div id="form_area">
                                <input type="text" name="colom_name_0" placeholder="カラム名"></li>
  						        <!--<button id="0" onclick="deleteBtn(this)">削除</button>-->
					            </div>
						        <input type="button" value="フォーム追加" onclick="addselect()">
                                </tbody>
                            </tr>
							
							<!--<li>集合関数の指定:<select name='group_0'>
								<option value='none' >--</option>
                            	<option value='SUM' >総和</option>
								<option value='MAX' >最大値</option>
								<option value="MIN">最小値</option>
								<option value="AVG">平均値</option>
								<option value="COUNT">カウント</option>
					            </select>
							<li>-->
						
						<!-- as句入力 -->
						
						<div id=ASarea>
							as句の指定:<input type="text" name="ASsearch_0"  placeholder="別名">
						</div>
						<input type="button" value="フォーム追加" onclick="addAS()">
				
						<!-- as句入力ここまで -->

						<!-- join句入力 -->
						<div id="join">
							<li>join句の指定:<input type="text" name="where_0" size="20" maxlength="20" placeholder="結合されるカラム"></li>
							<li><input type="text" name="search_0" size="20" placeholder="結合したいテーブル"></li>
						</div>
						
						<!--join句ここまで -->

						<!-- where句入力 -->

							<div id="where">
								<li>where句の指定:<input type="text" name="where_0" size="20" maxlength="20" placeholder="条件にしたいカラム名"></li>
								<li><input type="text" name="search_0" size="20" placeholder="カラム名検索内容"></li>
							</div>
						
						<!-- where句ここまで-->

							<li>group by句の指定:<input type="text" name="group"  size="10" maxlength="10" placeholder="半角のみ"></li>	

				
			        <li><input type="submit" class="generatebtn" value="生成"></li>
                    </table>
                    </form>
				</ul>

		</ul>

		    <div class="kekka-container">
				<p>出力結果</p>
		        <li>
				<?php
                    if(empty($error)){
                        if(isset($naiyou)){
                            foreach($naiyou as $value){
                                echo $value;
                                echo '';
                            }
                        }
                    }
                    ?>
				</li>
		    </div>

		</ul>
	</div>
<?php
    require_once __DIR__ .'./footer.php';
?>


<script type="text/javascript">
    var i = 1 ;
function addAS() {
if(i<=2){
	/*
   var d = document;
   var link = d.createElement('link').getElementsByTagName('input');
      link.href = '../css/select.css';
	  link.rel = 'stylesheet';
	  link.type = 'text/css';
   var parent = document.getElementById('ASarea');
       parent.appendChild(link);
*/

   var input_data = document.createElement('input');
 	   input_data.type = 'text';
       input_data.name = 'ASsearch_' + i;
       input_data.placeholder = '別名' + i;
   var parent = document.getElementById('ASarea');
       parent.appendChild(input_data);

if(i==2){
  var button_data = document.createElement('button');
  button_data.name = i;
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = '削除';
  var input_area = document.getElementById(input_data.name);
  parent.appendChild(button_data);
}
  
  
}
  

  i++;
}
</script>