<?php
session_start();
try{
  $dbh = new PDO('mysql:host=localhost;dbname = boards', 'ami','ami');
  //新規登録情報
  $statement = $dbh->prepare('INSERT INTO signupinfo SET name=?,email=?,password =?, created=NOW()');
  $statement->execute(array($_POST['name'],$_POST['email'] ,$_POST['password']));
  echo '新規登録出来ました';
}catch(PDOException $e){
  echo '新規登録できませんでした'.$e->getMessage();
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


