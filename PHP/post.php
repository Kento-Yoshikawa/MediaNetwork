<?php
   if(strlen($_POST["name"])!=0)
     $name=htmlspecialchars($_POST["name"]);
   else
     $name="no name";
   date_default_timezone_set('Asia/Tokyo');
   $time=date("Y/m/j H:i:s");
   $content=htmlspecialchars($_POST["content"]);
   $content=preg_replace("[\n\r]","<br>",$content);
   
   $fp=fopen("./log.csv","a");
   flock($fp,LOCK_EX);

   $line=$name.",".$time.",".$content."\n";
   fputs($fp,$line);

   flock($fp,LOCK_UN);
   fclose($fp);
?>

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
    <div class="txttitle">人工知能への橋渡し</div><br>
    <div class="txtsubtitle">人工知能学習サイト</div>

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
      <p>掲示板 投稿内容</p>
      </div><!-- /.category -->
  </div><!-- /.wrapper-category -->

  <div class="wrapper-main">
    <div class="main">
      <div class="main-contents">
      <h2>この掲示板は人工知能について学習をしている皆さんの交流の場として利用してください。</h2>
    <?php 
      echo "<p><b>名前:".$name."</b> 投稿日時<time>".$time."</time><br>".$content."</p>"
     ?>
   <hr>
      <p>
        <h4>投稿内容</h4><br>
          <hr>
        <p>
           <a href="./bbs.php" target="_self">掲示板に戻る</a><br>
           <a href="./index.html" target="_self">トップに戻る</a><br>
        </p>
     </p>

    </hr>
    </div><!-- /.main-contents -->
      </div><!-- /.main -->
</div><!-- /.wrapper-main -->

<body>
</html>

