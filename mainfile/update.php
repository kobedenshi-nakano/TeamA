
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $naiyou=array();
	   $error=array();
	   if(empty($_POST['table'])){
           $error[]="テーブル名が入力されていません。";
	   }else{
           $naiyou[]="update ".$_POST['table'];
	   }

	   if(empty($_POST['colatai'])){
           $error[]="更新する列が入力されていません。";
	   }else{
           $naiyou[]=" set ".$_POST['colatai'];
	   }

	   if(empty($_POST['colatai2'])){
		$error[]="更新する列の値が入力されていません。";
	   }else{
		$naiyou[]=" = ".$_POST['colatai2'];
	   }

	   if(!empty($_POST['where'])){
		 $naiyou[]=" where ".$_POST['where'];
	   }

	   if(!empty($_POST['order'])){
		$naiyou[]=" order by ".$_POST['order'];
	   }

	   if(!empty($_POST['limit'])){
		$naiyou[]=" limit ".$_POST['limit'];
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
                     <?php
					     foreach($error as $value){
							echo $value;
							echo '<br>';
						 }
					 ?>
				</ul>
				<?php endif; ?>
			<ul class="formnav">
		        <form method="post" action="">
				    <li>テーブル名:<input type="text" name="table" size="10" maxlength="10"></li>
					
					<input type="text" id="sampleUserInput" placeholder="更新する列">
					<input type="button" value="追加" onclick="AddStringToTextarea();">
					<textarea cols="30" rows="6" id="sampleInputedList" readonly>
						
					</textarea>
					<!--
					<input type="button" value="行を追加" id="addition" onclick="coladd()">
        
					<table id="table" border="1">
   					 <tr>
        				<td>
						<li>更新する列:<input type="text" name="colatai" size="10" maxlength="10"></li>
       					 </td>
        				<td>
						<li>更新する列の値:<input type="text" name="colatai2" size="10" maxlength="10"></li>
        				</td>
    				 </tr>
					</table>
						-->
			        <li>where句の指定:<input type="text" name="where" size="10" maxlength="20"></li>
					<li>order by句の指定:<input type="text" name="order" size="10" maxlength="20"><li>
					<li>limit句:<input type="text" name="limit"  size="10" maxlength="10"></li>	
			        <li><input type="submit" value="生成"></li>
		        </form>
				<!--<input type="button" value="行を追加" id="coladd" onclick="coladd()">
        
					<table id="table" border="1">
   					 <tr>
        				<td>
            				SAMPLE FOR TABLE-ROWADD
       					 </td>
        				<td>
           					 SAMPLE FOR TABLE-ROWDELETE
        				</td>
    				 </tr>
					</table>-->
			</ul>
			<div class="kekka-container">
				<p>出力結果</p>
		        <li>
				<?php
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
			