<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
     $name = $_POST['user_name'];
     $mail = $_POST['user_mail'];
     $text = $_POST['user_text'];
    ?>
    <p><?php echo $name ?>さん</p>
    <p>メールアドレス：<?php echo $mail ?></p>
    <p>備考欄：<?php echo $text ?></p>
  </body>
</html>
