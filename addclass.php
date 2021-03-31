<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>クラス名簿読み込み</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/style.css"> -->

  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">出席登録</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="addclass_act.php" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
<div class="jumbotron">
   <fieldset>
    <legend>クラス名簿読み込み（.xlsx）</legend>
    <label>クラス名：<input type="text" name="lid"></label><br>
    <label>PW　　 ：<input type="text" name="lpw"></label><br>
    <label>生徒数* ：<input type="text" name="num"></label><br>
    <input type="file" name="file">
      <!-- 送信ボタン -->
     <input type="submit" value="送信">
   </fieldset>
  </div>
</form>
<!-- Main[End] -->



</body>
</html>
<?php

    //一字ファイルができているか（アップロードされているか）チェック
