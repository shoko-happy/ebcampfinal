<?php
//1. 接続します
try {
  $pdo = new PDO('mysql:dbname=rollBook;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ登録SQL作成
$sql = "SELECT * FROM c_table";
$stmt = $pdo->prepare($sql);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
} else{

//３．データを取得
  $val="";
  while( $val = $stmt->fetch(PDO::FETCH_ASSOC)){ //1レコードだけ取得する方法

    $view[] .= $val["lid"];
  };
}

//処理終了

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="select.php">ログイン</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="login.php">
  <div class="jumbotron">
   <fieldset>
    <legend>クラスを選択</legend>
    <select name='lid'>
      <option value=''>-----</option>
      <?php for($a = 0 ; $a < count($view); $a ++):?>
      <option value='<?=$view[$a]?>'><?=$view[$a]?></option>
      <?php endfor;?>
    </select>
     <input type="submit" value="決定">
     <br>
     <br>
     <a href = "addclass.php"><button>新しいクラスを登録</a>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
