<?php require_once __DIR__ .'/header.php'; ?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/saveconfirm.css">
<?php require_once __DIR__ .'/subnav.php'; ?>
<div class="column2">
   <form action="codepost.php" method="POST">
      <li>カテゴリ：
        <select name="category">
            <option value="1">select</option>
            <option value="2">update</option>
            <option value="3">insert</option>
            <option value="4">delete</option>
            <option value="5">creatuser</option>
            <option value="6">creattable</option>
        </select>
      </li>
      <p>ここにコードをコピー</p>
        <textarea name="code" id="content" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="送信">
   </form>
   <br>
   <a href="./savehistory.php">保存履歴画面へ</a>
</div>
<?php require_once __DIR__ .'/footer.php'; ?>
