<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $naiyou=array();
        $error=array();
        if(isset($_POST['kekka'])){
            $naiyou[]="GRANT".$_POST['kekka']." ON ";
        }else{
            $error[]="権限を選択してください。";
        }

        if(empty($_POST['database'])){
            $error[]="適用対象のデータベースを入力してください。";
        }else{
            $naiyou[]=$_POST['database'].".";
        }

        if(empty($_POST['table'])){
            $error[]="適用対象のテーブルを入力してください。";
        }else{
            $naiyou[]=$_POST['table']." TO ";
        }

        if(empty($_POST['username'])){
            $error[]="ユーザー名を入力してください。";
        }else{
            $naiyou[]="'".$_POST['username']."'@";
        }
        
        if(empty($_POST['hostname'])){
            $error[]="ホスト名を入力してください。";
        }else{
            $naiyou[]="'".$_POST['hostname']."'";
        }
       
        if(empty($_POST['password'])){
            $error[]="パスワードを入力してください。";
        }else{
            $naiyou[]="identified by '".$_POST['password']."';<br /> FLUSH PRIVILEGES;";
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
                
                <form action="createuser01.php" method="POST">
                    <input type="submit" value="権限なしverへ">
                </form><br>
			  <nav>
              <?php if(!empty($error)):?>
                <ul class="error_list">
                      <?php  foreach($error as $value){
                            echo $value;
                            echo '<br>';
                        }?>
                </ul>
                    <?php endif; ?>
				<div class="nav-container">
                <ul class="formnav">
                    <form method="post" action="">
							<li>ホスト名:<input type="text" name="hostname" size="10" maxlength="10"></li>
							<li>ユーザー名:<input type="text" name="username" size="10" maxlength="10"></li>
							<li>パスワード:<input type="text" name="password" size="10" maxlength="10"></li>
                            <li>権限のジャンル選択:
                            <select class="form-control" onchange="viewChange();" id="kekka" name='kekka'><!--class="form-control" onchange="viewChange();" id="kekka" 削除-->
							<option value=' NONO'>--</option>
							<option id="ALL" value=' all'>ALL</option><!--id="ALL"-->
							<option id="alter" value=' alter'>ALTER</option><!--id="alter"-->
							<option value=' alter-routine'>ALTER ROUTINE</option>
							<option value=' create'>CREATE</option>
                            <option value=' create-tablespace'>CREATE TABLESPACE</option>
							<option value=' create-temporary-tables'>CREATE TEMPORARY TABLES</option>
							<option value=' create-user'>CREATE USER</option>
							<option value=' create-view'>CREATE VIEW</option>
                            <option value=' delete'>DELETE </option>
							<option value=' drop'>DROP</option>
							<option value=' event'>EVENT</option>
							<option value=' execute'>EXECUTE</option>
                            <option value=' grant-option'>GRANT OPTION</option>
							<option value=' index'>INDEX</option>
                            <option value=' insert'>INSERT </option>
							<option value=' look-tables'>LOOK TABLES</option>
							<option value=' process'>PROCESS</option>
							<option value=' reload'>RELOAD</option>
                            <option value=' select'>SELECT</option>
							<option value=' show-databases'>SHOW DATABASES</option>
                            <option value=' shoutdown'>SHUTDOWN</option>
							<option value=' trigger'>TRIGGER</option>
							<option value=' update'>UPDATE</option>
							<option value=' usage'>USAGE</option>
                            </select>></li>
                            <li>適用対象のデータベース:<input type="text" name="database" size="10" maxlength="10"></li>
							<li>適用対象のテーブル:<input type="text" name="table" size="10" maxlength="10"></li>
                            <li><input type="submit" value="生成"></li>
						
                    </form>
                    
                    <div id="hukidashi-waku">
                        <div class="col-auto my-5">
                        <div id="Box1" class="my-5">
                            <p>one</p>
                        </div>
                        <div id="Box2" class="my-5" style="display:none;">  // ここ
                            <p>two</p>
                        </div>
                        <div id="Box3" class="my-5" style="display:none;">  // ここ
                            <p>three</p>
                        </div>
                    </div>
                        <script>
                            function viewChange(){
                            if(document.getElementById('sample')){
                            id = document.getElementById('sample').value;
                            if(id == 'select1'){
                            document.getElementById('Box1').style.display = "";
                            document.getElementById('Box2').style.display = "none";
                            document.getElementById('Box3').style.display = "none";
                            }else if(id == 'select2'){
                            document.getElementById('Box1').style.display = "none";
                            document.getElementById('Box2').style.display = "";
                            document.getElementById('Box3').style.display = "none";
                            }
                            else if(id == 'select3'){
                            document.getElementById('Box1').style.display = "none";
                            document.getElementById('Box2').style.display = "none";
                            document.getElementById('Box3').style.display = "";
                                }
                            } 

                            window.onload = viewChange;
                        }
                        </script>
                        
                    </div>
                </ul>
			    <div class="kekka-container">
				    <p>出力結果</p>
                    <!--<div class="hukidashi-waku">まうすにのせる
                        <span class="hukidashi">吹き出し</span>
                    </div>-->
		            <li>
				    <!--出力結果-->
                    <?php /*if(isset($naiyou)):?>
                    <?php foreach( $naiyou as $value ): ?>
				    <?php echo $value; ?>
				    <?php echo ' '; ?>
				    <?php endforeach; ?>
				    <?php endif; */
                    if(isset($naiyou)){
                        foreach($naiyou as $value){
                            echo $value;
                            echo '';
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