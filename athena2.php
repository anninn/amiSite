<?php
session_start();
//DBに接続する
try{
  $dbh = new PDO('mysql:host=localhost;dbname=boards_ve2', 'ami','ami');

  //DB情報入力
  $statement = $dbh->prepare('INSERT INTO message SET name=?, view_name=?, message=?, post_date=NOW()');
  $statement->execute(array($_POST['view_name'], $_POST['message'], $_POST['post_date']));
  $sql = 'SELECT * FROM message';
  $data = $dbh->query($sql);

  if (!empty($data)){

    foreach($data as $value){
      
    }
  }

}catch(PDOException $e){
  echo $e->getMessage();
}
// /タイム
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



if ( !empty ($_POST['btn_submit']) ) {
  //var_dump($_POST)  ;

 //なまえ　未入力
 if( empty($_POST ['view_name']) ){
   $error_message[] = 'お名前を入力してください';
 }else{
   $clean['view_name'] = htmlspecialchars( $_POST['view_name'], ENT_QUOTES);
 }

 //メッセージ　未入力
 if ( empty($_POST ['message']) ){
   $error_message[] = 'お言葉を入力してください';
 }else{
    $clean['message'] = htmlspecialchars( $_POST['message'], ENT_QUOTES);
		$clean['message'] = preg_replace( '/\\r\\n|\\n|\\r/', '<br>', $clean['message']);
 }

 if (empty ($error_message ) ){
 var_dump($_POST)  ;
 }
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta charset="UTF-8">
  <link href="athena.css" rel="stylesheet">
  <title>つまらない掲示板</title>
  </head>
  
  <body>
    <section>
        <h1>つまらない掲示板</h1> 

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
       <form action="" method="POST">

       <div class = "box1">
        <label for ="view_name">名前</label>
        <input id = "view_name" type= "text" name = "view_name" value = "">
       
       </div>
       <div class = "box1">
        <label for = "message">お言葉を</label>
        <textarea id ="message" name ="message"></textarea>     
       
       </div>
        <!--  <div> class="name"><span class="label">名前: </span>
          <input type="text" name="name" value=""></div>
          <div class="contents"><span class="label">お言葉を:</span><textarea name="coment" cols="50" rows="5" maxlength="140" wrap="hard" placeholder="140字内でお書き下さい"></textarea></div>-->
        
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
