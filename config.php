<?php
try {
  $dbconect = new PDO('mysql:host=localhost; dbname=board', 'ami', 'ami');
  echo '接続されました';
} catch(PDOException $e) {
  echo '接続されませんでした'.$e->getMessage();
}
?>
