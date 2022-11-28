<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<a href="./savehistory.php">保存履歴画面へ</a>

   <form action="codepost.php" method="POST">
      <p>カテゴリ：</p>
        <select name="category">
            <option value="1">select</option>
            <option value="2">update</option>
            <option value="3">insert</option>
            <option value="4">delete</option>
            <option value="5">creatuser</option>
            <option value="6">creattable</option>
        </select>
      <p>ここにコードをコピー</p>
        <textarea name="code" id="content" cols="30" rows="10"></textarea>
        <br>
       
        
        <br>
        <input type="submit" value="送信">
   </form>
</body>

<!--<style>
   a{
     display: block;
     width: 300px;
     padding: 20px 0;
     border-radius: 6px;
     background-repeat:no-repeat;
     background-position: 100% 0;
     background-size: 200% auto;
     text-align: center;
     color: #fff;
     text-decoration: none;
     font-weight: bold;
     font-size: 20px;
   }
   a :hover{

   }
   body{
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
      margin: 0;
   }
</style>-->
</html>
