<?php
  //文字化け阻止
header('Content-Type: text/html; charset=UTF-8');
  $IDad=htmlspecialchars($_POST["IDad"]);
  $PWad=htmlspecialchars($_POST["PWad"]);

  $filename="./loginadminist.csv";
  $dest="./result.php";

  if(strcmp($IDad,"")==0 ||strcmp($PWad,"")==0 )
   exit("エラー:IDまたはパスワードが空白です");

  if(!file_exists($filename))
     exit("誰も登録していません");

   $fp=fopen($filename,"r+");
   flock($fp,LOCK_EX);

   $flag=false;

  //ID,PWのハッシュ値が一致する行があればflagにtrueを代入
   while($line=fgetcsv($fp))
      if(strcmp($line[0],$IDad)==0
           && strcmp($line[1],hash("sha512",$PWad))==0){
            $flag=true;
            break;
       }
   flock($fp,LOCK_UN);
   fclose($fp);

   //IDとPwが一致すれば提案ページに自動遷移
    if($flag){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $dest");
      exit;
   }
 else
   exit("IDまたはパスワードが違います");
?>