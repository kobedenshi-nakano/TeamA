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
                <ul class="formnav">
                    <form method="post" action="">
					    <li>テーブル名:<input type="text" name="tbl_name" size="10" maxlength="20"></li>
						<li>VALUES句:<input type="text" name="value_name" size="10" maxlength="100"></li>
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
			