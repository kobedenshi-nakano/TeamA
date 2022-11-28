<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $naiyou=array();
        $error=array();
        $button=array();
        
        if(isset($_POST['seisei'])){
        if($_POST['kekka']===" NONO"){
            if($_POST['global']==="none"){
                $error[]="権限を選択してください。";
            }
        }
        if(!($_POST['kekka']===" NONO")){
            if(!($_POST['global']==="none")){
                $error[]="両方の権限を選択しないでください。";
            }
        }
        if(!($_POST['kekka']===" NONO")){
                $naiyou[]="GRANT".$_POST['kekka']." ON ";
        }
        if(!($_POST['global']==="none")){
            $naiyou[]="GRANT".$_POST['global']." ON ";
        }
        
        
            if(empty($_POST['database'])){
                if($_POST['global']==="none"){
                    if($_POST['kekka']===" NONO")
                    $error[]="適用対象のデータベースを入力してください。";
                }
              
                $naiyou[]="*.";
                
            }else if(isset($_POST['global'])&& !($_POST['global']==="none" )){
                $naiyou[]="*.";
            }else{
                $naiyou[]=$_POST['database']."."; 
            }

            //*の後にtoを追加することもある
            if(empty($_POST['table'])){
                $naiyou[]=$_POST['table']."*  TO ";
            }else if(isset($_POST['global'])&& !($_POST['global']==="none" )){
                $naiyou[]="*  TO ";
            }
            else{
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
        
            //identified からいらない場合がある
            if(empty($_POST['password'])){
                $error[]="パスワードを入力してください。";
            }else{
                $naiyou[]="identified by '".$_POST['password']."';<br /> FLUSH PRIVILEGES;";
            }

           
    }else if(isset($_POST['kirikae2']))
    {
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
				<li><a href="update.php" >update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php"style="color:red">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
			</ul>
</div>

		<div class="column2">
		    <ul class="news-contents">
                
                <form action="createuser01.php" method="POST">
                    <input class="grantB" type="submit" value="権限なしverへ" name="kirikae2">
                </form><br>
			
            <?php if(!empty($error)):?>
                <ul class="error_list">
                    <?php  foreach($error as $value){
                            echo $value;
                            echo '<br>';
                        }?>
                </ul>
                    <?php endif; ?>
				
                <ul class="formnav">
                    <form method="post" action="">
							<li>ホスト名:<input type="text" name="hostname" size="10" maxlength="10"></li>
							<li>ユーザー名:<input type="text" name="username" size="10" maxlength="10"></li>
							<li>パスワード:<input type="text" name="password" size="10" maxlength="20"></li>
                            <li>権限のジャンル選択:
                            <select name='kekka'>
							<option value=' NONO' >--</option>
                            <!--<option value=' More' >複数使用</option>-->
							<option value=' all' title="GRANT OPTION（権限の付与）以外の全てを許可する">ALL</option>
							<option value=' alter'title="ALTER TABLE（テーブルの変更）の使用を許可する">ALTER</option>
							<option value=' alter routine'title="ストアドルーチン(プロシージャ or 関数)の変更・削除を許可する">ALTER ROUTINE</option>
							<option value=' create'title="データベースとテーブルの作成を許可する">CREATE</option>
                            
                            <!--テーブルを指定してはいけない-->
							<option value=' create temporary tables'title="テーブルスペースとログファイルグループの作成を許可する">CREATE TEMPORARY TABLES</option>
							<option value=' create view' title="	ユーザの作成・変更・削除を許可する">CREATE VIEW</option>
                            <option value=' delete' title="ビューの作成や変更を許可する">DELETE </option>
							<option value=' drop' title="DELETE文の使用を許可する">DROP</option>
							<option value=' event' title="イベントスケジューラでのイベントの使用を有効にします。">EVENT</option>
							<option value=' execute' title="ストアドルーチン(プロシージャ or 関数)の実行を許可する">EXECUTE</option>
                            <option value=' grant option'title="権限の付与を許可する">GRANT OPTION</option>
							<option value=' index' title="インデックスの作成と削除を許可する">INDEX</option>
                            <option value=' insert' title="INSERT文の使用を許可する">INSERT </option>
							<option value=' look tables' title="SELECT権限を持つテーブルのロックを許可する">LOOK TABLES</option>		
                            <option value=' proxy' title="ユーザーのプロキシ設定を有効にします。">PROXY</option>
                            <option value=' references' title="外部キーの作成を有効にします。">REFERENCES</option>                      
                            <option value=' replication slave' title="ユーザーのプロキシ設定を有効にします。">REPLICATION SLAVE</option>
                            <option value=' select'title="SELECT文の使用を許可する">SELECT</option>							
                            <option value=' show view'title="SHOW CREATE VIEW の使用を有効にします。">SHOW VIEW</option>
                            <option value=' trigger'title="トリガの作成・削除を許可する">TRIGGER</option>
							<option value=' update'title="UPDATE文の使用を許可する">UPDATE</option>
							<option value=' usage'title="「権限なし」を設定する">USAGE</option>
                            </select></li>
                                                        
                            <li>グローバル権限:
                            <select name="global">
                                <option value="none">---</option>
                                <option value=' create role' title="ロール作成を有効にします。">CREATE ROLE</option>
                                <option value=' create tablespace'title="ストアドルーチン(プロシージャ or 関数)の作成を許可する">CREATE TABLESPACE</option>
                                <option value=' create user'title="一時テーブル作成の使用を許可する">CREATE USER</option>
                                <option value=' drop role' title="ロールの削除を有効にする">DROP role</option>
                                <option value=' file' title="ユーザーがサーバーにファイルを読み取らせたり書き込ませたりできるようにします">FILE</option>
                                <option value=' process' title="プロセスリストの表示を許可する">PROCESS</option>
                                <option value=' reload'title="FLUSHの使用を許可する">RELOAD</option>
                                <option value=' replication client' title="ユーザーがソースサーバーまたはレプリカサーバーの場所を尋ねることができるようにします。">REPLICATION CLIENT</option>
                                <option value=' show databases'title="SHOW DATABASEで全データベースの表示を許可する">SHOW DATABASES</option>
                                <option value=' shoutdown'title="mysqladmin shutdownの使用を許可する">SHUTDOWN</option>
							    <option value=' super'title="CHANGE REPLICATION SOURCE TO, CHANGE MASTER TO, KILL, PURGE BINARY LOGS, SET GLOBAL や mysqladmin debug コマンドなどの他の管理操作の使用を有効にします。">SUPER</option>
                            </select></li>
                            <li>適用対象のデータベース:<input type="text" name="database" size="10" maxlength="10"></li>
							<li>適用対象のテーブル:<input type="text" name="table" size="10" maxlength="10"></li>
                            <li><input type="submit" class="generatebtn" value="生成" name="seisei"></li>
                    </form> 
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