<?php
	require_once '../classes/dbc.php';
    require_once __DIR__ .'./header.php'
	/*require_once __DIR__ .'./subnav.php';*/
?>
<!DOCTYPE html>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/subnav.css">
<link rel="stylesheet" href="../css/createuser.css">
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="newpost.php">新着</a></li>
				<li><a href="select.php" style="color:red">select</a></li>
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
                <li><a href="search.php">検索</a></li>
			</ul>
</div>

<div class="category_bun"> 
        <p>検索ジャンルの指定</p>
		<form action="searchlist.php" method="POST">
      	<p>カテゴリ：</p>
        <select name="category_bun">
            <option value="1">select</option>
            <option value="2">update</option>
            <option value="3">insert</option>
            <option value="4">delete</option>
            <option value="5">creatuser</option>
            <option value="6">creattable</option>
        </select>
		<input type="submit" value="送信">
    </div>

	<div class = "">

	</div>




<?php
    require_once __DIR__ .'./footer.php';
?>