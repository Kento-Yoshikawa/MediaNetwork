<?php
  if(strlen($_POST["name"])!=0)
 {
     //入力された情報を変数に代入
    $name=$_POST["name"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $eval=$_POST["eval"];
    $evalcontents=$_POST["evalcontents"];
   

   $fp=fopen("./results.csv","a+");
   flock($fp,LOCK_EX);
   $output=join(",",array($name,$gender,$age,$eval,$evalcontents))."\n";
   fputs($fp,$output);
   flock($fp,LOCK_UN);
   fclose($fp);
 }
?>

<!DOCTYPE html>
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
      <p>このサイトへのフィードバック</p>
      </div><!-- /.category -->
  </div><!-- /.wrapper-category -->

    <?php if(strlen($_POST["name"])!=0):?>


<div class="wrapper-main">
    <div class="main">
      <div class="main-contents">
      <h2>ご協力いただきありがとうございました。<br>このアンケートの結果はWeb制作者へのフィードバックとして役立てられます</h2>
      

     <p>
      <a href="./feedback.html" target="_self">フォームに戻る</a><br>
    </p>
    </div><!-- /.main-contents -->
      </div><!-- /.main -->
</div><!-- /.wrapper-main -->
     


    <?php else: ?>
      <p>アンケート入力が不備なようです.<br> アンケート入力画面に戻って再入力をお願いします.</p>      
    <?php endif; ?>

   <div class="wrapper-footer">
     <div class="footer">
      <small><p>Copyright &copy 2017 K.Yoshikawa All Rights Reserved.</p></small>
       </div><!-- /.footer -->
   </div><!-- /.wrapper-footer -->
      
 </body>
</html>

