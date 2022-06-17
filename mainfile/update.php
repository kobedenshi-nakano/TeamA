<?php
   if($_SERVER['REQUSET_METHOD']=== 'POST'){
       $naiyou=array();
	   $error=array();
	   if(empty($_POST['table'])){
           $error[]="テーブル名が入力されていません。";
	   }else{
           $naiyou[]="update ".$_POST['table'];
	   }
	   if(empty($_POST['colatai'])){
           $error[]="更新する値が入力されていません。";
	   }else{
           $naiyou[]=" set ".$_POST['colatai'];
	   }
   }
?>
<?php
      require_once __DIR__ .'./header.php';
	  require_once __DIR__ .'./subnav.php';
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/home.css">

		<div class="column2">
			<ul class="news-contents">		
		    <form method="post" action="">
			    <ul class="globalnav">
				    <li><input type="text" name="table" size="10" maxlength="10">テーブル名</li>
			        <li><input type="text" name="colatai" size="10" maxlength="10">カラムの値</li>
			        <li><input type="text" name="where" size="10" maxlength="10">where句の指定</li>
					<li><input type="text" name="order" size="10" maxlength="10">order by句の指定<li>
					<li><input type="text" name="limit"  size="10" maxlength="10">limit句</li>	
			    </ul>
						

				<input type="submit" value="生成">
		    </form>

			<div class="kekka-container">
				<p>出力結果</p>
		        <li>
				<!--出力結果-->
				<?php
					
				?>

				</li>
		    </div>
		    </ul>
	    </div>
<?php
      require_once __DIR__ .'./footer.php';
?>
			