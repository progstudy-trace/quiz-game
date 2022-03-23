<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>鬼滅の刃クイズ　アンケートチェック</title>
  <link rel="stylesheet" href="anketo.css">
</head>

<body>
<div class="anketo-wrap">

  <?php
  $nickname = $_POST['nickname'];
  $kansou = $_POST['kansou'];

  $nickname = htmlspecialchars($nickname);
  $kansou = htmlspecialchars($kansou);

  if($nickname===''){
    echo 'あだなをかいていません<br>';
  }else{
    echo 'ようこそ、';
    echo $nickname;
    echo 'さん';
    echo '<br>';
  }

  if($kansou===''){
    echo '感想(かんそう)をかいていません<br>';
  }else{
    echo 'かんそう『';
    echo $kansou;
    echo '』<br>';
  }

  if($nickname===''||$kansou===''){
    echo '<form>';
    echo '<input type="button" class="check-btn" onclick="history.back()" value="もどる">';
    echo '</form>';
  }else{
    echo '<form action="thanks.php" method="post">';
    echo '<input name="nickname" type="hidden" value="'.$nickname.'">';
    echo '<input name="kansou" type="hidden" value="'.$kansou.'">';
    echo '<input type="button" class="check-btn" onclick="history.back()" value="もどる">';
    echo '<input type="submit" class="check-btn" value="これでオッケー">';
    echo '</form>';
  }
  
  ?>

</div>
  
</body>
</html>