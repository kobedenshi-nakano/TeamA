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
                            <li>colomとvalue:(文字型の場合は""を付ける)</li>
                                <div id="form_area">
                                <input type="text" name="colom_name_0" placeholder="カラム名"></li>
						        <input type="text" name="value_name_0" placeholder="値を入力(value)">
  						        <!--<button id="0" onclick="deleteBtn(this)">削除</button>-->
					            </div>
						        <input type="button" value="フォーム追加" onclick="addcolom()">
                                </tbody>
                            </tr>
                                <!--
                                <li>カラム名:<input type="text" name="colom_name" size="10" maxlength="10"></li>
									<th scope="col">create tableにあるカラム2</th>
									<th scope="col">create tableにあるカラム3</th>
									<th scope="col">create tableにあるカラム4</th>
									<th scope="col">create tableにあるカラム5</th>
							
                            
                                <tr>
									<th scope="row"> 
										<input type="text" name="value_name" size="10" maxlength="10">
									</th>
									<td>
										<input type="text" name="#2" size="10" maxlength="3">
									</td>
									<td>
                                        <input type="text" name="#3" size="10" maxlength="10">
                                    </td>
									<td>
										<input type="text" name="#4" size="10" maxlength="10">
									</td>
									<td>
										<input type="text" name="f#5" size="10" maxlength="10">
									</td>
								</tr>
                            
                            -->
                        </table>
					<li><input type="submit" value="生成"></li>
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
			