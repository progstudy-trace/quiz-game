<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>鬼滅の刃クイズ　サンクスページ</title>
  <link rel="stylesheet" href="anketo.css">
</head>

<body>
<div class="anketo-wrap">
  <div class="anketo-body">
  <?php
  try{

    // データベースに接続
    $dsn='mysql:データベース名;host=データベースサーバ';
    $user='ユーザー名';
    $password='パスワード';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES utf8');
   
    // 入力された値を受け取り表示
    $nickname = $_POST['nickname'];
    $kansou = $_POST['kansou'];

    $nickname = htmlspecialchars($nickname);
    $kansou = htmlspecialchars($kansou);

    echo $nickname;
    echo 'さん<br>';
    echo '感想(かんそう)ありがとうございました。<br>';
    echo 'かいてくれた感想(かんそう)『';
    echo  $kansou;
    echo '』<br>';

    // データベースエンジンにSQL文で指令を出す
    $sql='INSERT INTO テーブル名(nickname,kansou)VALUES("'.$nickname.'","'.$kansou.'")';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();

    // データベースから切断
    $dbh=null;

  }catch(Exception $e){
    echo 'ちょうしがわるくてうまくいきませんでした。またあとでやってください。<br>';
  }
  ?>
  </div>

  <a href="ichiran.php">かんんそう一覧（いちらん）をみる。</a>
  <a href="index.html">クイズいちらんに　もどる</a>

</div>
</body>