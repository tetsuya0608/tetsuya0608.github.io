<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <!-- fontawesome宣言 -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- ブートストラップ宣言 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- フォントファミリー -->
      <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
      <!-- javascript宣言 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <title>診断結果</title>
  </head>
  <style>
  .fadein {
      opacity : 0;
      transform : translate(0, 50px);
      transition : all 300ms;
  }
  .fadein.scrollin {
      opacity : 1;
      transform : translate(0, 0);
  }

  .explain {
      opacity : 0;
      transform : translate(0, 50px);
      transition : all 300ms;
  }
  .explain.scrollin {
      opacity : 1;
      transform : translate(0, 0);
  }

  .img-responsive {
    display: block;
    height: auto;
    max-width: 70%;
  }

  /* レスポンシブ */
  @media(max-width:670px) {
    h1 {
      font-size:24px;
    }

    h2 {
      font-size:20px;
    }

    h3 {
      font-size:18px;
    }

   p {
     font-size:16px;
   }

   li {
     font-size:18px;
   }
  }
  </style>
  <body style="background-color:#ffccff; color:#333333;   font-family: 'M PLUS Rounded 1c', sans-serif;">
    <?php
    // 使用者の情報
      $startYear = $_POST['year'];
      $startMonth = $_POST['month'];
      $startDate = $_POST['date'];
      $averageStudyHour = $_POST['hour'];
      // 現在の年月日
      $nowYear = (int)date("Y");
      $nowMonth = (int)date("m");
      $nowDate = (int)date("d");
      // 学習総合日数
      $totalStudyDate = ((mktime(0,0,0,$nowdate,$nowMonth,$nowYear) - mktime(0,0,0,$startDate,$startMonth,$startYear)) / 86400);
      $totalStudyHour = $totalStudyDate*$averageStudyHour;
    ?>
    <div class="container text-center mt-5">
      <h1>診断結果</h1>
    </div>
      <img src="http://www.sozai.rdy.jp/shirokuro/09/kenkou/sozai/01.jpg" class="rounded mt-5 img-responsive mx-auto">
      <main class="container mx-auto mt-5 mb-5" style="width:70%;background-color:#eeeeee; border-radius:5px; border:dashed 2px #777777;">
        <div class="explain">
        <h2 class="mt-3 mb-3">あなたの診断結果について...</h2>
        <br>
        <br>
        <br>
        <p>あなたは<span style="color:#ff3333; font-size:1.5em;"><?php echo $startYear ?></span>年の<span style="color:#ff3333; font-size:1.5em;"><?php echo $startMonth ?></span>月<span style="color:#ff3333; font-size:1.5em;"><?php echo $startDate ?></span>日に始めて、
          一日の平均学習時間が<span style="color:#ff3333; font-size:1.5em;"><?php echo $averageStudyHour ?></span>時間と言うことですね。
        </p>
        <p class="mt-3 mb-3">なるほど....</p>
        <p>現在は<?php echo date('Y年m月d日'); ?>ですので、</p>
        <p>今日まで学習してきた日数は、<span style="color:#ff3333; font-size:1.5em;"><?php echo $totalStudyDate ?></span>日。</p>
        <p>ほうほう。</p>
        <p class="mb-5">ということは、時間にすると...<span style="color:#ff3333; font-size:1.5em;"><?php echo $totalStudyHour ?></span>時間となるわけです。</p>
        <p class="fadein mb-3" style="font-weight:bold; font-size:1.5em; color:#00ff00;">
        <?php
          if(1000>$totalStudyHour) {
            echo "あなたは残り",(1000-$totalStudyHour),"時間の学習をすれば一人前のプログラマーです！";
          }elseif(1000<$totalStudyHour){
            echo "すでにあなたは立派なプログラマーです！";
          }else{
            echo "あなたは一人前のプログラマーです！";
          }
         ?>
       </p>
       <br>
       <br>
       <p class="mb-3">今後も継続して学習を続けてさらなる高みを目指して頑張りましょう！</p>
     </div>
     </main>
      <footer class="bg-dark  pt-3 pb-3 mt-5" style="display:flex; align-items: center; justify-content:space-between;">
        <p class="ml-4 text-white">@プログラミング学習診断テスト</p>
        <a href="http://twitter.com/tetsuya1580" class="badge badge-primary p-2 mr-4" style="display:inline-block;"><i class="fab fa-twitter"></i>作成者</a>
      </footer>

      <script>
      $(function() {
      $(window).scroll(function (){
       $('.fadein').each(function(){
           var elemPos = $(this).offset().top;
           var scroll = $(window).scrollTop();
           var windowHeight = $(window).height();
           if (scroll > elemPos - windowHeight + 200){
               $(this).addClass('scrollin');
           }
       });
   });

   $(window).scroll(function (){
    $('.explain').each(function(){
        var elemPos = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll > elemPos - windowHeight + 200){
            $(this).addClass('scrollin');
        }
    });
});
 });
      </script>
  </body>
</html>
