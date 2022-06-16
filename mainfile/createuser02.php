<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $naiyou=array();
        $error=array();
        if(empty($_POST['username'])){
            $error[]="ユーザー名を入力してください。";
        }else{
            $naiyou[]="create user '".$_POST['username']."'@";
        }
        
        if(empty($_POST['hostname'])){
            $error[]="ホスト名を入力してください。";
        }else{
            $naiyou[]="'".$_POST['hostname']."'";
        }
       
        if(empty($_POST['password'])){
            $error[]="パスワードを入力してください。";
        }else{
            $naiyou[]="identified by '".$_POST['password']."'";
        }
        
        if(empty($_POST['kengen'])){
            $error[]="権限を選択してください。";
        }else{
            $naiyou[]="identified by '".$_POST['kengen']."'";
        }
    }
?>
<?php
      require_once __DIR__ .'./header.php';
	  require_once __DIR__ .'./subnav.php';
?>
<link rel="stylesheet" href="../css/home.css">

		<div class="column2">
		    <ul class="news-contents">
                <!--権限ありver-->
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
                            <li>権限のジャンル選択:<select name='kengen' >
							<option value=' 未入力'>--</option>
							<option value=' '>ALL</option>
							<option value=' '>ALTER</option>
							<option value=' '>ALTER ROUTINE</option>
							<option value=' '>CREATE</option>
                            <option value=' '>CREATE TABLESPACE</option>
							<option value=' '>CREATE TEMPORARY TABLES</option>
							<option value=' '>CREATE USER</option>
							<option value=' '>CREATE VIEW</option>
                            <option value=' '>DELETE </option>
							<option value=' '>DROP</option>
							<option value=' '>EVENT</option>
							<option value=' '>EXECUTE</option>
                            <option value=' '>GRANT OPTION</option>
							<option value=' '>INDEX</option>
                            <option value=' '>INSERT </option>
							<option value=' '>LOOK TABLES</option>
							<option value=' '>PROCESS</option>
							<option value=' '>RELOAD</option>
                            <option value=' '>SELECT</option>
							<option value=' '>SHOW DATABASES</option>
                            <option value=' '>SHUTDOWN</option>
							<option value=' '>TRIGGER</option>
							<option value=' '>UPDATE</option>
							<option value=' '>USAGE</option>
						    </select></li>
                            <li>適用対象のデータベース:<input type="text" name="database" size="10" maxlength="10"></li>
							<li>適用対象のテーブル:<input type="text" name="table" size="10" maxlength="10"></li>
                            <li><input type="submit" value="生成"></li>
						
                    </form>
                </ul>
			    <div class="kekka-container">
				    <p>出力結果</p>
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