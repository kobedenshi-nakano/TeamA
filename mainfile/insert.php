<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $naiyou=array();
	   $error=array();
	   
       if(empty($_POST['tbl_name'])){
           $error[]="テーブル名が入力されていません。";
       }else{
           $naiyou[]="insert into ".$_POST['tbl_name'];
       }

       if(empty($_POST['value_name'])){
           $error[]="values句が入力されていません。";
       }else{
           $naiyou[]=" values (".$_POST['value_name'].");";
       }
   }
?>
<?php
      require_once __DIR__ .'./header.php';
	  require_once __DIR__ .'./subnav.php';
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/createuser.css">
	
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
                <ul class="globalnav">
                    <form method="post" action="">
                    
                    <li>追加するテーブル名:
                            <select name="tbl_name">
                                <option value="none">---</option>
                                <option value=' create role'>create文で生成したテーブル名1</option>
                            
                            </select></li>
                        <table>
                                <tr>
									<th scope="col">create tableにあるカラム1</th>
									<th scope="col">create tableにあるカラム2</th>
									<th scope="col">create tableにあるカラム3</th>
									<th scope="col">create tableにあるカラム4</th>
									<th scope="col">create tableにあるカラム5</th>
								</tr>
                            <tbody>
                                <tr>
									<th scope="row"> 
										<input type="text" name="#1" size="10" maxlength="10">
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
                            </tbody>
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
			