<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset  ="utf-8">
</head>
<body>
<h1>新規登録</h1>
<form action = "signup_done.php" method = "post">
<label for ="name">username</label>
<input type = "name" name = "name"><br>
<label for = "email">email</label>
<input type ="email" name = "email"><br>
<label for ="password">password</label>
<input type ="password" name ="password"><br>
<button type = "submit">登録する</button>

</form>

</body>

</html>


