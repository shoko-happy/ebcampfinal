<?php
require 'function/function.php';
sstart();
//１．GETでid値を取得
$id = $_GET["id"];

//２．DB接続
try {
    $pdo = new PDO('mysql:dbname=rollBook;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


//３．SQL読み込み
$stmt = $pdo->prepare("SELECT * FROM r_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ表示
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
    $row = $stmt->fetch();
};

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>出席簿</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>出席登録</legend>
        <label><?=$row["name"]?>
        <input type="hidden" name="id" value=<?=$row["id"]?>>
        <input type="hidden" name="studentId" value=<?=$row["studentId"]?>>
        <input type="hidden" name="name" value=<?=$row["name"]?>>
        <input type="text" name="date" value=<?=$row["date"]?>>
        <input type="radio" name="record" value="出席">出席
        <input type="radio" name="record" value="遅刻">遅刻
        <input type="radio" name="record" value="欠席">欠席  
        <input type="radio" name="alart" value="*">連絡なし
        </label>
        </label>

      <!-- 送信ボタン -->
     <input type="submit" value="送信">
   </fieldset>
  </div>
</form>
<!-- Main[End] -->