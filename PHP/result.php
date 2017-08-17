<?php
 if(is_readable("./results.csv") && $fp=fopen("./results.csv","r")){
   flock($fp,LOCK_SH);
 
  /*本当はfeedback.htmlで書かれた内容を
    アンケート結果に反映させたかったが
    うまく行かなかったので断念する形にした.
  */  

   /*性別*/
    $cnt["men"]=0;
    $cnt["women"]=0;

  /*年齢*/
    $cnt["tentwenty"]=0;
    $cnt["twentythirty"]=0;
    $cnt["thirtyforty"]=0;
    $cnt["fortyfifty"]=0;
    $cnt["fiftysixty"]=0;
    $cnt["sixtyseventy"]=0;
    $cnt["seventyeighty"]=0;
    $cnt["moreover"]=0;

   /*質問1*/
   $cnt["verygood"]=0;
   $cnt["good"]=0;
   $cnt["soso"]=0;
   $cnt["notgood"]=0;
   $cnt["bad"]=0;
   
   /*質問2*/
   $cnt["whatsai"]=0;
   $cnt["machinelearning"]=0;
   $cnt["deeplearning"]=0;

   while($csvline=fgets($fp)){
     $data=explode(",",trim($csvline,"\n"));
      if(count($data)==5){
         $gender=(string)$data[1];
         $age=(string)$data[2];
         $eval=(string)$data[3];
         $evalcontents=(string)$data[4];
 
         if(isset($cnt[$gender])){
              $cnt[$gender]++;
           }

           if(isset($cnt[$age])){
              $cnt[$age]++;
           }

          if(isset($cnt[$eval])){
              $cnt[$eval]++;
           }
      
         if(isset($cnt[$evalcontents])){
              $cnt[$evalcontents]++;
           }
           
 
       }

   }
  flock($fp,LOCK_UN);
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

  <div class="wrapper-category">
       <div class="category">
       <p>皆さんからのアンケート結果</p>

    </div><!-- /.category -->
  </div><!-- /.wrapper-category -->

 <div class="wrapper-main">
    <div class="main">
      <div class="main-contents">
      <h1>性別</h1>
  
    <?php if(is_readable("./result.csv")):?>
      <p>
       <table border=1>
         <tr>
            <td>性別</td>
            <td>人数</td>
             <td>割合</td>
         </tr>
         <tr>
            <td>男性</td>
            <td><?php echo $cnt["men"]?></td>
            <td><?php echo round($cnt["men"]*100/($cnt["men"]+$cnt["women"]),0)?>%</td>
         </tr>
         <tr>
             <td>女性</td>
             <td><?php echo $cnt["women"]?></td>
             <td> <?php echo round($cnt["women"]*100/($cnt["men"]+$cnt["women"]),0)?>%</td>
          </tr>
      </table>
     </p>

     <p>
     <h1>年齢</h1>
      <table border=1>
        <tr>
           <td>年齢</td>
           <td>人数</td>
            <td>割合</td>
        </tr>
        <tr>
           <td>10代～20代</td>
           <td><?php echo $cnt["tentwenty"]?></td>
           <td><?php echo round($cnt["tentwenty"]*100/($cnt["tentwenty"]+$cnt["twentythirty"]+$cnt["thirtyforty"]+$cnt["fortyfifty"]
           +$cnt["fiftysixty"]+$cnt["sixtyseventy"]+$cnt["seventyeighty"]+$cnt["moreover"]),0)?>%</td>
        </tr>

        <tr>
           <td>20代～30代</td>
           <td><?php echo $cnt["twentythirty"]?></td>
           <td><?php echo round($cnt["twentythirty"]*100/($cnt["tentwenty"]+$cnt["twentythirty"]+$cnt["thirtyforty"]+$cnt["fortyfifty"]
           +$cnt["fiftysixty"]+$cnt["sixtyseventy"]+$cnt["seventyeighty"]+$cnt["moreover"]),0)?>%</td>
        </tr>

        <tr>
           <td>30代～40代</td>
           <td><?php echo $cnt["thirtyforty"]?></td>
           <td><?php echo round($cnt["thirtyforty"]*100/($cnt["tentwenty"]+$cnt["twentythirty"]+$cnt["thirtyforty"]+$cnt["fortyfifty"]
           +$cnt["fiftysixty"]+$cnt["sixtyseventy"]+$cnt["seventyeighty"]+$cnt["moreover"]),0)?>%</td>
        </tr>

        <tr>
           <td>40代～50代</td>
           <td><?php echo $cnt["fortyfifty"]?></td>
           <td><?php echo round($cnt["fortyfifty"]*100/($cnt["tentwenty"]+$cnt["twentythirty"]+$cnt["thirtyforty"]+$cnt["fortyfifty"]
           +$cnt["fiftysixty"]+$cnt["sixtyseventy"]+$cnt["seventyeighty"]+$cnt["moreover"]),0)?>%</td>
        </tr>

        <tr>
           <td>50代～60代</td>
           <td><?php echo $cnt["fiftysixty"]?></td>
           <td><?php echo round($cnt["fiftysixty"]*100/($cnt["tentwenty"]+$cnt["twentythirty"]+$cnt["thirtyforty"]+$cnt["fortyfifty"]
           +$cnt["fiftysixty"]+$cnt["sixtyseventy"]+$cnt["seventyeighty"]+$cnt["moreover"]),0)?>%</td>
        </tr>

        <tr>
           <td>60代～70代</td>
           <td><?php echo $cnt["sixtyseventy"]?></td>
           <td><?php echo round($cnt["sixtyseventy"]*100/($cnt["tentwenty"]+$cnt["twentythirty"]+$cnt["thirtyforty"]+$cnt["fortyfifty"]
           +$cnt["fiftysixty"]+$cnt["sixtyseventy"]+$cnt["seventyeighty"]+$cnt["moreover"]),0)?>%</td>
        </tr>

        <tr>
           <td>70代～80代</td>
           <td><?php echo $cnt["seventyeighty"]?></td>
           <td><?php echo round($cnt["tentwenty"]*100/($cnt["tentwenty"]+$cnt["twentythirty"]+$cnt["thirtyforty"]+$cnt["fortyfifty"]
           +$cnt["fiftysixty"]+$cnt["sixtyseventy"]+$cnt["seventyeighty"]+$cnt["moreover"]),0)?>%</td>
        </tr>

        <tr>
           <td>80代以上</td>
           <td><?php echo $cnt["moreover"]?></td>
           <td><?php echo round($cnt["moreover"]*100/($cnt["tentwenty"]+$cnt["twentythirty"]+$cnt["thirtyforty"]+$cnt["fortyfifty"]
           +$cnt["fiftysixty"]+$cnt["sixtyseventy"]+$cnt["seventyeighty"]+$cnt["moreover"]),0)?>%</td>
        </tr>

     </table>
    </p>

    <p>
      <h1>Webサイト全般の評価</h1>
     <table border=1>
       <tr>
          <td>評価</td>
          <td>人数</td>
           <td>割合</td>
       </tr>

       <tr>
          <td>とてもよかった</td>
          <td><?php echo $cnt["verygood"]?></td>
          <td><?php echo round($cnt["verygood"]*100/($cnt["verygood"]+$cnt["good"]+$cnt["soso"]+$cnt["notgood"]+$cnt["bad"]),0)?>%</td>
       </tr>

       <tr>
          <td>よかった</td>
          <td><?php echo $cnt["good"]?></td>
          <td><?php echo round($cnt["good"]*100/($cnt["verygood"]+$cnt["good"]+$cnt["soso"]+$cnt["notgood"]+$cnt["bad"]),0)?>%</td>
       </tr>


       <tr>
          <td>まあまあ</td>
          <td><?php echo $cnt["soso"]?></td>
          <td><?php echo round($cnt["soso"]*100/($cnt["verygood"]+$cnt["good"]+$cnt["soso"]+$cnt["notgood"]+$cnt["bad"]),0)?>%</td>
       </tr>


       <tr>
          <td>あまりよくなかった</td>
          <td><?php echo $cnt["notgood"]?></td>
          <td><?php echo round($cnt["notgood"]*100/($cnt["verygood"]+$cnt["good"]+$cnt["soso"]+$cnt["notgood"]+$cnt["bad"]),0)?>%</td>
       </tr>

       <tr>
          <td>よくなかった</td>
          <td><?php echo $cnt["bad"]?></td>
          <td><?php echo round($cnt["bad"]*100/($cnt["verygood"]+$cnt["good"]+$cnt["soso"]+$cnt["notgood"]+$cnt["bad"]),0)?>%</td>
       </tr>


    </table>
   </p>
        

   <p>
    <h1>ページの内容に関する評価</h1>
    <table border=1>
      <tr>
         <td>項目</td>
         <td>人数</td>
          <td>割合</td>
      </tr>
      <tr>
         <td>まず、人工知能って何?</td>
         <td><?php echo $cnt["whatsai"]?></td>
         <td><?php echo round($cnt["whatsai"]*100/($cnt["whatsai"]+$cnt["machinelearning"]+$cnt["deeplearning"]),0)?>%</td>
      </tr>

      <tr>
         <td>機械学習って何?</td>
         <td><?php echo $cnt["machinelearning"]?></td>
         <td><?php echo round($cnt["machinelearning"]*100/($cnt["whatsai"]+$cnt["machinelearning"]+$cnt["deeplearning"]),0)?>%</td>
      </tr>

      <tr>
         <td>まず、人工知能って何?</td>
         <td><?php echo $cnt["deeplearning"]?></td>
         <td><?php echo round($cnt["deeplearning"]*100/($cnt["whatsai"]+$cnt["machinelearning"]+$cnt["deeplearning"]),0)?>%</td>
      </tr>

   </table>
  </p>


    <?php else:?>
    <p>csvファイルがありません.</p>
    <?php endif;?>

    </div><!-- /.main-contents -->
      </div><!-- /.main -->
</div><!-- /.wrapper-main -->


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
