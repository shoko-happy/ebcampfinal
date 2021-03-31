<?php
//必ずsession_startは最初に記述
require 'function/function.php';
sstart();

$lid = $_POST["lid"];
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
<form method="post" action="login_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>クラスを選択</legend>
     <label>ID：<input type="text" name="lid" size="50" value=<?=$lid?> ></label><br>
     <label>PW：<input type="password" name="lpw"></label><br>
     <input type="submit" value="出欠登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
