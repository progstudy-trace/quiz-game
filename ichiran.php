<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>鬼滅の刃クイズ　感想一覧ページ</title>
  <link rel="stylesheet" href="anketo.css">

  <!-- ページが読み込まれたら一番下へジャンプ -->
  <script type="text/javaScript">
      function Jump() {
          location.href = "#bottom";
      }
  </script>
</head>

<body onload="Jump()">
  <div class="anketo-wrap">
    <div class="anketo-body">

    <?php
    // データベースに接続
      $dsn='mysql:データベース名;host=データベースサーバ';
      $user='ユーザー名';
      $password='パスワード';
      $dbh=new PDO($dsn,$user,$password);
      $dbh->query('SET NAMES utf8');
    
    
    // データベースエンジンにSQL文で指令を出す
      $sql='SELECT * FROM テーブル名 WHERE 1';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();

    // データベースエンジンが返してきたデータを取り出し表示
    while(1){
      $rec=$stmt->fetch(PDO::FETCH_ASSOC);
      if($rec===false){
        break;
      }

      echo $rec['code'];
      echo '.';
      echo $rec['nickname'];
      echo '：';
      echo $rec['kansou'];
      echo '<br>';
    }

    // データベースから切断
      $dbh=null;
    ?>
    </div>

    <a href="index.html" id="bottom">クイズいちらんに　もどる</a>

  </div>
</body>