<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta charset="UTF-8">
  <title>つまらない掲示板</title>
  </head>
  <!--ここからコンテンツ-->
  <body>
    <section>
        <h1>つまらない掲示板</h1>
    </section>
    <section>
       <h2> 新しい投稿 </h2>
       <form action="" method="POST">
        <div class="name"><span class="label">表示名: </span>
        <input type="text" name="name" value=""></div>
        <div class="contents"><span class="label">お言葉を:</span><textarea name="coment" cols="50" rows="5" maxlength="140" wrap="hard" placeholder="140字内でお書き下さい"></textarea></div>
        <input type="submit" value="SEND"> 
        

     
         <!--<input type="message" maxlength="100">
          <input type="message" minlength="1">-->


       </form>
    </section>
    <section class="toukou">
      <h2>一覧</h2>
      <p>お言葉はまだありません</p>

    </section> 



  </body>



</html>