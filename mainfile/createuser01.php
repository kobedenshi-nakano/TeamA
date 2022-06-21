<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $naiyou=array();
        $error=array();
        $button=array();
        if(isset($_POST['seisei2'])){
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
            $naiyou[]="identified by '".$_POST['password']."';";
        }
    }else if(isset($_POST['kirikae1'])){
        $button[]="";
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
                <!--権限ありver-->
                <form action="createuser02.php" method="POST">
                    <input type="submit" value="権限ありverへ" name="kirikae1">
                </form><br>
			
              <?php if(!empty($error)):?>
                <ul class="error_list">
                      <?php  foreach($error as $value){
                            echo $value;
                            echo '<br>';
                        }?>
                </ul>
                    <?php endif; ?>
				
                <ul class="fromnav">
                    <form method="post" action="">
							<li>ホスト名:<input type="text" name="hostname" size="10" maxlength="10"></li>
							<li>ユーザー名:<input type="text" name="username" size="10" maxlength="10"></li>
							<li>パスワード:<input type="text" name="password" size="10" maxlength="10"></li>
                            <li><input type="submit" value="生成" name="seisei2"></li>
						
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