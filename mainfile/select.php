<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
//submitされた検索条件を使いDBに問い合わせる処理
$naiyou=array();
$error=array();


if(empty($_POST['colom_name_0'])){
	if(empty($_POST['select'])){
		$error[]="テーブル名が入力されていません。";
		}else{
			$naiyou[]="select * from  ".$_POST['select'].";";
	}
}else if(isset($_POST['colom_name_1'])){
			if(isset($_POST['colom_name_2'])){
				$naiyou[]="select ".$_POST['colom_name_0'].",".$_POST['colom_name_1'].",".$_POST['colom_name_2']." from ".$_POST['select'].";";
			}
			else{
				$naiyou[]="select ".$_POST['colom_name_0'].",".$_POST['colom_name_1']." from ".$_POST['select'].";";
			}
}else{
	$naiyou[]="select ".$_POST['colom_name_0']." from ".$_POST['select'].";";
}
}
?>

<?php
    require_once __DIR__ .'./header.php';
	/*require_once __DIR__ .'./subnav.php';*/
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/subnav.css">
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php" style="color:red">insert</a></li>
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

                    <!--
                            <select name="tbl_name">
                                <option value="none">---</option>

                                <option value=' create role'>create文で生成したテーブル名1</option>
                            
                            </select></li>
                        -->
                        
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

					<li>where句の指定:<input type="text" name="where" size="20" maxlength="20" placeholder="最初の列名のみ適用"></li>
					<li>order by句の指定:<select name='order'>
								<option value='none' >--</option>
                            	<option value='ASC' >昇順</option>
								<option value='DESC' >降順</option>
					</select><li>
					<li>limit句:<input type="text" name="limit"  size="10" maxlength="10" placeholder="半角のみ"></li>	
			        <li><input type="submit" value="生成"></li>
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