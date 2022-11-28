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
	  /*require_once __DIR__ .'./subnav.php';*/
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/createuser.css">
<link rel="stylesheet" href="../css/subnav.css">

<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
                <li><a href="select.php">select</a></li>
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php" style="color:red">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
			</ul>
</div>

		<div class="column2">
		    <ul class="news-contents">
                <form action="createuser02.php" method="POST">
                    <input class="grantA" type="submit" value="権限ありverへ" name="kirikae1">
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
                            <li><input type="submit" class="generatebtn" value="生成" name="seisei2"></li>
                    </form>
                </ul>
			    <div class="kekka-container">
				    <p>出力結果</p>
		            <li id="text">
                    <?php 
                    if(isset($naiyou)){
                        foreach($naiyou as $value){
                            echo $value;
                            echo '';
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