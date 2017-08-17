<!DOCTYPE html>
<!-- 後で改変-->
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <!--Explain website-->
   <meta name="description" content="メディアネットワーク 制作ホームページ">
   <meta name="author" content="1510161 由川拳都">
   <meta name="keywords" content="人工知能,初学者,機械学習,ディープラーニング">
   <!--import jquery -->
   <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
   <script src="scriptjquery.js"></script>

   <link rel="shortcut icon" type="image/png" href="images/IsAIbeyondHuman.png">
  <!--CSS-->
   <link rel="stylesheet" href="homepage.css">
   <link rel="stylesheet" href="forjquery.css">

   <title>人工知能への橋渡し</title>
 </head>

  <body>
       <!--homepage title -->
    <div class="texttitle">人工知能への橋渡し</div><br>
    <div class="textsubtitle">人工知能学習サイト</div>
    <!-- ==============global============== -->
  <div class="wrapper-nav-global">
    <img src="images/homepageicon.png" alt="ヘッダ用アイコン画像"width="200" height="180">
    <ul class="nav-global clear">
      <li><a href="./index.html">ホーム</a></li>
      <li><a href="./contents.html">コンテンツ</a></li>
      <li><a href="./bbs.php">掲示板</a></li>
      <li><a href="./feedback.html">フィードバック</a></li>
      <li><a href="./login.html">ログイン</a></li>
      </ul>
  </div><!-- /.wrapper-nav-global -->
  <!-- ==============/global============== -->


  <div class="wrapper-category">
    <div class="category">
      <p>掲示板</p>
      </div><!-- /.category -->
  </div><!-- /.wrapper-category -->

  <div class="wrapper-main">
    <div class="main">
      <div class="main-contents">
      <h2>この掲示板は人工知能について学習をしている皆さんの交流の場として利用してください。</h2>
   <hr>
      <p>
        <h4>投稿フォーム</h4><br>
         <form method="POST" action="./post.php">
          名前(ニックネーム):<input type="text" name="name"autofocus placeholder="お名前"><br>
          投稿内容<br>
         <textarea name="content" rows="10" cols="80"></textarea><br>
         <input type="submit" value="投稿">
         </form>
     </p>
    </hr>
    </div><!-- /.main-contents -->
      </div><!-- /.main -->
</div><!-- /.wrapper-main -->

<?php
  
   if(is_file("./log.csv")){
      if(is_readable("./log.csv")){
      $fp=fopen("./log.csv","r");

      flock($fp,LOCK_SH);
      $contents=array();

      while($line=fgets($fp)){
          $content=explode(".",$line);
          array_push($contents,$line);
       }
   
      $count=0;

      for($i=2;$i>=0;$i--){        
        if(count($content)==3){
         $count++;
         $content=$contents[$i];
         echo "<p>".$count;
         echo ":<strong>名前:$content[0]</strong>";
         echo "投稿日時:<time>$content[1]</time><br>$content[2]</p>\n";
	  echo "<hr>\n";
          }

        }
        flock($fp,LOCK_UN);
     fclose($fp); 
   }

}

  if(is_file("./log.csv")){
      if(is_readable("./log.csv")){
          $fp=fopen("./log.csv","r");
           flock($fp,LOCK_SH);
           $count=1;

          while(!feof($fp)){

              $line=fgets($fp);
              $content=explode(",",$line);
              
                if(count($content)==3){
                    echo "<p>".$count;
                    echo ":<strong>.$content[0]</strong>";
                    echo "投稿日時:<time>$content[1]</time><br>$content[2]</p>\n";
	             echo "<hr>\n";
                    $count++;
                }
            }
            flock($fp,LOCK_UN);
            fclose($fp);
      }
        else
           echo "ファイルが開けません";
   }     
?>


<div class="wrapper-footer">
  <div class="footer">
    <small><p>Copyright &copy 2017 K.Yoshikawa All Rights Reserved.</p></small>
    </div><!-- /.footer -->
</div><!-- /.wrapper-footer -->


  <!-- ==============pageup============= -->
  <div class="pageup">
    <a href="#top" class="scroll-link"></a>
    </div><!-- /.pageup -->
  <!-- ==============/pageup============== -->



  </body>

</html>
