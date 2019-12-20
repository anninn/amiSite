<?php
session_start();

//DBに接続
try{
  $dbh = new PDO('mysql:host=localhost;dbname=borads', 'yuhei','yuhei');
  // DBに情報を挿入
  $statement = $dbh->prepare('INSERT INTO members SET name=?, email=?, password=?, created=NOW()');
  $statement->execute(array($_POST['name'], $_POST['email'], $_POST['password']));
   echo '情報が登録されました。';
}catch(PDOException $e){
  echo 'DB接続エラー'.$e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset  ="utf-8">
</head>
<body>
<h1>新規登録</h1>
<form action = "signup_done.php" method = "post">
<label for ="username">username</label>
<input type = "username" name = "username"><br>
<label for = "email">email</label>
<input type ="email" name = "email"><br>
<label for ="password">password</label>
<input type ="password" name ="password"><br>
<button type = "submit">登録する</button>

</form>

</body>

</html>


