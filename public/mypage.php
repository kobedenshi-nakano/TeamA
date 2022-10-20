<?php
session_start();

require_once '../classes/UserLogic.php';
require_once '../function.php';


$result = UserLogic::checkLogin();

$err = [];

if(!$email = filter_input(INPUT_POST, 'email')){
    $err['email'] = 'メールアドレスを記入してください';
}

if(!$password = filter_input(INPUT_POST, 'password')){
    $err['password'] = 'パスワードを記入してください';
}


if (count($err) > 0){
    //エラーがあった場合は戻す
    $_SESSION = $err;
    header('Location: login_form.php');
    return;
}

$result = UserLogic::login($email,$password);

if (!$result) {
    header('Location: login_form.php');
    return;
}
/*ここから新規登録*/
/**$result = UserLogic::checkLogin();

if (!$result){
    $_SESSION['login_err'] = 'ユーザを登録してログインしてください';
    header('Location: signup_form.php');
    return;
}


$login_user = $_SESSION['login_user'];
*/

?>
<?php
require_once '../mainfile/header.php';
?>

<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/subnav.css">
<link rel="stylesheet" href="../css/createuser.css">
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="select.php">select</a></li>
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
                <li><a href="../public/search.php">コード検索</a></li>
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
							
							<div id="where">
								<li>where句の指定:<input type="text" name="where_0" size="20" maxlength="20" placeholder="条件にしたいカラム名"></li>
								<li><input type="text" name="search_0" size="20" placeholder="カラム名検索内容"</li>
							</div>
	
					<li>order by句の指定:<select name='order'>
								<option value='none' >--</option>
                            	<option value='ASC' >昇順</option>
								<option value='DESC' >降順</option>
					</select><li>
					<li>limit句:<input type="text" name="limit"  size="10" maxlength="10" placeholder="半角のみ"></li>	
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
    require_once '../mainfile/footer.php';
?>