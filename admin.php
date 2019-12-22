<?php

//define( 'FILENAME', ' message.txt' );
require('config.php');
/*
//タイム
date_default_timezone_set('Asia/Tokyo');

//変数
$now_date = null ;
$data =null ;
$file_handle = null ;
$spit_data = null;
$message = array ();
$message_array = array();
$error_message = array();
$clean = array();



//if( $file_handle = fopen( FILENAME , "a")) {

//日時
$now_date = date ("Y-m-d H:i:s");

//書き込む
$data = "'" . $_POST['view_name']. " ' , ' ". $_POST['message']. "', '". $now_date. "'\n";

//書き込み
fwrite($file_handle , $data);

//fie close
fclose ( $file_handle ) ;
  
  */

//DB　mysql
$mysqli = new mysqli ('localhost' , 'root' , '' , 'board') ;

//接続の確認
 if( $mysqli->connect_errno ){
  
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

//テーブル作成
if($mysqli->query("message") === TRUE){
  printf("message.\n");
}

//selectクエリ実行
if($result = $mysqli->query("SELECT Name From message LIMIT 10")){
  printf("Select returned %d rows.\n" , $result->num_rows);

  $result->close();

}

$mysqli->close();

 /* $error_message [] = '書き込みに失敗しました。　エラー番号'. $mysqli->connect_errno.' : '. $mysqli ->connect_error;
} else {

  //データ処理

//文字コード
  $mysqli ->set_charset('utf8');
//かきこみ
$now_date = date("Y-m-d H:i:s");

//登録する
$sql = "INSERT INTO message (view_name, message, post_date) VALUES ( '$clean[view_name]', '$clean[message]' , '$now_date')";

//データ登録
$res = $mysqli->query($sql);

if ( $res){
  $success_message = 'correct message';
}else{
  $error_message[] = 'failed message';
}
//closed
$mysqli->close();
}
*/
 



/*if( $file_handle = fopen ( FILENAME, 'a' ) ){
  while ( $data = fgets ( $file_handle) ){
   // echo $data . "<br>";

   $split_data = preg_split ( '/\'/ ' , $data );
   $message = array (
    'view_name ' => $split_data [1],
    'message' => $split_data[3],
    'post_data' => $split_data[5]
    
   );
   array_unshift( $message_array, $message);
    
  }



  //file close code
  fclose ( $file_handle);
  */




?>

<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta charset="UTF-8">
  <link href="athena.css" rel="stylesheet">
  <title>つまらない掲示板 login</title>
  </head>
  <!--ここからコンテンツ-->
  <body>
    <section>
        <h1>つまらない掲示板　login</h1>

      <?php if( !empty($success_message) ): ?>
        <p class= "success_message"><?php echo $success_message; ?></p>
      <?php endif; ?>
      <?php if( !empty($error_message) ): ?>
    	  <ul class="error_message">
		  <?php foreach( $error_message as $value ): ?>
		  	<li>・<?php echo $value; ?></li>
	  	<?php endforeach; ?>
      	</ul>
     <?php endif; ?>
     <form method="post">
    </section>
    <section>
       <h2> 新しい投稿 </h2>
       <form method="POST">

       <div class = "box1">
        <label for ="view_name">名前</label>
        <input id="view_name" type="text" name="view_name" value="<?php if( !empty($_SESSION['view_name']) ){ echo $_SESSION['view_name']; } ?>">
       
       </div>
       <div class = "box1">
        <label for = "message">お言葉を</label>
        <textarea id ="message" name ="message"></textarea>     
       
       </div>
         <input type="submit" name="btn_submit" value="SEND"> 

       </form>
       <hr>
    </section>
    <?php if( !empty ($message_array ) ) { ?>
    <?php foreach ( $message_array as $value ) { ?>
    <!--<section class="SEND">
      <h2>一覧</h2>
      <p>お言葉はまだありません</p>-->
    <article>
      <div class ="info">
        <h2><?php echo $value ['view_name']; ?></h2>
        <time><?php echo date ('Y年m月d日 H:i', strtotime($value['post_date'])); ?></time>
      </div>
      <p ><?php echo $value ['message']; ?></p>
    </article>
    <?php } ?>
    <?php }?>
    
    
    </section> 



  </body>



</html>