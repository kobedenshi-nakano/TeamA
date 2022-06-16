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
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>SQLツクール</title>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/createuser.css">
</head>
<body>
<header>
	<div class="header-container">
		<a href="createbun.php"><h1>タイトル</h1></a>
	</div>
</header>
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="update.php">update</a></li>
				<li><a href="select.php">select</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
                <li><a href="createbun.php">create</a></li>
			</ul>
		</div>
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
							<option value=' '>--</option>
							<option value=' '></option>
							<option value=' '></option>
							<option value=' '></option>
							<option value=' '></option>
						</select></li>
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
	</div>
</div>


<footer>
	<div class="footer-container">
		<p class="copyright">©PBL2-Aチーム</p>
	</div>
</footer>
</body>
</html>