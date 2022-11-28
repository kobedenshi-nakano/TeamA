<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $naiyou=array();
	$error=array();
	
    if(empty($_POST['tbl_name'])){
        $error[]="テーブル名が入力されていません。";
    }else{
        $naiyou[]="insert into ".$_POST['tbl_name'];
    }

    if(empty($_POST['colom_name_0'])){
        $naiyou[]="";
    }else{
            $naiyou[]=" (".$_POST['colom_name_0'];
            if(empty($_POST['colom_name_1']))
            {
                $naiyou[]=") ";
            }else if(empty($_POST['colom_name_2'])){
                $naiyou[]=",".$_POST['colom_name_1'].")";
            }else{
                $naiyou[]=",".$_POST['colom_name_1'].",".$_POST['colom_name_2'].")";
            }   
        }

        

    if(empty($_POST['value_name_0'])){
        $error[]="values句が入力されていません。";
    }else{
        $naiyou[]=" values (".$_POST['value_name_0'];
        if(empty($_POST['value_name_1']))
            {
                $naiyou[]="); ";
            }else
            {
                $naiyou[]=",".$_POST['value_name_1'];
                if(empty($_POST['value_name_2'])){
                    $naiyou[]="); ";
                }else{
                    $naiyou[]=",".$_POST['value_name_2'].");";
                }
            }
        
        }
}
?>

<?php
    require_once __DIR__ .'./header.php';
	/*require_once __DIR__ .'./subnav.php';*/
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
                    
                    <li>追加するテーブル名:<input type="text" name="tbl_name" size="10" maxlength="10"></li>

                    <!--
                            <select name="tbl_name">
                                <option value="none">---</option>

                                <option value=' create role'>create文で生成したテーブル名1</option>
                            
                            </select></li>
                        -->
                        
                        <table>
                            <tr>
                            <tbody>
                            <li>columnとvalue:(文字型の場合は""を付ける)</li>
                                <div id="form_area">
                                <input type="text" name="colom_name_0" placeholder="カラム名"></li>
						        <input type="text" name="value_name_0" placeholder="値を入力(value)">
					            </div>
						        <input type="button" value="フォーム追加" onclick="addcolom()">
                                </tbody>
                            </tr>
                            
                        </table>
					<li><input type="submit" class="generatebtn" value="生成"></li>
                    </form>
				</ul>

		</ul>

		    <div class="kekka-container">
				<p>出力結果</p>
		        <li id="text">
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
                <button id="button">COPY!</button>
		    </div>
        <script>
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
        </script>
		</ul>
	</div>
<?php
    require_once __DIR__ .'./footer.php';
?>
			