<?php
//必ずsession_startは最初に記述
require 'function/function.php';
sstart();

// １．データの受け取り
$num  = $_SESSION["num"]+1;
$file = $_SESSION["file"];
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
      <a class="navbar-brand" href="index.php">出席登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<a href = "index.php"><button>出欠登録</a>
<a href = "select.php"><button>一覧表示</a>
<!-- Main[End] -->

</body>
</html>
